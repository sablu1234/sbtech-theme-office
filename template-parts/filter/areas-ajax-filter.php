<?php

/**
 * CPT: area
 * Shortcode: [areas_page]
 * AJAX: suggestions + results + pagination
 */

add_action('wp_enqueue_scripts', function () {
  wp_register_style('areas-inline', false, [], null);
  wp_enqueue_style('areas-inline');

  wp_register_script('areas-inline', false, [], null, true);
  wp_enqueue_script('areas-inline');

  // ---------- CSS ----------
  $css = <<<CSS
:root{
  --areas-primary:#02B2EE;
  --areas-black:#0b0f14;
  --areas-text:#111827;
  --areas-muted:#6b7280;
  --areas-border:#e5e7eb;
  --areas-bg:#ffffff;
  --areas-radius:16px;
  --areas-shadow: 0 16px 40px rgba(11,15,20,.10);
  --areas-max:1200px;
}
.areas_container{max-width:var(--areas-max);margin:0 auto;padding:0 16px;}
.areas_page{padding:22px 0 34px;background:var(--areas-bg);}

/* Hero */
.areas_hero{position:relative;border-radius:var(--areas-radius);overflow:hidden;box-shadow:var(--areas-shadow);border:1px solid rgba(229,231,235,.9);background:#0b0f14;}
.areas_hero_media{
  min-height:240px;
  background:linear-gradient(0deg, rgba(11,15,20,.55), rgba(11,15,20,.55)),
    url('https://images.unsplash.com/photo-1504272017917-90b2b2677a0b?auto=format&fit=crop&w=1800&q=70');
  background-size:cover;background-position:center;
}
.areas_hero_inner{position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;padding:18px;text-align:center;}
.areas_hero_title{margin:0;font-weight:1000;letter-spacing:-.4px;color:#fff;font-size:clamp(22px,3vw,40px);text-shadow:0 10px 30px rgba(0,0,0,.25);}

/* Search */
.areas_search_wrap{width:min(860px, 100%); position:relative;}
.areas_search{
  width:100%; padding:14px 16px 14px 44px;
  border-radius:12px;
  border:1px solid rgba(255,255,255,.20);
  background:rgba(255,255,255,.92);
  outline:none; font-weight:900; color:var(--areas-text);
}
.areas_search:focus{border-color:rgba(2,178,238,.55);box-shadow:0 0 0 6px rgba(2,178,238,.18);}
.areas_search_icon{position:absolute;left:14px;top:50%;transform:translateY(-50%);width:18px;height:18px;opacity:.65;}
.areas_suggest{
  position:absolute; top:calc(100% + 8px); left:0; right:0;
  background:#fff; border:1px solid var(--areas-border); border-radius:12px;
  box-shadow:0 18px 45px rgba(11,15,20,.12); overflow:hidden;
  display:none; z-index:10;
}
.areas_suggest.is-open{display:block;}
.areas_suggest_item{display:flex;align-items:center;justify-content:space-between;gap:10px;padding:12px 14px;cursor:pointer;font-weight:900;color:var(--areas-text);}
.areas_suggest_item:hover{background:rgba(2,178,238,.08);}
.areas_suggest_item small{color:var(--areas-muted);font-weight:800;}

/* GRID (3/2/1) */
.areas_grid{display:grid;grid-template-columns:repeat(3, minmax(0, 1fr));gap:16px;margin-top:18px;}
@media (max-width:980px){.areas_grid{grid-template-columns:repeat(2, minmax(0,1fr));}.areas_hero_media{min-height:220px;}}
@media (max-width:620px){.areas_grid{grid-template-columns:1fr;}.areas_hero_media{min-height:210px;}}

/* Card */
.areas_card{
  background:#fff;border:1px solid rgba(229,231,235,.95);
  border-radius:var(--areas-radius);overflow:hidden;
  box-shadow:0 10px 24px rgba(11,15,20,.06);
  transition:.18s ease; display:flex; flex-direction:column;
}
.areas_card:hover{transform:translateY(-2px);border-color:rgba(2,178,238,.35);box-shadow:0 16px 35px rgba(11,15,20,.10);}
.areas_thumb{display:block;aspect-ratio:16/9;background:linear-gradient(135deg,#0b0f14,#1f2a37);}
.areas_thumb img{width:100%;height:100%;object-fit:cover;display:block;}
.areas_actions a {font-weight: 600;}
.areas_actions .areas_btn_primary:hover {color: white;}
.areas_body{padding:14px;display:flex;flex-direction:column;gap:8px;flex:1;}
.areas_title_link{color:var(--areas-text);text-decoration:none;font-weight:1000;letter-spacing:-.15px;font-size:16px;line-height:1.25;}
.areas_title_link:hover{color:var(--areas-black);text-decoration:underline;}
.areas_meta{margin:0;color:var(--areas-muted);font-weight:800;font-size:13px;}
.areas_row{display:flex;align-items:center;justify-content:space-between;gap:10px;flex-wrap:wrap;}
.areas_link{color:var(--areas-primary);font-weight:1000;text-decoration:none;font-size:13px;}
.areas_link:hover{text-decoration:underline;}
.areas_actions{margin-top:auto;display:flex;gap:10px;}
.areas_btn{
  flex:1 1 auto;border-radius:12px;padding:11px 12px;font-weight:1000;
  border:1px solid var(--areas-border);background:#fff;cursor:pointer;
  transition:.18s ease;text-align:center;text-decoration:none;color:var(--areas-text);
}
.areas_btn:hover{border-color:rgba(2,178,238,.45);box-shadow:0 12px 26px rgba(2,178,238,.14);}
.areas_btn_primary{border:0;background:var(--clr-primary);color:#fff;}
.areas_btn_primary:hover{box-shadow:0 14px 30px rgba(2,178,238,.25);}

/* Pagination */
.areas_pagination{display:flex;gap:8px;flex-wrap:wrap;justify-content:center;align-items:center;margin-top:18px;}
.areas_pagebtn{
  min-width:40px;height:40px;padding:0 12px;
  border-radius:12px;border:1px solid var(--areas-border);
  background:#fff;color:var(--areas-text);
  font-weight:1000;cursor:pointer;transition:.18s ease;
  display:flex;align-items:center;justify-content:center;
}
.areas_pagebtn:hover{border-color:rgba(2,178,238,.45);box-shadow:0 12px 26px rgba(2,178,238,.12);}
.areas_pagebtn.is-active{border-color:rgba(2,178,238,.55);box-shadow:0 0 0 6px rgba(2,178,238,.12);}
.areas_pagebtn:disabled{opacity:.45;cursor:not-allowed;box-shadow:none;}

.areas_state{margin-top:14px;color:var(--areas-muted);font-weight:900;font-size:13px;}
CSS;

  wp_add_inline_style('areas-inline', $css);

  wp_localize_script('areas-inline', 'AREAS_AJAX', [
    'ajaxurl' => admin_url('admin-ajax.php'),
    'nonce'   => wp_create_nonce('areas_nonce'),
  ]);

  // ---------- JS ----------
  $js = <<<JS
(function(){
  const input = document.querySelector('[data-areas-search]');
  const suggestBox = document.querySelector('[data-areas-suggest]');
  const grid = document.querySelector('[data-areas-grid]');
  const state = document.querySelector('[data-areas-state]');
  const pager = document.querySelector('[data-areas-pagination]');
  if(!input || !suggestBox || !grid || !pager) return;

  let tSuggest=null, tResults=null;
  let currentPage = 1;
  let currentQuery = '';

  const esc = (s='') => (''+s).replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[m]));
  const closeSuggest = () => suggestBox.classList.remove('is-open');
  const setState = (txt) => { if(state) state.textContent = txt || ''; };

  async function post(action, data){
    const fd = new FormData();
    fd.append('action', action);
    fd.append('nonce', AREAS_AJAX.nonce);
    Object.keys(data||{}).forEach(k => fd.append(k, data[k]));
    const res = await fetch(AREAS_AJAX.ajaxurl, { method:'POST', body: fd });
    return res.json();
  }

  function renderSuggest(items){
    if(!items || !items.length){
      suggestBox.innerHTML = '';
      closeSuggest();
      return;
    }
    suggestBox.innerHTML = items.map(it => (
      '<div class="areas_suggest_item" data-areas-pick="'+esc(it.title)+'">' +
        '<span>'+esc(it.title)+'</span>' +
        '<small>Area</small>' +
      '</div>'
    )).join('');
    suggestBox.classList.add('is-open');
  }

  function renderPagination(current, max){
    if(!max || max <= 1){
      pager.innerHTML = '';
      return;
    }

    const windowSize = 5; // show 5 page numbers
    let start = Math.max(1, current - Math.floor(windowSize/2));
    let end = Math.min(max, start + windowSize - 1);
    start = Math.max(1, end - windowSize + 1);

    let html = '';
    html += '<button class="areas_pagebtn" data-areas-page="'+(current-1)+'" '+(current<=1?'disabled':'')+'>Prev</button>';

    if(start > 1){
      html += '<button class="areas_pagebtn" data-areas-page="1">1</button>';
      if(start > 2) html += '<button class="areas_pagebtn" disabled>…</button>';
    }

    for(let p=start; p<=end; p++){
      html += '<button class="areas_pagebtn '+(p===current?'is-active':'')+'" data-areas-page="'+p+'">'+p+'</button>';
    }

    if(end < max){
      if(end < max-1) html += '<button class="areas_pagebtn" disabled>…</button>';
      html += '<button class="areas_pagebtn" data-areas-page="'+max+'">'+max+'</button>';
    }

    html += '<button class="areas_pagebtn" data-areas-page="'+(current+1)+'" '+(current>=max?'disabled':'')+'>Next</button>';
    pager.innerHTML = html;
  }

  async function loadResults(q, page){
    currentQuery = q || '';
    currentPage = page || 1;

    setState('Loading...');
    const r = await post('areas_results', { q: currentQuery, page: currentPage });

    if(r && r.success){
      grid.innerHTML = r.data.html;
      renderPagination(r.data.page, r.data.max_pages);
      setState(r.data.total ? (r.data.total + ' area(s) found') : 'No areas found');
    }else{
      setState('Something went wrong');
    }
  }

  async function loadSuggest(q){
    const r = await post('areas_suggest', { q: q || '' });
    if(r && r.success) renderSuggest(r.data.items || []);
  }

  input.addEventListener('input', function(){
    const q = this.value.trim();

    clearTimeout(tSuggest);
    clearTimeout(tResults);

    // suggestions
    tSuggest = setTimeout(() => {
      if(q.length < 1) { renderSuggest([]); return; }
      loadSuggest(q);
    }, 150);

    // results (reset page=1)
    tResults = setTimeout(() => {
      loadResults(q, 1);
    }, 250);
  });

  suggestBox.addEventListener('click', function(e){
    const item = e.target.closest('[data-areas-pick]');
    if(!item) return;
    const val = item.getAttribute('data-areas-pick') || '';
    input.value = val;
    closeSuggest();
    loadResults(val, 1);
  });

  document.addEventListener('click', function(e){
    if(e.target.closest('[data-areas-search-wrap]')) return;
    closeSuggest();
  });

  pager.addEventListener('click', function(e){
    const btn = e.target.closest('[data-areas-page]');
    if(!btn || btn.disabled) return;
    const p = parseInt(btn.getAttribute('data-areas-page') || '1', 10);
    if(!p || p < 1) return;
    loadResults(currentQuery, p);
  });

  // initial load
  loadResults('', 1);
})();
JS;

  wp_add_inline_script('areas-inline', $js);
});

/* Shortcode */
add_shortcode('areas_page', function () {
  ob_start(); ?>
  <section class="areas_page">
    <div class="areas_container">

      <div class="areas_hero">
        <div class="areas_hero_media" aria-hidden="true"></div>
        <div class="areas_hero_inner">
          <h1 class="areas_hero_title">Areas in Dubai</h1>

          <div class="areas_search_wrap" data-areas-search-wrap>
            <svg class="areas_search_icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M21 21l-4.3-4.3M10.8 18.2a7.4 7.4 0 1 1 0-14.8 7.4 7.4 0 0 1 0 14.8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>
            <input class="areas_search" type="search" placeholder="Search Area Name" data-areas-search />
            <div class="areas_suggest" data-areas-suggest></div>
          </div>
        </div>
      </div>

      <div class="areas_state" data-areas-state></div>
      <div class="areas_grid" data-areas-grid></div>
      <div class="areas_pagination" data-areas-pagination></div>

    </div>
  </section>
  <?php
  return ob_get_clean();
});

/* AJAX: Suggestions */
add_action('wp_ajax_areas_suggest', 'areas_ajax_suggest');
add_action('wp_ajax_nopriv_areas_suggest', 'areas_ajax_suggest');
function areas_ajax_suggest() {
  if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'areas_nonce')) {
    wp_send_json_error(['msg' => 'bad nonce']);
  }

  $q = isset($_POST['q']) ? sanitize_text_field(wp_unslash($_POST['q'])) : '';
  if ($q === '') wp_send_json_success(['items' => []]);

  $posts = get_posts([
    'post_type'      => 'area',
    'post_status'    => 'publish',
    's'              => $q,
    'posts_per_page' => 8,
  ]);

  $items = array_map(function ($p) {
    return ['id' => $p->ID, 'title' => get_the_title($p)];
  }, $posts);

  wp_send_json_success(['items' => $items]);
}

/* AJAX: Results + Pagination */
add_action('wp_ajax_areas_results', 'areas_ajax_results');
add_action('wp_ajax_nopriv_areas_results', 'areas_ajax_results');
function areas_ajax_results() {
  if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'areas_nonce')) {
    wp_send_json_error(['msg' => 'bad nonce']);
  }

  $q    = isset($_POST['q']) ? sanitize_text_field(wp_unslash($_POST['q'])) : '';
  $page = isset($_POST['page']) ? max(1, (int)$_POST['page']) : 1;

  $args = [
    'post_type'      => 'area',
    'post_status'    => 'publish',
    'posts_per_page' => 20,
    'paged'          => $page,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ];

  if ($q !== '') {
    $args['s'] = $q;
  }

  $loop = new WP_Query($args);

  ob_start();

  if ($loop->have_posts()):
    while ($loop->have_posts()): $loop->the_post();

      $permalink = get_permalink();
      $title     = get_the_title();
      $thumb     = get_the_post_thumbnail_url(get_the_ID(), 'large');
      $thumb_html = $thumb ? '<img src="' . esc_url($thumb) . '" alt="' . esc_attr($title) . '">' : '';

      // optional metas
      $price_from = get_post_meta(get_the_ID(), '_area_price_from', true);
      $price_line = $price_from ? ('Price from ' . esc_html($price_from)) : '';

      $guide_url  = get_post_meta(get_the_ID(), '_area_guide_url', true);
      $guide_link = $guide_url ? '<a class="areas_link" href="' . esc_url($guide_url) . '" target="_blank" rel="noopener">Open Area Guide</a>' : '';

  ?>
      <article class="areas_card">
        <a class="areas_thumb" href="<?php echo esc_url($permalink); ?>">
          <?php echo $thumb_html; ?>
        </a>

        <div class="areas_body">
          <a class="areas_title_link" href="<?php echo esc_url($permalink); ?>">
            <?php echo esc_html($title); ?>
          </a>

          <?php if ($price_line): ?>
            <p class="areas_meta"><?php echo esc_html($price_line); ?></p>
          <?php endif; ?>

          <div class="areas_row">
            <span></span>
            <?php echo $guide_link; ?>
          </div>

          <div class="areas_actions">
            <a class="areas_btn areas_btn_primary" href="<?php echo esc_url(home_url('/buy')); ?>">Buy Property</a>
            <a class="areas_btn" href="<?php echo esc_url(home_url('/rent')); ?>">Rent Property</a>
          </div>
        </div>
      </article>
<?php
    endwhile;
    wp_reset_postdata();
  else:
    echo '<div class="areas_state">No areas found.</div>';
  endif;

  $html = ob_get_clean();

  wp_send_json_success([
    'html'      => $html,
    'total'     => (int) $loop->found_posts,
    'page'      => (int) $page,
    'max_pages' => (int) $loop->max_num_pages,
  ]);
}
