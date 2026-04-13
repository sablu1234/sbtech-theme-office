<?php get_header(); ?>

<!-- Hero area start -->
    <style>
        <?php
        $media_press_hero_bg = get_theme_mod('media_press_hero_bg', get_template_directory_uri().'/assets/media_press/media_press.jpg');
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

            <h1 class="about_title">
                Media & Press <br> Latest Updates
            </h1>

            <p class="about_desc">
                Stay updated with our latest news, press releases, project highlights, and industry insights. Discover key developments, market trends, and company announcements shaping the future of property.
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

<!-- Media shortcode start -->
<section class="container">
    <?php echo do_shortcode('[press_media]'); ?>
</section>
<!-- Media shortcode end -->

<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->

<?php get_footer(); ?>