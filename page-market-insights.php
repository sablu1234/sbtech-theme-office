<?php get_header(); ?>

 <!-- Media shortcode start -->
<section class="container">
    <?php echo do_shortcode('[media_loop_ajax]'); ?>
</section>
<!-- Media shortcode end -->
 
<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->

<?php get_footer();
