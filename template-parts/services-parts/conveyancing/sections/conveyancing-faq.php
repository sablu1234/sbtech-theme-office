<?php

function conveyancing_faq_funciton() {
    ob_start();
    ?>
    <!-- Faq section start -->
    <section class="rent-faqs" aria-label="rent faq">
        <div class="rent-container">
            <div class="rent-faqs__head">
                <div>
                    <span class="rent-faqs__kicker">FAQ</span>
                    <h2 class="rent-faqs__title">Frequently Asked Questions About Conveyancing</h2>
                    <p class="rent-faqs__sub">Get clear answers to common questions about property transfers, legal documentation, and conveyancing procedures in Dubai. Our team ensures your transaction is compliant, transparent, and completed without unnecessary delays.</p>
                </div>
            </div>

            <div class="rent-faqs__wrap" id="rentFaq">
                <!-- Item -->
                <div class="rent-faq" data-open="true">
                    <button class="rent-faq__q" type="button" aria-expanded="true">
                        1. What is conveyancing in Dubai real estate?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            Conveyancing is the legal process of transferring property ownership from one party to another. It involves document preparation, verification, coordination with authorities, and ensuring all requirements are completed before final registration.
                        </div>
                    </div>
                </div>

                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        2. How long does a property transfer process usually take?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                           The timeline depends on transaction type (cash or mortgage), documentation readiness, and approvals required. When all documents are prepared in advance, the process can move efficiently with minimal delays.
                        </div>
                    </div>
                </div>

                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        3. What documents are required for property transfer?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            Required documents may include passport copies, Emirates ID, title deed, No Objection Certificates (NOC), power of attorney (if applicable), and mortgage clearance documents. Our team reviews and prepares all necessary paperwork to ensure compliance.
                        </div>
                    </div>
                </div>
                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        4. Can I appoint a Power of Attorney for property transactions?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            Yes, a Power of Attorney (POA) allows a trusted individual or representative to act on your behalf during a property transaction. We assist with preparation, notarization, and required legal approvals.
                        </div>
                    </div>
                </div>

                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        5. Do you assist with document attestation and legal translation?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            Yes. We support MOFA document attestation, certified translations of legal documents, eviction notices, gifting procedures, and other regulatory requirements related to property transactions.
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
add_shortcode('conveyancing_faq_shortcode', 'conveyancing_faq_funciton');