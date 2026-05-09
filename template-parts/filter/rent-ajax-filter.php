<?php


if (!defined('RENT_INDEX_CPT')) {
    define('RENT_INDEX_CPT', 'porpertypi');
}

if (!defined('RENT_INDEX_META_PURPOSE')) {
    define('RENT_INDEX_META_PURPOSE', 'pp_purpose');
}

if (!defined('RENT_INDEX_META_STATUS')) {
    define('RENT_INDEX_META_STATUS', 'pp_status');
}

if (!defined('RENT_INDEX_META_PRICE')) {
    define('RENT_INDEX_META_PRICE', '_re_price');
}

if (!defined('RENT_INDEX_META_BEDS')) {
    define('RENT_INDEX_META_BEDS', '_re_beds');
}

if (!defined('RENT_INDEX_META_BATHS')) {
    define('RENT_INDEX_META_BATHS', '_re_baths');
}

if (!defined('RENT_INDEX_META_SIZE')) {
    define('RENT_INDEX_META_SIZE', '_re_size_sqft');
}

if (!defined('RENT_INDEX_META_EXPIRED_DATE')) {
    define('RENT_INDEX_META_EXPIRED_DATE', 'pp_expired_date');
}

if (!defined('RENT_INDEX_META_AREA')) {
    define('RENT_INDEX_META_AREA', 'porpertypi_area');
}

if (!defined('RENT_INDEX_META_UNIT_REFERENCE')) {
    define('RENT_INDEX_META_UNIT_REFERENCE', 'pp_unit_reference');
}

if (!defined('RENT_INDEX_META_ADDRESS')) {
    define('RENT_INDEX_META_ADDRESS', 'pp_address');
}

/**
 * Shortcode: [porpertypi_ajax_filter_dynamic_rent]
 */
add_shortcode('porpertypi_ajax_filter_dynamic_rent', function () {
    $nonce = wp_create_nonce('rent_filter_nonce');

    $purpose_options = rent_get_distinct_meta_values(RENT_INDEX_META_PURPOSE);
    $status_options  = rent_get_distinct_meta_values(RENT_INDEX_META_STATUS);

    ob_start(); ?>
    <style>
        .rent-index-hero{
            position: relative;
            overflow: hidden;
        }

        .rent-hero__bg{
            position:absolute;
            inset:0;
            background-size:cover;
            background-position:center;
            background-repeat:no-repeat;
            width:100%;
            height:100%;
            opacity:0;
            transition:opacity 1.8s cubic-bezier(.4,0,.2,1);
            will-change:opacity;
            transform:scale(1.02);
        }

        .rent-hero__bg::before{
            content:'';
            position:absolute;
            inset:0;
            background:linear-gradient(180deg,rgba(2,8,23,.35),rgba(2,8,23,.12));
        }

        .rent-hero__bg.is-active{
            opacity:1;
        }
    </style>

    <div class="index-wrap rent-index-wrap">
        <div class="index-hero rent-index-hero">
            <div class="rent-hero__bg rent-hero__bg--1"></div>
            <div class="rent-hero__bg rent-hero__bg--2"></div>

            <div class="index-hero__inner">
                <h2 class="index-hero__title">Property For Rent</h2>

                <form class="index-filter idex_form_padding" id="rentFilterForm">
                    <input type="hidden" name="nonce" value="<?php echo esc_attr($nonce); ?>">
                    <input type="hidden" name="paged" value="1">

                    <div class="index-row index-row--top">
                        <select name="purpose" class="index-input">
                            <option value="For Rent">For Rent</option>
                            <?php foreach ($purpose_options as $v): ?>
                                <option value="<?php echo esc_attr($v); ?>"><?php echo esc_html(rent_pretty_label($v)); ?></option>
                            <?php endforeach; ?>
                        </select>

                        <select name="status" class="index-input">
                            <option value="">All Status</option>
                            <?php foreach ($status_options as $v): ?>
                                <option value="<?php echo esc_attr($v); ?>"><?php echo esc_html(rent_pretty_label($v)); ?></option>
                            <?php endforeach; ?>
                        </select>

                        <div class="rent-search-wrap">
                            <input type="text" name="s" class="index-input" id="rentLiveSearch" placeholder="Search by title, address, area or unit reference..." autocomplete="off" />
                            <div id="rentSearchSuggest" class="rent-search-suggest"></div>
                        </div>

                        <button type="submit" class="index-btn">FIND</button>
                    </div>

                    <div class="index-row index-row--bottom">
                        <input type="number" name="min_price" class="index-input" placeholder="Min. Price">
                        <input type="number" name="max_price" class="index-input" placeholder="Max. Price">
                        <input type="number" name="min_beds" class="index-input" placeholder="Min. Beds">
                        <input type="number" name="min_baths" class="index-input" placeholder="Min. Baths">
                        <input type="number" name="min_size" class="index-input" placeholder="Min. Size (sqft)">
                        <input type="number" name="max_size" class="index-input" placeholder="Max. Size (sqft)">
                    </div>

                    <div class="index-row index-row--toolbar">
                        <div class="index-count" id="rentCount">—</div>
                        <select class="index-input index-input--small" name="sort">
                            <option value="newest">Newest</option>
                            <option value="price_asc">Price: Low</option>
                            <option value="price_desc">Price: High</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div id="rentResults_" class="index-results_1"></div>

        <div class="index-pagination">
            <button class="rent-index-page index-page" data-dir="prev" type="button">Prev</button>
            <span id="rentPageInfo">—</span>
            <button class="rent-index-page index-page" data-dir="next" type="button">Next</button>
        </div>
    </div>
    <?php
    return ob_get_clean();
});

/**
 * AJAX
 */
add_action('wp_ajax_rent_filter_porpertypi_dynamic', 'rent_filter_porpertypi_dynamic');
add_action('wp_ajax_nopriv_rent_filter_porpertypi_dynamic', 'rent_filter_porpertypi_dynamic');

add_action('wp_ajax_rent_search_suggestions', 'rent_search_suggestions');
add_action('wp_ajax_nopriv_rent_search_suggestions', 'rent_search_suggestions');

function rent_filter_porpertypi_dynamic() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'rent_filter_nonce')) {
        wp_send_json_error(['message' => 'Invalid nonce']);
    }

    $paged = isset($_POST['paged']) ? max(1, (int) $_POST['paged']) : 1;
    $s     = isset($_POST['s']) ? sanitize_text_field($_POST['s']) : '';

    $purpose = isset($_POST['purpose']) ? sanitize_text_field($_POST['purpose']) : '';
    $status  = isset($_POST['status']) ? sanitize_text_field($_POST['status']) : '';

    $min_price = ($_POST['min_price'] ?? '') !== '' ? (int) $_POST['min_price'] : null;
    $max_price = ($_POST['max_price'] ?? '') !== '' ? (int) $_POST['max_price'] : null;
    $min_beds  = ($_POST['min_beds'] ?? '') !== '' ? (int) $_POST['min_beds'] : null;
    $min_baths = ($_POST['min_baths'] ?? '') !== '' ? (int) $_POST['min_baths'] : null;
    $min_size  = ($_POST['min_size'] ?? '') !== '' ? (int) $_POST['min_size'] : null;
    $max_size  = ($_POST['max_size'] ?? '') !== '' ? (int) $_POST['max_size'] : null;

    $sort = isset($_POST['sort']) ? sanitize_text_field($_POST['sort']) : 'newest';

    $meta_query = [
        'relation' => 'AND',
    ];

    $meta_query[] = [
        'key'     => RENT_INDEX_META_EXPIRED_DATE,
        'value'   => date('Y-m-d'),
        'compare' => '>=',
        'type'    => 'DATE',
    ];

    if ($purpose !== '') {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_PURPOSE,
            'value'   => $purpose,
            'compare' => '='
        ];
    }

    if ($status !== '') {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_STATUS,
            'value'   => $status,
            'compare' => '='
        ];
    }

    if ($min_price !== null) {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_PRICE,
            'value'   => $min_price,
            'type'    => 'NUMERIC',
            'compare' => '>='
        ];
    }

    if ($max_price !== null) {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_PRICE,
            'value'   => $max_price,
            'type'    => 'NUMERIC',
            'compare' => '<='
        ];
    }

    if ($min_beds !== null) {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_BEDS,
            'value'   => $min_beds,
            'type'    => 'NUMERIC',
            'compare' => '>='
        ];
    }

    if ($min_baths !== null) {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_BATHS,
            'value'   => $min_baths,
            'type'    => 'NUMERIC',
            'compare' => '>='
        ];
    }

    if ($min_size !== null) {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_SIZE,
            'value'   => $min_size,
            'type'    => 'NUMERIC',
            'compare' => '>='
        ];
    }

    if ($max_size !== null) {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_SIZE,
            'value'   => $max_size,
            'type'    => 'NUMERIC',
            'compare' => '<='
        ];
    }

    $orderby  = 'date';
    $order    = 'DESC';
    $meta_key = '';

    if ($sort === 'price_asc') {
        $orderby  = 'meta_value_num';
        $order    = 'ASC';
        $meta_key = RENT_INDEX_META_PRICE;
    }

    if ($sort === 'price_desc') {
        $orderby  = 'meta_value_num';
        $order    = 'DESC';
        $meta_key = RENT_INDEX_META_PRICE;
    }

    $post__in = [];

    if ($s !== '') {
        $title_ids = get_posts([
            'post_type'      => RENT_INDEX_CPT,
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            's'              => $s,
            'meta_query'     => [
                [
                    'key'     => RENT_INDEX_META_EXPIRED_DATE,
                    'value'   => date('Y-m-d'),
                    'compare' => '>=',
                    'type'    => 'DATE',
                ],
            ],
        ]);

        $area_ids = get_posts([
            'post_type'      => RENT_INDEX_CPT,
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'meta_query'     => [
                [
                    'key'     => RENT_INDEX_META_EXPIRED_DATE,
                    'value'   => date('Y-m-d'),
                    'compare' => '>=',
                    'type'    => 'DATE',
                ],
                [
                    'key'     => RENT_INDEX_META_AREA,
                    'value'   => $s,
                    'compare' => 'LIKE',
                ],
            ],
        ]);

        $unit_reference_ids = get_posts([
            'post_type'      => RENT_INDEX_CPT,
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'meta_query'     => [
                [
                    'key'     => RENT_INDEX_META_EXPIRED_DATE,
                    'value'   => date('Y-m-d'),
                    'compare' => '>=',
                    'type'    => 'DATE',
                ],
                [
                    'key'     => RENT_INDEX_META_UNIT_REFERENCE,
                    'value'   => $s,
                    'compare' => 'LIKE',
                ],
            ],
        ]);

        $address_ids = get_posts([
            'post_type'      => RENT_INDEX_CPT,
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'meta_query'     => [
                [
                    'key'     => RENT_INDEX_META_EXPIRED_DATE,
                    'value'   => date('Y-m-d'),
                    'compare' => '>=',
                    'type'    => 'DATE',
                ],
                [
                    'key'     => RENT_INDEX_META_ADDRESS,
                    'value'   => $s,
                    'compare' => 'LIKE',
                ],
            ],
        ]);

        $post__in = array_values(array_unique(array_merge($title_ids, $area_ids, $unit_reference_ids, $address_ids)));

        if (empty($post__in)) {
            $post__in = [0];
        }
    }

    $args = [
        'post_type'      => RENT_INDEX_CPT,
        'post_status'    => 'publish',
        'posts_per_page' => 20,
        'paged'          => $paged,
        'meta_query'     => $meta_query,
        'orderby'        => $orderby,
        'order'          => $order,
    ];

    if ($meta_key) {
        $args['meta_key'] = $meta_key;
    }

    if (!empty($post__in)) {
        $args['post__in'] = $post__in;
    }

    $q = new WP_Query($args);

    ob_start();
    if ($q->have_posts()) {
        echo '<div class="index-grid">';
        while ($q->have_posts()) {
            $q->the_post();
            $id = get_the_ID();

            $price = (int) get_post_meta($id, RENT_INDEX_META_PRICE, true);
            $beds  = (int) get_post_meta($id, RENT_INDEX_META_BEDS, true);
            $baths = (int) get_post_meta($id, RENT_INDEX_META_BATHS, true);
            $size  = (int) get_post_meta($id, RENT_INDEX_META_SIZE, true);
            $location = get_post_meta(get_the_ID(), 'pp_address', true);

            $pval = get_post_meta($id, RENT_INDEX_META_PURPOSE, true);
            $sval = get_post_meta($id, RENT_INDEX_META_STATUS, true);
            ?>
            <div href="<?php echo esc_url(get_permalink($id)); ?>" class="index-card">
                <div class="index-card__img">
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php
                    if (has_post_thumbnail($id)) {
                        echo get_the_post_thumbnail($id, 'large', ['loading' => 'lazy']);
                    } else {
                        echo '<div class="index-ph">No Image</div>';
                    }
                    ?>
                    </a>
                    <div class="index-badges">
                        <?php if ($pval !== ''): ?>
                            <span class="index-badge"><?php echo esc_html(rent_pretty_label($pval)); ?></span>
                        <?php endif; ?>
                        <?php if ($sval !== ''): ?>
                            <span class="index-badge index-badge--dark"><?php echo esc_html(rent_pretty_label($sval)); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="index-card__body">
                    <div class="index-price"><?php echo esc_html(number_format_i18n($price)); ?> AED</div>

                    <div class="index-title" onclick="window.location.href='<?php echo esc_url(get_permalink()); ?>'" style="cursor:pointer;">
                        <?php echo esc_html(get_the_title($id)); ?> 
                    </div>
                    <div class="np-loc"><?php echo esc_html($location); ?></div>

                    <div class="author_details">
                        <div class="avatar">
                            <?php
                            $aid = get_the_author_meta('ID');
                            echo get_avatar($aid, 48);
                            ?>
                        </div>
                        <div class="avatar-name">
                            <?php
                            $author_id = get_the_author_meta('ID');
                            echo esc_html(get_the_author_meta('display_name', $author_id));
                            ?>
                        </div>
                    </div>

                    <div class="index-meta">
                        <span><?php echo esc_html($beds); ?> Beds</span>
                        <span><?php echo esc_html($baths); ?> Baths</span>
                        <span><?php echo esc_html($size); ?> sqft</span>
                    </div>

                    <div class="index-meta">
                        <button
                            class="cta sell-btn enquire_button rentSellOpenModal3"
                            style="padding:14px;width:100%;border-radius:14px;background:var(--clr-primary);font-weight:900;border:1px solid var(--clr-primary);color:white;font-family:'Poppins', sans-serif;"
                            type="button"
                        >
                            Enquire Now
                        </button>
                    </div>

                    <div class="rent-sell-modal rentSellModal3" aria-hidden="true">
                        <div class="rent-sell-modal__backdrop" data-rent-close2="1"></div>

                        <div class="rent-sell-modal__dialog" role="dialog" aria-modal="true">
                            <button class="rent-sell-modal__close" type="button" data-rent-close2="1">✕</button>

                            <div class="rent-sell-modal__grid">
                                <?php echo do_shortcode('[button_contact_form_direct]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        echo '</div>';
    } else {
        echo '<div class="index-empty">No properties found.</div>';
    }
    wp_reset_postdata();

    wp_send_json_success([
        'html'      => ob_get_clean(),
        'found'     => (int) $q->found_posts,
        'max_pages' => (int) $q->max_num_pages,
        'paged'     => $paged,
    ]);
}

function rent_search_suggestions() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'rent_filter_nonce')) {
        wp_send_json_error(['message' => 'Invalid nonce']);
    }

    $term = isset($_POST['term']) ? sanitize_text_field(wp_unslash($_POST['term'])) : '';
    $term = trim($term);

    if ($term === '') {
        wp_send_json_success(['items' => []]);
    }

    $purpose = isset($_POST['purpose']) ? sanitize_text_field(wp_unslash($_POST['purpose'])) : '';
    $status  = isset($_POST['status']) ? sanitize_text_field(wp_unslash($_POST['status'])) : '';

    $min_price = (isset($_POST['min_price']) && $_POST['min_price'] !== '') ? (int) $_POST['min_price'] : null;
    $max_price = (isset($_POST['max_price']) && $_POST['max_price'] !== '') ? (int) $_POST['max_price'] : null;
    $min_beds  = (isset($_POST['min_beds']) && $_POST['min_beds'] !== '') ? (int) $_POST['min_beds'] : null;
    $min_baths = (isset($_POST['min_baths']) && $_POST['min_baths'] !== '') ? (int) $_POST['min_baths'] : null;
    $min_size  = (isset($_POST['min_size']) && $_POST['min_size'] !== '') ? (int) $_POST['min_size'] : null;
    $max_size  = (isset($_POST['max_size']) && $_POST['max_size'] !== '') ? (int) $_POST['max_size'] : null;

    $sort = isset($_POST['sort']) ? sanitize_text_field(wp_unslash($_POST['sort'])) : 'newest';

    $meta_query = [
        'relation' => 'AND',
        [
            'key'     => RENT_INDEX_META_EXPIRED_DATE,
            'value'   => date('Y-m-d'),
            'compare' => '>=',
            'type'    => 'DATE',
        ],
    ];

    if ($purpose !== '') {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_PURPOSE,
            'value'   => $purpose,
            'compare' => '=',
        ];
    }

    if ($status !== '') {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_STATUS,
            'value'   => $status,
            'compare' => '=',
        ];
    }

    if ($min_price !== null) {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_PRICE,
            'value'   => $min_price,
            'type'    => 'NUMERIC',
            'compare' => '>=',
        ];
    }

    if ($max_price !== null) {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_PRICE,
            'value'   => $max_price,
            'type'    => 'NUMERIC',
            'compare' => '<=',
        ];
    }

    if ($min_beds !== null) {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_BEDS,
            'value'   => $min_beds,
            'type'    => 'NUMERIC',
            'compare' => '>=',
        ];
    }

    if ($min_baths !== null) {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_BATHS,
            'value'   => $min_baths,
            'type'    => 'NUMERIC',
            'compare' => '>=',
        ];
    }

    if ($min_size !== null) {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_SIZE,
            'value'   => $min_size,
            'type'    => 'NUMERIC',
            'compare' => '>=',
        ];
    }

    if ($max_size !== null) {
        $meta_query[] = [
            'key'     => RENT_INDEX_META_SIZE,
            'value'   => $max_size,
            'type'    => 'NUMERIC',
            'compare' => '<=',
        ];
    }

    $title_ids = get_posts([
        'post_type'      => RENT_INDEX_CPT,
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        's'              => $term,
        'meta_query'     => $meta_query,
    ]);

    $area_ids = get_posts([
        'post_type'      => RENT_INDEX_CPT,
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'meta_query'     => array_merge($meta_query, [
            [
                'key'     => RENT_INDEX_META_AREA,
                'value'   => $term,
                'compare' => 'LIKE',
            ],
        ]),
    ]);

    $unit_reference_ids = get_posts([
        'post_type'      => RENT_INDEX_CPT,
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'meta_query'     => array_merge($meta_query, [
            [
                'key'     => RENT_INDEX_META_UNIT_REFERENCE,
                'value'   => $term,
                'compare' => 'LIKE',
            ],
        ]),
    ]);

    $address_ids = get_posts([
        'post_type'      => RENT_INDEX_CPT,
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'meta_query'     => array_merge($meta_query, [
            [
                'key'     => RENT_INDEX_META_ADDRESS,
                'value'   => $term,
                'compare' => 'LIKE',
            ],
        ]),
    ]);

    $matched_ids = array_values(array_unique(array_merge(
        $title_ids,
        $area_ids,
        $unit_reference_ids,
        $address_ids
    )));

    if (empty($matched_ids)) {
        wp_send_json_success(['items' => []]);
    }

    $orderby  = 'date';
    $order    = 'DESC';
    $meta_key = '';

    if ($sort === 'price_asc') {
        $orderby  = 'meta_value_num';
        $order    = 'ASC';
        $meta_key = RENT_INDEX_META_PRICE;
    }

    if ($sort === 'price_desc') {
        $orderby  = 'meta_value_num';
        $order    = 'DESC';
        $meta_key = RENT_INDEX_META_PRICE;
    }

    $suggest_args = [
        'post_type'      => RENT_INDEX_CPT,
        'post_status'    => 'publish',
        'posts_per_page' => 8,
        'post__in'       => $matched_ids,
        'meta_query'     => $meta_query,
        'orderby'        => $orderby,
        'order'          => $order,
    ];

    if ($meta_key) {
        $suggest_args['meta_key'] = $meta_key;
    }

    $suggest_query = new WP_Query($suggest_args);
    $items = [];

    if ($suggest_query->have_posts()) {
        while ($suggest_query->have_posts()) {
            $suggest_query->the_post();

            $id             = get_the_ID();
            $title          = get_the_title($id);
            $address        = get_post_meta($id, RENT_INDEX_META_ADDRESS, true);
            $area           = get_post_meta($id, RENT_INDEX_META_AREA, true);
            $unit_reference = get_post_meta($id, RENT_INDEX_META_UNIT_REFERENCE, true);
            $search_text    = $title;

            if ($address !== '' && stripos($address, $term) !== false) {
                $search_text = $address;
            } elseif ($area !== '' && stripos($area, $term) !== false) {
                $search_text = $area;
            } elseif ($unit_reference !== '' && stripos($unit_reference, $term) !== false) {
                $search_text = $unit_reference;
            }

            $items[] = [
                'title'          => $title,
                'address'        => $address,
                'area'           => $area,
                'unit_reference' => $unit_reference,
                'url'            => get_permalink($id),
                'search_text'    => $search_text,
            ];
        }

        wp_reset_postdata();
    }

    wp_send_json_success([
        'items' => array_values($items),
    ]);
}

/**
 * Dynamic dropdown values from postmeta
 */
function rent_get_distinct_meta_values($meta_key) {
    global $wpdb;

    $sql = $wpdb->prepare("
        SELECT DISTINCT pm.meta_value
        FROM {$wpdb->postmeta} pm
        INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = %s
          AND p.post_type = %s
          AND p.post_status = 'publish'
          AND pm.meta_value <> ''
        ORDER BY pm.meta_value ASC
    ", $meta_key, RENT_INDEX_CPT);

    $vals = $wpdb->get_col($sql);

    if (!is_array($vals)) {
        return [];
    }

    $vals = array_map('sanitize_text_field', $vals);
    $vals = array_filter($vals, function ($v) {
        return $v !== '';
    });
    $vals = array_values(array_unique($vals));

    return $vals;
}

function rent_pretty_label($v) {
    $v = trim((string) $v);
    $v = str_replace(['-', '_'], ' ', $v);
    $v = preg_replace('/\s+/', ' ', $v);
    return ucwords($v);
}

/**
 * CSS/JS
 */
add_action('wp_enqueue_scripts', function () {
    wp_register_style('rent-index-style', false);
    wp_enqueue_style('rent-index-style');

    wp_add_inline_style('rent-index-style', "
:root{
  --f:Poppins,system-ui;
  --t:#0f172a;
  --m:#64748b;
  --l:#e5e7eb;
  --b:var(--clr-primary);
  --b2:#0a56b3;
  --s:0 10px 30px rgb(146 150 161 / 14%);
  --r:14px;
}
html,body{
  overflow-x:hidden;
}
header.header{
  width:100%;
  max-width:1200px;
  margin:0 auto;
}
.container{
  max-width:100%;
  margin:0;
  padding:0;
}
.index-wrap{
  max-width:1200px;
  margin:0 auto 60px;
  padding:16px;
  font-family:var(--f);
}
.index-hero {
    position: relative;
    width: 100vw;
    height: 800px;
    margin-left: calc(50% - 50vw);
    margin-right: calc(50% - 50vw);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    box-shadow: var(--s);
    margin-bottom: 14px;
    border-radius: 0px !important;
}
.index-hero__inner {
    position: relative;
    width: 100%;
    max-width: 1400px;
    margin: auto;
    padding: 24px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 3;
}
.index-hero__title{
  margin:0 0 12px;
  text-align:center;
  color:#fff;
  font-size:34px;
  font-weight:900;
}
form#rentFilterForm{
  display:flex;
  flex-direction:column;
  gap:9px;
  padding:50px;
}
.index-filter{
  background:rgba(255,255,255,.88);
  backdrop-filter:blur(10px);
  border:1px solid rgba(229,231,235,.9);
  border-radius:14px;
  box-shadow:0 18px 40px rgba(2,8,23,.12);
  padding:12px;
}
.index-row{
  display:grid;
  gap:10px;
}
.index-row--top{
  grid-template-columns:170px 170px 1fr 140px;
  align-items:start;
}
.index-row--bottom{
  grid-template-columns:repeat(6,minmax(0,1fr));
}
.index-row--toolbar{
  grid-template-columns:1fr auto;
  align-items:center;
  margin-top:10px;
}
.index-input{
  width:100%;
  padding:12px;
  border:1px solid var(--l);
  border-radius:10px;
  font-family:var(--f);
}
.index-input--small{
  padding:10px 12px;
}
.index-btn{
  padding:12px;
  border:0;
  border-radius:10px;
  background:var(--b);
  color:#fff;
  font-weight:900;
  cursor:pointer;
}
.index-btn:hover{
  background:var(--b2);
}
.index-results_1{
  max-width:1400px;
  margin:80px auto 58px;
  min-height:120px;
}
.index-results_1.is-loading{
  opacity:.6;
  pointer-events:none;
}
.index-count{
  color:var(--m);
  font-weight:900;
}
.index-grid{
  display:grid;
  grid-template-columns:repeat(3,minmax(0,1fr));
  gap:40px;
}
.index-card{
  display:block;
  text-decoration:none;
  background:#fff;
  border:1px solid var(--l);
  border-radius:var(--r);
  overflow:hidden;
  box-shadow:var(--s);
}
.index-card__img{
  position:relative;
}
.index-card__img img{
  width:100%;
  height:190px;
  object-fit:cover;
  display:block;
}
.index-ph{
  height:190px;
  display:grid;
  place-items:center;
  background:#f1f5f9;
  color:#64748b;
  font-weight:800;
}
.index-badges{
  position:absolute;
  top:12px;
  left:12px;
  display:flex;
  gap:8px;
}
.index-badge{
  background:rgba(255, 0, 0, 0.95);
  color:#fff;
  font-size:11px;
  font-weight:900;
  padding:6px 10px;
  border-radius:999px;
}
.index-badge--dark{
  background:rgba(15,23,42,.85);
}
.index-card__body{
  padding:12px;
  display:flex;
  flex-direction:column;
  gap:10px;
}
.index-price{
  font-size:18px;
  font-weight:600;
  color:var(--b);
}
.index-title{
  margin-top:6px;
  color:var(--t);
  font-weight:400;
  line-height:1.25;
}
.index-meta{
  display:flex;
  gap:12px;
  margin-top:8px;
  color:var(--m);
  font-size:12px;
  font-weight:700;
}
.author_details{
  display:flex;
  gap:5px;
}
.avatar-name{
  display:flex;
  flex-direction:column;
  justify-content:center;
  color:#000;
}
.avatar-name h6{
  margin:0;
}
.index-empty{
  padding:18px;
  border:1px dashed #cbd5e1;
  border-radius:var(--r);
  background:#fff;
  color:var(--m);
  font-weight:700;
}
.index-pagination{
  display:flex;
  gap:10px;
  justify-content:center;
  align-items:center;
  margin-top:14px;
}
.index-page{
  border:1px solid var(--l);
  background:#fff;
  border-radius:10px;
  padding:10px 12px;
  cursor:pointer;
  font-weight:900;
}
.index-page:disabled{
  opacity:.5;
  cursor:not-allowed;
}
.rent-sell-modal{
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: none;
}
.rent-sell-modal.is-open{
    display: block;
}
.rent-sell-modal__backdrop{
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.65);
}
.rent-sell-modal__dialog{
    position: relative;
    width: min(1100px, calc(100vw - 32px));
    margin: 40px auto;
    background: #fff;
    border-radius: 18px;
    padding: 28px;
    z-index: 2;
    max-height: calc(100vh - 80px);
    overflow-y: auto;
}
.rent-sell-modal__close{
    position: absolute;
    top: 12px;
    right: 12px;
    border: none;
    background: #000;
    color: #fff;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    cursor: pointer;
}
.rent-sell-modal__grid{
    width: 100%;
}
.rent-search-wrap{
  position:relative;
  width:100%;
}
.rent-search-suggest{
  position:absolute;
  top:calc(100% + 6px);
  left:0;
  right:0;
  background:#fff;
  border:1px solid #e5e7eb;
  border-radius:12px;
  box-shadow:0 12px 30px rgba(2,8,23,.12);
  z-index:9999;
  display:none;
  max-height:320px;
  overflow-y:auto;
}
.rent-search-suggest.is-open{
  display:block;
}
.rent-search-item{
  padding:12px 14px;
  border-bottom:1px solid #f1f5f9;
  cursor:pointer;
}
.rent-search-item:last-child{
  border-bottom:none;
}
.rent-search-item:hover{
  background:#f8fafc;
}
.rent-search-item__title{
  font-weight:700;
  color:#0f172a;
  font-size:14px;
  line-height:1.3;
}
.rent-search-item__meta{
  margin-top:4px;
  font-size:12px;
  color:#64748b;
}
@media(max-width:1024px){
  .index-row--top{grid-template-columns:1fr 1fr}
  .index-row--bottom{grid-template-columns:1fr 1fr}
  .index-grid{grid-template-columns:repeat(2,1fr)}
  .rent-sell-modal__dialog{
    width: min(900px, calc(100vw - 24px));
    padding: 22px;
  }
}
@media(max-width:640px){
  .index-hero{height:580px}
  .index-grid{grid-template-columns:1fr}
  .index-row--toolbar{grid-template-columns:1fr}
  form#rentFilterForm {
      display: flex;
      flex-direction: column;
      gap: 9px;
      padding: 20px;
  }
  .index-input {
      width: 100%;
      padding: 12px 5px;
      border: 1px solid var(--l);
      border-radius: 10px;
      font-family: var(--f);
  }
  .index-row {
      display: grid;
      gap: 5px;
  }
  select.index-input {
      font-size: 12px;
  }
  .index-input {
    font-size: 13px;
  }
  .rent-sell-modal__dialog{
    width: calc(100vw - 20px);
    margin: 20px auto;
    padding: 18px;
    border-radius: 14px;
    max-height: calc(100vh - 40px);
  }
}
");

    wp_register_script('rent-index-js', false, ['jquery'], null, true);
    wp_enqueue_script('rent-index-js');

    $ajax_url = admin_url('admin-ajax.php');

    wp_add_inline_script('rent-index-js', "
        (function($){
            const ajaxUrl = " . json_encode($ajax_url) . ";

            const rent_img_1 = " . json_encode(get_theme_mod('rent_img_1',get_template_directory_uri() . '/assets/filter_bg_image/nelemson-guevarra-3Pu21dk2e1Y-unsplash.jpg')) . ";
            const rent_img_2 = " . json_encode(get_theme_mod('rent_img_2',get_template_directory_uri() . '/assets/filter_bg_image/nelemson-guevarra-eCS02JdJBuI-unsplash.jpg')) . ";
            const rent_img_3 = " . json_encode(get_theme_mod('rent_img_3',get_template_directory_uri() . '/assets/filter_bg_image/riyas-mohammed-syA-NZnb2pA-unsplash.jpg')) . ";
            const rent_img_4 = " . json_encode(get_theme_mod('rent_img_4',get_template_directory_uri() . '/assets/filter_bg_image/shibin-joseph-GsTqt8M0fls-unsplash.jpg')) . ";
            const rent_img_5 = " . json_encode(get_theme_mod('rent_img_5',get_template_directory_uri() . '/assets/filter_bg_image/shibin-joseph-yP8oPC3_v38-unsplash.jpg')) . ";
            const rent_img_6 = " . json_encode(get_theme_mod('rent_img_6',get_template_directory_uri() . '/assets/filter_bg_image/thomas-haas-wfANLGIhOtM-unsplash.jpg')) . ";
            const rent_img_7 = " . json_encode(get_theme_mod('rent_img_7',get_template_directory_uri() . '/assets/filter_bg_image/upscalemedia-transformed.jpg')) . ";
            const rent_img_8 = " . json_encode(get_theme_mod('rent_img_7',get_template_directory_uri() . '/assets/filter_bg_image/wmremove-transformed.jpg')) . ";

            const rentHeroImages = [
                rent_img_1,
                rent_img_2,
                rent_img_3,
                rent_img_4,
                rent_img_5,
                rent_img_6,
                rent_img_7,
                rent_img_8,
            ].filter(Boolean);

            let rentHeroStarted = false;
            let rentHeroCurrentLayer = 1;
            let rentHeroCurrentIndex = 0;
            let rentSearchTimer = null;

            function preloadRentHeroImages() {
                rentHeroImages.forEach(function(src){
                    const img = new Image();
                    img.src = src;
                });
            }

            function setLayerBg(layer, imageUrl){
                if(!layer) return;
                layer.style.backgroundImage = 'url(\"' + imageUrl + '\")';
            }

            function showLayer(layerToShow, layerToHide){
                if(layerToShow){
                    layerToShow.classList.add('is-active');
                }
                if(layerToHide){
                    layerToHide.classList.remove('is-active');
                }
            }

            function startRentHeroSlider(){
                if(rentHeroStarted || !rentHeroImages.length) return;
                rentHeroStarted = true;

                const bg1 = document.querySelector('.rent-hero__bg--1');
                const bg2 = document.querySelector('.rent-hero__bg--2');

                if(!bg1 || !bg2) return;

                preloadRentHeroImages();

                rentHeroCurrentIndex = Math.floor(Math.random() * rentHeroImages.length);

                setLayerBg(bg1, rentHeroImages[rentHeroCurrentIndex]);
                bg1.classList.add('is-active');
                bg2.classList.remove('is-active');

                setInterval(function(){
                    rentHeroCurrentIndex = (rentHeroCurrentIndex + 1) % rentHeroImages.length;

                    const nextImage = rentHeroImages[rentHeroCurrentIndex];

                    if(rentHeroCurrentLayer === 1){
                        setLayerBg(bg2, nextImage);
                        showLayer(bg2, bg1);
                        rentHeroCurrentLayer = 2;
                    } else {
                        setLayerBg(bg1, nextImage);
                        showLayer(bg1, bg2);
                        rentHeroCurrentLayer = 1;
                    }
                }, 5000);
            }

            function escapeHtml(str){
                return String(str || '')
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/\"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            function hideRentSuggestions(){
                $('#rentSearchSuggest').removeClass('is-open').html('');
            }

            function renderRentSuggestions(items){
                const \$box = $('#rentSearchSuggest');

                if(!items || !items.length){
                    hideRentSuggestions();
                    return;
                }

                let html = '';
                items.forEach(function(item){
                    const searchText = item.search_text || item.title || item.address || item.area || item.unit_reference || '';

                    html += '<div class=\"rent-search-item\" data-search=\"' + escapeHtml(searchText) + '\" data-url=\"' + escapeHtml(item.url) + '\">';
                    html += '<div class=\"rent-search-item__title\">' + escapeHtml(item.title) + '</div>';

                    if(item.address){
                        html += '<div class=\"rent-search-item__meta\">Address: ' + escapeHtml(item.address) + '</div>';
                    }

                    if(item.area){
                        html += '<div class=\"rent-search-item__meta\">Area: ' + escapeHtml(item.area) + '</div>';
                    }

                    if(item.unit_reference){
                        html += '<div class=\"rent-search-item__meta\">Unit Ref: ' + escapeHtml(item.unit_reference) + '</div>';
                    }

                    html += '</div>';
                });

                \$box.html(html).addClass('is-open');
            }

            function fetchRentSuggestions(term){
                const \$f = $('#rentFilterForm');
                const data = toObj(\$f.serializeArray());

                data.action = 'rent_search_suggestions';
                data.nonce = \$f.find('input[name=\"nonce\"]').val();
                data.term = term;

                $.post(ajaxUrl, data).done(function(res){
                    if(!res || !res.success || !res.data){
                        hideRentSuggestions();
                        return;
                    }
                    renderRentSuggestions(res.data.items || []);
                }).fail(function(){
                    hideRentSuggestions();
                });
            }

            function toObj(arr){
                const o = {};
                arr.forEach(x => o[x.name] = x.value);
                return o;
            }

            function loading(on){
                $('#rentResults_').toggleClass('is-loading', !!on);
            }

            function bindRentModal(){
                const openBtns = document.querySelectorAll('.rentSellOpenModal3');
                const modals = document.querySelectorAll('.rentSellModal3');

                openBtns.forEach(function(btn, index){
                    btn.addEventListener('click', function(e){
                        e.preventDefault();
                        const modal = modals[index];
                        if (!modal) return;

                        modal.classList.add('is-open');
                        modal.setAttribute('aria-hidden', 'false');
                        document.body.style.overflow = 'hidden';

                        const first = modal.querySelector('input, textarea, select, button');
                        if (first) {
                            setTimeout(function(){ first.focus(); }, 50);
                        }
                    });
                });

                modals.forEach(function(modal){
                    modal.addEventListener('click', function(e){
                        const el = e.target;
                        if (el && el.getAttribute && el.getAttribute('data-rent-close2') === '1') {
                            modal.classList.remove('is-open');
                            modal.setAttribute('aria-hidden', 'true');
                            document.body.style.overflow = '';
                        }
                    });
                });

                document.addEventListener('keydown', function(e){
                    if (e.key !== 'Escape') return;
                    document.querySelectorAll('.rentSellModal3.is-open').forEach(function(modal){
                        modal.classList.remove('is-open');
                        modal.setAttribute('aria-hidden', 'true');
                        document.body.style.overflow = '';
                    });
                });
            }

            function fetchProps(page){
                const \$f = $('#rentFilterForm');
                if (!\$f.length) return;

                const data = toObj(\$f.serializeArray());
                data.action = 'rent_filter_porpertypi_dynamic';
                data.paged = page || 1;

                loading(true);

                $.post(ajaxUrl, data).done(function(res){
                    loading(false);

                    if(!res || !res.success){
                        $('#rentResults_').html('<div class=\"index-empty\">Error</div>');
                        return;
                    }

                    $('#rentResults_').html(res.data.html);
                    $('#rentCount').text((res.data.found || 0) + ' results');
                    $('#rentPageInfo').text((res.data.paged || 1) + ' / ' + (res.data.max_pages || 1));

                    const pg = res.data.paged || 1;
                    const max = res.data.max_pages || 1;

                    $('.rent-index-page[data-dir=\"prev\"]').prop('disabled', pg <= 1);
                    $('.rent-index-page[data-dir=\"next\"]').prop('disabled', pg >= max);

                    \$f.find('input[name=\"paged\"]').val(pg);

                    bindRentModal();
                }).fail(function(){
                    loading(false);
                    $('#rentResults_').html('<div class=\"index-empty\">Request failed</div>');
                });
            }

            $(document).ready(function(){
                startRentHeroSlider();
                fetchProps(1);
            });

            $(document).on('submit', '#rentFilterForm', function(e){
                e.preventDefault();
                hideRentSuggestions();
                fetchProps(1);
            });

            $(document).on('change', '#rentFilterForm select', function(){
                fetchProps(1);
            });

            $(document).on('click', '.rent-index-page', function(){
                const dir = $(this).data('dir');
                const cur = parseInt($('#rentFilterForm input[name=\"paged\"]').val() || '1', 10);
                fetchProps(dir === 'next' ? cur + 1 : cur - 1);
            });

            $(document).on('input', '#rentLiveSearch', function(){
                const val = $(this).val().trim();

                clearTimeout(rentSearchTimer);

                if(val.length < 1){
                    hideRentSuggestions();
                    return;
                }

                rentSearchTimer = setTimeout(function(){
                    fetchRentSuggestions(val);
                }, 300);
            });

            $(document).on('click', '.rent-search-item', function(){
                const searchText = $(this).data('search') || '';
                $('#rentLiveSearch').val(searchText);
                hideRentSuggestions();
                fetchProps(1);
            });

            $(document).on('click', function(e){
                if(!$(e.target).closest('.rent-search-wrap').length){
                    hideRentSuggestions();
                }
            });

        })(jQuery);
    ");
});


// recent post of this cpt("porpertypi") under this meta(pp_purpose = "For Rent") -======================================================
// ✅ Shortcode: [reaf_recent_properties posts="6"]
add_shortcode('reaf_recent_properties', function ($atts) {


    $q = new WP_Query([
        'post_type'      => 'porpertypi',
        'posts_per_page' => 6,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',

        'meta_query' => [
            [
                'key'     => 'pp_purpose', // meta field নাম
                'value'   => 'For Rent',
                'compare' => '='
            ]
        ]
    ]);

    if (!$q->have_posts()) return '<div class="reaf-front-empty">No properties found.</div>';

    ob_start(); ?>

    <section class="rent-cards">
        <div class="reaf-front-head">
            <h2>Recent Rent Property</h2>
            <p>Recently added listings with key details & amenities.</p>
        </div>

        <div class="rent-container">
            <div class="rent-cards__grid">
                <?php while ($q->have_posts()): $q->the_post();
                    $id = get_the_ID();

                    $price = get_post_meta($id, '_re_price', true);
                    $size  = get_post_meta($id, '_re_size_sqft', true);
                    $beds  = get_post_meta($id, '_re_beds', true);
                    $baths = get_post_meta($id, '_re_baths', true);

                    $purpose       = get_post_meta($id, 'pp_purpose', true);
                    $status        = get_post_meta($id, 'pp_status', true);
                    $emirate       = get_post_meta($id, 'pp_emirate', true);
                    $address       = get_post_meta($id, 'pp_address', true);
                    $property_name = get_post_meta($id, 'pp_property_name', true);
                    $added_on      = get_post_meta($id, 'pp_added_on', true);

                    $phone = get_post_meta($id, '_re_phone', true);
                    $email = get_post_meta($id, '_re_email', true);
                    $wa    = get_post_meta($id, '_re_whatsapp', true);

                    $gallery = get_post_meta($id, '_re_gallery_ids', true);
                    $first_gallery_id = 0;
                    if ($gallery) {
                        $ids = array_filter(array_map('absint', explode(',', $gallery)));
                        $first_gallery_id = $ids ? $ids[0] : 0;
                    }

                    $img = '';
                    if ($first_gallery_id) {
                        $img = wp_get_attachment_image($first_gallery_id, 'large');
                    } elseif (has_post_thumbnail($id)) {
                        $img = get_the_post_thumbnail($id, 'large');
                    }

                    $indor_keys   = ['indor_1', 'indor_2', 'indor_3', 'indor_4', 'indor_6', 'indor_7', 'indor_8'];
                    $outdoor_keys = ['outdoor_1', 'outdoor_2', 'outdoor_3', 'outdoor_4', 'outdoor_5', 'outdoor_6', 'outdoor_7', 'outdoor_8', 'outdoor_9', 'outdoor_10'];
                    $services_keys = ['services_1', 'services_2', 'services_3', 'services_4', 'services_5', 'services_6', 'services_7', 'services_8', 'services_9', 'services_10'];

                    $get_list = function ($keys) use ($id) {
                        $items = [];
                        foreach ($keys as $k) {
                            $v = trim((string)get_post_meta($id, $k, true));
                            if ($v !== '') $items[] = $v;
                        }
                        return $items;
                    };

                    $indor_list    = $get_list($indor_keys);
                    $outdoor_list  = $get_list($outdoor_keys);
                    $services_list = $get_list($services_keys);

                    $community_desc = get_post_meta($id, 'community_description', true);

                    $fmt_price = $price !== '' ? number_format_i18n((float)$price) : '';
                    $fmt_size  = $size  !== '' ? number_format_i18n((float)$size)  : '';
                ?>
                    <article class="rent-cardx" aria-label="rent property card">
                        <div class="rent-cardx__media">
                            <img
                                class="rent-cardx__img"
                                src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
                                alt="Property">

                            <div class="rent-cardx__badges">
                                <?php if ($status) : ?>
                                    <span class="rent-cardx__badge rent-cardx__badge--buy"><?php echo esc_html($status); ?></span>
                                <?php endif; ?>

                                <?php if ($purpose) : ?>
                                    <span class="rent-cardx__badge rent-cardx__badge--type"><?php echo esc_html($purpose); ?></span>
                                <?php endif; ?>
                            </div>

                            <button class="rent-cardx__fav" type="button" aria-label="Save to favorites">
                                <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
                                    <path
                                        d="M12 21s-7.2-4.35-9.6-8.6C.76 9.57 2.2 6.5 5.7 5.6c1.76-.45 3.33.2 4.3 1.3.97-1.1 2.54-1.75 4.3-1.3 3.5.9 4.94 3.97 3.3 6.8C19.2 16.65 12 21 12 21z"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>

                            <div class="rent-cardx__watermark d-none">METROPOLITAN</div>
                        </div>

                        <div class="rent-cardx__body">
                            <div class="rent-cardx__price"><?php echo esc_html($fmt_price); ?> AED</div>

                            <div class="rent-cardx__specs">
                                <div class="rent-cardx__spec">
                                    <div class="rent-cardx__specNum"><?php echo esc_html($beds); ?></div>
                                    <div class="rent-cardx__specLbl">Beds</div>
                                </div>
                                <div class="rent-cardx__spec">
                                    <div class="rent-cardx__specNum"><?php echo esc_html($baths); ?></div>
                                    <div class="rent-cardx__specLbl">Baths</div>
                                </div>
                                <div class="rent-cardx__spec">
                                    <div class="rent-cardx__specNum"><?php echo esc_html($fmt_size); ?></div>
                                    <div class="rent-cardx__specLbl">Square (ft)</div>
                                </div>
                            </div>

                            <h3 class="rent-cardx__title" onclick="window.location.href='<?php echo get_permalink(); ?>'" style="cursor:pointer;">
                                <?php the_title(); ?>
                            </h3>

                            <div class="rent-cardx__loc">
                                <svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true">
                                    <path
                                        d="M12 22s7-5.2 7-12a7 7 0 1 0-14 0c0 6.8 7 12 7 12z"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8" />
                                    <circle cx="12" cy="10" r="2.4" fill="none" stroke="currentColor" stroke-width="1.8" />
                                </svg>
                                <?php echo esc_html($address); ?>
                            </div>

                            <hr class="rent-cardx__hr" />

                            <div class="rent-cardx__agent">
                                <div class="rent-cardx__agentLogo" aria-hidden="true">
                                    <?php echo get_avatar(get_the_author_meta('ID')); ?>
                                </div>
                                <div class="rent-cardx__agentText">
                                    <div class="rent-cardx__agentTop">Listing by</div>
                                    <div class="rent-cardx__agentName"><?php echo esc_html(get_the_author_meta('display_name', get_the_author_meta('ID'))); ?></div>
                                </div>
                            </div>

                            <a class="rent-cardx__btn commercial-card-popup-open" href="#" data-popup="commercial-card-popup-<?php echo esc_attr($id); ?>">
                                Enquire Now
                            </a>
                        </div>

                        <div class="commercial-card-popup" id="commercial-card-popup-<?php echo esc_attr($id); ?>" aria-hidden="true">
                            <div class="commercial-card-popup__backdrop" data-commercial-popup-close="1"></div>

                            <div class="commercial-card-popup__dialog" role="dialog" aria-modal="true">
                                <button class="commercial-card-popup__close" type="button" aria-label="Close" data-commercial-popup-close="1">✕</button>

                                <div class="commercial-card-popup__grid">
                                    <?php echo do_shortcode('[button_contact_form_direct]'); ?>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <style>
        .commercial-card-popup{
            position:fixed;
            inset:0;
            z-index:99999;
            display:none;
        }

        .commercial-card-popup.is-open{
            display:block;
        }

        .commercial-card-popup__backdrop{
            position:absolute;
            inset:0;
            background:rgba(0,0,0,0.65);
        }

        .commercial-card-popup__dialog{
            position:relative;
            width:min(1100px, calc(100vw - 32px));
            margin:40px auto;
            background:#fff;
            border-radius:18px;
            padding:28px;
            z-index:2;
            max-height:calc(100vh - 80px);
            overflow-y:auto;
        }

        .commercial-card-popup__close{
            position:absolute;
            top:12px;
            right:12px;
            border:none;
            background:#000;
            color:#fff;
            width:36px;
            height:36px;
            border-radius:50%;
            cursor:pointer;
        }

        .commercial-card-popup__grid{
            width:100%;
        }

        @media (max-width: 1024px){
            .commercial-card-popup__dialog{
                width:min(900px, calc(100vw - 24px));
                padding:22px;
            }
        }

        @media (max-width: 640px){
            .commercial-card-popup__dialog{
                width:calc(100vw - 20px);
                margin:20px auto;
                padding:18px;
                border-radius:14px;
                max-height:calc(100vh - 40px);
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const openBtns = document.querySelectorAll('.commercial-card-popup-open');

            function openPopup(popup) {
                if (!popup) return;
                popup.classList.add('is-open');
                popup.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';

                const first = popup.querySelector('input, textarea, select, button');
                if (first) {
                    setTimeout(function () {
                        first.focus();
                    }, 50);
                }
            }

            function closePopup(popup) {
                if (!popup) return;
                popup.classList.remove('is-open');
                popup.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
            }

            openBtns.forEach(function (btn) {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    const popupId = btn.getAttribute('data-popup');
                    const popup = document.getElementById(popupId);
                    openPopup(popup);
                });
            });

            document.addEventListener('click', function (e) {
                const closeEl = e.target.closest('[data-commercial-popup-close="1"]');
                if (!closeEl) return;

                const popup = closeEl.closest('.commercial-card-popup');
                closePopup(popup);
            });

            document.addEventListener('keydown', function (e) {
                if (e.key !== 'Escape') return;

                document.querySelectorAll('.commercial-card-popup.is-open').forEach(function (popup) {
                    closePopup(popup);
                });
            });
        });
    </script>

<?php
    return ob_get_clean();
});
