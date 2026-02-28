<?php
/* ==========================================================
   Meet The Team (Agent CPT) - Full Professional Version
   Shortcode: [meet_the_team]
   CPT: agent

   Meta:
   - agent_repeat_items (array) => Languages
   - agent_country (string)     => Nationality
   - team_status (string)       => Badge (e.g., Manager)
   - agent_experience (number)  => Experience years

   Pagination: AJAX (paged + posts_per_page)
   ========================================================== */


/* ---------- SHORTCODE (HTML + CSS + JS inline) ---------- */
add_shortcode('meet_the_team', function () {

    $ajax_url = esc_url(admin_url('admin-ajax.php'));
    $nonce    = wp_create_nonce('meet_the_team_nonce');

    ob_start(); ?>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
      .meet-the-team-section{
        --clr-primary:#ef3c26;
        --clr-black:#0b0b0b;
        --clr-white:#ffffff;

        font-family:"Poppins",system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
        background: var(--clr-white);
        color: var(--clr-black);
        padding: clamp(22px, 4vw, 60px) 16px;
      }
      .meet-the-team-section *{box-sizing:border-box;}
      .meet-the-team-container{max-width:1200px;margin:0 auto;}
      .meet-the-team-head{
        display:flex;align-items:flex-end;justify-content:space-between;gap:14px;flex-wrap:wrap;
        margin-bottom:16px;
      }
      .meet-the-team-actions a:hover {
            color: var(--clr-primary);
        }
      .meet-the-team-title{
        margin:0;
        font-size: clamp(22px, 2.3vw, 34px);
        font-weight:800;
        letter-spacing:-.02em;
      }
      .meet-the-team-subtitle{
        margin:6px 0 0;
        color:rgba(0,0,0,.68);
        font-size:14.5px;
        line-height:1.7;
        max-width:720px;
      }
      .meet-the-team-note{
        font-size:12.5px;
        color:rgba(0,0,0,.62);
      }
      .meet-the-team-note strong{color:var(--clr-primary);}

      /* Filters */
      .meet-the-team-filters{
        display:flex; gap:14px; flex-wrap:wrap;
        align-items:stretch;
        margin: 12px 0 14px;
      }
      .meet-the-team-field{flex:1 1 290px; min-width:240px;}
      .meet-the-team-label{
        display:block;font-size:12.5px;font-weight:700;margin:0 0 6px;
        color:rgba(0,0,0,.72);
      }
      .meet-the-team-inputWrap{
        position:relative;
        background:#fff;
        border:1px solid rgba(0,0,0,.12);
        border-radius:14px;
        overflow:visible;
        display:flex;
        align-items:center;
        box-shadow: 0 10px 26px rgba(0,0,0,.05);
      }
      .meet-the-team-input{
        width:100%;
        border:0;
        outline:none;
        padding:12px 44px 12px 12px;
        font-size:14px;
        border-radius:14px;
      }
      .meet-the-team-ddBtn{
        position:absolute; right:8px; top:50%; transform:translateY(-50%);
        width:34px; height:34px;
        border-radius:12px;
        border:1px solid rgba(0,0,0,.10);
        background:#fff;
        cursor:pointer;
        font-size:14px;
        line-height:1;
      }
      .meet-the-team-inputWrap:focus-within{
        border-color:rgba(239,60,38,.55);
        box-shadow:0 0 0 4px rgba(239,60,38,.12);
      }

      /* Suggestions */
      .meet-the-team-suggest{
        position:absolute;
        left:0; right:0; top: calc(100% + 8px);
        background:#fff;
        border:1px solid rgba(0,0,0,.10);
        border-radius:14px;
        box-shadow:0 18px 40px rgba(0,0,0,.12);
        padding:6px;
        display:none;
        z-index:99;
        max-height:240px;
        overflow:auto;
      }
      .meet-the-team-suggest.is-open{display:block;}
      .meet-the-team-suggest button{
        width:100%;
        text-align:left;
        border:0;
        background:#fff;
        padding:10px 10px;
        border-radius:12px;
        cursor:pointer;
        font-size:14px;
      }
      .meet-the-team-suggest button:hover{background:rgba(239,60,38,.08);}

      /* Toolbar */
      .meet-the-team-toolbar{
        display:flex; align-items:center; justify-content:space-between;
        gap:12px; flex-wrap:wrap;
        margin: 6px 0 16px;
      }
      .meet-the-team-count{
        font-weight:800;
        color:rgba(0,0,0,.78);
      }
      .meet-the-team-clear{
        border:1px solid rgba(0,0,0,.14);
        background:#fff;
        border-radius:14px;
        padding:10px 14px;
        cursor:pointer;
        font-weight:800;
        font-size:13px;
      }
      .meet-the-team-clear:hover{border-color:rgba(239,60,38,.55);}

      /* Grid */
      .meet-the-team-grid{
        display:grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap:16px;
      }
      .meet-the-team-card{
        position:relative;
        background:#fff;
        border:1px solid rgba(0,0,0,.10);
        border-radius:18px;
        padding:18px 16px 16px;
        box-shadow:0 14px 34px rgba(0,0,0,.06);
        text-align:center;
        min-width:0;
        transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
      }
      .meet-the-team-card:hover{
        border-color:rgba(239,60,38,.25);
        box-shadow:0 18px 44px rgba(0,0,0,.10);
        transform: translateY(-2px);
      }
      .meet-the-team-badge{
        position:absolute;
        left:14px; top:14px;
        background:#0e8f65;
        color:#fff;
        font-weight:800;
        font-size:12px;
        padding:6px 10px;
        border-radius:10px;
      }
      .meet-the-team-avatar{
        width:92px; height:92px;
        border-radius:999px;
        margin: 4px auto 12px;
        overflow:hidden;
        border:1px solid rgba(0,0,0,.10);
        background:#f5f5f5;
      }
      .meet-the-team-avatar img{width:100%;height:100%;object-fit:cover;display:block;}
      .meet-the-team-name{
        margin: 0 0 6px;
        font-size:18px;
        font-weight:900;
        color: var(--clr-black);
      }
      .meet-the-team-meta{
        margin: 0 0 6px;
        font-size:13.5px;
        line-height:1.6;
        color:rgba(0,0,0,.72);
      }
      .meet-the-team-metaLabel{font-weight:800;color:rgba(0,0,0,.70);}
      .meet-the-team-metaVal{font-weight:800;color:#0b0b0b;}
      .meet-the-team-exp{
        margin: 8px 0 14px;
        font-size:13.5px;
        color:rgba(0,0,0,.75);
      }

      .meet-the-team-actions{
        display:flex;
        gap:10px;
        justify-content:center;
        flex-wrap:wrap;
      }
      .meet-the-team-btn{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        padding:10px 12px;
        border-radius:14px;
        text-decoration:none;
        font-weight:900;
        font-size:13px;
        border:1px solid rgba(0,0,0,.16);
        background:#fff;
        color:#0b0b0b;
        min-width:120px;
        transition:.18s ease;
      }
      .meet-the-team-btn:hover{border-color:rgba(239,60,38,.55);}
      .meet-the-team-btn--wa{
        border-color:rgba(34,197,94,.30);
      }
      .meet-the-team-btn--wa:hover{border-color:rgba(34,197,94,.65);}

      .meet-the-team-empty{
        margin-top:14px;
        padding:14px;
        border:1px dashed rgba(0,0,0,.20);
        border-radius:14px;
        color:rgba(0,0,0,.70);
      }

      /* Pagination */
      .meet-the-team-pagination{
        display:flex;
        gap:10px;
        flex-wrap:wrap;
        justify-content:center;
        margin-top:18px;
      }
      .meet-the-team-pageBtn{
        border:1px solid rgba(0,0,0,.14);
        background:#fff;
        color:#0b0b0b;
        padding:10px 14px;
        border-radius:14px;
        cursor:pointer;
        font-weight:900;
        font-size:13px;
        min-width:44px;
        transition:.18s ease;
      }
      .meet-the-team-pageBtn:hover{border-color:rgba(239,60,38,.55);}
      .meet-the-team-pageBtn.is-active{
        background: var(--clr-primary);
        border-color: var(--clr-primary);
        color:#fff;
      }
      .meet-the-team-pageBtn.is-disabled{
        opacity:.45;
        cursor:not-allowed;
      }

      /* Responsive */
      @media (max-width: 992px){
        .meet-the-team-grid{grid-template-columns: repeat(2, minmax(0, 1fr));}
      }
      @media (max-width: 576px){
        .meet-the-team-grid{grid-template-columns: 1fr;}
        .meet-the-team-field{flex:1 1 100%;}
      }
    </style>

    <section class="meet-the-team-section" aria-label="Meet the Team">
      <div class="meet-the-team-container">

        <div class="meet-the-team-head">
          <div>
            <h2 class="meet-the-team-title">Meet the Team</h2>
            <p class="meet-the-team-subtitle">
              Find the right agent based on name, language, and nationality. Suggestions come directly from your database.
            </p>
          </div>
          <div class="meet-the-team-note d-none">Theme color: <strong>#ef3c26</strong></div>
        </div>

        <div class="meet-the-team-filters" role="search" aria-label="Agent filters">

          <div class="meet-the-team-field">
            <label class="meet-the-team-label" for="meet-the-team-name">Search by Agent Name</label>
            <div class="meet-the-team-inputWrap">
              <input id="meet-the-team-name" class="meet-the-team-input" type="text" placeholder="Type a name…" autocomplete="off">
              <button class="meet-the-team-ddBtn" type="button">▾</button>
              <div class="meet-the-team-suggest" data-field="name"></div>
            </div>
          </div>

          <div class="meet-the-team-field">
            <label class="meet-the-team-label" for="meet-the-team-language">Language</label>
            <div class="meet-the-team-inputWrap">
              <input id="meet-the-team-language" class="meet-the-team-input" type="text" placeholder="Type a language…" autocomplete="off">
              <button class="meet-the-team-ddBtn" type="button">▾</button>
              <div class="meet-the-team-suggest" data-field="language"></div>
            </div>
          </div>

          <div class="meet-the-team-field">
            <label class="meet-the-team-label" for="meet-the-team-nationality">Nationality</label>
            <div class="meet-the-team-inputWrap">
              <input id="meet-the-team-nationality" class="meet-the-team-input" type="text" placeholder="Type a nationality…" autocomplete="off">
              <button class="meet-the-team-ddBtn" type="button">▾</button>
              <div class="meet-the-team-suggest" data-field="nationality"></div>
            </div>
          </div>

        </div>

        <div class="meet-the-team-toolbar">
          <div class="meet-the-team-count" id="meet-the-team-count">Loading agents…</div>
          <button type="button" class="meet-the-team-clear" id="meet-the-team-clear">Clear filters</button>
        </div>

        <div class="meet-the-team-grid" id="meet-the-team-grid" aria-live="polite"></div>
        <div class="meet-the-team-empty" id="meet-the-team-empty" hidden>No agents found. Try changing filters.</div>
        <div class="meet-the-team-pagination" id="meet-the-team-pagination" aria-label="Pagination"></div>

      </div>
    </section>

    <script>
      (function(){
        const AJAX_URL = <?php echo json_encode($ajax_url); ?>;
        const NONCE    = <?php echo json_encode($nonce); ?>;

        const grid  = document.getElementById('meet-the-team-grid');
        const count = document.getElementById('meet-the-team-count');
        const empty = document.getElementById('meet-the-team-empty');
        const pagination = document.getElementById('meet-the-team-pagination');

        const inputs = {
          name: document.getElementById('meet-the-team-name'),
          language: document.getElementById('meet-the-team-language'),
          nationality: document.getElementById('meet-the-team-nationality')
        };

        const clearBtn = document.getElementById('meet-the-team-clear');

        let tFilter = null;
        let tSuggest = null;

        let currentPage = 1;
        const perPage = 9;

        function post(data){
          const fd = new FormData();
          Object.keys(data).forEach(k => fd.append(k, data[k]));
          return fetch(AJAX_URL, { method:'POST', body: fd }).then(r => r.json());
        }

        function closeAllSuggest(){
          document.querySelectorAll('.meet-the-team-suggest').forEach(s => s.classList.remove('is-open'));
        }

        document.addEventListener('click', (e)=>{
          if(!e.target.closest('.meet-the-team-inputWrap')) closeAllSuggest();
        });

        function renderPagination(page, maxPages){
          if(!pagination) return;

          if(maxPages <= 1){
            pagination.innerHTML = '';
            return;
          }

          let html = '';

          // Prev
          html += `<button class="meet-the-team-pageBtn ${page<=1?'is-disabled':''}" data-page="${page-1}" ${page<=1?'disabled':''}>Prev</button>`;

          const range = 2;
          const start = Math.max(1, page - range);
          const end   = Math.min(maxPages, page + range);

          if(start > 1){
            html += `<button class="meet-the-team-pageBtn" data-page="1">1</button>`;
            if(start > 2) html += `<button class="meet-the-team-pageBtn is-disabled" disabled>…</button>`;
          }

          for(let i=start; i<=end; i++){
            html += `<button class="meet-the-team-pageBtn ${i===page?'is-active':''}" data-page="${i}">${i}</button>`;
          }

          if(end < maxPages){
            if(end < maxPages-1) html += `<button class="meet-the-team-pageBtn is-disabled" disabled>…</button>`;
            html += `<button class="meet-the-team-pageBtn" data-page="${maxPages}">${maxPages}</button>`;
          }

          // Next
          html += `<button class="meet-the-team-pageBtn ${page>=maxPages?'is-disabled':''}" data-page="${page+1}" ${page>=maxPages?'disabled':''}>Next</button>`;

          pagination.innerHTML = html;

          pagination.querySelectorAll('[data-page]').forEach(btn=>{
            btn.addEventListener('click', ()=>{
              const p = parseInt(btn.getAttribute('data-page'), 10);
              if(!p || p < 1 || p > maxPages) return;
              currentPage = p;
              fetchAgents(true);
            });
          });
        }

        function fetchAgents(scrollToTop){
          count.textContent = 'Loading agents…';

          const payload = {
            action: 'meet_the_team_filter',
            nonce: NONCE,
            name: inputs.name.value.trim(),
            language: inputs.language.value.trim(),
            nationality: inputs.nationality.value.trim(),
            page: currentPage,
            per_page: perPage
          };

          post(payload).then(res=>{
            if(!res || !res.success){
              count.textContent = '0 agents found';
              grid.innerHTML = '';
              empty.hidden = false;
              pagination.innerHTML = '';
              return;
            }

            grid.innerHTML = res.data.html || '';

            const c = res.data.count || 0;
            const maxPages = res.data.max_pages || 1;

            count.textContent = c + ' agents found';
            empty.hidden = c > 0;

            renderPagination(currentPage, maxPages);

            if(scrollToTop){
              const top = grid.getBoundingClientRect().top + window.pageYOffset - 160;
              window.scrollTo({ top, behavior:'smooth' });
            }
          }).catch(()=>{
            count.textContent = '0 agents found';
            grid.innerHTML = '';
            empty.hidden = false;
            pagination.innerHTML = '';
          });
        }

        function debounceFilter(){
          clearTimeout(tFilter);
          tFilter = setTimeout(()=> fetchAgents(false), 250);
        }

        function renderSuggest(box, items, onPick){
          box.innerHTML = '';
          if(!items || !items.length){
            box.classList.remove('is-open');
            return;
          }
          items.forEach(val=>{
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = val;
            btn.addEventListener('click', ()=>{
              onPick(val);
              box.classList.remove('is-open');
              currentPage = 1;
              fetchAgents(false);
            });
            box.appendChild(btn);
          });
          box.classList.add('is-open');
        }

        function fetchSuggest(field, q, box){
          post({
            action: 'meet_the_team_suggest',
            nonce: NONCE,
            field: field,
            q: q
          }).then(res=>{
            if(!res || !res.success) return;
            renderSuggest(box, (res.data.items || []), (val)=>{
              inputs[field].value = val;
            });
          });
        }

        function bindField(field){
          const input = inputs[field];
          const wrap  = input.closest('.meet-the-team-inputWrap');
          const box   = wrap.querySelector('.meet-the-team-suggest');
          const btn   = wrap.querySelector('.meet-the-team-ddBtn');

          input.addEventListener('input', ()=>{
            currentPage = 1;
            debounceFilter();
            clearTimeout(tSuggest);
            tSuggest = setTimeout(()=> fetchSuggest(field, input.value.trim(), box), 220);
          });

          input.addEventListener('focus', ()=>{
            fetchSuggest(field, input.value.trim(), box);
          });

          btn.addEventListener('click', ()=>{
            if(box.classList.contains('is-open')){
              box.classList.remove('is-open');
            }else{
              closeAllSuggest();
              fetchSuggest(field, input.value.trim(), box);
            }
          });
        }

        bindField('name');
        bindField('language');
        bindField('nationality');

        clearBtn.addEventListener('click', ()=>{
          currentPage = 1;
          inputs.name.value = '';
          inputs.language.value = '';
          inputs.nationality.value = '';
          closeAllSuggest();
          fetchAgents(false);
        });

        // Initial load
        fetchAgents(false);

      })();
    </script>

    <?php
    return ob_get_clean();
});


/* ---------- AJAX: Filter Agents + Pagination ---------- */
add_action('wp_ajax_meet_the_team_filter', 'meet_the_team_filter_cb');
add_action('wp_ajax_nopriv_meet_the_team_filter', 'meet_the_team_filter_cb');

function meet_the_team_filter_cb(){
    check_ajax_referer('meet_the_team_nonce', 'nonce');

    $name        = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $language    = isset($_POST['language']) ? sanitize_text_field($_POST['language']) : '';
    $nationality = isset($_POST['nationality']) ? sanitize_text_field($_POST['nationality']) : '';

    $page     = isset($_POST['page']) ? max(1, (int) $_POST['page']) : 1;
    $per_page = isset($_POST['per_page']) ? max(1, (int) $_POST['per_page']) : 9;

    $args = [
      'post_type'      => 'agent',
      'post_status'    => 'publish',
      'paged'          => $page,
      'posts_per_page' => 20,
      'orderby'        => 'title',
      'order'          => 'ASC',
    ];

    if($name !== ''){
      $args['s'] = $name;
    }

    $meta_query = ['relation' => 'AND'];

    if($nationality !== ''){
      $meta_query[] = [
        'key'     => 'agent_country',
        'value'   => $nationality,
        'compare' => 'LIKE',
      ];
    }

    // languages stored serialized array -> LIKE works
    if($language !== ''){
      $meta_query[] = [
        'key'     => 'agent_repeat_items',
        'value'   => $language,
        'compare' => 'LIKE',
      ];
    }

    if(count($meta_query) > 1){
      $args['meta_query'] = $meta_query;
    }

    $q = new WP_Query($args);

    ob_start();

    if($q->have_posts()){
      while($q->have_posts()){
        $q->the_post();
        $id = get_the_ID();

        $team_status = get_post_meta($id, 'team_status', true);
        $experience  = get_post_meta($id, 'agent_experience', true);
        $country     = get_post_meta($id, 'agent_country', true);
        $languages   = get_post_meta($id, 'agent_repeat_items', true);
        $agent_whatsapp   = get_post_meta($id, 'agent_whatsapp', true);
        if(!is_array($languages)) $languages = [];

        $thumb = get_the_post_thumbnail_url($id, 'medium');
        if(!$thumb){
          $thumb = 'https://via.placeholder.com/300x300?text=Agent';
        }
        ?>
        <article class="meet-the-team-card">
          <?php if(!empty($team_status)): ?>
            <span class="meet-the-team-badge"><?php echo esc_html($team_status); ?></span>
          <?php endif; ?>

          <div class="meet-the-team-avatar">
            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy">
          </div>

          <h3 class="meet-the-team-name"><?php the_title(); ?></h3>

          <?php if(!empty($country)): ?>
            <p class="meet-the-team-meta">
              <span class="meet-the-team-metaLabel">Nationality:</span>
              <span class="meet-the-team-metaVal"><?php echo esc_html($country); ?></span>
            </p>
          <?php endif; ?>

          <?php if(!empty($languages)): ?>
            <p class="meet-the-team-meta">
              <span class="meet-the-team-metaLabel">Speaks:</span>
              <span class="meet-the-team-metaVal"><?php echo esc_html(implode(', ', array_map('sanitize_text_field', $languages))); ?></span>
            </p>
          <?php endif; ?>

          <?php if(!empty($experience)): ?>
            <p class="meet-the-team-exp"><strong><?php echo esc_html($experience); ?></strong> years of experience</p>
          <?php endif; ?>

          <div class="meet-the-team-actions">
            <a class="meet-the-team-btn" href="<?php echo esc_url(get_permalink()); ?>">View profile</a>
            <a class="meet-the-team-btn meet-the-team-btn--wa" target="_blank" rel="noopener" href="https://wa.me/<?php echo esc_html($agent_whatsapp); ?>">WhatsApp</a>
          </div>
        </article>
        <?php
      }
      wp_reset_postdata();
    }

    $html = ob_get_clean();

    wp_send_json_success([
      'count'     => (int) $q->found_posts,
      'max_pages' => (int) $q->max_num_pages,
      'page'      => (int) $page,
      'html'      => $html
    ]);
}


/* ---------- AJAX: Suggestions (DB) ---------- */
add_action('wp_ajax_meet_the_team_suggest', 'meet_the_team_suggest_cb');
add_action('wp_ajax_nopriv_meet_the_team_suggest', 'meet_the_team_suggest_cb');

function meet_the_team_suggest_cb(){
    check_ajax_referer('meet_the_team_nonce', 'nonce');

    global $wpdb;

    $field = isset($_POST['field']) ? sanitize_text_field($_POST['field']) : '';
    $q     = isset($_POST['q']) ? sanitize_text_field($_POST['q']) : '';
    $qLower = mb_strtolower($q);

    $items = [];

    // Name (titles)
    if($field === 'name'){
      $ids = get_posts([
        'post_type'      => 'agent',
        'post_status'    => 'publish',
        'posts_per_page' => 12,
        'orderby'        => 'title',
        'order'          => 'ASC',
        's'              => $q,
        'fields'         => 'ids'
      ]);
      foreach($ids as $id){
        $items[] = get_the_title($id);
      }
    }

    // Nationality distinct
    if($field === 'nationality'){
      $rows = $wpdb->get_col(
        $wpdb->prepare(
          "SELECT DISTINCT pm.meta_value
           FROM {$wpdb->postmeta} pm
           INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
           WHERE pm.meta_key = %s
             AND p.post_type = 'agent'
             AND p.post_status = 'publish'
             AND pm.meta_value <> ''
           ORDER BY pm.meta_value ASC
           LIMIT 300",
          'agent_country'
        )
      );

      foreach($rows as $val){
        $val = trim(wp_strip_all_tags($val));
        if($q === '' || mb_strpos(mb_strtolower($val), $qLower) !== false){
          $items[] = $val;
        }
        if(count($items) >= 2) break;
      }
    }

    // Language from serialized array meta
    if($field === 'language'){
      $rows = $wpdb->get_col(
        $wpdb->prepare(
          "SELECT pm.meta_value
           FROM {$wpdb->postmeta} pm
           INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
           WHERE pm.meta_key = %s
             AND p.post_type = 'agent'
             AND p.post_status = 'publish'
           LIMIT 400",
          'agent_repeat_items'
        )
      );

      $all = [];
      foreach($rows as $row){
        $arr = maybe_unserialize($row);
        if(is_array($arr)){
          foreach($arr as $lang){
            $lang = trim(sanitize_text_field($lang));
            if($lang !== '') $all[$lang] = true;
          }
        }
      }

      $all = array_keys($all);
      sort($all);

      foreach($all as $val){
        if($q === '' || mb_strpos(mb_strtolower($val), $qLower) !== false){
          $items[] = $val;
        }
        if(count($items) >= 12) break;
      }
    }

    $items = array_values(array_unique(array_filter($items)));

    wp_send_json_success(['items' => $items]);
}