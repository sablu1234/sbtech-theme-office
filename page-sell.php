<?php get_header(); ?>

    <?php
    $sell_header_image = get_theme_mod('sell_header_image', get_template_directory_uri().'/assets/sell/sell your property in dubai with confidence.jpeg',);
    $sell_why_sell_image = get_theme_mod('sell_why_sell_image', get_template_directory_uri().'/assets/sell/why-sell-your-property-with-us.jpeg');
    $sell_reach_more_main_image = get_theme_mod('sell_reach_more_main_image', get_template_directory_uri().'/assets/sell/reach-more-buyers seller faster-main.jpeg');
    $sell_reach_more_mini_image = get_theme_mod('sell_reach_more_mini_image', get_template_directory_uri().'/assets/sell/reach-more-buyers sell faster-mini.jpeg');
    $sell_thinking_about_video_url = get_theme_mod('sell_thinking_about_video_url', get_template_directory_uri().'https://www.youtube.com/embed/HtCo1abehcc?si=T0ZUZUmGKtrycVwE');
    $sell_reach_more_video_url = get_theme_mod('sell_reach_more_video_url', get_template_directory_uri().'https://www.youtube.com/embed/HtCo1abehcc?si=T0ZUZUmGKtrycVwE');

    $sell_red_1_title = get_theme_mod( 'sell_red_1_title', 'Sell your' );
    $sell_red_2_title = get_theme_mod( 'sell_red_2_title', 'Property' );
    $sell_black_1_title = get_theme_mod( 'sell_black_1_title', 'in Dubai' );
    $sell_black_2_title = get_theme_mod( 'sell_black_2_title', 'with Confidence' );
    $sell_desc = get_theme_mod( 'sell_desc', 'List your Dubai property with a trusted, results-driven approach. We ensure full transparency, accurate property valuation, and strategic marketing to attract serious buyers quickly. Stay informed with real-time market insights and expert guidance to maximize your property’s true selling value.' );
    $sell_button_text = get_theme_mod( 'sell_button_text', 'List Your Property' );
    
    $thinking_title = get_theme_mod( 'thinking_title', 'Thinking about selling your Dubai property?' );
    $thinking_desc = get_theme_mod( 'thinking_desc', 'Sell with confidence using accurate pricing, strategic exposure, and expert guidance. We help you attract serious buyers faster while keeping you fully informed at every step.' );
    $thinking_button_text = get_theme_mod( 'thinking_button_text', 'List Exclusively With Metropolitan' );

    $pw_m_il_desc_1 = get_theme_mod( 'pw_m_il_desc_1', 'Professional photography, videography, and high-converting property presentations.' );
    $pw_m_il_desc_2 = get_theme_mod( 'pw_m_il_desc_2', 'Optimized website visibility and SEO-ready listing pages to attract organic buyers.' );
    $pw_m_il_desc_3 = get_theme_mod( 'pw_m_il_desc_3', 'Targeted social media campaigns across key channels to reach serious buyers fast.' );
    $pw_m_il_desc_4 = get_theme_mod( 'pw_m_il_desc_4', 'WhatsApp & email outreach to our engaged database for immediate exposure.' );
    $pw_m_il_desc_5 = get_theme_mod( 'pw_m_il_desc_5', 'Qualified buyer leads from portals, remarketing, and high-intent ad funnels.' );
    $pw_m_il_desc_6 = get_theme_mod( 'pw_m_il_desc_6', 'PR-ready listing assets and premium branding for stronger buyer trust.' );
    $pw_m_il_desc_7 = get_theme_mod( 'pw_m_il_desc_7', 'Private viewings, open houses, and guided buyer tours that convert.' );
    $pw_m_il_desc_8 = get_theme_mod( 'pw_m_il_desc_8', 'Dedicated support from listing to closing, with clear updates and reporting.' );
    $pw_m_il_desc_9 = get_theme_mod( 'pw_m_il_desc_9', 'Smart scheduling, follow-ups, and negotiation strategy to close faster.' );
    ?>

<!-- sell hero start -->
<section class="sell-wrap">
    <div class="sell-container">

        <!-- Breadcrumb / Back -->
        <div class="sell-topbar">
            <a class="sell-back" href="<?php echo home_url('/'); ?>">
                <span class="sell-back__icon">‹</span>
                Back to Search
            </a>

            <nav class="sell-breadcrumb" aria-label="Breadcrumb">
                <a href="#">Home</a>
                <span class="sell-sep">›</span>
                <a href="#">Services</a>
                <span class="sell-sep">›</span>
                <span aria-current="page">Sell</span>
            </nav>
        </div>

        <!-- Hero -->
        <div class="sell-hero">
            <!-- Left content -->
            <div class="sell-left">
                <h1 class="sell-title">
                    <?php if(!empty($sell_red_1_title)) : ?>
                    <span class="sell-title__line sell-title__accent"><?php echo esc_html( $sell_red_1_title )?></span>
                    <?php endif;?>
                    
                    <?php if(!empty($sell_red_2_title)) : ?>
                    <span class="sell-title__line sell-title__accent"><?php echo esc_html( $sell_red_2_title )?></span>
                    <?php endif;?>

                    <?php if(!empty($sell_black_1_title)) : ?>
                    <span class="sell-title__line sell-title__dark"><?php echo esc_html( $sell_black_1_title )?></span>
                    <?php endif;?>

                    <?php if(!empty($sell_black_2_title)) : ?>
                    <span class="sell-title__line sell-title__dark"><?php echo esc_html( $sell_black_2_title )?></span>
                    <?php endif;?>
                </h1>

                <?php if(!empty($sell_desc)) : ?>
                <p class="sell-desc"><?php echo esc_html( $sell_desc )?></p>
                <?php endif;?>

                <div class="sell-actions">

                    <?php if(!empty($sell_button_text)) : ?>
                    <a href="#" class="cta sell-btn" id="sellOpenModal3"><?php echo esc_html( $sell_button_text )?><spansellModal3 class="sell-btn__arrow">›</span></a>
                    <?php endif;?>

                <!-- form start-->
                <div class="sell-modal" id="sellModal3" aria-hidden="true">
                    <div class="sell-modal__backdrop" data-sell-close2="1"></div>

                    <div class="sell-modal__dialog" role="dialog" aria-modal="true" aria-label="List your property form">
                        <button class="sell-modal__close" type="button" aria-label="Close" data-sell-close2="1">✕</button>

                        <div class="sell-modal__grid">
                            <?php echo do_shortcode('[button_contact_form_direct]'); ?>
                        </div>
                    </div>
                </div>
                <script>
                    // header nav form popup js -nav menu js
                    (function () {
                        const openBtn = document.getElementById('sellOpenModal3');
                        const modal = document.getElementById('sellModal3');

                        function openModal() {
                            modal.classList.add('is-open');
                            modal.setAttribute('aria-hidden', 'false');
                            document.body.style.overflow = 'hidden';
                            // focus first input
                            const first = modal.querySelector('input, textarea, select, button');
                            if (first) setTimeout(() => first.focus(), 50);
                        }
                        function closeModal() {
                            modal.classList.remove('is-open');
                            modal.setAttribute('aria-hidden', 'true');
                            document.body.style.overflow = '';
                            openBtn.focus();
                        }

                        openBtn.addEventListener('click', openModal);

                        modal.addEventListener('click', (e) => {
                            const el = e.target;
                            if (el && el.getAttribute && el.getAttribute('data-sell-close2') === '1') closeModal();
                        });

                        document.addEventListener('keydown', (e) => {
                            if (!modal.classList.contains('is-open')) return;
                            if (e.key === 'Escape') closeModal();
                        });
                    })();
                </script>
                <!-- form end-->
                </div>
            </div>

            <!-- Right image -->
            <div class="sell-right">
                <div class="sell-media">
                    <img
                        src="<?php echo $sell_header_image; ?>"
                        alt="Dubai aerial view"
                        class="sell-img"
                        loading="lazy" />
                </div>
            </div>
        </div>

    </div>
</section>
<!-- sell hero end -->

<!-- Thinking about start -->
<section class="sell-video">
    <div class="sell-video-bg">
        <div class="sell-video-inner">

            <!-- Heading -->
            <header class="sell-video-head">
                <?php if(!empty($thinking_title)) : ?>
                <h2 class="sell-video-title"><?php echo esc_html( $thinking_title )?></h2>
                <?php endif;?>

                <?php if(!empty($thinking_desc)) : ?>
                <p class="sell-video-sub"><?php echo esc_html( $thinking_desc )?> </p>
                <?php endif;?>

            </header>

            <!-- Video -->
            <div class="sell-video-wrap">
                <div class="sell-video-frame">
                    <iframe
                        src="<?php echo $sell_thinking_about_video_url; ?>"
                        title="Sell Property Dubai"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
            <!-- CTA Button -->
            <div class="sell-btn-wrap">

                <?php if(!empty($thinking_button_text)) : ?>
                <button class="sell-cta-btn" id="sellOpenModal" type="button"><?php echo esc_html( $thinking_button_text )?></button>
                <?php endif;?>

            </div>

        </div>
    </div>
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
</section>
<!-- Thinking about end -->

<!-- Why list start -->
<section class="sell-why">
    <div class="sell-why-container">

        <header class="sell-why-head">
            <h2 class="sell-why-title">
                Why sell your property <span>with us?</span>
            </h2>
        </header>

        <div class="sell-why-grid">

            <!-- Left Image -->
            <div class="sell-why-media">
                <img src="<?php echo $sell_why_sell_image; ?>" alt="Real estate team">
            </div>
            <?php 
                $sell_property_percent = get_option('sell_property_percent');
                $sell_experience = get_option('sell_experience');            
                $sell_successful_properties = get_option('sell_successful_properties');            
                $sell_active_buyers = get_option('sell_active_buyers');            
                $sell_client_support = get_option('sell_client_support');            
                $sell_transparent_selling = get_option('sell_transparent_selling');            
            ?>
            <!-- Right Stats -->
            <div class="sell-why-stats">

                <div class="sell-stat">
                    <h3><?php echo !empty($sell_property_percent) ? esc_html($sell_property_percent) : '100';?>%</h3>
                    <p>Properties sold at market value</p>
                </div>

                <div class="sell-stat">
                    <h3><?php echo !empty($sell_experience) ? esc_html($sell_experience) : '15';?>+ years</h3>
                    <p>Experience in property sales</p>
                </div>

                <div class="sell-stat">
                    <h3><?php echo !empty($sell_successful_properties) ? esc_html($sell_successful_properties) : '450';?>+</h3>
                    <p>Successful property transactions</p>
                </div>

                <div class="sell-stat">
                    <h3><?php echo !empty($sell_active_buyers) ? esc_html($sell_active_buyers) : '350';?>+</h3>
                    <p>Active buyers in our network</p>
                </div>

                <div class="sell-stat">
                    <h3><?php echo !empty($sell_client_support) ? esc_html($sell_client_support) : '24/7';?></h3>
                    <p>Client support & consultation</p>
                </div>

                <div class="sell-stat">
                    <h3><?php echo !empty($sell_transparent_selling) ? esc_html($sell_transparent_selling) : '100';?>%</h3>
                    <p>Transparent selling process</p>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- Why list end -->

<!-- powerful Marketing start -->

    <?php 
    $pw_m_il_desc_1 = get_theme_mod( 'pw_m_il_desc_1', 'Professional photography, videography, and high-converting property presentations.' );
    $pw_m_il_desc_2 = get_theme_mod( 'pw_m_il_desc_2', 'Optimized website visibility and SEO-ready listing pages to attract organic buyers.' );
    $pw_m_il_desc_3 = get_theme_mod( 'pw_m_il_desc_3', 'Targeted social media campaigns across key channels to reach serious buyers fast.' );
    $pw_m_il_desc_4 = get_theme_mod( 'pw_m_il_desc_4', 'WhatsApp & email outreach to our engaged database for immediate exposure.' );
    $pw_m_il_desc_5 = get_theme_mod( 'pw_m_il_desc_5', 'Qualified buyer leads from portals, remarketing, and high-intent ad funnels.' );
    $pw_m_il_desc_6 = get_theme_mod( 'pw_m_il_desc_6', 'PR-ready listing assets and premium branding for stronger buyer trust.' );
    $pw_m_il_desc_7 = get_theme_mod( 'pw_m_il_desc_7', 'Private viewings, open houses, and guided buyer tours that convert.' );
    $pw_m_il_desc_8 = get_theme_mod( 'pw_m_il_desc_8', 'Dedicated support from listing to closing, with clear updates and reporting.' );
    $pw_m_il_desc_9 = get_theme_mod( 'pw_m_il_desc_9', 'Smart scheduling, follow-ups, and negotiation strategy to close faster.' );  
             
    $pw_m_title = get_theme_mod( 'pw_m_title', 'Powerful Marketing.<span>Real Results.</span>' );           
    ?>
<section class="sell-mkt">
    <div class="sell-mkt__container">
        <header class="sell-mkt__head">
            <h2 class="sell-mkt__title">
                <?php echo sbtech_kses( $pw_m_title )?>
            </h2>
        </header>

        <div class="sell-mkt__grid">

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- camera -->
                    <svg viewBox="0 0 24 24">
                        <path d="M7 7h2l1-2h4l1 2h2a3 3 0 0 1 3 3v7a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3v-7a3 3 0 0 1 3-3Zm5 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4Z" />
                    </svg>
                </div>

                <?php if(!empty($pw_m_il_desc_1)) : ?>
                <p class="sell-mkt__text"><?php echo esc_html( $pw_m_il_desc_1 )?></p>
                <?php endif;?>
            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- screen -->
                    <svg viewBox="0 0 24 24">
                        <path d="M4 5a3 3 0 0 1 3-3h10a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3h-4l1 2h2v2H8v-2h2l1-2H7a3 3 0 0 1-3-3V5Zm3-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H7Z" />
                    </svg>
                </div>

                <?php if(!empty($pw_m_il_desc_2)) : ?>
                <p class="sell-mkt__text"><?php echo esc_html( $pw_m_il_desc_2 )?></p>
                <?php endif;?>

            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- megaphone -->
                    <svg viewBox="0 0 24 24">
                        <path d="M3 11a4 4 0 0 0 4 4h1l2 6h2l-1.6-6H17l4 3V6l-4 3H7a4 4 0 0 0-4 2Zm14 2H7a2 2 0 1 1 0-4h10v4Z" />
                    </svg>
                </div>
                
                <?php if(!empty($pw_m_il_desc_3)) : ?>
                <p class="sell-mkt__text"><?php echo esc_html( $pw_m_il_desc_3 )?></p>
                <?php endif;?>

            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- whatsapp/chat -->
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2a10 10 0 0 0-8.7 14.9L2 22l5.3-1.3A10 10 0 1 0 12 2Zm0 18a8 8 0 0 1-4.1-1.1l-.3-.2-3.1.8.8-3.1-.2-.3A8 8 0 1 1 12 20Zm4.6-5.4c-.2-.1-1.2-.6-1.3-.6-.2-.1-.3-.1-.5.1l-.6.8c-.1.2-.2.2-.4.1a6.5 6.5 0 0 1-1.9-1.2 7.3 7.3 0 0 1-1.3-1.7c-.1-.2 0-.3.1-.4l.4-.5c.1-.1.1-.2.2-.3.1-.1 0-.2 0-.4l-.6-1.4c-.2-.4-.4-.4-.5-.4h-.5c-.2 0-.4.1-.6.3-.2.2-.8.7-.8 1.8 0 1 .8 2.1.9 2.2.1.2 1.6 2.5 3.9 3.5.5.2 1 .4 1.3.5.6.2 1.2.2 1.6.1.5-.1 1.2-.5 1.4-1 .2-.5.2-1 .1-1.1-.1-.1-.2-.1-.4-.2Z" />
                    </svg>
                </div>

                <?php if(!empty($pw_m_il_desc_4)) : ?>
                <p class="sell-mkt__text"><?php echo esc_html( $pw_m_il_desc_4 )?></p>
                <?php endif;?>

            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- chart/target -->
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8Zm0-14a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 10a4 4 0 1 1 4-4 4 4 0 0 1-4 4Zm6-11-2 2-1-1 2-2 1 1Z" />
                    </svg>
                </div>

                <?php if(!empty($pw_m_il_desc_5)) : ?>
                <p class="sell-mkt__text"><?php echo esc_html( $pw_m_il_desc_5 )?></p>
                <?php endif;?>

            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- newspaper -->
                    <svg viewBox="0 0 24 24">
                        <path d="M4 4h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4Zm2 2v12h10V6H6Zm14 2h2v10a4 4 0 0 1-4 4H6v-2h12a2 2 0 0 0 2-2V8ZM8 8h6v2H8V8Zm0 4h10v2H8v-2Zm0 4h10v2H8v-2Z" />
                    </svg>
                </div>

                <?php if(!empty($pw_m_il_desc_6)) : ?>
                <p class="sell-mkt__text"><?php echo esc_html( $pw_m_il_desc_6 )?></p>
                <?php endif;?>

            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- house -->
                    <svg viewBox="0 0 24 24">
                        <path d="M12 3 2 12h3v9h6v-6h2v6h6v-9h3L12 3Zm5 16h-2v-6H9v6H7v-8.2l5-4.6 5 4.6V19Z" />
                    </svg>
                </div>

                <?php if(!empty($pw_m_il_desc_7)) : ?>
                <p class="sell-mkt__text"><?php echo esc_html( $pw_m_il_desc_7 )?></p>
                <?php endif;?>

            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- headset -->
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2a8 8 0 0 0-8 8v5a3 3 0 0 0 3 3h1v-8H7a1 1 0 0 0-1 1v5a1 1 0 0 1-1-1v-5a7 7 0 0 1 14 0v5a1 1 0 0 1-1 1v-5a1 1 0 0 0-1-1h-1v8h1a3 3 0 0 0 3-3v-5a8 8 0 0 0-8-8Zm-1 20h4v-2h-4v2Z" />
                    </svg>
                </div>

                <?php if(!empty($pw_m_il_desc_8)) : ?>
                <p class="sell-mkt__text"><?php echo esc_html( $pw_m_il_desc_8 )?></p>
                <?php endif;?>
            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- calendar -->
                    <svg viewBox="0 0 24 24">
                        <path d="M7 2h2v2h6V2h2v2h3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h3V2Zm14 8H3v10h18V10ZM4 6v2h16V6H4Z" />
                    </svg>
                </div>

                <?php if(!empty($pw_m_il_desc_9)) : ?>
                <p class="sell-mkt__text"><?php echo esc_html( $pw_m_il_desc_9 )?></p>
                <?php endif;?>

            </article>

        </div>
    </div>
</section>
<!-- powerful Marketing end -->

<!-- Reach More Buyers start -->
    <?php 
    $rm_title = get_theme_mod( 'rm_title', 'Reach More Buyers, Sell Faster' );           
    $rm_desc = get_theme_mod( 'rm_desc', 'Research indicates that professionally listing your property online results in faster transactions and stronger value. By authorising Form A, we can secure a Trakheesi QR code, enabling compliant promotion across leading property portals, targeted social media, and premium marketing channels—while safeguarding your confidential information. This approach maximises visibility, reaches qualified buyers, and positions your property for the most efficient and successful sale.ce.' );           
    $rm_button_text = get_theme_mod( 'rm_button_text', 'watch Now' );           

    ?>
<!-- PROFESSIONAL RESPONSIVE SECTION | NO ROOT | Prefix: val3 -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<section class="val3-wrap">
    <div class="val3-container">

        <div class="val3-row">

            <!-- LEFT -->
            <div class="val3-left">
                <?php if(!empty($rm_title)) : ?>
                <h2 class="val3-title"><?php echo esc_html( $rm_title )?></h2>
                <?php endif;?>

                <?php if(!empty($rm_desc)) : ?>
                <p class="val3-text"><?php echo esc_html( $rm_desc )?> </p>
                <?php endif;?>

                <?php if(!empty($rm_button_text)) : ?>
                <a href="#" id="warch_video" class="val3-btn"><?php echo esc_html( $rm_button_text )?></a>
                <?php endif;?>

            </div>

            <!-- RIGHT -->
            <div class="val3-right">
                <div class="val3-media">

                    <img
                        src="<?php echo $sell_reach_more_main_image; ?>"
                        class="val3-main"
                        alt="Consultation" />

                    <img
                        src="<?php echo $sell_reach_more_mini_image; ?>"
                        class="val3-mini"
                        alt="Meeting" />

                </div>
            </div>

        </div>

    </div>
</section>


<div id="hello_popup" class="hello-popup">
    <div class="hello-popup__content">
        <span class="hello-popup__close" id="hello_close">&times;</span>
        <div class="hello-popup__video">
            <iframe width="560" height="315" src="<?php echo $sell_reach_more_video_url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</div>
<!-- Reach More Buyers end -->

<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->

<?php get_footer();
