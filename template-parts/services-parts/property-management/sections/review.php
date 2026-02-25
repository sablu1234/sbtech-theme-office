<?php

function property_management_reviews_function() {
    ob_start();
    ?>
    <section class="review_sec">
        <div class="review_container">

            <div class="review_head">
                <div>
                    <h2 class="review_title">Reviews About Our Company</h2>
                    <p class="review_sub">Trusted feedback from real clients. Professional service. Clear communication.</p>
                </div>

                <div class="review_controls">
                    <button class="review_btn" id="prevBtn" aria-label="Previous">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M15 18l-6-6 6-6" />
                        </svg>
                    </button>
                    <button class="review_btn" id="nextBtn" aria-label="Next">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 18l6-6-6-6" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="review_viewport" id="viewport">
                <div class="review_track" id="track">

                    <!-- cards -->
                    <article class="review_card">
                        <div class="review_top">
                            <div class="review_rating">
                                <div class="review_score">5</div>
                                <div class="review_stars">
                                    <svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg>
                                    <svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg>
                                    <svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg>
                                    <svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg>
                                    <svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="review_time">2 months ago</div>
                        </div>
                        <p class="review_text">I had a superb experience. The team was quick, efficient, responsive and professional. They guided me through every step and made the process smooth.</p>
                        <div class="review_footer">
                            <div class="review_name">Kenneth Whitelaw-Jones</div>
                            <div class="review_google"><span>G</span><span>o</span><span>o</span><span>g</span><span>l</span><span>e</span></div>
                        </div>
                    </article>

                    <article class="review_card">
                        <div class="review_top">
                            <div class="review_rating">
                                <div class="review_score">5</div>
                                <div class="review_stars">
                                    <svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg><svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg><svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg><svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg><svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="review_time">3 weeks ago</div>
                        </div>
                        <p class="review_text">Excellent support throughout the process. Professional, patient, and clear communication. Everything was handled carefully and on time.</p>
                        <div class="review_footer">
                            <div class="review_name">Neda Motamedi</div>
                            <div class="review_google"><span>G</span><span>o</span><span>o</span><span>g</span><span>l</span><span>e</span></div>
                        </div>
                    </article>

                    <article class="review_card">
                        <div class="review_top">
                            <div class="review_rating">
                                <div class="review_score">5</div>
                                <div class="review_stars">
                                    <svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg><svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg><svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg><svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg><svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="review_time">3 weeks ago</div>
                        </div>
                        <p class="review_text">Truly excellent experience. Step-by-step guidance and trustworthy support. Highly recommended for anyone looking for quality service.</p>
                        <div class="review_footer">
                            <div class="review_name">Parmiss Hejazian</div>
                            <div class="review_google"><span>G</span><span>o</span><span>o</span><span>g</span><span>l</span><span>e</span></div>
                        </div>
                    </article>

                    <!-- duplicate some cards so loop looks obvious -->
                    <article class="review_card">
                        <div class="review_top">
                            <div class="review_rating">
                                <div class="review_score">5</div>
                                <div class="review_stars">
                                    <svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg><svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg><svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg><svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg><svg viewBox="0 0 20 20">
                                        <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="review_time">1 month ago</div>
                        </div>
                        <p class="review_text">Very professional team. Quick updates, clear answers, and the entire experience was smooth. Would definitely work with them again.</p>
                        <div class="review_footer">
                            <div class="review_name">Aisha M.</div>
                            <div class="review_google"><span>G</span><span>o</span><span>o</span><span>g</span><span>l</span><span>e</span></div>
                        </div>
                    </article>

                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('property_management_reviews', 'property_management_reviews_function');