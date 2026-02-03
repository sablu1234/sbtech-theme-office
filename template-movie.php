<?php
/*
* Template Name: Template Movies
*/
get_header();


$args = [
    'post_type' => 'movie',
    'posts_per_page' => -1,

];

$movies = new WP_Query($args);
?>
<?php if ($movies->have_posts()) : $movies->the_post(); ?>
    <div class="js-movies">
        <?php while ($movies->have_posts()) : $movies->the_post();
            get_template_part('template-parts/loop', 'movie');
        endwhile; ?>
    </div>
<?php endif;


get_footer();
