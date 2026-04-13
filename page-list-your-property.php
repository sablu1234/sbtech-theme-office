<?php get_header(); ?>
<!-- Hero area start -->
    <?php
    $list_your_property_hero_bg = get_theme_mod('list_your_property_hero_bg', get_template_directory_uri().'/assets/services/list-your-property/list-your-property.webp');
    $list_your_property_pm_about_img = get_theme_mod('list_your_property_pm_about_img', get_template_directory_uri().'/assets/services/list-your-property/list-your-property-about.avif');
    $li_hero_title = get_theme_mod( 'li_hero_title', 'List Your Property with  <br>CBA Real Estate' );
    $li_hero_desc = get_theme_mod( 'li_hero_desc', 'We’re developing a modern, high-end WordPress real estate website inspired by metropolitan.realestate—focused on clean UX, fast performance, and long-term scalability. From AJAX-powered Buy/Rent listings to New Projects, Area guides, Developers directory, and API-driven property automation—everything is structured for growth.' );
    $li_hero_btn_text_1 = get_theme_mod( 'li_hero_btn_text_1', 'View Properties' );
    $li_hero_btn_text_2 = get_theme_mod( 'li_hero_btn_text_2', 'Contact Us' );
    ?>
    <style>
    .list_your_property_hero{
    position:relative;
    width:100%;
    min-height:520px;
    background:url("<?php echo $list_your_property_hero_bg; ?>") center/cover no-repeat;
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

                <?php if(!empty($li_hero_title)) : ?>
                    <h1 class="about_title"><?php echo sbtech_kses( $li_hero_title )?></h1>
                <?php endif;?>

                <?php if(!empty($li_hero_desc)) : ?>
                <p class="about_desc"><?php echo sbtech_kses( $li_hero_desc )?></p>
                <?php endif;?>

                <div class="about_buttons">
                    
                    <?php if(!empty($li_hero_btn_text_1)) : ?>
                    <a href="<?php echo home_url('/list-your-property'); ?>" class="about_btn about_primary"><?php echo sbtech_kses( $li_hero_btn_text_1 )?></a>
                    <?php endif;?>

                    <?php if(!empty($li_hero_btn_text_2)) : ?>
                    <button class="sell-cta-btn" id="sellOpenModal" class="about_btn"><?php echo sbtech_kses( $li_hero_btn_text_2 )?></button>
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

<!-- about list your property start -->
 <section class="container">
    <?php echo do_shortcode('[list_your_property_about]'); ?>
</section>
<!-- about list your property end -->

<!-- how does it work start -->
 <section class="container">
    <?php echo do_shortcode('[how_does_it_works_shortcode]'); ?>
</section>
<!-- how does it work end -->

<!-- faq start -->
<section class="container">
    <?php echo do_shortcode('[list_your_property_faq_shortcode]'); ?>
</section>
<!-- faq end -->

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