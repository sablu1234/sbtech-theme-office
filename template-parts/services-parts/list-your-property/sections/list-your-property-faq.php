<?php

function list_your_property_faq_funciton() {
    ob_start();
    $li_yp_faq_title = get_theme_mod( 'li_yp_faq_title', 'List Your Property with Us' );
    $li_yp_faq_desc = get_theme_mod( 'li_yp_faq_desc', 'Looking to sell or rent your property? Our platform helps you reach a wide audience quickly and easily. By listing your property with us, you’ll get exposure to interested buyers or tenants while also receiving expert support throughout the process. It’s time to let your property be seen by the right people. Start the process today!' );

    $li_yp_items = get_theme_mod('list_yp_repeater');
    ?>
    <!-- Faq section start -->
    <section class="rent-faqs" aria-label="rent faq">
        <div class="rent-container">
            <div class="rent-faqs__head">
                <div>
                    <?php if(!empty($li_yp_faq_title)) : ?>
                    <span class="rent-faqs__kicker">FAQ</span>
                    <?php endif;?>

                    <?php if(!empty($li_yp_faq_title)) : ?>
                    <h2 class="rent-faqs__title"><?php echo esc_html( $li_yp_faq_title )?></h2>
                    <?php endif;?>

                    <?php if(!empty($li_yp_faq_desc)) : ?>
                    <p class="rent-faqs__sub"><?php echo esc_html( $li_yp_faq_desc )?></p>
                    <?php endif;?>
                </div>
            </div>

            <div class="rent-faqs__wrap" id="rentFaq">
                <!-- Item -->
                <?php
                 if ( ! empty( $li_yp_items ) ) : foreach ( $li_yp_items as $item ) : 
                ?>
                <div class="rent-faq" data-open="true">
                    <button class="rent-faq__q" type="button" aria-expanded="true">
                        <?php echo esc_html( $item['liyp_faq_question'] ); ?>
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            <?php echo esc_html( $item['liyp_faq_answer'] ); ?>
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
    <?php
    return ob_get_clean();
}
add_shortcode('list_your_property_faq_shortcode', 'list_your_property_faq_funciton');