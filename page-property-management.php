<?php get_header(); ?>
<!-- Hero area start -->
    <?php
    $property_management_section_hero_bg = get_theme_mod('property_management_section_hero_bg', get_template_directory_uri().'/assets/services/property-management/property-management.webp');
    $hero_title = get_theme_mod( 'hero_title', 'Property Management with a  <br>Personal Touch' );      
    $hero_desc = get_theme_mod( 'hero_desc', 'Property Management with a  <br>Personal Touch' );      
    $hero_button_1_text = get_theme_mod( 'hero_button_1_text', 'View Properties' );      
    $hero_button_2_text = get_theme_mod( 'hero_button_2_text', 'Contact Us' );      
    ?>
    <style>
    .property_management_hero{
    position:relative;
    width:100%;
    min-height:520px;
    background:url("<?php echo $property_management_section_hero_bg; ?>") center/cover no-repeat;
    display:flex;
    align-items:center;
    }
    </style>
    <section class="property_management_hero">
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

                <?php if(!empty($hero_title)) : ?>
                <h1 class="about_title"><?php echo sbtech_kses( $hero_title )?> </h1>
                <?php endif;?>

                <?php if(!empty($hero_desc)) : ?>
                <p class="about_desc"><?php echo esc_html( $hero_desc )?> </p>
                <?php endif;?>

                <div class="about_buttons">
                    
                    <?php if(!empty($hero_button_1_text)) : ?>
                    <a href="<?php echo home_url('/buy'); ?>" class="about_btn about_primary"><?php echo esc_html( $hero_button_1_text )?></a>
                    <?php endif;?>

                    <?php if(!empty($hero_button_2_text)) : ?>
                    <button class="sell-cta-btn" id="sellOpenModal" class="about_btn"><?php echo esc_html( $hero_button_2_text )?></button>
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

<!-- do you need start -->
 <section class="container">
    <?php echo do_shortcode('[property_management_hello]'); ?>
</section>
<!-- do you need end -->

<!-- what we deliver start -->
 <section class="container">
    <?php echo do_shortcode('[property_management_what_we_deliver]'); ?>
</section>
<!-- what we deliver end -->



<!-- review start -->
<section class="container">
    <?php echo do_shortcode('[property_faq_shortcode]'); ?>
</section>
<!-- review end -->

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