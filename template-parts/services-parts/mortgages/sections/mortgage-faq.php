<?php

function mortgage_faq_funciton() {
    ob_start();

    $mortage_title = get_theme_mod( 'mortage_title', 'Mortgage Frequently Asked Questions' );
    $mortage_desc = get_theme_mod( 'mortage_desc', 'Find clear answers to common mortgage queries, eligibility requirements, repayment terms, and financing options to help you make confident property decisions in Dubai.' );

    $mortage_repeater_item = get_theme_mod('mortage_repeater');
    ?>
    <!-- Faq section start -->
    <section class="rent-faqs" aria-label="rent faq">
        <div class="rent-container">
            <div class="rent-faqs__head">
                <div>
                    <?php if(!empty($mortage_title)) : ?>
                    <span class="rent-faqs__kicker">FAQ</span>
                    <?php endif;?>

                    <?php if(!empty($mortage_title)) : ?>
                    <h2 class="rent-faqs__title"><?php echo esc_html( $mortage_title )?></h2>
                    <?php endif;?>

                    <?php if(!empty($mortage_desc)) : ?>
                    <p class="rent-faqs__sub"><?php echo esc_html( $mortage_desc )?></p> 
                    <?php endif;?>
                </div>
            </div>

            <div class="rent-faqs__wrap" id="rentFaq">
                <!-- Item -->
                <?php
                 if ( ! empty( $mortage_repeater_item ) ) : foreach ( $mortage_repeater_item as $item ) : 
                ?>
                <div class="rent-faq" data-open="true">
                    <button class="rent-faq__q" type="button" aria-expanded="true">
                        <?php echo esc_html( $item['mortage_question'] ); ?>
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            <?php echo esc_html( $item['mortage_answer'] ); ?>
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
add_shortcode('mortgage_faq_shortcode', 'mortgage_faq_funciton');