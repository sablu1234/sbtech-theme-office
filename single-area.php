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
                    Properties for Sale<br>in Dubai Marina
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


<?php get_footer();
