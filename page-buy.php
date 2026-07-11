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

 <!-- Faq section start -->
    <?php
        $home_agents_title = get_theme_mod( 'home_agents_title', __('Our Agents', 'sbtech') );
        $buy_faq_title = get_theme_mod( 'buy_faq_title', __('Frequently Asked Questions', 'sbtech') );
        $buy_faq_description = get_theme_mod( 'buy_faq_description', __('Find answers to common questions about buying properties, the process, viewings, documentation, and available options.', 'sbtech') );
        $buy_page_faq_repeater_items = get_theme_mod( 'buy_page_fafq_repeater');
    ?>
    <section class="rent-faqs" aria-label="rent faq">
        <div class="rent-container">
            <div class="rent-faqs__head">
                <div>
                    <span class="rent-faqs__kicker">FAQ</span>
                    <?php if(!empty($buy_faq_title)) : ?>
                    <h2 class="rent-faqs__title"><?php echo esc_html( $buy_faq_title ); ?></h2>
                    <?php endif;?>

                     <?php if(!empty($buy_faq_description)) : ?>
                    <p class="rent-faqs__sub"><?php echo esc_html( $buy_faq_description ); ?></p>
                    <?php endif;?>
                    
                </div>
            </div>

            <div class="rent-faqs__wrap" id="rentFaq">

             <!-- Item -->

                <?php
                 if ( ! empty( $buy_page_faq_repeater_items ) ) : foreach ( $buy_page_faq_repeater_items as $item ) : 
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
