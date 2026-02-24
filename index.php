<?php get_header(); ?>


<section class="container">
    <?php echo do_shortcode('[porpertypi_ajax_filter_dynamic_index]'); ?>
</section>

<!-- Property for sale start -->
<section class="np-wrap np-sec">
    <div class="np-container">

        <div class="np-head">
            <h2 class="np-title">Properties for Sale</h2>
            <div class="np-nav">
                <button class="np-btn" id="npPrev">‹</button>
                <button class="np-btn" id="npNext">›</button>
            </div>
        </div>

        <div class="np-slider">
            <div class="np-track" id="npTrack">
                <!-- loop wp for new-projects -->
                <?php
                $area_id = get_the_ID();

                $q_new_projects = new WP_Query([
                    'post_type'      => 'porpertypi',
                    'posts_per_page' => 10,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',

                    'meta_query' => [
                        [
                            'key'     => 'pp_purpose', // meta field নাম
                            'value'   => 'Buy',
                            'compare' => '='
                        ]
                    ]
                ]);
                ?>
                <!-- Card -->
                <?php
                $purpose = get_post_meta(get_the_ID(), 'pp_purpose', true);
                $status = get_post_meta(get_the_ID(), 'pp_status', true);
                $price = get_post_meta(get_the_ID(), '_re_price', true);
                $beds = get_post_meta(get_the_ID(), '_re_beds', true);
                $baths = get_post_meta(get_the_ID(), '_re_baths', true);
                $size = get_post_meta(get_the_ID(), '_re_size_sqft', true);
                $location = get_post_meta(get_the_ID(), 'pp_address', true);
                if ($q_new_projects->have_posts()) :
                    while ($q_new_projects->have_posts()) : $q_new_projects->the_post();
                ?>
                        <div class="np-card">
                            <div class="np-img bg-cover" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>);">
                                <div class="np-badges">
                                    <?php if (!empty($status)) :  ?>
                                        <span class="np-badge primary"><?php echo $status; ?></span>
                                    <?php endif; ?>

                                    <?php if (!empty($purpose)) :  ?>
                                        <span class="np-badge"><?php echo $purpose; ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="np-body">
                                <div class="np-price"><?php echo $price; ?> AED</div>
                                <div class="np-specs"><?php echo $baths; ?> Bath • <?php echo $size; ?> ft²</div>
                                <div class="np-name"><?php the_title(); ?></div>
                                <div class="np-loc"><?php echo $location; ?></div>
                                <div class="np-agent">
                                    <div class="np-avatar"><?php echo get_avatar(get_the_author_meta('ID')); ?></div>
                                    <div>

                                        <strong><?php echo get_the_author_meta('display_name', get_the_author_meta("ID")); ?></strong>
                                    </div>
                                </div>
                                <div class="np-cta"><button><a href="<?php the_permalink(); ?>">Enquire Now</a></button></div>
                            </div>
                        </div>
                <?php
                    endwhile;
                else :
                    echo 'No properties found.';
                endif;
                ?>



                <?php wp_reset_postdata(); ?>
            </div>
        </div>

    </div>
</section>
<!-- Property for sale end -->

<!-- Property for Commercial start -->
<style>
    :root {
        --sale-primary: #02B2EE;
        --sale-text: #0b0f14;
        --sale-muted: #6b7280;
        --sale-border: #e5e7eb;
        --sale-radius: 18px;
    }

    /* container */
    .sale-wrap {
        background: #fff;
        padding: 30px 0;
    }

    .sale-container {
        max-width: 1200px;
        margin: auto;
        padding: 0 16px;
    }

    /* header */
    .sale-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
    }

    .sale-nav {
        display: flex;
        gap: 10px;
    }

    .sale-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px solid var(--sale-border);
        background: #fff;
        cursor: pointer;
    }

    /* slider */
    .sale-slider {
        overflow: hidden;
    }

    .sale-track {
        display: flex;
        gap: 18px;
        transition: transform .35s ease;
    }

    /* card */
    .sale-card {
        flex: 0 0 calc((100% - 36px)/3);
        min-width: 300px;
        background: #fff;
        border: 1px solid var(--sale-border);
        border-radius: var(--sale-radius);
        overflow: hidden;
    }

    /* image */
    .sale-img {
        height: 260px;
        background-size: cover;
        background-position: center;
    }

    /* body */
    .sale-body {
        padding: 16px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .sale-price {
        color: var(--clr-primary);
        font-weight: 600;
        font-size: 18px;
    }

    .sale-specs {
        font-size: 13px;
        font-weight: 600;
        color: var(--clr-black);
    }

    .sale-name {
        font-weight: 600;
        font-size: 15px;
    }

    .sale-loc {
        font-size: 13px;
        color: var(--sale-muted);
    }

    /* agent */
    .sale-agent {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 6px;
    }

    .sale-avatar img {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        object-fit: cover;
    }

    /* CTA */
    .sale-cta {
        margin-top: auto;
    }

    a.sale-btn-main:hover {
        color: var(--clr-white);
    }

    .sale-btn-main {
        display: block;
        width: 100%;
        text-align: center;
        background: var(--clr-primary);
        color: #fff;
        padding: 13px;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
    }

    /* responsive */
    @media(max-width:980px) {
        .sale-card {
            flex-basis: calc((100% - 18px)/2);
        }
    }

    @media(max-width:620px) {
        .sale-card {
            flex-basis: 100%;
            min-width: 100%;
        }

        .sale-img {
            height: 220px;
        }
    }
</style>
<section class="sale-wrap">
    <div class="sale-container">

        <div class="sale-head">
            <h2 class="sale-title">Properties for Commercial</h2>
            <div class="sale-nav">
                <button class="sale-btn" id="salePrev">‹</button>
                <button class="sale-btn" id="saleNext">›</button>
            </div>
        </div>

        <div class="sale-slider">
            <div class="sale-track" id="saleTrack">

                <?php
                $q_sale = new WP_Query([
                    'post_type'      => 'porpertypi',
                    'posts_per_page' => 10,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'meta_query' => [
                        [
                            'key'   => 'pp_purpose',
                            'value' => 'Buy',
                            'compare' => '='
                        ]
                    ]
                ]);

                if ($q_sale->have_posts()):
                    while ($q_sale->have_posts()): $q_sale->the_post();

                        $post_id = get_the_ID();

                        $price    = get_post_meta($post_id, '_re_price', true);
                        $beds     = get_post_meta($post_id, '_re_beds', true);
                        $baths    = get_post_meta($post_id, '_re_baths', true);
                        $size     = get_post_meta($post_id, '_re_size_sqft', true);
                        $location = get_post_meta($post_id, 'pp_address', true);

                        $thumb = get_the_post_thumbnail_url($post_id, 'large');
                        if (!$thumb) {
                            $thumb = get_template_directory_uri() . '/assets/img/placeholder.jpg';
                        }

                        $author_id = get_post_field('post_author', $post_id);
                ?>

                        <div class="sale-card">

                            <div class="sale-img" style="background-image:url('<?php echo esc_url($thumb); ?>');"></div>

                            <div class="sale-body">

                                <div class="sale-price"><?php echo esc_html($price); ?> AED</div>

                                <div class="sale-specs">
                                    <?php
                                    $specs = [];
                                    $specs[] = $beds . ' Beds';
                                    $specs[] = $baths . ' Bath';
                                    $specs[] = $size . ' ft²';
                                    echo esc_html(implode(' • ', $specs));
                                    ?>
                                </div>

                                <div class="sale-name"><?php the_title(); ?></div>

                                <div class="sale-loc"><?php echo esc_html($location); ?></div>

                                <div class="sale-agent">
                                    <div class="sale-avatar"><?php echo get_avatar($author_id, 80); ?></div>
                                    <div>
                                        <!-- <small>Listing by</small><br> -->
                                        <strong><?php echo esc_html(get_the_author_meta('display_name', $author_id)); ?></strong>
                                    </div>
                                </div>

                                <div class="sale-cta">
                                    <a class="sale-btn-main" href="<?php the_permalink(); ?>">Enquire Now</a>
                                </div>

                            </div>
                        </div>

                <?php endwhile;
                else: echo '<p>No properties found.</p>';
                endif;
                wp_reset_postdata(); ?>

            </div>
        </div>

    </div>
</section>
<script>
    (function() {

        const track = document.getElementById("saleTrack");
        const prev = document.getElementById("salePrev");
        const next = document.getElementById("saleNext");

        if (!track) return;

        let index = 0;

        function update() {
            const card = track.querySelector(".sale-card");
            if (!card) return;
            const gap = 18;
            const width = card.offsetWidth + gap;
            track.style.transform = `translateX(${-index*width}px)`;
        }

        next.onclick = function() {
            const cards = track.children.length;
            if (index < cards - 1) index++;
            update();
        };

        prev.onclick = function() {
            if (index > 0) index--;
            update();
        };

        window.addEventListener("resize", update);
        update();

    })();
</script>
<!-- Property for Commercial end -->

<!-- Popular Area in Dubai start -->
<section class="popular_area_section">
    <div class="popular_area_container">

        <div class="popular_area_header">
            <h2 class="popular_area_title">Popular Areas in Dubai</h2>

            <!-- Desktop button -->
            <a class="popular_area_btn popular_area_btn_desktop" href="#">
                Show All Areas <span class="popular_area_btn_icon" aria-hidden="true">→</span>
            </a>
        </div>

        <div class="popular_area_wrap">
            <!-- ✅ LOOP CARD (repeat this block in WP loop) -->
            <?php
            // current cpt "area"
            $query = new WP_Query([
                'post_type' => 'area',
                'posts_per_page' => 6,
                'post_status' => 'publish',
                'orderby'        => 'rand'
            ]);


            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();

                    $price_start = get_post_meta(get_the_ID(), 'price_start', true);

            ?>

                    <a class="popular_area_card" href="<?php the_permalink(); ?>">
                        <div class="popular_area_media">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>">
                        </div>
                        <div class="popular_area_overlay"></div>
                        <div class="popular_area_badge">Featured</div>
                        <div class="popular_area_content">
                            <?php if (the_title()) : ?>
                                <h3 class="popular_area_name"><?php the_title(); ?></h3>
                            <?php endif; ?>
                            <?php if (!empty($price_start)) : ?>
                                <p class="popular_area_price">Price from <strong><?php echo esc_html($price_start); ?> AED</strong></p>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php
                endwhile;
                wp_reset_postdata();
            else : ?>

                <div class="popular_area_no_post">
                    <h5>No Areas Found</h5>
                </div>

            <?php endif; ?>
        </div>

        <!-- Mobile button -->
        <div class="popular_area_btn_mobile_wrap">
            <a class="popular_area_btn popular_area_btn_mobile" href="#">
                Show All Areas <span class="popular_area_btn_icon" aria-hidden="true">→</span>
            </a>
        </div>

    </div>
</section>
<!-- Popular Area in Dubai end -->

<!-- About us start -->
<section class="about_stats_section">
    <div class="about_stats_container">

        <!-- HEADER -->
        <div class="about_stats_header">
            <div>
                <h2 class="about_stats_title">About Us</h2>
                <p class="about_stats_desc">
                    Established to serve modern buyers, sellers, and investors, our real estate team delivers premium support,
                    market expertise, and a smooth property journey—from first enquiry to final handover.
                    We focus on trust, performance, and long-term relationships.
                </p>
            </div>
        </div>

        <!-- STATS GRID -->
        <div class="about_stats_grid">

            <!-- Card 1 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">120,000</span>+ customers</h3>
                <p class="about_stats_note">Trusted by clients across the UAE for buying, selling, and renting.</p>
            </div>

            <!-- Card 2 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M3 21h18" />
                        <path d="M5 21V7l7-4 7 4v14" />
                        <path d="M9 21v-6h6v6" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">6,000</span>+ properties</h3>
                <p class="about_stats_note">Sold, rented, and leased through our network and trusted partners.</p>
            </div>

            <!-- Card 3 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5Z" />
                        <path d="M19 21a7 7 0 0 0-14 0" />
                        <path d="M16 6h5" />
                        <path d="M18.5 3.5v5" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">250</span>+ top agents</h3>
                <p class="about_stats_note">Specialists across prime communities, off-plan, and investment deals.</p>
            </div>

            <!-- Card 4 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M8 2v4" />
                        <path d="M16 2v4" />
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <path d="M3 10h18" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">15</span>+ years</h3>
                <p class="about_stats_note">A proven track record of performance and client satisfaction.</p>
            </div>

            <!-- Card 5 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M12 21s7-4.35 7-11a7 7 0 0 0-14 0c0 6.65 7 11 7 11Z" />
                        <path d="M12 10a2.5 2.5 0 1 0-2.5-2.5A2.5 2.5 0 0 0 12 10Z" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">AED 11B</span> volume</h3>
                <p class="about_stats_note">Total real estate volume achieved through strong market reach.</p>
            </div>

            <!-- Card 6 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M21 12a9 9 0 1 1-9-9" />
                        <path d="M22 2 12 12" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">40</span>+ languages</h3>
                <p class="about_stats_note">A diverse team built to support local and international clients.</p>
            </div>

            <!-- Card 7 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M3 21h18" />
                        <path d="M7 21V5h10v16" />
                        <path d="M9 9h2" />
                        <path d="M13 9h2" />
                        <path d="M9 13h2" />
                        <path d="M13 13h2" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">18</span> offices</h3>
                <p class="about_stats_note">Presence across key locations to serve clients efficiently.</p>
            </div>

            <!-- Card 8 -->
            <div class="about_stats_card">
                <div class="about_stats_icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <rect x="3" y="5" width="18" height="14" rx="2" />
                        <path d="M7 15h6" />
                        <path d="M16 15h2" />
                    </svg>
                </div>
                <h3 class="about_stats_value"><span class="hl">Top</span> selling partner</h3>
                <p class="about_stats_note">Strong partnerships with leading UAE developers and brands.</p>
            </div>

        </div>
    </div>
</section>
<!-- About us end -->

<!-- agets of the monthe start -->
<section class="agents_month_section">
    <div class="agents_month_container">

        <div class="agents_month_header">
            <div>
                <h2 class="agents_month_title">Agents of the Month</h2>
                <p class="agents_month_sub">
                    Meet our top-performing agents selected for outstanding results, client satisfaction, and market expertise.
                </p>
            </div>
        </div>

        <div class="agents_month_grid">
            <?php
            $agent_query = new WP_Query([
                'post_type' => 'agent',
                'posts_per_page' => 4,
                'post_status' => 'publish',
                'orderby' => 'rand'
            ]);
            while ($agent_query->have_posts()) : $agent_query->the_post(); ?>
                <a class="agent_card" href="<?php echo get_permalink(get_the_ID()); ?>">
                    <div class="agent_card_media">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="Agent">
                        <div class="agent_card_tag d-none">Top Performer</div>
                    </div>
                    <div class="agent_card_body">
                        <h3 class="agent_name"><?php echo get_the_title(); ?></h3>
                        <p class="agent_meta"><strong>Speaks:</strong>
                            <?php
                            $speaking_language = get_post_meta(get_the_ID(), 'agent_repeat_items', true);
                            if (is_array($speaking_language) && !empty($speaking_language)) {
                                foreach ($speaking_language as $item) {
                                    echo esc_html($item) . ', ';
                                }
                            }
                            ?>
                        </p>
                    </div>
                    <div class="agent_card_footer">
                        <span class="agent_btn">View Profile →</span>
                    </div>
                </a>
            <?php endwhile; ?>
        </div>

    </div>
</section>
<!-- agets of the monthe end -->

<!-- Media shortcode start -->
<section class="container">
    <?php echo do_shortcode('[media_loop_ajax]'); ?>
</section>
<!-- Media shortcode end -->

<!-- review about start -->
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
<!-- review about end -->



<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->


<?php get_footer();
