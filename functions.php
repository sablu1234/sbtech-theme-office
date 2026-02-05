<?php

function sbtech_theme_support() {
	add_theme_support('post-thumbnails');


	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on harry, use a find and replace
	 * to change 'harry' to the name of your theme in all the template files.
	 */

	load_theme_textdomain('techub', get_template_directory() . '/languages');


	/** automatic feed link*/
	add_theme_support('automatic-feed-links');
	/** tag-title **/
	add_theme_support('title-tag');
	/** HTML5 support **/
	add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
	/** refresh widgest **/
	add_theme_support('customize-selective-refresh-widgets');
	/** post format **/
	add_theme_support('post-formats', array(
		'aside',
		'gallery',
		'video',
		'audio',
		'gallery',
		'quote',
	));

	register_nav_menus(array(
		'main-menu' => __('Main Menu', 'sbtech'),
	));

	remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'sbtech_theme_support');

/**
 * Add a sidebar.
 */
function sbtech_widgets_init() {
	register_sidebar(array(
		'name'          => __('Footer Widget 01', 'textdomain'),
		'id'            => 'footer-widget-1',
		'description'   => __('Widgets in this area will be shown on all footer widget 01 column.', 'sbtech'),
		'before_widget' => '<div id="%1$s" class="tp-footer-widget footer-cols-1 pr-75 tp-footer-widget-cutm-pdg-4 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="tp-footer-title tp-footer-4-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => __('Footer Widget 02', 'textdomain'),
		'id'            => 'footer-widget-2',
		'description'   => __('Widgets in this area will be shown on all footer widget 02 column.', 'sbtech'),
		'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-4-widget footer-cols-2 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="tp-footer-title tp-footer-4-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => __('Footer Widget 03', 'textdomain'),
		'id'            => 'footer-widget-3',
		'description'   => __('Widgets in this area will be shown on all footer widget 03 column.', 'sbtech'),
		'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-4-widget footer-cols-3 pl-50 tp-footer-widget-cutm-pdg-3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="tp-footer-title tp-footer-4-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => __('Footer Widget 04', 'textdomain'),
		'id'            => 'footer-widget-4',
		'description'   => __('Widgets in this area will be shown on all footer widget 04 column.', 'sbtech'),
		'before_widget' => '<div id="%1$s" class="tp-footer-widget footer-cols-4 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="tp-footer-title tp-footer-4-title">',
		'after_title'   => '</h4>',
	));
}
add_action('widgets_init', 'sbtech_widgets_init');

include_once get_template_directory() . '/inc/common/scripts.php';
include_once get_template_directory() . '/inc/template-function.php';
include_once get_template_directory() . '/inc/nav-walker.php';

//blog ar ajax loop ar funtion in this file 
include_once get_template_directory() . '/template-parts/blogs/loop-funciton.php';


if (class_exists('Kirki')) {
	include_once get_template_directory() . '/inc/sbtech-kirki.php';
}




// ajax filter test -=========================================================
add_shortcode('porpertypi_ajax_filter', function () {
	ob_start(); ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

	<div class="re-wrap">
		<div class="re-hero">
			<div class="re-hero__inner">
				<h2 class="re-hero__title">Find Property</h2>

				<form class="re-filter" id="reFilterForm">
					<div class="re-row re-row-1">
						<select name="purpose" class="re-input">
							<option value="">Purpose</option>
							<option value="For Sale">For Sale</option>
							<option value="For Rent">For Rent</option>
							<option value="Off Plan">Off Plan</option>
						</select>

						<select name="status" class="re-input">
							<option value="">Completion status</option>
							<option value="Ready">Ready</option>
							<option value="Off Plan">Off Plan</option>
							<option value="Sold">Sold</option>
							<option value="Reserved">Reserved</option>
							<option value="Rented">Rented</option>
						</select>

						<div class="re-searchWrap">
							<span class="re-searchIcon">🔎</span>
							<input type="text" name="s" class="re-input re-search" placeholder="Location, Community, City..." />
						</div>

						<button type="submit" class="re-btn">FIND</button>
					</div>

					<div class="re-row re-row-2">
						<input type="number" name="min_size" class="re-input" placeholder="Min. Area (sqft)">
						<input type="number" name="max_size" class="re-input" placeholder="Max. Area (sqft)">

						<input type="number" name="min_beds" class="re-input" placeholder="Min. Bedrooms">
						<input type="number" name="min_baths" class="re-input" placeholder="Min. Baths">

						<input type="number" name="min_price" class="re-input" placeholder="Min. Price">
						<input type="number" name="max_price" class="re-input" placeholder="Max. Price">
					</div>

					<input type="hidden" name="paged" value="1">
					<input type="hidden" name="nonce" value="<?php echo esc_attr(wp_create_nonce('reaf_filter_nonce')); ?>">
				</form>
			</div>
		</div>

		<div class="re-toolbar">
			<div class="re-toolbar__left">
				<span class="re-muted">Results:</span> <strong id="reFound">0</strong>
			</div>

			<div class="re-toolbar__right">
				<label class="re-muted">Sort by:</label>
				<select id="reSort" class="re-input re-input--sm">
					<option value="newest" selected>Newest</option>
					<option value="price_asc">Price (Low)</option>
					<option value="price_desc">Price (High)</option>
					<option value="size_desc">Area (High)</option>
				</select>
			</div>
		</div>

		<div id="reResults" class="re-results"></div>

		<div class="re-pagination">
			<button class="re-page" data-dir="prev" type="button">Prev</button>
			<span id="rePageInfo" class="re-pageInfo"></span>
			<button class="re-page" data-dir="next" type="button">Next</button>
		</div>
	</div>
	<?php return ob_get_clean();
});


/* ===========================
  2) AJAX ENDPOINTS
=========================== */
add_action('wp_ajax_reaf_filter_porpertypi', 'reaf_filter_porpertypi');
add_action('wp_ajax_nopriv_reaf_filter_porpertypi', 'reaf_filter_porpertypi');

function reaf_filter_porpertypi() {

	if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'reaf_filter_nonce')) {
		wp_send_json_error(['message' => 'Invalid nonce']);
	}

	$paged = isset($_POST['paged']) ? max(1, (int)$_POST['paged']) : 1;
	$s = isset($_POST['s']) ? sanitize_text_field($_POST['s']) : '';

	// IMPORTANT: your real meta keys
	$purpose = isset($_POST['purpose']) ? sanitize_text_field($_POST['purpose']) : '';
	$status  = isset($_POST['status']) ? sanitize_text_field($_POST['status']) : '';

	$min_price = (isset($_POST['min_price']) && $_POST['min_price'] !== '') ? (float)$_POST['min_price'] : '';
	$max_price = (isset($_POST['max_price']) && $_POST['max_price'] !== '') ? (float)$_POST['max_price'] : '';
	$min_beds  = (isset($_POST['min_beds'])  && $_POST['min_beds']  !== '') ? (float)$_POST['min_beds']  : '';
	$min_baths = (isset($_POST['min_baths']) && $_POST['min_baths'] !== '') ? (float)$_POST['min_baths'] : '';
	$min_size  = (isset($_POST['min_size'])  && $_POST['min_size']  !== '') ? (float)$_POST['min_size']  : '';
	$max_size  = (isset($_POST['max_size'])  && $_POST['max_size']  !== '') ? (float)$_POST['max_size']  : '';

	$sort = isset($_POST['sort']) ? sanitize_text_field($_POST['sort']) : 'newest';

	$meta_query = ['relation' => 'AND'];

	// purpose/status are stored as pp_purpose/pp_status
	if ($purpose !== '') {
		$meta_query[] = [
			'key' => 'pp_purpose',
			'value' => $purpose,
			'compare' => '='
		];
	}

	if ($status !== '') {
		$meta_query[] = [
			'key' => 'pp_status',
			'value' => $status,
			'compare' => '='
		];
	}

	// price range (_re_price)
	if ($min_price !== '') {
		$meta_query[] = [
			'key' => '_re_price',
			'value' => $min_price,
			'type' => 'NUMERIC',
			'compare' => '>='
		];
	}
	if ($max_price !== '') {
		$meta_query[] = [
			'key' => '_re_price',
			'value' => $max_price,
			'type' => 'NUMERIC',
			'compare' => '<='
		];
	}

	// beds/baths minimum
	if ($min_beds !== '') {
		$meta_query[] = [
			'key' => '_re_beds',
			'value' => $min_beds,
			'type' => 'NUMERIC',
			'compare' => '>='
		];
	}
	if ($min_baths !== '') {
		$meta_query[] = [
			'key' => '_re_baths',
			'value' => $min_baths,
			'type' => 'NUMERIC',
			'compare' => '>='
		];
	}

	// size range (_re_size_sqft)
	if ($min_size !== '') {
		$meta_query[] = [
			'key' => '_re_size_sqft',
			'value' => $min_size,
			'type' => 'NUMERIC',
			'compare' => '>='
		];
	}
	if ($max_size !== '') {
		$meta_query[] = [
			'key' => '_re_size_sqft',
			'value' => $max_size,
			'type' => 'NUMERIC',
			'compare' => '<='
		];
	}

	// Sorting
	$args = [
		'post_type'      => 'porpertypi',
		'post_status'    => 'publish',
		'posts_per_page' => 9,
		'paged'          => $paged,
		's'              => $s,
		'meta_query'     => (count($meta_query) > 1) ? $meta_query : [],
	];

	// sort switch
	if ($sort === 'price_asc') {
		$args['meta_key'] = '_re_price';
		$args['orderby'] = 'meta_value_num';
		$args['order'] = 'ASC';
	} elseif ($sort === 'price_desc') {
		$args['meta_key'] = '_re_price';
		$args['orderby'] = 'meta_value_num';
		$args['order'] = 'DESC';
	} elseif ($sort === 'size_desc') {
		$args['meta_key'] = '_re_size_sqft';
		$args['orderby'] = 'meta_value_num';
		$args['order'] = 'DESC';
	} else {
		$args['orderby'] = 'date';
		$args['order'] = 'DESC';
	}

	$q = new WP_Query($args);

	ob_start();
	if ($q->have_posts()) {
		echo '<div class="re-grid">';
		while ($q->have_posts()) {
			$q->the_post();
			$id = get_the_ID();
			$price = get_post_meta($id, '_re_price', true);
			$beds  = get_post_meta($id, '_re_beds', true);
			$baths = get_post_meta($id, '_re_baths', true);
			$size  = get_post_meta($id, '_re_size_sqft', true);

			$pp_purpose = get_post_meta($id, 'pp_purpose', true);
			$pp_status  = get_post_meta($id, 'pp_status', true);

	?>
			<a class="re-card" href="<?php echo esc_url(get_permalink($id)); ?>">
				<div class="re-card__img">
					<?php if (has_post_thumbnail($id)) {
						echo get_the_post_thumbnail($id, 'large');
					} else { ?>
						<div class="re-ph">No Image</div>
					<?php } ?>

					<div class="re-badges">
						<?php if ($pp_purpose) : ?><span class="re-badge re-badge--a"><?php echo esc_html($pp_purpose); ?></span><?php endif; ?>
						<?php if ($pp_status) : ?><span class="re-badge re-badge--b"><?php echo esc_html($pp_status); ?></span><?php endif; ?>
					</div>
				</div>

				<div class="re-card__body">
					<div class="re-price"><?php echo esc_html(number_format_i18n((float)$price)); ?> AED</div>
					<div class="re-title"><?php echo esc_html(get_the_title($id)); ?></div>

					<div class="re-meta">
						<span><?php echo esc_html($beds ?: 0); ?> Beds</span>
						<span><?php echo esc_html($baths ?: 0); ?> Baths</span>
						<span><?php echo esc_html($size ?: 0); ?> sqft</span>
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
	$html = ob_get_clean();

	wp_send_json_success([
		'html' => $html,
		'found' => (int)$q->found_posts,
		'max_pages' => (int)$q->max_num_pages,
		'paged' => $paged,
	]);
}


/* ===========================
  3) FRONTEND CSS + JS (INLINE)
=========================== */
add_action('wp_enqueue_scripts', function () {
	// CSS
	wp_register_style('reaf-filter-style', false);
	wp_enqueue_style('reaf-filter-style');
	wp_add_inline_style('reaf-filter-style', "
    .re-wrap{max-width:1200px;width:100%;margin:0 auto;font-family:Poppins,system-ui;padding:14px}
    .re-hero{border-radius:16px;overflow:hidden;background:linear-gradient(180deg, rgba(2,6,23,.35), rgba(2,6,23,.05)), url('https://images.unsplash.com/photo-1506377247377-2a5b3b417ebb?auto=format&fit=crop&w=2000&q=80');background-size:cover;background-position:center}
    .re-hero__inner{padding:30px 18px}
    .re-hero__title{margin:0 0 12px 0;color:#fff;text-align:center;font-size:32px;font-weight:800;letter-spacing:-.3px}
    .re-filter{background:rgba(255,255,255,.85);backdrop-filter:blur(10px);border:1px solid #e5e7eb;border-radius:14px;box-shadow:0 10px 30px rgba(2,8,23,.10);padding:12px;max-width:1080px;margin:0 auto}
    .re-row{display:grid;gap:10px;align-items:center}
    .re-row-1{grid-template-columns:140px 180px 1fr 140px}
    .re-row-2{grid-template-columns:repeat(6,minmax(0,1fr));margin-top:10px}
    .re-input{width:100%;padding:12px 12px;border:1px solid #e5e7eb;border-radius:10px;background:#fff;font-family:Poppins,system-ui}
    .re-input--sm{padding:10px 10px;border-radius:10px}
    .re-btn{padding:12px;border-radius:10px;border:0;background:#0b63ce;color:#fff;font-weight:800;cursor:pointer}
    .re-searchWrap{position:relative}
    .re-searchIcon{position:absolute;left:10px;top:50%;transform:translateY(-50%);opacity:.65}
    .re-search{padding-left:34px}
    .re-toolbar{display:flex;justify-content:space-between;align-items:center;gap:12px;margin:16px 0}
    .re-muted{color:#64748b;font-size:13px}
    .re-results{margin-top:10px}
    .re-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px}
    .re-card{display:block;text-decoration:none;border:1px solid #e5e7eb;border-radius:14px;overflow:hidden;background:#fff;box-shadow:0 10px 30px rgba(2,8,23,.08)}
    .re-card__img{position:relative}
    .re-card__img img{width:100%;height:200px;object-fit:cover;display:block}
    .re-ph{height:200px;display:grid;place-items:center;background:#f1f5f9;color:#64748b}
    .re-badges{position:absolute;left:10px;top:10px;display:flex;gap:8px}
    .re-badge{font-size:11px;font-weight:800;padding:6px 10px;border-radius:999px;color:#fff}
    .re-badge--a{background:#0b63ce}
    .re-badge--b{background:rgba(15,23,42,.75)}
    .re-card__body{padding:12px}
    .re-price{font-size:18px;font-weight:900;color:#0b63ce}
    .re-title{margin-top:6px;font-weight:800;color:#0f172a}
    .re-meta{display:flex;gap:12px;margin-top:8px;color:#64748b;font-size:12px}
    .re-empty{padding:20px;border:1px dashed #cbd5e1;border-radius:14px;background:#fff;color:#64748b}
    .re-pagination{display:flex;gap:10px;justify-content:center;align-items:center;margin-top:14px}
    .re-page{border:1px solid #e5e7eb;background:#fff;border-radius:10px;padding:10px 12px;cursor:pointer}
    .re-page:disabled{opacity:.5;cursor:not-allowed}
    .re-pageInfo{font-weight:800;color:#0f172a}

    @media(max-width:1024px){
      .re-row-1{grid-template-columns:1fr 1fr}
      .re-row-2{grid-template-columns:1fr 1fr}
      .re-grid{grid-template-columns:repeat(2,minmax(0,1fr))}
      .re-hero__title{font-size:26px}
    }
    @media(max-width:640px){
      .re-grid{grid-template-columns:1fr}
      .re-hero__inner{padding:22px 12px}
      .re-filter{padding:10px}
    }
  ");

	// JS
	wp_register_script('reaf-filter-js', false, ['jquery'], null, true);
	wp_enqueue_script('reaf-filter-js');
	wp_add_inline_script('reaf-filter-js', "
    (function($){
      function collectForm(){
        const arr = $('#reFilterForm').serializeArray();
        const data = {};
        arr.forEach(x => data[x.name] = x.value);
        data.action = 'reaf_filter_porpertypi';
        data.sort = $('#reSort').val() || 'newest';
        return data;
      }

      function fetchProps(page){
        const data = collectForm();
        data.paged = page || 1;

        $('#reResults').css({opacity:.55, pointerEvents:'none'});
        $.post('" . esc_url(admin_url('admin-ajax.php')) . "', data)
          .done(function(res){
            $('#reResults').css({opacity:1, pointerEvents:''});
            if(!res || !res.success){
              $('#reResults').html('<div class=\"re-empty\">Error loading properties.</div>');
              return;
            }
            $('#reResults').html(res.data.html);
            $('#reFound').text(res.data.found || 0);

            const max = res.data.max_pages || 1;
            const pg  = res.data.paged || 1;
            $('#rePageInfo').text(pg + ' / ' + max);
            $('.re-page[data-dir=\"prev\"]').prop('disabled', pg<=1);
            $('.re-page[data-dir=\"next\"]').prop('disabled', pg>=max);
            $('#reFilterForm input[name=\"paged\"]').val(pg);
          })
          .fail(function(){
            $('#reResults').css({opacity:1, pointerEvents:''});
            $('#reResults').html('<div class=\"re-empty\">Request failed.</div>');
          });
      }

      // initial load
      $(function(){ fetchProps(1); });

      // submit
      $(document).on('submit', '#reFilterForm', function(e){
        e.preventDefault();
        fetchProps(1);
      });

      // sort change
      $(document).on('change', '#reSort', function(){
        fetchProps(1);
      });

      // pagination
      $(document).on('click', '.re-page', function(){
        const dir = $(this).data('dir');
        const current = parseInt($('#reFilterForm input[name=\"paged\"]').val() || '1', 10);
        fetchProps(dir==='next' ? current+1 : current-1);
      });

    })(jQuery);
  ");
});

include_once get_template_directory() . '/template-parts/filter/buy-ajax-filter.php';
