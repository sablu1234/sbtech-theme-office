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
            'featured_image'     => 'Poster',
            'set_featured_image' => 'Add Poster'
        );

        $args = array(
            'labels'            => $labels,
            'description'       => 'Holds our Agent post specific data',
            'public'            => true,
            'menu_position'     => 5,
            'supports'          => array('title', 'thumbnail',),
            'has_archive'       => true,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'query_var'         => true,
            'menu_icon'         => 'dashicons-admin-users',
        );

        register_post_type('agent', $args);
    }
    add_action('init', 'register_custom_post');

    // Add Repeatable meta box for agent cpt============================================================
    add_action('add_meta_boxes', function () {
        add_meta_box(
            'pp_repeat_box', // ID
            'Repeatable Speaking Languages', // Title
            'pp_repeat_metabox_cb', // Callback
            'agent', // Screen (post type)
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

    add_action('save_post_agent', function ($post_id) {

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
            'agent' //cpt
        );
    });

    function agent_meta_meta_callback($post) {
        $team_status = get_post_meta($post->ID, 'team_status', true);
        $sale_property = get_post_meta($post->ID, 'sale_property', true);
        $rent_property = get_post_meta($post->ID, 'rent_property', true);
        $agent_experience = get_post_meta($post->ID, 'agent_experience', true);
        $agent_country = get_post_meta($post->ID, 'agent_country', true);
        $agent_whatsapp = get_post_meta($post->ID, 'agent_whatsapp', true);
    ?>
        <p><input type="text" name="team_status" value="<?php echo esc_attr($team_status); ?>" placeholder="Team Status"></p>
        <p><input type="number" name="sale_property" value="<?php echo esc_attr($sale_property); ?>" placeholder="Sale Property Number"></p>
        <p><input type="number" name="rent_property" value="<?php echo esc_attr($rent_property); ?>" placeholder="Rent Property Number"></p>
        <p><input type="number" name="agent_experience" value="<?php echo esc_attr($agent_experience); ?>" placeholder="Agent experice"></p>
        <p><input type="text" name="agent_country" value="<?php echo esc_attr($agent_country); ?>" placeholder="Agent country Name"></p>
        <p><input type="text" name="agent_whatsapp" value="<?php echo esc_attr($agent_whatsapp); ?>" placeholder="Agent Whatsapp"></p>
    <?php
    }

    add_action('save_post', function ($post_id) {
        if (isset($_POST['team_status'])) update_post_meta($post_id, 'team_status', sanitize_text_field($_POST['team_status']));
        if (isset($_POST['sale_property'])) update_post_meta($post_id, 'sale_property', sanitize_text_field($_POST['sale_property']));
        if (isset($_POST['rent_property'])) update_post_meta($post_id, 'rent_property', sanitize_text_field($_POST['rent_property']));
        if (isset($_POST['agent_experience'])) update_post_meta($post_id, 'agent_experience', sanitize_text_field($_POST['agent_experience']));
        if (isset($_POST['agent_country'])) update_post_meta($post_id, 'agent_country', sanitize_text_field($_POST['agent_country']));
        if (isset($_POST['agent_whatsapp'])) update_post_meta($post_id, 'agent_whatsapp', sanitize_text_field($_POST['agent_whatsapp']));
    });
}
agent_extra_meta();
