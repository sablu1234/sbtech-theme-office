<?php
if (!defined('ABSPATH')) exit;

/**
 * ✅ Developer name suggestions
 * Support BOTH:
 * - action: sbtech_developer_suggest
 * - action: sbtech_developer_name_suggest
 * Support BOTH payload keys:
 * - keyword
 * - q
 */
add_action('wp_ajax_sbtech_developer_suggest', 'sbtech_developer_suggest');
add_action('wp_ajax_nopriv_sbtech_developer_suggest', 'sbtech_developer_suggest');

add_action('wp_ajax_sbtech_developer_name_suggest', 'sbtech_developer_suggest');
add_action('wp_ajax_nopriv_sbtech_developer_name_suggest', 'sbtech_developer_suggest');

function sbtech_developer_suggest() {
    $nonce = $_POST['nonce'] ?? '';
    if (!wp_verify_nonce($nonce, 'sbtech_developers_nonce')) {
        wp_send_json_error(['message' => 'Invalid nonce'], 403);
    }

    // accept both
    $keyword = sanitize_text_field($_POST['keyword'] ?? ($_POST['q'] ?? ''));

    if (mb_strlen($keyword) < 1) {
        wp_send_json_success(['items' => []]);
    }

    $q = new WP_Query([
        'post_type'      => 'developer',
        'post_status'    => 'publish',
        'posts_per_page' => 10,
        's'              => $keyword,
        'fields'         => 'ids',
    ]);

    $items = [];
    if (!empty($q->posts)) {
        foreach ($q->posts as $id) {
            $items[] = [
                'id'    => $id,
                'title' => get_the_title($id),
                'url'   => get_permalink($id),
            ];
        }
    }

    wp_send_json_success(['items' => $items]);
}


/**
 * ✅ Filter developers
 * action: sbtech_filter_developers
 * Support BOTH:
 * - developer_area[] OR developer_area
 */
add_action('wp_ajax_sbtech_filter_developers', 'sbtech_filter_developers');
add_action('wp_ajax_nopriv_sbtech_filter_developers', 'sbtech_filter_developers');

function sbtech_filter_developers() {
    $nonce = $_POST['nonce'] ?? '';
    if (!wp_verify_nonce($nonce, 'sbtech_developers_nonce')) {
        wp_send_json_error(['message' => 'Invalid nonce'], 403);
    }

    $name  = sanitize_text_field($_POST['developer_name'] ?? '');

    // accept both formats
    $areas = $_POST['developer_area'] ?? ($_POST['developer_area'] ?? []);
    if (!is_array($areas)) $areas = [];

    $area_ids = [];
    foreach ($areas as $a) {
        $a = (int) $a;
        if ($a > 0) $area_ids[] = $a;
    }

    $args = [
        'post_type'      => 'developer',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        's'              => $name,
    ];

    if (!empty($area_ids)) {
        $args['tax_query'] = [[
            'taxonomy' => 'developer_area',
            'field'    => 'term_id',
            'terms'    => $area_ids,
        ]];
    }

    $q = new WP_Query($args);

    ob_start();
    if ($q->have_posts()) {
        echo '<div class="developers-grid">';
        while ($q->have_posts()) {
            $q->the_post();
            get_template_part('template-parts/developers/loop', 'developer');
        }
        echo '</div>';
    } else {
        echo '<div class="developers-empty">No developers found.</div>';
    }
    wp_reset_postdata();

    wp_send_json_success([
        'html' => ob_get_clean(),
    ]);
}
