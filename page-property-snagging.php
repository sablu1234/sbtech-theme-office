
<?php get_header(); ?>
<!-- Hero area start -->
    <style>
    .partner_program_hero{
    position:relative;
    width:100%;
    min-height:520px;
    background:url("http://sam91222.local/wp-content/uploads/2026/02/person-with-hammer-front-house-1-scaled.jpg") center/cover no-repeat;
    display:flex;
    align-items:center;
    }
    </style>
    <section class="partner_program_hero">
        <div class="about_overlay"></div>

        <div class="about_container">
            <div class="about_content">

                <div class="about_breadcrumb">
                    <a href="<?php echo home_url(); ?>">Home</a>
                    <span>•</span>
                    <a href="<?php echo home_url(); ?>">property-snagging</a>
                    <span>•</span>
                    <a href="<?php echo home_url('/property-snagging'); ?>">property-snagging</a>
                </div>

                <h1 class="about_title">
                    Property Snagging  <br>Services
                </h1>

                <p class="about_desc">
                    Welcome to CBA Real Estate — ensuring your property is delivered to the highest standards before handover.
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

<!-- why-snagging start -->
<section class="container">
    <?php echo do_shortcode('[why_snagging_shortcode]'); ?>
</section>  
<!-- why-snagging end -->

<!-- why-choose start -->
<section class="container">
    <?php echo do_shortcode('[why_choose_shortcode]'); ?>
</section>  
<!-- why-choose end -->

<!-- snagging faq start -->
<section class="container">
    <?php echo do_shortcode('[snagging_faq_shortcode]'); ?>
</section>  
<!-- snagging faq end -->

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