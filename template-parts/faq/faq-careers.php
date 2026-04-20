<?php

function career_faq_shortcode_function() {
    ob_start();
    $faq_title = get_theme_mod( 'faq_title', __('Join Our Team & Build Your Future With Us', 'sbtech') );
    $faq_description = get_theme_mod( 'faq_description', __('We are always looking for passionate, talented, and driven individuals who are ready to grow and make an impact. At our company, you’ll work in a dynamic environment where innovation, collaboration, and professional development are at the core of everything we do.', 'sbtech') );

    $repeater_careers_page_faq_items = get_theme_mod('repeater_careers_page_faq');
    ?>
    <!-- Faq section start -->
    <section class="rent-faqs" aria-label="rent faq">
        <div class="rent-container">
            <div class="rent-faqs__head">
                <div>
                    <span class="rent-faqs__kicker">FAQ</span>
                    <?php if (!empty($faq_title)) : ?>
                    <h2 class="rent-faqs__title"><?php echo esc_html( $faq_title ); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($faq_description)) : ?>
                    <p class="rent-faqs__sub"><?php echo esc_html( $faq_description ); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="rent-faqs__wrap" id="rentFaq">
                <!-- Item -->
                <?php
                 if ( ! empty( $repeater_careers_page_faq_items ) ) : foreach ( $repeater_careers_page_faq_items as $item ) : 
                ?>
                <div class="rent-faq" data-open="true">
                    <button class="rent-faq__q" type="button" aria-expanded="true">
                        <?php echo esc_html( $item['faq_question'] ); ?>
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                             <?php echo esc_html( $item['faq_answer'] ); ?>
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
add_shortcode('career_faq_shortcode', 'career_faq_shortcode_function');