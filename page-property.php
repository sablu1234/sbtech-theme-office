<?php get_header(); ?>
<!-- Hero section start -->
<section class="contactInfo">
    <div class="contactInfo__wrap">
        <p class="contactInfo__kicker">GET IN TOUCH</p>
        <h2 class="contactInfo__title">Property Experts</h2>
        <p class="contactInfo__sub">
            Whether you’re interested in buying, selling, renting, or investing in premium properties, our experienced real estate advisors are here to guide you through every step with confidence and clarity.
        </p>


    </div>
</section>
<!-- Hero section end -->

<!-- property filter shortcode start -->
<section>
    <?php echo do_shortcode('[reaf_property_filters per_page="12" default_sort="recent"]'); ?>
</section>
<!-- property filter shortcode end -->

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

<?php get_footer();
