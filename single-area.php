<?php get_header(); ?>


<!-- hero area start  -->
<section class="new_projects_area_hero">
    <div class="new_projects_container">
        <div class="new_projects_area_banner">

            <div class="new_projects_area_left">
                <div class="new_projects_area_kicker">
                    <span class="new_projects_area_dot" aria-hidden="true"></span>
                    Featured Area
                </div>

                <h1 class="new_projects_area_title">
                    <?php the_title(); ?>
                </h1>

                <p class="new_projects_area_sub">
                    Clean, fast, and mobile-first layout. Filter listings, view details, and enquire in seconds.
                </p>

                <div class="new_projects_area_actions">
                    <a class="new_projects_area_btn new_projects_area_btn_primary" href="#">
                        Find Property
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>

                </div>
            </div>

            <div class="new_projects_area_right" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>'); 
            background-size:cover;background-position:center;background-repeat:no-repeat;" aria-label="Area image"></div>

        </div>
    </div>
</section>

<!-- hero area end -->


<!-- Office for sate start -->
<section class="np-wrap np-sec">
    <div class="np-container">

        <div class="np-head">
            <h2 class="np-title">Offices for Sale in Dubai</h2>
            <div class="np-nav">
                <button class="np-btn" id="npPrev">‹</button>
                <button class="np-btn" id="npNext">›</button>
            </div>
        </div>

        <div class="np-slider">
            <div class="np-track" id="npTrack">
                <!-- loop wp for new-projects -->
                <?php
                // current Area ID (single area page)
                $area_id = get_the_ID();

                $q_new_projects = new WP_Query([
                    'post_type'      => 'porpertypi',
                    'posts_per_page' => 10,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',

                    'meta_query' => [
                        [
                            'key'     => '_area_id',   // meta field
                            'value'   => $area_id,     // current area ID (numeric)
                            'compare' => '='
                        ]
                    ]
                ]);
                ?>

                <!-- Card -->
                <?php



                while ($q_new_projects->have_posts()) : $q_new_projects->the_post();

                    $purpose = get_post_meta(get_the_ID(), 'pp_purpose', true);
                    $status = get_post_meta(get_the_ID(), 'pp_status', true);
                    $price = get_post_meta(get_the_ID(), '_re_price', true);
                    $beds = get_post_meta(get_the_ID(), '_re_beds', true);
                    $baths = get_post_meta(get_the_ID(), '_re_baths', true);
                    $size = get_post_meta(get_the_ID(), '_re_size_sqft', true);
                    $location = get_post_meta(get_the_ID(), 'pp_address', true);


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
                                    <small>Listing by</small><br>
                                    <strong><?php echo get_the_author_meta('display_name', get_the_author_meta("ID")); ?></strong>
                                </div>
                            </div>
                            <div class="np-cta"><button><a href="<?php the_permalink(); ?>">Enquire Now</a></button></div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>

    </div>
</section>
<!-- Office for sate end -->

<?php get_footer();
