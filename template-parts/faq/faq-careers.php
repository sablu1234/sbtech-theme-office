<?php

function career_faq_shortcode_function() {
    ob_start();
    ?>
    <!-- Faq section start -->
    <section class="rent-faqs" aria-label="rent faq">
        <div class="rent-container">
            <div class="rent-faqs__head">
                <div>
                    <span class="rent-faqs__kicker">FAQ</span>
                    <h2 class="rent-faqs__title">Join Our Team & Build Your Future With Us</h2>
                    <p class="rent-faqs__sub">We are always looking for passionate, talented, and driven individuals who are ready to grow and make an impact. At our company, you’ll work in a dynamic environment where innovation, collaboration, and professional development are at the core of everything we do.</p>
                </div>
            </div>

            <div class="rent-faqs__wrap" id="rentFaq">
                <!-- Item -->
                <div class="rent-faq" data-open="true">
                    <button class="rent-faq__q" type="button" aria-expanded="true">
                        1. How can I apply for a job?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            You can apply directly through our careers page by submitting your resume and filling out the application form for the position that matches your skills.
                        </div>
                    </div>
                </div>

                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        2. What kind of roles do you offer?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                           We offer a wide range of roles across different departments including development, design, marketing, sales, and operations.
                        </div>
                    </div>
                </div>

                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                       3. Do you offer remote or flexible work options?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                          Yes, depending on the role, we offer flexible working arrangements including remote and hybrid opportunities.
                        </div>
                    </div>
                </div>
                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        4. What is your hiring process like?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            Our hiring process typically includes an initial screening, one or more interviews, and a final evaluation before making an offer.
                        </div>
                    </div>
                </div>

                <div class="rent-faq">
                    <button class="rent-faq__q" type="button" aria-expanded="false">
                        5. Do you provide training or career growth opportunities?
                        <span class="rent-faq__icon" aria-hidden="true"></span>
                    </button>
                    <div class="rent-faq__a" role="region">
                        <div class="rent-faq__aInner">
                            Absolutely. We believe in continuous learning and provide training programs, mentorship, and growth opportunities for all team members.
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Faq section end -->
    <?php
    return ob_get_clean();
}
add_shortcode('career_faq_shortcode', 'career_faq_shortcode_function');