<?php

// Enqueue CSS/JS from assets/css and assets/js
add_action('wp_enqueue_scripts', function () {
});

// AJAX handlers (logged-in + public)
add_action('wp_ajax_filter_blog_posts', 'filter_blog_posts_callback');
add_action('wp_ajax_nopriv_filter_blog_posts', 'filter_blog_posts_callback');

function filter_blog_posts_callback() {
    check_ajax_referer('blog_filter_nonce', 'nonce');

    $cat  = isset($_POST['cat']) ? sanitize_text_field($_POST['cat']) : 'all';
    $page = isset($_POST['page']) ? absint($_POST['page']) : 1;
    $s    = isset($_POST['s']) ? sanitize_text_field($_POST['s']) : '';

    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 6,
        'paged'          => $page,
        's'              => $s,
    ];

    if ($cat !== 'all') {
        $args['tax_query'] = [[
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $cat,
        ]];
    }

    $q = new WP_Query($args);

    ob_start();
    if ($q->have_posts()) :
        while ($q->have_posts()) : $q->the_post(); ?>
            <article class="blCard">
                <a class="blCard__img" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium_large'); ?>
                    <?php else : ?>
                        <span class="blCard__ph">No Image</span>
                    <?php endif; ?>
                </a>

                <div class="blCard__body">
                    <div class="blCard__meta">
                        <span class="blTag"><?php echo wp_kses_post(get_the_category_list(', ')); ?></span>
                        <span class="blDate"><?php echo esc_html(get_the_date()); ?></span>
                    </div>

                    <h3 class="blCard__title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>

                    <p class="blCard__ex"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18)); ?></p>

                    <a class="blCard__read" href="<?php the_permalink(); ?>">
                        Read More <span aria-hidden="true">→</span>
                    </a>
                </div>
            </article>
<?php endwhile;
    else :
        echo '<div class="blEmpty">No posts found.</div>';
    endif;

    wp_reset_postdata();
    $html = ob_get_clean();

    wp_send_json_success([
        'html'      => $html,
        'max_pages' => (int) $q->max_num_pages,
        'current'   => (int) $page,
    ]);
}
