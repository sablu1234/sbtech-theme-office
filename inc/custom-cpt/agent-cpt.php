<?php
function agent_cpt_area() {
    function register_custom_post() {

        $labels = array(
            'name'               => __('Agent'),
            'singular_name'      => __('Agent'),
            'add_new'            => __('Add New Agent'),
            'add_new_item'       => __('Add New Agent'),
            'edit_item'          => __('Edit Agent'),
            'new_item'           => __('New Agent'),
            'all_items'          => __('All Agent'),
            'view_item'          => __('View Agent'),
            'search_items'       => __('Search Agent'),
            'featured_image'     => 'Poster(size: 178x266)',
            'set_featured_image' => 'Add Poster'
        );

        $args = array(
            'labels'            => $labels,
            'description'       => 'Holds our Agent post specific data',
            'public'            => true,
            'menu_position'     => 5,
            'supports'          => array('title','editor','thumbnail',),
            'has_archive'       => true,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'query_var'         => true,
            'menu_icon'         => 'dashicons-admin-users',
        );

        register_post_type('agents', $args);
    }
    add_action('init', 'register_custom_post');
	
	//editor charecter limit for agent cpt
    function agents_editor_charecter_limit(){
        add_action('admin_footer', function () {
            global $post_type;

            if ($post_type !== 'agents') {
                return;
            }
            ?>
            <script>
                jQuery(document).ready(function ($) {

                    // Title max 20 characters
                    // $('#title').attr('maxlength', 20);

                    // Description/editor max 30 characters
                    $('#content').attr('maxlength', 500);

                    // $('#title').on('input', function () {
                    //     if ($(this).val().length > 20) {
                    //         $(this).val($(this).val().substring(0, 20));
                    //     }
                    // });

                    // $('#title').after('<p style="color:#666;">Max 20 characters allowed</p>');  
                    $('#content').after('<p style="color:#666;">Max 500 characters allowed</p>');

                    $('#content').on('input', function () {
                        if ($(this).val().length > 30) {
                            $(this).val($(this).val().substring(0, 500));
                        }
                    });

                });
            </script>
            <?php
        });
    }
    agents_editor_charecter_limit();

    //editor charecter limit for agent cpt
    function agents_editor_charecter_limit(){
        add_action('admin_footer', function () {
            global $post_type;

            if ($post_type !== 'agents') {
                return;
            }
            ?>
            <script>
                jQuery(document).ready(function ($) {

                    // Title max 20 characters
                    // $('#title').attr('maxlength', 20);

                    // Description/editor max 30 characters
                    $('#content').attr('maxlength', 500);

                    // $('#title').on('input', function () {
                    //     if ($(this).val().length > 20) {
                    //         $(this).val($(this).val().substring(0, 20));
                    //     }
                    // });

                    // $('#title').after('<p style="color:#666;">Max 20 characters allowed</p>');  
                    $('#content').after('<p style="color:#666;">Max 500 characters allowed</p>');

                    $('#content').on('input', function () {
                        if ($(this).val().length > 30) {
                            $(this).val($(this).val().substring(0, 500));
                        }
                    });

                });
            </script>
            <?php
        });
    }
    agents_editor_charecter_limit();


    // Add Repeatable meta box for agent cpt============================================================
    add_action('add_meta_boxes', function () {
        add_meta_box(
            'pp_repeat_box', // ID
            'Repeatable Speaking Languages', // Title
            'pp_repeat_metabox_cb', // Callback
            'agents', // Screen (post type)
            'normal', // Context
            'default' // Priority
        );
    });

    function pp_repeat_metabox_cb($post) {
        wp_nonce_field('pp_repeat_nonce_action', 'pp_repeat_nonce');

        $values = get_post_meta($post->ID, 'agent_repeat_items', true);
        if (!is_array($values)) $values = [];

        // at least 1 row show
        if (empty($values)) $values = [''];

        echo '<style>
    .pp-repeat-row{display:flex;gap:8px;align-items:center;margin:8px 0;}
    .pp-repeat-row input{flex:1;min-width:220px;}
    .pp-repeat-actions{margin-top:10px;}
    .pp-btn{padding:6px 10px;border:1px solid #c3c4c7;background:#f6f7f7;border-radius:4px;cursor:pointer;}
    .pp-btn-danger{border-color:#d63638;color:#d63638;background:#fff;}
    </style>';

        echo '<div id="pp-repeat-wrap">';

        foreach ($values as $val) {
            $val = is_string($val) ? $val : '';
            echo '<div class="pp-repeat-row">';
            echo '<input type="text" name="agent_repeat_items[]" value="' . esc_attr($val) . '" placeholder="Enter value" />';
            echo '<button type="button" class="pp-btn pp-btn-danger pp-remove-row">Remove</button>';
            echo '</div>';
        }

        echo '</div>';

        echo '<div class="pp-repeat-actions">';
        echo '<button type="button" class="pp-btn" id="pp-add-row">+ Add More</button>';
        echo '</div>';

        // Vanilla JS for add/remove rows
    ?>
        <script>
            (function() {
                const wrap = document.getElementById('pp-repeat-wrap');
                const addBtn = document.getElementById('pp-add-row');

                function bindRemove(btn) {
                    btn.addEventListener('click', function() {
                        const rows = wrap.querySelectorAll('.pp-repeat-row');
                        // keep at least 1 row
                        if (rows.length <= 1) {
                            rows[0].querySelector('input').value = '';
                            return;
                        }
                        btn.closest('.pp-repeat-row').remove();
                    });
                }

                wrap.querySelectorAll('.pp-remove-row').forEach(bindRemove);

                addBtn.addEventListener('click', function() {
                    const row = document.createElement('div');
                    row.className = 'pp-repeat-row';
                    row.innerHTML = `
          <input type="text" name="agent_repeat_items[]" value="" placeholder="Enter value" />
          <button type="button" class="pp-btn pp-btn-danger pp-remove-row">Remove</button>
        `;
                    wrap.appendChild(row);
                    bindRemove(row.querySelector('.pp-remove-row'));
                });
            })();
        </script>
    <?php
    }

    add_action('save_post_agents', function ($post_id) {

        // nonce check
        if (!isset($_POST['pp_repeat_nonce']) || !wp_verify_nonce($_POST['pp_repeat_nonce'], 'pp_repeat_nonce_action')) {
            return;
        }

        // autosave check
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

        // permission check
        if (!current_user_can('edit_post', $post_id)) return;

        $items = isset($_POST['agent_repeat_items']) ? (array) $_POST['agent_repeat_items'] : [];
        $clean = [];

        foreach ($items as $item) {
            $item = sanitize_text_field($item);
            if ($item !== '') $clean[] = $item;
        }

        if (!empty($clean)) {
            update_post_meta($post_id, 'agent_repeat_items', $clean); // array saved
        } else {
            delete_post_meta($post_id, 'agent_repeat_items');
        }
    });
}
agent_cpt_area();

// extra meta added for agent cpt
function agent_extra_meta() {
    add_action('add_meta_boxes', function () {
        add_meta_box(
            'agent_meta_meta', //id
            'agent_meta Data', //label
            'agent_meta_meta_callback', //calback
            'agents' //cpt
        );
    });

    function agent_meta_meta_callback($post) {
        $team_status = get_post_meta($post->ID, 'team_status', true);
        $sale_property = get_post_meta($post->ID, 'sale_property', true);
        $rent_property = get_post_meta($post->ID, 'rent_property', true);
        $agent_experience = get_post_meta($post->ID, 'agent_experience', true);
        $agent_country = get_post_meta($post->ID, 'agent_country', true);
        $agent_whatsapp = get_post_meta($post->ID, 'agent_whatsapp', true);
        $agent_designation = get_post_meta($post->ID, 'agent_designation', true);
        $agent_order = get_post_meta($post->ID, 'agent_order', true);
        $agent_show = get_post_meta($post->ID, 'agent_show', true);
        $agent_phone = get_post_meta($post->ID, 'agent_phone', true);
        $agent_email = get_post_meta($post->ID, 'agent_email', true);
        $agent_brn = get_post_meta($post->ID, 'agent_brn', true);
        
    ?>
        <p><input type="text" name="team_status" value="<?php echo esc_attr($team_status); ?>" placeholder="Team Status"></p>
        <p><input type="number" name="sale_property" value="<?php echo esc_attr($sale_property); ?>" placeholder="Sale Property Number"></p>
        <p><input type="number" name="rent_property" value="<?php echo esc_attr($rent_property); ?>" placeholder="Rent Property Number"></p>
        <p><input type="number" name="agent_experience" value="<?php echo esc_attr($agent_experience); ?>" placeholder="Agent experice"></p>
        <p><input type="text" name="agent_country" value="<?php echo esc_attr($agent_country); ?>" placeholder="Agent country Name"></p>
        <p><input type="text" name="agent_phone" value="<?php echo esc_attr($agent_phone); ?>" placeholder="Agent Phone"></p>
        <p><input type="email" name="agent_email" value="<?php echo esc_attr($agent_email); ?>" placeholder="Agent Email"></p>
        <p><input type="text" name="agent_whatsapp" value="<?php echo esc_attr($agent_whatsapp); ?>" placeholder="Agent Whatsapp"></p>
        <p><input type="text" name="agent_designation" value="<?php echo esc_attr($agent_designation); ?>" placeholder="Agent Designation"></p>
        <p><input type="text" name="agent_brn" value="<?php echo esc_attr($agent_brn); ?>" placeholder="BRN No"></p>
        <p><input type="number" name="agent_order" value="<?php echo esc_attr($agent_order); ?>" placeholder="Agent order"></p>
        <p>
            <label><strong>Show Agent On Frontend</strong></label><br>
            <select name="agent_show" style="width:50%;">
                <option value="yes" <?php selected($agent_show, 'yes'); ?>>Yes</option>
                <option value="no" <?php selected($agent_show, 'no'); ?>>No</option>
            </select>
            <br>
            <small>Default is Yes. Select No if you want to hide this agent from the frontend.</small>
        </p>
    <?php
    }
 
    add_action('save_post', function ($post_id) {
        if (isset($_POST['team_status'])) update_post_meta($post_id, 'team_status', sanitize_text_field($_POST['team_status']));
        if (isset($_POST['sale_property'])) update_post_meta($post_id, 'sale_property', sanitize_text_field($_POST['sale_property']));
        if (isset($_POST['rent_property'])) update_post_meta($post_id, 'rent_property', sanitize_text_field($_POST['rent_property']));
        if (isset($_POST['agent_experience'])) update_post_meta($post_id, 'agent_experience', sanitize_text_field($_POST['agent_experience']));
        if (isset($_POST['agent_country'])) update_post_meta($post_id, 'agent_country', sanitize_text_field($_POST['agent_country']));
        if (isset($_POST['agent_phone'])) update_post_meta($post_id, 'agent_phone', sanitize_text_field($_POST['agent_phone']));
        if (isset($_POST['agent_email'])) update_post_meta($post_id, 'agent_email', sanitize_text_field($_POST['agent_email']));
        if (isset($_POST['agent_whatsapp'])) update_post_meta($post_id, 'agent_whatsapp', sanitize_text_field($_POST['agent_whatsapp']));
        if (isset($_POST['agent_designation'])) update_post_meta($post_id, 'agent_designation', sanitize_text_field($_POST['agent_designation']));
        if (isset($_POST['agent_brn'])) update_post_meta($post_id, 'agent_brn', sanitize_text_field($_POST['agent_brn']));
        if (isset($_POST['agent_order'])) update_post_meta($post_id, 'agent_order', sanitize_text_field($_POST['agent_order']));
        if (isset($_POST['agent_show'])) update_post_meta($post_id, 'agent_show', sanitize_text_field($_POST['agent_show']));
    });
}
agent_extra_meta();
