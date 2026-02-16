<?php

/* 1) Enqueue inline CSS/JS */
add_action('wp_enqueue_scripts', function () {
    wp_register_style('media-ajax-inline', false, [], null);
    wp_enqueue_style('media-ajax-inline');

    wp_register_script('media-ajax-inline', false, [], null, true);
    wp_enqueue_script('media-ajax-inline');

    $css = <<<CSS
:root{
  --media-primary:var(--clr-primary);
  --media-black:var(--clr-black);
  --media-text:var(--clr-black);
  --media-muted:var(--clr-black);
  --media-border:#e5e7eb;
  --media-bg: var(--clr-white);
  --media-max:1200px;
}

/* layout */
.media_wrap{background:var(--media-bg);padding:24px 0;}
.media_container{max-width:var(--media-max);margin:0 auto;padding:0 16px;}
.media_top{
  display:flex;align-items:center;justify-content:space-between;
  gap:12px;flex-wrap:wrap;margin-bottom:14px;
}
.media_heading{margin:0;font-size:clamp(22px,3vw,34px);font-weight:600;letter-spacing:-.2px;color:var(--media-text);}
.media_filter{
  margin-left:auto;
  display:flex;align-items:center;gap:10px;
}
.media_select{
  border:1px solid var(--media-border);
  background:#fff;color:var(--media-text);
  padding:10px 12px;border-radius:10px;
  font-weight:700;min-width:220px;outline:none;
}
.media_select:focus{
  border-color: rgba(2,178,238,.55);
  box-shadow: 0 0 0 6px rgba(2,178,238,.12);
}

/* grid (2/2/1) */
.media_grid{
  display:grid;
  grid-template-columns:repeat(2, minmax(0, 1fr));
  gap:18px;
}
@media(max-width:980px){
  .media_grid{grid-template-columns:repeat(2, minmax(0,1fr));}
}
@media(max-width:640px){
  .media_grid{grid-template-columns:1fr;}
  .media_select{min-width:100%;}
}

/* card (no shadow) */
.media_card{
  border:1px solid var(--media-border);
  border-radius:14px;
  overflow:hidden;
  background:#fff;
  display:flex;flex-direction:column;
}
.media_thumb{
  display:block;width:100%;
  aspect-ratio:16/9;
  background:#f3f4f6;
}
.media_thumb img{
  width:100%;height:100%;
  object-fit:cover;display:block;
}

/* content */
.media_body{padding:14px;display:flex;flex-direction:column;gap:10px;flex:1;text-align:left;}
.media_post_title{margin:0;font-size:18px;line-height:1.25;font-weight:800;}
.media_post_title a{color:var(--media-text);text-decoration:none; font-weight:600;}
.media_post_title a:hover{color:var(--media-primary);}

.media_div{height:1px;background:var(--media-border);}

.media_meta{
  display:flex;align-items:center;justify-content:flex-start;
  gap:12px;flex-wrap:wrap;
}
.media_author{
  display:flex;align-items:center;gap:10px;
}
.media_avatar{
  width:40px;height:40px;border-radius:10px;
  overflow:hidden;border:1px solid var(--media-border);background:#fff;flex:0 0 auto;
}
.media_avatar img{width:100%;height:100%;object-fit:cover;display:block;}
.media_author_name{margin:0;font-weight:800;font-size:13px;color:var(--media-text);line-height:1.2;}
.media_date{margin:2px 0 0;font-weight:600;font-size:12px;color:rgba(0,0,0,.65);line-height:1.2;}

/* pagination */
.media_pagination{
  display:flex;justify-content:center;align-items:center;
  gap:8px;flex-wrap:wrap;margin-top:18px;
}
.media_pagebtn{
  min-width:40px;height:40px;padding:0 12px;
  border-radius:12px;border:1px solid var(--media-border);
  background:#fff;color:var(--media-text);
  font-weight:800;cursor:pointer;transition:.18s ease;
  display:flex;align-items:center;justify-content:center;
}
.media_pagebtn:hover{border-color: rgba(2,178,238,.45);}
.media_pagebtn.is-active{border-color: rgba(2,178,238,.65);box-shadow: 0 0 0 6px rgba(2,178,238,.10);}
.media_pagebtn:disabled{opacity:.45;cursor:not-allowed;}

.media_state{margin-top:10px;color:rgba(0,0,0,.65);font-weight:600;font-size:13px;text-align:left;}
CSS;

    wp_add_inline_style('media-ajax-inline', $css);

    wp_localize_script('media-ajax-inline', 'MEDIA_AJAX', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('media_nonce'),
    ]);

    $js = <<<JS
(function(){
  const wrap = document.querySelector('[data-media-wrap]');
  if(!wrap) return;

  const grid  = wrap.querySelector('[data-media-grid]');
  const pager = wrap.querySelector('[data-media-pager]');
  const state = wrap.querySelector('[data-media-state]');
  const select= wrap.querySelector('[data-media-cat]');

  let currentCat = select ? (select.value || '0') : '0';
  let currentPage = 1;

  async function post(action, data){
    const fd = new FormData();
    fd.append('action', action);
    fd.append('nonce', MEDIA_AJAX.nonce);
    Object.keys(data||{}).forEach(k => fd.append(k, data[k]));
    const res = await fetch(MEDIA_AJAX.ajaxurl, { method:'POST', body: fd });
    return res.json();
  }

  function setState(txt){ if(state) state.textContent = txt || ''; }

  function renderPagination(current, max){
    if(!max || max <= 1){ pager.innerHTML = ''; return; }

    const windowSize = 5;
    let start = Math.max(1, current - Math.floor(windowSize/2));
    let end   = Math.min(max, start + windowSize - 1);
    start     = Math.max(1, end - windowSize + 1);

    let html = '';
    html += '<button class="media_pagebtn" data-media-page="'+(current-1)+'" '+(current<=1?'disabled':'')+'>Prev</button>';

    if(start > 1){
      html += '<button class="media_pagebtn" data-media-page="1">1</button>';
      if(start > 2) html += '<button class="media_pagebtn" disabled>…</button>';
    }

    for(let p=start; p<=end; p++){
      html += '<button class="media_pagebtn '+(p===current?'is-active':'')+'" data-media-page="'+p+'">'+p+'</button>';
    }

    if(end < max){
      if(end < max-1) html += '<button class="media_pagebtn" disabled>…</button>';
      html += '<button class="media_pagebtn" data-media-page="'+max+'">'+max+'</button>';
    }

    html += '<button class="media_pagebtn" data-media-page="'+(current+1)+'" '+(current>=max?'disabled':'')+'>Next</button>';
    pager.innerHTML = html;
  }

  async function load(page){
    currentPage = page || 1;
    setState('Loading...');
    const r = await post('media_posts_results', { cat: currentCat, page: currentPage });

    if(r && r.success){
      grid.innerHTML = r.data.html;
      renderPagination(r.data.page, r.data.max_pages);
      setState(r.data.total ? (r.data.total + ' post(s) found') : 'No posts found');
    }else{
      setState('Something went wrong');
    }
  }

  if(select){
    select.addEventListener('change', function(){
      currentCat = this.value || '0';
      load(1);
    });
  }

  pager.addEventListener('click', function(e){
    const btn = e.target.closest('[data-media-page]');
    if(!btn || btn.disabled) return;
    const p = parseInt(btn.getAttribute('data-media-page') || '1', 10);
    if(!p || p < 1) return;
    load(p);
  });

  load(1);
})();
JS;

    wp_add_inline_script('media-ajax-inline', $js);
});

/* 2) Shortcode UI */
add_shortcode('media_loop_ajax', function ($atts) {
    $atts = shortcode_atts([
        'posts_per_page' => 6,     // per page
        'title'          => 'Latest Media',
    ], $atts);

    // Categories list
    $cats = get_categories(['hide_empty' => true]);

    ob_start(); ?>
    <section class="media_wrap" data-media-wrap>
        <div class="media_container">

            <div class="media_top">
                <h2 class="media_heading"><?php echo esc_html($atts['title']); ?></h2>

                <div class="media_filter">
                    <select class="media_select" data-media-cat>
                        <option value="0">All Categories</option>
                        <?php foreach ($cats as $c): ?>
                            <option value="<?php echo (int)$c->term_id; ?>">
                                <?php echo esc_html($c->name); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="media_state" data-media-state></div>
            <div class="media_grid" data-media-grid></div>
            <div class="media_pagination" data-media-pager></div>

        </div>
    </section>
    <?php
    return ob_get_clean();
});

/* 3) AJAX handler: Results + Pagination */
add_action('wp_ajax_media_posts_results', 'media_posts_results_cb');
add_action('wp_ajax_nopriv_media_posts_results', 'media_posts_results_cb');

function media_posts_results_cb() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'media_nonce')) {
        wp_send_json_error(['msg' => 'bad nonce']);
    }

    $cat  = isset($_POST['cat']) ? (int) $_POST['cat'] : 0;
    $page = isset($_POST['page']) ? max(1, (int) $_POST['page']) : 1;

    // Match shortcode default per page (6). If you want dynamic, set a constant here:
    $per_page = 6;

    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => $per_page,
        'paged'          => $page,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];

    if ($cat > 0) {
        $args['cat'] = $cat;
    }

    $q = new WP_Query($args);

    ob_start();

    if ($q->have_posts()):
        while ($q->have_posts()): $q->the_post();
            $pid   = get_the_ID();
            $title = get_the_title();
            $link  = get_permalink();

            $thumb = get_the_post_thumbnail_url($pid, 'large');
            $thumb_html = $thumb ? '<img src="' . esc_url($thumb) . '" alt="' . esc_attr($title) . '">' : '';

            $author_id   = (int) get_post_field('post_author', $pid);
            $author_name = get_the_author_meta('display_name', $author_id);
            $avatar_url  = get_avatar_url($author_id, ['size' => 80]);

    ?>
            <article class="media_card">
                <a class="media_thumb" href="<?php echo esc_url($link); ?>">
                    <?php echo $thumb_html; ?>
                </a>

                <div class="media_body">
                    <h3 class="media_post_title">
                        <a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a>
                    </h3>

                    <div class="media_div"></div>

                    <div class="media_meta">
                        <div class="media_author">
                            <div class="media_avatar">
                                <img src="<?php echo esc_url($avatar_url); ?>" alt="<?php echo esc_attr($author_name); ?>">
                            </div>
                            <div>
                                <p class="media_author_name"><?php echo esc_html($author_name); ?></p>
                                <p class="media_date">Published on <?php echo esc_html(get_the_date('F j, Y H:i', $pid)); ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </article>
<?php
        endwhile;
        wp_reset_postdata();
    else:
        echo '<div class="media_state">No posts found.</div>';
    endif;

    $html = ob_get_clean();

    wp_send_json_success([
        'html'      => $html,
        'total'     => (int) $q->found_posts,
        'page'      => (int) $page,
        'max_pages' => (int) $q->max_num_pages,
    ]);
}
