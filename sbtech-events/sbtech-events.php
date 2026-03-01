<?php
if (!defined('ABSPATH')) exit;

/**
 * SBTech Events + Single Event (CPT) + Admin media uploader
 */

/** ---------------------------
 *  Register CPT: single_event
 * --------------------------- */
add_action('init', function () {

  $labels = [
    'name'               => 'Single Events',
    'singular_name'      => 'Single Event',
    'menu_name'          => 'Single Event',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Single Event',
    'edit_item'          => 'Edit Single Event',
    'new_item'           => 'New Single Event',
    'view_item'          => 'View Single Event',
    'search_items'       => 'Search Single Events',
    'not_found'          => 'No Single Events found',
    'not_found_in_trash' => 'No Single Events found in Trash',
  ];

  register_post_type('single_event', [
    'labels'       => $labels,
    'public'       => true,
    'has_archive'  => false,
    'rewrite'      => ['slug' => 'single-event'],
    'show_in_menu' => 'edit.php?post_type=event', // Events menu er niche show hobe
    'supports'     => ['title', 'editor', 'thumbnail'],
    'menu_icon'    => 'dashicons-calendar-alt',
  ]);
});


/** --------------------------------------------
 *  Admin: enqueue media + our admin JS (ONLY ONCE)
 * -------------------------------------------- */
add_action('admin_enqueue_scripts', function ($hook) {
  if (!in_array($hook, ['post.php', 'post-new.php'], true)) return;

  $screen = get_current_screen();
  if (!$screen) return;

  if (!in_array($screen->post_type, ['event', 'single_event', 'page'], true)) return;

  wp_enqueue_media();

  $js_rel_path = '/sbtech-events/assets/js/sbtech-events-admin.js';
  $js_file     = get_template_directory() . $js_rel_path;
  $js_url      = get_template_directory_uri() . $js_rel_path;
  $ver         = file_exists($js_file) ? filemtime($js_file) : '1.0.0';

  wp_enqueue_script(
    'sbtech-events-admin',
    $js_url,
    ['jquery', 'media-editor', 'media-upload'],
    $ver,
    true
  );
}, 99);


/** -------------------------------------------------
 *  Event post type: add metabox to pick single_event
 *  (This is the CONNECTION: event -> single_event)
 * ------------------------------------------------- */
add_action('add_meta_boxes', function () {
  add_meta_box(
    'sbtech_event_single_event_link',
    'Single Event Page (for "See it")',
    'sbtech_event_single_event_link_metabox',
    'event',
    'side',
    'default'
  );
});

function sbtech_event_single_event_link_metabox($post) {
  $selected = (int) get_post_meta($post->ID, '_sbtech_event_single_event_id', true);
  wp_nonce_field('sbtech_event_single_event_save', 'sbtech_event_single_event_nonce');

  $q = new WP_Query([
    'post_type'      => 'single_event',
    'posts_per_page' => -1,
    'post_status'    => ['publish', 'draft', 'pending', 'private'],
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);

  echo '<p style="margin:0 0 8px;">Select which <b>Single Event</b> page should open when user clicks <b>See it</b>.</p>';

  echo '<select name="sbtech_event_single_event_id" style="width:100%;">';
  echo '<option value="0">— None (fallback to Event single) —</option>';

  if ($q->have_posts()) {
    while ($q->have_posts()) {
      $q->the_post();
      $id = get_the_ID();
      printf(
        '<option value="%d" %s>%s</option>',
        $id,
        selected($selected, $id, false),
        esc_html(get_the_title())
      );
    }
    wp_reset_postdata();
  }

  echo '</select>';
  echo '<p style="margin-top:8px;color:#666;">Tip: First create a Single Event, then come back and select it here.</p>';
}

add_action('save_post_event', function ($post_id) {
  if (!isset($_POST['sbtech_event_single_event_nonce']) || !wp_verify_nonce($_POST['sbtech_event_single_event_nonce'], 'sbtech_event_single_event_save')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (wp_is_post_revision($post_id)) return;
  if (!current_user_can('edit_post', $post_id)) return;

  $val = isset($_POST['sbtech_event_single_event_id']) ? (int) $_POST['sbtech_event_single_event_id'] : 0;
  update_post_meta($post_id, '_sbtech_event_single_event_id', $val);
}, 20);


/** -------------------------------------------------
 *  Single Event CPT: metabox to select related event
 * ------------------------------------------------- */
add_action('add_meta_boxes', function () {
  add_meta_box(
    'sbtech_single_event_related_event',
    'Related Event (pull date/title)',
    'sbtech_single_event_related_event_metabox',
    'single_event',
    'side',
    'default'
  );
});

function sbtech_single_event_related_event_metabox($post) {
  $selected = (int) get_post_meta($post->ID, '_sbtech_related_event_id', true);
  wp_nonce_field('sbtech_single_event_related_event_save', 'sbtech_single_event_related_event_nonce');

  $q = new WP_Query([
    'post_type'      => 'event',
    'posts_per_page' => -1,
    'post_status'    => ['publish', 'draft', 'pending', 'private'],
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);

  echo '<p style="margin:0 0 8px;">Pick an <b>Event</b>. Single page will show that Event’s date + title.</p>';

  echo '<select name="sbtech_related_event_id" style="width:100%;">';
  echo '<option value="0">— None —</option>';

  if ($q->have_posts()) {
    while ($q->have_posts()) {
      $q->the_post();
      $id = get_the_ID();
      printf(
        '<option value="%d" %s>%s</option>',
        $id,
        selected($selected, $id, false),
        esc_html(get_the_title())
      );
    }
    wp_reset_postdata();
  }

  echo '</select>';
}

add_action('save_post_single_event', function ($post_id) {
  if (!isset($_POST['sbtech_single_event_related_event_nonce']) || !wp_verify_nonce($_POST['sbtech_single_event_related_event_nonce'], 'sbtech_single_event_related_event_save')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (wp_is_post_revision($post_id)) return;
  if (!current_user_can('edit_post', $post_id)) return;

  $val = isset($_POST['sbtech_related_event_id']) ? (int) $_POST['sbtech_related_event_id'] : 0;
  update_post_meta($post_id, '_sbtech_related_event_id', $val);
}, 20);


/** --------------------------------------------
 *  Single Event: Details metabox (Start/End/Location)
 * -------------------------------------------- */

// Meta keys (single_event details)
if (!defined('SBTECH_SE_DATE_START')) define('SBTECH_SE_DATE_START', '_sbtech_se_start_date');
if (!defined('SBTECH_SE_DATE_END'))   define('SBTECH_SE_DATE_END',   '_sbtech_se_end_date');
if (!defined('SBTECH_SE_LOCATION'))   define('SBTECH_SE_LOCATION',   '_sbtech_se_location');

add_action('add_meta_boxes', function () {
  add_meta_box(
    'sbtech_single_event_details_box',
    'Single Event Details',
    'sbtech_single_event_details_metabox_cb',
    'single_event',
    'normal',
    'high'
  );
});

function sbtech_single_event_details_metabox_cb($post) {
  wp_nonce_field('sbtech_se_details_save', 'sbtech_se_details_nonce');

  $start = (string) get_post_meta($post->ID, SBTECH_SE_DATE_START, true);
  $end   = (string) get_post_meta($post->ID, SBTECH_SE_DATE_END, true);
  $loc   = (string) get_post_meta($post->ID, SBTECH_SE_LOCATION, true);
  ?>
  <style>
    .sbtech-se-row{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:12px;}
    .sbtech-se-field label{display:block;font-weight:600;margin:0 0 6px;}
    .sbtech-se-field input[type="text"],
    .sbtech-se-field input[type="date"]{width:100%;}
  </style>

  <div class="sbtech-se-row">
    <div class="sbtech-se-field">
      <label>Start Date</label>
      <input type="date" name="sbtech_se_start_date" value="<?php echo esc_attr($start); ?>">
    </div>

    <div class="sbtech-se-field">
      <label>End Date</label>
      <input type="date" name="sbtech_se_end_date" value="<?php echo esc_attr($end); ?>">
    </div>
  </div>

  <div class="sbtech-se-field">
    <label>Location (pill)</label>
    <input type="text" name="sbtech_se_location" value="<?php echo esc_attr($loc); ?>" placeholder="Rosewood Vienna, Vienna">
  </div>
  <?php
}

add_action('save_post_single_event', function ($post_id) {

  if (!isset($_POST['sbtech_se_details_nonce']) || !wp_verify_nonce($_POST['sbtech_se_details_nonce'], 'sbtech_se_details_save')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (wp_is_post_revision($post_id)) return;
  if (!current_user_can('edit_post', $post_id)) return;

  $start = isset($_POST['sbtech_se_start_date']) ? sanitize_text_field($_POST['sbtech_se_start_date']) : '';
  $end   = isset($_POST['sbtech_se_end_date'])   ? sanitize_text_field($_POST['sbtech_se_end_date'])   : '';
  $loc   = isset($_POST['sbtech_se_location'])   ? sanitize_text_field($_POST['sbtech_se_location'])   : '';

  update_post_meta($post_id, SBTECH_SE_DATE_START, $start);
  update_post_meta($post_id, SBTECH_SE_DATE_END,   $end);
  update_post_meta($post_id, SBTECH_SE_LOCATION,   $loc);

}, 20);


/** --------------------------------------------
 *  Single Event: Gallery metabox (multiple images)
 * -------------------------------------------- */
add_action('add_meta_boxes', function () {
  add_meta_box(
    'sbtech_single_event_gallery',
    'Single Event Gallery Images',
    'sbtech_single_event_gallery_metabox',
    'single_event',
    'normal',
    'default'
  );
});

function sbtech_single_event_gallery_metabox($post) {
  wp_nonce_field('sbtech_single_event_gallery_save', 'sbtech_single_event_gallery_nonce');

  $ids = get_post_meta($post->ID, '_sbtech_single_event_gallery_ids', true);
  $ids = is_array($ids) ? $ids : array_filter(array_map('absint', explode(',', (string) $ids)));

  $ids_str = implode(',', $ids);

  echo '<p>Select multiple images. They will appear in the Single Event page grid.</p>';

  echo '<input type="hidden" id="sbtech_single_event_gallery_ids" name="sbtech_single_event_gallery_ids" value="' . esc_attr($ids_str) . '">';

  echo '<p style="margin:10px 0;">';
  echo '<button type="button" class="button" id="sbtech_single_event_gallery_pick">Choose Images</button> ';
  echo '<button type="button" class="button" id="sbtech_single_event_gallery_clear">Clear</button>';
  echo '</p>';

  echo '<div id="sbtech_single_event_gallery_preview" style="display:flex;flex-wrap:wrap;gap:10px;">';
  if (!empty($ids)) {
    foreach ($ids as $id) {
      $thumb = wp_get_attachment_image_url($id, 'thumbnail');
      if ($thumb) {
        echo '<img src="' . esc_url($thumb) . '" style="width:80px;height:80px;object-fit:cover;border:1px solid #ddd;border-radius:6px;">';
      }
    }
  }
  echo '</div>';
}

add_action('save_post_single_event', function ($post_id) {
  if (!isset($_POST['sbtech_single_event_gallery_nonce']) || !wp_verify_nonce($_POST['sbtech_single_event_gallery_nonce'], 'sbtech_single_event_gallery_save')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (wp_is_post_revision($post_id)) return;
  if (!current_user_can('edit_post', $post_id)) return;

  $raw = isset($_POST['sbtech_single_event_gallery_ids']) ? sanitize_text_field($_POST['sbtech_single_event_gallery_ids']) : '';
  $ids = array_filter(array_map('absint', explode(',', $raw)));
  update_post_meta($post_id, '_sbtech_single_event_gallery_ids', implode(',', $ids));
}, 20);
