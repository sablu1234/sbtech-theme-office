<?php

function property_faq_function() {
    ob_start();
    ?>
    <!-- Faq section start -->
    <section class="rent-faqs" aria-label="rent faq">
        <div class="rent-container">
            <div class="rent-faqs__head">
                <div>
                    <span class="rent-faqs__kicker">FAQ</span>
                    <h2 class="rent-faqs__title">Property FAQs</h2>
                    <p class="rent-faqs__sub">Find quick answers about listings, viewings, pricing, payments, and the buying or renting process in Dubai. If you need help, our team is ready to guide you step-by-step.</p>
                </div>
            </div>

            <div class="rent-faqs__wrap" id="rentFaq">
                <!-- Item -->
                <div class="rent-faq" data-open="true">
                    <button class="rent-faq__q" type="button" aria-expanded="true">
                        1. How do I schedule a viewing for a property?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            You can request a viewing directly from the property page using the enquiry form. Our team will confirm availability and arrange a suitable time for you.
                        </div>
                    </div>
                </div>

                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        2. Are the property prices negotiable?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                           Some properties allow negotiation depending on demand, unit type, and seller/landlord terms. We’ll advise you on realistic pricing and the best offer strategy.
                        </div>
                    </div>
                </div>

                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        3. What documents do I need to rent a property in Dubai?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            Common requirements include Emirates ID/passport, visa page, and proof of income. Additional documents may be needed depending on the building and landlord.
                        </div>
                    </div>
                </div>
                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        4. What are the typical buying costs besides the property price?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            Additional costs may include registration fees, agency fees, and mortgage-related charges (if applicable). We can share a clear breakdown based on your selected property.
                        </div>
                    </div>
                </div>

                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        5. Can I buy a property in Dubai as a non-resident?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            Yes, non-residents can purchase property in eligible areas. The process and financing options vary, and we’ll guide you through the requirements and next steps.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Faq section end -->
    <?php
    return ob_get_clean();
}
add_shortcode('property_faq_shortcode', 'property_faq_function');