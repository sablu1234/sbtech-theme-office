<?php

function conveyancing_faq_funciton() {
    ob_start();
    $conveyancing_title = get_theme_mod( 'conveyancing_title', 'Frequently Asked Questions About Conveyancing' );
    $conveyancing_desc = get_theme_mod( 'conveyancing_desc', 'Get clear answers to common questions about property transfers, legal documentation, and conveyancing procedures in Dubai. Our team ensures your transaction is compliant, transparent, and completed without unnecessary delays.' );

    $conveyancing_repeater_item = get_theme_mod('conveyancing_repeater');
    ?>
    <!-- Faq section start -->
    <section class="rent-faqs" aria-label="rent faq">
        <div class="rent-container">
            <div class="rent-faqs__head">
                <div>
                    <?php if(!empty($conveyancing_title)) : ?>
                    <span class="rent-faqs__kicker">FAQ</span>
                    <?php endif;?>

                    <?php if(!empty($conveyancing_title)) : ?>
                    <h2 class="rent-faqs__title"><?php echo esc_html( $conveyancing_title )?></h2>
                    <?php endif;?>

                    <?php if(!empty($conveyancing_desc)) : ?>
                    <p class="rent-faqs__sub"><?php echo esc_html( $conveyancing_desc )?></p>
                    <?php endif;?> 
                </div>
            </div>

            <div class="rent-faqs__wrap" id="rentFaq">
                <!-- Item -->
                <?php
                 if ( ! empty( $conveyancing_repeater_item ) ) : foreach ( $conveyancing_repeater_item as $item ) : 
                ?>
                <div class="rent-faq" data-open="true">
                    <button class="rent-faq__q" type="button" aria-expanded="true">
                        <?php echo esc_html( $item['conveyancing_question'] ); ?>
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            <?php echo esc_html( $item['conveyancing_answer'] ); ?>
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
add_shortcode('conveyancing_faq_shortcode', 'conveyancing_faq_funciton');