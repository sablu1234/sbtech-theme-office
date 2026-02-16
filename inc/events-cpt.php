<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/**
 * Register CPT: Event
 * Slug: event
 */
add_action('init', function () {

    $labels = [
        'name'               => __('Events', 'sbtech'),
        'singular_name'      => __('Event', 'sbtech'),
        'menu_name'          => __('Events', 'sbtech'),
        'name_admin_bar'     => __('Event', 'sbtech'),
        'add_new'            => __('Add New', 'sbtech'),
        'add_new_item'       => __('Add New Event', 'sbtech'),
        'new_item'           => __('New Event', 'sbtech'),
        'edit_item'          => __('Edit Event', 'sbtech'),
        'view_item'          => __('View Event', 'sbtech'),
        'all_items'          => __('All Events', 'sbtech'),
        'search_items'       => __('Search Events', 'sbtech'),
        'not_found'          => __('No events found.', 'sbtech'),
        'not_found_in_trash' => __('No events found in Trash.', 'sbtech'),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false, // page template will be used for listing
        'show_in_rest'       => true,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite'            => ['slug' => 'event'],
    ];

    register_post_type('event', $args);
});
