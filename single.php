<?php
/* single.php (Poppins • #7F2EF8 + Black/White • Flex Responsive) */
get_header();
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --purple: #7F2EF8;
        --black: #0b0b0f;
        --white: #ffffff;
        --ink: #0f0f15;
        --muted: rgba(15, 15, 21, .70);
        --muted2: rgba(15, 15, 21, .55);
        --border: rgba(15, 15, 21, .12);
        --shadow: 0 18px 55px rgba(0, 0, 0, .08);
        --bg: #fafafe;
        --focus: 0 0 0 4px rgba(127, 46, 248, .16);
    }

    .spWrap {
        font-family: "Poppins", sans-serif;
        background: var(--bg);
        padding: clamp(28px, 4.5vw, 64px) 0;
    }

    .spContainer {
        width: min(1180px, calc(100% - 32px));
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        gap: clamp(16px, 2.6vw, 26px);
        align-items: flex-start;
    }

    /* MAIN */
    .spMain {
        flex: 1 1 720px;
        min-width: 280px;
        background: var(--white);
        border: 1px solid rgba(15, 15, 21, .08);
        border-radius: 18px;
        box-shadow: var(--shadow);
        overflow: hidden;
    }

    .spHero {
        position: relative;
        width: 100%;
        aspect-ratio: 16/9;
        background: #f1f1f6;
        overflow: hidden;
    }

    .spHero img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: saturate(1.02) contrast(1.02);
        transform: scale(1.02);
    }

    .spHero::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(0, 0, 0, .00) 40%, rgba(0, 0, 0, .35) 100%);
        pointer-events: none;
    }

    .spBody {
        padding: clamp(18px, 2.4vw, 30px);
    }

    .spMeta {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: center;
        margin-bottom: 12px;
        color: rgba(15, 15, 21, .55);
        font-size: 12px;
    }

    .spCat a {
        color: var(--purple);
        text-decoration: none;
        font-weight: 700;
    }

    .spDot {
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: rgba(15, 15, 21, .35);
        display: inline-block;
    }

    .spTitle {
        margin: 0 0 10px;
        font-size: clamp(26px, 3.2vw, 44px);
        line-height: 1.12;
        font-weight: 800;
        color: var(--black);
        letter-spacing: -0.02em;
    }

    .spExcerpt {
        margin: 0 0 18px;
        color: var(--muted);
        line-height: 1.8;
        font-size: 14.5px;
    }

    /* CONTENT STYLING */
    .spContent {
        color: rgba(15, 15, 21, .78);
        line-height: 1.95;
        font-size: 15px;
    }

    .spContent p {
        margin: 0 0 16px;
    }

    .spContent h2,
    .spContent h3 {
        color: var(--black);
        margin: 26px 0 10px;
        line-height: 1.25;
    }

    .spContent a {
        color: var(--purple);
        font-weight: 700;
        text-decoration: none;
        border-bottom: 1px solid rgba(127, 46, 248, .35);
    }

    .spContent a:hover {
        border-bottom-color: rgba(127, 46, 248, .75);
    }

    .spContent blockquote {
        margin: 18px 0;
        padding: 14px 16px;
        border-left: 3px solid var(--purple);
        background: rgba(127, 46, 248, .06);
        border-radius: 12px;
        color: rgba(15, 15, 21, .75);
    }

    .spContent img {
        max-width: 100%;
        height: auto;
        border-radius: 14px;
        border: 1px solid rgba(15, 15, 21, .08);
    }

    .spTags {
        margin-top: 18px;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: center;
        padding-top: 18px;
        border-top: 1px solid rgba(15, 15, 21, .08);
    }

    .spTag {
        display: inline-flex;
        align-items: center;
        padding: 8px 12px;
        border-radius: 999px;
        border: 1px solid var(--border);
        background: rgba(255, 255, 255, .9);
        color: rgba(15, 15, 21, .72);
        font-size: 12px;
        text-decoration: none;
        font-weight: 600;
    }

    .spTag:hover {
        border-color: rgba(127, 46, 248, .35);
        color: var(--purple);
    }

    /* SIDEBAR */
    .spSide {
        flex: 1 1 320px;
        min-width: 280px;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .sideCard {
        background: var(--white);
        border: 1px solid rgba(15, 15, 21, .08);
        border-radius: 18px;
        box-shadow: var(--shadow);
        padding: 18px;
    }

    .sideTitle {
        margin: 0 0 12px;
        font-size: 14px;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: rgba(15, 15, 21, .62);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .sideTitle::before {
        content: "";
        width: 34px;
        height: 2px;
        border-radius: 999px;
        background: var(--purple);
    }

    /* Author */
    .authorBox {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .authorAvatar {
        width: 54px;
        height: 54px;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid rgba(15, 15, 21, .10);
        background: #f1f1f6;
        flex: 0 0 auto;
    }

    .authorAvatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .authorName {
        margin: 0;
        font-weight: 800;
        color: var(--black);
        font-size: 14px;
    }

    .authorRole {
        margin: 2px 0 0;
        font-size: 12px;
        color: rgba(15, 15, 21, .58);
    }

    /* Related posts */
    .relList {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .relItem {
        display: flex;
        gap: 12px;
        text-decoration: none;
        color: inherit;
        align-items: center;
    }

    .relThumb {
        width: 74px;
        height: 56px;
        border-radius: 12px;
        overflow: hidden;
        background: #f1f1f6;
        border: 1px solid rgba(15, 15, 21, .08);
        flex: 0 0 auto;
    }

    .relThumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .relT {
        margin: 0;
        font-weight: 750;
        color: var(--black);
        font-size: 13px;
        line-height: 1.3;
    }

    .relD {
        margin: 4px 0 0;
        font-size: 12px;
        color: rgba(15, 15, 21, .55);
    }

    .relItem:hover .relT {
        color: var(--purple);
    }

    /* CTA */
    .sideBtn {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        width: 100%;
        padding: 12px 14px;
        border-radius: 14px;
        background: var(--purple);
        color: var(--white);
        text-decoration: none;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
        font-size: 12px;
        border: 1px solid rgba(127, 46, 248, .25);
        transition: transform .18s ease, box-shadow .18s ease;
    }

    .sideBtn:hover {
        transform: translateY(-2px);
        box-shadow: 0 18px 45px rgba(127, 46, 248, .22);
    }

    /* Tablet/Mobile */
    @media (max-width: 980px) {
        .spContainer {
            flex-direction: column;
        }

        .spSide {
            width: 100%;
        }
    }

    @media (max-width: 560px) {
        .spContainer {
            width: calc(100% - 26px);
        }
    }
</style>

<section class="spWrap">
    <div class="spContainer">

        <?php while (have_posts()) : the_post(); ?>

            <article class="spMain">
                <div class="spHero">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php endif; ?>
                </div>

                <div class="spBody">
                    <div class="spMeta">
                        <span class="spCat"><?php echo wp_kses_post(get_the_category_list(', ')); ?></span>
                        <span class="spDot" aria-hidden="true"></span>
                        <span><?php echo esc_html(get_the_date()); ?></span>
                        <span class="spDot" aria-hidden="true"></span>
                        <span><?php echo esc_html(get_the_author()); ?></span>
                    </div>

                    <h1 class="spTitle"><?php the_title(); ?></h1>

                    <?php if (has_excerpt()) : ?>
                        <p class="spExcerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <?php endif; ?>

                    <div class="spContent">
                        <?php the_content(); ?>
                    </div>


                </div>
            </article>

            <!-- SIDEBAR -->


        <?php endwhile; ?>

    </div>
</section>

<?php get_footer(); ?>