<?php get_header(); ?>


<section class="container">
    <?php echo do_shortcode('[porpertypi_ajax_filter_dynamic]'); ?>
</section>

<!-- Newsletter section start -->
<section class="rent-newsletter" aria-label="rent newsletter">
    <div class="rent-container">
        <div class="rent-newsletter__box">
            <div class="rent-newsletter__left">
                <h3 class="rent-newsletter__title">Our newsletter</h3>
                <p class="rent-newsletter__sub">Sign up for weekly market updates, new rentals, and area insights.</p>
            </div>

            <form class="rent-newsletter__form" action="#" method="post">
                <label class="rent-newsletter__field" aria-label="Name">
                    <input class="rent-newsletter__input" type="text" name="name" placeholder="Enter your Name*" required />
                </label>

                <label class="rent-newsletter__field" aria-label="Email">
                    <input class="rent-newsletter__input" type="email" name="email" placeholder="Enter your E-mail*" required />
                </label>

                <button class="rent-newsletter__btn" type="submit">
                    <span>SUBSCRIBE</span>
                    <svg class="rent-newsletter__icon" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
                        <path d="M4 8l8 5 8-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <path d="M4 8v10h16V8" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</section>
<!-- Newsletter section end -->


<?php get_footer();
