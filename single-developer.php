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
                <?php
                $project = get_post_meta($post->ID, 'project', true);
                $found_in = get_post_meta($post->ID, 'found_in', true);
                $price_from = get_post_meta($post->ID, 'price_from', true);
                ?>
                <div>
                    <?php if(!empty($project)) : ?>
                    <p class="new_projects_area_sub">
                    Projects: <?php echo esc_html($project); ?>
                    </p>
                    <?php endif; ?>
                    <?php if(!empty($found_in)) : ?>
                    <p class="new_projects_area_sub">
                        Found In: <?php echo esc_html($found_in); ?>
                    </p>
                    <?php endif; ?>

                    <?php if(!empty($price_from)) : ?>
                    <p class="new_projects_area_sub">
                        Price From: $<?php echo esc_html($price_from); ?>
                    </p>
                    <?php endif; ?>

                </div>
                

                <div class="new_projects_area_actions">
                    <a class="new_projects_area_btn new_projects_area_btn_primary" href="<?php echo esc_url(home_url('/')); ?>">
                        Find Property
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>

                </div>
            </div>
            <?php
            $img_id = (int) get_post_meta(get_the_ID(), '_dev_img_id', true);
            
            ?>
            <div class="new_projects_area_right" style="background-image:url('<?php if ($img_id) echo wp_get_attachment_image_url($img_id, 'large');; ?>'); 
            background-size:cover;background-position:center;background-repeat:no-repeat;" aria-label="Area image"></div>

        </div>
    </div>
</section>
<!-- hero area end -->

<!-- about area start -->
<section class="area_single_section">
    <div class="area_single_container">

        <?php if (!empty(get_the_title())): ?>
            <div class="area_single_header">
                <span class="area_single_label">Community Overview</span>
                <h2 class="area_single_title">About <?php the_title(); ?></h2>
            </div>
        <?php endif; ?>

        
            <div class="area_single_content">
                <?php if(!empty(the_content())) : ?>
                    <p>
                        <?php the_content(); ?>
                    </p>
                <?php endif; ?>
            </div>
        

    </div>
</section>
<!-- about area end -->

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

<!-- form start -->
 <section class="container">
    <?php echo do_shortcode('[reaf_contact_form]'); ?>
</section>
<!-- form end -->


<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->
<?php get_footer();
