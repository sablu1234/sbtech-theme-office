<?php get_header(); ?>


<!-- hero section start -->
<section class="commercial-hero">
    <div class="commercial-container">

        <div class="commercial-pill">
            <span class="commercial-pillDot"></span>
            Commercial Properties • Prime Locations
        </div>

        <h1 class="commercial-title">Commercial Properties</h1>

        <div class="commercial-sub">
            Find the right commercial space with confidence.
        </div>

        <p class="commercial-desc">
            Explore premium offices, retail, warehouses, and mixed-use spaces across prime business districts.
            Clean presentation, fast response, and curated options tailored to your requirements.
        </p>

        <button class="commercial-btn" class="commercial-cta-btn" id="commercialOpenModal" type="button">
            Send a Request <span class="commercial-arrow">›</span>
        </button>

    </div>
</section>
<!-- form start-->
<div class="commercial-modal" id="commercialModal" aria-hidden="true">
    <div class="commercial-modal__backdrop" data-commercial-close="1"></div>

    <div class="commercial-modal__dialog" role="dialog" aria-modal="true" aria-label="List your property form">
        <button class="commercial-modal__close" type="button" aria-label="Close" data-commercial-close="1">✕</button>

        <div class="commercial-modal__grid">
            <!-- LEFT: form -->
            <div class="commercial-modal__left">
                <h3 class="commercial-modal__title">List your property with <span>Metropolitan</span></h3>

                <form class="commercial-form" action="#" method="post">
                    <label class="<!-- SELL MODAL CONTACT FORM (Pro) | Prefix: commercial- | Button -> Modal with animatcommercial-field">
                        <span class="commercial-label">Full Name<span class="commercial-req">*</span></span>
                        <input class="commercial-input" type="text" name="full_name" required placeholder="Your full name">
                    </label>

                    <label class="commercial-field">
                        <span class="commercial-label">E-Mail<span class="commercial-req">*</span></span>
                        <input class="commercial-input" type="email" name="email" required placeholder="name@email.com">
                    </label>

                    <label class="commercial-field">
                        <span class="commercial-label">Phone<span class="commercial-req">*</span></span>
                        <div class="commercial-phone">
                            <select class="commercial-select" name="country_code" aria-label="Country code">
                                <option value="+971">🇦🇪 +971</option>
                                <option value="+880" selected>🇧🇩 +880</option>
                                <option value="+91">🇮🇳 +91</option>
                                <option value="+1">🇺🇸 +1</option>
                                <option value="+44">🇬🇧 +44</option>
                            </select>
                            <input class="commercial-input commercial-input--phone" type="tel" name="phone" required placeholder="1812-345678">
                        </div>
                    </label>

                    <label class="commercial-field">
                        <span class="commercial-label">Message</span>
                        <textarea class="commercial-textarea" name="message" rows="4"
                            placeholder="Tell us about your property; location, size, price..."></textarea>
                    </label>

                    <label class="commercial-check">
                        <input type="checkbox" name="offers">
                        <span>I agree to receive information about offers, deals and services from this website (optional).</span>
                    </label>

                    <button class="commercial-submit" type="submit">Get In Touch</button>

                    <p class="commercial-legal">
                        By clicking the submit button, I accept and provide my personal information,
                        and agree to the Metropolitan Group <a href="#">Privacy Policy</a>, applicable data
                        protection laws, and <a href="#">Terms of Use</a>.
                    </p>
                </form>
            </div>

            <!-- RIGHT: image -->
            <div class="commercial-modal__right" aria-hidden="true">
                <div class="commercial-agent">
                    <img class="commercial-agent__img"
                        src="https://images.unsplash.com/photo-1551836022-deb4988cc6c0?auto=format&fit=crop&w=1200&q=80"
                        alt="">
                    <div class="commercial-agent__shape"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form end-->
<!-- hero section end -->

<!-- Recent commercial Property start -->
<section class="container commercial-recent">
    <?php echo do_shortcode('[Commercial_reaf_recent_properties]'); ?>
</section>
<!-- Recent commercial Property end -->

<!-- Who we are start -->
<section class="commercial-who">
    <div class="commercial-container">

        <!-- Center Title -->
        <div class="commercial-whoHead">
            <h2 class="commercial-whoTitle">Who We Are</h2>
            <p class="commercial-whoDesc">
                We help businesses secure premium commercial spaces with verified listings, fast coordination,
                and a clean, performance-focused experience built for growth.
            </p>
        </div>

        <?php           
            $commercial_experience = get_option('commercial_experience');            
            $commercial_verified_listings = get_option('commercial_Verified_listings');            
            $commercial_worldwide = get_option('commercial_worldwide');            
            $commercial_quick_shortlist = get_option('commercial_quick_shortlist');            
        ?>
        <!-- Cards -->
        <div class="commercial-whoGrid">

            <div class="commercial-whoCard">
                <div class="commercial-whoIcon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M10 6V5a2 2 0 0 1 2-2h0a2 2 0 0 1 2 2v1" />
                        <path d="M4 7h16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2Z" />
                        <path d="M2 12h20" />
                    </svg>
                </div>
                <p class="commercial-whoValue"><?php echo !empty($commercial_experience) ? esc_html($commercial_experience) : '100';?>+ Years</p>
                <p class="commercial-whoLabel">Commercial real estate experience</p>
            </div>

            <div class="commercial-whoCard">
                <div class="commercial-whoIcon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M3 21V7a2 2 0 0 1 2-2h5v16" />
                        <path d="M10 9h4a2 2 0 0 1 2 2v10" />
                        <path d="M16 7h3a2 2 0 0 1 2 2v12" />
                    </svg>
                </div>
                <p class="commercial-whoValue"><?php echo !empty($commercial_verified_listings) ? esc_html($commercial_verified_listings) : '2,000+';?></p>
                <p class="commercial-whoLabel">Verified commercial listings</p>
            </div>

            <div class="commercial-whoCard">
                <div class="commercial-whoIcon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <circle cx="12" cy="12" r="9" />
                        <path d="M3.6 9h16.8M3.6 15h16.8" />
                    </svg>
                </div>
                <p class="commercial-whoValue"><?php echo !empty($commercial_worldwide) ? esc_html($commercial_worldwide) : 'Global Clients';?></p>
                <p class="commercial-whoLabel">Multi-language support & worldwide reach</p>
            </div>

            <div class="commercial-whoCard">
                <div class="commercial-whoIcon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M13 2 3 14h7l-1 8 12-14h-7l-1-6Z" />
                    </svg>
                </div>
                <p class="commercial-whoValue"><?php echo !empty($commercial_quick_shortlist) ? esc_html($commercial_quick_shortlist) : 'Fast Response';?></p>
                <p class="commercial-whoLabel">Quick shortlist & viewing coordination</p>
            </div>

        </div>

        <!-- Extra row -->
        <div class="commercial-whoExtra">
            <div class="commercial-whoBadge"><i></i> Mobile-first experience</div>
            <div class="commercial-whoBadge"><i></i> Cloudflare-ready speed</div>
            <div class="commercial-whoBadge"><i></i> Verified listing system</div>
            <div class="commercial-whoBadge"><i></i> Lead optimized workflow</div>
        </div>

    </div>
</section>
<!-- Who we are end -->

<!-- We help you start -->
<section class="commercial-help">
    <div class="commercial-container">

        <div class="commercial-helpHead">
            <h2 class="commercial-helpTitle">How can we help you?</h2>
            <p class="commercial-helpSub">
                We can help you rent or buy any type of commercial property that will fit with your goals and budget:
            </p>
        </div>

        <div class="commercial-helpGrid help-main-card">

            <!-- 1 -->
            <div class="commercial-helpCard">
                <div class="commercial-helpIcon" aria-hidden="true">
                    <!-- Office icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award-icon lucide-award">
                        <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526" />
                        <circle cx="12" cy="8" r="6" />
                    </svg>
                </div>
                <div class="commercial-helpContent">
                    <h3>Prime Office Spaces</h3>
                    <p>
                        Strategically located office environments designed for productivity, professionalism, and long-term business growth.
                    </p>
                </div>
            </div>
            <!-- 2 -->
            <div class="commercial-helpCard">
                <div class="commercial-helpIcon" aria-hidden="true">
                    <!-- Office icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-squares-unite-icon lucide-squares-unite">
                        <path d="M4 16a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v3a1 1 0 0 0 1 1h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2v-3a1 1 0 0 0-1-1z" />
                    </svg>
                </div>
                <div class="commercial-helpContent">
                    <h3>Premium Retail Units</h3>
                    <p>
                        High-traffic retail locations that enhance brand visibility and attract consistent customer flow.
                    </p>
                </div>
            </div>

            <!-- 3 -->
            <div class="commercial-helpCard">
                <div class="commercial-helpIcon" aria-hidden="true">
                    <!-- Warehouse icon -->
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8">
                        <path d="M3 10 12 3l9 7v11H3V10Z" />
                        <path d="M7 21v-7h10v7" />
                        <path d="M7 10h10" />
                    </svg>
                </div>
                <div class="commercial-helpContent">
                    <h3>Smart Warehouse Solutions</h3>
                    <p>
                        Efficient storage and logistics-ready warehouse spaces with excellent accessibility and operational support.
                    </p>
                </div>
            </div>

            <!-- 4 -->
            <div class="commercial-helpCard">
                <div class="commercial-helpIcon" aria-hidden="true">
                    <!-- Building icon -->
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8">
                        <path d="M4 21V3h10v18" />
                        <path d="M14 9h6v12h-6" />
                        <path d="M7 7h0M7 10h0M7 13h0M7 16h0" />
                    </svg>
                </div>
                <div class="commercial-helpContent">
                    <h3>Corporate Commercial Towers</h3>
                    <p>
                        Modern commercial towers offering flexible floor plans for corporate headquarters, business centers, and enterprises.
                    </p>
                </div>
            </div>
            <!-- 5 -->
            <div class="commercial-helpCard">
                <div class="commercial-helpIcon" aria-hidden="true">
                    <!-- Building icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-panel-left-right-dashed-icon lucide-panel-left-right-dashed">
                        <path d="M15 10V9" />
                        <path d="M15 15v-1" />
                        <path d="M15 21v-2" />
                        <path d="M15 5V3" />
                        <path d="M9 10V9" />
                        <path d="M9 15v-1" />
                        <path d="M9 21v-2" />
                        <path d="M9 5V3" />
                        <rect x="3" y="3" width="18" height="18" rx="2" />
                    </svg>
                </div>
                <div class="commercial-helpContent">
                    <h3>Brand Showroom Spaces</h3>
                    <p>
                        Well-positioned showrooms ideal for product display, brand experience, and direct customer interaction.
                    </p>
                </div>
            </div>
            <!-- 6 -->
            <div class="commercial-helpCard">
                <div class="commercial-helpIcon" aria-hidden="true">
                    <!-- Building icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-warehouse-icon lucide-warehouse">
                        <path d="M18 21V10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v11" />
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 1.132-1.803l7.95-3.974a2 2 0 0 1 1.837 0l7.948 3.974A2 2 0 0 1 22 8z" />
                        <path d="M6 13h12" />
                        <path d="M6 17h12" />
                    </svg>
                </div>
                <div class="commercial-helpContent">
                    <h3>Industrial Business Parks</h3>
                    <p>
                        Purpose-built industrial properties with strong infrastructure, transport connectivity, and operational efficiency.
                    </p>
                </div>
            </div>
            <!-- 7 -->
            <div class="commercial-helpCard">
                <div class="commercial-helpIcon" aria-hidden="true">
                    <!-- Building icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-link-icon lucide-link">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
                    </svg>
                </div>
                <div class="commercial-helpContent">
                    <h3>High-Return Investment Assets</h3>
                    <p>
                        Commercial properties selected for stable rental income, capital appreciation, and long-term investment security.
                    </p>
                </div>
            </div>
            <!-- 8 -->
            <div class="commercial-helpCard">
                <div class="commercial-helpIcon" aria-hidden="true">
                    <!-- Building icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-blend-icon lucide-blend">
                        <circle cx="9" cy="9" r="7" />
                        <circle cx="15" cy="15" r="7" />
                    </svg>
                </div>
                <div class="commercial-helpContent">
                    <h3>Integrated Mixed-Use Spaces</h3>
                    <p>
                        Multi-purpose developments combining office, retail, and lifestyle amenities for a complete business environment.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- We help you end -->

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
                    1. What types of commercial properties do you offer?
                    <span class="rent-faq__icon" aria-hidden="true"></span>
                </button>
                <div class="rent-faq__a" role="region">
                    <div class="rent-faq__aInner">
                        We offer a wide range of commercial spaces including offices, retail shops, warehouses, showrooms, and mixed-use properties across prime business locations.
                    </div>
                </div>
            </div>

            <div class="rent-faq">
                <button class="rent-faq__q" type="button" aria-expanded="false">
                    2. Can you help me find a property based on my business needs?
                    <span class="rent-faq__icon" aria-hidden="true"></span>
                </button>
                <div class="rent-faq__a" role="region">
                    <div class="rent-faq__aInner">
                        Yes. We shortlist properties based on your budget, size, location, and operational requirements to ensure the best fit for your business.
                    </div>
                </div>
            </div>

            <div class="rent-faq">
                <button class="rent-faq__q" type="button" aria-expanded="false">
                    3. Are all listings verified?
                    <span class="rent-faq__icon" aria-hidden="true"></span>
                </button>
                <div class="rent-faq__a" role="region">
                    <div class="rent-faq__aInner">
                        All our commercial listings are verified for accuracy, availability, and quality to provide reliable and up-to-date information.
                    </div>
                </div>
            </div>
            <div class="rent-faq">
                <button class="rent-faq__q" type="button" aria-expanded="false">
                    4. Do you assist with property viewings and negotiations?
                    <span class="rent-faq__icon" aria-hidden="true"></span>
                </button>
                <div class="rent-faq__a" role="region">
                    <div class="rent-faq__aInner">
                        Yes. We coordinate property viewings, support negotiations, and guide you through the leasing or purchasing process from start to finish.
                    </div>
                </div>
            </div>

            <div class="rent-faq">
                <button class="rent-faq__q" type="button" aria-expanded="false">
                    5. Can I request multiple property options at once?
                    <span class="rent-faq__icon" aria-hidden="true"></span>
                </button>
                <div class="rent-faq__a" role="region">
                    <div class="rent-faq__aInner">
                        Absolutely. After you submit your requirements, we provide a curated list of suitable commercial properties for comparison.
                    </div>
                </div>
            </div>

            <div class="rent-faq">
                <button class="rent-faq__q" type="button" aria-expanded="false">
                    6. Do you offer off-plan or new commercial projects?
                    <span class="rent-faq__icon" aria-hidden="true"></span>
                </button>
                <div class="rent-faq__a" role="region">
                    <div class="rent-faq__aInner">
                        Yes. We provide access to off-plan and upcoming commercial developments, including project details, payment plans, and availability.
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
