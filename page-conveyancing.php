
<?php get_header(); ?>
<!-- Hero area start -->
    <?php
    $conveyancing_hero_bg = get_theme_mod('conveyancing_hero_bg', get_template_directory_uri().'/assets/services/conveyancing/conveyancing_BG.webp');
    $conveyancing_about_img = get_theme_mod('conveyancing_about_img', get_template_directory_uri().'/assets/services/conveyancing/conveyancing_about.webp');

    $conveyancing_hero_title = get_theme_mod( 'conveyancing_hero_title', __('A Smarter Way to Handle  <br>Property Transactions', 'sbtech') );
    $conveyancing_hero_desc = get_theme_mod( 'conveyancing_hero_desc', __('We combine market expertise and financial support to make buying, selling, and financing property in Dubai smooth and efficient.', 'sbtech') );
    $conveyancing_hero_btn_text_1 = get_theme_mod( 'conveyancing_hero_btn_text_1', __('View Properties', 'sbtech') );
    $conveyancing_hero_btn_text_2 = get_theme_mod( 'conveyancing_hero_btn_text_2', __('Contact', 'sbtech') );
    ?>
    <style>
    .conveyancing_hero{
    position:relative;
    width:100%;
    min-height:520px;
    background:url("<?php echo $conveyancing_hero_bg; ?>") center/cover no-repeat;
    display:flex;
    align-items:center;
    }
    </style>
    <section class="conveyancing_hero">
        <div class="about_overlay"></div>

        <div class="about_container">
            <div class="about_content">

                <div class="about_breadcrumb">
                    <a href="<?php echo home_url(); ?>">Home</a>
                    <span>•</span>
                    <a href="<?php echo home_url(); ?>">conveyancing</a>
                    <span>•</span>
                    <a href="<?php echo home_url('/conveyancing'); ?>">conveyancing</a>
                </div>

                <?php if (!empty($conveyancing_hero_title)) : ?>
                <h1 class="about_title"> <?php echo sbtech_kses($conveyancing_hero_title); ?> </h1>
                <?php endif; ?>

                <?php if (!empty($conveyancing_hero_desc)) : ?>
                <p class="about_desc"><?php echo sbtech_kses($conveyancing_hero_desc); ?> </p>
                <?php endif; ?>

                <div class="about_buttons">
                    <?php if (!empty($conveyancing_hero_btn_text_1)) : ?>
                    <a href="<?php echo home_url('/buy'); ?>" class="about_btn about_primary"><?php echo sbtech_kses($conveyancing_hero_btn_text_1); ?></a>
                    <?php endif; ?>

                    <?php if (!empty($conveyancing_hero_btn_text_2)) : ?>
                    <button class="sell-cta-btn" id="sellOpenModal" class="about_btn"><?php echo sbtech_kses($conveyancing_hero_btn_text_2); ?></button>
                    <?php endif; ?>

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


<!-- About Conveyancing start -->
<section class="container">
    <?php echo do_shortcode('[conveyance_conveyancing_shortcode]'); ?>
</section>  
<!-- About Conveyancing end -->

<!-- our_sercie start -->
<section class="container">
    <?php echo do_shortcode('[conveyancing_our_sercies_shortcode]'); ?>
</section>  
<!-- our_sercie end -->

<!-- conveyancing faq start -->
<section class="container">
    <?php echo do_shortcode('[conveyancing_faq_shortcode]'); ?>
</section>  
<!-- conveyancing faq end -->

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