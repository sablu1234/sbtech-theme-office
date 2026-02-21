<?php
//area custom post type=================================================================
function register_cpt_area() {
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
            'supports'            => ['title', 'thumbnail', 'editor'], // Title + Featured Image + Editor
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
}
register_cpt_area();


// loop meta field=================================================================
function repeatable_meta_of_area() {


    add_action('add_meta_boxes', function () {
        add_meta_box(
            'pp_repeat_gallery_box',
            'Repeatable Gallery (3 Images + Description)',
            'pp_repeat_gallery_metabox_cb',
            'area',
            'normal',
            'default'
        );
    });

    function pp_repeat_gallery_metabox_cb($post) {
        wp_nonce_field('pp_repeat_gallery_nonce_action', 'pp_repeat_gallery_nonce');

        // Load media uploader
        wp_enqueue_media();

        $rows = get_post_meta($post->ID, 'pp_repeat_gallery', true);
        if (!is_array($rows)) $rows = [];

        // show at least 1 row
        if (empty($rows)) {
            $rows = [
                ['desc' => '', 'img1' => 0, 'img2' => 0, 'img3' => 0]
            ];
        }

        echo '<style>
    .pp-row{border:1px solid #dcdcde;border-radius:8px;padding:12px;margin:12px 0;background:#fff;}
    .pp-row-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;}
    .pp-row-title{font-weight:600;}
    .pp-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px;margin-top:10px;}
    .pp-imgbox{border:1px dashed #c3c4c7;border-radius:8px;padding:10px;text-align:center;background:#fafafa;}
    .pp-imgbox img{max-width:100%;height:auto;border-radius:6px;display:block;margin:0 auto 8px;}
    .pp-actions{display:flex;gap:8px;justify-content:center;flex-wrap:wrap;}
    .pp-btn{padding:6px 10px;border:1px solid #c3c4c7;background:#f6f7f7;border-radius:6px;cursor:pointer;}
    .pp-btn-danger{border-color:#d63638;color:#d63638;background:#fff;}
    .pp-desc{width:100%;min-height:90px;}
    .pp-footer{margin-top:12px;}
  </style>';

        echo '<div id="pp-repeat-gallery-wrap">';

        foreach ($rows as $i => $row) {
            $desc = isset($row['desc']) ? (string)$row['desc'] : '';
            $img1 = isset($row['img1']) ? (int)$row['img1'] : 0;
            $img2 = isset($row['img2']) ? (int)$row['img2'] : 0;
            $img3 = isset($row['img3']) ? (int)$row['img3'] : 0;

            echo '<div class="pp-row" data-index="' . esc_attr($i) . '">';
            echo '<div class="pp-row-head">
              <div class="pp-row-title">Item #' . ($i + 1) . '</div>
              <button type="button" class="pp-btn pp-btn-danger pp-remove-row">Remove</button>
            </div>';

            echo '<label><strong>Description</strong></label><br/>';
            echo '<textarea class="pp-desc" name="pp_repeat_gallery[' . $i . '][desc]" placeholder="Write description...">' . esc_textarea($desc) . '</textarea>';

            echo '<div class="pp-grid">';
            pp_repeat_gallery_imgbox($i, 1, $img1);
            pp_repeat_gallery_imgbox($i, 2, $img2);
            pp_repeat_gallery_imgbox($i, 3, $img3);
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';

        echo '<div class="pp-footer">
          <button type="button" class="pp-btn" id="pp-add-gallery-row">+ Add More</button>
        </div>';

        // Row template (JS will replace __i__)
        $template = pp_repeat_gallery_row_template();
?>
        <script>
            (function() {
                const wrap = document.getElementById('pp-repeat-gallery-wrap');
                const addBtn = document.getElementById('pp-add-gallery-row');
                const rowTemplate = <?php echo json_encode($template); ?>;

                function renumberTitles() {
                    const rows = wrap.querySelectorAll('.pp-row');
                    rows.forEach((row, idx) => {
                        row.dataset.index = idx;
                        const title = row.querySelector('.pp-row-title');
                        if (title) title.textContent = 'Item #' + (idx + 1);

                        // update name attributes to keep array indexes consistent
                        row.querySelectorAll('[name]').forEach(el => {
                            el.name = el.name.replace(/pp_repeat_gallery\[\d+\]/, 'pp_repeat_gallery[' + idx + ']');
                        });
                    });
                }

                function openMediaPicker(onSelect) {
                    const frame = wp.media({
                        title: 'Select Image',
                        button: {
                            text: 'Use this image'
                        },
                        multiple: false
                    });
                    frame.on('select', function() {
                        const att = frame.state().get('selection').first().toJSON();
                        onSelect(att);
                    });
                    frame.open();
                }

                function initRow(row) {
                    // remove row
                    row.querySelector('.pp-remove-row')?.addEventListener('click', function() {
                        const rows = wrap.querySelectorAll('.pp-row');
                        if (rows.length <= 1) {
                            // reset first row instead of removing last
                            row.querySelector('textarea').value = '';
                            row.querySelectorAll('input.pp-img-id').forEach(inp => inp.value = '');
                            row.querySelectorAll('.pp-preview').forEach(p => p.innerHTML = '<div style="opacity:.6;">No image</div>');
                            return;
                        }
                        row.remove();
                        renumberTitles();
                    });

                    // select / remove image buttons
                    row.querySelectorAll('.pp-select-img').forEach(btn => {
                        btn.addEventListener('click', function() {
                            const box = btn.closest('.pp-imgbox');
                            const input = box.querySelector('input.pp-img-id');
                            const preview = box.querySelector('.pp-preview');

                            openMediaPicker(function(att) {
                                input.value = att.id;
                                preview.innerHTML = '<img src="' + att.url + '" alt="" />';
                            });
                        });
                    });

                    row.querySelectorAll('.pp-clear-img').forEach(btn => {
                        btn.addEventListener('click', function() {
                            const box = btn.closest('.pp-imgbox');
                            box.querySelector('input.pp-img-id').value = '';
                            box.querySelector('.pp-preview').innerHTML = '<div style="opacity:.6;">No image</div>';
                        });
                    });
                }

                // init existing rows
                wrap.querySelectorAll('.pp-row').forEach(initRow);

                // add new row
                addBtn.addEventListener('click', function() {
                    const idx = wrap.querySelectorAll('.pp-row').length;
                    const html = rowTemplate.replace(/__i__/g, idx);
                    const temp = document.createElement('div');
                    temp.innerHTML = html.trim();
                    const row = temp.firstElementChild;
                    wrap.appendChild(row);
                    initRow(row);
                    renumberTitles();
                });

                // ensure names are consistent on load
                renumberTitles();
            })();
        </script>
    <?php
    }

    function pp_repeat_gallery_imgbox($i, $n, $img_id) {
        $input_name = 'pp_repeat_gallery[' . $i . '][img' . $n . ']';
        $preview = $img_id ? wp_get_attachment_image($img_id, 'medium') : '<div style="opacity:.6;">No image</div>';

        echo '<div class="pp-imgbox">
          <div><strong>Image ' . $n . '</strong></div>
          <div class="pp-preview" style="margin-top:8px;">' . $preview . '</div>
          <input class="pp-img-id" type="hidden" name="' . esc_attr($input_name) . '" value="' . esc_attr($img_id) . '" />
          <div class="pp-actions" style="margin-top:8px;">
            <button type="button" class="pp-btn pp-select-img">Select</button>
            <button type="button" class="pp-btn pp-btn-danger pp-clear-img">Remove</button>
          </div>
        </div>';
    }

    function pp_repeat_gallery_row_template() {
        // HTML template for new row (index placeholder: __i__)
        ob_start(); ?>
        <div class="pp-row" data-index="__i__">
            <div class="pp-row-head">
                <div class="pp-row-title">Item #__i__</div>
                <button type="button" class="pp-btn pp-btn-danger pp-remove-row">Remove</button>
            </div>

            <label><strong>Description</strong></label><br />
            <textarea class="pp-desc" name="pp_repeat_gallery[__i__][desc]" placeholder="Write description..."></textarea>

            <div class="pp-grid">
                <?php for ($n = 1; $n <= 3; $n++): ?>
                    <div class="pp-imgbox">
                        <div><strong>Image <?php echo $n; ?></strong></div>
                        <div class="pp-preview" style="margin-top:8px;">
                            <div style="opacity:.6;">No image</div>
                        </div>
                        <input class="pp-img-id" type="hidden" name="pp_repeat_gallery[__i__][img<?php echo $n; ?>]" value="" />
                        <div class="pp-actions" style="margin-top:8px;">
                            <button type="button" class="pp-btn pp-select-img">Select</button>
                            <button type="button" class="pp-btn pp-btn-danger pp-clear-img">Remove</button>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
<?php
        return ob_get_clean();
    }

    // SAVE (reliable)
    add_action('save_post', function ($post_id) {

        if (get_post_type($post_id) !== 'porpertypi') return;

        if (
            !isset($_POST['pp_repeat_gallery_nonce']) ||
            !wp_verify_nonce($_POST['pp_repeat_gallery_nonce'], 'pp_repeat_gallery_nonce_action')
        ) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
        if (wp_is_post_revision($post_id)) return;
        if (!current_user_can('edit_post', $post_id)) return;

        $raw = isset($_POST['pp_repeat_gallery']) ? (array) $_POST['pp_repeat_gallery'] : [];
        $clean = [];

        foreach ($raw as $row) {
            if (!is_array($row)) continue;

            $desc = isset($row['desc']) ? sanitize_textarea_field($row['desc']) : '';
            $img1 = isset($row['img1']) ? absint($row['img1']) : 0;
            $img2 = isset($row['img2']) ? absint($row['img2']) : 0;
            $img3 = isset($row['img3']) ? absint($row['img3']) : 0;

            // keep row if has any content
            if ($desc !== '' || $img1 || $img2 || $img3) {
                $clean[] = [
                    'desc' => $desc,
                    'img1' => $img1,
                    'img2' => $img2,
                    'img3' => $img3,
                ];
            }
        }

        if (!empty($clean)) {
            update_post_meta($post_id, 'pp_repeat_gallery', $clean);
        } else {
            delete_post_meta($post_id, 'pp_repeat_gallery');
        }
    }, 20);
};
repeatable_meta_of_area();
