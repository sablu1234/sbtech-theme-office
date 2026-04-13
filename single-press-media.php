<?php
/* single.php (Poppins • #7F2EF8 + Black/White • Flex Responsive) */
get_header();
?>

<article class="media_single">

    <!-- Featured image full width -->
    <div class="media_feature">
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Featured image">
    </div>

    <!-- Header -->
    <header class="media_container media_head">
        <div class="media_kicker">
            <span class="media_dot" aria-hidden="true"></span>
            Media & Press
        </div>

        <h1 class="media_title"><?php the_title(); ?></h1>

        <div class="media_author">
            <div class="media_avatar">
                <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="Author avatar">
            </div>
            <div class="media_author_meta">
                <p class="media_author_name"><?php the_author(); ?></p>
                <p class="media_author_line">Published on <span><?php echo get_the_date(); ?></span></p>
            </div>
        </div>

        <div class="media_divider"></div>
    </header>

    <!-- Content -->
    <section class="media_container media_body">
        <div class="media_content">
            <p>
                <?php the_content(); ?>
            </p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="media_container media_footer">
        <?php
        // $media_name = get_post_meta(get_the_ID(), 'data2', true);
        $press_name = get_post_meta($post->ID, 'press_name', true);
        $press_url = get_post_meta($post->ID, 'press_url', true);
        $img_id      = (int) get_post_meta(get_the_ID(), '_dev_img_id', true);
        ?>
         <div class="container">
            <div class="logo">
            <?php if(!empty($img_id)) : ?>
            <img src="<?php echo esc_url(wp_get_attachment_image_url($img_id,'medium')); ?>" alt="REM Times Logo">
            <?php endif; ?>
            </div>
            <p class="description">
            You can go to the source of the publication and read it in full.
            </p>
            <div class="btn-container">
            <a href="<?php echo home_url('/press_media'); ?>" class="btn back-btn">Go back</a>
            <?php if(!empty($press_name)) : ?>
            <a href="<?php echo $press_url ?>" class="btn">Go to <?php echo $press_name ?></a>
            <?php endif; ?>
            </div>
        </div>

        <a class="media_btn" href="<?php echo home_url('/media'); ?>">
            Back to Media
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </footer>

</article>
<?php get_footer(); ?>