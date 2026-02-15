<?php get_header(); ?>

<?php get_template_part('template-parts/blogs/blog-loop-1'); ?>

<!-- CTA start -->
<section class="ctaStrip">
    <div class="ctaStrip__wrap">
        <h2 class="ctaStrip__title">Ready to Find Your Dream Home?</h2>
        <p class="ctaStrip__text">
            Let our team of experts guide you through Dubai's most exclusive properties.
        </p>
        <a class="ctaStrip__btn" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact Us Today</a>
    </div>
</section>
<!-- CTA end -->

<?php get_footer(); ?>