<?php

function property_management_reviews_function() {
    ob_start();
    $home_review_title = get_theme_mod( 'home_review_title', __('Reviews About Our Company', 'sbtech') );
    $home_review_desc = get_theme_mod( 'home_review_desc', __('Trusted feedback from real clients. Professional service. Clear communication.', 'sbtech') );
    ?>
    <section class="review_sec">
        <div class="review_container">

            <div class="review_head">
                <div>
                    <?php if (!empty($home_review_title)) : ?>
                    <h2 class="review_title"><?php echo esc_html($home_review_title); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($home_review_desc)) : ?>
                    <p class="review_sub"><?php echo esc_html($home_review_desc); ?></p>
                    <?php endif; ?>
                    
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
                    <?php

                    $q_achievements = new WP_Query([
                        'post_type'      => 'review',
                        'posts_per_page' => 10,
                        'post_status'    => 'publish',
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    ]);
                    
                    if ($q_achievements->have_posts()) :
                    while ($q_achievements->have_posts()) : $q_achievements->the_post();
                        
                    $date_publish = get_post_meta(get_the_ID(), 'date_publish', true);
                    ?>

                    <!-- Card start -->
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
                            <div class="review_time"><?php echo $date_publish; ?></div>
                        </div>
                        <p class="review_text"><?php the_content(); ?></p>
                        <div class="review_footer">
                            <div class="review_name"><?php the_title(); ?></div>
                            <div class="review_google"><span>G</span><span>o</span><span>o</span><span>g</span><span>l</span><span>e</span></div>
                        </div>
                    </article>

                    <!-- Card end -->
                    <?php
                    endwhile;
                    else :
                        echo 'No properties found.';
                    endif;
                    ?>
                    <?php wp_reset_postdata(); ?>

                    <!-- cards -->
                    
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('property_management_reviews', 'property_management_reviews_function');