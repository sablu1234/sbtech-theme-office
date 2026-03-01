<?php get_header(); ?>
<!-- Hero area start -->
    <style>
    .list_your_property_hero{
    position:relative;
    width:100%;
    min-height:520px;
    background:url("http://sam91222.local/wp-content/uploads/2026/02/real-estate-business-work-money-concept-1-scaled.jpg") center/cover no-repeat;
    display:flex;
    align-items:center;
    }
    </style>
    <section class="list_your_property_hero">
        <div class="about_overlay"></div>

        <div class="about_container">
            <div class="about_content">

                <div class="about_breadcrumb">
                    <a href="<?php echo home_url(); ?>">Home</a>
                    <span>•</span>
                    <a href="<?php echo home_url(); ?>">services</a>
                    <span>•</span>
                    <a href="<?php echo home_url('/list-your-property'); ?>">list your property</a>
                </div>

                <h1 class="about_title">
                    List Your Property with  <br>CBA Real Estate
                </h1>

                <p class="about_desc">
                    We’re developing a modern, high-end WordPress real estate website inspired by metropolitan.realestate—focused on clean UX, fast performance, and long-term scalability. From AJAX-powered Buy/Rent listings to New Projects, Area guides, Developers directory, and API-driven property automation—everything is structured for growth.
                </p>
                <div class="about_buttons">
                    <a href="<?php echo home_url('/list-your-property'); ?>" class="about_btn about_primary">View Properties</a>
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

<!-- Why list your property start -->
 <section class="container">
    <?php echo do_shortcode('[property_management_hello]'); ?>
</section>
<!-- Why list your property end -->

<!-- how does it work start -->
 <section class="container">
    <?php echo do_shortcode('[how_does_it_works_shortcode]'); ?>
</section>
<!-- how does it work end -->

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
    
<?php get_footer(); ?>