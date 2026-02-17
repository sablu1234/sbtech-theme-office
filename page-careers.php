<?php get_header(); ?>

<!-- Hero area start -->
<section class="careers_hero">
    <div class="about_overlay"></div>

    <div class="about_container">
        <div class="about_content">

            <div class="about_breadcrumb">
                <a href="<?php echo home_url(); ?>">Home</a>
                <span>•</span>
                <a href="<?php echo home_url('/careers'); ?>">Careers</a>
            </div>

            <h1 class="about_title">
                Careers & <br>Opportunities
            </h1>

            <p class="about_desc">
                Build your future with us. Join a dynamic team, grow your skills, and explore exciting career opportunities in a professional and supportive environment.
            </p>

            <div class="about_buttons">
                <a href="<?php echo home_url('/buy'); ?>" class="about_btn about_primary">View Properties</a>
                <button class="sell-cta-btn" id="sellOpenModal" class="about_btn">Contact Us</button>
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
<!-- Hero area end -->

<!-- Great Place To Work start -->
<section class="awards" id="awards">
    <div class="awards__container">
        <h2 class="awards__title">
            The Leading Real Estate Employer <span class="accent">Recognized for Excellence</span>
        </h2>
        <p class="awards__sub">
            Our workplace is built on innovation, growth, and a people-first culture. We are proud to be recognized for fostering talent, empowering careers, and creating an environment where individuals thrive and succeed together.
        </p>

        <div class="awards__frame" data-awards>
            <button class="awards__nav awards__nav--prev" type="button" aria-label="Previous" data-prev>
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>

            <div class="awards__viewport">
                <div class="awards__track" data-track>
                    <!-- Replace src with your real badge images -->
                    <article class="awards__card">
                        <div class="awards__img">
                            <img src="https://dummyimage.com/600x600/ffffff/000000.png&text=Best+Workplaces+2025" alt="Best Workplaces UAE 2025">
                        </div>
                        <p class="awards__cap">Best Workplaces — UAE 2025</p>
                    </article>

                    <article class="awards__card">
                        <div class="awards__img">
                            <img src="https://dummyimage.com/600x600/ffffff/000000.png&text=Best+Workplaces+2024" alt="Best Workplaces UAE 2024">
                        </div>
                        <p class="awards__cap">Best Workplaces — UAE 2024</p>
                    </article>

                    <article class="awards__card">
                        <div class="awards__img">
                            <img src="https://dummyimage.com/600x600/ffffff/000000.png&text=For+Women" alt="Best Workplaces for Women">
                        </div>
                        <p class="awards__cap">Best Workplaces for Women</p>
                    </article>

                    <article class="awards__card">
                        <div class="awards__img">
                            <img src="https://dummyimage.com/600x600/ffffff/000000.png&text=For+Millennials" alt="Best Workplaces for Millennials">
                        </div>
                        <p class="awards__cap">Best Workplaces for Millennials</p>
                    </article>

                    <article class="awards__card">
                        <div class="awards__img">
                            <img src="https://dummyimage.com/600x600/ffffff/000000.png&text=GCC+2022" alt="Best Workplaces GCC 2022">
                        </div>
                        <p class="awards__cap">Best Workplaces — GCC 2022</p>
                    </article>
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

<!-- Our team start -->
<section class="careers_gallery">
    <div class="careers_container">

        <div class="careers_gallery__head">
            <h2 class="careers_gallery__title">Our Team</h2>
            <p class="careers_gallery__sub">
                A glimpse into our culture—team achievements, events, and the people who make everything possible.
            </p>
        </div>

        <div class="careers_gallery__grid">

            <!-- BIG LEFT -->
            <a class="careers_gallery__item careers_gallery__item--lg" href="#" aria-label="Team gallery image 1">
                <span class="careers_gallery__tag">Team Moments</span>
                <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1600&q=80" alt="Team event photo">
            </a>

            <!-- TOP RIGHT 2 -->
            <a class="careers_gallery__item careers_gallery__item--md" href="#" aria-label="Team gallery image 2">
                <span class="careers_gallery__tag">Awards</span>
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80" alt="Team group photo">
            </a>

            <a class="careers_gallery__item careers_gallery__item--md" href="#" aria-label="Team gallery image 3">
                <span class="careers_gallery__tag">Culture</span>
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80" alt="Team celebrating photo">
            </a>

            <!-- MID RIGHT WIDE -->
            <a class="careers_gallery__item careers_gallery__item--wide" href="#" aria-label="Team gallery image 4">
                <span class="careers_gallery__tag">Community</span>
                <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=1600&q=80" alt="Team community event">
            </a>

            <!-- BOTTOM RIGHT LARGE-ish -->
            <a class="careers_gallery__item careers_gallery__item--wide" href="#" aria-label="Team gallery image 5">
                <span class="careers_gallery__tag">Leadership</span>
                <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1600&q=80" alt="Leadership team photo">
            </a>

            <!-- BOTTOM LEFT 2 SMALL -->
            <a class="careers_gallery__item careers_gallery__item--sm" href="#" aria-label="Team gallery image 6">
                <span class="careers_gallery__tag">Events</span>
                <img src="https://images.unsplash.com/photo-1528605105345-5344ea20e269?auto=format&fit=crop&w=1200&q=80" alt="Office event photo">
            </a>

            <a class="careers_gallery__item careers_gallery__item--sm" href="#" aria-label="Team gallery image 7">
                <span class="careers_gallery__tag">Celebrations</span>
                <img src="https://images.unsplash.com/photo-1528605105345-5344ea20e269?auto=format&fit=crop&w=1200&q=80" alt="Team celebration photo">
            </a>

        </div>
    </div>
</section>
<!-- Our team end -->

<!-- Hear form our team start -->
<section class="careers_testimonials" id="careers_testimonials">
    <div class="careers_testimonials__container">

        <div class="careers_testimonials__head">
            <h2 class="careers_testimonials__title">Hear from our team</h2>
            <p class="careers_testimonials__sub">
                Real stories from the people behind our success—collaboration, growth, and a culture that supports you.
            </p>
        </div>

        <div class="careers_testimonials__frame" data-careers-slider>
            <div class="careers_testimonials__track" data-careers-track>

                <!-- Slide 1 -->
                <article class="careers_testimonials__slide">
                    <div class="careers_testimonials__media">
                        <div class="careers_testimonials__quoteMark" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M7 17h4V9H6v5c0 1.7 1.3 3 3 3Zm10 0h4V9h-5v5c0 1.7 1.3 3 3 3Z" fill="currentColor" />
                            </svg>
                        </div>
                        <div class="careers_testimonials__photo">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=900&q=80" alt="Team member portrait">
                        </div>
                    </div>

                    <div class="careers_testimonials__content">
                        <p class="careers_testimonials__quote">
                            “I feel genuinely supported here. The team collaboration is strong, leadership listens, and I’m encouraged
                            to grow through real opportunities. The environment is fast-paced but positive—and we celebrate wins together.”
                        </p>

                        <div class="careers_testimonials__nameRow">
                            <div class="careers_testimonials__meta">
                                <p class="careers_testimonials__name">Saidi Latipov</p>
                                <p class="careers_testimonials__role">Senior Real Estate Agent</p>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Slide 2 -->
                <article class="careers_testimonials__slide">
                    <div class="careers_testimonials__media">
                        <div class="careers_testimonials__quoteMark" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M7 17h4V9H6v5c0 1.7 1.3 3 3 3Zm10 0h4V9h-5v5c0 1.7 1.3 3 3 3Z" fill="currentColor" />
                            </svg>
                        </div>
                        <div class="careers_testimonials__photo">
                            <img src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?auto=format&fit=crop&w=900&q=80" alt="Team member portrait">
                        </div>
                    </div>

                    <div class="careers_testimonials__content">
                        <p class="careers_testimonials__quote">
                            “What stands out most is the culture. Everyone is approachable, learning is continuous, and processes are
                            clear. You know what success looks like, and you have the support to achieve it.”
                        </p>

                        <div class="careers_testimonials__nameRow">
                            <div class="careers_testimonials__meta">
                                <p class="careers_testimonials__name">Svetlana Vasilieva</p>
                                <p class="careers_testimonials__role">Marketing & Communications</p>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Slide 3 -->
                <article class="careers_testimonials__slide">
                    <div class="careers_testimonials__media">
                        <div class="careers_testimonials__quoteMark" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M7 17h4V9H6v5c0 1.7 1.3 3 3 3Zm10 0h4V9h-5v5c0 1.7 1.3 3 3 3Z" fill="currentColor" />
                            </svg>
                        </div>
                        <div class="careers_testimonials__photo">
                            <img src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?auto=format&fit=crop&w=900&q=80" alt="Team member portrait">
                        </div>
                    </div>

                    <div class="careers_testimonials__content">
                        <p class="careers_testimonials__quote">
                            “It’s a place where performance matters—but so does people. The balance of ambition and support makes it
                            easy to stay motivated, improve your skills, and build a long-term career.”
                        </p>

                        <div class="careers_testimonials__nameRow">
                            <div class="careers_testimonials__meta">
                                <p class="careers_testimonials__name">Ahmed Al Zahra</p>
                                <p class="careers_testimonials__role">Client Relationship Manager</p>
                            </div>
                        </div>
                    </div>
                </article>

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