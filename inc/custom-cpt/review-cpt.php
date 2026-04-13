<?php
function review_cpt_area() {
    function register_review_cpt() {

        $labels = array(
            'name'               => __('Review'),
            'singular_name'      => __('Review'),
            'add_new'            => __('Add New Review'),
            'add_new_item'       => __('Add New Review'),
            'edit_item'          => __('Edit Review'),
            'new_item'           => __('New Review'),
            'all_items'          => __('All review'),
            'view_item'          => __('View Review'),
            'search_items'       => __('Search review'),
            'featured_image'     => ' Featured Image',
            'set_featured_image' => 'review Image'
        );

        $args = array(
            'labels'            => $labels,
            'description'       => 'Holds our review post specific data',
            'public'            => true, 
            'menu_position'     => 5,
            'supports'          => array('title', 'editor', 'thumbnail'),
            'has_archive'       => true, 
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'query_var'         => true,
            // 'rewrite'           => array('slug' => 'review'), // Custom slug for URLs
            'menu_icon'         => 'dashicons-format-status', // Icon for the post type menu (uncomment if needed)
        );

        register_post_type('review', $args);
    }
    add_action('init', 'register_review_cpt');
}

review_cpt_area();


// meta field added 
function review_extra_meta(){
    add_action('add_meta_boxes', function () {
    add_meta_box(
        'review_meta', //id
        'review Data', //label
        'review_meta_callback', //calback
        'review' //cpt
    );
    });

    function review_meta_callback($post) {
    $date_publish = get_post_meta($post->ID, 'date_publish', true);
    ?>
    <p><input type="date" name="date_publish" value="<?php echo esc_attr($date_publish); ?>" placeholder="Time ago"></p>
    <?php
    }

    add_action('save_post', function ($post_id) {
    if (isset($_POST['date_publish'])) update_post_meta($post_id, 'date_publish', sanitize_text_field($_POST['date_publish']));
    });

}
review_extra_meta();


// shortcode 

