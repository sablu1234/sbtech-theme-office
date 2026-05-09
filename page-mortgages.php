
<?php get_header(); ?>
<!-- Hero area start -->
    <?php
    $mortgages_hero_bg = get_theme_mod('mortgages_hero_bg', get_template_directory_uri().'/assets/services/mortgages/mortgages.webp');
    $mortgages_ms_img = get_theme_mod('mortgages_hero_bg', get_template_directory_uri().'/assets/services/mortgages/mortgages-support.avif');

    $mortage_hero_title = get_theme_mod( 'mortage_hero_title', 'List Your Property with  <br>CBA Real Estate' );
    $mortage_hero_desc = get_theme_mod( 'mortage_hero_desc', 'We’re developing a modern, high-end WordPress real estate website inspired by metropolitan.realestate—focused on clean UX, fast performance, and long-term scalability. From AJAX-powered Buy/Rent listings to New Projects, Area guides, Developers directory, and API-driven property automation—everything is structured for growth.' );
    $mortage_hero_btn_text_1 = get_theme_mod( 'mortage_hero_btn_text_1', 'View Properties' );
    $mortage_hero_btn_text_2 = get_theme_mod( 'mortage_hero_btn_text_2', 'Contact Us' );
    ?>
    <style>
    .mortgages_hero{
    position:relative;
    width:100%;
    min-height:520px;
    background:url("<?php echo $mortgages_hero_bg; ?>") center/cover no-repeat;
    display:flex;
    align-items:center;
    }
    </style>
    <section class="mortgages_hero">
        <div class="about_overlay"></div>

        <div class="about_container">
            <div class="about_content">

                <?php if(!empty($mortage_hero_title)) : ?>
                <div class="about_breadcrumb">
                    <a href="<?php echo home_url(); ?>">Home</a>
                    <span>•</span>
                    <a href="<?php echo home_url(); ?>">services</a>
                    <span>•</span>
                    <a href="<?php echo home_url('/property-management'); ?>">property-management</a>
                </div>
                <?php endif;?>

                <?php if(!empty($mortage_hero_title)) : ?>
                <h1 class="about_title"><?php echo sbtech_kses( $mortage_hero_title )?></h1>
                <?php endif;?>

                <?php if(!empty($mortage_hero_desc)) : ?>
                <p class="about_desc"><?php echo esc_html( $mortage_hero_desc )?></p>
                <?php endif;?>

                <div class="about_buttons">
                    <?php if(!empty($mortage_hero_btn_text_1)) : ?>
                    <a href="<?php echo home_url('/buy'); ?>" class="about_btn about_primary"><?php echo esc_html( $mortage_hero_btn_text_1 )?></a>
                    <?php endif;?>

                    <?php if(!empty($mortage_hero_btn_text_2)) : ?>
                    <button class="sell-cta-btn" id="sellOpenModal" class="about_btn"><?php echo esc_html( $mortage_hero_btn_text_2 )?></button>
                    <?php endif;?>

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