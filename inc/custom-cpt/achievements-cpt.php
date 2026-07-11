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
            'featured_image'     => ' Featured Image(Size: 300x300px)',
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
            'menu_icon'         => 'dashicons-awards',
        );

        register_post_type('achievements', $args);
    }
    add_action('init', 'register_achievements_cpt');
}

achievements_cpt_area();


// Title and Description character limit
add_action('admin_footer', function () {
    global $post_type;

    if ($post_type !== 'achievements') {
        return;
    }
    ?>
    <script>
        jQuery(document).ready(function ($) {

            // Title max 20 characters
            $('#title').attr('maxlength', 20);

            // Description/editor max 30 characters
            $('#content').attr('maxlength', 30);

            $('#title').on('input', function () {
                if ($(this).val().length > 20) {
                    $(this).val($(this).val().substring(0, 20));
                }
            });

            $('#title').after('<p style="color:#666;">Max 30 characters allowed</p>');
            $('#content').after('<p style="color:#666;">Max 60 characters allowed</p>');

            $('#content').on('input', function () {
                if ($(this).val().length > 30) {
                    $(this).val($(this).val().substring(0, 30));
                }
            });

        });
    </script>
    <?php
});


// meta field added 
function achievements_extra_meta(){
    add_action('add_meta_boxes', function () {
        add_meta_box(
            'achievements_meta',
            'achievements Data',
            'achievements_meta_callback',
            'achievements'
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