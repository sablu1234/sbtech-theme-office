<?php get_header(); ?>

<!-- Hero area start -->
    <?php
    $careers_hero_bg = get_theme_mod('careers_hero_bg', get_template_directory_uri().'/assets/media_press/media_press.jpg');

    $careers_hero_title = get_theme_mod( 'careers_hero_title', __('About Our <br> Premium Properties', 'sbtech') );
    $careers_hero_desc = get_theme_mod( 'careers_hero_desc', __('About Our <br> Premium Properties', 'sbtech') );
    $careers_hero_btn_text_1 = get_theme_mod( 'careers_hero_btn_text_1', __('View Properties', 'sbtech') );
    $careers_hero_btn_text_2 = get_theme_mod( 'careers_hero_btn_text_2', __('Contact Us', 'sbtech') );
    ?>
    <style>
    .careers_hero{
      position:relative;
      width:100%;
      min-height:520px;
      background:url("<?php echo $careers_hero_bg; ?>") center/cover no-repeat;
      display:flex;
      align-items:center;
    }
    </style>
    <section class="careers_hero">
        <div class="about_overlay"></div>

        <div class="about_container">
            <div class="about_content">

                <div class="about_breadcrumb">
                    <a href="<?php echo home_url(); ?>">Home</a>
                    <span>•</span>
                    <a href="<?php echo home_url('/careers'); ?>">Careers</a>
                </div>

                <?php if (!empty($careers_hero_title)) : ?>
                <h1 class="about_title"><?php echo sbtech_kses($careers_hero_title); ?></h1>
                <?php endif; ?>

                <?php if (!empty($careers_hero_desc)) : ?>
                <p class="about_desc"><?php echo esc_html($careers_hero_desc); ?></p>
                <?php endif; ?>

                <div class="about_buttons">
                    <?php if (!empty($careers_hero_btn_text_1)) : ?>
                    <a href="<?php echo home_url('/buy'); ?>" class="about_btn about_primary"><?php echo esc_html($careers_hero_btn_text_1); ?></a>
                    <?php endif; ?>

                    <?php if (!empty($careers_hero_btn_text_2)) : ?>
                    <button class="sell-cta-btn" id="sellOpenModal" class="about_btn"><?php echo esc_html($careers_hero_btn_text_2); ?></button>
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

<!-- Great Place To Work start -->
    <?php
    $award_title = get_theme_mod( 'award_title', __('The Leading Real Estate Employer <span class="accent">Recognized for Excellence</span>', 'sbtech') );
    $award_desc = get_theme_mod( 'award_desc', __('Our workplace is built on innovation, growth, and a people-first culture. We are proud to be recognized for fostering talent, empowering careers, and creating an environment where individuals thrive and succeed together.', 'sbtech') );

    $award_img_1 = get_theme_mod('award_img_1', get_template_directory_uri().'/assets/awards/PhotoshopExtension_Image.png');
    $award_img_2 = get_theme_mod('award_img_2', get_template_directory_uri().'/assets/awards/PhotoshopExtension_Image.png');
    $award_img_3 = get_theme_mod('award_img_3', get_template_directory_uri().'/assets/awards/PhotoshopExtension_Image.png');
    $award_img_4 = get_theme_mod('award_img_4', get_template_directory_uri().'/assets/awards/PhotoshopExtension_Image.png');
    $award_img_5 = get_theme_mod('award_img_5', get_template_directory_uri().'/assets/awards/PhotoshopExtension_Image.png');

    $award_img_1_text = get_theme_mod( 'award_img_1_text', __('Best Workplaces — UAE 2024', 'sbtech') );
    $award_img_2_text = get_theme_mod( 'award_img_2_text', __('Best Workplaces — UAE 2024', 'sbtech') );
    $award_img_3_text = get_theme_mod( 'award_img_3_text', __('Best Workplaces — UAE 2024', 'sbtech') );
    $award_img_4_text = get_theme_mod( 'award_img_4_text', __('Best Workplaces — UAE 2024', 'sbtech') );
    $award_img_5_text = get_theme_mod( 'award_img_5_text', __('Best Workplaces — UAE 2024', 'sbtech') );

    ?>
    <section class="awards" id="awards">
        <div class="awards__container">
            <?php if (!empty($award_title)) : ?>
            <h2 class="awards__title"><?php echo sbtech_kses($award_title); ?> </h2>
            <?php endif; ?>

            <?php if (!empty($award_desc)) : ?>
            <p class="awards__sub"><?php echo sbtech_kses($award_desc); ?></p>
            <?php endif; ?>

            <div class="awards__frame" data-awards>
                <button class="awards__nav awards__nav--prev" type="button" aria-label="Previous" data-prev>
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <div class="awards__viewport">
                    <div class="awards__track" data-track>
                        <!-- Replace src with your real badge images -->

                        <?php if (!empty($award_img_1)) : ?>
                        <article class="awards__card">
                            <div class="awards__img">
                                <img src="<?php echo esc_url($award_img_1); ?>" alt="Best Workplaces UAE 2025">
                            </div>

                            <?php if (!empty($award_img_1_text)) : ?>
                            <p class="awards__cap"><?php echo esc_html($award_img_1_text); ?></p>
                            <?php endif; ?>
                        </article>
                        <?php endif; ?>

                        <?php if (!empty($award_img_2)) : ?>
                        <article class="awards__card">
                            <div class="awards__img">
                                <img src="<?php echo esc_url($award_img_2); ?>" alt="Best Workplaces UAE 2024">
                            </div>
                            <?php if (!empty($award_img_2_text)) : ?>
                            <p class="awards__cap"><?php echo esc_html($award_img_2_text); ?></p>
                            <?php endif; ?>
                        </article>
                        <?php endif; ?>

                        <?php if (!empty($award_img_3)) : ?>
                        <article class="awards__card">
                            <div class="awards__img">
                                <img src="<?php echo esc_url($award_img_3); ?>" alt="Best Workplaces for Women">
                            </div>
                            <?php if (!empty($award_img_3_text)) : ?>
                            <p class="awards__cap"><?php echo esc_html($award_img_3_text); ?></p>
                            <?php endif; ?>
                        </article>
                        <?php endif; ?>

                        <?php if (!empty($award_img_4)) : ?>
                        <article class="awards__card">
                            <div class="awards__img">
                                <img src="<?php echo esc_url($award_img_4); ?>" alt="Best Workplaces for Millennials">
                            </div>
                            <?php if (!empty($award_img_4_text)) : ?>
                            <p class="awards__cap"><?php echo esc_html($award_img_4_text); ?></p>
                            <?php endif; ?>
                        </article>
                        <?php endif; ?>

                        <?php if (!empty($award_img_5)) : ?>
                        <article class="awards__card">
                            <div class="awards__img">
                                <img src="<?php echo esc_url($award_img_5); ?>" alt="Best Workplaces GCC 2022">
                            </div>
                            <?php if (!empty($award_img_5_text)) : ?>
                            <p class="awards__cap"><?php echo esc_html($award_img_5_text); ?></p>
                            <?php endif; ?>
                        </article>
                        <?php endif; ?>

                    </div>
                </div>

                <button class="awards__nav awards__nav--next" type="button" aria-label="Next" data-next>
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <div class="awards__dots" data-dots></div>
            </div>
        </div>
    </section>
<!-- Great Place To Work end -->

<!-- what_makes section start -->
 <?php echo do_shortcode('[careers_section_what_makes]'); ?>
<!-- what_makes section end -->

<!-- Our team start -->
    <?php
    $careers_team_1 = get_theme_mod('careers_team_1', get_template_directory_uri().'/assets/careers/team_img_1.avif');
    $careers_team_2 = get_theme_mod('careers_team_2', get_template_directory_uri().'/assets/careers/team_img_2.avif');
    $careers_team_3 = get_theme_mod('careers_team_3', get_template_directory_uri().'/assets/careers/team_img_3.avif');
    $careers_team_4 = get_theme_mod('careers_team_4', get_template_directory_uri().'/assets/careers/team_img_4.avif');
    $careers_team_5 = get_theme_mod('careers_team_5', get_template_directory_uri().'/assets/careers/team_img_5.avif');
    $careers_team_6 = get_theme_mod('careers_team_6', get_template_directory_uri().'/assets/careers/team_img_6.avif');
    $careers_team_7 = get_theme_mod('careers_team_7', get_template_directory_uri().'/assets/careers/team_img_7.avif');

    $our_team_title = get_theme_mod( 'our_team_title', __('Our Amazing Team', 'sbtech') );
    $our_team_description = get_theme_mod( 'our_team_description', __('A glimpse into our culture—team achievements, events, and the people who make everything possible.', 'sbtech') );
    ?>
    <section class="careers_gallery">
        <div class="careers_container">

            <div class="careers_gallery__head">
                <?php if (!empty($our_team_title)) : ?>
                <h2 class="careers_gallery__title"><?php echo esc_html($our_team_title); ?></h2>
                <?php endif; ?>

                <?php if (!empty($our_team_description)) : ?>
                <p class="careers_gallery__sub">
                    <?php echo esc_html($our_team_description); ?>
                </p>
                <?php endif; ?>
            </div>

            <div class="careers_gallery__grid">

                <!-- BIG LEFT -->
                <a class="careers_gallery__item careers_gallery__item--lg" href="#" aria-label="Team gallery image 1">
                    <span class="careers_gallery__tag">Team Moments</span>
                    <img src="<?php echo $careers_team_1; ?>" alt="Team event photo">
                </a>

                <!-- TOP RIGHT 2 -->
                <a class="careers_gallery__item careers_gallery__item--md" href="#" aria-label="Team gallery image 2">
                    <span class="careers_gallery__tag">Awards</span>
                    <img src="<?php echo $careers_team_2; ?>" alt="Team group photo">
                </a>

                <a class="careers_gallery__item careers_gallery__item--md" href="#" aria-label="Team gallery image 3">
                    <span class="careers_gallery__tag">Culture</span>
                    <img src="<?php echo $careers_team_3; ?>" alt="Team celebrating photo">
                </a>

                <!-- MID RIGHT WIDE -->
                <a class="careers_gallery__item careers_gallery__item--wide" href="#" aria-label="Team gallery image 4">
                    <span class="careers_gallery__tag">Community</span>
                    <img src="<?php echo $careers_team_4; ?>" alt="Team community event">
                </a>

                <!-- BOTTOM RIGHT LARGE-ish -->
                <a class="careers_gallery__item careers_gallery__item--wide" href="#" aria-label="Team gallery image 5">
                    <span class="careers_gallery__tag">Leadership</span>
                    <img src="<?php echo $careers_team_5; ?>" alt="Leadership team photo">
                </a>

                <!-- BOTTOM LEFT 2 SMALL -->
                <a class="careers_gallery__item careers_gallery__item--sm" href="#" aria-label="Team gallery image 6">
                    <span class="careers_gallery__tag">Events</span>
                    <img src="<?php echo $careers_team_6; ?>" alt="Office event photo">
                </a>

                <a class="careers_gallery__item careers_gallery__item--sm" href="#" aria-label="Team gallery image 7">
                    <span class="careers_gallery__tag">Celebrations</span>
                    <img src="<?php echo $careers_team_7; ?>" alt="Team celebration photo">
                </a>

            </div>
        </div>
    </section>
<!-- Our team end -->

<!-- faq section start -->
 <?php echo do_shortcode('[career_faq_shortcode]'); ?>
<!-- faq section end -->

<!-- Hear form our team start -->
    <?php
    $faq_title = get_theme_mod( 'hear_from_our_team_title', __('Hear from our team', 'sbtech') );
    $faq_description = get_theme_mod( 'hear_from_our_team_description', __('Real stories from the people behind our success—collaboration, growth, and a culture that supports you.', 'sbtech') );
    $repeater_careers_here_from_our_team_items = get_theme_mod('repeater_careers_here_from_our_team');
    ?>
    <section class="careers_testimonials" id="careers_testimonials">
        <div class="careers_testimonials__container">

            <div class="careers_testimonials__head">
                <?php if (!empty($faq_title)) : ?>
                <h2 class="careers_testimonials__title"><?php echo $faq_title; ?></h2>
                <?php endif; ?>

                <?php if (!empty($faq_description)) : ?>
                <p class="careers_testimonials__sub"><?php echo $faq_description; ?></p>
                <?php endif; ?>
            </div>

            <div class="careers_testimonials__frame" data-careers-slider>
                <div class="careers_testimonials__track" data-careers-track>
                    
                    <!-- Slide 1 -->
                     <?php
                    if ( ! empty( $repeater_careers_here_from_our_team_items ) ) : foreach ( $repeater_careers_here_from_our_team_items as $item ) : 
                    ?>
                    <article class="careers_testimonials__slide">
                        <div class="careers_testimonials__media">
                            <div class="careers_testimonials__quoteMark" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M7 17h4V9H6v5c0 1.7 1.3 3 3 3Zm10 0h4V9h-5v5c0 1.7 1.3 3 3 3Z" fill="currentColor" />
                                </svg>
                            </div>
                            <div class="careers_testimonials__photo">
                                <img src="<?php echo $item['faq_image']; ?>" alt="Team member portrait">
                            </div>
                        </div>

                        <div class="careers_testimonials__content">
                            <p class="careers_testimonials__quote"><?php echo $item['faq_review']; ?></p>

                            <div class="careers_testimonials__nameRow">
                                <div class="careers_testimonials__meta">
                                    <p class="careers_testimonials__name"><?php echo $item['faq_name']; ?></p>
                                    <p class="careers_testimonials__role"><?php echo $item['faq_role']; ?></p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php 
                    endforeach;
                    endif; 
                    ?>

                </div>

                <div class="careers_testimonials__controls">
                    <button class="careers_testimonials__btn" type="button" aria-label="Previous" data-careers-prev>
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button class="careers_testimonials__btn" type="button" aria-label="Next" data-careers-next>
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="careers_testimonials__dots" data-careers-dots></div>
        </div>
    </section>
<!-- Hear from our team end -->

<!-- careers form start -->
<?php echo do_shortcode('[careers_form]'); ?>
<!-- careers form end -->

<!-- Newsletter section start -->
 <?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->

<?php get_footer(); ?>