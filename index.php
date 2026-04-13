<?php get_header(); ?>


<section class="container">
    <?php echo do_shortcode('[porpertypi_ajax_filter_dynamic_index]'); ?>
</section>

<!-- Property for sale start -->
    <section class="np-wrap np-sec">
        <div class="np-container">

            <div class="np-head">
                <h2 class="np-title">Properties for Sale</h2>
                <div class="np-nav">
                    <button class="np-btn" id="npPrev">‹</button>
                    <button class="np-btn" id="npNext">›</button>
                </div>
            </div>

            <div class="np-slider">
                <div class="np-track" id="npTrack">
                    <?php
                    $area_id = get_the_ID();

                    $q_new_projects = new WP_Query([
                        'post_type'      => 'porpertypi',
                        'posts_per_page' => 10,
                        'post_status'    => 'publish',
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'meta_query' => [
                            [
                                'key'     => 'pp_purpose',
                                'value'   => 'Buy',
                                'compare' => '='
                            ]
                        ]
                    ]);

                    if ($q_new_projects->have_posts()) :
                        while ($q_new_projects->have_posts()) : $q_new_projects->the_post();

                            $purpose  = get_post_meta(get_the_ID(), 'pp_purpose', true);
                            $status   = get_post_meta(get_the_ID(), 'pp_status', true);
                            $price    = get_post_meta(get_the_ID(), '_re_price', true);
                            $beds     = get_post_meta(get_the_ID(), '_re_beds', true);
                            $baths    = get_post_meta(get_the_ID(), '_re_baths', true);
                            $size     = get_post_meta(get_the_ID(), '_re_size_sqft', true);
                            $location = get_post_meta(get_the_ID(), 'pp_address', true);
                    ?>
                            <div class="np-card">
                                <div class="np-img bg-cover" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>);">
                                    <div class="np-badges">
                                        <?php if (!empty($status)) : ?>
                                            <span class="np-badge primary"><?php echo esc_html($status); ?></span>
                                        <?php endif; ?>

                                        <?php if (!empty($purpose)) : ?>
                                            <span class="np-badge"><?php echo esc_html($purpose); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="np-body">
                                    <div class="np-price"><?php echo esc_html($price); ?> AED</div>
                                    <div class="np-specs"><?php echo esc_html($baths); ?> Bath • <?php echo esc_html($size); ?> ft²</div>
                                    <div class="np-name" onclick="window.location.href='<?php echo get_permalink(); ?>'" style="cursor:pointer;"><?php the_title(); ?></div>
                                    <div class="np-loc"><?php echo esc_html($location); ?></div>

                                    <div class="np-agent">
                                        <div class="np-avatar"><?php echo get_avatar(get_the_author_meta('ID')); ?></div>
                                        <div>
                                            <strong><?php echo esc_html(get_the_author_meta('display_name', get_the_author_meta('ID'))); ?></strong>
                                        </div>
                                    </div>

                                    <div class="np-cta">
                                        <button class="np-popup-open"
                                            data-post-id="<?php echo esc_attr(get_the_ID()); ?>">
                                            <a href="#"
                                            >
                                                Enquire Now
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    else :
                        echo 'No properties found.';
                    endif;

                    wp_reset_postdata();
                    ?>
                </div>
            </div>

        </div>
    </section>

    <!-- Global Popup: slider এর বাইরে -->
    <div class="np-popup-global" id="npGlobalPopup" aria-hidden="true">
        <div class="np-popup__backdrop" data-np-close="1"></div>

        <div class="np-popup__dialog">
            <button class="np-popup__close" type="button" data-np-close="1">✕</button>

            <div class="np-popup__content">
                <?php echo do_shortcode('[button_contact_form_direct]'); ?>
            </div>
        </div>
    </div>

    <style>
        .np-popup-global{
            position: fixed;
            inset: 0;
            display: none;
            z-index: 999999;
        }

        .np-popup-global.is-open{
            display: block;
        }

        .np-popup__backdrop{
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,.6);
        }

        .np-popup__dialog{
            position: relative;
            width: min(1100px, calc(100vw - 30px));
            margin: 40px auto;
            background: #fff;
            padding: 25px;
            border-radius: 16px;
            max-height: 90vh;
            overflow: auto;
            z-index: 2;
        }

        .np-popup__close{
            position: absolute;
            top: 10px;
            right: 10px;
            background: #000;
            color: #fff;
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
        }

        .np-popup__content{
            width: 100%;
        }

        @media (max-width: 1024px){
            .np-popup__dialog{
                width: min(900px, calc(100vw - 24px));
                padding: 22px;
            }
        }

        @media (max-width: 640px){
            .np-popup__dialog{
                width: calc(100vw - 20px);
                margin: 20px auto;
                padding: 18px;
                border-radius: 14px;
                max-height: calc(100vh - 40px);
            }
        }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const popup = document.getElementById('npGlobalPopup');

        if (!popup) return;

        document.querySelectorAll('.np-popup-open').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();

                popup.classList.add('is-open');
                popup.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
            });
        });

        document.addEventListener('click', function (e) {
            const closeTrigger = e.target.closest('[data-np-close="1"]');
            if (!closeTrigger) return;

            popup.classList.remove('is-open');
            popup.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                popup.classList.remove('is-open');
                popup.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
            }
        });
    });
    </script>
<!-- Property for sale end -->

<!-- Property for Rent start -->
    <section class="np-wrap np-sec">
        <div class="np-container">

            <div class="np-head">
                <h2 class="np-title">Properties for Rent</h2>
                <div class="np-nav">
                    <button class="np-btn" id="npPrev">‹</button>
                    <button class="np-btn" id="npNext">›</button>
                </div>
            </div>

            <div class="np-slider">
                <div class="np-track" id="npTrack">
                    <?php
                    $area_id = get_the_ID();

                    $q_new_projects = new WP_Query([
                        'post_type'      => 'porpertypi',
                        'posts_per_page' => 10,
                        'post_status'    => 'publish',
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'meta_query' => [
                            [
                                'key'     => 'pp_purpose',
                                'value'   => 'For Rent',
                                'compare' => '='
                            ]
                        ]
                    ]);

                    if ($q_new_projects->have_posts()) :
                        while ($q_new_projects->have_posts()) : $q_new_projects->the_post();

                            $purpose  = get_post_meta(get_the_ID(), 'pp_purpose', true);
                            $status   = get_post_meta(get_the_ID(), 'pp_status', true);
                            $price    = get_post_meta(get_the_ID(), '_re_price', true);
                            $beds     = get_post_meta(get_the_ID(), '_re_beds', true);
                            $baths    = get_post_meta(get_the_ID(), '_re_baths', true);
                            $size     = get_post_meta(get_the_ID(), '_re_size_sqft', true);
                            $location = get_post_meta(get_the_ID(), 'pp_address', true);
                    ?>
                            <div class="np-card">
                                <div class="np-img bg-cover" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>);">
                                    <div class="np-badges">
                                        <?php if (!empty($status)) : ?>
                                            <span class="np-badge primary"><?php echo esc_html($status); ?></span>
                                        <?php endif; ?>

                                        <?php if (!empty($purpose)) : ?>
                                            <span class="np-badge"><?php echo esc_html($purpose); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="np-body">
                                    <div class="np-price"><?php echo esc_html($price); ?> AED</div>
                                    <div class="np-specs"><?php echo esc_html($baths); ?> Bath • <?php echo esc_html($size); ?> ft²</div>
                                    <div class="np-name" onclick="window.location.href='<?php echo get_permalink(); ?>'" style="cursor:pointer;"><?php the_title(); ?></div>
                                    <div class="np-loc"><?php echo esc_html($location); ?></div>

                                    <div class="np-agent">
                                        <div class="np-avatar"><?php echo get_avatar(get_the_author_meta('ID')); ?></div>
                                        <div>
                                            <strong><?php echo esc_html(get_the_author_meta('display_name', get_the_author_meta('ID'))); ?></strong>
                                        </div>
                                    </div>

                                    <div class="np-cta">
                                        <button class="np-popup-open"
                                            data-post-id="<?php echo esc_attr(get_the_ID()); ?>">
                                            <a href="#"
                                            >
                                                Enquire Now
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    else :
                        echo 'No properties found.';
                    endif;

                    wp_reset_postdata();
                    ?>
                </div>
            </div>

        </div>
    </section>

    <!-- Global Popup: slider এর বাইরে -->
    <div class="np-popup-global" id="npGlobalPopup" aria-hidden="true">
        <div class="np-popup__backdrop" data-np-close="1"></div>

        <div class="np-popup__dialog">
            <button class="np-popup__close" type="button" data-np-close="1">✕</button>

            <div class="np-popup__content">
                <?php echo do_shortcode('[button_contact_form_direct]'); ?>
            </div>
        </div>
    </div>

    <style>
        .np-popup-global{
            position: fixed;
            inset: 0;
            display: none;
            z-index: 999999;
        }

        .np-popup-global.is-open{
            display: block;
        }

        .np-popup__backdrop{
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,.6);
        }

        .np-popup__dialog{
            position: relative;
            width: min(1100px, calc(100vw - 30px));
            margin: 40px auto;
            background: #fff;
            padding: 25px;
            border-radius: 16px;
            max-height: 90vh;
            overflow: auto;
            z-index: 2;
        }

        .np-popup__close{
            position: absolute;
            top: 10px;
            right: 10px;
            background: #000;
            color: #fff;
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
        }

        .np-popup__content{
            width: 100%;
        }

        @media (max-width: 1024px){
            .np-popup__dialog{
                width: min(900px, calc(100vw - 24px));
                padding: 22px;
            }
        }

        @media (max-width: 640px){
            .np-popup__dialog{
                width: calc(100vw - 20px);
                margin: 20px auto;
                padding: 18px;
                border-radius: 14px;
                max-height: calc(100vh - 40px);
            }
        }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const popup = document.getElementById('npGlobalPopup');

        if (!popup) return;

        document.querySelectorAll('.np-popup-open').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();

                popup.classList.add('is-open');
                popup.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
            });
        });

        document.addEventListener('click', function (e) {
            const closeTrigger = e.target.closest('[data-np-close="1"]');
            if (!closeTrigger) return;

            popup.classList.remove('is-open');
            popup.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                popup.classList.remove('is-open');
                popup.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
            }
        });
    });
    </script>
<!-- Property for sale end -->

<!-- Popular Area in Dubai start -->
<section class="popular_area_section">
    <div class="popular_area_container">

        <div class="popular_area_header">
            <h2 class="popular_area_title">Popular Areas in Dubai</h2>

            <!-- Desktop button -->
            <a class="popular_area_btn popular_area_btn_desktop" href="#">
                Show All Areas <span class="popular_area_btn_icon" aria-hidden="true">→</span>
            </a>
        </div>

        <div class="popular_area_wrap">
            <!-- ✅ LOOP CARD (repeat this block in WP loop) -->
            <?php
            // current cpt "area"
            $query = new WP_Query([
                'post_type' => 'area',
                'posts_per_page' => 6,
                'post_status' => 'publish',
                'orderby'        => 'rand'
            ]);


            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();

                    $price_start = get_post_meta(get_the_ID(), 'price_start', true);

            ?>

                    <a class="popular_area_card" href="<?php the_permalink(); ?>">
                        <div class="popular_area_media">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>">
                        </div>
                        <div class="popular_area_overlay"></div>
                        <div class="popular_area_badge">Featured</div>
                        <div class="popular_area_content">
                            <?php if (the_title()) : ?>
                                <h3 class="popular_area_name"><?php the_title(); ?></h3>
                            <?php endif; ?>
                            <?php if (!empty($price_start)) : ?>
                                <p class="popular_area_price">Price from <strong><?php echo esc_html($price_start); ?> AED</strong></p>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php
                endwhile;
                wp_reset_postdata();
            else : ?>

                <div class="popular_area_no_post">
                    <h5>No Areas Found</h5>
                </div>

            <?php endif; ?>
        </div>

        <!-- Mobile button -->
        <div class="popular_area_btn_mobile_wrap">
            <a class="popular_area_btn popular_area_btn_mobile" href="#">
                Show All Areas <span class="popular_area_btn_icon" aria-hidden="true">→</span>
            </a>
        </div>

    </div>
</section>
<!-- Popular Area in Dubai end -->

<!-- About us start -->
<section class="about_stats_section">
    <div class="about_stats_container">

        <!-- HEADER -->
        <div class="about_stats_header">
            <div>
                <h2 class="about_stats_title">About Us</h2>
                <p class="about_stats_desc">
                    Established to serve modern buyers, sellers, and investors, our real estate team delivers premium support,
                    market expertise, and a smooth property journey—from first enquiry to final handover.
                    We focus on trust, performance, and long-term relationships.
                </p>
            </div>
        </div>

        <!-- STATS GRID -->
        <div class="about_stats_grid">

            <!-- Card 1 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">120,000</span>+ customers</h3>
                <p class="about_stats_note">Trusted by clients across the UAE for buying, selling, and renting.</p>
            </div>

            <!-- Card 2 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M3 21h18" />
                        <path d="M5 21V7l7-4 7 4v14" />
                        <path d="M9 21v-6h6v6" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">6,000</span>+ properties</h3>
                <p class="about_stats_note">Sold, rented, and leased through our network and trusted partners.</p>
            </div>

            <!-- Card 3 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5Z" />
                        <path d="M19 21a7 7 0 0 0-14 0" />
                        <path d="M16 6h5" />
                        <path d="M18.5 3.5v5" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">250</span>+ top agents</h3>
                <p class="about_stats_note">Specialists across prime communities, off-plan, and investment deals.</p>
            </div>

            <!-- Card 4 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M8 2v4" />
                        <path d="M16 2v4" />
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <path d="M3 10h18" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">15</span>+ years</h3>
                <p class="about_stats_note">A proven track record of performance and client satisfaction.</p>
            </div>

            <!-- Card 5 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M12 21s7-4.35 7-11a7 7 0 0 0-14 0c0 6.65 7 11 7 11Z" />
                        <path d="M12 10a2.5 2.5 0 1 0-2.5-2.5A2.5 2.5 0 0 0 12 10Z" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">AED 11B</span> volume</h3>
                <p class="about_stats_note">Total real estate volume achieved through strong market reach.</p>
            </div>

            <!-- Card 6 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M21 12a9 9 0 1 1-9-9" />
                        <path d="M22 2 12 12" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">40</span>+ languages</h3>
                <p class="about_stats_note">A diverse team built to support local and international clients.</p>
            </div>

            <!-- Card 7 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M3 21h18" />
                        <path d="M7 21V5h10v16" />
                        <path d="M9 9h2" />
                        <path d="M13 9h2" />
                        <path d="M9 13h2" />
                        <path d="M13 13h2" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">18</span> offices</h3>
                <p class="about_stats_note">Presence across key locations to serve clients efficiently.</p>
            </div>

            <!-- Card 8 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <rect x="3" y="5" width="18" height="14" rx="2" />
                        <path d="M7 15h6" />
                        <path d="M16 15h2" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">Top</span> selling partner</h3>
                <p class="about_stats_note">Strong partnerships with leading UAE developers and brands.</p>
            </div>

        </div>
    </div>
</section>
<!-- About us end -->

<!-- agets of the monthe start -->
<section class="agents_month_section">
    <div class="agents_month_container">

        <div class="agents_month_header">
            <div>
                <h2 class="agents_month_title">Agents of the Month</h2>
                <p class="agents_month_sub">
                    Meet our top-performing agents selected for outstanding results, client satisfaction, and market expertise.
                </p>
            </div>
        </div>

        <div class="agents_month_grid">
            <?php
            $agent_query = new WP_Query([
                'post_type' => 'agent',
                'posts_per_page' => 4,
                'post_status' => 'publish',
                'orderby' => 'rand'
            ]);
            while ($agent_query->have_posts()) : $agent_query->the_post(); ?>
                <a class="agent_card" href="<?php echo get_permalink(get_the_ID()); ?>">
                    <div class="agent_card_media">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="Agent">
                        <div class="agent_card_tag d-none">Top Performer</div>
                    </div>
                    <div class="agent_card_body">
                        <h3 class="agent_name"><?php echo get_the_title(); ?></h3>
                        <p class="agent_meta"><strong>Speaks:</strong>
                            <?php
                            $speaking_language = get_post_meta(get_the_ID(), 'agent_repeat_items', true);
                            if (is_array($speaking_language) && !empty($speaking_language)) {
                                foreach ($speaking_language as $item) {
                                    echo esc_html($item) . ', ';
                                }
                            }
                            ?>
                        </p>
                    </div>
                    <div class="agent_card_footer">
                        <span class="agent_btn">View Profile →</span>
                    </div>
                </a>
            <?php endwhile; ?>
        </div>

    </div>
</section>
<!-- agets of the monthe end -->

<!-- Media shortcode start -->
<section class="container">
    <?php echo do_shortcode('[media_loop_ajax]'); ?>
</section>
<!-- Media shortcode end -->

<!-- Media shortcode start -->
<section class="container">
    <?php echo do_shortcode('[press_media]'); ?>
</section>
<!-- Media shortcode end -->

<!-- review about start -->
 <section class="container">
    <?php echo do_shortcode('[property_management_reviews]'); ?>
</section>
<!-- review about end -->



<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->


<?php get_footer();
