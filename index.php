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
                                        <small>Listing by</small><br>
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

<!-- Property for sale start -->
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
                                        <small>Listing by</small><br>
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
<!-- Property for sale end -->




<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->


<?php get_footer();
