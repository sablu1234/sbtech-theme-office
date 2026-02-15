<?php
$dev_id = get_the_ID();
$terms = sbtech_get_developer_areas_terms($dev_id, 2);

if (!$terms) return;
?>
<section class="sbdev-section">
  <div class="sbdev-container">
    <div class="sbdev-sec-head">
      <h2 class="sbdev-h2">Built in Districts</h2>
      <a class="sbdev-link" href="<?php echo esc_url(home_url('/')); ?>">Show All Areas</a>
    </div>

    <div class="sbdev-grid sbdev-grid--areas">
      <?php foreach ($terms as $t): ?>
        <?php
          // taxonomy image not standard → show placeholder gradient
          $link = get_term_link($t);
        ?>
        <article class="sbdev-area">
          <a class="sbdev-area-img" href="<?php echo esc_url($link); ?>"></a>
          <div class="sbdev-area-body">
            <div class="sbdev-area-title"><?php echo esc_html($t->name); ?></div>
            <div class="sbdev-area-sub">Explore properties</div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
