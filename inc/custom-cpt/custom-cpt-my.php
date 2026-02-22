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

// meta field for area cpt
function meta_box_for_area() {

    function area_meta_box() {
        add_action('add_meta_boxes', function () {
            add_meta_box(
                'area_meta', //id
                'Area Price start AED', //label
                'area_meta_callback', //calback
                'area' //cpt
            );
        });

        function area_meta_callback($post) {
            $price_start = get_post_meta($post->ID, 'price_start', true);
?>
            <p><input type="text" name="price_start" value="<?php echo esc_attr($price_start); ?>" placeholder="Price start AED"></p>
        <?php
        }

        add_action('save_post', function ($post_id) {
            if (isset($_POST['price_start'])) update_post_meta($post_id, 'price_start', sanitize_text_field($_POST['price_start']));
        });
    }
    area_meta_box();

    // gallery meta box add
    add_action('add_meta_boxes', function () {
        add_meta_box('area_gallery', 'Gallery', 'area_gallery_cb', 'area');
    });

    function area_gallery_cb($post) {
        wp_nonce_field('area_gallery', 'area_gallery_n');
        $v = get_post_meta($post->ID, 'area_gallery', true);

        echo "<p>
    <input type='hidden' class='pp-gids' name='area_gallery' value='" . esc_attr($v) . "'>
    <button class='button pp-gadd'>Add Images</button>
    <button class='button pp-gclear'>Clear</button>
    <span class='pp-gprev'>";

        foreach (array_filter(array_map('absint', explode(',', $v))) as $id) {
            $src = wp_get_attachment_image_url($id, 'thumbnail');
            if ($src) echo "<img src='$src' style='margin-left:6px;max-width:60px;vertical-align:middle'>";
        }
        echo "</span></p>";
    }

    add_action('admin_enqueue_scripts', function () {
        wp_enqueue_media();
        wp_add_inline_script('jquery', "
    jQuery(document).on('click','.pp-gadd',function(e){
      e.preventDefault();
      var p=jQuery(this).closest('p'),
          i=p.find('.pp-gids'),
          prev=p.find('.pp-gprev'),
          ids=(i.val()||'').split(',').map(Number).filter(Boolean);

      var f=wp.media({multiple:true});

      f.on('open',function(){
        var s=f.state().get('selection'); s.reset();
        ids.forEach(function(id){ var a=wp.media.attachment(id); a.fetch(); s.add(a); });
      });

      f.on('select',function(){
        ids=[]; prev.empty();
        f.state().get('selection').each(function(a){
          ids.push(a.id);
          var u=a.get('sizes')?.thumbnail?.url || a.get('url');
          prev.append(\"<img src='\"+u+\"' style='margin-left:6px;max-width:60px;vertical-align:middle'>\");
        });
        i.val(ids.join(','));
      });

      f.open();
    });

    jQuery(document).on('click','.pp-gclear',function(e){
      e.preventDefault();
      var p=jQuery(this).closest('p');
      p.find('.pp-gids').val(''); p.find('.pp-gprev').empty();
    });
  ");
    });

    add_action('save_post_area', function ($id) {
        if (!isset($_POST['area_gallery_n']) || !wp_verify_nonce($_POST['area_gallery_n'], 'area_gallery')) return;
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
        if (!current_user_can('edit_post', $id)) return;

        $raw = wp_unslash($_POST['area_gallery'] ?? '');
        $val = implode(',', array_filter(array_map('absint', explode(',', $raw))));
        $val === '' ? delete_post_meta($id, 'area_gallery') : update_post_meta($id, 'area_gallery', $val);
    });
}
meta_box_for_area();



// Add Repeatable FAQ Meta Box (Area CPT)
function repeatable_faq_meta_box() {
    // ✅ Add Meta Box
    add_action('add_meta_boxes', function () {
        add_meta_box(
            'area_faq_box',
            'Area FAQs',
            'area_faq_box_callback',
            'area',
            'normal',
            'default'
        );
    });

    function area_faq_box_callback($post) {

        wp_nonce_field('area_faq_nonce', 'area_faq_nonce_field');

        $faqs = get_post_meta($post->ID, 'area_faqs', true);
        if (!is_array($faqs)) {
            $faqs = [];
        }
        ?>

        <div id="faq-wrapper">
            <?php foreach ($faqs as $index => $faq) : ?>
                <div class="faq-item">
                    <input type="text"
                        name="area_faqs[<?php echo $index; ?>][question]"
                        value="<?php echo esc_attr($faq['question']); ?>"
                        placeholder="Question"
                        style="width:100%; margin-bottom:5px;" />

                    <textarea name="area_faqs[<?php echo $index; ?>][answer]"
                        placeholder="Answer"
                        style="width:100%; height:80px;"><?php echo esc_textarea($faq['answer']); ?></textarea>

                    <button type="button" class="remove-faq">Remove</button>
                    <hr>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="button" id="add-faq">Add FAQ</button>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let wrapper = document.getElementById("faq-wrapper");
                let addBtn = document.getElementById("add-faq");

                addBtn.addEventListener("click", function() {

                    let index = wrapper.children.length;

                    let html = `
                <div class="faq-item">
                    <input type="text" 
                           name="area_faqs[${index}][question]" 
                           placeholder="Question"
                           style="width:100%; margin-bottom:5px;" />

                    <textarea name="area_faqs[${index}][answer]" 
                              placeholder="Answer"
                              style="width:100%; height:80px;"></textarea>

                    <button type="button" class="remove-faq">Remove</button>
                    <hr>
                </div>
            `;

                    wrapper.insertAdjacentHTML("beforeend", html);
                });

                wrapper.addEventListener("click", function(e) {
                    if (e.target.classList.contains("remove-faq")) {
                        e.target.closest(".faq-item").remove();
                    }
                });
            });
        </script>

<?php
    }

    add_action('save_post', function ($post_id) {

        if (
            !isset($_POST['area_faq_nonce_field']) ||
            !wp_verify_nonce($_POST['area_faq_nonce_field'], 'area_faq_nonce')
        ) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (isset($_POST['area_faqs'])) {
            update_post_meta($post_id, 'area_faqs', $_POST['area_faqs']);
        } else {
            delete_post_meta($post_id, 'area_faqs');
        }
    });
};
repeatable_faq_meta_box();
