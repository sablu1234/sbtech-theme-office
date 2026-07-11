<?php

function snagging_faq_function() {
    ob_start();
    $snagging_title = get_theme_mod( 'snagging_title', 'Property Snagging FAQ' );
    $snagging_desc = get_theme_mod( 'snagging_desc', 'FGet quick answers about our property snagging and inspection process in Dubai—what we check, when to book, what you’ll receive, and how snagging helps protect your investment before handover.' );

    $snagging_repeater_item = get_theme_mod('snagging_repeater');
    ?>
    <!-- Faq section start -->
    <section class="rent-faqs" aria-label="rent faq">
        <div class="rent-container">
            <div class="rent-faqs__head">
                <div>
                    <?php if(!empty($snagging_title)) : ?>
                    <span class="rent-faqs__kicker">FAQ</span>
                    <?php endif;?>

                    <?php if(!empty($snagging_title)) : ?>
                    <h2 class="rent-faqs__title"><?php echo esc_html( $snagging_title )?></h2>
                    <?php endif;?>

                    <?php if(!empty($snagging_desc)) : ?>
                    <p class="rent-faqs__sub"><?php echo esc_html( $snagging_desc )?></p>
                    <?php endif;?> 
                </div>
            </div>

            <div class="rent-faqs__wrap" id="rentFaq">
                <!-- Item -->
                <?php
                 if ( ! empty( $snagging_repeater_item ) ) : foreach ( $snagging_repeater_item as $item ) : 
                ?>
                <div class="rent-faq" data-open="true">
                    <button class="rent-faq__q" type="button" aria-expanded="true">
                        <?php echo esc_html( $item['snagging_question'] ); ?>
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            <?php echo esc_html( $item['snagging_answer'] ); ?>
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
add_shortcode('snagging_faq_shortcode', 'snagging_faq_function');