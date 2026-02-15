<?php
if (!defined('ABSPATH')) exit;

$logo = get_the_post_thumbnail_url(get_the_ID(), 'medium');
if (!$logo) {
    $logo = get_template_directory_uri() . '/assets/img/placeholder-logo.png'; // optional placeholder
}
?>
<div class="developers-list__item developer-item">
    <a class="developer-item__link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title()); ?>">
        <img loading="lazy" src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
        <span><?php the_title(); ?></span>
    </a>
</div>
