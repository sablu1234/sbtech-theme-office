<?php get_header(); ?>
<!-- Hero area start -->
    <?php
    $complaints_procedure_hero_bg = get_theme_mod('complaints_procedure_hero_bg', get_template_directory_uri().'/assets/complaints_procedure/complaints_procedure_bg.webp');

    $complaints_procedure_hero_title = get_theme_mod( 'complaints_procedure_hero_title', __('Get in Touch with  <br>CBA Real Estate', 'sbtech') );
    $complaints_procedure_hero_desc = get_theme_mod( 'complaints_procedure_hero_desc', __('Have a question about buying, selling, renting, or new projects in Dubai? Send us a message and our team will get back to you quickly with the right guidance and next steps.', 'sbtech') );
    $complaints_procedure_btn_text_1 = get_theme_mod( 'complaints_procedure_btn_text_1', __('View Properties', 'sbtech') );
    ?>
    <style>
    .complaints_hero{
    position:relative;
    width:100%;
    min-height:520px;
    background:url("<?php echo $complaints_procedure_hero_bg; ?>") center/cover no-repeat;
    display:flex;
    align-items:center;
    }
    </style>
    <section class="complaints_hero">
        <div class="about_overlay"></div>

        <div class="about_container">
            <div class="about_content">

                <div class="about_breadcrumb">
                    <a href="<?php echo home_url(); ?>">Home</a>
                    <span>•</span>
                    <a href="<?php echo home_url('/complaints-procedure'); ?>">complaints-procedure</a>
                </div>

                <?php if (!empty($complaints_procedure_hero_title)) : ?>
                <h1 class="about_title">
                    <?php echo $complaints_procedure_hero_title; ?>
                </h1>
                <?php endif; ?>

                <?php if (!empty($complaints_procedure_hero_desc)) : ?>
                <p class="about_desc">
                    <?php echo $complaints_procedure_hero_desc; ?>
                </p>
                <?php endif; ?>

                <div class="about_buttons">
                    <?php if (!empty($complaints_procedure_btn_text_1)) : ?>
                    <a href="<?php echo home_url('/buy'); ?>" class="about_btn about_primary"><?php echo $complaints_procedure_btn_text_1; ?></a>
                    <?php endif; ?>

                    <button class="sell-cta-btn d-none" id="sellOpenModal" class="about_btn">Contact Us</button>
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

<!-- review start -->
<section class="container">
    <?php echo do_shortcode('[complaints_form]'); ?>
</section>
<!-- review end -->

<!-- review start -->
<section class="container">
    <?php echo do_shortcode('[property_management_reviews]'); ?>
</section>
<!-- review end -->


<?php get_footer();