<?php get_header(); ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<section class="srWrap">
    <div class="srHead">
        <p class="srKicker">SEARCH</p>
        <h1 class="srTitle">
            Results for: <span class="srQuery"><?php echo esc_html(get_search_query()); ?></span>
        </h1>

        <p class="srSub">
            <?php global $wp_query; ?>
            <?php echo (int) $wp_query->found_posts; ?> results found
        </p>

        <form class="srBar" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input class="srInput" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="Search..." />
            <button class="srBtn" type="submit">Search <span aria-hidden="true">→</span></button>
        </form>
    </div>

    <div class="srGrid">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="srCard">
                    <a class="srCard__img" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large'); ?>
                        <?php else : ?>
                            <span class="srCard__ph">No Image</span>
                        <?php endif; ?>
                    </a>

                    <div class="srCard__body">
                        <div class="srMeta">
                            <span class="srType"><?php echo esc_html(get_post_type()); ?></span>
                            <span class="srDot" aria-hidden="true"></span>
                            <span class="srDate"><?php echo esc_html(get_the_date()); ?></span>
                        </div>

                        <h3 class="srCard__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>

                        <p class="srCard__ex">
                            <?php echo esc_html(wp_trim_words(get_the_excerpt(), 18)); ?>
                        </p>

                        <a class="srCard__read" href="<?php the_permalink(); ?>">
                            View Details <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="srEmpty">
                No results found. Try different keywords.
            </div>
        <?php endif; ?>
    </div>

    <div class="srPager">
        <?php
        the_posts_pagination([
            'mid_size'  => 1,
            'prev_text' => 'Prev',
            'next_text' => 'Next',
        ]);
        ?>
    </div>
</section>

<style>
    :root {
        --purple: #7F2EF8;
        --black: #0b0b0f;
        --white: #ffffff;
        --ink: #0f0f15;
        --muted: rgba(15, 15, 21, .68);
        --border: rgba(15, 15, 21, .12);
        --shadow: 0 18px 55px rgba(0, 0, 0, .08);
        --bg: #fafafe;
    }

    * {
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    .srWrap {
        background: var(--bg);
        padding: clamp(42px, 6vw, 90px) 0;
    }

    .srHead {
        width: min(1180px, calc(100% - 32px));
        margin: 0 auto 22px;
    }

    .srKicker {
        margin: 0 0 10px;
        font-size: 12px;
        letter-spacing: .30em;
        text-transform: uppercase;
        color: rgba(15, 15, 21, .60);
    }

    .srTitle {
        margin: 0 0 10px;
        font-size: clamp(26px, 3.2vw, 46px);
        line-height: 1.10;
        font-weight: 800;
        color: var(--black);
        letter-spacing: -0.02em;
    }

    .srQuery {
        color: var(--purple);
    }

    .srSub {
        margin: 0 0 16px;
        color: var(--muted);
    }

    /* Search bar (FLEX) */
    .srBar {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        align-items: center;
    }

    .srInput {
        flex: 1 1 320px;
        min-width: 240px;
        padding: 12px 14px;
        border-radius: 14px;
        border: 1px solid var(--border);
        outline: none;
        font-size: 14px;
        background: var(--white);
    }

    .srInput:focus {
        border-color: rgba(127, 46, 248, .55);
        box-shadow: 0 0 0 4px rgba(127, 46, 248, .16);
    }

    .srBtn {
        padding: 12px 16px;
        border-radius: 14px;
        border: 1px solid rgba(127, 46, 248, .26);
        background: var(--purple);
        color: var(--white);
        font-weight: 700;
        letter-spacing: .10em;
        text-transform: uppercase;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Results (FLEX grid) */
    .srGrid {
        width: min(1180px, calc(100% - 32px));
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        align-items: stretch;
    }

    .srCard {
        flex: 1 1 320px;
        min-width: 260px;
        max-width: 380px;
        background: var(--white);
        border: 1px solid rgba(15, 15, 21, .08);
        border-radius: 18px;
        box-shadow: var(--shadow);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform .2s ease, border-color .2s ease;
    }

    .srCard:hover {
        transform: translateY(-3px);
        border-color: rgba(127, 46, 248, .32);
    }

    .srCard__img {
        display: block;
        width: 100%;
        aspect-ratio: 16/10;
        background: #f1f1f6;
        overflow: hidden;
    }

    .srCard__img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1.02);
        transition: transform .45s ease;
    }

    .srCard:hover .srCard__img img {
        transform: scale(1.08);
    }

    .srCard__ph {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(15, 15, 21, .45);
        font-weight: 600;
        font-size: 13px;
    }

    .srCard__body {
        padding: 16px 16px 18px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        flex: 1;
    }

    .srMeta {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 12px;
        color: rgba(15, 15, 21, .55);
        text-transform: capitalize;
    }

    .srType {
        color: var(--purple);
        font-weight: 800;
    }

    .srDot {
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: rgba(15, 15, 21, .35);
    }

    .srCard__title {
        margin: 0;
        font-size: 16px;
        font-weight: 800;
        line-height: 1.3;
    }

    .srCard__title a {
        color: var(--black);
        text-decoration: none;
    }

    .srCard__ex {
        margin: 0;
        color: var(--muted);
        line-height: 1.7;
        font-size: 13.5px;
    }

    .srCard__read {
        margin-top: auto;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--purple);
        font-weight: 800;
        text-decoration: none;
        font-size: 13px;
    }

    .srEmpty {
        width: 100%;
        padding: 18px;
        border: 1px dashed rgba(15, 15, 21, .18);
        border-radius: 14px;
        background: rgba(255, 255, 255, .7);
        color: rgba(15, 15, 21, .60);
    }

    /* Pagination */
    .srPager {
        width: min(1180px, calc(100% - 32px));
        margin: 22px auto 0;
    }

    .srPager .navigation {
        display: flex;
        justify-content: center;
    }

    .srPager .page-numbers {
        display: inline-flex;
        gap: 10px;
        justify-content: center;
        align-items: center;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .srPager a.page-numbers,
    .srPager span.page-numbers {
        border: 1px solid var(--border);
        background: var(--white);
        padding: 10px 12px;
        border-radius: 12px;
        text-decoration: none;
        color: var(--black);
        font-weight: 700;
        margin-right: 8px;
    }

    .srPager span.current {
        background: var(--purple);
        color: var(--white);
        border-color: rgba(127, 46, 248, .55);
    }

    /* Mobile */
    @media (max-width:560px) {

        .srHead,
        .srGrid,
        .srPager {
            width: calc(100% - 26px);
        }

        .srBtn {
            width: 100%;
            justify-content: center;
        }

        .srCard {
            flex: 1 1 100%;
            max-width: 100%;
        }
    }
</style>

<?php get_footer(); ?>