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



// ajax filter -=========================================================

// 1) Shortcode: [porpertypi_ajax_filter]
add_shortcode('porpertypi_ajax_filter', function () {
	ob_start(); ?>
	<div class="re-wrap">
		<form class="re-filter" id="reFilterForm">
			<div class="re-row">
				<select name="purpose" class="re-input">
					<option value="">Purpose (All)</option>
					<option value="buy">Buy</option>
					<option value="rent">Rent</option>
				</select>

				<select name="status" class="re-input">
					<option value="">Status (All)</option>
					<option value="ready">Ready</option>
					<option value="offplan">Off-plan</option>
				</select>

				<input type="text" name="s" class="re-input re-search" placeholder="Location, Community, City..." />
				<button type="submit" class="re-btn">FIND</button>
			</div>

			<div class="re-row re-row-2">
				<input type="number" name="min_price" class="re-input" placeholder="Min. Price">
				<input type="number" name="max_price" class="re-input" placeholder="Max. Price">

				<input type="number" name="min_beds" class="re-input" placeholder="Min. Beds">
				<input type="number" name="min_baths" class="re-input" placeholder="Min. Baths">

				<input type="number" name="min_size" class="re-input" placeholder="Min. Size (sqft)">
				<input type="number" name="max_size" class="re-input" placeholder="Max. Size (sqft)">
			</div>

			<input type="hidden" name="paged" value="1">
			<input type="hidden" name="nonce" value="<?php echo esc_attr(wp_create_nonce('re_filter_nonce')); ?>">
		</form>

		<div id="reResults" class="re-results"></div>

		<div class="re-pagination">
			<button class="re-page" data-dir="prev" type="button">Prev</button>
			<span id="rePageInfo"></span>
			<button class="re-page" data-dir="next" type="button">Next</button>
		</div>
	</div>
	<?php return ob_get_clean();
});

// 2) AJAX endpoints
add_action('wp_ajax_re_filter_porpertypi', 're_filter_porpertypi');
add_action('wp_ajax_nopriv_re_filter_porpertypi', 're_filter_porpertypi');

function re_filter_porpertypi() {
	// Security
	if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 're_filter_nonce')) {
		wp_send_json_error(['message' => 'Invalid nonce']);
	}

	$paged = isset($_POST['paged']) ? max(1, (int)$_POST['paged']) : 1;

	// Search by title
	$s = isset($_POST['s']) ? sanitize_text_field($_POST['s']) : '';

	// Select filters
	$purpose = isset($_POST['purpose']) ? sanitize_text_field($_POST['purpose']) : '';
	$status  = isset($_POST['status']) ? sanitize_text_field($_POST['status']) : '';

	// Numeric filters
	$min_price = isset($_POST['min_price']) ? (int)$_POST['min_price'] : '';
	$max_price = isset($_POST['max_price']) ? (int)$_POST['max_price'] : '';
	$min_beds  = isset($_POST['min_beds'])  ? (int)$_POST['min_beds']  : '';
	$min_baths = isset($_POST['min_baths']) ? (int)$_POST['min_baths'] : '';
	$min_size  = isset($_POST['min_size'])  ? (int)$_POST['min_size']  : '';
	$max_size  = isset($_POST['max_size'])  ? (int)$_POST['max_size']  : '';

	$meta_query = ['relation' => 'AND'];

	// purpose + status (আপনার meta_key ঠিক করুন)
	if ($purpose !== '') {
		$meta_query[] = [
			'key'   => 'purpose',         // আপনার meta_key যদি আলাদা হয় এখানে বদলাবেন
			'value' => $purpose,
			'compare' => '='
		];
	}

	if ($status !== '') {
		$meta_query[] = [
			'key'   => 'status',          // আপনার meta_key যদি আলাদা হয় এখানে বদলাবেন
			'value' => $status,
			'compare' => '='
		];
	}

	// price
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

	// beds / baths (minimum)
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

	// size range
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

	$args = [
		'post_type'      => 'porpertypi',
		'post_status'    => 'publish',
		'posts_per_page' => 9,
		'paged'          => $paged,
		's'              => $s,
		'meta_query'     => (count($meta_query) > 1) ? $meta_query : [],
	];

	$q = new WP_Query($args);

	ob_start();
	if ($q->have_posts()) :
		echo '<div class="re-grid">';
		while ($q->have_posts()) : $q->the_post();
			$id = get_the_ID();
			$price = get_post_meta($id, '_re_price', true);
			$beds  = get_post_meta($id, '_re_beds', true);
			$baths = get_post_meta($id, '_re_baths', true);
			$size  = get_post_meta($id, '_re_size_sqft', true);
	?>
			<a class="re-card" href="<?php the_permalink(); ?>">
				<div class="re-card__img">
					<?php if (has_post_thumbnail()) {
						echo get_the_post_thumbnail($id, 'large');
					} else { ?>
						<div class="re-ph">No Image</div>
					<?php } ?>
				</div>

				<div class="re-card__body">
					<div class="re-price"><?php echo esc_html(number_format_i18n((int)$price)); ?> AED</div>
					<div class="re-title"><?php the_title(); ?></div>

					<div class="re-meta">
						<span><?php echo esc_html($beds ?: 0); ?> Beds</span>
						<span><?php echo esc_html($baths ?: 0); ?> Baths</span>
						<span><?php echo esc_html($size ?: 0); ?> sqft</span>
					</div>
				</div>
			</a>
<?php
		endwhile;
		echo '</div>';
	else:
		echo '<div class="re-empty">No properties found.</div>';
	endif;
	wp_reset_postdata();

	$html = ob_get_clean();

	wp_send_json_success([
		'html' => $html,
		'found' => (int)$q->found_posts,
		'max_pages' => (int)$q->max_num_pages,
		'paged' => $paged,
	]);
}

// 3) Enqueue JS/CSS (simple inline)
add_action('wp_enqueue_scripts', function () {
	wp_register_style('re-filter-style', false);
	wp_enqueue_style('re-filter-style');
	wp_add_inline_style('re-filter-style', "
    .re-wrap{max-width:1200px;margin:0 auto;padding:14px}
    .re-filter{background:rgba(255,255,255,.85);backdrop-filter:blur(8px);border:1px solid #e5e7eb;border-radius:14px;box-shadow:0 10px 30px rgba(2,8,23,.08);padding:12px}
    .re-row{display:grid;grid-template-columns:140px 180px 1fr 140px;gap:10px;align-items:center}
    .re-row-2{grid-template-columns:repeat(6,1fr);margin-top:10px}
    .re-input{width:100%;padding:12px 12px;border:1px solid #e5e7eb;border-radius:10px;font-family:Poppins,system-ui}
    .re-btn{padding:12px;border-radius:10px;border:0;background:#0b63ce;color:#fff;font-weight:700;cursor:pointer}
    .re-results{margin-top:18px}
    .re-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px}
    .re-card{display:block;text-decoration:none;border:1px solid #e5e7eb;border-radius:14px;overflow:hidden;background:#fff;box-shadow:0 10px 30px rgba(2,8,23,.08)}
    .re-card__img img{width:100%;height:190px;object-fit:cover;display:block}
    .re-ph{height:190px;display:grid;place-items:center;background:#f1f5f9;color:#64748b}
    .re-card__body{padding:12px}
    .re-price{font-size:18px;font-weight:800;color:#0b63ce}
    .re-title{margin-top:6px;font-weight:700;color:#0f172a}
    .re-meta{display:flex;gap:12px;margin-top:8px;color:#64748b;font-size:12px}
    .re-empty{padding:20px;border:1px dashed #cbd5e1;border-radius:14px;background:#fff;color:#64748b}
    .re-pagination{display:flex;gap:10px;justify-content:center;align-items:center;margin-top:14px}
    .re-page{border:1px solid #e5e7eb;background:#fff;border-radius:10px;padding:10px 12px;cursor:pointer}
    @media(max-width:1024px){
      .re-row{grid-template-columns:1fr 1fr;grid-auto-rows:auto}
      .re-row-2{grid-template-columns:1fr 1fr}
      .re-grid{grid-template-columns:repeat(2,minmax(0,1fr))}
    }
    @media(max-width:640px){
      .re-grid{grid-template-columns:1fr}
    }
  ");

	wp_register_script('re-filter-js', false, ['jquery'], null, true);
	wp_enqueue_script('re-filter-js');
	wp_add_inline_script('re-filter-js', "
    (function($){
      function fetchProps(page){
        const \$form = $('#reFilterForm');
        const data = \$form.serializeArray().reduce((a,x)=>{a[x.name]=x.value;return a;},{});
        data.action = 're_filter_porpertypi';
        data.paged = page || 1;

        $('#reResults').css({opacity:.6, pointerEvents:'none'});
        $.post('" . esc_url(admin_url('admin-ajax.php')) . "', data, function(res){
          $('#reResults').css({opacity:1, pointerEvents:''});
          if(!res || !res.success){ $('#reResults').html('<div class=\"re-empty\">Error loading properties.</div>'); return; }
          $('#reResults').html(res.data.html);

          // page info + button state
          const max = res.data.max_pages || 1;
          const pg  = res.data.paged || 1;
          $('#rePageInfo').text(pg+' / '+max);
          $('.re-page[data-dir=\"prev\"]').prop('disabled', pg<=1);
          $('.re-page[data-dir=\"next\"]').prop('disabled', pg>=max);
          \$form.find('input[name=\"paged\"]').val(pg);
        });
      }

      // initial load
      $(document).on('ready', function(){ fetchProps(1); });

      // FIND submit
      $(document).on('submit', '#reFilterForm', function(e){
        e.preventDefault();
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
