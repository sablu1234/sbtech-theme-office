<?php get_header(); ?>








<section class="container">
    <?php echo do_shortcode('[porpertypi_ajax_filter_dynamic_rent]'); ?>
</section>

<section class="container">
    <?php echo do_shortcode('[reaf_recent_properties]'); ?>
</section>

<!-- Faq section start -->
<section class="rent-faqs" aria-label="rent faq">
    <div class="rent-container">
        <div class="rent-faqs__head">
            <div>
                <span class="rent-faqs__kicker">FAQ</span>
                <h2 class="rent-faqs__title">Frequently asked questions</h2>
                <p class="rent-faqs__sub">Everything you need to know about renting, payments, and move-in.</p>
            </div>
        </div>

        <div class="rent-faqs__wrap" id="rentFaq">
            <!-- Item -->
            <div class="rent-faq" data-open="true">
                <button class="rent-faq__q" type="button" aria-expanded="true">
                    What documents do I need to rent a property?
                    <span class="rent-faq__icon" aria-hidden="true"></span>
                </button>
                <div class="rent-faq__a" role="region">
                    <div class="rent-faq__aInner">
                        Typically: Emirates ID/passport, visa page, proof of income, and cheque details. Requirements can vary by landlord/building.
                    </div>
                </div>
            </div>

            <div class="rent-faq">
                <button class="rent-faq__q" type="button" aria-expanded="false">
                    How much is the security deposit and agency fee?
                    <span class="rent-faq__icon" aria-hidden="true"></span>
                </button>
                <div class="rent-faq__a" role="region">
                    <div class="rent-faq__aInner">
                        Deposit and agency fee depend on furnished/unfurnished status and agreement terms. You can display these clearly on the listing page and brochure.
                    </div>
                </div>
            </div>

            <div class="rent-faq">
                <button class="rent-faq__q" type="button" aria-expanded="false">
                    Can I filter furnished vs unfurnished rentals?
                    <span class="rent-faq__icon" aria-hidden="true"></span>
                </button>
                <div class="rent-faq__a" role="region">
                    <div class="rent-faq__aInner">
                        Yes. Add “Furnishing” as a filter and connect it to your listing fields (meta). Works perfectly with AJAX filtering.
                    </div>
                </div>
            </div>

            <div class="rent-faq">
                <button class="rent-faq__q" type="button" aria-expanded="false">
                    How fast can I move in after viewing?
                    <span class="rent-faq__icon" aria-hidden="true"></span>
                </button>
                <div class="rent-faq__a" role="region">
                    <div class="rent-faq__aInner">
                        If documents and payments are ready, move-in can be finalized in a few days. Timing depends on approvals and contract signing.
                    </div>
                </div>
            </div>

            <div class="rent-faq">
                <button class="rent-faq__q" type="button" aria-expanded="false">
                    Are bills (DEWA / internet) included in rent?
                    <span class="rent-faq__icon" aria-hidden="true"></span>
                </button>
                <div class="rent-faq__a" role="region">
                    <div class="rent-faq__aInner">
                        Usually not included unless the listing is serviced or “all bills included”. Add a simple badge on cards to clarify.
                    </div>
                </div>
            </div>

            <div class="rent-faq">
                <button class="rent-faq__q" type="button" aria-expanded="false">
                    Can I schedule a viewing directly from the listing page?
                    <span class="rent-faq__icon" aria-hidden="true"></span>
                </button>
                <div class="rent-faq__a" role="region">
                    <div class="rent-faq__aInner">
                        Yes. Add “Schedule viewing” + “Enquire” CTAs and route leads to agent/CRM. You can integrate Calendly or a custom booking flow.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Faq section end -->

<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->















<?php get_footer();
