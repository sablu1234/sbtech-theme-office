<?php get_header(); ?>

<!-- Hero area start -->
<section class="media_hero">
    <div class="about_overlay"></div>

    <div class="about_container">
        <div class="about_content">

            <div class="about_breadcrumb">
                <a href="<?php echo home_url(); ?>">Home</a>
                <span>•</span>
                <a href="<?php echo home_url('/media'); ?>">Media</a>
            </div>

            <h1 class="about_title">
                Media & <br> Latest Updates
            </h1>

            <p class="about_desc">
                Stay informed with our latest news, market insights, project announcements, and company updates. Explore expert analysis, real estate trends, and key developments shaping the future of property and investment.
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

<!-- Media shortcode start -->
<section class="container">
    <?php echo do_shortcode('[media_loop_ajax]'); ?>
</section>
<!-- Media shortcode end -->

<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->

<?php get_footer(); ?>