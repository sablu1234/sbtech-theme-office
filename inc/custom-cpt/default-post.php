<?php

add_action( 'init', 'default_post_featured_image_labels', 20 );

function default_post_featured_image_labels() {
    global $wp_post_types;

    if ( ! isset( $wp_post_types['post'] ) ) {
        return;
    }

    $labels = $wp_post_types['post']->labels;

    $labels->featured_image        = 'Poster(size: 532x420)';
    $labels->set_featured_image    = 'Set Poster(size: 532x420)';
    $labels->remove_featured_image = 'Remove Poster';
    $labels->use_featured_image    = 'Use as Poster';
}