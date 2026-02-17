<?php

function add_theme_scripts() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '5.2.3', 'all');
    // blog-page-filter-css
    wp_enqueue_style('blog-loop-style', get_stylesheet_directory_uri() . '/assets/css/blog-loop.css', [], '1.0');
    wp_enqueue_style('my-custom-main', get_template_directory_uri() . '/assets/css/my-custom-main.css', array(), '1.0.0', 'all');
    wp_enqueue_style('property-single', get_template_directory_uri() . '/assets/css/property-single.css', array(), '1.0.0', 'all');
    wp_enqueue_style('page-sell', get_template_directory_uri() . '/assets/css/page-sell.css', array(), '1.0.0', 'all');
    wp_enqueue_style('page-rent', get_template_directory_uri() . '/assets/css/page-rent.css', array(), '1.0.0', 'all');
    wp_enqueue_style('page-commercial', get_template_directory_uri() . '/assets/css/page-commercial.css', array(), '1.0.0', 'all');
    wp_enqueue_style('page-new-projects', get_template_directory_uri() . '/assets/css/page-new-projects.css', array(), '1.0.0', 'all');
    wp_enqueue_style('page-areas', get_template_directory_uri() . '/assets/css/page-areas.css', array(), '1.0.0', 'all');
    wp_enqueue_style('area-single', get_template_directory_uri() . '/assets/css/area-single.css', array(), '1.0.0', 'all');
    wp_enqueue_style('page-about', get_template_directory_uri() . '/assets/css/page-about.css', array(), '1.0.0', 'all');
    wp_enqueue_style('page-media', get_template_directory_uri() . '/assets/css/page-media.css', array(), '1.0.0', 'all');
    wp_enqueue_style('main-single', get_template_directory_uri() . '/assets/css/main-single.css', array(), '1.0.0', 'all');
    wp_enqueue_style('page-careers', get_template_directory_uri() . '/assets/css/page-careers.css', array(), '1.0.0', 'all');

    wp_enqueue_style('style', get_stylesheet_uri());




    wp_enqueue_script('property-single-js', get_template_directory_uri() . '/assets/js/property-single.js', array('jquery'), "1.0.1", true);
    wp_enqueue_script('sbtech-main-now', get_template_directory_uri() . '/assets/js/sbtech-main-now.js', array('jquery'), "1.0.1", true);
    wp_enqueue_script('page-sell-js', get_template_directory_uri() . '/assets/js/page-sell-js.js', array('jquery'), "1.0.1", true);
    wp_enqueue_script('page-rent-js', get_template_directory_uri() . '/assets/js/page-rent-js.js', array('jquery'), "1.0.1", true);
    wp_enqueue_script('page-commercial-js', get_template_directory_uri() . '/assets/js/page-commercial-js.js', array('jquery'), "1.0.1", true);
    wp_enqueue_script('page-new-projects-js', get_template_directory_uri() . '/assets/js/page-new-projects-js.js', array('jquery'), "1.0.1", true);
    wp_enqueue_script('single-areas-js', get_template_directory_uri() . '/assets/js/single-areas-js.js', array('jquery'), "1.0.1", true);
    wp_enqueue_script('page-about-js', get_template_directory_uri() . '/assets/js/page-about-js.js', array('jquery'), "1.0.1", true);
    wp_enqueue_script('page-careers-js', get_template_directory_uri() . '/assets/js/page-careers-js.js', array('jquery'), "1.0.1", true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');
