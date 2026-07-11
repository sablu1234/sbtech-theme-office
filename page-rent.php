<?php get_header(); ?>

<!-- hero section start -->
    <?php
    $rent_point_title = get_theme_mod( 'rent_point_title', 'Rent Properties • Prime Locations' );
    $rent_title = get_theme_mod( 'rent_title', 'Rent Properties' );
    $rent_subtitle = get_theme_mod( 'rent_subtitle', 'Find the right Rent space with confidence.' );
    $rent_desc = get_theme_mod( 'rent_desc', 'Explore premium offices, retail, warehouses, and mixed-use spaces across prime business districts. Clean presentation, fast response, and curated options tailored to your requirements.' );
    $rent_button_text = get_theme_mod( 'rent_button_text', 'Contact Us' );
    $rent_page_faq_repeater = get_theme_mod( 'rent_page_faq_repeater');
    ?>
    <section class="commercial-hero">
        <div class="commercial-container">

            <?php if(!empty($rent_point_title)) : ?>
            <div class="commercial-pill">
                <span class="commercial-pillDot"></span><?php echo esc_html( $rent_point_title )?>
            </div>
            <?php endif;?>

            <?php if(!empty($rent_title)) : ?>
            <h1 class="commercial-title"><?php echo esc_html( $rent_title )?></h1>
            <?php endif;?>

            <?php if(!empty($rent_subtitle)) : ?>
            <div class="commercial-sub">
               <?php echo esc_html( $rent_subtitle )?>
            </div>
            <?php endif;?>

            <?php if(!empty($rent_desc)) : ?>
            <p class="commercial-desc">
                <?php echo esc_html( $rent_desc )?>
            </p>
            <?php endif;?>

            <?php if(!empty($rent_button_text)) : ?>
            <button class="sell-cta-btn" id="sellOpenModal" class="about_btn"><?php echo esc_html( $rent_button_text )?></button>
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
    <?php echo do_shortcode('[porpertypi_ajax_filter_dynamic_rent]'); ?>
</section>

<section class="container">
    <?php //echo do_shortcode('[reaf_recent_properties]'); ?>
</section>

<!-- Faq section start -->
<?php
 
 $rent_faq_title = get_theme_mod( 'rent_faq_title', 'Frequently Asked Questions' );
 $rent_faq_description = get_theme_mod( 'rent_faq_description', 'Everything you need to know about renting, payments, and move-in.' );
 ?>
<section class="rent-faqs" aria-label="rent faq">
    <div class="rent-container">
        <div class="rent-faqs__head">
            <?php if(!empty($rent_faq_title)) : ?>
            <div>
                <span class="rent-faqs__kicker">FAQ</span>
				<?php if(!empty($rent_faq_title)) : ?>
                <h2 class="rent-faqs__title"><?php echo esc_html( $rent_faq_title ); ?></h2>
				<?php endif;?>
				
				<?php if(!empty($rent_faq_description)) : ?>
                <p class="rent-faqs__sub"><?php echo esc_html( $rent_faq_description ); ?></p>
				<?php endif;?>
            </div>
            <? endif;?>
        </div>

        <div class="rent-faqs__wrap" id="rentFaq">
            <!-- Item -->
            <?php
                if ( ! empty( $rent_page_faq_repeater ) ) : foreach ( $rent_page_faq_repeater as $item ) : 
            ?>
            <div class="rent-faq" data-open="true">
                <button class="rent-faq__q" type="button" aria-expanded="true">
                    <?php if(!empty($item['faq_question'])) : ?>
                        <?php echo esc_html( $item['faq_question'] ); ?>
                    <?php endif;?>
                    <span class="rent-faq__icon" aria-hidden="true"></span>
                </button>
                <div class="rent-faq__a" role="region">
                    <div class="rent-faq__aInner">
                        <?php if(!empty($item['faq_answer'])) : ?>
                            <?php echo esc_html( $item['faq_answer'] ); ?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php 
            endforeach;
            endif; 
            ?>
        </div>
    </div>
</section>
<!-- Faq section end -->

<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->




<?php get_footer();

