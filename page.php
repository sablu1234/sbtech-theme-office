<?php get_header(); ?>


<section class="container">
    <?php echo do_shortcode('[porpertypi_ajax_filter_dynamic]'); ?>
</section>

<!-- Newsletter section start -->
<?php echo do_shortcode('[newsletter_form]'); ?>
<!-- Newsletter section end -->


<?php get_footer();
