<?php
if (!defined('ABSPATH')) exit;

get_header();

$post_id = get_the_ID();

/**
 * -----------------------------
 * 1) Related Event (optional)
 * -----------------------------
 * If selected, we can pull Event title/date from the related "event" CPT.
 */
$related_event_id = (int) get_post_meta($post_id, '_sbtech_related_event_id', true);

$display_title = get_the_title($post_id);
$display_date  = '';

if ($related_event_id) {
  $rel_title = get_the_title($related_event_id);
  if ($rel_title) $display_title = $rel_title;

  $start_date = (string) get_post_meta($related_event_id, '_sbtech_event_start_date', true);
  $end_date   = (string) get_post_meta($related_event_id, '_sbtech_event_end_date', true);

  // Display date range from related event
  $display_date = trim($start_date);
  if ($end_date && $end_date !== $start_date) {
    $display_date .= ' – ' . trim($end_date);
  }
}

/**
 * -----------------------------
 * 2) Single Event Details (your metabox)
 * -----------------------------
 * These are saved directly on "single_event" post.
 */
$se_start = (string) get_post_meta($post_id, '_sbtech_se_start_date', true);
$se_end   = (string) get_post_meta($post_id, '_sbtech_se_end_date', true);
$se_loc   = (string) get_post_meta($post_id, '_sbtech_se_location', true);

// Build date from single_event meta (fallback)
$se_date = trim($se_start);
if ($se_end && $se_end !== $se_start) {
  $se_date .= ' – ' . trim($se_end);
}

// If related event date not set, fallback to single_event date
if (!$display_date && $se_date) {
  $display_date = $se_date;
}

/**
 * -----------------------------
 * 3) Gallery images (saved on single_event)
 * -----------------------------
 */
$ids = get_post_meta($post_id, '_sbtech_single_event_gallery_ids', true);
$ids = array_filter(array_map('absint', explode(',', (string) $ids)));
?>

<main class="sbtech-single-event" style="padding:60px 0;">
  <div class="container" style="max-width:1200px;margin:0 auto;padding:0 18px;">

    <?php if ($display_date): ?>
      <div class="sbtech-single-event__date"
           style="text-align:center;font-weight:600;letter-spacing:.04em;margin-bottom:14px;">
        <?php echo esc_html($display_date); ?>
      </div>
    <?php endif; ?>

    <h1 class="sbtech-single-event__title"
        style="text-align:center;font-size:56px;line-height:1.1;margin:0 0 18px;font-weight:700;">
      <?php echo esc_html($display_title); ?>
    </h1>

    <?php if ($se_loc): ?>
      <div class="sbtech-single-event__location"
           style="text-align:center;margin:0 0 26px;">
        <span style="display:inline-block;padding:10px 16px;border-radius:999px;background:#f3f4f6;font-weight:600;">
          <?php echo esc_html($se_loc); ?>
        </span>
      </div>
    <?php else: ?>
      <div style="height:10px;"></div>
    <?php endif; ?>

    <?php if (!empty($ids)): ?>
      <div class="sbtech-single-event__grid"
           style="display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:26px;align-items:stretch;">
        <?php foreach ($ids as $img_id):
          $url = wp_get_attachment_image_url($img_id, 'large');
          if (!$url) continue;
        ?>
          <div class="sbtech-single-event__imgbox"
               style="border-radius:18px;overflow:hidden;background:#f3f4f6;">
            <img src="<?php echo esc_url($url); ?>"
                 alt=""
                 style="width:100%;height:260px;object-fit:cover;display:block;">
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p style="text-align:center;color:#666;margin-top:30px;">
        No gallery images found. Add images from Single Event edit page.
      </p>
    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>
