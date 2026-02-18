        <?php
        add_action('init', function () {

            register_post_type('area', [
                'labels' => [
                    'name'               => 'Areas',
                    'singular_name'      => 'Area',
                    'add_new'            => 'Add New Area',
                    'add_new_item'       => 'Add New Area',
                    'edit_item'          => 'Edit Area',
                    'new_item'           => 'New Area',
                    'view_item'          => 'View Area',
                    'search_items'       => 'Search Areas',
                    'not_found'          => 'No Areas Found',
                    'menu_name'          => 'Areas',
                ],

                'public'              => true,
                'has_archive'         => true,
                'menu_icon'           => 'dashicons-location',
                'supports'            => ['title', 'thumbnail'], // Title + Featured Image
                'show_in_rest'        => true, // Gutenberg / API support
                'rewrite'             => ['slug' => 'area'],
            ]);
        });


        add_action('add_meta_boxes', function () {
            add_meta_box(
                'porpertypi_area',
                'Area',
                function ($post) {

                    $selected = get_post_meta($post->ID, '_area_id', true);

                    $areas = get_posts([
                        'post_type' => 'area',
                        'numberposts' => -1,
                        'post_status' => 'publish'
                    ]);

                    echo '<select name="area_id" style="width:100%;padding:6px">';
                    echo '<option value="">Select Area</option>';

                    foreach ($areas as $a) {
                        printf(
                            '<option value="%d"%s>%s</option>',
                            $a->ID,
                            selected($selected, $a->ID, false),
                            esc_html($a->post_title)
                        );
                    }

                    echo '</select>';
                },
                'porpertypi',
                'side',
                'high'
            );
        });

        add_action('save_post', function ($post_id) {
            if (isset($_POST['area_id'])) {
                update_post_meta($post_id, '_area_id', intval($_POST['area_id']));
            }
        });
