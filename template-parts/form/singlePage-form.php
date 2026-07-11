<?php

add_shortcode( 'property_sidebar_inquiry_safe', 'property_sidebar_inquiry_safe_shortcode' );

function property_sidebar_inquiry_safe_shortcode() {
	wp_enqueue_script(
		'google-recaptcha-v2-safe',
		'https://www.google.com/recaptcha/api.js',
		array(),
		null,
		true
	);

	wp_enqueue_style(
		'property-sidebar-select2-safe',
		'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
		array(),
		'4.1.0-rc.0'
	);

	wp_enqueue_script(
		'property-sidebar-select2-safe',
		'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
		array( 'jquery' ),
		'4.1.0-rc.0',
		true
	);

	wp_add_inline_script(
		'property-sidebar-select2-safe',
		<<<'JS'
(function($){
	'use strict';

	function propertySidebarFormatCountry(option){
		if (!option.id) {
			return option.text;
		}

		var flagUrl = $(option.element).data('flag-url');
		var text    = option.text || '';
		var $item   = $('<span class="property-sidebar-select2-country"></span>');

		if (flagUrl) {
			$('<img>', {
				src: flagUrl,
				alt: '',
				loading: 'lazy'
			}).appendTo($item);
		}

		$('<span class="property-sidebar-select2-country-text"></span>').text(text).appendTo($item);
		return $item;
	}

	function propertySidebarInitCountrySelect2(context){
		var $context = context ? $(context) : $(document);

		$context.find('.property-sidebar-inquiry-country-select').each(function(){
			var $select = $(this);

			if ($select.hasClass('select2-hidden-accessible')) {
				return;
			}

			$select.select2({
				width: '100%',
				minimumResultsForSearch: 8,
				dropdownAutoWidth: false,
				dropdownParent: $select.closest('.property-sidebar-inquiry-wrap'),
				dropdownCssClass: 'property-sidebar-inquiry-select2-dropdown',
				templateResult: propertySidebarFormatCountry,
				templateSelection: propertySidebarFormatCountry,
				escapeMarkup: function(markup) {
					return markup;
				}
			});
		});
	}

	$(window).on('load', function(){
		propertySidebarInitCountrySelect2(document);
	});
})(jQuery);
JS
	);

	$post_id    = 0;
	$post_title = '';
	$post_url   = home_url( '/' );

	if ( is_singular() ) {
		$post_id    = get_queried_object_id();
		$post_title = get_the_title( $post_id );
		$post_url   = get_permalink( $post_id );
	}

	$success = isset( $_GET['psi_safe_success'] ) && '1' === sanitize_text_field( wp_unslash( $_GET['psi_safe_success'] ) );
	$error   = isset( $_GET['psi_safe_error'] ) ? sanitize_key( wp_unslash( $_GET['psi_safe_error'] ) ) : '';

	$terms_url   = home_url( '/terms-of-use/' );
	$privacy_url = function_exists( 'get_privacy_policy_url' ) ? get_privacy_policy_url() : home_url( '/privacy-policy/' );

	ob_start();
	?>
	<div class="property-sidebar-inquiry-wrap">
		<style>
			.property-sidebar-inquiry-wrap,
			.property-sidebar-inquiry-wrap *{
				box-sizing:border-box;
			}

			.property-sidebar-inquiry-wrap{
				display:block;
				width:100%;
				max-width:100%;
				min-width:0;
				background:#f5eee8;
				border:1px solid #e2d9d1;
				border-radius:14px;
				padding:14px;
				box-shadow:0 2px 10px rgba(0,0,0,.04);
				font-family:"Poppins",system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;
				color:#111111;
				overflow:hidden;
			}

			.property-sidebar-inquiry-title{
				margin:0 0 24px;
				font-weight:700;
				font-size:18px;
				line-height:1.25;
				letter-spacing:-0.02em;
				color:#000000;
			}

			.property-sidebar-inquiry-subtitle{
				margin:0 0 6px;
				font-size:13px;
				line-height:1.5;
				font-weight:400;
				color:#767676;
			}

			.property-sidebar-inquiry-heading{
				margin:0 0 18px;
				font-size:15px;
				line-height:1.4;
				font-weight:700;
				color:#000000;
			}

			.property-sidebar-inquiry-notice{
				margin:0 0 14px;
				padding:12px 14px;
				border-radius:10px;
				font-size:13px;
				line-height:1.5;
			}

			.property-sidebar-inquiry-notice.success{
				background:rgba(40,167,69,.08);
				border:1px solid rgba(40,167,69,.18);
				color:#111111;
			}

			.property-sidebar-inquiry-notice.error{
				background:rgba(220,53,69,.08);
				border:1px solid rgba(220,53,69,.18);
				color:#111111;
			}

			.property-sidebar-inquiry-field{
				margin-bottom:14px;
				width:100%;
				max-width:100%;
				min-width:0;
			}

			.property-sidebar-inquiry-label{
				display:block;
				margin:0 0 8px;
				font-size:13px;
				line-height:1.4;
				color:#6f6f6f;
				font-weight:500;
			}

			.property-sidebar-inquiry-input,
			.property-sidebar-inquiry-select,
			.property-sidebar-inquiry-textarea{
				display:block;
				width:100%;
				max-width:100%;
				min-width:0;
				background:#ffffff;
				border:1px solid #d8d8d8;
				color:#3b4652;
				font-size:14px;
				line-height:1.4;
				outline:none;
				transition:border-color .2s ease, box-shadow .2s ease;
				box-shadow:none;
			}

			.property-sidebar-inquiry-input,
			.property-sidebar-inquiry-select{
				height:48px;
				padding:0 16px;
				border-radius:999px;
			}

			.property-sidebar-inquiry-textarea{
				min-height:124px;
				padding:14px 16px;
				border-radius:12px;
				resize:vertical;
			}

			.property-sidebar-inquiry-input:focus,
			.property-sidebar-inquiry-select:focus,
			.property-sidebar-inquiry-textarea:focus{
				border-color:#1184c7;
				box-shadow:0 0 0 3px rgba(17,132,199,.12);
			}

			.property-sidebar-inquiry-phone-row{
				display:grid;
				grid-template-columns:minmax(110px,140px) minmax(0,1fr);
				gap:10px;
				width:100%;
			}
			/* Select2 country flag dropdown - professional fixed style */
			.property-sidebar-inquiry-field{
				position:relative;
			}

			.property-sidebar-inquiry-phone-row .select2-container{
				width:100% !important;
				max-width:100% !important;
				min-width:0 !important;
				display:block !important;
			}

			.property-sidebar-inquiry-wrap .select2-container--default .select2-selection--single{
				width:100% !important;
				height:48px !important;
				min-height:48px !important;
				border:1px solid #d8d8d8 !important;
				border-radius:999px !important;
				background:#ffffff !important;
				outline:none !important;
				box-shadow:none !important;
				overflow:hidden !important;
				display:flex !important;
				align-items:center !important;
			}

			.property-sidebar-inquiry-wrap .select2-container--default .select2-selection--single .select2-selection__rendered{
				width:100% !important;
				height:48px !important;
				line-height:48px !important;
				padding:0 38px 0 14px !important;
				color:#3b4652 !important;
				font-size:14px !important;
				overflow:hidden !important;
				text-overflow:ellipsis !important;
				white-space:nowrap !important;
				display:flex !important;
				align-items:center !important;
			}

			.property-sidebar-inquiry-wrap .select2-container--default .select2-selection--single .select2-selection__arrow{
				height:48px !important;
				width:30px !important;
				top:0 !important;
				right:8px !important;
			}

			.property-sidebar-inquiry-wrap .select2-container--default .select2-selection--single .select2-selection__arrow b{
				border-color:#777 transparent transparent transparent !important;
				border-width:5px 4px 0 4px !important;
				margin-left:-4px !important;
				margin-top:-2px !important;
			}

			.property-sidebar-inquiry-wrap .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
				border-color:transparent transparent #777 transparent !important;
				border-width:0 4px 5px 4px !important;
			}

			.property-sidebar-inquiry-wrap .select2-container--default.select2-container--focus .select2-selection--single,
			.property-sidebar-inquiry-wrap .select2-container--default.select2-container--open .select2-selection--single{
				border-color:#1184c7 !important;
				box-shadow:0 0 0 3px rgba(17,132,199,.12) !important;
			}

			.property-sidebar-select2-country{
				display:flex !important;
				align-items:center !important;
				gap:8px !important;
				width:100% !important;
				max-width:100% !important;
				min-width:0 !important;
				font-size:14px !important;
				line-height:1 !important;
				white-space:nowrap !important;
				overflow:hidden !important;
			}

			.property-sidebar-select2-country img{
				width:24px !important;
				height:18px !important;
				object-fit:cover !important;
				border-radius:3px !important;
				box-shadow:0 0 0 1px rgba(0,0,0,.12) !important;
				flex:0 0 24px !important;
				display:block !important;
			}

			.property-sidebar-select2-country-text{
				display:block !important;
				min-width:0 !important;
				max-width:100% !important;
				overflow:hidden !important;
				text-overflow:ellipsis !important;
				white-space:nowrap !important;
			}

			.property-sidebar-inquiry-wrap .select2-container--open,
			.select2-container--open{
				z-index:999999 !important;
			}

			.select2-dropdown.property-sidebar-inquiry-select2-dropdown{
				z-index:999999 !important;
				border:1px solid #d8d8d8 !important;
				border-radius:16px !important;
				overflow:hidden !important;
				box-shadow:0 18px 45px rgba(0,0,0,.14) !important;
				background:#ffffff !important;
				margin-top:6px !important;
			}

			.select2-dropdown.property-sidebar-inquiry-select2-dropdown .select2-search--dropdown{
				padding:10px !important;
				background:#ffffff !important;
			}

			.select2-dropdown.property-sidebar-inquiry-select2-dropdown .select2-search--dropdown .select2-search__field{
				height:40px !important;
				border:1px solid #d8d8d8 !important;
				border-radius:999px !important;
				padding:0 14px !important;
				outline:none !important;
				font-size:14px !important;
			}

			.select2-dropdown.property-sidebar-inquiry-select2-dropdown .select2-search--dropdown .select2-search__field:focus{
				border-color:#1184c7 !important;
				box-shadow:0 0 0 3px rgba(17,132,199,.12) !important;
			}

			.select2-dropdown.property-sidebar-inquiry-select2-dropdown .select2-results__options{
				max-height:240px !important;
				overflow-y:auto !important;
				overflow-x:hidden !important;
				padding:6px !important;
				scrollbar-width:none !important;
				-ms-overflow-style:none !important;
			}

			.select2-dropdown.property-sidebar-inquiry-select2-dropdown .select2-results__options::-webkit-scrollbar{
				display:none !important;
			}

			.select2-dropdown.property-sidebar-inquiry-select2-dropdown .select2-results__option{
				padding:10px 12px !important;
				border-radius:10px !important;
				color:#3b4652 !important;
				font-size:14px !important;
				line-height:1.3 !important;
				overflow:hidden !important;
				white-space:nowrap !important;
				text-overflow:ellipsis !important;
			}

			.select2-dropdown.property-sidebar-inquiry-select2-dropdown .select2-results__option--highlighted[aria-selected]{
				background:#111111 !important;
				color:#ffffff !important;
			}

			.select2-dropdown.property-sidebar-inquiry-select2-dropdown .select2-results__option--selected{
				background:rgba(17,132,199,.10) !important;
				color:#111111 !important;
			}

			.select2-dropdown.property-sidebar-inquiry-select2-dropdown .select2-results__option--highlighted[aria-selected] .property-sidebar-select2-country,
			.select2-dropdown.property-sidebar-inquiry-select2-dropdown .select2-results__option--highlighted[aria-selected] .property-sidebar-select2-country-text{
				color:#ffffff !important;
			}

			@media (max-width:575px){
				.property-sidebar-inquiry-phone-row .select2-container{
					width:100% !important;
				}

				.select2-dropdown.property-sidebar-inquiry-select2-dropdown{
					max-width:calc(100vw - 28px) !important;
				}
			}
.property-sidebar-inquiry-recaptcha{
				margin:8px 0 18px;
				overflow:hidden;
			}

			.property-sidebar-inquiry-check{
				display:flex;
				align-items:flex-start;
				gap:10px;
				margin:0 0 14px;
			}

			.property-sidebar-inquiry-check input[type="checkbox"]{
				width:22px;
				height:22px;
				min-width:22px;
				margin:2px 0 0;
				accent-color:#1287c7;
			}

			.property-sidebar-inquiry-check label{
				margin:0;
				font-size:13px;
				line-height:1.55;
				font-weight:400;
				color:#5f6770;
			}

			.property-sidebar-inquiry-check a{
				color:#5f5f5f;
				font-weight:600;
				text-decoration:underline;
			}

			.property-sidebar-inquiry-submit{
				display:block;
				width:100%;
				height:48px;
				border:none;
				border-radius:999px;
				background:#111111;
				color:#ffffff;
				font-size:14px;
				font-weight:700;
				cursor:pointer;
				transition:background .2s ease, transform .2s ease;
			}

			.property-sidebar-inquiry-submit:hover{
				background:#000000;
				transform:translateY(-1px);
			}

			@media (max-width: 575px){
				.property-sidebar-inquiry-phone-row{
					grid-template-columns:1fr;
				}

				.property-sidebar-inquiry-recaptcha .g-recaptcha{
					transform:scale(.92);
					transform-origin:left top;
				}
			}
		</style>

		<h3 class="property-sidebar-inquiry-title"><?php echo esc_html__( 'Request Dedicated Consultant', 'sbtech' ); ?></h3>
		<p class="property-sidebar-inquiry-subtitle"><?php echo esc_html__( 'Ready for your new home?', 'sbtech' ); ?></p>
		<p class="property-sidebar-inquiry-heading"><?php echo esc_html__( 'Send us an Inquiry', 'sbtech' ); ?></p>

		<?php if ( $success ) : ?>
			<div class="property-sidebar-inquiry-notice success">
				<?php echo esc_html__( 'Thank you. Your inquiry has been sent successfully.', 'sbtech' ); ?>
			</div>
		<?php elseif ( $error ) : ?>
			<div class="property-sidebar-inquiry-notice error">
				<?php echo esc_html( property_sidebar_inquiry_safe_error_message( $error ) ); ?>
			</div>
		<?php endif; ?>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="property_sidebar_inquiry_safe_submit">
			<input type="hidden" name="property_sidebar_inquiry_safe_nonce" value="<?php echo esc_attr( wp_create_nonce( 'property_sidebar_inquiry_safe_submit' ) ); ?>">
			<input type="hidden" name="source_post_id" value="<?php echo esc_attr( $post_id ); ?>">
			<input type="hidden" name="source_post_title" value="<?php echo esc_attr( $post_title ); ?>">
			<input type="hidden" name="source_post_url" value="<?php echo esc_url( $post_url ); ?>">

			<div class="property-sidebar-inquiry-field">
				<label class="property-sidebar-inquiry-label" for="property_sidebar_inquiry_name">Name</label>
				<input class="property-sidebar-inquiry-input" id="property_sidebar_inquiry_name" name="full_name" type="text" placeholder="Enter your name" required>
			</div>

			<div class="property-sidebar-inquiry-field">
				<label class="property-sidebar-inquiry-label" for="property_sidebar_inquiry_email">Email</label>
				<input class="property-sidebar-inquiry-input" id="property_sidebar_inquiry_email" name="email" type="email" placeholder="Enter email address" required>
			</div>

			<div class="property-sidebar-inquiry-field">
				<label class="property-sidebar-inquiry-label" for="property_sidebar_inquiry_phone">Mobile Number</label>
				<div class="property-sidebar-inquiry-phone-row">
					<select class="property-sidebar-inquiry-select property-sidebar-inquiry-country-select" id="property_sidebar_inquiry_country_code" name="country_code" required>
						<option value="+971" data-flag-url="https://flagcdn.com/24x18/ae.png">+971 (AE)</option> <!-- United Arab Emirates -->
						<option value="+93" data-flag-url="https://flagcdn.com/24x18/af.png">+93 (AF)</option> <!-- Afghanistan -->
						<option value="+971" data-flag-url="https://flagcdn.com/24x18/ae.png">+971 (AE)</option> <!-- United Arab Emirates -->
						<option value="+355" data-flag-url="https://flagcdn.com/24x18/al.png">+355 (AL)</option> <!-- Albania -->
						<option value="+213" data-flag-url="https://flagcdn.com/24x18/dz.png">+213 (DZ)</option> <!-- Algeria -->
						<option value="+376" data-flag-url="https://flagcdn.com/24x18/ad.png">+376 (AD)</option> <!-- Andorra -->
						<option value="+244" data-flag-url="https://flagcdn.com/24x18/ao.png">+244 (AO)</option> <!-- Angola -->
						<option value="+1-268" data-flag-url="https://flagcdn.com/24x18/ag.png">+1-268 (AG)</option> <!-- Antigua and Barbuda -->
						<option value="+54" data-flag-url="https://flagcdn.com/24x18/ar.png">+54 (AR)</option> <!-- Argentina -->
						<option value="+374" data-flag-url="https://flagcdn.com/24x18/am.png">+374 (AM)</option> <!-- Armenia -->
						<option value="+61" data-flag-url="https://flagcdn.com/24x18/au.png">+61 (AU)</option> <!-- Australia -->
						<option value="+43" data-flag-url="https://flagcdn.com/24x18/at.png">+43 (AT)</option> <!-- Austria -->
						<option value="+994" data-flag-url="https://flagcdn.com/24x18/az.png">+994 (AZ)</option> <!-- Azerbaijan -->
						<option value="+1-242" data-flag-url="https://flagcdn.com/24x18/bs.png">+1-242 (BS)</option> <!-- Bahamas -->
						<option value="+973" data-flag-url="https://flagcdn.com/24x18/bh.png">+973 (BH)</option> <!-- Bahrain -->
						<option value="+880" data-flag-url="https://flagcdn.com/24x18/bd.png">+880 (BD)</option> <!-- Bangladesh -->
						<option value="+1-246" data-flag-url="https://flagcdn.com/24x18/bb.png">+1-246 (BB)</option> <!-- Barbados -->
						<option value="+375" data-flag-url="https://flagcdn.com/24x18/by.png">+375 (BY)</option> <!-- Belarus -->
						<option value="+32" data-flag-url="https://flagcdn.com/24x18/be.png">+32 (BE)</option> <!-- Belgium -->
						<option value="+501" data-flag-url="https://flagcdn.com/24x18/bz.png">+501 (BZ)</option> <!-- Belize -->
						<option value="+229" data-flag-url="https://flagcdn.com/24x18/bj.png">+229 (BJ)</option> <!-- Benin -->
						<option value="+975" data-flag-url="https://flagcdn.com/24x18/bt.png">+975 (BT)</option> <!-- Bhutan -->
						<option value="+591" data-flag-url="https://flagcdn.com/24x18/bo.png">+591 (BO)</option> <!-- Bolivia -->
						<option value="+387" data-flag-url="https://flagcdn.com/24x18/ba.png">+387 (BA)</option> <!-- Bosnia and Herzegovina -->
						<option value="+267" data-flag-url="https://flagcdn.com/24x18/bw.png">+267 (BW)</option> <!-- Botswana -->
						<option value="+55" data-flag-url="https://flagcdn.com/24x18/br.png">+55 (BR)</option> <!-- Brazil -->
						<option value="+673" data-flag-url="https://flagcdn.com/24x18/bn.png">+673 (BN)</option> <!-- Brunei -->
						<option value="+359" data-flag-url="https://flagcdn.com/24x18/bg.png">+359 (BG)</option> <!-- Bulgaria -->
						<option value="+226" data-flag-url="https://flagcdn.com/24x18/bf.png">+226 (BF)</option> <!-- Burkina Faso -->
						<option value="+257" data-flag-url="https://flagcdn.com/24x18/bi.png">+257 (BI)</option> <!-- Burundi -->
						<option value="+238" data-flag-url="https://flagcdn.com/24x18/cv.png">+238 (CV)</option> <!-- Cabo Verde -->
						<option value="+855" data-flag-url="https://flagcdn.com/24x18/kh.png">+855 (KH)</option> <!-- Cambodia -->
						<option value="+237" data-flag-url="https://flagcdn.com/24x18/cm.png">+237 (CM)</option> <!-- Cameroon -->
						<option value="+1" data-flag-url="https://flagcdn.com/24x18/ca.png">+1 (CA)</option> <!-- Canada -->
						<option value="+236" data-flag-url="https://flagcdn.com/24x18/cf.png">+236 (CF)</option> <!-- Central African Republic -->
						<option value="+235" data-flag-url="https://flagcdn.com/24x18/td.png">+235 (TD)</option> <!-- Chad -->
						<option value="+56" data-flag-url="https://flagcdn.com/24x18/cl.png">+56 (CL)</option> <!-- Chile -->
						<option value="+86" data-flag-url="https://flagcdn.com/24x18/cn.png">+86 (CN)</option> <!-- China -->
						<option value="+57" data-flag-url="https://flagcdn.com/24x18/co.png">+57 (CO)</option> <!-- Colombia -->
						<option value="+269" data-flag-url="https://flagcdn.com/24x18/km.png">+269 (KM)</option> <!-- Comoros -->
						<option value="+242" data-flag-url="https://flagcdn.com/24x18/cg.png">+242 (CG)</option> <!-- Congo (Republic) -->
						<option value="+243" data-flag-url="https://flagcdn.com/24x18/cd.png">+243 (CD)</option> <!-- Congo (DR) -->
						<option value="+506" data-flag-url="https://flagcdn.com/24x18/cr.png">+506 (CR)</option> <!-- Costa Rica -->
						<option value="+385" data-flag-url="https://flagcdn.com/24x18/hr.png">+385 (HR)</option> <!-- Croatia -->
						<option value="+53" data-flag-url="https://flagcdn.com/24x18/cu.png">+53 (CU)</option> <!-- Cuba -->
						<option value="+357" data-flag-url="https://flagcdn.com/24x18/cy.png">+357 (CY)</option> <!-- Cyprus -->
						<option value="+420" data-flag-url="https://flagcdn.com/24x18/cz.png">+420 (CZ)</option> <!-- Czech Republic -->
						<option value="+45" data-flag-url="https://flagcdn.com/24x18/dk.png">+45 (DK)</option> <!-- Denmark -->
						<option value="+253" data-flag-url="https://flagcdn.com/24x18/dj.png">+253 (DJ)</option> <!-- Djibouti -->
						<option value="+1-767" data-flag-url="https://flagcdn.com/24x18/dm.png">+1-767 (DM)</option> <!-- Dominica -->
						<option value="+1-809" data-flag-url="https://flagcdn.com/24x18/do.png">+1-809 (DO)</option> <!-- Dominican Republic -->
						<option value="+593" data-flag-url="https://flagcdn.com/24x18/ec.png">+593 (EC)</option> <!-- Ecuador -->
						<option value="+20" data-flag-url="https://flagcdn.com/24x18/eg.png">+20 (EG)</option> <!-- Egypt -->
						<option value="+503" data-flag-url="https://flagcdn.com/24x18/sv.png">+503 (SV)</option> <!-- El Salvador -->
						<option value="+240" data-flag-url="https://flagcdn.com/24x18/gq.png">+240 (GQ)</option> <!-- Equatorial Guinea -->
						<option value="+291" data-flag-url="https://flagcdn.com/24x18/er.png">+291 (ER)</option> <!-- Eritrea -->
						<option value="+372" data-flag-url="https://flagcdn.com/24x18/ee.png">+372 (EE)</option> <!-- Estonia -->
						<option value="+268" data-flag-url="https://flagcdn.com/24x18/sz.png">+268 (SZ)</option> <!-- Eswatini -->
						<option value="+251" data-flag-url="https://flagcdn.com/24x18/et.png">+251 (ET)</option> <!-- Ethiopia -->
						<option value="+679" data-flag-url="https://flagcdn.com/24x18/fj.png">+679 (FJ)</option> <!-- Fiji -->
						<option value="+358" data-flag-url="https://flagcdn.com/24x18/fi.png">+358 (FI)</option> <!-- Finland -->
						<option value="+33" data-flag-url="https://flagcdn.com/24x18/fr.png">+33 (FR)</option> <!-- France -->
						<option value="+241" data-flag-url="https://flagcdn.com/24x18/ga.png">+241 (GA)</option> <!-- Gabon -->
						<option value="+220" data-flag-url="https://flagcdn.com/24x18/gm.png">+220 (GM)</option> <!-- Gambia -->
						<option value="+995" data-flag-url="https://flagcdn.com/24x18/ge.png">+995 (GE)</option> <!-- Georgia -->
						<option value="+49" data-flag-url="https://flagcdn.com/24x18/de.png">+49 (DE)</option> <!-- Germany -->
						<option value="+233" data-flag-url="https://flagcdn.com/24x18/gh.png">+233 (GH)</option> <!-- Ghana -->
						<option value="+30" data-flag-url="https://flagcdn.com/24x18/gr.png">+30 (GR)</option> <!-- Greece -->
						<option value="+1-473" data-flag-url="https://flagcdn.com/24x18/gd.png">+1-473 (GD)</option> <!-- Grenada -->
						<option value="+502" data-flag-url="https://flagcdn.com/24x18/gt.png">+502 (GT)</option> <!-- Guatemala -->
						<option value="+224" data-flag-url="https://flagcdn.com/24x18/gn.png">+224 (GN)</option> <!-- Guinea -->
						<option value="+245" data-flag-url="https://flagcdn.com/24x18/gw.png">+245 (GW)</option> <!-- Guinea-Bissau -->
						<option value="+592" data-flag-url="https://flagcdn.com/24x18/gy.png">+592 (GY)</option> <!-- Guyana -->
						<option value="+509" data-flag-url="https://flagcdn.com/24x18/ht.png">+509 (HT)</option> <!-- Haiti -->
						<option value="+504" data-flag-url="https://flagcdn.com/24x18/hn.png">+504 (HN)</option> <!-- Honduras -->
						<option value="+36" data-flag-url="https://flagcdn.com/24x18/hu.png">+36 (HU)</option> <!-- Hungary -->
						<option value="+354" data-flag-url="https://flagcdn.com/24x18/is.png">+354 (IS)</option> <!-- Iceland -->
						<option value="+91" data-flag-url="https://flagcdn.com/24x18/in.png">+91 (IN)</option> <!-- India -->
						<option value="+62" data-flag-url="https://flagcdn.com/24x18/id.png">+62 (ID)</option> <!-- Indonesia -->
						<option value="+98" data-flag-url="https://flagcdn.com/24x18/ir.png">+98 (IR)</option> <!-- Iran -->
						<option value="+964" data-flag-url="https://flagcdn.com/24x18/iq.png">+964 (IQ)</option> <!-- Iraq -->
						<option value="+353" data-flag-url="https://flagcdn.com/24x18/ie.png">+353 (IE)</option> <!-- Ireland -->
						<option value="+972" data-flag-url="https://flagcdn.com/24x18/il.png">+972 (IL)</option> <!-- Israel -->
						<option value="+39" data-flag-url="https://flagcdn.com/24x18/it.png">+39 (IT)</option> <!-- Italy -->
						<option value="+1-876" data-flag-url="https://flagcdn.com/24x18/jm.png">+1-876 (JM)</option> <!-- Jamaica -->
						<option value="+81" data-flag-url="https://flagcdn.com/24x18/jp.png">+81 (JP)</option> <!-- Japan -->
						<option value="+962" data-flag-url="https://flagcdn.com/24x18/jo.png">+962 (JO)</option> <!-- Jordan -->
						<option value="+7" data-flag-url="https://flagcdn.com/24x18/kz.png">+7 (KZ)</option> <!-- Kazakhstan -->
						<option value="+254" data-flag-url="https://flagcdn.com/24x18/ke.png">+254 (KE)</option> <!-- Kenya -->
						<option value="+686" data-flag-url="https://flagcdn.com/24x18/ki.png">+686 (KI)</option> <!-- Kiribati -->
						<option value="+383" data-flag-url="https://flagcdn.com/24x18/xk.png">+383 (XK)</option> <!-- Kosovo -->
						<option value="+965" data-flag-url="https://flagcdn.com/24x18/kw.png">+965 (KW)</option> <!-- Kuwait -->
						<option value="+996" data-flag-url="https://flagcdn.com/24x18/kg.png">+996 (KG)</option> <!-- Kyrgyzstan -->
						<option value="+856" data-flag-url="https://flagcdn.com/24x18/la.png">+856 (LA)</option> <!-- Laos -->
						<option value="+371" data-flag-url="https://flagcdn.com/24x18/lv.png">+371 (LV)</option> <!-- Latvia -->
						<option value="+961" data-flag-url="https://flagcdn.com/24x18/lb.png">+961 (LB)</option> <!-- Lebanon -->
						<option value="+266" data-flag-url="https://flagcdn.com/24x18/ls.png">+266 (LS)</option> <!-- Lesotho -->
						<option value="+231" data-flag-url="https://flagcdn.com/24x18/lr.png">+231 (LR)</option> <!-- Liberia -->
						<option value="+218" data-flag-url="https://flagcdn.com/24x18/ly.png">+218 (LY)</option> <!-- Libya -->
						<option value="+423" data-flag-url="https://flagcdn.com/24x18/li.png">+423 (LI)</option> <!-- Liechtenstein -->
						<option value="+370" data-flag-url="https://flagcdn.com/24x18/lt.png">+370 (LT)</option> <!-- Lithuania -->
						<option value="+352" data-flag-url="https://flagcdn.com/24x18/lu.png">+352 (LU)</option> <!-- Luxembourg -->
						<option value="+261" data-flag-url="https://flagcdn.com/24x18/mg.png">+261 (MG)</option> <!-- Madagascar -->
						<option value="+265" data-flag-url="https://flagcdn.com/24x18/mw.png">+265 (MW)</option> <!-- Malawi -->
						<option value="+60" data-flag-url="https://flagcdn.com/24x18/my.png">+60 (MY)</option> <!-- Malaysia -->
						<option value="+960" data-flag-url="https://flagcdn.com/24x18/mv.png">+960 (MV)</option> <!-- Maldives -->
						<option value="+223" data-flag-url="https://flagcdn.com/24x18/ml.png">+223 (ML)</option> <!-- Mali -->
						<option value="+356" data-flag-url="https://flagcdn.com/24x18/mt.png">+356 (MT)</option> <!-- Malta -->
						<option value="+692" data-flag-url="https://flagcdn.com/24x18/mh.png">+692 (MH)</option> <!-- Marshall Islands -->
						<option value="+222" data-flag-url="https://flagcdn.com/24x18/mr.png">+222 (MR)</option> <!-- Mauritania -->
						<option value="+230" data-flag-url="https://flagcdn.com/24x18/mu.png">+230 (MU)</option> <!-- Mauritius -->
						<option value="+52" data-flag-url="https://flagcdn.com/24x18/mx.png">+52 (MX)</option> <!-- Mexico -->
						<option value="+691" data-flag-url="https://flagcdn.com/24x18/fm.png">+691 (FM)</option> <!-- Micronesia -->
						<option value="+373" data-flag-url="https://flagcdn.com/24x18/md.png">+373 (MD)</option> <!-- Moldova -->
						<option value="+377" data-flag-url="https://flagcdn.com/24x18/mc.png">+377 (MC)</option> <!-- Monaco -->
						<option value="+976" data-flag-url="https://flagcdn.com/24x18/mn.png">+976 (MN)</option> <!-- Mongolia -->
						<option value="+382" data-flag-url="https://flagcdn.com/24x18/me.png">+382 (ME)</option> <!-- Montenegro -->
						<option value="+212" data-flag-url="https://flagcdn.com/24x18/ma.png">+212 (MA)</option> <!-- Morocco -->
						<option value="+258" data-flag-url="https://flagcdn.com/24x18/mz.png">+258 (MZ)</option> <!-- Mozambique -->
						<option value="+95" data-flag-url="https://flagcdn.com/24x18/mm.png">+95 (MM)</option> <!-- Myanmar -->
						<option value="+264" data-flag-url="https://flagcdn.com/24x18/na.png">+264 (NA)</option> <!-- Namibia -->
						<option value="+674" data-flag-url="https://flagcdn.com/24x18/nr.png">+674 (NR)</option> <!-- Nauru -->
						<option value="+977" data-flag-url="https://flagcdn.com/24x18/np.png">+977 (NP)</option> <!-- Nepal -->
						<option value="+31" data-flag-url="https://flagcdn.com/24x18/nl.png">+31 (NL)</option> <!-- Netherlands -->
						<option value="+64" data-flag-url="https://flagcdn.com/24x18/nz.png">+64 (NZ)</option> <!-- New Zealand -->
						<option value="+505" data-flag-url="https://flagcdn.com/24x18/ni.png">+505 (NI)</option> <!-- Nicaragua -->
						<option value="+227" data-flag-url="https://flagcdn.com/24x18/ne.png">+227 (NE)</option> <!-- Niger -->
						<option value="+234" data-flag-url="https://flagcdn.com/24x18/ng.png">+234 (NG)</option> <!-- Nigeria -->
						<option value="+850" data-flag-url="https://flagcdn.com/24x18/kp.png">+850 (KP)</option> <!-- North Korea -->
						<option value="+389" data-flag-url="https://flagcdn.com/24x18/mk.png">+389 (MK)</option> <!-- North Macedonia -->
						<option value="+47" data-flag-url="https://flagcdn.com/24x18/no.png">+47 (NO)</option> <!-- Norway -->
						<option value="+968" data-flag-url="https://flagcdn.com/24x18/om.png">+968 (OM)</option> <!-- Oman -->
						<option value="+92" data-flag-url="https://flagcdn.com/24x18/pk.png">+92 (PK)</option> <!-- Pakistan -->
						<option value="+680" data-flag-url="https://flagcdn.com/24x18/pw.png">+680 (PW)</option> <!-- Palau -->
						<option value="+970" data-flag-url="https://flagcdn.com/24x18/ps.png">+970 (PS)</option> <!-- Palestine -->
						<option value="+507" data-flag-url="https://flagcdn.com/24x18/pa.png">+507 (PA)</option> <!-- Panama -->
						<option value="+675" data-flag-url="https://flagcdn.com/24x18/pg.png">+675 (PG)</option> <!-- Papua New Guinea -->
						<option value="+595" data-flag-url="https://flagcdn.com/24x18/py.png">+595 (PY)</option> <!-- Paraguay -->
						<option value="+51" data-flag-url="https://flagcdn.com/24x18/pe.png">+51 (PE)</option> <!-- Peru -->
						<option value="+63" data-flag-url="https://flagcdn.com/24x18/ph.png">+63 (PH)</option> <!-- Philippines -->
						<option value="+48" data-flag-url="https://flagcdn.com/24x18/pl.png">+48 (PL)</option> <!-- Poland -->
						<option value="+351" data-flag-url="https://flagcdn.com/24x18/pt.png">+351 (PT)</option> <!-- Portugal -->
						<option value="+974" data-flag-url="https://flagcdn.com/24x18/qa.png">+974 (QA)</option> <!-- Qatar -->
						<option value="+40" data-flag-url="https://flagcdn.com/24x18/ro.png">+40 (RO)</option> <!-- Romania -->
						<option value="+7" data-flag-url="https://flagcdn.com/24x18/ru.png">+7 (RU)</option> <!-- Russia -->
						<option value="+250" data-flag-url="https://flagcdn.com/24x18/rw.png">+250 (RW)</option> <!-- Rwanda -->
						<option value="+1-869" data-flag-url="https://flagcdn.com/24x18/kn.png">+1-869 (KN)</option> <!-- Saint Kitts and Nevis -->
						<option value="+1-758" data-flag-url="https://flagcdn.com/24x18/lc.png">+1-758 (LC)</option> <!-- Saint Lucia -->
						<option value="+1-784" data-flag-url="https://flagcdn.com/24x18/vc.png">+1-784 (VC)</option> <!-- Saint Vincent and the Grenadines -->
						<option value="+685" data-flag-url="https://flagcdn.com/24x18/ws.png">+685 (WS)</option> <!-- Samoa -->
						<option value="+378" data-flag-url="https://flagcdn.com/24x18/sm.png">+378 (SM)</option> <!-- San Marino -->
						<option value="+239" data-flag-url="https://flagcdn.com/24x18/st.png">+239 (ST)</option> <!-- Sao Tome and Principe -->
						<option value="+966" data-flag-url="https://flagcdn.com/24x18/sa.png">+966 (SA)</option> <!-- Saudi Arabia -->
						<option value="+221" data-flag-url="https://flagcdn.com/24x18/sn.png">+221 (SN)</option> <!-- Senegal -->
						<option value="+381" data-flag-url="https://flagcdn.com/24x18/rs.png">+381 (RS)</option> <!-- Serbia -->
						<option value="+248" data-flag-url="https://flagcdn.com/24x18/sc.png">+248 (SC)</option> <!-- Seychelles -->
						<option value="+232" data-flag-url="https://flagcdn.com/24x18/sl.png">+232 (SL)</option> <!-- Sierra Leone -->
						<option value="+65" data-flag-url="https://flagcdn.com/24x18/sg.png">+65 (SG)</option> <!-- Singapore -->
						<option value="+386" data-flag-url="https://flagcdn.com/24x18/si.png">+386 (SI)</option> <!-- Slovenia -->
						<option value="+677" data-flag-url="https://flagcdn.com/24x18/sb.png">+677 (SB)</option> <!-- Solomon Islands -->
						<option value="+252" data-flag-url="https://flagcdn.com/24x18/so.png">+252 (SO)</option> <!-- Somalia -->
						<option value="+27" data-flag-url="https://flagcdn.com/24x18/za.png">+27 (ZA)</option> <!-- South Africa -->
						<option value="+82" data-flag-url="https://flagcdn.com/24x18/kr.png">+82 (KR)</option> <!-- South Korea -->
						<option value="+211" data-flag-url="https://flagcdn.com/24x18/ss.png">+211 (SS)</option> <!-- South Sudan -->
						<option value="+34" data-flag-url="https://flagcdn.com/24x18/es.png">+34 (ES)</option> <!-- Spain -->
						<option value="+94" data-flag-url="https://flagcdn.com/24x18/lk.png">+94 (LK)</option> <!-- Sri Lanka -->
						<option value="+249" data-flag-url="https://flagcdn.com/24x18/sd.png">+249 (SD)</option> <!-- Sudan -->
						<option value="+597" data-flag-url="https://flagcdn.com/24x18/sr.png">+597 (SR)</option> <!-- Suriname -->
						<option value="+46" data-flag-url="https://flagcdn.com/24x18/se.png">+46 (SE)</option> <!-- Sweden -->
						<option value="+41" data-flag-url="https://flagcdn.com/24x18/ch.png">+41 (CH)</option> <!-- Switzerland -->
						<option value="+963" data-flag-url="https://flagcdn.com/24x18/sy.png">+963 (SY)</option> <!-- Syria -->
						<option value="+886" data-flag-url="https://flagcdn.com/24x18/tw.png">+886 (TW)</option> <!-- Taiwan -->
						<option value="+992" data-flag-url="https://flagcdn.com/24x18/tj.png">+992 (TJ)</option> <!-- Tajikistan -->
						<option value="+255" data-flag-url="https://flagcdn.com/24x18/tz.png">+255 (TZ)</option> <!-- Tanzania -->
						<option value="+66" data-flag-url="https://flagcdn.com/24x18/th.png">+66 (TH)</option> <!-- Thailand -->
						<option value="+670" data-flag-url="https://flagcdn.com/24x18/tl.png">+670 (TL)</option> <!-- Timor-Leste -->
						<option value="+228" data-flag-url="https://flagcdn.com/24x18/tg.png">+228 (TG)</option> <!-- Togo -->
						<option value="+676" data-flag-url="https://flagcdn.com/24x18/to.png">+676 (TO)</option> <!-- Tonga -->
						<option value="+1-868" data-flag-url="https://flagcdn.com/24x18/tt.png">+1-868 (TT)</option> <!-- Trinidad and Tobago -->
						<option value="+216" data-flag-url="https://flagcdn.com/24x18/tn.png">+216 (TN)</option> <!-- Tunisia -->
						<option value="+90" data-flag-url="https://flagcdn.com/24x18/tr.png">+90 (TR)</option> <!-- Turkey -->
						<option value="+993" data-flag-url="https://flagcdn.com/24x18/tm.png">+993 (TM)</option> <!-- Turkmenistan -->
						<option value="+688" data-flag-url="https://flagcdn.com/24x18/tv.png">+688 (TV)</option> <!-- Tuvalu -->
						<option value="+256" data-flag-url="https://flagcdn.com/24x18/ug.png">+256 (UG)</option> <!-- Uganda -->
						<option value="+380" data-flag-url="https://flagcdn.com/24x18/ua.png">+380 (UA)</option> <!-- Ukraine -->

						<option value="+44" data-flag-url="https://flagcdn.com/24x18/gb.png">+44 (GB)</option> <!-- United Kingdom -->
						<option value="+1" data-flag-url="https://flagcdn.com/24x18/us.png">+1 (US)</option> <!-- United States -->
						<option value="+598" data-flag-url="https://flagcdn.com/24x18/uy.png">+598 (UY)</option> <!-- Uruguay -->
						<option value="+998" data-flag-url="https://flagcdn.com/24x18/uz.png">+998 (UZ)</option> <!-- Uzbekistan -->
						<option value="+678" data-flag-url="https://flagcdn.com/24x18/vu.png">+678 (VU)</option> <!-- Vanuatu -->
						<option value="+379" data-flag-url="https://flagcdn.com/24x18/va.png">+379 (VA)</option> <!-- Vatican City -->
						<option value="+58" data-flag-url="https://flagcdn.com/24x18/ve.png">+58 (VE)</option> <!-- Venezuela -->
						<option value="+84" data-flag-url="https://flagcdn.com/24x18/vn.png">+84 (VN)</option> <!-- Vietnam -->
						<option value="+967" data-flag-url="https://flagcdn.com/24x18/ye.png">+967 (YE)</option> <!-- Yemen -->
						<option value="+260" data-flag-url="https://flagcdn.com/24x18/zm.png">+260 (ZM)</option> <!-- Zambia -->
						<option value="+263" data-flag-url="https://flagcdn.com/24x18/zw.png">+263 (ZW)</option> <!-- Zimbabwe -->
					</select>

					<input class="property-sidebar-inquiry-input" id="property-sidebar-inquiry_phone" name="phone" type="tel" placeholder="Enter Mobile Number" required>
				</div>
			</div>

			<div class="property-sidebar-inquiry-field">
				<label class="property-sidebar-inquiry-label" for="property_sidebar_inquiry_message">Message</label>
				<textarea class="property-sidebar-inquiry-textarea" id="property_sidebar_inquiry_message" name="message" placeholder="Enter message"></textarea>
			</div>

			<div class="property-sidebar-inquiry-recaptcha">
				<div class="g-recaptcha" data-sitekey="6Ld8NdAsAAAAAMgO-9tp_JHOxQFspATYeLWu-ulo"></div>
			</div>

			<div class="property-sidebar-inquiry-check">
				<input type="checkbox" id="property_sidebar_inquiry_terms" name="terms_accepted" value="1" checked required>
				<label for="property_sidebar_inquiry_terms">
					I agree to
					<a href="<?php echo home_url( '/terms-conditions/' ); ?>" target="_blank" rel="noopener noreferrer">Terms and Condition</a>.
				</label>
			</div>

			<div class="property-sidebar-inquiry-check d-none">
				<input type="checkbox" id="property_sidebar_inquiry_marketing" name="marketing_optin" value="1">
				<label for="property_sidebar_inquiry_marketing">
					I agree to receive information about offers, deals and services from this website (optional)
				</label>
			</div>

			<button class="property-sidebar-inquiry-submit" type="submit">Submit Inquiry</button>
		</form>
	</div>
	<?php
	return ob_get_clean();
}

add_action( 'admin_post_property_sidebar_inquiry_safe_submit', 'property_sidebar_inquiry_safe_submit_handler' );
add_action( 'admin_post_nopriv_property_sidebar_inquiry_safe_submit', 'property_sidebar_inquiry_safe_submit_handler' );

function property_sidebar_inquiry_safe_submit_handler() {
	if (
		! isset( $_POST['property_sidebar_inquiry_safe_nonce'] ) ||
		! wp_verify_nonce(
			sanitize_text_field( wp_unslash( $_POST['property_sidebar_inquiry_safe_nonce'] ) ),
			'property_sidebar_inquiry_safe_submit'
		)
	) {
		property_sidebar_inquiry_safe_redirect_back( 'invalid_nonce' );
	}

	$full_name       = isset( $_POST['full_name'] ) ? sanitize_text_field( wp_unslash( $_POST['full_name'] ) ) : '';
	$email           = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$country_code    = isset( $_POST['country_code'] ) ? sanitize_text_field( wp_unslash( $_POST['country_code'] ) ) : '';
	$phone           = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$message         = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	$terms_accepted  = isset( $_POST['terms_accepted'] ) ? 1 : 0;
	$marketing_optin = isset( $_POST['marketing_optin'] ) ? 1 : 0;

	$source_post_id    = isset( $_POST['source_post_id'] ) ? absint( $_POST['source_post_id'] ) : 0;
	$source_post_title = isset( $_POST['source_post_title'] ) ? sanitize_text_field( wp_unslash( $_POST['source_post_title'] ) ) : '';
	$source_post_url   = isset( $_POST['source_post_url'] ) ? esc_url_raw( wp_unslash( $_POST['source_post_url'] ) ) : home_url( '/' );

	$recaptcha_token = isset( $_POST['g-recaptcha-response'] ) ? sanitize_text_field( wp_unslash( $_POST['g-recaptcha-response'] ) ) : '';

	if ( '' === $full_name || '' === $email || '' === $country_code || '' === $phone ) {
		property_sidebar_inquiry_safe_redirect_back( 'missing_required' );
	}

	if ( ! is_email( $email ) ) {
		property_sidebar_inquiry_safe_redirect_back( 'invalid_email' );
	}

	if ( ! $terms_accepted ) {
		property_sidebar_inquiry_safe_redirect_back( 'terms_required' );
	}

	if ( ! property_sidebar_inquiry_safe_verify_recaptcha( $recaptcha_token ) ) {
		property_sidebar_inquiry_safe_redirect_back( 'captcha_failed' );
	}

	$extra_mail = get_theme_mod( 'investor_inquiries_mail', '' );

	$recipients = array_filter(
		array_unique(
			array(
				get_option( 'admin_email' ),
				$extra_mail,
				'mdsablu36@gmail.com',
			)
		)
	);

	if ( empty( $recipients ) ) {
		property_sidebar_inquiry_safe_redirect_back( 'mail_failed' );
	}

	$subject = sprintf(
		__( 'New Property Inquiry - %s', 'sbtech' ),
		$source_post_title ? $source_post_title : __( 'Property', 'sbtech' )
	);

	$body  = "New property inquiry received\n\n";
	$body .= "Name: {$full_name}\n";
	$body .= "Email: {$email}\n";
	$body .= "Mobile: {$country_code} {$phone}\n";
	$body .= "Marketing Opt-in: " . ( $marketing_optin ? 'Yes' : 'No' ) . "\n\n";

	if ( $source_post_id ) {
		$body .= "Source Post ID: {$source_post_id}\n";
	}

	if ( $source_post_title ) {
		$body .= "Source Property Title: {$source_post_title}\n";
	}

	$body .= "Source Property URL: {$source_post_url}\n\n";
	$body .= "Message:\n{$message}\n";

	$headers   = array();
	$headers[] = 'Content-Type: text/plain; charset=UTF-8';
	$headers[] = 'Reply-To: ' . $full_name . ' <' . $email . '>';

	$sent = wp_mail( $recipients, $subject, $body, $headers );

	if ( ! $sent ) {
		property_sidebar_inquiry_safe_redirect_back( 'mail_failed' );
	}

	$redirect = add_query_arg(
		array(
			'psi_safe_success' => '1',
		),
		$source_post_url ? $source_post_url : home_url( '/' )
	);

	wp_safe_redirect( $redirect );
	exit;
}

function property_sidebar_inquiry_safe_verify_recaptcha( $token ) {
	$secret_key = '6Ld8NdAsAAAAADZy5t6j_sDzMNMs77cpL5xY70UQ';

	if ( '' === $token ) {
		return false;
	}

	$response = wp_remote_post(
		'https://www.google.com/recaptcha/api/siteverify',
		array(
			'timeout' => 15,
			'body'    => array(
				'secret'   => $secret_key,
				'response' => $token,
				'remoteip' => isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '',
			),
		)
	);

	if ( is_wp_error( $response ) ) {
		return false;
	}

	$body   = wp_remote_retrieve_body( $response );
	$result = json_decode( $body, true );

	return ! empty( $result['success'] );
}

function property_sidebar_inquiry_safe_redirect_back( $error_code ) {
	$source_post_url = isset( $_POST['source_post_url'] ) ? esc_url_raw( wp_unslash( $_POST['source_post_url'] ) ) : home_url( '/' );

	$redirect = add_query_arg(
		array(
			'psi_safe_error' => sanitize_key( $error_code ),
		),
		$source_post_url ? $source_post_url : home_url( '/' )
	);

	wp_safe_redirect( $redirect );
	exit;
}

function property_sidebar_inquiry_safe_error_message( $error_code ) {
	$messages = array(
		'invalid_nonce'    => __( 'Security check failed. Please refresh and try again.', 'sbtech' ),
		'missing_required' => __( 'Please fill in all required fields.', 'sbtech' ),
		'invalid_email'    => __( 'Please enter a valid email address.', 'sbtech' ),
		'terms_required'   => __( 'You must agree to the Terms of use and Privacy Policy.', 'sbtech' ),
		'captcha_failed'   => __( 'reCAPTCHA validation failed. Please try again.', 'sbtech' ),
		'mail_failed'      => __( 'Mail could not be sent right now. Please try again.', 'sbtech' ),
	);

	return isset( $messages[ $error_code ] ) ? $messages[ $error_code ] : __( 'Something went wrong. Please try again.', 'sbtech' );
}