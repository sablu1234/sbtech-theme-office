<?php get_header(); ?>


<!-- Hero section start -->
<section class="contactInfo">
    <div class="contactInfo__wrap">
        <p class="contactInfo__kicker">GET IN TOUCH</p>
        <h2 class="contactInfo__title">Contact Us</h2>
        <p class="contactInfo__sub">
            Whether you're looking to buy, sell, or invest in luxury real estate, our expert team is here to guide you every step of the way.
        </p>

        <div class="contactInfo__cards">
            <!-- Phone -->
            <article class="cCard">
                <div class="cCard__icon" aria-hidden="true">
                    <!-- phone -->
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M7 3h3l1.2 5-2 1.3c1.1 2.2 2.9 4 5.1 5.1l1.3-2 5 1.2v3c0 1-1 2-2.2 2C10 19.8 4.2 14 3.1 6.5 3 5.2 4 4 5 4h2z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <h3 class="cCard__title">Phone</h3>
                <div class="cCard__text">
                    <a href="tel:+97140000000">+971 4 000 0000</a><br>
                    <a href="tel:+971500000000">+971 50 000 0000</a>
                </div>
            </article>

            <!-- Email -->
            <article class="cCard">
                <div class="cCard__icon" aria-hidden="true">
                    <!-- mail -->
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M4 7h16v10H4V7z" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                        <path d="M4 7l8 6 8-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <h3 class="cCard__title">Email</h3>
                <div class="cCard__text">
                    <a href="mailto:info@aurum.ae">info@aurum.ae</a><br>
                    <a href="mailto:sales@aurum.ae">sales@aurum.ae</a>
                </div>
            </article>

            <!-- Office -->
            <article class="cCard">
                <div class="cCard__icon" aria-hidden="true">
                    <!-- pin -->
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M12 22s7-4.5 7-11a7 7 0 1 0-14 0c0 6.5 7 11 7 11z"
                            stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                        <circle cx="12" cy="11" r="2.5" stroke="currentColor" stroke-width="2" />
                    </svg>
                </div>
                <h3 class="cCard__title">Office</h3>
                <div class="cCard__text">
                    Level 42, Burj Khalifa<br>
                    Downtown Dubai, UAE
                </div>
            </article>

            <!-- Working Hours -->
            <article class="cCard">
                <div class="cCard__icon" aria-hidden="true">
                    <!-- clock -->
                    <svg viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="8.5" stroke="currentColor" stroke-width="2" />
                        <path d="M12 7v5l3 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <h3 class="cCard__title">Working Hours</h3>
                <div class="cCard__text">
                    Mon - Fri: 9:00 AM - 7:00 PM<br>
                    Sat: 10:00 AM - 5:00 PM
                </div>
            </article>
        </div>
    </div>
</section>
<!-- Hero section end -->

<!-- Form and map start -->
<section class="cx">
    <div class="cx__wrap">

        <!-- LEFT: FORM -->
        <div class="cx__panel cx__panel--form">
            <div class="cxHead">

                <h2 class="cxHead__title">Send Us a Message</h2>
            </div>

            <?php echo do_shortcode('[contact-form-7 id="aacb486" title="new email"]'); ?>
        </div>

        <!-- RIGHT: MAP -->
        <div class="cx__panel cx__panel--map">
            <div class="cxMap">
                <iframe
                    class="cxMap__frame"
                    src="https://www.google.com/maps?q=Burj%20Khalifa%20Dubai&z=15&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    aria-label="Map location">
                </iframe>

                <div class="cxMap__chip">
                    <span class="cxMap__dot" aria-hidden="true"></span>
                    <div>
                        <div class="cxMap__chipTitle">Burj Khalifa</div>
                        <div class="cxMap__chipText">Downtown Dubai, UAE</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Form and map end -->




<?php get_footer();
