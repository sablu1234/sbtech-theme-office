<div class="column">
    <?php if (has_post_thumbnail()) : ?>
        <picture><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></picture>
    <?php endif; ?>
    <h4><?php the_title(); ?></h4>
    <?php
    $cats = get_the_terms(get_the_ID(), 'movie_type');
    $rating = get_post_meta(get_the_ID(), '_field_1', true);
    if (!empty($cats) || !empty($rating)) :
    ?>

        <ul>
            <?php if (!empty($cats)) : ?>
                <li>
                    <strong>Category:</strong>
                    <?php foreach ($cats as $cat) {
                        echo "<sapn>$cat->name; </sapn>";
                    }
                    ?>
                </li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
</div>