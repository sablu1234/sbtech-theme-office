<?php
// recent post of this cpt("porpertypi") under this meta(pp_purpose = "Commercial") -======================================================
// ✅ Shortcode: [Commercial_reaf_recent_properties posts="6"]

add_action('wp_ajax_commercial_ajax_search_suggestions', 'commercial_ajax_search_suggestions');
add_action('wp_ajax_nopriv_commercial_ajax_search_suggestions', 'commercial_ajax_search_suggestions');

function commercial_ajax_search_suggestions() {
    $term = isset($_POST['term']) ? sanitize_text_field(wp_unslash($_POST['term'])) : '';
    $term = trim($term);

    if ($term === '') {
        wp_send_json_success(['items' => []]);
    }

    if (isset($_POST['nonce']) && !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'commercial_suggest_nonce')) {
        wp_send_json_error(['message' => 'Invalid nonce']);
    }

    $commercial_meta = [
        'relation' => 'AND',
        [
            'relation' => 'OR',
            [
                'key'     => '_property_category_prod',
                'value'   => 'Commercial',
                'compare' => '=',
            ],
            [
                'key'     => '_property_type_com',
                'value'   => 'Commercial',
                'compare' => '=',
            ],
            [
                'key'     => 'pp_property_type',
                'value'   => 'Commercial',
                'compare' => '=',
            ],
        ],
    ];

    $title_ids = get_posts([
        'post_type'      => 'porpertypi',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        's'              => $term,
        'meta_query'     => $commercial_meta,
    ]);

    $search_meta_query = $commercial_meta;
    $search_meta_query[] = [
        'relation' => 'OR',
        [
            'key'     => 'pp_property_name',
            'value'   => $term,
            'compare' => 'LIKE',
        ],
        [
            'key'     => 'pp_address',
            'value'   => $term,
            'compare' => 'LIKE',
        ],
        [
            'key'     => 'pp_area',
            'value'   => $term,
            'compare' => 'LIKE',
        ],
        [
            'key'     => 'pp_unit_reference',
            'value'   => $term,
            'compare' => 'LIKE',
        ],
    ];

    $meta_ids = get_posts([
        'post_type'      => 'porpertypi',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'meta_query'     => $search_meta_query,
    ]);

    $post__in = array_values(array_unique(array_merge($title_ids, $meta_ids)));
    if (empty($post__in)) {
        wp_send_json_success(['items' => []]);
    }

    $query = new WP_Query([
        'post_type'      => 'porpertypi',
        'post_status'    => 'publish',
        'posts_per_page' => 8,
        'post__in'       => $post__in,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    $items = [];
    while ($query->have_posts()) {
        $query->the_post();

        $id             = get_the_ID();
        $title          = get_the_title($id);
        $address        = get_post_meta($id, 'pp_address', true);
        $area           = get_post_meta($id, 'pp_area', true);
        $unit_reference = get_post_meta($id, 'pp_unit_reference', true);
        $property_name  = get_post_meta($id, 'pp_property_name', true);

        $search_text = $property_name ?: $title;
        $search_source = 'Title';

        if ($address !== '' && stripos($address, $term) !== false) {
            $search_text = $address;
            $search_source = 'Address';
        } elseif ($area !== '' && stripos($area, $term) !== false) {
            $search_text = $area;
            $search_source = 'Area';
        } elseif ($unit_reference !== '' && stripos($unit_reference, $term) !== false) {
            $search_text = $unit_reference;
            $search_source = 'Unit Ref';
        } elseif ($property_name !== '' && stripos($property_name, $term) !== false) {
            $search_text = $property_name;
            $search_source = 'Property';
        }

        $items[] = [
            'title'          => $title,
            'property_name'  => $property_name,
            'address'        => $address,
            'area'           => $area,
            'unit_reference' => $unit_reference,
            'url'            => get_permalink($id),
            'search_text'    => $search_text,
            'search_source'  => $search_source,
        ];
    }
    wp_reset_postdata();

    wp_send_json_success(['items' => array_values($items)]);
}

add_shortcode('Commercial_reaf_recent_properties', function ($atts) {

    $q = new WP_Query([
        'post_type'      => 'porpertypi',
        'posts_per_page' => 10,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'meta_query' => [
            [
                'key'     => 'pp_property_type',
                'value'   => 'Commercial',
                'compare' => '='
            ]
        ]
    ]);

    if (!$q->have_posts()) return '<div class="reaf-front-empty">No properties found.</div>';

    ob_start(); ?>

    <section class="rent-cards">
        <div class="reaf-front-head">
            <h2>Recent Commercial Property</h2>
            <p>Recently added listings with key details & amenities.</p>

            <div class="commercial-search-wrap">
                <input type="text" id="commercialLiveSearch" class="commercial-search-input" placeholder="Search commercial properties..." autocomplete="off">
                <div id="commercialSearchSuggest" class="commercial-search-suggest"></div>
            </div>
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

        .commercial-search-wrap{
            position:relative;
            width:100%;
            margin-top:18px;
            max-width:540px;
        }

        .commercial-search-input{
            width:100%;
            padding:14px 16px;
            border:1px solid #d1d5db;
            border-radius:12px;
            font-size:15px;
            color:#0f172a;
            outline:none;
            transition:border-color .2s ease;
        }

        .commercial-search-input:focus{
            border-color:#2563eb;
            box-shadow:0 0 0 4px rgba(37,99,235,0.12);
        }

        .commercial-search-suggest{
            position:absolute;
            top:calc(100% + 8px);
            left:0;
            right:0;
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:12px;
            box-shadow:0 14px 30px rgba(15,23,42,.12);
            z-index:9999;
            display:none;
            max-height:320px;
            overflow-y:auto;
        }

        .commercial-search-suggest.is-open{
            display:block;
        }

        .commercial-search-item{
            padding:14px 16px;
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
            margin-bottom:6px;
        }

        .commercial-search-item__meta{
            font-size:13px;
            color:#475569;
            line-height:1.5;
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

            const ajaxUrl = '<?php echo esc_url(admin_url('admin-ajax.php')); ?>';
            const commercialSuggestNonce = '<?php echo wp_create_nonce('commercial_suggest_nonce'); ?>';
            let commercialSearchTimer = null;

            function hideCommercialSuggestions(){
                document.querySelectorAll('#commercialSearchSuggest').forEach(function(el){
                    el.classList.remove('is-open');
                    el.innerHTML = '';
                });
            }

            function escapeHtml(str){
                return String(str || '')
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            function renderCommercialSuggestions(items){
                const box = document.getElementById('commercialSearchSuggest');
                if (!box) return;

                if (!items || !items.length) {
                    hideCommercialSuggestions();
                    return;
                }

                let html = '';
                items.forEach(function(item){
                    const searchText = item.search_text || item.title || item.address || item.area || item.unit_reference || '';
                    html += '<div class="commercial-search-item" data-search="' + escapeHtml(searchText) + '" data-url="' + escapeHtml(item.url) + '">';
                    html += '<div class="commercial-search-item__title">' + escapeHtml(item.title) + '</div>';
                    if (item.property_name) {
                        html += '<div class="commercial-search-item__meta">Property: ' + escapeHtml(item.property_name) + '</div>';
                    }
                    if (item.search_source) {
                        html += '<div class="commercial-search-item__meta">Matched: ' + escapeHtml(item.search_source) + '</div>';
                    }
                    if (item.address) {
                        html += '<div class="commercial-search-item__meta">Address: ' + escapeHtml(item.address) + '</div>';
                    }
                    if (item.area) {
                        html += '<div class="commercial-search-item__meta">Area: ' + escapeHtml(item.area) + '</div>';
                    }
                    if (item.unit_reference) {
                        html += '<div class="commercial-search-item__meta">Unit Ref: ' + escapeHtml(item.unit_reference) + '</div>';
                    }
                    html += '</div>';
                });

                box.innerHTML = html;
                box.classList.add('is-open');
            }

            function fetchCommercialSuggestions(term){
                if (!term || term.length < 1) {
                    hideCommercialSuggestions();
                    return;
                }

                const data = new FormData();
                data.append('action', 'commercial_ajax_search_suggestions');
                data.append('nonce', commercialSuggestNonce);
                data.append('term', term);

                fetch(ajaxUrl, {
                    method: 'POST',
                    credentials: 'same-origin',
                    body: data,
                })
                .then(function(response){ return response.json(); })
                .then(function(res){
                    if (!res || !res.success || !res.data) {
                        hideCommercialSuggestions();
                        return;
                    }
                    renderCommercialSuggestions(res.data.items || []);
                })
                .catch(function(){
                    hideCommercialSuggestions();
                });
            }

            const liveInput = document.getElementById('commercialLiveSearch');
            if (liveInput) {
                liveInput.addEventListener('input', function(){
                    const value = this.value.trim();
                    clearTimeout(commercialSearchTimer);
                    commercialSearchTimer = setTimeout(function(){
                        fetchCommercialSuggestions(value);
                    }, 300);
                });
            }

            document.addEventListener('click', function(e){
                const item = e.target.closest('.commercial-search-item');
                if (item) {
                    const value = item.getAttribute('data-search') || '';
                    const url = item.getAttribute('data-url') || '';
                    const input = document.getElementById('commercialLiveSearch');
                    if (input) {
                        input.value = value;
                    }
                    hideCommercialSuggestions();
                    if (url) {
                        window.location.href = url;
                    }
                    return;
                }

                if (!e.target.closest('.commercial-search-wrap')) {
                    hideCommercialSuggestions();
                }
            });
        });
    </script>

<?php
    return ob_get_clean();
});