<?php
function achievements_cpt_area() {
    function register_achievements_cpt() {

        $labels = array(
            'name'               => __('Achievements'),
            'singular_name'      => __('Achievement'),
            'add_new'            => __('Add New Achievement'),
            'add_new_item'       => __('Add New Achievement'),
            'edit_item'          => __('Edit Achievement'),
            'new_item'           => __('New Achievement'),
            'all_items'          => __('All Achievements'),
            'view_item'          => __('View Achievement'),
            'search_items'       => __('Search Achievements'),
            'featured_image'     => ' Featured Image',
            'set_featured_image' => 'Achievements Image'
        );

        $args = array(
            'labels'            => $labels,
            'description'       => 'Holds our achievements post specific data',
            'public'            => true, 
            'menu_position'     => 5,
            'supports'          => array('title', 'editor', 'thumbnail'),
            'has_archive'       => true, 
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'query_var'         => true,
            // 'rewrite'           => array('slug' => 'achievements'), // Custom slug for URLs
            'menu_icon'         => 'dashicons-awards', // Icon for the post type menu (uncomment if needed)
        );

        register_post_type('achievements', $args);
    }
    add_action('init', 'register_achievements_cpt');
}

achievements_cpt_area();

// meta field added 
function achievements_extra_meta(){
    add_action('add_meta_boxes', function () {
    add_meta_box(
        'achievements_meta', //id
        'achievements Data', //label
        'achievements_meta_callback', //calback
        'achievements' //cpt
    );
    });

    function achievements_meta_callback($post) {
    $award = get_post_meta($post->ID, 'award', true);
    ?>
    <p><input type="text" name="award" value="<?php echo esc_attr($award); ?>" placeholder="Award Place"></p>
    <?php
    }

    add_action('save_post', function ($post_id) {
    if (isset($_POST['award'])) update_post_meta($post_id, 'award', sanitize_text_field($_POST['award']));
    });

}
achievements_extra_meta();