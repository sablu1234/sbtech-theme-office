<?php

/**
 * Developer Directory Page (CPT: developer)
 * Shortcode: [developers_page]
 * Features: AJAX search + suggestions (from title) + AJAX pagination
 */

add_action('wp_enqueue_scripts', function () {

  wp_register_style('developers-inline', false, [], null);
  wp_enqueue_style('developers-inline');

  wp_register_script('developers-inline', false, [], null, true);
  wp_enqueue_script('developers-inline');

  // ---------- CSS ----------
  $css = <<<CSS
:root{
  --developers-primary:#02B2EE;
  --developers-black:#0b0f14;
  --developers-text:#111827;
  --developers-muted:#6b7280;
  --developers-border:#e5e7eb;
  --developers-bg:#ffffff;
  --developers-radius:18px;
  --developers-shadow: 0 16px 40px rgba(11,15,20,.10);
  --developers-max:1200px;
}
.developers_container{max-width:var(--developers-max);margin:0 auto;padding:0 16px;}
.developers_page{padding:22px 0 34px;background:var(--developers-bg);}

/* HERO like screenshot */
.developers_hero{
  background: var(--developers-black);
  border-radius: var(--developers-radius);
  padding: 42px 18px;
  box-shadow: var(--developers-shadow);
  border: 1px solid rgba(229,231,235,.35);
}
.developers_hero_inner{max-width: 920px;margin:0 auto;text-align:center;}
.developers_title{
  margin:0 0 14px;
  color:#fff;
  font-weight:1000;
  font-size: clamp(22px, 3vw, 40px);
  letter-spacing:-.35px;
}

/* Search */
.developers_search_wrap{position:relative;}
.developers_search{
  width:100%;
  height:48px;
  padding: 0 14px 0 44px;
  border-radius: 12px;
  border: 1px solid rgba(255,255,255,.20);
  background: #f2f2f2;
  font-weight:900;
  color: var(--developers-text);
  outline:none;
}
.developers_search:focus{
  border-color: rgba(2,178,238,.55);
  box-shadow: 0 0 0 6px rgba(2,178,238,.18);
  background:#fff;
}
.developers_icon{
  position:absolute;
  left:14px; top:50%;
  transform:translateY(-50%);
  width:18px;height:18px;
  opacity:.55;
  color:#111;
}
.developers_suggest{
  position:absolute;
  top: calc(100% + 8px);
  left:0; right:0;
  background:#fff;
  border:1px solid var(--developers-border);
  border-radius: 12px;
  box-shadow: 0 18px 45px rgba(11,15,20,.12);
  overflow:hidden;
  display:none;
  z-index:10;
}
.developers_suggest.is-open{display:block;}
.developers_suggest_item{
  padding:12px 14px;
  cursor:pointer;
  display:flex;
  justify-content:space-between;
  gap:10px;
  font-weight:900;
  color:var(--developers-text);
}
.developers_suggest_item:hover{background: rgba(2,178,238,.08);}
.developers_suggest_item small{color:var(--developers-muted);font-weight:800;}

/* State */
.developers_state{margin-top:12px;color:var(--developers-muted);font-weight:900;font-size:13px;}

/* GRID: 3/2/1 */
.developers_grid{
  margin-top:16px;
  display:grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap:16px;
}
@media (max-width:980px){ .developers_grid{grid-template-columns:repeat(2, minmax(0, 1fr));} }
@media (max-width:620px){ .developers_grid{grid-template-columns:1fr;} }

/* Card */
.developers_card{
  background:#fff;
  border:1px solid rgba(229,231,235,.95);
  border-radius: var(--developers-radius);
  overflow:hidden;
  box-shadow: 0 10px 24px rgba(11,15,20,.06);
  transition:.18s ease;
  display:flex;
  flex-direction:column;
}
.developers_card:hover{
  transform: translateY(-2px);
  border-color: rgba(2,178,238,.35);
  box-shadow: 0 16px 35px rgba(11,15,20,.10);
}
.developers_thumb{
  display:block;
  aspect-ratio: 16/9;
  background: linear-gradient(135deg, #0b0f14, #1f2a37);
}
.developers_thumb img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
    background: #ededed;
}
.developers_body{padding:14px;display:flex;flex-direction:column;gap:10px;flex:1;}
.developers_name{
  margin:0;
  font-weight:1000;
  font-size:16px;
  letter-spacing:-.15px;
}
.developers_name a{color:var(--developers-text);text-decoration:none;}
.developers_name a:hover{text-decoration:underline;}
.developers_actions{margin-top:auto;display:flex;gap:10px;flex-wrap:wrap;}
.developers_btn{
  flex:1 1 auto;
  border-radius: 12px;
  padding: 11px 12px;
  font-weight:1000;
  border:1px solid var(--developers-border);
  background:#fff;
  cursor:pointer;
  transition:.18s ease;
  text-align:center;
  text-decoration:none;
  color:var(--developers-text);
}
.developers_btn:hover{border-color: rgba(2,178,238,.45); box-shadow:0 12px 26px rgba(2,178,238,.14);}
.developers_actions .developers_btn_primary {color: white;font-weight: 600;}
.developers_btn_primary{
  border:0;
  background: var(--clr-primary);
  color:#fff;
}
.developers_btn_primary:hover{box-shadow:0 14px 30px rgba(2,178,238,.25);}

/* Pagination */
.developers_pagination{display:flex;gap:8px;flex-wrap:wrap;justify-content:center;align-items:center;margin-top:18px;}
.developers_pagebtn{
  min-width:40px;height:40px;padding:0 12px;
  border-radius:12px;border:1px solid var(--developers-border);
  background:#fff;color:var(--developers-text);
  font-weight:1000;cursor:pointer;transition:.18s ease;
  display:flex;align-items:center;justify-content:center;
}
.developers_pagebtn:hover{border-color:rgba(2,178,238,.45);box-shadow:0 12px 26px rgba(2,178,238,.12);}
.developers_pagebtn.is-active{border-color:rgba(2,178,238,.55);box-shadow:0 0 0 6px rgba(2,178,238,.12);}
.developers_pagebtn:disabled{opacity:.45;cursor:not-allowed;box-shadow:none;}
CSS;

  wp_add_inline_style('developers-inline', $css);

  wp_localize_script('developers-inline', 'DEVS_AJAX', [
    'ajaxurl' => admin_url('admin-ajax.php'),
    'nonce'   => wp_create_nonce('developers_nonce'),
  ]);

  // ---------- JS ----------
  $js = <<<JS
(function(){
  const input = document.querySelector('[data-developers-search]');
  const suggestBox = document.querySelector('[data-developers-suggest]');
  const grid = document.querySelector('[data-developers-grid]');
  const state = document.querySelector('[data-developers-state]');
  const pager = document.querySelector('[data-developers-pagination]');
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
    fd.append('nonce', DEVS_AJAX.nonce);
    Object.keys(data||{}).forEach(k => fd.append(k, data[k]));
    const res = await fetch(DEVS_AJAX.ajaxurl, { method:'POST', body: fd });
    return res.json();
  }

  function renderSuggest(items){
    if(!items || !items.length){
      suggestBox.innerHTML = '';
      closeSuggest();
      return;
    }
    suggestBox.innerHTML = items.map(it => (
      '<div class="developers_suggest_item" data-dev-pick="'+esc(it.title)+'">' +
        '<span>'+esc(it.title)+'</span>' +
        '<small>Developer</small>' +
      '</div>'
    )).join('');
    suggestBox.classList.add('is-open');
  }

  function renderPagination(current, max){
    if(!max || max <= 1){ pager.innerHTML = ''; return; }

    const windowSize = 5;
    let start = Math.max(1, current - Math.floor(windowSize/2));
    let end = Math.min(max, start + windowSize - 1);
    start = Math.max(1, end - windowSize + 1);

    let html = '';
    html += '<button class="developers_pagebtn" data-dev-page="'+(current-1)+'" '+(current<=1?'disabled':'')+'>Prev</button>';

    if(start > 1){
      html += '<button class="developers_pagebtn" data-dev-page="1">1</button>';
      if(start > 2) html += '<button class="developers_pagebtn" disabled>…</button>';
    }

    for(let p=start; p<=end; p++){
      html += '<button class="developers_pagebtn '+(p===current?'is-active':'')+'" data-dev-page="'+p+'">'+p+'</button>';
    }

    if(end < max){
      if(end < max-1) html += '<button class="developers_pagebtn" disabled>…</button>';
      html += '<button class="developers_pagebtn" data-dev-page="'+max+'">'+max+'</button>';
    }

    html += '<button class="developers_pagebtn" data-dev-page="'+(current+1)+'" '+(current>=max?'disabled':'')+'>Next</button>';
    pager.innerHTML = html;
  }

  async function loadResults(q, page){
    currentQuery = q || '';
    currentPage = page || 1;

    setState('Loading...');
    const r = await post('developers_results', { q: currentQuery, page: currentPage });

    if(r && r.success){
      grid.innerHTML = r.data.html;
      renderPagination(r.data.page, r.data.max_pages);
      setState(r.data.total ? (r.data.total + ' developer(s) found') : 'No developers found');
    }else{
      setState('Something went wrong');
    }
  }

  async function loadSuggest(q){
    const r = await post('developers_suggest', { q: q || '' });
    if(r && r.success) renderSuggest(r.data.items || []);
  }

  input.addEventListener('input', function(){
    const q = this.value.trim();
    clearTimeout(tSuggest); clearTimeout(tResults);

    tSuggest = setTimeout(() => {
      if(q.length < 1) { renderSuggest([]); return; }
      loadSuggest(q);
    }, 150);

    tResults = setTimeout(() => loadResults(q, 1), 250);
  });

  suggestBox.addEventListener('click', function(e){
    const item = e.target.closest('[data-dev-pick]');
    if(!item) return;
    const val = item.getAttribute('data-dev-pick') || '';
    input.value = val;
    closeSuggest();
    loadResults(val, 1);
  });

  document.addEventListener('click', function(e){
    if(e.target.closest('[data-dev-search-wrap]')) return;
    closeSuggest();
  });

  pager.addEventListener('click', function(e){
    const btn = e.target.closest('[data-dev-page]');
    if(!btn || btn.disabled) return;
    const p = parseInt(btn.getAttribute('data-dev-page') || '1', 10);
    if(!p || p < 1) return;
    loadResults(currentQuery, p);
  });

  loadResults('', 1);
})();
JS;

  wp_add_inline_script('developers-inline', $js);
});

/* Shortcode */
add_shortcode('developers_page', function () {
  ob_start(); ?>
  <section class="developers_page">
    <div class="developers_container">

      <div class="developers_hero">
        <div class="developers_hero_inner">
          <h1 class="developers_title">Developers in Dubai</h1>

          <div class="developers_search_wrap" data-dev-search-wrap>
            <svg class="developers_icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M21 21l-4.3-4.3M10.8 18.2a7.4 7.4 0 1 1 0-14.8 7.4 7.4 0 0 1 0 14.8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>
            <input class="developers_search" type="search" placeholder="Search Developer Name" data-developers-search />
            <div class="developers_suggest" data-developers-suggest></div>
          </div>
        </div>
      </div>

      <div class="developers_state" data-developers-state></div>
      <div class="developers_grid" data-developers-grid></div>
      <div class="developers_pagination" data-developers-pagination></div>

    </div>
  </section>
  <?php
  return ob_get_clean();
});

/* AJAX: Suggestions (from title) */
add_action('wp_ajax_developers_suggest', 'developers_ajax_suggest');
add_action('wp_ajax_nopriv_developers_suggest', 'developers_ajax_suggest');
function developers_ajax_suggest() {
  if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'developers_nonce')) {
    wp_send_json_error(['msg' => 'bad nonce']);
  }

  $q = isset($_POST['q']) ? sanitize_text_field(wp_unslash($_POST['q'])) : '';
  if ($q === '') wp_send_json_success(['items' => []]);

  $posts = get_posts([
    'post_type'      => 'developer',
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
add_action('wp_ajax_developers_results', 'developers_ajax_results');
add_action('wp_ajax_nopriv_developers_results', 'developers_ajax_results');
function developers_ajax_results() {
  if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'developers_nonce')) {
    wp_send_json_error(['msg' => 'bad nonce']);
  }

  $q    = isset($_POST['q']) ? sanitize_text_field(wp_unslash($_POST['q'])) : '';
  $page = isset($_POST['page']) ? max(1, (int)$_POST['page']) : 1;

  $loop = new WP_Query([
    'post_type'      => 'developer',
    'post_status'    => 'publish',
    'posts_per_page' => 12,
    'paged'          => $page,
    'orderby'        => 'date',
    'order'          => 'DESC',
    's'              => $q ?: '',
  ]);

  ob_start();

  if ($loop->have_posts()):
    while ($loop->have_posts()): $loop->the_post();
      $permalink = get_permalink();
      $title     = get_the_title();
      $thumb     = get_the_post_thumbnail_url(get_the_ID(), 'large');
      $thumb_html = $thumb ? '<img src="' . esc_url($thumb) . '" alt="' . esc_attr($title) . '">' : '';
  ?>
      <article class="developers_card">
        <a class="developers_thumb" href="<?php echo esc_url($permalink); ?>">
          <?php echo $thumb_html; ?>
        </a>

        <div class="developers_body">
          <h3 class="developers_name">
            <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a>
          </h3>

          <div class="developers_actions">
            <a class="developers_btn developers_btn_primary" href="<?php echo esc_url($permalink); ?>">View Profile</a>
          </div>
        </div>
      </article>
<?php
    endwhile;
    wp_reset_postdata();
  else:
    echo '<div class="developers_state">No developers found.</div>';
  endif;

  $html = ob_get_clean();

  wp_send_json_success([
    'html'      => $html,
    'total'     => (int) $loop->found_posts,
    'page'      => (int) $page,
    'max_pages' => (int) $loop->max_num_pages,
  ]);
}
