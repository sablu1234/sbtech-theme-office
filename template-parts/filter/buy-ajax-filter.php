<?php



// ajax filter -=========================================================


define('RE_CPT', 'porpertypi');

define('RE_META_PURPOSE', 'pp_purpose'); // ✅ your real meta_key
define('RE_META_STATUS',  'pp_status');  // ✅ your real meta_key

define('RE_META_PRICE',   '_re_price');
define('RE_META_BEDS',    '_re_beds');
define('RE_META_BATHS',   '_re_baths');
define('RE_META_SIZE',    '_re_size_sqft');

/**
 * Shortcode: [porpertypi_ajax_filter_dynamic]
 */
add_shortcode('porpertypi_ajax_filter_dynamic', function () {
  $nonce = wp_create_nonce('re_filter_nonce');

  // ✅ dynamic values from CPT meta
  $purpose_options = re_get_distinct_meta_values(RE_META_PURPOSE);
  $status_options  = re_get_distinct_meta_values(RE_META_STATUS);

  ob_start(); ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <div class="re-wrap">
    <div class="re-hero">
      <div class="re-hero__bg"></div>
      <div class="re-hero__inner">
        <h2 class="re-hero__title">Find Property</h2>

        <form class="re-filter" id="reFilterForm">
          <input type="hidden" name="nonce" value="<?php echo esc_attr($nonce); ?>">
          <input type="hidden" name="paged" value="1">

          <div class="re-row re-row--top">
            <select name="purpose" class="re-input">
              <option value="">All Purpose</option>
              <?php foreach ($purpose_options as $v): ?>
                <option value="<?php echo esc_attr($v); ?>"><?php echo esc_html(re_pretty_label($v)); ?></option>
              <?php endforeach; ?>
            </select>

            <select name="status" class="re-input">
              <option value="">All Status</option>
              <?php foreach ($status_options as $v): ?>
                <option value="<?php echo esc_attr($v); ?>"><?php echo esc_html(re_pretty_label($v)); ?></option>
              <?php endforeach; ?>
            </select>

            <input type="text" name="s" class="re-input" placeholder="Search by title..." />

            <button type="submit" class="re-btn">FIND</button>
          </div>

          <div class="re-row re-row--bottom">
            <input type="number" name="min_price" class="re-input" placeholder="Min. Price">
            <input type="number" name="max_price" class="re-input" placeholder="Max. Price">
            <input type="number" name="min_beds" class="re-input" placeholder="Min. Beds">
            <input type="number" name="min_baths" class="re-input" placeholder="Min. Baths">
            <input type="number" name="min_size" class="re-input" placeholder="Min. Size (sqft)">
            <input type="number" name="max_size" class="re-input" placeholder="Max. Size (sqft)">
          </div>

          <div class="re-row re-row--toolbar">
            <div class="re-count" id="reCount">—</div>
            <select class="re-input re-input--small" name="sort">
              <option value="newest">Newest</option>
              <option value="price_asc">Price: Low</option>
              <option value="price_desc">Price: High</option>
            </select>
          </div>
        </form>
      </div>
    </div>

    <div id="reResults" class="re-results"></div>

    <div class="re-pagination">
      <button class="re-page" data-dir="prev" type="button">Prev</button>
      <span id="rePageInfo">—</span>
      <button class="re-page" data-dir="next" type="button">Next</button>
    </div>
  </div>
  <?php
  return ob_get_clean();
});

/**
 * AJAX
 */
add_action('wp_ajax_re_filter_porpertypi_dynamic', 're_filter_porpertypi_dynamic');
add_action('wp_ajax_nopriv_re_filter_porpertypi_dynamic', 're_filter_porpertypi_dynamic');

function re_filter_porpertypi_dynamic() {
  if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 're_filter_nonce')) {
    wp_send_json_error(['message' => 'Invalid nonce']);
  }

  $paged = isset($_POST['paged']) ? max(1, (int)$_POST['paged']) : 1;
  $s     = isset($_POST['s']) ? sanitize_text_field($_POST['s']) : '';

  $purpose = isset($_POST['purpose']) ? sanitize_text_field($_POST['purpose']) : '';
  $status  = isset($_POST['status'])  ? sanitize_text_field($_POST['status'])  : '';

  $min_price = ($_POST['min_price'] ?? '') !== '' ? (int)$_POST['min_price'] : null;
  $max_price = ($_POST['max_price'] ?? '') !== '' ? (int)$_POST['max_price'] : null;
  $min_beds  = ($_POST['min_beds']  ?? '') !== '' ? (int)$_POST['min_beds']  : null;
  $min_baths = ($_POST['min_baths'] ?? '') !== '' ? (int)$_POST['min_baths'] : null;
  $min_size  = ($_POST['min_size']  ?? '') !== '' ? (int)$_POST['min_size']  : null;
  $max_size  = ($_POST['max_size']  ?? '') !== '' ? (int)$_POST['max_size']  : null;

  $sort = isset($_POST['sort']) ? sanitize_text_field($_POST['sort']) : 'newest';

  $meta_query = ['relation' => 'AND'];

  if ($purpose !== '') $meta_query[] = ['key' => RE_META_PURPOSE, 'value' => $purpose, 'compare' => '='];
  if ($status  !== '') $meta_query[] = ['key' => RE_META_STATUS,  'value' => $status,  'compare' => '='];

  if ($min_price !== null) $meta_query[] = ['key' => RE_META_PRICE, 'value' => $min_price, 'type' => 'NUMERIC', 'compare' => '>='];
  if ($max_price !== null) $meta_query[] = ['key' => RE_META_PRICE, 'value' => $max_price, 'type' => 'NUMERIC', 'compare' => '<='];

  if ($min_beds  !== null) $meta_query[] = ['key' => RE_META_BEDS,  'value' => $min_beds,  'type' => 'NUMERIC', 'compare' => '>='];
  if ($min_baths !== null) $meta_query[] = ['key' => RE_META_BATHS, 'value' => $min_baths, 'type' => 'NUMERIC', 'compare' => '>='];

  if ($min_size !== null) $meta_query[] = ['key' => RE_META_SIZE, 'value' => $min_size, 'type' => 'NUMERIC', 'compare' => '>='];
  if ($max_size !== null) $meta_query[] = ['key' => RE_META_SIZE, 'value' => $max_size, 'type' => 'NUMERIC', 'compare' => '<='];

  // sorting
  $orderby = 'date';
  $order = 'DESC';
  $meta_key = '';

  if ($sort === 'price_asc') {
    $orderby = 'meta_value_num';
    $order = 'ASC';
    $meta_key = RE_META_PRICE;
  }
  if ($sort === 'price_desc') {
    $orderby = 'meta_value_num';
    $order = 'DESC';
    $meta_key = RE_META_PRICE;
  }

  $args = [
    'post_type'      => RE_CPT,
    'post_status'    => 'publish',
    'posts_per_page' => 20,
    'paged'          => $paged,
    's'              => $s,
    'meta_query'     => (count($meta_query) > 1) ? $meta_query : [],
    'orderby'        => $orderby,
    'order'          => $order,
  ];
  if ($meta_key) $args['meta_key'] = $meta_key;

  $q = new WP_Query($args);

  ob_start();
  if ($q->have_posts()) {
    echo '<div class="re-grid">';
    while ($q->have_posts()) {
      $q->the_post();
      $id = get_the_ID();

      $price = (int)get_post_meta($id, RE_META_PRICE, true);
      $beds  = (int)get_post_meta($id, RE_META_BEDS, true);
      $baths = (int)get_post_meta($id, RE_META_BATHS, true);
      $size  = (int)get_post_meta($id, RE_META_SIZE, true);

      $pval = get_post_meta($id, RE_META_PURPOSE, true);
      $sval = get_post_meta($id, RE_META_STATUS, true);
  ?>
      <a class="re-card" href="<?php echo esc_url(get_permalink($id)); ?>">
        <div class="re-card__img">
          <?php if (has_post_thumbnail($id)) echo get_the_post_thumbnail($id, 'large', ['loading' => 'lazy']);
          else echo '<div class="re-ph">No Image</div>'; ?>
          <div class="re-badges">
            <?php if ($pval !== ''): ?><span class="re-badge"><?php echo esc_html(re_pretty_label($pval)); ?></span><?php endif; ?>
            <?php if ($sval !== ''): ?><span class="re-badge re-badge--dark"><?php echo esc_html(re_pretty_label($sval)); ?></span><?php endif; ?>
          </div>
        </div>

        <div class="re-card__body">
          <div class="re-price"><?php echo esc_html(number_format_i18n($price)); ?> AED</div>
          <div class="re-title"><?php echo esc_html(get_the_title($id)); ?></div>
          <div class="author_details">
            <div class="avatar">
              <?php
              $aid = get_the_author_meta('ID');
              echo get_avatar($aid, 48);
              ?>
            </div>
            <div class="avatar-name">
              <h6>Listing by</h6>
              <?php
              $author_id = get_the_author_meta('ID');
              echo get_the_author_meta('display_name', $author_id);

              ?>
            </div>
          </div>
          <div class="re-meta">
            <span><?php echo esc_html($beds); ?> Beds</span>
            <span><?php echo esc_html($baths); ?> Baths</span>
            <span><?php echo esc_html($size); ?> sqft</span>
          </div>
        </div>
      </a>
<?php
    }
    echo '</div>';
  } else {
    echo '<div class="re-empty">No properties found.</div>';
  }
  wp_reset_postdata();

  wp_send_json_success([
    'html'      => ob_get_clean(),
    'found'     => (int)$q->found_posts,
    'max_pages' => (int)$q->max_num_pages,
    'paged'     => $paged,
  ]);
}

/**
 * ✅ Dynamic dropdown values from postmeta
 * Handles normal string meta values.
 * If your meta is saved serialized array, tell me — I'll update this to unserialize + merge.
 */
function re_get_distinct_meta_values($meta_key) {
  global $wpdb;

  $sql = $wpdb->prepare("
    SELECT DISTINCT pm.meta_value
    FROM {$wpdb->postmeta} pm
    INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
    WHERE pm.meta_key = %s
      AND p.post_type = %s
      AND p.post_status = 'publish'
      AND pm.meta_value <> ''
    ORDER BY pm.meta_value ASC
  ", $meta_key, RE_CPT);

  $vals = $wpdb->get_col($sql);
  if (!is_array($vals)) return [];

  $vals = array_map('sanitize_text_field', $vals);
  $vals = array_filter($vals, fn($v) => $v !== '');
  $vals = array_values(array_unique($vals));
  return $vals;
}

function re_pretty_label($v) {
  $v = trim((string)$v);
  $v = str_replace(['-', '_'], ' ', $v);
  $v = preg_replace('/\s+/', ' ', $v);
  return ucwords($v);
}

/**
 * CSS/JS (one file)
 */
add_action('wp_enqueue_scripts', function () {
  wp_register_style('re-style', false);
  wp_enqueue_style('re-style');
  wp_add_inline_style('re-style', "


/* ================= ROOT ================= */
:root{
  --f:Poppins,system-ui;
  --t:#0f172a;
  --m:#64748b;
  --l:#e5e7eb;
  --b:var(--clr-primary);
  --b2:#0a56b3;
  --s:0 10px 30px rgb(146 150 161 / 14%);
  --r:14px;
}

/* ================= GLOBAL FIX ================= */
html,body{
  overflow-x:hidden;
}

/* ================= HEADER ================= */
header.header{
  width:100%;
  max-width:1200px;
  margin:0 auto;
}

/* ================= CONTAINER RESET ================= */
.container{
  max-width:100%;
  margin:0;
  padding:0;
}

/* ================= WRAP ================= */
.re-wrap{
  max-width:1200px;
  margin:0 auto 60px;
  padding:16px;
  font-family:var(--f);
}

/* ================= HERO (FULL WIDTH FIX) ================= */
.re-hero{
  position:relative;
  width:100vw;
  height:600px;
  margin-left:calc(50% - 50vw);
  margin-right:calc(50% - 50vw);
  display:flex;
  align-items:center;
  justify-content:center;
  overflow:hidden;
  box-shadow:var(--s);
  margin-bottom:14px;
}
.re-hero {
    border-radius: 0px !important;
}
.re-hero__bg{
  position:absolute;
  inset:0;
  background:
    linear-gradient(180deg,rgba(2,8,23,.35),rgba(2,8,23,.12)),
    url('https://images.unsplash.com/photo-1504279577054-acfeccf8fc52?auto=format&fit=crop&w=1800&q=80');
  background-size:cover;
  background-position:center;
  width:100%;
  height:100%;
}

.re-hero__inner{
  position:relative;
  width:100%;
  max-width:1400px;
  margin:auto;
  padding:24px;
}

.re-hero__title{
  margin:0 0 12px;
  text-align:center;
  color:#fff;
  font-size:34px;
  font-weight:900;
}

/* ================= FILTER FORM ================= */
form#reFilterForm{
  display:flex;
  flex-direction:column;
  gap:9px;
  padding:50px;
}

.re-filter{
  background:rgba(255,255,255,.88);
  backdrop-filter:blur(10px);
  border:1px solid rgba(229,231,235,.9);
  border-radius:14px;
  box-shadow:0 18px 40px rgba(2,8,23,.12);
  padding:12px;
}

.re-row{
  display:grid;
  gap:10px;
}

.re-row--top{
  grid-template-columns:170px 170px 1fr 140px;
  align-items:center;
}

.re-row--bottom{
  grid-template-columns:repeat(6,minmax(0,1fr));
}

.re-row--toolbar{
  grid-template-columns:1fr auto;
  align-items:center;
  margin-top:10px;
}

.re-input{
  width:100%;
  padding:12px;
  border:1px solid var(--l);
  border-radius:10px;
  font-family:var(--f);
}

.re-input--small{
  padding:10px 12px;
}

.re-btn{
  padding:12px;
  border:0;
  border-radius:10px;
  background:var(--b);
  color:#fff;
  font-weight:900;
  cursor:pointer;
}

.re-btn:hover{
  background:var(--b2);
}

/* ================= RESULTS ================= */
.re-results{
  max-width:1400px;
  margin:80px auto 58px;
  min-height:120px;
}

.re-results.is-loading{
  opacity:.6;
  pointer-events:none;
}

.re-count{
  color:var(--m);
  font-weight:900;
}

/* ================= GRID ================= */
.re-grid{
  display:grid;
  grid-template-columns:repeat(3,minmax(0,1fr));
  gap:40px;
}

/* ================= CARD ================= */
.re-card{
  display:block;
  text-decoration:none;
  background:#fff;
  border:1px solid var(--l);
  border-radius:var(--r);
  overflow:hidden;
  box-shadow:var(--s);
}

.re-card__img{
  position:relative;
}

.re-card__img img{
  width:100%;
  height:190px;
  object-fit:cover;
  display:block;
}

.re-ph{
  height:190px;
  display:grid;
  place-items:center;
  background:#f1f5f9;
  color:#64748b;
  font-weight:800;
}

.re-badges{
  position:absolute;
  top:12px;
  left:12px;
  display:flex;
  gap:8px;
}

.re-badge{
  background:rgba(11,99,206,.95);
  color:#fff;
  font-size:11px;
  font-weight:900;
  padding:6px 10px;
  border-radius:999px;
}

.re-badge--dark{
  background:rgba(15,23,42,.85);
}

.re-card__body{
  padding:12px;
  display:flex;
  flex-direction:column;
  gap:10px;
}

.re-price{
  font-size:18px;
  font-weight:600;
  color:var(--b);
}

.re-title{
  margin-top:6px;
  color:var(--t);
  font-weight:400;
  line-height:1.25;
}

.re-meta{
  display:flex;
  gap:12px;
  margin-top:8px;
  color:var(--m);
  font-size:12px;
  font-weight:700;
}

/* ================= AUTHOR ================= */
.author_details{
  display:flex;
  gap:5px;
}

.avatar-name{
  display:flex;
  flex-direction:column;
  justify-content:center;
  color:#000;
}

.avatar-name h6{
  margin:0;
}

/* ================= EMPTY ================= */
.re-empty{
  padding:18px;
  border:1px dashed #cbd5e1;
  border-radius:var(--r);
  background:#fff;
  color:var(--m);
  font-weight:700;
}

/* ================= PAGINATION ================= */
.re-pagination{
  display:flex;
  gap:10px;
  justify-content:center;
  align-items:center;
  margin-top:14px;
}

.re-page{
  border:1px solid var(--l);
  background:#fff;
  border-radius:10px;
  padding:10px 12px;
  cursor:pointer;
  font-weight:900;
}

.re-page:disabled{
  opacity:.5;
  cursor:not-allowed;
}

/* ================= RESPONSIVE ================= */
@media(max-width:1024px){
  .re-row--top{grid-template-columns:1fr 1fr}
  .re-row--bottom{grid-template-columns:1fr 1fr}
  .re-grid{grid-template-columns:repeat(2,1fr)}
}

@media(max-width:640px){
  .re-hero{height:580px}
  .re-grid{grid-template-columns:1fr}
  .re-row--toolbar{grid-template-columns:1fr}
}




    

  ");

  wp_register_script('re-js', false, ['jquery'], null, true);
  wp_enqueue_script('re-js');

  $ajax_url = admin_url('admin-ajax.php');

  wp_add_inline_script('re-js', "
    (function($){
      const ajaxUrl = " . json_encode($ajax_url) . ";

      function toObj(arr){ const o={}; arr.forEach(x=>o[x.name]=x.value); return o; }
      function loading(on){ $('#reResults').toggleClass('is-loading', !!on); }

      function fetchProps(page){
        const \$f = $('#reFilterForm'); if(!\$f.length) return;
        const data = toObj(\$f.serializeArray());
        data.action = 're_filter_porpertypi_dynamic';
        data.paged = page || 1;

        loading(true);
        $.post(ajaxUrl, data).done(function(res){
          loading(false);
          if(!res || !res.success){ $('#reResults').html('<div class=\"re-empty\">Error</div>'); return; }

          $('#reResults').html(res.data.html);
          $('#reCount').text((res.data.found||0) + ' results');
          $('#rePageInfo').text((res.data.paged||1) + ' / ' + (res.data.max_pages||1));

          const pg = res.data.paged||1, max=res.data.max_pages||1;
          $('.re-page[data-dir=\"prev\"]').prop('disabled', pg<=1);
          $('.re-page[data-dir=\"next\"]').prop('disabled', pg>=max);

          \$f.find('input[name=\"paged\"]').val(pg);
        }).fail(function(){
          loading(false);
          $('#reResults').html('<div class=\"re-empty\">Request failed</div>');
        });
      }

      $(document).on('ready', function(){ fetchProps(1); });

      $(document).on('submit', '#reFilterForm', function(e){
        e.preventDefault(); fetchProps(1);
      });

      // auto update on dropdown change (professional UX)
      $(document).on('change', '#reFilterForm select', function(){
        fetchProps(1);
      });

      $(document).on('click', '.re-page', function(){
        const dir = $(this).data('dir');
        const cur = parseInt($('#reFilterForm input[name=\"paged\"]').val()||'1',10);
        fetchProps(dir==='next' ? cur+1 : cur-1);
      });

    })(jQuery);
  ");
});
