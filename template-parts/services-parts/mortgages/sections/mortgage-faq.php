<?php

function mortgage_faq_funciton() {
    ob_start();
    ?>
    <!-- Faq section start -->
    <section class="rent-faqs" aria-label="rent faq">
        <div class="rent-container">
            <div class="rent-faqs__head">
                <div>
                    <span class="rent-faqs__kicker">FAQ</span>
                    <h2 class="rent-faqs__title">Mortgage Frequently Asked Questions</h2>
                    <p class="rent-faqs__sub">Find clear answers to common mortgage queries, eligibility requirements, repayment terms, and financing options to help you make confident property decisions in Dubai.</p>
                </div>
            </div>

            <div class="rent-faqs__wrap" id="rentFaq">
                <!-- Item -->
                <div class="rent-faq" data-open="true">
                    <button class="rent-faq__q" type="button" aria-expanded="true">
                        1. What documents do I need to apply for a mortgage in Dubai?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            You’ll typically need a valid passport/Emirates ID, visa (if applicable), salary certificate or trade license, bank statements (usually 3–6 months), and proof of income. Requirements can vary by lender and whether you’re salaried or self-employed.
                        </div>
                    </div>
                </div>

                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        2. How much down payment is required in the UAE?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                           Down payment depends on the property type, price, and buyer profile (resident/non-resident). Most lenders require a percentage of the property value upfront. We’ll help you estimate the likely down payment and total upfront costs based on your scenario.
                        </div>
                    </div>
                </div>

                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        3. How is my monthly mortgage payment calculated?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            Monthly payment is based on the loan amount (property price minus down payment), interest rate, and loan term. Our mortgage calculator updates instantly as you adjust your inputs to estimate your monthly repayment.
                        </div>
                    </div>
                </div>
                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        4. What’s the difference between fixed and variable interest rates?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            A fixed rate stays the same for a set period, giving predictable payments. A variable rate can change based on market conditions, which may increase or decrease your monthly payment over time. We’ll guide you on which option suits your goals and risk comfort.
                        </div>
                    </div>
                </div>

                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        5. How long does mortgage approval usually take?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            Timelines vary, but the process typically includes eligibility checks, document review, and final bank approval. With complete documents, approvals can move faster. Our team supports you through each step to reduce delays and keep the process smooth.
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
add_shortcode('mortgage_faq_shortcode', 'mortgage_faq_funciton');