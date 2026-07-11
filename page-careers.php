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
        .careers_hero__content {
            background: #ffffff;
            padding: 50px 33px;
            border-radius: 10px;
        }
        .text_content {
            color: black !important;
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

                <div class="careers_hero__content">
                    <?php if (!empty($careers_hero_title)) : ?>
                    <h1 class="about_title text_content"><?php echo sbtech_kses($careers_hero_title); ?></h1>
                    <?php endif; ?>

                    <?php if (!empty($careers_hero_desc)) : ?>
                    <p class="about_desc text_content"><?php echo sbtech_kses($careers_hero_desc); ?></p>
                    <?php endif; ?>

                    <div class="about_buttons">
                        <?php if (!empty($careers_hero_btn_text_1)) : ?>
                        <a href="<?php echo home_url('/buy'); ?>" class="about_btn about_primary"><?php echo esc_html($careers_hero_btn_text_1); ?></a>
                        <?php endif; ?>

                        <?php if (!empty($careers_hero_btn_text_2)) : ?>
                        <button class="sell-cta-btn " id="sellOpenModal" class="about_btn"><?php echo esc_html($careers_hero_btn_text_2); ?></button>
                        <?php endif; ?>
                    </div>
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
                        <?php echo do_shortcode('[submit-your-cv]'); ?>
                    </div>
            </div>
        </div>
    <!-- form end-->
<!-- Hero area end -->

<!-- My Agent Great Place To Work start -->
    <?php
    $my_agent_award_title = get_theme_mod( 'award_title', __('The Leading Real Estate Employer <span class="accent">Recognized for Excellence</span>', 'sbtech') );
    $my_agent_award_desc = get_theme_mod( 'award_desc', __('Our workplace is built on innovation, growth, and a people-first culture. We are proud to be recognized for fostering talent, empowering careers, and creating an environment where individuals thrive and succeed together.', 'sbtech') );

    $my_agent_award_img_1 = get_theme_mod('award_img_1', get_template_directory_uri().'/assets/awards/PhotoshopExtension_Image.png');
    $my_agent_award_img_2 = get_theme_mod('award_img_2', get_template_directory_uri().'/assets/awards/PhotoshopExtension_Image.png');
    $my_agent_award_img_3 = get_theme_mod('award_img_3', get_template_directory_uri().'/assets/awards/PhotoshopExtension_Image.png');
    $my_agent_award_img_4 = get_theme_mod('award_img_4', get_template_directory_uri().'/assets/awards/PhotoshopExtension_Image.png');
    $my_agent_award_img_5 = get_theme_mod('award_img_5', get_template_directory_uri().'/assets/awards/PhotoshopExtension_Image.png');

    $my_agent_award_img_1_text = get_theme_mod( 'award_img_1_text', __('Best Workplaces — UAE 2024', 'sbtech') );
    $my_agent_award_img_2_text = get_theme_mod( 'award_img_2_text', __('Best Workplaces — UAE 2024', 'sbtech') );
    $my_agent_award_img_3_text = get_theme_mod( 'award_img_3_text', __('Best Workplaces — UAE 2024', 'sbtech') );
    $my_agent_award_img_4_text = get_theme_mod( 'award_img_4_text', __('Best Workplaces — UAE 2024', 'sbtech') );
    $my_agent_award_img_5_text = get_theme_mod( 'award_img_5_text', __('Best Workplaces — UAE 2024', 'sbtech') );
    ?>

    <section class="my_agent_awards" id="my_agent_awards">
        <div class="my_agent_awards__container">

            <?php if (!empty($my_agent_award_title)) : ?>
                <h2 class="my_agent_awards__title">
                    <?php echo function_exists('sbtech_kses') ? sbtech_kses($my_agent_award_title) : wp_kses_post($my_agent_award_title); ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($my_agent_award_desc)) : ?>
                <p class="my_agent_awards__sub">
                    <?php echo function_exists('sbtech_kses') ? sbtech_kses($my_agent_award_desc) : wp_kses_post($my_agent_award_desc); ?>
                </p>
            <?php endif; ?>

            <div class="my_agent_awards__frame" data-my-agent-awards>
                <button class="my_agent_awards__nav my_agent_awards__nav--prev" type="button" aria-label="Previous" data-my-agent-prev>
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <div class="my_agent_awards__viewport" data-my-agent-viewport>
                    <div class="my_agent_awards__track" data-my-agent-track>

                        <?php if (!empty($my_agent_award_img_1)) : ?>
                            <article class="my_agent_awards__card">
                                <div class="my_agent_awards__img">
                                    <img src="<?php echo esc_url($my_agent_award_img_1); ?>" alt="Best Workplaces UAE 2025">
                                </div>
                                <?php if (!empty($my_agent_award_img_1_text)) : ?>
                                    <p class="my_agent_awards__cap"><?php echo esc_html($my_agent_award_img_1_text); ?></p>
                                <?php endif; ?>
                            </article>
                        <?php endif; ?>

                        <?php if (!empty($my_agent_award_img_2)) : ?>
                            <article class="my_agent_awards__card">
                                <div class="my_agent_awards__img">
                                    <img src="<?php echo esc_url($my_agent_award_img_2); ?>" alt="Best Workplaces UAE 2024">
                                </div>
                                <?php if (!empty($my_agent_award_img_2_text)) : ?>
                                    <p class="my_agent_awards__cap"><?php echo esc_html($my_agent_award_img_2_text); ?></p>
                                <?php endif; ?>
                            </article>
                        <?php endif; ?>

                        <?php if (!empty($my_agent_award_img_3)) : ?>
                            <article class="my_agent_awards__card">
                                <div class="my_agent_awards__img">
                                    <img src="<?php echo esc_url($my_agent_award_img_3); ?>" alt="Best Workplaces for Women">
                                </div>
                                <?php if (!empty($my_agent_award_img_3_text)) : ?>
                                    <p class="my_agent_awards__cap"><?php echo esc_html($my_agent_award_img_3_text); ?></p>
                                <?php endif; ?>
                            </article>
                        <?php endif; ?>

                        <?php if (!empty($my_agent_award_img_4)) : ?>
                            <article class="my_agent_awards__card">
                                <div class="my_agent_awards__img">
                                    <img src="<?php echo esc_url($my_agent_award_img_4); ?>" alt="Best Workplaces for Millennials">
                                </div>
                                <?php if (!empty($my_agent_award_img_4_text)) : ?>
                                    <p class="my_agent_awards__cap"><?php echo esc_html($my_agent_award_img_4_text); ?></p>
                                <?php endif; ?>
                            </article>
                        <?php endif; ?>

                        <?php if (!empty($my_agent_award_img_5)) : ?>
                            <article class="my_agent_awards__card">
                                <div class="my_agent_awards__img">
                                    <img src="<?php echo esc_url($my_agent_award_img_5); ?>" alt="Best Workplaces GCC 2022">
                                </div>
                                <?php if (!empty($my_agent_award_img_5_text)) : ?>
                                    <p class="my_agent_awards__cap"><?php echo esc_html($my_agent_award_img_5_text); ?></p>
                                <?php endif; ?>
                            </article>
                        <?php endif; ?>

                    </div>
                </div>

                <button class="my_agent_awards__nav my_agent_awards__nav--next" type="button" aria-label="Next" data-my-agent-next>
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <div class="my_agent_awards__dots" data-my-agent-dots></div>
            </div>
        </div>
    </section>

    <style>
        .my_agent_awards {
            width: 100%;
            padding: 68px 20px 58px;
            background: #ffffff;
            overflow: hidden;
            box-sizing: border-box;
        }

        .my_agent_awards *,
        .my_agent_awards *::before,
        .my_agent_awards *::after {
            box-sizing: border-box;
        }

        .my_agent_awards__container {
            max-width: 1168px;
            width: 100%;
            margin: 0 auto;
            text-align: center;
        }

        .my_agent_awards__title {
            max-width: 960px;
            margin: 0 auto;
            color: #000000;
            font-size: 38px;
            line-height: 1.18;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .my_agent_awards__title .accent {
            color: #e93b32;
        }

        .my_agent_awards__sub {
            max-width: 650px;
            margin: 12px auto 24px;
            color: #333333;
            font-size: 15px;
            line-height: 1.75;
            font-weight: 400;
            letter-spacing: 0.2px;
        }

        .my_agent_awards__frame {
            position: relative;
            width: 100%;
            padding: 18px 56px 30px;
            border-top: 1px solid #e9edf2;
            border-bottom: 1px solid #e9edf2;
            --my-agent-gap: 14px;
            --my-agent-per-view: 4;
        }

        .my_agent_awards__viewport {
            width: 100%;
            overflow: hidden;
            touch-action: pan-y;
        }

        .my_agent_awards__track {
            display: flex;
            gap: var(--my-agent-gap);
            transition: transform 0.45s ease;
            will-change: transform;
            transform: translate3d(0, 0, 0);
        }

        .my_agent_awards__card {
            flex: 0 0 calc((100% - (var(--my-agent-gap) * (var(--my-agent-per-view) - 1))) / var(--my-agent-per-view));
            max-width: calc((100% - (var(--my-agent-gap) * (var(--my-agent-per-view) - 1))) / var(--my-agent-per-view));
            min-width: 0;
            text-align: left;
            background: #ffffff;
            border: 1px solid #e8edf3;
            border-radius: 12px;
            padding: 12px 12px 13px;
        }

        .my_agent_awards__img {
            width: 100%;
            height: 214px;
            background: #ffffff;
            border: 1px solid #edf1f5;
            border-radius: 8px;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .my_agent_awards__img img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            display: block;
            object-fit: contain;
            margin: 0 auto;
            image-rendering: auto;
        }

        .my_agent_awards__cap {
            margin: 12px 0 0;
            color: #242424;
            font-size: 14px;
            line-height: 1.35;
            font-weight: 700;
            letter-spacing: 0.1px;
        }

        .my_agent_awards__nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 5;
            width: 40px;
            height: 40px;
            border: 1px solid #e8edf3;
            border-radius: 50%;
            background: #ffffff;
            color: #000000;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.25s ease;
            padding: 0;
        }

        .my_agent_awards__nav:hover {
            background: #ffffff;
            color: #000000;
            border-color: #d9e0e8;
        }

        .my_agent_awards__nav svg {
            width: 18px;
            height: 18px;
        }

        .my_agent_awards__nav--prev {
            left: 10px;
        }

        .my_agent_awards__nav--next {
            right: 10px;
        }

        .my_agent_awards__nav.my_agent_is_disabled {
            opacity: 0.45;
            cursor: not-allowed;
            pointer-events: none;
        }

        .my_agent_awards__dots {
            display: none;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 22px;
        }

        .my_agent_awards__dot {
            width: 7px;
            height: 7px;
            border: 0;
            border-radius: 50%;
            background: #d1d5db;
            padding: 0;
            cursor: pointer;
        }

        .my_agent_awards__dot.my_agent_is_active {
            width: 20px;
            border-radius: 20px;
            background: #000000;
        }

        /* Tablet */
        @media (max-width: 991px) {
            .my_agent_awards {
                padding: 58px 18px 50px;
            }

            .my_agent_awards__title {
                font-size: 34px;
            }

            .my_agent_awards__frame {
                padding-left: 50px;
                padding-right: 50px;
                --my-agent-per-view: 3;
                --my-agent-gap: 14px;
            }

            .my_agent_awards__img {
                height: 200px;
            }
        }

        /* Mobile */
        @media (max-width: 767px) {
            .my_agent_awards {
                padding: 46px 15px 42px;
            }

            .my_agent_awards__title {
                font-size: 28px;
                line-height: 1.25;
                letter-spacing: 0.4px;
            }

            .my_agent_awards__sub {
                font-size: 14px;
                line-height: 1.65;
                margin-bottom: 22px;
            }

            .my_agent_awards__frame {
                padding: 16px 42px 26px;
                --my-agent-per-view: 1;
                --my-agent-gap: 14px;
            }

            .my_agent_awards__card {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .my_agent_awards__img {
                height: 220px;
            }

            .my_agent_awards__nav {
                width: 34px;
                height: 34px;
            }

            .my_agent_awards__nav--prev {
                left: 0;
            }

            .my_agent_awards__nav--next {
                right: 0;
            }

            .my_agent_awards__dots {
                display: flex;
            }
        }

        @media (max-width: 420px) {
            .my_agent_awards__frame {
                padding-left: 38px;
                padding-right: 38px;
            }

            .my_agent_awards__img {
                height: 190px;
            }
        }
    </style>

    <script>
        (function () {
            "use strict";

            function my_agent_awards_ready(callback) {
                if (document.readyState !== "loading") {
                    callback();
                } else {
                    document.addEventListener("DOMContentLoaded", callback);
                }
            }

            function my_agent_awards_init(frame) {
                if (!frame || frame.getAttribute("data-my-agent-init") === "true") return;
                frame.setAttribute("data-my-agent-init", "true");

                var viewport = frame.querySelector("[data-my-agent-viewport]");
                var track = frame.querySelector("[data-my-agent-track]");
                var prevBtn = frame.querySelector("[data-my-agent-prev]");
                var nextBtn = frame.querySelector("[data-my-agent-next]");
                var dotsWrap = frame.querySelector("[data-my-agent-dots]");
                var cards = track ? Array.prototype.slice.call(track.querySelectorAll(".my_agent_awards__card")) : [];

                if (!viewport || !track || !prevBtn || !nextBtn || !dotsWrap || !cards.length) return;

                var currentIndex = 0;
                var perView = 1;
                var gap = 0;
                var maxIndex = 0;
                var resizeTimer = null;

                function getPerView() {
                    var value = window.getComputedStyle(frame).getPropertyValue("--my-agent-per-view");
                    value = parseInt(value, 10);
                    return isNaN(value) || value < 1 ? 1 : value;
                }

                function getGap() {
                    var value = window.getComputedStyle(frame).getPropertyValue("--my-agent-gap");
                    value = parseFloat(value);
                    return isNaN(value) ? 0 : value;
                }

                function buildDots() {
                    dotsWrap.innerHTML = "";

                    for (var i = 0; i <= maxIndex; i++) {
                        var dot = document.createElement("button");
                        dot.type = "button";
                        dot.className = "my_agent_awards__dot";
                        dot.setAttribute("aria-label", "Go to slide " + (i + 1));

                        (function (index) {
                            dot.addEventListener("click", function () {
                                currentIndex = index;
                                updateSlider();
                            });
                        })(i);

                        dotsWrap.appendChild(dot);
                    }
                }

                function updateSlider() {
                    var cardWidth = cards[0].getBoundingClientRect().width;
                    var moveX = currentIndex * (cardWidth + gap);

                    track.style.transform = "translate3d(-" + moveX + "px, 0, 0)";

                    prevBtn.classList.toggle("my_agent_is_disabled", currentIndex <= 0);
                    nextBtn.classList.toggle("my_agent_is_disabled", currentIndex >= maxIndex);

                    var dots = dotsWrap.querySelectorAll(".my_agent_awards__dot");
                    for (var i = 0; i < dots.length; i++) {
                        dots[i].classList.toggle("my_agent_is_active", i === currentIndex);
                    }
                }

                function refreshSlider() {
                    perView = getPerView();
                    gap = getGap();
                    maxIndex = Math.max(0, cards.length - perView);

                    if (currentIndex > maxIndex) {
                        currentIndex = maxIndex;
                    }

                    buildDots();
                    updateSlider();
                }

                prevBtn.addEventListener("click", function () {
                    if (currentIndex > 0) {
                        currentIndex--;
                        updateSlider();
                    }
                });

                nextBtn.addEventListener("click", function () {
                    if (currentIndex < maxIndex) {
                        currentIndex++;
                        updateSlider();
                    }
                });

                var startX = 0;
                var startY = 0;
                var endX = 0;
                var endY = 0;

                viewport.addEventListener("touchstart", function (event) {
                    if (!event.touches || !event.touches.length) return;

                    startX = event.touches[0].clientX;
                    startY = event.touches[0].clientY;
                    endX = startX;
                    endY = startY;
                }, { passive: true });

                viewport.addEventListener("touchmove", function (event) {
                    if (!event.touches || !event.touches.length) return;

                    endX = event.touches[0].clientX;
                    endY = event.touches[0].clientY;
                }, { passive: true });

                viewport.addEventListener("touchend", function () {
                    var diffX = startX - endX;
                    var diffY = startY - endY;

                    if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 40) {
                        if (diffX > 0 && currentIndex < maxIndex) {
                            currentIndex++;
                            updateSlider();
                        } else if (diffX < 0 && currentIndex > 0) {
                            currentIndex--;
                            updateSlider();
                        }
                    }

                    startX = 0;
                    startY = 0;
                    endX = 0;
                    endY = 0;
                });

                window.addEventListener("resize", function () {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(refreshSlider, 150);
                });

                window.addEventListener("load", refreshSlider);

                refreshSlider();
            }

            my_agent_awards_ready(function () {
                var sliders = document.querySelectorAll("[data-my-agent-awards]");
                for (var i = 0; i < sliders.length; i++) {
                    my_agent_awards_init(sliders[i]);
                }
            });
        })();
    </script>
<!-- My Agent Great Place To Work end -->

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

<!-- careers form start -->
<?php echo do_shortcode('[careers_form]'); ?>
<!-- careers form end -->

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

<!-- faq section start -->
 <?php echo do_shortcode('[career_faq_shortcode]'); ?>
<!-- faq section end -->



<!-- Newsletter section start -->
 <?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->

<?php get_footer(); ?>