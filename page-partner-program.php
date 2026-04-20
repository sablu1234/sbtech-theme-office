
<?php get_header(); ?>
<!-- Hero area start -->
    <?php
    $partner_program_hero_bg = get_theme_mod('partner_program_hero_bg', get_template_directory_uri().'/assets/services/partner-program/partner_program_bg.webp');

    $partner_program_hero_title = get_theme_mod( 'partner_program_hero_title', __('CBA Real Estate  <br>Partner Program', 'sbtech') );
    $partner_program_hero_desc = get_theme_mod( 'partner_program_hero_desc', __('Collaborate with a trusted brand and capitalize on Dubai’s thriving property market.', 'sbtech') );
    $partner_program_hero_btn_text_1 = get_theme_mod( 'partner_program_hero_btn_text_1', __('View Properties', 'sbtech') );
    $partner_program_hero_btn_text_2 = get_theme_mod( 'partner_program_hero_btn_text_2', __('Contact', 'sbtech') );
    ?>
    <style>
    .partner_program_hero{
    position:relative;
    width:100%;
    min-height:520px;
    background:url("<?php echo $partner_program_hero_bg; ?>") center/cover no-repeat;
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
                    <a href="<?php echo home_url('/partner-program'); ?>">Partner Program</a>
                </div>

                <?php if (!empty($partner_program_hero_title)) : ?>
                <h1 class="about_title"><?php echo sbtech_kses($partner_program_hero_title); ?></h1>
                <?php endif; ?>

                <?php if (!empty($partner_program_hero_desc)) : ?>
                <p class="about_desc"><?php echo sbtech_kses($partner_program_hero_desc); ?></p>
                <?php endif; ?>

                <div class="about_buttons">
                    <?php if (!empty($partner_program_hero_btn_text_1)) : ?>
                    <a href="<?php echo home_url('/buy'); ?>" class="about_btn about_primary"><?php echo esc_html($partner_program_hero_btn_text_1); ?></a>
                    <?php endif; ?>

                    <?php if (!empty($partner_program_hero_btn_text_2)) : ?>
                    <button class="sell-cta-btn" id="sellOpenModal" class="about_btn"><?php echo esc_html($partner_program_hero_btn_text_2); ?></button>
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

<!-- about_cba start -->
<section class="container">
    <?php echo do_shortcode('[partner_about_cba_shortcode]'); ?>
</section>  
<!-- about_cba end -->

<!-- why_partner_with_cba start -->
<section class="container">
    <?php echo do_shortcode('[why_partner_with_cba_shortcode]'); ?>
</section>  
<!-- why_partner_with_cba end -->

<!-- snagging faq start -->
<section class="container">
    <?php echo do_shortcode('[partner_faq_shortcode]'); ?>
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