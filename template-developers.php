<?php
/*
 * Template Name: Template Developers
 */

/**
 *  Enqueue assets only for this template
 * IMPORTANT: Must be registered BEFORE get_header() so wp_head() can print them.
 */
add_action('wp_enqueue_scripts', function () {
    if (!is_page_template('template-developers.php')) return;

    wp_enqueue_style(
        'sbtech-developers',
        get_template_directory_uri() . '/assets/css/developers.css',
        [],
        '1.0.2'
    );

    wp_enqueue_script(
        'sbtech-developers',
        get_template_directory_uri() . '/assets/js/developers.js',
        [],
        '1.0.2',
        true
    );

    wp_localize_script('sbtech-developers', 'SBTECH_DEV', [
        'ajax'  => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('sbtech_developers_nonce'),
    ]);
}, 20);

get_header();

// Hero BG from Admin (Customizer)
$hero_bg = get_option('sbtech_developers_hero_bg');
if (!$hero_bg) {
    $hero_bg = get_template_directory_uri() . '/assets/img/dev-hero.jpg';
}

//  Title (later you can move to admin option)
$hero_title = 'Developers in Dubai';

// Get areas (terms)
$areas = get_terms([
    'taxonomy'   => 'developer_area',
    'hide_empty' => false,
]);

// Initial developers query
$developers = new WP_Query([
    'post_type'      => 'developer',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
]);
?>

<section class="dev-page">
    <!-- HERO -->
    <div class="dev-hero" style="background-image:url('<?php echo esc_url($hero_bg); ?>');">
        <div class="dev-hero__overlay"></div>

        <div class="dev-hero__inner">
            <h1 class="dev-hero__title"><?php echo esc_html($hero_title); ?></h1>

            <form id="sbtechDevelopersForm" class="filter-developers" method="POST" action="#">
                <div class="filter-developers__item filter-developers__item_name">
                    <input type="text" name="developer_name" id="developer_name"
                           autocomplete="off" placeholder="Search Developer Name" value="">
                    <div class="developer_name-result search-name-result" id="devNameSuggest"></div>
                </div>

                <div class="filter-developers__item filter-developers__item_select">
                    <div class="filter-developers__select-wrap">
                        <button type="button" class="filter-developers__select" id="devAreaToggle">
                            <span>Areas <span class="counter" id="devAreaCounter"></span></span>
                            <i class="dev-caret" aria-hidden="true"></i>
                        </button>

                        <div class="filter-developers__select-list" id="devAreaList">
                            <label class="label">
                                <input type="checkbox" name="developer_area[]" value="0" checked>
                                See all <span class="checkbox-icon"></span>
                            </label>

                            <?php if (!empty($areas) && !is_wp_error($areas)) : ?>
                                <?php foreach ($areas as $t) : ?>
                                    <label class="label">
                                        <input type="checkbox" name="developer_area[]" value="<?php echo (int) $t->term_id; ?>">
                                        <?php echo esc_html($t->name); ?> (<?php echo (int) $t->count; ?>)
                                        <span class="checkbox-icon"></span>
                                    </label>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="filter-developers__btn-wrap">
                    <button id="developers-search" class="filter-developers__btn" type="submit">Search</button>
                </div>
            </form>

        </div>
    </div>

    <!-- RESULTS -->
    <div class="dev-container">
        <div id="sbtechDevelopersResults">
            <?php if ($developers->have_posts()) : ?>
                <div class="developers-grid">
                    <?php while ($developers->have_posts()) : $developers->the_post(); ?>
                        <?php get_template_part('template-parts/developers/loop', 'developer'); ?>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <div class="developers-empty">No developers found.</div>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
