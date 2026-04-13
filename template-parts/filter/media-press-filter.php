<?php

function press_media_shortcode() {

    ob_start();

    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    ?>

    <section class="news_section">

    <div class="news_container">
        <h2 class="media_heading" style="padding: 10px;">Latest Media press</h2>

    <div class="news_grid">

    <?php

    $args = [
    'post_type'      => 'press-media',
    'post_status'    => 'publish',
    // 'posts_per_page' => 6,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
    ];

    $q = new WP_Query($args);

    if ($q->have_posts()) :

    while ($q->have_posts()) : $q->the_post();

    $thumbnail   = get_the_post_thumbnail_url(get_the_ID(),'large');
    $title       = get_the_title();
    $permalink   = get_the_permalink();
    $img_id      = (int) get_post_meta(get_the_ID(), '_dev_img_id', true);
    $view_count  = get_post_meta(get_the_ID(), 'data1', true);
    $press_name  = get_post_meta(get_the_ID(), 'press_name', true);
       

    ?>

    <div class="news_card">

        <a href="<?php echo esc_url($permalink); ?>">
        <img class="news_img" src="<?php echo esc_url($thumbnail); ?>">
        </a>

        <div class="news_content">

        <h3 class="news_title"><a class="media_press_title_loop" href="<?php echo get_the_permalink( ); ?>"><?php echo esc_html($title); ?></a></h3>

        <div class="news_meta">

        <div class="news_source_wrap">

        <?php if(!empty($img_id)) : ?>
        <img class="news_source_img" src="<?php echo esc_url(wp_get_attachment_image_url($img_id,'medium')); ?>">
        <?php endif; ?>

        <div>
            
        <span class="news_source"><?php echo $press_name ? $press_name : 'Property Time' ?></span>
        <span class="news_date"><?php echo get_the_date('F d, Y H:i'); ?></span>
        </div>

        </div>

        <div class="news_views">
        <?php echo $view_count ? $view_count : '120'; ?>
    </div>

    </div>

    </div>

    </div>

    <?php endwhile; else : ?>

    <p>No Posts To Display.</p>

    <?php endif; ?>

    </div>


    <!-- Dynamic Pagination -->

    <?php

    $pages = paginate_links([
    'type'      => 'array',
    'total'     => $q->max_num_pages,
    'current'   => $paged,
    'prev_text' => '‹ Previous',
    'next_text' => 'Next ›',
    ]);

    if(!empty($pages)){

    echo '<div class="news_pagination">';

    foreach($pages as $page){

    $active = strpos($page,'current') !== false ? 'active' : '';

    echo str_replace('page-numbers','news_page '.$active,$page);

    }

    echo '</div>';

    }

    wp_reset_postdata();

    ?>

    </div>

    </section>

    <style>
        a.media_press_title_loop {
            color: black;
            text-decoration: none;
        }
        

        /* container */

        .news_container{
        max-width:1200px;
        margin:auto;
        padding:60px 20px;
        }

        /* grid */

        .news_grid{
        display:flex;
        flex-wrap:wrap;
        gap:30px;
        justify-content:space-between;
        }

        .news_card{
        flex:1 1 calc(50% - 30px);
        background:#fff;
        border:1px solid #eee;
        border-radius:10px;
        overflow:hidden;
        transition:0.3s;
        max-width:550px;
        }

        .news_card:hover{
        box-shadow:0 10px 25px rgba(0,0,0,0.08);
        }

        .news_img{
        width:100%;
        height:250px;
        object-fit:cover;
        display:block;
        }

        .news_content{
        padding:20px;
        }

        .news_title{
        font-size:18px;
        font-weight:600;
        line-height:1.5;
        margin-bottom:20px;
        }

        .news_meta{
        display:flex;
        justify-content:space-between;
        align-items:center;
        border-top:1px solid #eee;
        padding-top:15px;
        font-size:13px;
        }

        .news_source_wrap{
        display:flex;
        align-items:center;
        gap:10px;
        }

        .news_source_img{
        width:40px;
        height:40px;
        object-fit:contain;
        }

        .news_source{
        font-weight:600;
        font-size:13px;
        }

        .news_date{
        display:block;
        font-size:12px;
        color:#777;
        }

        .news_views{
        color:#777;
        }

        .news_pagination{
        margin-top:50px;
        display:flex;
        justify-content:center;
        align-items:center;
        gap:12px;
        flex-wrap:wrap;
        }

        .news_page{
        padding:8px 12px;
        border-radius:4px;
        text-decoration:none;
        color:#000;
        font-size:14px;
        }

        .news_page.active{
        background:#02B2EE;
        color:#fff;
        }

        .news_page:hover{
        color:#02B2EE;
        }

        @media (max-width:992px){

        .news_card{
        flex:1 1 calc(50% - 30px);
        }

        .news_img{
        height:220px;
        }

        }

        @media (max-width:600px){

        .news_container{
        padding:40px 15px;
        }

        .news_card{
        flex:1 1 100%;
        }

        .news_img{
        height:200px;
        }

        .news_title{
        font-size:16px;
        }

        }

        

    </style>

    <?php

    return ob_get_clean();

}

add_shortcode('press_media','press_media_shortcode');
