<?php

function partner_faq_function() {
    ob_start();
    $partner_program_title = get_theme_mod( 'partner_program_title', 'Partner With Us & Grow Together' );
    $partner_program_desc = get_theme_mod( 'partner_program_desc', 'Join our partner program and unlock new opportunities for growth and collaboration. We work with agencies, freelancers, and businesses who want to expand their services, increase revenue, and deliver more value to their clients.' );

    $partner_program_repeater_item = get_theme_mod('partner_program_repeater');
    ?>
    <!-- Faq section start -->
    <section class="rent-faqs" aria-label="rent faq">
        <div class="rent-container">
            <div class="rent-faqs__head">
                <div>
                    <?php if(!empty($partner_program_title)) : ?>
                    <span class="rent-faqs__kicker">FAQ</span>
                    <?php endif;?>

                    <?php if(!empty($partner_program_title)) : ?>
                    <h2 class="rent-faqs__title"><?php echo esc_html( $partner_program_title )?></h2>
                    <?php endif;?>

                    <?php if(!empty($partner_program_desc)) : ?>
                    <p class="rent-faqs__sub"><?php echo esc_html( $partner_program_desc )?></p>
                    <?php endif;?> 
                </div>
            </div>

            <div class="rent-faqs__wrap" id="rentFaq">  
                <!-- Item -->
                <?php
                 if ( ! empty( $partner_program_repeater_item ) ) : foreach ( $partner_program_repeater_item as $item ) : 
                ?>
                <div class="rent-faq" data-open="true">
                    <button class="rent-faq__q" type="button" aria-expanded="true">
                        <?php if(!empty($item['partner_program_question'])) : ?>
                        <?php echo esc_html( $item['partner_program_question'] ); ?>
                        <?php endif;?>

                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            <?php if(!empty($item['partner_program_answer'])) : ?>
                            <?php echo esc_html( $item['partner_program_answer'] ); ?>
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
    <?php
    return ob_get_clean();
}
add_shortcode('partner_faq_shortcode', 'partner_faq_function');