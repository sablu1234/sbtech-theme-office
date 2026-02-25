<?php

function register_custom_post_developer() {

    $labels = array(
        'name'               => __( 'developer' ),
        'singular_name'      => __( 'developer' ),
        'add_new'            => __( 'Add New developer' ),
        'add_new_item'       => __( 'Add New developer' ),
        'edit_item'          => __( 'Edit developer' ),
        'new_item'           => __( 'New developer' ),
        'all_items'          => __( 'All developer' ),
        'view_item'          => __( 'View developer' ),
        'search_items'       => __( '' ),
        'featured_image'     => 'Poster',
        'set_featured_image' => 'Add Poster'
    );

    $args = array(
        'labels'            => $labels,
        'description'       => 'Holds our developer post specific data',
        'public'            => true,
        'menu_position'     => 5,
        'supports'          => array( 'title', 'editor', 'thumbnail',),
        'has_archive'       => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
		'menu_icon'         => 'dashicons-location',
    );

	register_post_type('developer', $args);
}
add_action('init', 'register_custom_post_developer');

// Meta field for developer
function meta_field_for_developer() {
    // one to many relationship between developer and property
    add_action('add_meta_boxes', function () {
    add_meta_box(
        'porpertypi_developer_box',
        'Developer',
        'porpertypi_developer_box_html',
        'porpertypi',   // <-- YOUR CPT SLUG
        'side',
        'default'
    );
    });

    function porpertypi_developer_box_html($post){
    $selected = (int) get_post_meta($post->ID, '_developer_id', true);

    $developers = get_posts([
        'post_type'   => 'developer',
        'numberposts' => -1,
        'orderby'     => 'title',
        'order'       => 'ASC',
    ]);

    echo '<select name="developer_id" style="width:100%">';
    echo '<option value="0">Select Developer</option>';
    foreach ($developers as $dev) {
        echo '<option value="'.esc_attr($dev->ID).'" '.selected($selected, $dev->ID, false).'>'
        .esc_html($dev->post_title).
        '</option>';
    }
    echo '</select>';
    }

    // Save selected developer
    add_action('save_post_porpertypi', function($post_id){
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $dev_id = isset($_POST['developer_id']) ? (int) $_POST['developer_id'] : 0;
    update_post_meta($post_id, '_developer_id', $dev_id);
    });

    // image meta field for developer
    add_action('add_meta_boxes', function () {
    add_meta_box('dev_img_box', 'Developer Image', 'dev_img_box_html', 'developer', 'side');
    });

    function dev_img_box_html($post){
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
    add_action('save_post_developer', function($post_id){
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
    if (!isset($post->post_type) || $post->post_type !== 'developer') return;

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

    // meta field project,found and price
    add_action('add_meta_boxes', function () {
    add_meta_box(
        'developer_meta', //id
        'developer Data', //label
        'developer_meta_callback', //calback
        'developer' //cpt
    );
    });

    function developer_meta_callback($post) {
    $project = get_post_meta($post->ID, 'project', true);
    $found_in = get_post_meta($post->ID, 'found_in', true);
    $price_from = get_post_meta($post->ID, 'price_from', true);
    ?>
    <p><input type="number" name="project" value="<?php echo esc_attr($project); ?>" placeholder="Project"></p>
    <p><input type="number" name="found_in" value="<?php echo esc_attr($found_in); ?>" placeholder="Found In"></p>
    <p><input type="number" name="price_from" value="<?php echo esc_attr($price_from); ?>" placeholder="Price From"></p>
    <?php
    }

    add_action('save_post', function ($post_id) {
    if (isset($_POST['project'])) update_post_meta($post_id, 'project', sanitize_text_field($_POST['project']));
    if (isset($_POST['found_in'])) update_post_meta($post_id, 'found_in', sanitize_text_field($_POST['found_in']));
    if (isset($_POST['price_from'])) update_post_meta($post_id, 'price_from', sanitize_text_field($_POST['price_from']));
    });
}
meta_field_for_developer();