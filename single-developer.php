<?php
get_header();

the_post();
$dev_id = get_the_ID();
?>

<main class="sbdev-wrap">
  <?php get_template_part('template-parts/developers/single/hero'); ?>

  <?php get_template_part('template-parts/developers/single/latest-projects'); ?>

  <?php get_template_part('template-parts/developers/single/agents'); ?>

  <?php get_template_part('template-parts/developers/single/built-districts'); ?>

  <?php get_template_part('template-parts/developers/single/about'); ?>

  <?php get_template_part('template-parts/developers/single/contact'); ?>
</main>

<?php
get_footer();
