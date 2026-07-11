<?php
$dev_id = get_the_ID();

$subtitle = get_post_meta($dev_id, SBTECH_DEV_META_SUBTITLE, true);
$founded  = get_post_meta($dev_id, SBTECH_DEV_META_FOUNDED, true);
$price    = get_post_meta($dev_id, SBTECH_DEV_META_PRICE, true);

$btn_text = get_post_meta($dev_id, SBTECH_DEV_META_BTN_TEXT, true);
$btn_url  = get_post_meta($dev_id, SBTECH_DEV_META_BTN_URL, true);

$hero_id  = (int) get_post_meta($dev_id, SBTECH_DEV_META_HERO_IMG, true);
$hero_url = $hero_id ? wp_get_attachment_image_url($hero_id, 'large') : '';

$projects_count = sbtech_get_developer_projects_count($dev_id);

if (!$subtitle) $subtitle = 'About Developer';
if (!$btn_text) $btn_text = 'Find Property';

?>
<section class="sbdev-hero">
  <div class="sbdev-container">
    <div class="sbdev-hero-card">
      <div class="sbdev-hero-left">
        <div class="sbdev-hero-sub"><?php echo esc_html($subtitle); ?></div>
        <h1 class="sbdev-hero-title"><?php the_title(); ?></h1>

        <ul class="sbdev-hero-stats">
          <li>
            <span class="sbdev-ico">⏱</span>
            <span class="sbdev-label">Projects</span>
            <strong class="sbdev-val"><?php echo (int) $projects_count; ?></strong>
          </li>

          <?php if ($founded): ?>
          <li>
            <span class="sbdev-ico">📅</span>
            <span class="sbdev-label">Founded in</span>
            <strong class="sbdev-val"><?php echo esc_html($founded); ?></strong>
          </li>
          <?php endif; ?>

          <?php if ($price): ?>
          <li>
            <span class="sbdev-ico">💰</span>
            <span class="sbdev-label">Price from</span>
            <strong class="sbdev-val"><?php echo esc_html($price); ?></strong>
          </li>
          <?php endif; ?>
        </ul>

        <?php if ($btn_url): ?>
          <a class="sbdev-btn" href="<?php echo esc_url($btn_url); ?>"><?php echo esc_html($btn_text); ?></a>
        <?php else: ?>
          <a class="sbdev-btn" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($btn_text); ?></a>
        <?php endif; ?>
      </div>

      <div class="sbdev-hero-right">
        <?php if ($hero_url): ?>
          <div class="sbdev-hero-img" style="background-image:url('<?php echo esc_url($hero_url); ?>')"></div>
        <?php else: ?>
          <?php if (has_post_thumbnail($dev_id)): ?>
            <?php $thumb = get_the_post_thumbnail_url($dev_id, 'large'); ?>
            <div class="sbdev-hero-img" style="background-image:url('<?php echo esc_url($thumb); ?>')"></div>
          <?php else: ?>
            <div class="sbdev-hero-img sbdev-hero-img--empty"></div>
          <?php endif; ?>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>
