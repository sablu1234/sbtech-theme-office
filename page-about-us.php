<?php get_header(); ?>

<!-- Hero area start -->
    <?php
    $about_us_hero_bg = get_theme_mod('about_us_hero_bg', get_template_directory_uri().'/assets/about_us/about_us_bg.jpg');
    $about_us_wwa_img = get_theme_mod('about_us_wwa_img', get_template_directory_uri().'/assets/about_us/about_us_who_we_are.avif');
    $about_us_wsell = get_theme_mod('about_us_wsell', get_template_directory_uri().'/assets/about_us/about_us_wsell.avif');
    $about_us_mv = get_theme_mod('about_us_mv',__('98'));
    $about_us_experience = get_theme_mod('about_us_experience',__('10'));
    $about_us_sptrans = get_theme_mod('about_us_sptrans',__('450'));
    $about_us_active_buyers = get_theme_mod('about_us_active_buyers',__('350'));
    $about_us_client_support = get_theme_mod('about_us_client_support',__('24/7'));
    $about_us_transparent_selling_process = get_theme_mod('about_us_transparent_selling_process',__('100'));

    $about_us_hero_title = get_theme_mod( 'about_us_hero_title', __('About Our <br> Premium Properties', 'sbtech') );
    $about_us_hero_desc = get_theme_mod( 'about_us_hero_desc', __('Award-winning real estate agency in Dubai, offering expert services in sales, rentals, and property management. We help clients from all over the world.', 'sbtech') );
    $about_us_hero_btn_text_1 = get_theme_mod( 'about_us_hero_btn_text_1', __('View Properties', 'sbtech') );
    $about_us_hero_btn_text_2 = get_theme_mod( 'about_us_hero_btn_text_2', __('Contact', 'sbtech') );
    
    ?>
    <style>
        .about_hero{
        position:relative;
        width:100%;
        min-height:520px;
        background:url("<?php echo $about_us_hero_bg; ?>") center/cover no-repeat;
        display:flex;
        align-items:center;
        }
    </style>
<section class="about_hero">
    <div class="about_overlay"></div>

    <div class="about_container">
        <div class="about_content">

            <div class="about_breadcrumb">
                <a href="<?php echo home_url(); ?>">Home</a>
                <span>•</span>
                <a href="<?php echo home_url('/about-us'); ?>">About Us</a>
            </div>

            <?php if (!empty($about_us_hero_title)) : ?>
            <h1 class="about_title"><?php echo sbtech_kses($about_us_hero_title); ?></h1>
            <?php endif; ?>

            <?php if (!empty($about_us_hero_desc)) : ?>
            <p class="about_desc"><?php echo sbtech_kses($about_us_hero_desc); ?></p>
            <?php endif; ?>

            <div class="about_buttons">
                <?php if (!empty($about_us_hero_btn_text_1)) : ?>
                <a href="<?php echo home_url('/buy'); ?>" class="about_btn about_primary"><?php echo esc_html($about_us_hero_btn_text_1); ?></a>
                <?php endif; ?>

                <?php if (!empty($about_us_hero_btn_text_2)) : ?>
                <button class="sell-cta-btn" id="sellOpenModal" class="about_btn"><?php echo esc_html($about_us_hero_btn_text_2); ?></button>
                <?php endif; ?>

            </div>

        </div>
    </div>
</section>
<!-- form start-->
<div class="sell-modal" id="sellModal" aria-hidden="true">
    <div class="sell-modal__backdrop" data-sell-close="1"></div>

    <div class="sell-modal__dialog" role="dialog" aria-modal="true" aria-label="List your property form">
        <button class="sell-modal__close" type="button" aria-label="Close" data-sell-close="1">✕</button>

        <div class="sell-modal__grid">
                <?php echo do_shortcode('[button_contact_form_direct]'); ?>
            </div>
    </div>
</div>
<!-- form end-->
<!-- Hero area end -->

<!-- Who we are start -->
    <?php
    $about_us_clients_served = get_theme_mod('about_us_clients_served',__('200,000'));
    $about_us_expertise = get_theme_mod('about_us_expertise',__('12'));
    $about_us_successful_closings = get_theme_mod('about_us_successful_closings',__('3,000'));
    $about_us_transaction = get_theme_mod('about_us_transaction',__('2B'));

    $who_wa_title = get_theme_mod( 'who_wa_title', __('Who We Are', 'sbtech') );
    $who_wa_desc = get_theme_mod( 'who_wa_desc', __('<p class="about_text">We are a Dubai-based real estate consultancy focused on premium residential and investment opportunities. Our team blends local market expertise with clear guidance—helping buyers, sellers, and investors move with confidence. </p> <p class="about_text"> From discovery to closing, we deliver a seamless experience with verified listings, strong developer relationships, and responsive support tailored to your goals. </p>', 'sbtech') );

    $about_us_clients_served_text = get_theme_mod( 'about_us_clients_served_text', __('clients served', 'sbtech') );
    $about_us_expertise_text = get_theme_mod( 'about_us_expertise_text', __('Clients Expertise', 'sbtech') );
    $about_us_successful_closings_text = get_theme_mod( 'about_us_successful_closings_text', __('successful closings', 'sbtech') );
    $about_us_transaction_text = get_theme_mod( 'about_us_transaction_text', __('Transaction Value', 'sbtech') );

    $why_sell_title = get_theme_mod( 'why_sell_title', __('Why sell your property <span>with us?</span>', 'sbtech') );
    $about_us_mv_text = get_theme_mod( 'about_us_mv_text', __('Properties sold at market value', 'sbtech') );
    $about_us_experience_text = get_theme_mod( 'about_us_experience_text', __('Experience in property sales', 'sbtech') );
    $about_us_sptrans_text = get_theme_mod( 'about_us_sptrans_text', __('Successful property transactions', 'sbtech') );
    $about_us_active_buyers_text = get_theme_mod( 'about_us_active_buyers_text', __('Successful property transactions', 'sbtech') );
    $about_us_client_support_text = get_theme_mod( 'about_us_client_support_text', __('Successful property transactions', 'sbtech') );
    $about_us_transparent_selling_process_text = get_theme_mod( 'about_us_transparent_selling_process_text', __('Transparent selling process', 'sbtech') );
    $powerful_m_title = get_theme_mod( 'powerful_m_title', __('Powerful Marketing. <span>Real Results.</span>', 'sbtech') );

    $powerful_m_item_1 = get_theme_mod( 'powerful_m_item_1', __('Professional photography, videography, and high-converting property presentations.', 'sbtech') );
    $powerful_m_item_2 = get_theme_mod( 'powerful_m_item_2', __('Optimized website visibility and SEO-ready listing pages to attract organic buyers.', 'sbtech') );
    $powerful_m_item_3 = get_theme_mod( 'powerful_m_item_3', __('Targeted social media campaigns across key channels to reach serious buyers fast.', 'sbtech') );
    $powerful_m_item_4 = get_theme_mod( 'powerful_m_item_4', __('WhatsApp & email outreach to our engaged database for immediate exposure.', 'sbtech') );
    $powerful_m_item_5 = get_theme_mod( 'powerful_m_item_5', __('Qualified buyer leads from portals, remarketing, and high-intent ad funnels.', 'sbtech') );
    $powerful_m_item_6 = get_theme_mod( 'powerful_m_item_6', __('PR-ready listing assets and premium branding for stronger buyer trust.', 'sbtech') );
    $powerful_m_item_7 = get_theme_mod( 'powerful_m_item_7', __('Private viewings, open houses, and guided buyer tours that convert.', 'sbtech') );
    $powerful_m_item_8 = get_theme_mod( 'powerful_m_item_8', __('Dedicated support from listing to closing, with clear updates and reporting.', 'sbtech') );
    $powerful_m_item_9 = get_theme_mod( 'powerful_m_item_9', __('Dedicated support from listing to closing, with clear updates and reporting.', 'sbtech') );
    ?>
<section class="about_who">
    <div class="about_container">

        <div class="about_who_wrap">

            <!-- LEFT -->
            <div class="about_left">
                <?php if (!empty($who_wa_title)) : ?>
                <h2 class="about_title"><?php echo esc_html($who_wa_title); ?></h2>
                <?php endif; ?>

                <?php if (!empty($who_wa_desc)) : ?>
                <p class="about_text"><?php echo sbtech_kses($who_wa_desc); ?></p>
                <?php endif; ?>

                <div class="about_stats">
                    <?php if (!empty($about_us_clients_served_text)) : ?>
                    <div class="about_stat about_stat_primary">
                        <div class="about_stat_value"><?php echo $about_us_clients_served; ?>+</div>
                        <div class="about_stat_label"><?php echo esc_html($about_us_clients_served_text); ?></div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($about_us_expertise_text)) : ?>
                    <div class="about_stat">
                        <div class="about_stat_value"><?php echo $about_us_expertise; ?>+ Years</div>
                        <div class="about_stat_label"><?php echo esc_html($about_us_expertise_text); ?></div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($about_us_successful_closings_text)) : ?>
                    <div class="about_stat">
                        <div class="about_stat_value"><?php echo $about_us_successful_closings; ?>+</div>
                        <div class="about_stat_label"><?php echo esc_html($about_us_successful_closings_text); ?></div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($about_us_transaction_text)) : ?>
                    <div class="about_stat">
                        <div class="about_stat_value">AED <?php echo $about_us_transaction; ?>+</div>
                        <div class="about_stat_label"><?php echo esc_html($about_us_transaction_text); ?></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="about_right">
                <div class="about_img_box">
                    <img
                        class="about_img"
                        src="<?php echo $about_us_wwa_img; ?>"
                        alt="Our Team">
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Who we are End -->

<!-- Why list start -->
<section class="sell-why">
    <div class="sell-why-container">

        <header class="sell-why-head">
            <?php if (!empty($why_sell_title)) : ?>
            <h2 class="sell-why-title"><?php echo sbtech_kses($why_sell_title); ?></h2>
            <?php endif; ?>
        </header>

        <div class="sell-why-grid">

            <!-- Left Image -->
            <div class="sell-why-media">
                <img src="<?php echo $about_us_wsell; ?>" alt="Real estate team">
            </div>

            <!-- Right Stats -->
            <div class="sell-why-stats">

                <?php if (!empty($about_us_mv_text)) : ?>
                <div class="sell-stat">
                    <h3><?php echo $about_us_mv; ?>%</h3>
                    <p><?php echo esc_html($about_us_mv_text); ?></p>
                </div>
                <?php endif; ?>

                <?php if (!empty($about_us_experience_text)) : ?>
                <div class="sell-stat">
                    <h3><?php echo $about_us_experience; ?>+ years</h3>
                    <p><?php echo esc_html($about_us_experience_text); ?></p>
                </div>
                <?php endif; ?>

                <?php if (!empty($about_us_sptrans_text)) : ?>
                <div class="sell-stat">
                    <h3><?php echo $about_us_sptrans; ?>+</h3>
                    <p><?php echo esc_html($about_us_sptrans_text); ?></p>
                </div>
                <?php endif; ?>

                <?php if (!empty($about_us_active_buyers_text)) : ?>
                <div class="sell-stat">
                    <h3><?php echo $about_us_active_buyers; ?>+</h3>
                    <p><?php echo esc_html($about_us_active_buyers_text); ?></p>
                </div>
                <?php endif; ?>

                <?php if (!empty($about_us_client_support_text)) : ?>
                <div class="sell-stat">
                    <h3><?php echo $about_us_client_support; ?></h3>
                    <p><?php echo esc_html($about_us_client_support_text); ?></p>
                </div>
                <?php endif; ?>

                <?php if (!empty($about_us_transparent_selling_process_text)) : ?>
                <div class="sell-stat">
                    <h3><?php echo $about_us_transparent_selling_process; ?>%</h3>
                    <p><?php echo esc_html($about_us_transparent_selling_process_text); ?></p>
                </div>
                <?php endif; ?>

            </div>

        </div>
    </div>
</section>
<!-- Why list end -->

<!-- powerful Marketing start -->
<section class="sell-mkt">
    <div class="sell-mkt__container">
        <header class="sell-mkt__head">
            <?php if (!empty($powerful_m_title)) : ?>
            <h2 class="sell-mkt__title"><?php echo sbtech_kses($powerful_m_title); ?> </h2>
            <?php endif; ?>
        </header>

        <div class="sell-mkt__grid">

            <?php if (!empty($powerful_m_item_1)) : ?>
            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- camera -->
                    <svg viewBox="0 0 24 24">
                        <path d="M7 7h2l1-2h4l1 2h2a3 3 0 0 1 3 3v7a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3v-7a3 3 0 0 1 3-3Zm5 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text"><?php echo esc_html($powerful_m_item_1); ?></p>
            </article>
            <?php endif; ?>
            
            <?php if (!empty($powerful_m_item_2)) : ?>
            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- screen -->
                    <svg viewBox="0 0 24 24">
                        <path d="M4 5a3 3 0 0 1 3-3h10a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3h-4l1 2h2v2H8v-2h2l1-2H7a3 3 0 0 1-3-3V5Zm3-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H7Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text"><?php echo esc_html($powerful_m_item_2); ?></p>
            </article>
            <?php endif; ?>

            <?php if (!empty($powerful_m_item_3)) : ?>
            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- megaphone -->
                    <svg viewBox="0 0 24 24">
                        <path d="M3 11a4 4 0 0 0 4 4h1l2 6h2l-1.6-6H17l4 3V6l-4 3H7a4 4 0 0 0-4 2Zm14 2H7a2 2 0 1 1 0-4h10v4Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text"><?php echo esc_html($powerful_m_item_3); ?></p>
            </article>
            <?php endif; ?>

            <?php if (!empty($powerful_m_item_4)) : ?>
            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- whatsapp/chat -->
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2a10 10 0 0 0-8.7 14.9L2 22l5.3-1.3A10 10 0 1 0 12 2Zm0 18a8 8 0 0 1-4.1-1.1l-.3-.2-3.1.8.8-3.1-.2-.3A8 8 0 1 1 12 20Zm4.6-5.4c-.2-.1-1.2-.6-1.3-.6-.2-.1-.3-.1-.5.1l-.6.8c-.1.2-.2.2-.4.1a6.5 6.5 0 0 1-1.9-1.2 7.3 7.3 0 0 1-1.3-1.7c-.1-.2 0-.3.1-.4l.4-.5c.1-.1.1-.2.2-.3.1-.1 0-.2 0-.4l-.6-1.4c-.2-.4-.4-.4-.5-.4h-.5c-.2 0-.4.1-.6.3-.2.2-.8.7-.8 1.8 0 1 .8 2.1.9 2.2.1.2 1.6 2.5 3.9 3.5.5.2 1 .4 1.3.5.6.2 1.2.2 1.6.1.5-.1 1.2-.5 1.4-1 .2-.5.2-1 .1-1.1-.1-.1-.2-.1-.4-.2Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text"><?php echo esc_html($powerful_m_item_4); ?></p>
            </article>
            <?php endif; ?>

            <?php if (!empty($powerful_m_item_5)) : ?>
            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- chart/target -->
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8Zm0-14a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 10a4 4 0 1 1 4-4 4 4 0 0 1-4 4Zm6-11-2 2-1-1 2-2 1 1Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text"><?php echo esc_html($powerful_m_item_5); ?></p>
            </article>
            <?php endif; ?>

            <?php if (!empty($powerful_m_item_6)) : ?>
            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- newspaper -->
                    <svg viewBox="0 0 24 24">
                        <path d="M4 4h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4Zm2 2v12h10V6H6Zm14 2h2v10a4 4 0 0 1-4 4H6v-2h12a2 2 0 0 0 2-2V8ZM8 8h6v2H8V8Zm0 4h10v2H8v-2Zm0 4h10v2H8v-2Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text"><?php echo esc_html($powerful_m_item_6); ?></p>
            </article>
            <?php endif; ?>

            <?php if (!empty($powerful_m_item_7)) : ?>
            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- house -->
                    <svg viewBox="0 0 24 24">
                        <path d="M12 3 2 12h3v9h6v-6h2v6h6v-9h3L12 3Zm5 16h-2v-6H9v6H7v-8.2l5-4.6 5 4.6V19Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text"><?php echo esc_html($powerful_m_item_7); ?></p>
            </article>
            <?php endif; ?>

            <?php if (!empty($powerful_m_item_8)) : ?>
            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- headset -->
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2a8 8 0 0 0-8 8v5a3 3 0 0 0 3 3h1v-8H7a1 1 0 0 0-1 1v5a1 1 0 0 1-1-1v-5a7 7 0 0 1 14 0v5a1 1 0 0 1-1 1v-5a1 1 0 0 0-1-1h-1v8h1a3 3 0 0 0 3-3v-5a8 8 0 0 0-8-8Zm-1 20h4v-2h-4v2Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text"><?php echo esc_html($powerful_m_item_8); ?></p>
            </article>
            <?php endif; ?>

            <?php if (!empty($powerful_m_item_9)) : ?>
            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- calendar -->
                    <svg viewBox="0 0 24 24">
                        <path d="M7 2h2v2h6V2h2v2h3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h3V2Zm14 8H3v10h18V10ZM4 6v2h16V6H4Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text"><?php echo esc_html($powerful_m_item_9); ?></p>
            </article>
            <?php endif; ?>

        </div>
    </div>
</section>
<!-- powerful Marketing end -->

<!-- Our Achievements start -->
    <?php
    $switch_about_us_achivement = get_theme_mod('switch_about_us_achivement', false);
    ?>
    <?php if(!empty($switch_about_us_achivement)) : ?>
    <section class="about_ach">
        <div class="about_container">

            <div class="about_ach_head">
                <h2 class="about_ach_title">Our Achievements</h2>

                <div class="about_ach_nav">
                    <button class="about_ach_btn" type="button" aria-label="Previous" data-ach-prev>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button class="about_ach_btn about_ach_btn_primary" type="button" aria-label="Next" data-ach-next>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="about_ach_track" data-ach-track>
                <?php

                $q_achievements = new WP_Query([
                    'post_type'      => 'achievements',
                    'posts_per_page' => 10,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ]);
                
                if ($q_achievements->have_posts()) :
                while ($q_achievements->have_posts()) : $q_achievements->the_post();
                    
                $award = get_post_meta(get_the_ID(), 'award', true);
                ?>

                <!-- Card start -->
                <article class="about_ach_card">
                    <div class="about_ach_imgwrap">
                        <img class="about_ach_img" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="Award trophy">
                    </div>
                    <div class="about_ach_badge"><?php echo $award; ?></div>
                    <h3 class="about_ach_name"><?php the_title(); ?></h3>
                    <p class="about_ach_desc"><?php the_content(); ?></p>
                </article>
                <!-- Card end -->
                <?php
                endwhile;
                else :
                    echo 'No properties found.';
                endif;
                ?>
                <?php wp_reset_postdata(); ?>

                

            </div>
        </div>
    </section>
    <?php endif;?>
<!-- Our Achievements end -->

<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->

<?php get_footer(); ?>