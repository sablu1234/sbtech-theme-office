<?php
if (!defined('ABSPATH')) exit;

/**
 * Events Meta:
 * 1) PAGE TEMPLATE META (Events Archive Banner)
 * 2) EVENT CPT META (Event Details + Gallery Images)
 */

/* -----------------------------
   Helpers
------------------------------ */
function sbtech_sanitize_text($v) {
    return is_string($v) ? sanitize_text_field($v) : '';
}
function sbtech_sanitize_url($v) {
    return is_string($v) ? esc_url_raw($v) : '';
}

/* ============================================================
    Load wp.media on admin screens (page + event)
============================================================ */
add_action('admin_enqueue_scripts', function ($hook) {
    if (!in_array($hook, ['post.php', 'post-new.php'], true)) return;

    $screen = function_exists('get_current_screen') ? get_current_screen() : null;
    if (!$screen) return;

    if (in_array($screen->post_type, ['page', 'event'], true)) {
        wp_enqueue_media();
    }
});

/** ===========================================================
 *  PAGE (Template) Meta Box: Events Archive Banner
 * =========================================================== */
add_action('add_meta_boxes', function () {

    add_meta_box(
        'sbtech_events_archive_banner',
        __('Events Archive Banner', 'sbtech'),
        function ($post) {

            if ($post->post_type !== 'page') return;

            $tpl = get_page_template_slug($post->ID);
            if ($tpl !== 'template-events-archive.php') {
                echo '<p style="margin:0;">Select <b>Events Archive</b> template to edit banner options.</p>';
                return;
            }

            wp_nonce_field('sbtech_events_archive_banner_save', 'sbtech_events_archive_banner_nonce');

            $banner_image_id = (int) get_post_meta($post->ID, '_sbtech_ea_banner_image_id', true);
            $banner_title    = (string) get_post_meta($post->ID, '_sbtech_ea_banner_title', true);
            $banner_subtitle = (string) get_post_meta($post->ID, '_sbtech_ea_banner_subtitle', true);
            $button_text     = (string) get_post_meta($post->ID, '_sbtech_ea_button_text', true);
            $button_url      = (string) get_post_meta($post->ID, '_sbtech_ea_button_url', true);

            $img = $banner_image_id ? wp_get_attachment_image_url($banner_image_id, 'full') : '';
?>
        <style>
            .sbtech-field {
                margin: 0 0 12px;
            }

            .sbtech-field label {
                font-weight: 600;
                display: block;
                margin-bottom: 6px;
            }

            .sbtech-field input[type="text"],
            .sbtech-field input[type="url"] {
                width: 100%;
            }

            .sbtech-thumb {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .sbtech-thumb img {
                width: 160px;
                height: 90px;
                object-fit: cover;
                border: 1px solid #ddd;
                border-radius: 8px;
                background: #f7f7f7;
            }

            .sbtech-btn {
                padding: 6px 10px;
            }
        </style>

        <div class="sbtech-field">
            <label><?php esc_html_e('Banner Image', 'sbtech'); ?></label>
            <div class="sbtech-thumb">
                <img id="sbtech_ea_preview" src="<?php echo esc_url($img ?: ''); ?>" alt="" />
                <div>
                    <input type="hidden" id="sbtech_ea_banner_image_id" name="sbtech_ea_banner_image_id" value="<?php echo esc_attr($banner_image_id); ?>">
                    <button type="button" class="button sbtech-btn" id="sbtech_ea_pick"><?php esc_html_e('Choose Image', 'sbtech'); ?></button>
                    <button type="button" class="button sbtech-btn" id="sbtech_ea_remove"><?php esc_html_e('Remove', 'sbtech'); ?></button>
                    <p style="margin:8px 0 0;color:#666;">Recommended: 1920×900 or larger</p>
                </div>
            </div>
        </div>

        <div class="sbtech-field">
            <label><?php esc_html_e('Banner Title', 'sbtech'); ?></label>
            <input type="text" name="sbtech_ea_banner_title" value="<?php echo esc_attr($banner_title); ?>">
        </div>

        <div class="sbtech-field">
            <label><?php esc_html_e('Banner Subtitle', 'sbtech'); ?></label>
            <input type="text" name="sbtech_ea_banner_subtitle" value="<?php echo esc_attr($banner_subtitle); ?>">
        </div>

        <div class="sbtech-field">
            <label><?php esc_html_e('Button Text', 'sbtech'); ?></label>
            <input type="text" name="sbtech_ea_button_text" value="<?php echo esc_attr($button_text); ?>">
        </div>

        <div class="sbtech-field">
            <label><?php esc_html_e('Button URL', 'sbtech'); ?></label>
            <input type="url" name="sbtech_ea_button_url" value="<?php echo esc_attr($button_url); ?>">
        </div>

        <script>
            (function() {
                const pickBtn = document.getElementById('sbtech_ea_pick');
                const removeBtn = document.getElementById('sbtech_ea_remove');
                const hidden = document.getElementById('sbtech_ea_banner_image_id');
                const preview = document.getElementById('sbtech_ea_preview');
                if (!pickBtn || !hidden || !preview) return;

                function syncPreview() {
                    preview.style.display = preview.getAttribute('src') ? 'block' : 'none';
                }
                syncPreview();

                if (typeof wp === 'undefined' || !wp.media) return;

                let frame = null;
                pickBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (frame) {
                        frame.open();
                        return;
                    }

                    frame = wp.media({
                        title: 'Select Banner Image',
                        button: {
                            text: 'Use this image'
                        },
                        multiple: false
                    });

                    frame.on('select', function() {
                        const att = frame.state().get('selection').first().toJSON();
                        hidden.value = att.id || '';
                        preview.src = att.url || '';
                        syncPreview();
                    });

                    frame.open();
                });

                removeBtn && removeBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    hidden.value = '';
                    preview.removeAttribute('src');
                    syncPreview();
                });
            })();
        </script>
    <?php
        },
        'page',
        'normal',
        'high'
    );
});

add_action('save_post_page', function ($post_id) {
    if (
        !isset($_POST['sbtech_events_archive_banner_nonce']) ||
        !wp_verify_nonce($_POST['sbtech_events_archive_banner_nonce'], 'sbtech_events_archive_banner_save')
    ) return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $tpl = get_page_template_slug($post_id);
    if ($tpl !== 'template-events-archive.php') return;

    $banner_image_id = isset($_POST['sbtech_ea_banner_image_id']) ? (int) $_POST['sbtech_ea_banner_image_id'] : 0;
    $banner_title    = isset($_POST['sbtech_ea_banner_title']) ? sbtech_sanitize_text($_POST['sbtech_ea_banner_title']) : '';
    $banner_subtitle = isset($_POST['sbtech_ea_banner_subtitle']) ? sbtech_sanitize_text($_POST['sbtech_ea_banner_subtitle']) : '';
    $button_text     = isset($_POST['sbtech_ea_button_text']) ? sbtech_sanitize_text($_POST['sbtech_ea_button_text']) : '';
    $button_url      = isset($_POST['sbtech_ea_button_url']) ? sbtech_sanitize_url($_POST['sbtech_ea_button_url']) : '';

    update_post_meta($post_id, '_sbtech_ea_banner_image_id', $banner_image_id);
    update_post_meta($post_id, '_sbtech_ea_banner_title', $banner_title);
    update_post_meta($post_id, '_sbtech_ea_banner_subtitle', $banner_subtitle);
    update_post_meta($post_id, '_sbtech_ea_button_text', $button_text);
    update_post_meta($post_id, '_sbtech_ea_button_url', $button_url);
}, 10);

/** ===========================================================
 *  EVENT CPT Meta Box: Event Details + Gallery
 * =========================================================== */
add_action('add_meta_boxes', function () {

    add_meta_box(
        'sbtech_event_details',
        __('Event Details', 'sbtech'),
        function ($post) {

            if ($post->post_type !== 'event') return;

            wp_nonce_field('sbtech_event_details_save', 'sbtech_event_details_nonce');

            $location_tag = (string) get_post_meta($post->ID, '_sbtech_event_location_tag', true);
            $start_date   = (string) get_post_meta($post->ID, '_sbtech_event_start_date', true);
            $end_date     = (string) get_post_meta($post->ID, '_sbtech_event_end_date', true);
            $venue        = (string) get_post_meta($post->ID, '_sbtech_event_venue', true);

            $btn_text     = (string) get_post_meta($post->ID, '_sbtech_event_btn_text', true);
            $btn_url      = (string) get_post_meta($post->ID, '_sbtech_event_btn_url', true);

            // Gallery (comma-separated IDs)
            $gallery_ids  = (string) get_post_meta($post->ID, '_sbtech_event_gallery_ids', true);
            $ids_array    = array_filter(array_map('absint', explode(',', $gallery_ids)));
    ?>
        <style>
            .sbtech-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 14px;
            }

            .sbtech-field {
                margin: 0 0 12px;
            }

            .sbtech-field label {
                font-weight: 600;
                display: block;
                margin-bottom: 6px;
            }

            .sbtech-field input[type="text"],
            .sbtech-field input[type="url"],
            .sbtech-field input[type="date"] {
                width: 100%;
            }

            .sbtech-gallery {
                display: grid;
                grid-template-columns: repeat(6, 1fr);
                gap: 10px;
                margin-top: 10px;
            }

            .sbtech-gallery img {
                width: 100%;
                height: 70px;
                object-fit: cover;
                border-radius: 10px;
                border: 1px solid #e5e5e5;
                background: #f7f7f7;
            }

            @media(max-width: 900px) {
                .sbtech-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>



        <hr style="margin:16px 0;">



        <p style="margin: 10px 0 0; color:#666;">
            Tip: Featured Image will be used as fallback if gallery is empty.
        </p>

        <script>
            (function() {
                const pickBtn = document.getElementById('sbtech_gallery_pick');
                const clearBtn = document.getElementById('sbtech_gallery_clear');
                const hidden = document.getElementById('sbtech_event_gallery_ids');
                const preview = document.getElementById('sbtech_gallery_preview');
                if (!pickBtn || !hidden || !preview) return;
                if (typeof wp === 'undefined' || !wp.media) return;

                let frame = null;

                function renderThumbs(ids) {
                    preview.innerHTML = '';
                    ids.forEach(id => {
                        const img = document.createElement('img');
                        img.src = ''; // will set after fetch
                        img.alt = '';
                        preview.appendChild(img);

                        // get attachment url via wp.media
                        wp.media.attachment(id).fetch().then(() => {
                            const att = wp.media.attachment(id).toJSON();
                            img.src = (att.sizes && att.sizes.thumbnail) ? att.sizes.thumbnail.url : att.url;
                        });
                    });
                }

                pickBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    frame = wp.media({
                        title: 'Select Gallery Images',
                        button: {
                            text: 'Use selected images'
                        },
                        multiple: true
                    });

                    frame.on('select', function() {
                        const selection = frame.state().get('selection').toJSON();
                        const ids = selection.map(a => a.id);
                        hidden.value = ids.join(',');
                        renderThumbs(ids);
                    });

                    frame.open();
                });

                clearBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    hidden.value = '';
                    preview.innerHTML = '';
                });
            })();
        </script>
<?php
        },
        'event',
        'normal',
        'high'
    );
});

add_action('save_post_event', function ($post_id) {

    if (
        !isset($_POST['sbtech_event_details_nonce']) ||
        !wp_verify_nonce($_POST['sbtech_event_details_nonce'], 'sbtech_event_details_save')
    ) return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $location_tag = isset($_POST['sbtech_event_location_tag']) ? sbtech_sanitize_text($_POST['sbtech_event_location_tag']) : '';
    $venue        = isset($_POST['sbtech_event_venue']) ? sbtech_sanitize_text($_POST['sbtech_event_venue']) : '';
    $start_date   = isset($_POST['sbtech_event_start_date']) ? sbtech_sanitize_text($_POST['sbtech_event_start_date']) : '';
    $end_date     = isset($_POST['sbtech_event_end_date']) ? sbtech_sanitize_text($_POST['sbtech_event_end_date']) : '';

    $btn_text     = isset($_POST['sbtech_event_btn_text']) ? sbtech_sanitize_text($_POST['sbtech_event_btn_text']) : '';
    $btn_url      = isset($_POST['sbtech_event_btn_url']) ? sbtech_sanitize_url($_POST['sbtech_event_btn_url']) : '';

    $gallery_ids  = isset($_POST['sbtech_event_gallery_ids']) ? sanitize_text_field($_POST['sbtech_event_gallery_ids']) : '';
    // normalize: keep only numbers and commas
    $gallery_ids = preg_replace('/[^0-9,]/', '', $gallery_ids);

    update_post_meta($post_id, '_sbtech_event_location_tag', $location_tag);
    update_post_meta($post_id, '_sbtech_event_venue', $venue);
    update_post_meta($post_id, '_sbtech_event_start_date', $start_date);
    update_post_meta($post_id, '_sbtech_event_end_date', $end_date);
    update_post_meta($post_id, '_sbtech_event_btn_text', $btn_text);
    update_post_meta($post_id, '_sbtech_event_btn_url', $btn_url);

    update_post_meta($post_id, '_sbtech_event_gallery_ids', $gallery_ids);
}, 10);
