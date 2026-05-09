<?php

// ajax filter - commercial version =========================================

if (!defined('COMMERCIAL_INDEX_CPT')) {
    define('COMMERCIAL_INDEX_CPT', 'porpertypi');
}

if (!defined('COMMERCIAL_INDEX_META_PROPERTY_TYPE')) {
    define('COMMERCIAL_INDEX_META_PROPERTY_TYPE', 'pp_property_type');
}

if (!defined('COMMERCIAL_INDEX_META_PURPOSE')) {
    define('COMMERCIAL_INDEX_META_PURPOSE', 'pp_purpose');
}

if (!defined('COMMERCIAL_INDEX_META_STATUS')) {
    define('COMMERCIAL_INDEX_META_STATUS', 'pp_status');
}

if (!defined('COMMERCIAL_INDEX_META_PRICE')) {
    define('COMMERCIAL_INDEX_META_PRICE', '_re_price');
}

if (!defined('COMMERCIAL_INDEX_META_BEDS')) {
    define('COMMERCIAL_INDEX_META_BEDS', '_re_beds');
}

if (!defined('COMMERCIAL_INDEX_META_BATHS')) {
    define('COMMERCIAL_INDEX_META_BATHS', '_re_baths');
}

if (!defined('COMMERCIAL_INDEX_META_SIZE')) {
    define('COMMERCIAL_INDEX_META_SIZE', '_re_size_sqft');
}

if (!defined('COMMERCIAL_INDEX_META_EXPIRED_DATE')) {
    define('COMMERCIAL_INDEX_META_EXPIRED_DATE', 'pp_expired_date');
}

if (!defined('COMMERCIAL_INDEX_META_AREA')) {
    define('COMMERCIAL_INDEX_META_AREA', 'porpertypi_area');
}

if (!defined('COMMERCIAL_INDEX_META_AREA_PP')) {
    define('COMMERCIAL_INDEX_META_AREA_PP', 'pp_area');
}

if (!defined('COMMERCIAL_INDEX_META_UNIT_REFERENCE')) {
    define('COMMERCIAL_INDEX_META_UNIT_REFERENCE', 'pp_unit_reference');
}

if (!defined('COMMERCIAL_INDEX_META_ADDRESS')) {
    define('COMMERCIAL_INDEX_META_ADDRESS', 'pp_address');
}

/**
 * Shortcode: [porpertypi_ajax_filter_dynamic_commercial]
 */
add_shortcode('porpertypi_ajax_filter_dynamic_commercial', function () {
    $nonce = wp_create_nonce('commercial_filter_nonce');

    $purpose_options = commercial_get_distinct_meta_values(COMMERCIAL_INDEX_META_PURPOSE);
    $status_options  = commercial_get_distinct_meta_values(COMMERCIAL_INDEX_META_STATUS);

    ob_start(); ?>
    
    <div class="index-wrap commercial-index-wrap">
        <div class="index-hero commercial-index-hero">
            <div class="commercial-hero__bg commercial-hero__bg--1"></div>
            <div class="commercial-hero__bg commercial-hero__bg--2"></div>

            <div class="index-hero__inner">
                <h2 class="index-hero__title">Find All Property</h2>

                <form class="index-filter idex_form_padding" id="commercialFilterForm">
                    <input type="hidden" name="nonce" value="<?php echo esc_attr($nonce); ?>">
                    <input type="hidden" name="paged" value="1">

                    <div class="index-row index-row--top">
                        <select name="purpose" class="index-input">
                            <option value="">Select </option>
                            <?php foreach ($purpose_options as $v): ?>
                                <option value="<?php echo esc_attr($v); ?>"><?php echo esc_html(commercial_pretty_label($v)); ?></option>
                            <?php endforeach; ?>
                        </select>

                        <select name="status" class="index-input">
                            <option value="">All Status</option>
                            <?php foreach ($status_options as $v): ?>
                                <option value="<?php echo esc_attr($v); ?>"><?php echo esc_html(commercial_pretty_label($v)); ?></option>
                            <?php endforeach; ?>
                        </select>

                        <div class="commercial-search-wrap">
                            <input type="text" name="s" class="index-input" id="commercialLiveSearch" placeholder="Search by title, address, area or unit reference..." autocomplete="off" />
                            <div id="commercialSearchSuggest" class="commercial-search-suggest"></div>
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
                        <div class="index-count" id="commercialCount">—</div>
                        <select class="index-input index-input--small" name="sort">
                            <option value="newest">Newest</option>
                            <option value="price_asc">Price: Low</option>
                            <option value="price_desc">Price: High</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div id="commercialResults_" class="index-results_1"></div>

        <div class="index-pagination">
            <button class="commercial-index-page index-page" data-dir="prev" type="button">Prev</button>
            <span id="commercialPageInfo">—</span>
            <button class="commercial-index-page index-page" data-dir="next" type="button">Next</button>
        </div>
    </div>
    <?php
    return ob_get_clean();
});

/**
 * AJAX
 */
add_action('wp_ajax_commercial_filter_porpertypi_dynamic', 'commercial_filter_porpertypi_dynamic');
add_action('wp_ajax_nopriv_commercial_filter_porpertypi_dynamic', 'commercial_filter_porpertypi_dynamic');

add_action('wp_ajax_commercial_search_suggestions', 'commercial_search_suggestions');
add_action('wp_ajax_nopriv_commercial_search_suggestions', 'commercial_search_suggestions');

function commercial_filter_porpertypi_dynamic() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'commercial_filter_nonce')) {
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
        'key'     => COMMERCIAL_INDEX_META_PROPERTY_TYPE,
        'value'   => 'Commercial',
        'compare' => '='
    ];

    $meta_query[] = [
        'key'     => COMMERCIAL_INDEX_META_EXPIRED_DATE,
        'value'   => date('Y-m-d'),
        'compare' => '>=',
        'type'    => 'DATE',
    ];

    if ($purpose !== '') {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_PURPOSE,
            'value'   => $purpose,
            'compare' => '='
        ];
    }

    if ($status !== '') {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_STATUS,
            'value'   => $status,
            'compare' => '='
        ];
    }

    if ($min_price !== null) {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_PRICE,
            'value'   => $min_price,
            'type'    => 'NUMERIC',
            'compare' => '>='
        ];
    }

    if ($max_price !== null) {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_PRICE,
            'value'   => $max_price,
            'type'    => 'NUMERIC',
            'compare' => '<='
        ];
    }

    if ($min_beds !== null) {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_BEDS,
            'value'   => $min_beds,
            'type'    => 'NUMERIC',
            'compare' => '>='
        ];
    }

    if ($min_baths !== null) {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_BATHS,
            'value'   => $min_baths,
            'type'    => 'NUMERIC',
            'compare' => '>='
        ];
    }

    if ($min_size !== null) {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_SIZE,
            'value'   => $min_size,
            'type'    => 'NUMERIC',
            'compare' => '>='
        ];
    }

    if ($max_size !== null) {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_SIZE,
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
        $meta_key = COMMERCIAL_INDEX_META_PRICE;
    }

    if ($sort === 'price_desc') {
        $orderby  = 'meta_value_num';
        $order    = 'DESC';
        $meta_key = COMMERCIAL_INDEX_META_PRICE;
    }

    $post__in = [];

    if ($s !== '') {
        $title_ids = get_posts([
            'post_type'      => COMMERCIAL_INDEX_CPT,
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            's'              => $s,
            'meta_query'     => $meta_query,
        ]);

        $meta_ids = [];
        $search_meta_keys = [
            COMMERCIAL_INDEX_META_AREA,
            COMMERCIAL_INDEX_META_AREA_PP,
            COMMERCIAL_INDEX_META_UNIT_REFERENCE,
            COMMERCIAL_INDEX_META_PROPERTY_TYPE,
            COMMERCIAL_INDEX_META_ADDRESS,
        ];

        foreach ($search_meta_keys as $search_meta_key) {
            $search_meta_query = $meta_query;
            $search_meta_query[] = [
                'key'     => $search_meta_key,
                'value'   => $s,
                'compare' => 'LIKE',
            ];

            $meta_ids = array_merge($meta_ids, get_posts([
                'post_type'      => COMMERCIAL_INDEX_CPT,
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'fields'         => 'ids',
                'meta_query'     => $search_meta_query,
            ]));
        }

        $post__in = array_values(array_unique(array_merge($title_ids, $meta_ids)));

        if (empty($post__in)) {
            $post__in = [0];
        }
    }

    $args = [
        'post_type'      => COMMERCIAL_INDEX_CPT,
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

            $price = (int) get_post_meta($id, COMMERCIAL_INDEX_META_PRICE, true);
            $beds  = (int) get_post_meta($id, COMMERCIAL_INDEX_META_BEDS, true);
            $baths = (int) get_post_meta($id, COMMERCIAL_INDEX_META_BATHS, true);
            $size  = (int) get_post_meta($id, COMMERCIAL_INDEX_META_SIZE, true);
            $location = get_post_meta(get_the_ID(), 'pp_address', true);

            $pval = get_post_meta($id, COMMERCIAL_INDEX_META_PURPOSE, true);
            $sval = get_post_meta($id, COMMERCIAL_INDEX_META_STATUS, true);
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
                            <span class="index-badge"><?php echo esc_html(commercial_pretty_label($pval)); ?></span>
                        <?php endif; ?>
                        <?php if ($sval !== ''): ?>
                            <span class="index-badge index-badge--dark"><?php echo esc_html(commercial_pretty_label($sval)); ?></span>
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
                            class="cta sell-btn enquire_button commercialSellOpenModal3"
                            style="padding:14px;width:100%;border-radius:14px;background:var(--clr-primary);font-weight:900;border:1px solid var(--clr-primary);color:white;font-family:'Poppins', sans-serif;"
                            type="button"
                        >
                            Enquire Now
                        </button>
                    </div>

                    <div class="commercial-sell-modal commercialSellModal3" aria-hidden="true">
                        <div class="commercial-sell-modal__backdrop" data-commercial-close2="1"></div>

                        <div class="commercial-sell-modal__dialog" role="dialog" aria-modal="true">
                            <button class="commercial-sell-modal__close" type="button" data-commercial-close2="1">✕</button>

                            <div class="commercial-sell-modal__grid">
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

function commercial_search_suggestions() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'commercial_filter_nonce')) {
        wp_send_json_error(['message' => 'Invalid nonce']);
    }

    $term = isset($_POST['term']) ? sanitize_text_field($_POST['term']) : '';
    $term = trim($term);

    if ($term === '') {
        wp_send_json_success(['items' => []]);
    }

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
        'key'     => COMMERCIAL_INDEX_META_PROPERTY_TYPE,
        'value'   => 'Commercial',
        'compare' => '='
    ];

    $meta_query[] = [
        'key'     => COMMERCIAL_INDEX_META_EXPIRED_DATE,
        'value'   => date('Y-m-d'),
        'compare' => '>=',
        'type'    => 'DATE',
    ];

    if ($purpose !== '') {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_PURPOSE,
            'value'   => $purpose,
            'compare' => '='
        ];
    }

    if ($status !== '') {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_STATUS,
            'value'   => $status,
            'compare' => '='
        ];
    }

    if ($min_price !== null) {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_PRICE,
            'value'   => $min_price,
            'type'    => 'NUMERIC',
            'compare' => '>='
        ];
    }

    if ($max_price !== null) {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_PRICE,
            'value'   => $max_price,
            'type'    => 'NUMERIC',
            'compare' => '<='
        ];
    }

    if ($min_beds !== null) {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_BEDS,
            'value'   => $min_beds,
            'type'    => 'NUMERIC',
            'compare' => '>='
        ];
    }

    if ($min_baths !== null) {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_BATHS,
            'value'   => $min_baths,
            'type'    => 'NUMERIC',
            'compare' => '>='
        ];
    }

    if ($min_size !== null) {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_SIZE,
            'value'   => $min_size,
            'type'    => 'NUMERIC',
            'compare' => '>='
        ];
    }

    if ($max_size !== null) {
        $meta_query[] = [
            'key'     => COMMERCIAL_INDEX_META_SIZE,
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
        $meta_key = COMMERCIAL_INDEX_META_PRICE;
    }

    if ($sort === 'price_desc') {
        $orderby  = 'meta_value_num';
        $order    = 'DESC';
        $meta_key = COMMERCIAL_INDEX_META_PRICE;
    }

    $title_ids = get_posts([
        'post_type'      => COMMERCIAL_INDEX_CPT,
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        's'              => $term,
        'meta_query'     => $meta_query,
    ]);

    $meta_ids = [];
    $search_meta_keys = [
        COMMERCIAL_INDEX_META_AREA,
        COMMERCIAL_INDEX_META_AREA_PP,
        COMMERCIAL_INDEX_META_UNIT_REFERENCE,
        COMMERCIAL_INDEX_META_PROPERTY_TYPE,
        COMMERCIAL_INDEX_META_ADDRESS,
    ];

    foreach ($search_meta_keys as $search_meta_key) {
        $search_meta_query = $meta_query;
        $search_meta_query[] = [
            'key'     => $search_meta_key,
            'value'   => $term,
            'compare' => 'LIKE',
        ];

        $meta_ids = array_merge($meta_ids, get_posts([
            'post_type'      => COMMERCIAL_INDEX_CPT,
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'meta_query'     => $search_meta_query,
        ]));
    }

    $post__in = array_values(array_unique(array_merge($title_ids, $meta_ids)));

    if (empty($post__in)) {
        wp_send_json_success(['items' => []]);
    }

    $args = [
        'post_type'      => COMMERCIAL_INDEX_CPT,
        'post_status'    => 'publish',
        'posts_per_page' => 8,
        'post__in'       => $post__in,
        'meta_query'     => $meta_query,
        'orderby'        => $orderby,
        'order'          => $order,
    ];

    if ($meta_key) {
        $args['meta_key'] = $meta_key;
    }

    $suggestions_query = new WP_Query($args);
    $items = [];

    if ($suggestions_query->have_posts()) {
        while ($suggestions_query->have_posts()) {
            $suggestions_query->the_post();
            $id = get_the_ID();

            $title          = get_the_title($id);
            $area           = get_post_meta($id, COMMERCIAL_INDEX_META_AREA, true);
            $pp_area        = get_post_meta($id, COMMERCIAL_INDEX_META_AREA_PP, true);
            $address        = get_post_meta($id, COMMERCIAL_INDEX_META_ADDRESS, true);
            $unit_reference = get_post_meta($id, COMMERCIAL_INDEX_META_UNIT_REFERENCE, true);
            $property_type  = get_post_meta($id, COMMERCIAL_INDEX_META_PROPERTY_TYPE, true);

            $search_text = $title;

            if ($address !== '' && stripos($address, $term) !== false) {
                $search_text = $address;
            } elseif ($area !== '' && stripos($area, $term) !== false) {
                $search_text = $area;
            } elseif ($pp_area !== '' && stripos($pp_area, $term) !== false) {
                $search_text = $pp_area;
            } elseif ($unit_reference !== '' && stripos($unit_reference, $term) !== false) {
                $search_text = $unit_reference;
            } elseif ($property_type !== '' && stripos($property_type, $term) !== false) {
                $search_text = $property_type;
            }

            $items[] = [
                'title'          => $title,
                'area'           => $area,
                'pp_area'        => $pp_area,
                'address'        => $address,
                'unit_reference' => $unit_reference,
                'property_type'  => $property_type,
                'url'            => get_permalink($id),
                'search_text'    => $search_text,
            ];
        }

        wp_reset_postdata();
    }

    wp_send_json_success([
        'items' => array_values($items)
    ]);
}

/**
 * Dynamic dropdown values from postmeta
 */
function commercial_get_distinct_meta_values($meta_key) {
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
    ", $meta_key, COMMERCIAL_INDEX_CPT);

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

function commercial_pretty_label($v) {
    $v = trim((string) $v);
    $v = str_replace(['-', '_'], ' ', $v);
    $v = preg_replace('/\s+/', ' ', $v);
    return ucwords($v);
}

/**
 * CSS/JS
 */
add_action('wp_enqueue_scripts', function () {
    wp_register_style('commercial-index-style', false);
    wp_enqueue_style('commercial-index-style');

    wp_add_inline_style('commercial-index-style', "

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

.commercial-index-hero{
    position:relative;
    overflow:hidden;
}

.commercial-hero__bg{
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

.commercial-hero__bg::before{
    content:'';
    position:absolute;
    inset:0;
    background:linear-gradient(180deg,rgba(2,8,23,.35),rgba(2,8,23,.12));
}

.commercial-hero__bg.is-active{
    opacity:1;
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
    z-index:3;
}

.index-hero__title{
  margin:0 0 12px;
  text-align:center;
  color:#fff;
  font-size:34px;
  font-weight:900;
}

form#commercialFilterForm{
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

/* commercial popup only */
.commercial-sell-modal{
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: none;
}

.commercial-sell-modal.is-open{
    display: block;
}

.commercial-sell-modal__backdrop{
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.65);
}

.commercial-sell-modal__dialog{
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

.commercial-sell-modal__close{
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

.commercial-sell-modal__grid{
    width: 100%;
}

.commercial-search-wrap{
  position:relative;
  width:100%;
}

.commercial-search-suggest{
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

.commercial-search-suggest.is-open{
  display:block;
}

.commercial-search-item{
  padding:12px 14px;
  border-bottom:1px solid #f1f5f9;
  cursor:pointer;
}

.commercial-search-item:last-child{
  border-bottom:none;
}

.commercial-search-item:hover{
  background:#f8fafc;
}

.commercial-search-item__title{
  font-weight:700;
  color:#0f172a;
  font-size:14px;
  line-height:1.3;
}

.commercial-search-item__meta{
  margin-top:4px;
  font-size:12px;
  color:#64748b;
}

@media(max-width:1024px){
  .index-row--top{grid-template-columns:1fr 1fr}
  .index-row--bottom{grid-template-columns:1fr 1fr}
  .index-grid{grid-template-columns:repeat(2,1fr)}

  .commercial-sell-modal__dialog{
    width: min(900px, calc(100vw - 24px));
    padding: 22px;
  }
}

@media(max-width:640px){
  .index-hero{height:580px}
  .index-grid{grid-template-columns:1fr}
  .index-row--toolbar{grid-template-columns:1fr}
  form#commercialFilterForm {
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

  .commercial-sell-modal__dialog{
    width: calc(100vw - 20px);
    margin: 20px auto;
    padding: 18px;
    border-radius: 14px;
    max-height: calc(100vh - 40px);
  }
}
");

    wp_register_script('commercial-index-js', false, ['jquery'], null, true);
    wp_enqueue_script('commercial-index-js');

    $ajax_url = admin_url('admin-ajax.php');

    wp_add_inline_script('commercial-index-js', "
        (function($){
            const ajaxUrl = " . json_encode($ajax_url) . ";

            const commercial_img_1 = " . json_encode(get_theme_mod('commercial_img_1',get_template_directory_uri() . '/assets/filter_bg_image/nelemson-guevarra-3Pu21dk2e1Y-unsplash.jpg')) . ";
            const commercial_img_2 = " . json_encode(get_theme_mod('commercial_img_2',get_template_directory_uri() . '/assets/filter_bg_image/nelemson-guevarra-eCS02JdJBuI-unsplash.jpg')) . ";
            const commercial_img_3 = " . json_encode(get_theme_mod('commercial_img_3',get_template_directory_uri() . '/assets/filter_bg_image/riyas-mohammed-syA-NZnb2pA-unsplash.jpg')) . ";
            const commercial_img_4 = " . json_encode(get_theme_mod('commercial_img_4',get_template_directory_uri() . '/assets/filter_bg_image/shibin-joseph-GsTqt8M0fls-unsplash.jpg')) . ";
            const commercial_img_5 = " . json_encode(get_theme_mod('commercial_img_5',get_template_directory_uri() . '/assets/filter_bg_image/shibin-joseph-yP8oPC3_v38-unsplash.jpg')) . ";
            const commercial_img_6 = " . json_encode(get_theme_mod('commercial_img_6',get_template_directory_uri() . '/assets/filter_bg_image/thomas-haas-wfANLGIhOtM-unsplash.jpg')) . ";
            const commercial_img_7 = " . json_encode(get_theme_mod('commercial_img_7',get_template_directory_uri() . '/assets/filter_bg_image/upscalemedia-transformed.jpg')) . ";
            const commercial_img_8 = " . json_encode(get_theme_mod('commercial_img_7',get_template_directory_uri() . '/assets/filter_bg_image/wmremove-transformed.jpg')) . ";

            const commercialHeroImages = [
                commercial_img_1,
                commercial_img_2,
                commercial_img_3,
                commercial_img_4,
                commercial_img_5,
                commercial_img_6,
                commercial_img_7,
                commercial_img_8,
            ].filter(Boolean);
            
            let commercialHeroStarted = false;
            let commercialHeroCurrentLayer = 1;
            let commercialHeroCurrentIndex = 0;
            let commercialSearchTimer = null;

            function preloadCommercialHeroImages() {
                commercialHeroImages.forEach(function(src){
                    const img = new Image();
                    img.src = src;
                });
            }

            function setCommercialLayerBg(layer, imageUrl){
                if(!layer) return;
                layer.style.backgroundImage = 'url(\"' + imageUrl + '\")';
            }

            function showCommercialLayer(layerToShow, layerToHide){
                if(layerToShow){
                    layerToShow.classList.add('is-active');
                }
                if(layerToHide){
                    layerToHide.classList.remove('is-active');
                }
            }

            function startCommercialHeroSlider(){
                if(commercialHeroStarted || !commercialHeroImages.length) return;
                commercialHeroStarted = true;

                const bg1 = document.querySelector('.commercial-hero__bg--1');
                const bg2 = document.querySelector('.commercial-hero__bg--2');

                if(!bg1 || !bg2) return;

                preloadCommercialHeroImages();

                commercialHeroCurrentIndex = Math.floor(Math.random() * commercialHeroImages.length);

                setCommercialLayerBg(bg1, commercialHeroImages[commercialHeroCurrentIndex]);
                bg1.classList.add('is-active');
                bg2.classList.remove('is-active');

                setInterval(function(){
                    commercialHeroCurrentIndex = (commercialHeroCurrentIndex + 1) % commercialHeroImages.length;

                    const nextImage = commercialHeroImages[commercialHeroCurrentIndex];

                    if(commercialHeroCurrentLayer === 1){
                        setCommercialLayerBg(bg2, nextImage);
                        showCommercialLayer(bg2, bg1);
                        commercialHeroCurrentLayer = 2;
                    } else {
                        setCommercialLayerBg(bg1, nextImage);
                        showCommercialLayer(bg1, bg2);
                        commercialHeroCurrentLayer = 1;
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

            function hideCommercialSuggestions(){
                $('#commercialSearchSuggest').removeClass('is-open').html('');
            }

            function renderCommercialSuggestions(items){
                const \$box = $('#commercialSearchSuggest');

                if(!items || !items.length){
                    hideCommercialSuggestions();
                    return;
                }

                let html = '';
                items.forEach(function(item){
                    const searchText = item.search_text || item.title || item.address || item.area || item.pp_area || item.unit_reference || item.property_type || '';

                    html += '<div class=\"commercial-search-item\" data-search=\"' + escapeHtml(searchText) + '\" data-url=\"' + escapeHtml(item.url) + '\">';
                    html += '<div class=\"commercial-search-item__title\">' + escapeHtml(item.title) + '</div>';

                    if(item.address){
                        html += '<div class=\"commercial-search-item__meta\">Address: ' + escapeHtml(item.address) + '</div>';
                    }

                    if(item.area){
                        html += '<div class=\"commercial-search-item__meta\">' + escapeHtml(item.area) + '</div>';
                    }

                    if(item.pp_area){
                        html += '<div class=\"commercial-search-item__meta\">' + escapeHtml(item.pp_area) + '</div>';
                    }

                    if(item.unit_reference){
                        html += '<div class=\"commercial-search-item__meta\">Unit Ref: ' + escapeHtml(item.unit_reference) + '</div>';
                    }

                    if(item.property_type){
                        html += '<div class=\"commercial-search-item__meta\">Property Type: ' + escapeHtml(item.property_type) + '</div>';
                    }

                    html += '</div>';
                });

                \$box.html(html).addClass('is-open');
            }

            function fetchCommercialSuggestions(term){
                const data = toObj($('#commercialFilterForm').serializeArray());
                data.action = 'commercial_search_suggestions';
                data.term = term;

                $.post(ajaxUrl, data).done(function(res){
                    if(!res || !res.success || !res.data){
                        hideCommercialSuggestions();
                        return;
                    }
                    renderCommercialSuggestions(res.data.items || []);
                }).fail(function(){
                    hideCommercialSuggestions();
                });
            }

            function toObj(arr){
                const o = {};
                arr.forEach(x => o[x.name] = x.value);
                return o;
            }

            function loading(on){
                $('#commercialResults_').toggleClass('is-loading', !!on);
            }

            function bindCommercialModal(){
                const openBtns = document.querySelectorAll('.commercialSellOpenModal3');
                const modals = document.querySelectorAll('.commercialSellModal3');

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
                        if (el && el.getAttribute && el.getAttribute('data-commercial-close2') === '1') {
                            modal.classList.remove('is-open');
                            modal.setAttribute('aria-hidden', 'true');
                            document.body.style.overflow = '';
                        }
                    });
                });

                document.addEventListener('keydown', function(e){
                    if (e.key !== 'Escape') return;
                    document.querySelectorAll('.commercialSellModal3.is-open').forEach(function(modal){
                        modal.classList.remove('is-open');
                        modal.setAttribute('aria-hidden', 'true');
                        document.body.style.overflow = '';
                    });
                });
            }

            function fetchProps(page){
                const \$f = $('#commercialFilterForm');
                if (!\$f.length) return;

                const data = toObj(\$f.serializeArray());
                data.action = 'commercial_filter_porpertypi_dynamic';
                data.paged = page || 1;

                loading(true);

                $.post(ajaxUrl, data).done(function(res){
                    loading(false);

                    if(!res || !res.success){
                        $('#commercialResults_').html('<div class=\"index-empty\">Error</div>');
                        return;
                    }

                    $('#commercialResults_').html(res.data.html);
                    $('#commercialCount').text((res.data.found || 0) + ' results');
                    $('#commercialPageInfo').text((res.data.paged || 1) + ' / ' + (res.data.max_pages || 1));

                    const pg = res.data.paged || 1;
                    const max = res.data.max_pages || 1;

                    $('.commercial-index-page[data-dir=\"prev\"]').prop('disabled', pg <= 1);
                    $('.commercial-index-page[data-dir=\"next\"]').prop('disabled', pg >= max);

                    \$f.find('input[name=\"paged\"]').val(pg);

                    bindCommercialModal();
                }).fail(function(){
                    loading(false);
                    $('#commercialResults_').html('<div class=\"index-empty\">Request failed</div>');
                });
            }

            $(document).ready(function(){
                startCommercialHeroSlider();
                fetchProps(1);
            });

            $(document).on('submit', '#commercialFilterForm', function(e){
                e.preventDefault();
                hideCommercialSuggestions();
                fetchProps(1);
            });

            $(document).on('change', '#commercialFilterForm select', function(){
                fetchProps(1);
            });

            $(document).on('click', '.commercial-index-page', function(){
                const dir = $(this).data('dir');
                const cur = parseInt($('#commercialFilterForm input[name=\"paged\"]').val() || '1', 10);
                fetchProps(dir === 'next' ? cur + 1 : cur - 1);
            });

            $(document).on('input', '#commercialLiveSearch', function(){
                const val = $(this).val().trim();

                clearTimeout(commercialSearchTimer);

                if(val.length < 1){
                    hideCommercialSuggestions();
                    return;
                }

                commercialSearchTimer = setTimeout(function(){
                    fetchCommercialSuggestions(val);
                }, 300);
            });

            $(document).on('click', '.commercial-search-item', function(){
                const searchText = $(this).data('search') || '';
                $('#commercialLiveSearch').val(searchText);
                hideCommercialSuggestions();
                fetchProps(1);
            });

            $(document).on('click', function(e){
                if(!$(e.target).closest('.commercial-search-wrap').length){
                    hideCommercialSuggestions();
                }
            });

        })(jQuery);
    ");
});