<?php

function property_faq_function() {
    ob_start();

        $property_management_wwd_card_6_title = get_theme_mod( 'property_management_wwd_card_6_title', 'Regular Inspections' );
        $property_management_wwd_card_6_desc = get_theme_mod( 'property_management_wwd_card_6_desc', 'To preserve and enhance the value of your property, we conduct regular inspections and provide comprehensive reports. This proactive strategy allows us to identify and resolve potential issues early, preventing them from escalating into significant problems.' );

         $property_management_faq_title = get_theme_mod( 'property_management_faq_title', 'Property Management FAQs' );
         $property_management_faq_description = get_theme_mod( 'property_management_faq_description', 'Find quick answers about listings, viewings, pricing, payments, and the buying or renting process in Dubai.' );

        $items = get_theme_mod('repeater_setting_2');
        
        
    ?>

    
    

    
    <!-- Faq section start -->
    <section class="rent-faqs" aria-label="rent faq">
        <div class="rent-container">
            <div class="rent-faqs__head">
                <?php if(!empty($property_management_faq_title)) : ?>
                <div>
                    <span class="rent-faqs__kicker">FAQ</span>
                    <?php if(!empty($property_management_faq_title)) : ?>
                    <h2 class="rent-faqs__title"><?php echo sbtech_kses($property_management_faq_title); ?></h2>
                    <?php endif; ?>

                    <?php if(!empty($property_management_faq_description)) : ?>
                    <p class="rent-faqs__sub"><?php echo sbtech_kses($property_management_faq_description); ?></p>
                    <?php endif; ?>
                </div>
                <?php endif;?>
            </div>

            <div class="rent-faqs__wrap" id="rentFaq">

             <!-- Item -->
                <!-- <div class="rent-faq" data-open="true">
                    <button class="rent-faq__q" type="button" aria-expanded="true">
                        1. How do I schedule a viewing for a property?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            You can request a viewing directly from the property page using the enquiry form. Our team will confirm availability and arrange a suitable time for you.
                        </div>
                    </div>
                </div> -->

                <?php 
                if (!empty($items)) :
                    foreach ($items as $index => $item) : 
                        $is_open = ($index === 0) ? 'true' : 'false';
                ?>

                    <div class="rent-faq" data-open="<?php echo $is_open; ?>">
                        <button class="rent-faq__q" type="button" aria-expanded="<?php echo $is_open; ?>">
                            
                            <?php echo ($index + 1) . '. ' . sbtech_kses($item['faq_question']); ?>

                            <span class="rent-faq__icon" aria-hidden="true"></span>
                        </button>

                        <div class="rent-faq__a" role="region">
                            <div class="rent-faq__aInner">
                                <?php echo sbtech_kses($item['faq_answer']); ?>
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
add_shortcode('property_faq_shortcode', 'property_faq_function');