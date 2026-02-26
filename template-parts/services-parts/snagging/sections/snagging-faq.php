<?php

function snagging_faq_function() {
    ob_start();
    ?>
    <!-- Faq section start -->
    <section class="rent-faqs" aria-label="rent faq">
        <div class="rent-container">
            <div class="rent-faqs__head">
                <div>
                    <span class="rent-faqs__kicker">FAQ</span>
                    <h2 class="rent-faqs__title">Property Snagging FAQ</h2>
                    <p class="rent-faqs__sub">FGet quick answers about our property snagging and inspection process in Dubai—what we check, when to book, what you’ll receive, and how snagging helps protect your investment before handover.</p>
                </div>
            </div>

            <div class="rent-faqs__wrap" id="rentFaq">
                <!-- Item -->
                <div class="rent-faq" data-open="true">
                    <button class="rent-faq__q" type="button" aria-expanded="true">
                        1. What is property snagging?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            YProperty snagging is a detailed inspection of a new or recently completed property to identify defects, unfinished work, and quality issues before handover or move-in. It helps ensure your unit meets expected standards.
                        </div>
                    </div>
                </div>

                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        2. When is the best time to book a snagging inspection?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                           The ideal time is before final handover—once the property is accessible and key finishes are completed. This allows you to raise issues with the developer/contractor while rectifications are still their responsibility.
                        </div>
                    </div>
                </div>

                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        3. What areas do you typically inspect?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            We commonly inspect finishing quality (paint, walls, flooring), doors/windows alignment, visible plumbing issues, electrical points, fixtures, sealants, and overall workmanship—covering both functional checks and cosmetic defects.
                        </div>
                    </div>
                </div>
                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        4. Will I receive a snagging report?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            Yes. You’ll receive a clear, structured snagging report listing issues with priorities, so you can share it with the developer/contractor and track rectification efficiently.
                        </div>
                    </div>
                </div>

                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        5. Can you do a re-inspection after fixes are completed?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            Yes. We can perform a follow-up inspection to verify that previously reported snags were addressed properly and the property is ready for handover or move-in with confidence.
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
add_shortcode('snagging_faq_shortcode', 'snagging_faq_function');