
<?php
/**
 * Complaints Form + Contact Details (Shortcode)
 * Shortcode: [complaints_form]
 * Submit -> Admin email via wp_mail
 */


add_action('wp_enqueue_scripts', 'complaints_form_enqueue_select2_assets');
function complaints_form_enqueue_select2_assets(){
  wp_enqueue_style(
    'complaints-form-select2',
    'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
    [],
    '4.1.0-rc.0'
  );

  wp_enqueue_script(
    'complaints-form-select2',
    'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
    ['jquery'],
    '4.1.0-rc.0',
    true
  );

  wp_add_inline_script('complaints-form-select2', <<<'JS'
(function($){
  'use strict';

  function complaintsFormatCountry(option){
    if (!option.id) {
      return option.text;
    }

    var flagUrl = $(option.element).data('flag-url');
    var $item = $('<span class="complaints-select2-country"></span>');

    if (flagUrl) {
      $('<img>', {
        src: flagUrl,
        alt: '',
        loading: 'lazy'
      }).appendTo($item);
    }

    $('<span></span>').text(option.text).appendTo($item);
    return $item;
  }

  function complaintsInitCountrySelect2(context){
    var $context = context ? $(context) : $(document);

    $context.find('.complaints-country-select').each(function(){
      var $select = $(this);

      if ($select.hasClass('select2-hidden-accessible')) {
        return;
      }

      $select.select2({
        width: '100%',
        minimumResultsForSearch: 10,
        dropdownAutoWidth: false,
        dropdownParent: $select.closest('.complaints-field'),
        dropdownCssClass: 'complaints-select2-dropdown',
        templateResult: complaintsFormatCountry,
        templateSelection: complaintsFormatCountry
      });
    });
  }

  $(window).on('load', function(){
    complaintsInitCountrySelect2(document);
  });

  $(document).on('complaints:initSelect2', function(e, context){
    complaintsInitCountrySelect2(context || document);
  });
})(jQuery);
JS
  );
}

add_shortcode('complaints_form', function () {

  $action_url = esc_url(admin_url('admin-post.php'));
  $nonce      = wp_create_nonce('complaints_form_nonce');

  $success    = isset($_GET['complaints-success']) && $_GET['complaints-success'] === '1';
  $error      = isset($_GET['complaints-error']) ? sanitize_text_field($_GET['complaints-error']) : '';

  ob_start(); ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    .complaints-section{
      --clr-primary:#ef3c26;
      --clr-black:#0b0b0b;
      --clr-white:#fff;

      font-family:"Poppins",system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
      background:#f7fafc;
      color:var(--clr-black);
      padding: clamp(20px, 3vw, 50px) 16px;
    }
    .complaints-section *{box-sizing:border-box;}

    .complaints-container{max-width:1200px;margin:0 auto;}
    .complaints-hero{
      margin-bottom:18px;
    }
    .complaints-title{
      margin:0;
      font-size: clamp(26px, 3vw, 44px);
      font-weight:800;
      letter-spacing:-.02em;
    }
    .complaints-lead{
      margin:10px 0 0;
      color:rgba(0,0,0,.65);
      font-size:14.5px;
      line-height:1.8;
      max-width:860px;
    }

    .complaints-layout{
      display:flex;
      gap:18px;
      align-items:flex-start;
      flex-wrap:wrap;
      margin-top:18px;
    }

    .complaints-left{
      flex: 1 1 720px;
      min-width: 320px;
    }
    .complaints-right{
      flex: 1 1 360px;
      min-width: 280px;
    }

    .complaints-card{
      background:#fff;
      border:1px solid rgba(0,0,0,.10);
      border-radius:18px;
      box-shadow: 0 16px 44px rgba(0,0,0,.08);
      padding: clamp(16px, 2.2vw, 24px);
    }

    .complaints-alert{
      border-radius:14px;
      padding:12px 14px;
      font-size:14px;
      margin: 10px 0 16px;
    }
    .complaints-alert.success{
      background: rgba(34,197,94,.10);
      border:1px solid rgba(34,197,94,.25);
    }
    .complaints-alert.error{
      background: rgba(239,60,38,.08);
      border:1px solid rgba(239,60,38,.25);
    }

    .complaints-formGrid{
      display:flex;
      flex-wrap:wrap;
      gap:14px;
      margin-top:10px;
    }
    .complaints-field{flex:1 1 calc(50% - 14px); min-width:240px;}
    .complaints-field.w-100{flex:1 1 100%;}

    .complaints-label{
      display:block;
      font-size:12.5px;
      font-weight:700;
      margin: 0 0 6px;
      color:rgba(0,0,0,.72);
    }

    .complaints-input,
    .complaints-select,
    .complaints-textarea{
      width:100%;
      border:1px solid rgba(0,0,0,.12);
      border-radius:14px;
      padding:12px 12px;
      font-size:14px;
      outline:none;
      background:#fff;
      box-shadow: 0 10px 26px rgba(0,0,0,.05);
      transition:.18s ease;
    }
    .complaints-textarea{min-height:140px;resize:vertical;}
    .complaints-input:focus,
    .complaints-select:focus,
    .complaints-textarea:focus{
      border-color: rgba(239,60,38,.55);
      box-shadow: 0 0 0 4px rgba(239,60,38,.12);
    }

    .complaints-rowPhone{
      display:flex;
      gap:10px;
      align-items:center;
    }
    /* Style for the select dropdown */
    #country_code {
        /* width: 250px; */
        padding: 8px 10px;
        font-size: 16px;
        border: .5px solid #ccc; /* Light border */
        border-radius: 10px; /* Rounded corners */
        background-color: #fff;
        color: #333;
        appearance: none; /* Remove default dropdown arrow */
        cursor: pointer;
        transition: all 0.3s ease; /* Smooth transition on focus */
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); /* Light shadow */
    }

    /* Focus effect for the dropdown */
    #country_code:focus {
        border-color: #ef3c26; /* Highlight border on focus */
        box-shadow: 0 0 8px rgba(239, 60, 38, 0.3); /* Highlight with shadow */
        outline: none; /* Remove outline */
    }

    /* Remove default dropdown arrow in Internet Explorer */
    #country_code::-ms-expand {
        display: none;
    }

    /* Custom arrow for the select box */
    #country_code {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zZWFyY2gvMjAwMC9zZWFyY2hpbmcuIHhtbG5zOnhtZG5yOmh0dHA6Ly93d3cudzMub3JnLzE5OTg4MCIgdmlld0JveD0iMCAwIDEwMCAxMDAiPjxwYXRoIGQ9Ik0xMCAwIEwzMCAwIEwwIDEwIiBzdHJva2U9IiMwY2MyQjMiLz48L3N2Zz4=');
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 12px;
    }

    /* Adding padding to the select dropdown */
    #country_code {
        padding-right: 30px; /* Space for the custom arrow */
    }

    /* Styling the option */
    #country_code option {
        padding: 10px;
        background-color: #fff;
        color: #333;
    }

    /* Hover effect for the options */
    #country_code option:hover {
        background-color: #f0f0f0;
    }

    .complaints-card, .complaints-card a {
        text-decoration: unset;
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        #country_code {
            width: 100%;
            max-width: 300px;
        }
    }
    .complaints-flag{
      flex:0 0 64px;
      border:1px solid rgba(0,0,0,.12);
      border-radius:14px;
      /* padding:12px 10px; */
      font-weight:800;
      font-size:13px;
      background:#fff;
      text-align:center;
      box-shadow: 0 10px 26px rgba(0,0,0,.05);
    }

    .complaints-btn{
      width:100%;
      border:0;
      border-radius:14px;
      padding: 14px 16px;
      font-size:14px;
      font-weight:900;
      letter-spacing:.06em;
      cursor:pointer;
      background: var(--clr-primary);
      color:#fff;
      margin-top: 12px;
      transition:.18s ease;
    }
    .complaints-btn:hover{
      filter: brightness(0.95);
      box-shadow: 0 18px 40px rgba(239,60,38,.22);
      transform: translateY(-1px);
    }

    .complaints-foot{
      margin:12px 0 0;
      font-size:12.5px;
      color:rgba(0,0,0,.6);
      line-height:1.6;
    }
    .complaints-foot a{color:var(--clr-primary);text-decoration:none;font-weight:700;}

    /* Right card */
    .complaints-sideTitle{
      margin:0 0 8px;
      font-size:12px;
      font-weight:900;
      letter-spacing:.14em;
      text-transform:uppercase;
      color:rgba(0,0,0,.55);
    }
    .complaints-infoBlock{
      padding:14px 0;
      border-top:1px solid rgba(0,0,0,.08);
    }
    .complaints-infoBlock:first-of-type{border-top:0;padding-top:0;}
    .complaints-infoLabel{
      margin:0 0 6px;
      font-weight:900;
      color:rgba(0,0,0,.78);
      font-size:13.5px;
    }
    .complaints-infoText{
      margin:0;
      color:rgba(0,0,0,.65);
      font-size:14px;
      line-height:1.7;
    }
    .complaints-link{
      display:inline-block;
      margin-top:8px;
      color:var(--clr-primary);
      font-weight:900;
      text-decoration:none;
      font-size:13px;
    }



    /* Select2 real flag dropdown - added only for country code field */
    .complaints-field{
      position:relative;
    }
    .complaints-rowPhone{
      align-items:stretch !important;
    }
    .complaints-rowPhone .complaints-input{
      flex:1 1 auto;
      min-width:0;
      height:48px;
    }
    .complaints-rowPhone .select2-container{
      width:160px !important;
      flex:0 0 160px !important;
      min-width:160px !important;
      max-width:160px !important;
      height:48px !important;
    }
    .complaints-rowPhone .select2-container .selection,
    .complaints-rowPhone .select2-container .select2-selection{
      height:48px !important;
    }
    .complaints-section .select2-container--default .select2-selection--single{
      height:48px !important;
      min-height:48px !important;
      border:1px solid rgba(0,0,0,.12) !important;
      border-radius:14px !important;
      background:#fff !important;
      box-shadow:0 10px 26px rgba(0,0,0,.05) !important;
      padding:0 !important;
      overflow:hidden !important;
      display:block !important;
      outline:none !important;
    }
    .complaints-section .select2-container--default .select2-selection--single .select2-selection__rendered{
      height:48px !important;
      line-height:normal !important;
      padding:0 36px 0 12px !important;
      display:flex !important;
      align-items:center !important;
      color:#111 !important;
      font-size:14px !important;
      overflow:hidden !important;
    }
    .complaints-section .select2-container--default .select2-selection--single .select2-selection__arrow{
      height:48px !important;
      top:0 !important;
      right:8px !important;
    }
    .complaints-section .select2-container--default.select2-container--focus .select2-selection--single,
    .complaints-section .select2-container--default.select2-container--open .select2-selection--single{
      border-color:rgba(239,60,38,.6) !important;
      box-shadow:0 0 0 4px rgba(239,60,38,.12) !important;
    }
    .complaints-select2-country{
      display:flex;
      align-items:center;
      gap:8px;
      width:100%;
      min-width:0;
      font-size:14px;
      line-height:1 !important;
      white-space:nowrap;
      overflow:hidden;
    }
    .complaints-select2-country img{
      width:24px;
      height:18px;
      object-fit:cover;
      border-radius:3px;
      box-shadow:0 0 0 1px rgba(0,0,0,.12);
      flex:0 0 24px;
      display:block !important;
    }
    .complaints-select2-country span{
      min-width:0;
      overflow:hidden;
      text-overflow:ellipsis;
      white-space:nowrap;
    }
    .complaints-field .select2-container--open,
    .select2-container--open{
      z-index:999999 !important;
    }
    .select2-dropdown.complaints-select2-dropdown{
      z-index:999999 !important;
      border:1px solid rgba(0,0,0,.12) !important;
      border-radius:14px !important;
      overflow:hidden !important;
      overflow-x:hidden !important;
      box-shadow:0 20px 55px rgba(0,0,0,.12) !important;
      background:#fff !important;
    }
    .select2-dropdown.complaints-select2-dropdown .select2-results,
    .select2-dropdown.complaints-select2-dropdown .select2-results__options{
      overflow-x:hidden !important;
    }
    .select2-dropdown.complaints-select2-dropdown .select2-results__options{
      max-height:260px;
      overflow-y:auto !important;
    }
    .select2-dropdown.complaints-select2-dropdown .select2-results__option{
      padding:9px 12px;
    }
    .select2-dropdown.complaints-select2-dropdown .select2-results__option--highlighted[aria-selected]{
      background:var(--clr-primary, #ef3c26) !important;
      color:#fff !important;
    }
    @media (max-width:768px){
      .complaints-rowPhone .select2-container{
        width:100% !important;
        max-width:none !important;
        flex:0 0 auto !important;
      }
    }

    /* Responsive */
    @media (max-width: 768px){
      .complaints-field{flex:1 1 100%;}
      .complaints-right{order:2}
      .complaints-left{order:1}
    }
  </style>

  <?php
  $complaints_procedure_form_title = get_theme_mod( 'complaints_procedure_form_title', __('Making a Complaint', 'sbtech') );
  $complaints_procedure_form_desc = get_theme_mod( 'complaints_procedure_form_desc', __('At CBA Real Estate, we value your experience and are committed to resolving concerns promptly and professionally. Please complete the form below with as much detail as possible so our team can assist you efficiently.', 'sbtech') );
  $repeater_preferred_language_add_items = get_theme_mod( 'repeater_preferred_language_add');
  ?>

  <section class="complaints-section" aria-label="Complaints">
    <div class="complaints-container">

      <div class="complaints-hero">
        <h1 class="complaints-title"><?php echo $complaints_procedure_form_title; ?></h1>
        <p class="complaints-lead"><?php echo $complaints_procedure_form_desc; ?></p>
      </div>

      <?php if ($success): ?>
        <div class="complaints-alert success">✅ Thank you! Your complaint has been submitted successfully.</div>
      <?php elseif (!empty($error)): ?>
        <div class="complaints-alert error">⚠️ Submission failed: <?php echo esc_html($error); ?></div>
      <?php endif; ?>

      <div class="complaints-layout">

        <!-- LEFT: FORM -->
        <div class="complaints-left">
          <div class="complaints-card">
            <form method="post" action="<?php echo $action_url; ?>" novalidate>
              <input type="hidden" name="action" value="complaints_form_submit">
              <input type="hidden" name="complaints_nonce" value="<?php echo esc_attr($nonce); ?>">
              <input type="hidden" name="complaints_source_url" value="<?php echo esc_url(home_url(add_query_arg([], $_SERVER['REQUEST_URI']))); ?>">

              <div class="complaints-formGrid">
                <div class="complaints-field">
                  <label class="complaints-label">Full Name *</label>
                  <input class="complaints-input" name="full_name" type="text" placeholder="Your full name" required>
                </div>

                <div class="complaints-field">
                  <label class="complaints-label">Email Address *</label>
                  <input class="complaints-input" name="email" type="email" placeholder="Your email" required>
                </div>

                <div class="complaints-field">
                  <label class="complaints-label">Phone *</label>
                    <div class="complaints-rowPhone">
                      <style>
                      </style>
                        <div class="complaints-flag">
                          <select class="complaints-select complaints-country-select" name="country_code" id="country_code" aria-label="Country code">
                            <option value="+93" data-flag-url="https://flagcdn.com/24x18/af.png">+93 (AF)</option> <!-- Afghanistan -->
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
                          <option value="+971" data-flag-url="https://flagcdn.com/24x18/ae.png">+971 (AE)</option> <!-- United Arab Emirates -->
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
                      </div>
                    <input class="complaints-input" name="phone" type="tel" placeholder="Phone number" required>
                  </div>
                </div>

                <div class="complaints-field">
                  <label class="complaints-label">Preferred Language</label>
                  <select class="complaints-select" name="language">
                    <?php
                    if ( ! empty( $repeater_preferred_language_add_items ) ) : foreach ( $repeater_preferred_language_add_items as $item ) : 
                    ?>
                    <option value="<?php echo esc_attr($item['preferred_language']); ?>"><?php echo esc_html($item['preferred_language']); ?></option>
                    <?php 
                    endforeach;
                    endif; 
                    ?>
                  </select>
                </div>

                <div class="complaints-field w-100">
                  <label class="complaints-label">How would you like to be contacted? *</label>
                  <select class="complaints-select" name="contact_method" required>
                    <option value="">Select…</option>
                    <option value="Email">Email</option>
                    <option value="Phone">Phone</option>
                    <option value="WhatsApp">WhatsApp</option>
                  </select>
                </div>

                <div class="complaints-field w-100">
                  <label class="complaints-label">Can you tell us what happened? *</label>
                  <textarea class="complaints-textarea" name="details" placeholder="Write your message here…" required></textarea>
                </div>
              </div>

              <!-- Google reCAPTCHA -->
              <div class="g-recaptcha" data-sitekey="6Ld8NdAsAAAAAMgO-9tp_JHOxQFspATYeLWu-ulo"></div>

              <button class="complaints-btn" type="submit">Submit Details</button>

              <p class="complaints-foot">
                By clicking Submit, you agree to our <a href="<?php echo home_url('/terms-conditions'); ?>">Terms &amp; Conditions.
              </p>
            </form>
          </div>
        </div>

        <!-- RIGHT: CONTACT DETAILS -->
         <?php
         $sbtech_address = get_theme_mod('sbtech_address',__('100 S Main St, New York, NY','sbtech'));
         $sbtech_mail = get_theme_mod('sbtech_mail',__('contact@example.com','sbtech'));
         $complaints_procedure_phone = get_theme_mod('complaints_procedure_phone',__('+971 4 428 6151','sbtech'));
         ?>
        <div class="complaints-right">
          <div class="complaints-card">
            <p class="complaints-sideTitle">Contact Details</p>

            <div class="complaints-infoBlock">
              <p class="complaints-infoLabel">Office Address</p>
              <p class="complaints-infoText"><?php echo $sbtech_address; ?></p>
              <a class="complaints-link d-none" target="_blank" rel="noopener" href="https://www.google.com/maps?q=Dubai+Marina&output=embed">
                Open in Google Maps
              </a>
            </div>

            <div class="complaints-infoBlock">
              <p class="complaints-infoLabel">Dubai Phone</p>
              <p class="complaints-infoText"><?php echo $complaints_procedure_phone; ?></p>
            </div>

            <div class="complaints-infoBlock">
              <p class="complaints-infoLabel">Email</p>
              <p class="complaints-infoText"><?php echo $sbtech_mail; ?></p>
            </div>

          </div>

          <?php
          $Contact_us_map = get_theme_mod('Contact_us_map', __('dubai', 'sbtech'));
          ?>

          <div style="max-width:1200px;margin:0 auto;padding-top:16px;">
              <div style="border:1px solid rgba(0,0,0,.12);border-radius:16px;overflow:hidden;box-shadow:0 14px 34px rgba(0,0,0,.08);">
                  <iframe
                      src="https://www.google.com/maps?q=><?php echo $sbtech_address; ?>&output=embed"
                      width="100%"
                      height="300"
                      style="border:0;display:block;"
                      loading="lazy"
                      referrerpolicy="no-referrer-when-downgrade"
                      allowfullscreen>
                  </iframe>
              </div>
          </div>


        </div>

      </div>

    </div>
  </section>
  <!-- Google reCAPTCHA Script -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <?php
  return ob_get_clean();
});


/* ---------------------------
   Submit Handler (Send to Admin)
---------------------------- */
add_action('admin_post_complaints_form_submit', 'complaints_form_submit_handler');
add_action('admin_post_nopriv_complaints_form_submit', 'complaints_form_submit_handler');

function complaints_form_submit_handler(){

  if (!isset($_POST['complaints_nonce']) || !wp_verify_nonce($_POST['complaints_nonce'], 'complaints_form_nonce')) {
    complaints_redirect_back('invalid_nonce');
  }

  $full_name      = isset($_POST['full_name']) ? sanitize_text_field($_POST['full_name']) : '';
  $email          = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
  $country_code = isset($_POST['country_code']) ? sanitize_text_field($_POST['country_code']) : '';
  $phone          = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
  $language       = isset($_POST['language']) ? sanitize_text_field($_POST['language']) : '';
  $contact_method = isset($_POST['contact_method']) ? sanitize_text_field($_POST['contact_method']) : '';
  $details        = isset($_POST['details']) ? sanitize_textarea_field($_POST['details']) : '';
  $source_url     = isset($_POST['complaints_source_url']) ? esc_url_raw($_POST['complaints_source_url']) : home_url('/');
  $recaptcha_response = isset($_POST['g-recaptcha-response']) ? sanitize_text_field($_POST['g-recaptcha-response']) : '';

  $complaints_procedure_mail = get_theme_mod('complaints_procedure_mail', __('care@cbaestate.com','sbtech'));


  if (empty($recaptcha_response)) {
        echo "Please complete the reCAPTCHA.";
    } elseif (!is_email($email)) {
        echo "Invalid email address.";
    } else {

        $secret_key = '6Ld8NdAsAAAAADZy5t6j_sDzMNMs77cpL5xY70UQ';

        $verify_response = wp_remote_post('https://www.google.com/recaptcha/api/siteverify', [
            'body' => [
                'secret'   => $secret_key, 
                'response' => $recaptcha_response,
                'remoteip' => $_SERVER['REMOTE_ADDR'],
            ]
        ]);

        if (is_wp_error($verify_response)) {
            echo "reCAPTCHA verification failed. Please try again.";
        } else {
            $response_body = wp_remote_retrieve_body($verify_response);
            $result = json_decode($response_body, true);

            if (isset($result['success']) && $result['success'] === true) {
            
              
              if ($full_name === '' || $email === '' || $phone === '' || $contact_method === '' || $details === '') {
                complaints_redirect_back('missing_required');
              }

              if (!is_email($email)) {
                complaints_redirect_back('invalid_email');
              }

              // Multiple recipients (add your extra emails here)
              $recipients = array_filter([
                get_option('admin_email'),
                'mdsablu36@gmail.com',
                // 'complaints@yourdomain.com',
              ]);

              $subject = 'New Complaint Submitted - CBA Real Estate';

              $body  = "A new complaint has been submitted:\n\n";
              $body .= "Full Name: {$full_name}\n";
              $body .= "Email: {$email}\n";
              $body .= "Phone: {$country_code} {$phone}\n";
              $body .= "Preferred Language: {$language}\n";
              $body .= "Preferred Contact Method: {$contact_method}\n\n";
              $body .= "Details:\n{$details}\n\n";
              $body .= "Source Page:\n{$source_url}\n";

              $headers = [];
              $headers[] = 'Content-Type: text/plain; charset=UTF-8';
              $headers[] = 'Reply-To: ' . $full_name . ' <' . $email . '>';

              $sent = wp_mail($recipients, $subject, $body, $headers);

              if(!$sent){
                complaints_redirect_back('mail_failed');
              }

              $redirect = add_query_arg('complaints-success', '1', $source_url);
              wp_safe_redirect($redirect);
              exit;

            } else {
                echo "reCAPTCHA validation failed. Please try again.";
            }
        }
    }
}

function complaints_redirect_back($error_code){
  $source_url = isset($_POST['complaints_source_url']) ? esc_url_raw($_POST['complaints_source_url']) : home_url('/');
  $redirect = add_query_arg('complaints-error', $error_code, $source_url);
  wp_safe_redirect($redirect);
  exit;
}

?>

