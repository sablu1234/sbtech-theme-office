<?php

function register_custom_post_press_media() {

    $labels = array(
        'name'               => __( 'Press Media' ),
        'singular_name'      => __( 'Press Media' ),
        'add_new'            => __( 'Add New Press Media' ),
        'add_new_item'       => __( 'Add New Press Media' ),
        'edit_item'          => __( 'Edit Press Media' ),
        'new_item'           => __( 'New Press Media' ),
        'all_items'          => __( 'All Press Media' ),
        'view_item'          => __( 'View Press Media' ),
        'search_items'       => __( 'Search Press Media' ),
        'featured_image'     => 'Press Media',
        // 'set_featured_image' => 'Feature Image'
    );

    $args = array(
        'labels'            => $labels,
        'description'       => 'Holds our Press Media post specific data',
        'public'            => true,
        'menu_position'     => 5,
        'supports'          => array( 'title', 'editor', 'thumbnail' ),
        'has_archive'       => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
		'menu_icon'         => 'dashicons-welcome-write-blog',
    );

	register_post_type('press-media', $args);
}
add_action('init', 'register_custom_post_press_media');


// meta field added
function meta_field_for_media_press(){
    add_action('add_meta_boxes', function () {
    add_meta_box('media_press_img_box', 'Media Press Image', 'media_press_img_box_html', 'press-media', 'side');
    });

    function media_press_img_box_html($post){
    wp_nonce_field('dev_img_nonce', 'dev_img_nonce_f');

    $img_id  = (int) get_post_meta($post->ID, '_dev_img_id', true);
    $img_url = $img_id ? wp_get_attachment_image_url($img_id, 'medium') : '';

    echo '<div id="dev-img-preview" style="margin:10px 0;">';
    if ($img_url) echo '<img src="'.esc_url($img_url).'" style="max-width:100%;height:auto;">';
    echo '</div>';

    echo '<input type="hidden" id="dev_img_id" name="dev_img_id" value="'.esc_attr($img_id).'">';
    echo '<button type="button" class="button" id="dev-img-upload">'.($img_id ? 'Change Image' : 'Select Image').'</button> ';
    echo '<button type="button" class="button" id="dev-img-remove" '.(!$img_id ? 'style="display:none"' : '').'>Remove</button>';
    }

    // 2) Save image id
    add_action('save_post_press-media', function($post_id){
    if (!isset($_POST['dev_img_nonce_f']) || !wp_verify_nonce($_POST['dev_img_nonce_f'], 'dev_img_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $img_id = isset($_POST['dev_img_id']) ? (int) $_POST['dev_img_id'] : 0;
    update_post_meta($post_id, '_dev_img_id', $img_id);
    });

    // 3) Media uploader button script (only for developer edit screen)
    add_action('admin_enqueue_scripts', function($hook){
    global $post;
    if (!in_array($hook, ['post-new.php','post.php'], true)) return;
    if (!isset($post->post_type) || $post->post_type !== 'press-media') return;

    wp_enqueue_media();

    wp_add_inline_script('jquery-core', "
        jQuery(function($){
        let frame;

        $('#dev-img-upload').on('click', function(e){
            e.preventDefault();
            if(frame){ frame.open(); return; }

            frame = wp.media({ title:'Select Developer Image', button:{ text:'Use this image' }, multiple:false });

            frame.on('select', function(){
            const a = frame.state().get('selection').first().toJSON();
            $('#dev_img_id').val(a.id);
            const u = (a.sizes && a.sizes.medium) ? a.sizes.medium.url : a.url;
            $('#dev-img-preview').html('<img src=\"'+u+'\" style=\"max-width:100%;height:auto;\">');
            $('#dev-img-remove').show();
            $('#dev-img-upload').text('Change Image');
            });

            frame.open();
        });

        $('#dev-img-remove').on('click', function(){
            $('#dev_img_id').val('');
            $('#dev-img-preview').html('');
            $('#dev-img-remove').hide();
            $('#dev-img-upload').text('Select Image');
        });
        });
    ");
    });
}
meta_field_for_media_press();

// meta field added for normal type meta
function meta_field_text_type_for_media_press(){
    add_action('add_meta_boxes', function () {
    add_meta_box(
        'media_press_view_meta', //id
        'media_press_view Data', //label
        'media_press_view_meta_callback', //calback
        'press-media' //cpt
    );
    });

    function media_press_view_meta_callback($post) {
    $data1 = get_post_meta($post->ID, 'data1', true);
    $press_name = get_post_meta($post->ID, 'press_name', true);
    $press_url = get_post_meta($post->ID, 'press_url', true);
    ?>
    <p><input type="number" name="data1" value="<?php echo esc_attr($data1); ?>" placeholder="View Number"></p>
    <p><input type="text" name="press_name" value="<?php echo esc_attr($press_name); ?>" placeholder="Press Name"></p>
    <p><input type="text" name="press_url" value="<?php echo esc_attr($press_url); ?>" placeholder="Press Url"></p>
    <?php
    }

    add_action('save_post', function ($post_id) {
    if (isset($_POST['data1'])) update_post_meta($post_id, 'data1', sanitize_text_field($_POST['data1']));
    if (isset($_POST['press_name'])) update_post_meta($post_id, 'press_name', sanitize_text_field($_POST['press_name']));
    if (isset($_POST['press_url'])) update_post_meta($post_id, 'press_url', sanitize_text_field($_POST['press_url']));
    });

}
meta_field_text_type_for_media_press();