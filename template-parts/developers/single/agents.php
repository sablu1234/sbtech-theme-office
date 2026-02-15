<?php
$dev_id = get_the_ID();
$agents = sbtech_get_developer_agents($dev_id, 3);

if (!$agents) return;
?>
<section class="sbdev-section">
  <div class="sbdev-container">
    <h2 class="sbdev-h2">Agents Working with <?php the_title(); ?></h2>

    <div class="sbdev-grid sbdev-grid--agents">
      <?php foreach ($agents as $a): ?>
        <?php $img = get_the_post_thumbnail_url($a->ID, 'medium'); ?>
        <article class="sbdev-agent">
          <div class="sbdev-agent-img">
            <?php if ($img): ?>
              <img src="<?php echo esc_url($img); ?>" alt="">
            <?php endif; ?>
          </div>
          <div class="sbdev-agent-name"><?php echo esc_html(get_the_title($a->ID)); ?></div>
          <a class="sbdev-agent-link" href="<?php echo esc_url(get_permalink($a->ID)); ?>">View Profile</a>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
