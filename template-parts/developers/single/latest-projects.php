<?php
$dev_id = get_the_ID();

$logo_id  = (int) get_post_meta($dev_id, SBTECH_DEV_META_LOGO, true);
$logo_url = $logo_id ? wp_get_attachment_image_url($logo_id, 'medium') : '';

$projects = sbtech_get_developer_projects($dev_id, 6);
?>
<section class="sbdev-section">
  <div class="sbdev-container">

    <div class="sbdev-sec-head">
      <div>
        <h2 class="sbdev-h2">Latest Projects</h2>
      </div>

      <?php if ($logo_url): ?>
        <img class="sbdev-logo" src="<?php echo esc_url($logo_url); ?>" alt="">
      <?php endif; ?>
    </div>

    <?php if (!$projects): ?>
      <div class="sbdev-empty">No projects found for this developer yet.</div>
    <?php else: ?>
      <div class="sbdev-grid">
        <?php foreach ($projects as $p): ?>
          <?php
            $img = get_the_post_thumbnail_url($p->ID, 'large');
            if (!$img) $img = '';
          ?>
          <article class="sbdev-card">
            <a class="sbdev-card-img" href="<?php echo esc_url(get_permalink($p->ID)); ?>"
               style="<?php echo $img ? 'background-image:url('.esc_url($img).')' : ''; ?>">
            </a>
            <div class="sbdev-card-body">
              <h3 class="sbdev-card-title">
                <a href="<?php echo esc_url(get_permalink($p->ID)); ?>">
                  <?php echo esc_html(get_the_title($p->ID)); ?>
                </a>
              </h3>
              <div class="sbdev-card-meta">
                <?php echo esc_html(get_post_type($p->ID)); ?>
              </div>
              <a class="sbdev-card-btn" href="<?php echo esc_url(get_permalink($p->ID)); ?>">Enquire Now</a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
