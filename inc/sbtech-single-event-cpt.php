<?php
if (!defined('ABSPATH')) exit;

add_action('init', function () {

  $labels = [
    'name'               => 'Single Events',
    'singular_name'      => 'Single Event',
    'menu_name'          => 'Single Event',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Single Event',
    'edit_item'          => 'Edit Single Event',
    'new_item'           => 'New Single Event',
    'view_item'          => 'View Single Event',
    'search_items'       => 'Search Single Events',
    'not_found'          => 'No Single Events found',
    'not_found_in_trash' => 'No Single Events found in Trash',
  ];

  register_post_type('single_event', [
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => false,
    'show_in_rest'       => true,
    'menu_position'      => 6,


    'show_in_menu'       => 'edit.php?post_type=event',

    'supports'           => ['title', 'editor', 'thumbnail'],
    'rewrite'            => ['slug' => 'single-event'],
  ]);
});
