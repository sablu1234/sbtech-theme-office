
<?php get_header(); ?>
<!-- Hero area start -->
    <style>
    .mortgages_hero{
    position:relative;
    width:100%;
    min-height:520px;
    background:url("http://sam91222.local/wp-content/uploads/2026/02/4386398-scaled.jpg") center/cover no-repeat;
    display:flex;
    align-items:center;
    }
    </style>
    <section class="mortgages_hero">
        <div class="about_overlay"></div>

        <div class="about_container">
            <div class="about_content">

                <div class="about_breadcrumb">
                    <a href="<?php echo home_url(); ?>">Home</a>
                    <span>•</span>
                    <a href="<?php echo home_url(); ?>">services</a>
                    <span>•</span>
                    <a href="<?php echo home_url('/property-management'); ?>">property-management</a>
                </div>

                <h1 class="about_title">
                    ProDiscover Competitive Mortgage & Home Loan <br>Solutions in Dubai
                </h1>

                <p class="about_desc">
                    Access tailored financing options with attractive rates and flexible terms across the UAE—start your homeownership journey with confidence.
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
                <?php echo do_shortcode('[button_contact_form_direct]'); ?>
            </div>
        </div>
    </div>
    <!-- form end-->
<!-- Hero area end -->

<!-- Why choose mortgage start -->
<section class="container">
    <?php echo do_shortcode('[why_choose_mortgage_shortcode]'); ?>
</section>
<!-- why choose mortgage end -->

<!-- mortgage calculator start -->
<section class="container">
    <?php echo do_shortcode('[mortgage_calculator_shortcode]'); ?>
</section>  
<!-- mortgage calculator end -->

<!-- mortgage faq start -->
<section class="container">
    <?php echo do_shortcode('[mortgage_faq_shortcode]'); ?>
</section>  
<!-- mortgage faq end -->

<!-- review start -->
<section class="container">
    <?php echo do_shortcode('[property_management_reviews]'); ?>
</section>
<!-- review end -->

<!-- contact form start -->
<section class="container">
    <?php echo do_shortcode('[reaf_contact_form]'); ?>
</section>
<!-- contact form end -->


<?php get_footer();