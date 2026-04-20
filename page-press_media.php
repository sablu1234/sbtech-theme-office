<?php get_header(); ?>

<!-- Hero area start -->
    <style>
        <?php
        $media_press_hero_bg = get_theme_mod('media_press_hero_bg', get_template_directory_uri().'/assets/media_press/media_press.jpg');

        $media_press_hero_title = get_theme_mod( 'media_press_hero_title', __('Media & Press <br> Latest Updates', 'sbtech') );
        $media_press_hero_desc = get_theme_mod( 'media_press_hero_desc', __('Stay updated with our latest news, press releases, project highlights, and industry insights. Discover key developments, market trends, and company announcements shaping the future of property.', 'sbtech') );
        $media_press_hero_btn_text_1 = get_theme_mod( 'media_press_hero_btn_text_1', __('View Properties', 'sbtech') );
        $media_press_hero_btn_text_2 = get_theme_mod( 'media_press_hero_btn_text_2', __('Contact', 'sbtech') );
        ?>
        .media_press_hero{
      position:relative;
      width:100%;
      min-height:520px;
      background:url("<?php echo $media_press_hero_bg; ?>") center/cover no-repeat;
      display:flex;
      align-items:center;
    }
    </style>
<section class="media_press_hero">
    <div class="about_overlay"></div>

    <div class="about_container">
        <div class="about_content">

            <div class="about_breadcrumb">
                <a href="<?php echo home_url(); ?>">Home</a>
                <span>•</span>
                <a href="<?php echo home_url('/media'); ?>">Media</a>
            </div>

            <?php if (!empty($media_press_hero_title)) : ?>
            <h1 class="about_title"><?php echo sbtech_kses($media_press_hero_title); ?></h1>
            <?php endif; ?>

            <?php if (!empty($media_press_hero_desc)) : ?>
            <p class="about_desc"><?php echo esc_html($media_press_hero_desc); ?></p>
            <?php endif; ?>

            <div class="about_buttons">
                <?php if (!empty($media_press_hero_btn_text_1)) : ?>
                <a href="<?php echo home_url('/buy'); ?>" class="about_btn about_primary"><?php echo esc_html($media_press_hero_btn_text_1); ?></a>
                <?php endif; ?>

                <?php if (!empty($media_press_hero_btn_text_2)) : ?>
                <button class="sell-cta-btn" id="sellOpenModal" class="about_btn"><?php echo esc_html($media_press_hero_btn_text_2); ?></button>
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

<!-- Media shortcode start -->
<section class="container">
    <?php echo do_shortcode('[press_media]'); ?>
</section>
<!-- Media shortcode end -->

<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->

<?php get_footer(); ?>