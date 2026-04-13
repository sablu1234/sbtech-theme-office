<?php get_header(); ?>

<!-- hero section start -->
    <?php
     $buy_point_title = get_theme_mod( 'buy_point_title', 'Buy Commercial Properties • Prime Locations' );
     $buy_title = get_theme_mod( 'buy_title', 'Buy the Right Space' );
     $buy_subtitle = get_theme_mod( 'buy_subtitle', 'Find the perfect commercial space to buy with confidence.' );
     $buy_desc = get_theme_mod( 'buy_desc', 'Explore premium offices, retail spaces, warehouses, and mixed-use developments in prime business districts. Enjoy clean presentations, fast responses, and curated options tailored specifically to your needs.' );
     $buy_button_text = get_theme_mod( 'buy_button_text', 'Contact Us' );
    ?>
    <section class="commercial-hero">
        <div class="commercial-container">

            <?php if(!empty($buy_point_title)) : ?>
            <div class="commercial-pill">
                <span class="commercial-pillDot"></span><?php echo esc_html( $buy_point_title )?>
            </div>
            <?php endif;?>

            <?php if(!empty($buy_title)) : ?>
            <h1 class="commercial-title"><?php echo esc_html( $buy_title )?></h1>
            <?php endif;?>

            <?php if(!empty($buy_subtitle)) : ?>
            <div class="commercial-sub"><?php echo esc_html( $buy_subtitle )?></div>
            <?php endif;?>

            <?php if(!empty($buy_desc)) : ?>
            <p class="commercial-desc"><?php echo esc_html( $buy_desc )?></p>
            <?php endif;?>

            <?php if(!empty($buy_button_text)) : ?>
            <button class="sell-cta-btn" id="sellOpenModal" class="about_btn"><?php echo esc_html( $buy_button_text )?></button>
            <?php endif;?>

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
<!-- hero section end -->

<section class="container">
    <?php echo do_shortcode('[porpertypi_ajax_filter_dynamic]'); ?>
</section>

<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->


<?php get_footer();
