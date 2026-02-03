<?php


$cats = get_categories(['hide_empty' => true]);
?>

<section class="blWrap">
    <div class="blHead">
        <p class="blKicker">INSIGHTS</p>
        <h1 class="blTitle">Blog & Updates</h1>
        <p class="blSub">Latest market insights, guides and announcements.</p>
    </div>

    <div class="blBar">
        <div class="blFilters" role="tablist" aria-label="Blog categories">
            <button class="blFilter is-active" data-cat="all" type="button">All</button>
            <?php foreach ($cats as $c): ?>
                <button class="blFilter" data-cat="<?php echo esc_attr($c->slug); ?>" type="button">
                    <?php echo esc_html($c->name); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="blSearch">
            <input id="blSearchInput" type="search" placeholder="Search posts..." />
        </div>
    </div>

    <div id="blGrid" class="blGrid" aria-live="polite"></div>

    <div class="blPager">
        <button id="blPrev" class="blPbtn" type="button" disabled>Prev</button>
        <span id="blPageInfo" class="blPageInfo">Page 1</span>
        <button id="blNext" class="blPbtn" type="button">Next</button>
    </div>
</section>