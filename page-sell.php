<?php get_header(); ?>






<section class="sell-wrap">
    <div class="sell-container">

        <!-- Breadcrumb / Back -->
        <div class="sell-topbar">
            <a class="sell-back" href="<?php echo home_url('/'); ?>">
                <span class="sell-back__icon">‹</span>
                Back to Search
            </a>

            <nav class="sell-breadcrumb" aria-label="Breadcrumb">
                <a href="#">Home</a>
                <span class="sell-sep">›</span>
                <a href="#">Services</a>
                <span class="sell-sep">›</span>
                <span aria-current="page">Sell</span>
            </nav>
        </div>

        <!-- Hero -->
        <div class="sell-hero">
            <!-- Left content -->
            <div class="sell-left">
                <h1 class="sell-title">
                    <span class="sell-title__line sell-title__accent">Sell your</span>
                    <span class="sell-title__line sell-title__accent">Property</span>
                    <span class="sell-title__line sell-title__dark">in Dubai</span>
                    <span class="sell-title__line sell-title__dark">with Confidence</span>
                </h1>

                <p class="sell-desc">
                    Sell your Dubai property as fast as possible with 100% transparency,
                    and keep informed with up-to-date market trends that may affect your
                    property’s sale value.
                </p>

                <div class="sell-actions">
                    <a class="sell-btn" href="<?php echo home_url('/'); ?>">
                        List Your Property
                        <span class="sell-btn__arrow">›</span>
                    </a>
                </div>
            </div>

            <!-- Right image -->
            <div class="sell-right">
                <div class="sell-media">
                    <img
                        src="<?php echo get_template_directory_uri() ?>/assets/img/sell-page/sell-hero.jpg"
                        alt="Dubai aerial view"
                        class="sell-img"
                        loading="lazy" />
                </div>
            </div>
        </div>

    </div>
</section>




<?php get_footer();
