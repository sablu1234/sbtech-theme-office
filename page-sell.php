<?php get_header(); ?>

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
                    <span class="sell-title__line sell-title__accent">Sell your</span>
                    <span class="sell-title__line sell-title__accent">Property</span>
                    <span class="sell-title__line sell-title__dark">in Dubai</span>
                    <span class="sell-title__line sell-title__dark">with Confidence</span>
                </h1>

                <p class="sell-desc">
                    List your Dubai property with a trusted, results-driven approach. We ensure full transparency, accurate property valuation, and strategic marketing to attract serious buyers quickly. Stay informed with real-time market insights and expert guidance to maximize your property’s true selling value.
                </p>

                <div class="sell-actions">
                    <a class="sell-btn" href="<?php echo home_url('/'); ?>">
                        List Your Property
                        <span class="sell-btn__arrow">›</span>
                    </a>
                </div>
            </div>

            <!-- Right image -->
            <div class="sell-right">
                <div class="sell-media">
                    <img
                        src="<?php echo get_template_directory_uri() ?>/assets/img/sell-page/sell-hero.jpg"
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
                <h2 class="sell-video-title">
                    Thinking about selling your Dubai property?
                </h2>
                <p class="sell-video-sub">
                    Sell with confidence using accurate pricing, strategic exposure,
                    and expert guidance. We help you attract serious buyers faster
                    while keeping you fully informed at every step.
                </p>
            </header>

            <!-- Video -->
            <div class="sell-video-wrap">
                <div class="sell-video-frame">
                    <iframe
                        src="https://www.youtube.com/embed/HtCo1abehcc?si=T0ZUZUmGKtrycVwE"
                        title="Sell Property Dubai"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
            <!-- CTA Button -->
            <div class="sell-btn-wrap">
                <button class="sell-cta-btn" id="sellOpenModal" type="button">
                    List Exclusively With Metropolitan
                </button>
            </div>

        </div>
    </div>
    <!-- form start-->
    <div class="sell-modal" id="sellModal" aria-hidden="true">
        <div class="sell-modal__backdrop" data-sell-close="1"></div>

        <div class="sell-modal__dialog" role="dialog" aria-modal="true" aria-label="List your property form">
            <button class="sell-modal__close" type="button" aria-label="Close" data-sell-close="1">✕</button>

            <div class="sell-modal__grid">
                <!-- LEFT: form -->
                <div class="sell-modal__left">
                    <h3 class="sell-modal__title">List your property with <span>Metropolitan</span></h3>

                    <form class="sell-form" action="#" method="post">
                        <label class="<!-- SELL MODAL CONTACT FORM (Pro) | Prefix: sell- | Button -> Modal with animatsell-field">
                            <span class="sell-label">Full Name<span class="sell-req">*</span></span>
                            <input class="sell-input" type="text" name="full_name" required placeholder="Your full name">
                        </label>

                        <label class="sell-field">
                            <span class="sell-label">E-Mail<span class="sell-req">*</span></span>
                            <input class="sell-input" type="email" name="email" required placeholder="name@email.com">
                        </label>

                        <label class="sell-field">
                            <span class="sell-label">Phone<span class="sell-req">*</span></span>
                            <div class="sell-phone">
                                <select class="sell-select" name="country_code" aria-label="Country code">
                                    <option value="+971">🇦🇪 +971</option>
                                    <option value="+880" selected>🇧🇩 +880</option>
                                    <option value="+91">🇮🇳 +91</option>
                                    <option value="+1">🇺🇸 +1</option>
                                    <option value="+44">🇬🇧 +44</option>
                                </select>
                                <input class="sell-input sell-input--phone" type="tel" name="phone" required placeholder="1812-345678">
                            </div>
                        </label>

                        <label class="sell-field">
                            <span class="sell-label">Message</span>
                            <textarea class="sell-textarea" name="message" rows="4"
                                placeholder="Tell us about your property; location, size, price..."></textarea>
                        </label>

                        <label class="sell-check">
                            <input type="checkbox" name="offers">
                            <span>I agree to receive information about offers, deals and services from this website (optional).</span>
                        </label>

                        <button class="sell-submit" type="submit">Get In Touch</button>

                        <p class="sell-legal">
                            By clicking the submit button, I accept and provide my personal information,
                            and agree to the Metropolitan Group <a href="#">Privacy Policy</a>, applicable data
                            protection laws, and <a href="#">Terms of Use</a>.
                        </p>
                    </form>
                </div>

                <!-- RIGHT: image -->
                <div class="sell-modal__right" aria-hidden="true">
                    <div class="sell-agent">
                        <img class="sell-agent__img"
                            src="https://images.unsplash.com/photo-1551836022-deb4988cc6c0?auto=format&fit=crop&w=1200&q=80"
                            alt="">
                        <div class="sell-agent__shape"></div>
                    </div>
                </div>
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
                <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=1200&q=80" alt="Real estate team">
            </div>

            <!-- Right Stats -->
            <div class="sell-why-stats">

                <div class="sell-stat">
                    <h3>98%</h3>
                    <p>Properties sold at market value</p>
                </div>

                <div class="sell-stat">
                    <h3>10+ years</h3>
                    <p>Experience in property sales</p>
                </div>

                <div class="sell-stat">
                    <h3>450+</h3>
                    <p>Successful property transactions</p>
                </div>

                <div class="sell-stat">
                    <h3>350+</h3>
                    <p>Active buyers in our network</p>
                </div>

                <div class="sell-stat">
                    <h3>24/7</h3>
                    <p>Client support & consultation</p>
                </div>

                <div class="sell-stat">
                    <h3>100%</h3>
                    <p>Transparent selling process</p>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- Why list end -->

<!-- powerful Marketing start -->
<section class="sell-mkt">
    <div class="sell-mkt__container">
        <header class="sell-mkt__head">
            <h2 class="sell-mkt__title">
                Powerful Marketing. <span>Real Results.</span>
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
                <p class="sell-mkt__text">Professional photography, videography, and high-converting property presentations.</p>
            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- screen -->
                    <svg viewBox="0 0 24 24">
                        <path d="M4 5a3 3 0 0 1 3-3h10a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3h-4l1 2h2v2H8v-2h2l1-2H7a3 3 0 0 1-3-3V5Zm3-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H7Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text">Optimized website visibility and SEO-ready listing pages to attract organic buyers.</p>
            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- megaphone -->
                    <svg viewBox="0 0 24 24">
                        <path d="M3 11a4 4 0 0 0 4 4h1l2 6h2l-1.6-6H17l4 3V6l-4 3H7a4 4 0 0 0-4 2Zm14 2H7a2 2 0 1 1 0-4h10v4Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text">Targeted social media campaigns across key channels to reach serious buyers fast.</p>
            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- whatsapp/chat -->
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2a10 10 0 0 0-8.7 14.9L2 22l5.3-1.3A10 10 0 1 0 12 2Zm0 18a8 8 0 0 1-4.1-1.1l-.3-.2-3.1.8.8-3.1-.2-.3A8 8 0 1 1 12 20Zm4.6-5.4c-.2-.1-1.2-.6-1.3-.6-.2-.1-.3-.1-.5.1l-.6.8c-.1.2-.2.2-.4.1a6.5 6.5 0 0 1-1.9-1.2 7.3 7.3 0 0 1-1.3-1.7c-.1-.2 0-.3.1-.4l.4-.5c.1-.1.1-.2.2-.3.1-.1 0-.2 0-.4l-.6-1.4c-.2-.4-.4-.4-.5-.4h-.5c-.2 0-.4.1-.6.3-.2.2-.8.7-.8 1.8 0 1 .8 2.1.9 2.2.1.2 1.6 2.5 3.9 3.5.5.2 1 .4 1.3.5.6.2 1.2.2 1.6.1.5-.1 1.2-.5 1.4-1 .2-.5.2-1 .1-1.1-.1-.1-.2-.1-.4-.2Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text">WhatsApp & email outreach to our engaged database for immediate exposure.</p>
            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- chart/target -->
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8Zm0-14a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 10a4 4 0 1 1 4-4 4 4 0 0 1-4 4Zm6-11-2 2-1-1 2-2 1 1Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text">Qualified buyer leads from portals, remarketing, and high-intent ad funnels.</p>
            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- newspaper -->
                    <svg viewBox="0 0 24 24">
                        <path d="M4 4h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4Zm2 2v12h10V6H6Zm14 2h2v10a4 4 0 0 1-4 4H6v-2h12a2 2 0 0 0 2-2V8ZM8 8h6v2H8V8Zm0 4h10v2H8v-2Zm0 4h10v2H8v-2Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text">PR-ready listing assets and premium branding for stronger buyer trust.</p>
            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- house -->
                    <svg viewBox="0 0 24 24">
                        <path d="M12 3 2 12h3v9h6v-6h2v6h6v-9h3L12 3Zm5 16h-2v-6H9v6H7v-8.2l5-4.6 5 4.6V19Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text">Private viewings, open houses, and guided buyer tours that convert.</p>
            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- headset -->
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2a8 8 0 0 0-8 8v5a3 3 0 0 0 3 3h1v-8H7a1 1 0 0 0-1 1v5a1 1 0 0 1-1-1v-5a7 7 0 0 1 14 0v5a1 1 0 0 1-1 1v-5a1 1 0 0 0-1-1h-1v8h1a3 3 0 0 0 3-3v-5a8 8 0 0 0-8-8Zm-1 20h4v-2h-4v2Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text">Dedicated support from listing to closing, with clear updates and reporting.</p>
            </article>

            <article class="sell-mkt__card">
                <div class="sell-mkt__icon" aria-hidden="true">
                    <!-- calendar -->
                    <svg viewBox="0 0 24 24">
                        <path d="M7 2h2v2h6V2h2v2h3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h3V2Zm14 8H3v10h18V10ZM4 6v2h16V6H4Z" />
                    </svg>
                </div>
                <p class="sell-mkt__text">Smart scheduling, follow-ups, and negotiation strategy to close faster.</p>
            </article>

        </div>
    </div>
</section>
<!-- powerful Marketing end -->

<!-- Reach More Buyers start -->
<!-- PROFESSIONAL RESPONSIVE SECTION | NO ROOT | Prefix: val3 -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<section class="val3-wrap">
    <div class="val3-container">

        <div class="val3-row">

            <!-- LEFT -->
            <div class="val3-left">
                <h2 class="val3-title">Reach More Buyers, Sell Faster</h2>

                <p class="val3-text">
                    Research indicates that professionally listing your property online results in faster transactions and stronger value. By authorising Form A, we can secure a Trakheesi QR code, enabling compliant promotion across leading property portals, targeted social media, and premium marketing channels—while safeguarding your confidential information. This approach maximises visibility, reaches qualified buyers, and positions your property for the most efficient and successful sale.ce.
                </p>

                <a href="#" id="warch_video" class="val3-btn">watch Now</a>
            </div>

            <!-- RIGHT -->
            <div class="val3-right">
                <div class="val3-media">

                    <img
                        src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1600&q=80"
                        class="val3-main"
                        alt="Consultation" />

                    <img
                        src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80"
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
            <iframe width="560" height="315" src="https://www.youtube.com/embed/HtCo1abehcc?si=T0ZUZUmGKtrycVwE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</div>

<!-- Reach More Buyers end -->

<?php get_footer();
