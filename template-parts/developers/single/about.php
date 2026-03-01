<?php
$content = get_the_content();
if (!trim(wp_strip_all_tags($content))) return;
?>
<section class="sbdev-section">
  <div class="sbdev-container">
    <h2 class="sbdev-h2">About the developer</h2>
    <div class="sbdev-content">
      <?php the_content(); ?>
    </div>
  </div>
</section>
