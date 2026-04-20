
<?php
/**
 * Complaints Form + Contact Details (Shortcode)
 * Shortcode: [complaints_form]
 * Submit -> Admin email via wp_mail
 */

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

    /* Responsive */
    @media (max-width: 768px){
      .complaints-field{flex:1 1 100%;}
      .complaints-right{order:2}
      .complaints-left{order:1}
    }
  </style>

  <?php
    $repeater_preferred_language_add_items = get_theme_mod( 'repeater_preferred_language_add');
  ?>

  <section class="complaints-section" aria-label="Complaints">
    <div class="complaints-container">

      <div class="complaints-hero">
        <h1 class="complaints-title">Making a Complaint</h1>
        <p class="complaints-lead">
          At CBA Real Estate, we value your experience and are committed to resolving concerns promptly and professionally.
          Please complete the form below with as much detail as possible so our team can assist you efficiently.
        </p>
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
                          <select name="country_code" id="country_code">
                            <option value="+93">+93 (AF)</option> <!-- Afghanistan -->
                          <option value="+355">+355 (AL)</option> <!-- Albania -->
                          <option value="+213">+213 (DZ)</option> <!-- Algeria -->
                          <option value="+376">+376 (AD)</option> <!-- Andorra -->
                          <option value="+244">+244 (AO)</option> <!-- Angola -->
                          <option value="+1-268">+1-268 (AG)</option> <!-- Antigua and Barbuda -->
                          <option value="+54">+54 (AR)</option> <!-- Argentina -->
                          <option value="+374">+374 (AM)</option> <!-- Armenia -->
                          <option value="+61">+61 (AU)</option> <!-- Australia -->
                          <option value="+43">+43 (AT)</option> <!-- Austria -->
                          <option value="+994">+994 (AZ)</option> <!-- Azerbaijan -->
                          <option value="+1-242">+1-242 (BS)</option> <!-- Bahamas -->
                          <option value="+973">+973 (BH)</option> <!-- Bahrain -->
                          <option value="+880">+880 (BD)</option> <!-- Bangladesh -->
                          <option value="+1-246">+1-246 (BB)</option> <!-- Barbados -->
                          <option value="+375">+375 (BY)</option> <!-- Belarus -->
                          <option value="+32">+32 (BE)</option> <!-- Belgium -->
                          <option value="+501">+501 (BZ)</option> <!-- Belize -->
                          <option value="+229">+229 (BJ)</option> <!-- Benin -->
                          <option value="+975">+975 (BT)</option> <!-- Bhutan -->
                          <option value="+591">+591 (BO)</option> <!-- Bolivia -->
                          <option value="+387">+387 (BA)</option> <!-- Bosnia and Herzegovina -->
                          <option value="+267">+267 (BW)</option> <!-- Botswana -->
                          <option value="+55">+55 (BR)</option> <!-- Brazil -->
                          <option value="+673">+673 (BN)</option> <!-- Brunei -->
                          <option value="+359">+359 (BG)</option> <!-- Bulgaria -->
                          <option value="+226">+226 (BF)</option> <!-- Burkina Faso -->
                          <option value="+257">+257 (BI)</option> <!-- Burundi -->
                          <option value="+238">+238 (CV)</option> <!-- Cabo Verde -->
                          <option value="+855">+855 (KH)</option> <!-- Cambodia -->
                          <option value="+237">+237 (CM)</option> <!-- Cameroon -->
                          <option value="+1">+1 (CA)</option> <!-- Canada -->
                          <option value="+236">+236 (CF)</option> <!-- Central African Republic -->
                          <option value="+235">+235 (TD)</option> <!-- Chad -->
                          <option value="+56">+56 (CL)</option> <!-- Chile -->
                          <option value="+86">+86 (CN)</option> <!-- China -->
                          <option value="+57">+57 (CO)</option> <!-- Colombia -->
                          <option value="+269">+269 (KM)</option> <!-- Comoros -->
                          <option value="+242">+242 (CG)</option> <!-- Congo (Republic) -->
                          <option value="+243">+243 (CD)</option> <!-- Congo (DR) -->
                          <option value="+506">+506 (CR)</option> <!-- Costa Rica -->
                          <option value="+385">+385 (HR)</option> <!-- Croatia -->
                          <option value="+53">+53 (CU)</option> <!-- Cuba -->
                          <option value="+357">+357 (CY)</option> <!-- Cyprus -->
                          <option value="+420">+420 (CZ)</option> <!-- Czech Republic -->
                          <option value="+45">+45 (DK)</option> <!-- Denmark -->
                          <option value="+253">+253 (DJ)</option> <!-- Djibouti -->
                          <option value="+1-767">+1-767 (DM)</option> <!-- Dominica -->
                          <option value="+1-809">+1-809 (DO)</option> <!-- Dominican Republic -->
                          <option value="+593">+593 (EC)</option> <!-- Ecuador -->
                          <option value="+20">+20 (EG)</option> <!-- Egypt -->
                          <option value="+503">+503 (SV)</option> <!-- El Salvador -->
                          <option value="+240">+240 (GQ)</option> <!-- Equatorial Guinea -->
                          <option value="+291">+291 (ER)</option> <!-- Eritrea -->
                          <option value="+372">+372 (EE)</option> <!-- Estonia -->
                          <option value="+268">+268 (SZ)</option> <!-- Eswatini -->
                          <option value="+251">+251 (ET)</option> <!-- Ethiopia -->
                          <option value="+679">+679 (FJ)</option> <!-- Fiji -->
                          <option value="+358">+358 (FI)</option> <!-- Finland -->
                          <option value="+33">+33 (FR)</option> <!-- France -->
                          <option value="+241">+241 (GA)</option> <!-- Gabon -->
                          <option value="+220">+220 (GM)</option> <!-- Gambia -->
                          <option value="+995">+995 (GE)</option> <!-- Georgia -->
                          <option value="+49">+49 (DE)</option> <!-- Germany -->
                          <option value="+233">+233 (GH)</option> <!-- Ghana -->
                          <option value="+30">+30 (GR)</option> <!-- Greece -->
                          <option value="+1-473">+1-473 (GD)</option> <!-- Grenada -->
                          <option value="+502">+502 (GT)</option> <!-- Guatemala -->
                          <option value="+224">+224 (GN)</option> <!-- Guinea -->
                          <option value="+245">+245 (GW)</option> <!-- Guinea-Bissau -->
                          <option value="+592">+592 (GY)</option> <!-- Guyana -->
                          <option value="+509">+509 (HT)</option> <!-- Haiti -->
                          <option value="+504">+504 (HN)</option> <!-- Honduras -->
                          <option value="+36">+36 (HU)</option> <!-- Hungary -->
                          <option value="+354">+354 (IS)</option> <!-- Iceland -->
                          <option value="+91">+91 (IN)</option> <!-- India -->
                          <option value="+62">+62 (ID)</option> <!-- Indonesia -->
                          <option value="+98">+98 (IR)</option> <!-- Iran -->
                          <option value="+964">+964 (IQ)</option> <!-- Iraq -->
                          <option value="+353">+353 (IE)</option> <!-- Ireland -->
                          <option value="+972">+972 (IL)</option> <!-- Israel -->
                          <option value="+39">+39 (IT)</option> <!-- Italy -->
                          <option value="+1-876">+1-876 (JM)</option> <!-- Jamaica -->
                          <option value="+81">+81 (JP)</option> <!-- Japan -->
                          <option value="+962">+962 (JO)</option> <!-- Jordan -->
                          <option value="+7">+7 (KZ)</option> <!-- Kazakhstan -->
                          <option value="+254">+254 (KE)</option> <!-- Kenya -->
                          <option value="+686">+686 (KI)</option> <!-- Kiribati -->
                          <option value="+383">+383 (XK)</option> <!-- Kosovo -->
                          <option value="+965">+965 (KW)</option> <!-- Kuwait -->
                          <option value="+996">+996 (KG)</option> <!-- Kyrgyzstan -->
                          <option value="+856">+856 (LA)</option> <!-- Laos -->
                          <option value="+371">+371 (LV)</option> <!-- Latvia -->
                          <option value="+961">+961 (LB)</option> <!-- Lebanon -->
                          <option value="+266">+266 (LS)</option> <!-- Lesotho -->
                          <option value="+231">+231 (LR)</option> <!-- Liberia -->
                          <option value="+218">+218 (LY)</option> <!-- Libya -->
                          <option value="+423">+423 (LI)</option> <!-- Liechtenstein -->
                          <option value="+370">+370 (LT)</option> <!-- Lithuania -->
                          <option value="+352">+352 (LU)</option> <!-- Luxembourg -->
                          <option value="+261">+261 (MG)</option> <!-- Madagascar -->
                          <option value="+265">+265 (MW)</option> <!-- Malawi -->
                          <option value="+60">+60 (MY)</option> <!-- Malaysia -->
                          <option value="+960">+960 (MV)</option> <!-- Maldives -->
                          <option value="+223">+223 (ML)</option> <!-- Mali -->
                          <option value="+356">+356 (MT)</option> <!-- Malta -->
                          <option value="+692">+692 (MH)</option> <!-- Marshall Islands -->
                          <option value="+222">+222 (MR)</option> <!-- Mauritania -->
                          <option value="+230">+230 (MU)</option> <!-- Mauritius -->
                          <option value="+52">+52 (MX)</option> <!-- Mexico -->
                          <option value="+691">+691 (FM)</option> <!-- Micronesia -->
                          <option value="+373">+373 (MD)</option> <!-- Moldova -->
                          <option value="+377">+377 (MC)</option> <!-- Monaco -->
                          <option value="+976">+976 (MN)</option> <!-- Mongolia -->
                          <option value="+382">+382 (ME)</option> <!-- Montenegro -->
                          <option value="+212">+212 (MA)</option> <!-- Morocco -->
                          <option value="+258">+258 (MZ)</option> <!-- Mozambique -->
                          <option value="+95">+95 (MM)</option> <!-- Myanmar -->
                          <option value="+264">+264 (NA)</option> <!-- Namibia -->
                          <option value="+674">+674 (NR)</option> <!-- Nauru -->
                          <option value="+977">+977 (NP)</option> <!-- Nepal -->
                          <option value="+31">+31 (NL)</option> <!-- Netherlands -->
                          <option value="+64">+64 (NZ)</option> <!-- New Zealand -->
                          <option value="+505">+505 (NI)</option> <!-- Nicaragua -->
                          <option value="+227">+227 (NE)</option> <!-- Niger -->
                          <option value="+234">+234 (NG)</option> <!-- Nigeria -->
                          <option value="+850">+850 (KP)</option> <!-- North Korea -->
                          <option value="+389">+389 (MK)</option> <!-- North Macedonia -->
                          <option value="+47">+47 (NO)</option> <!-- Norway -->
                          <option value="+968">+968 (OM)</option> <!-- Oman -->
                          <option value="+92">+92 (PK)</option> <!-- Pakistan -->
                          <option value="+680">+680 (PW)</option> <!-- Palau -->
                          <option value="+970">+970 (PS)</option> <!-- Palestine -->
                          <option value="+507">+507 (PA)</option> <!-- Panama -->
                          <option value="+675">+675 (PG)</option> <!-- Papua New Guinea -->
                          <option value="+595">+595 (PY)</option> <!-- Paraguay -->
                          <option value="+51">+51 (PE)</option> <!-- Peru -->
                          <option value="+63">+63 (PH)</option> <!-- Philippines -->
                          <option value="+48">+48 (PL)</option> <!-- Poland -->
                          <option value="+351">+351 (PT)</option> <!-- Portugal -->
                          <option value="+974">+974 (QA)</option> <!-- Qatar -->
                          <option value="+40">+40 (RO)</option> <!-- Romania -->
                          <option value="+7">+7 (RU)</option> <!-- Russia -->
                          <option value="+250">+250 (RW)</option> <!-- Rwanda -->
                          <option value="+1-869">+1-869 (KN)</option> <!-- Saint Kitts and Nevis -->
                          <option value="+1-758">+1-758 (LC)</option> <!-- Saint Lucia -->
                          <option value="+1-784">+1-784 (VC)</option> <!-- Saint Vincent and the Grenadines -->
                          <option value="+685">+685 (WS)</option> <!-- Samoa -->
                          <option value="+378">+378 (SM)</option> <!-- San Marino -->
                          <option value="+239">+239 (ST)</option> <!-- Sao Tome and Principe -->
                          <option value="+966">+966 (SA)</option> <!-- Saudi Arabia -->
                          <option value="+221">+221 (SN)</option> <!-- Senegal -->
                          <option value="+381">+381 (RS)</option> <!-- Serbia -->
                          <option value="+248">+248 (SC)</option> <!-- Seychelles -->
                          <option value="+232">+232 (SL)</option> <!-- Sierra Leone -->
                          <option value="+65">+65 (SG)</option> <!-- Singapore -->
                          <option value="+386">+386 (SI)</option> <!-- Slovenia -->
                          <option value="+677">+677 (SB)</option> <!-- Solomon Islands -->
                          <option value="+252">+252 (SO)</option> <!-- Somalia -->
                          <option value="+27">+27 (ZA)</option> <!-- South Africa -->
                          <option value="+82">+82 (KR)</option> <!-- South Korea -->
                          <option value="+211">+211 (SS)</option> <!-- South Sudan -->
                          <option value="+34">+34 (ES)</option> <!-- Spain -->
                          <option value="+94">+94 (LK)</option> <!-- Sri Lanka -->
                          <option value="+249">+249 (SD)</option> <!-- Sudan -->
                          <option value="+597">+597 (SR)</option> <!-- Suriname -->
                          <option value="+46">+46 (SE)</option> <!-- Sweden -->
                          <option value="+41">+41 (CH)</option> <!-- Switzerland -->
                          <option value="+963">+963 (SY)</option> <!-- Syria -->
                          <option value="+886">+886 (TW)</option> <!-- Taiwan -->
                          <option value="+992">+992 (TJ)</option> <!-- Tajikistan -->
                          <option value="+255">+255 (TZ)</option> <!-- Tanzania -->
                          <option value="+66">+66 (TH)</option> <!-- Thailand -->
                          <option value="+670">+670 (TL)</option> <!-- Timor-Leste -->
                          <option value="+228">+228 (TG)</option> <!-- Togo -->
                          <option value="+676">+676 (TO)</option> <!-- Tonga -->
                          <option value="+1-868">+1-868 (TT)</option> <!-- Trinidad and Tobago -->
                          <option value="+216">+216 (TN)</option> <!-- Tunisia -->
                          <option value="+90">+90 (TR)</option> <!-- Turkey -->
                          <option value="+993">+993 (TM)</option> <!-- Turkmenistan -->
                          <option value="+688">+688 (TV)</option> <!-- Tuvalu -->
                          <option value="+256">+256 (UG)</option> <!-- Uganda -->
                          <option value="+380">+380 (UA)</option> <!-- Ukraine -->
                          <option value="+971">+971 (AE)</option> <!-- United Arab Emirates -->
                          <option value="+44">+44 (GB)</option> <!-- United Kingdom -->
                          <option value="+1">+1 (US)</option> <!-- United States -->
                          <option value="+598">+598 (UY)</option> <!-- Uruguay -->
                          <option value="+998">+998 (UZ)</option> <!-- Uzbekistan -->
                          <option value="+678">+678 (VU)</option> <!-- Vanuatu -->
                          <option value="+379">+379 (VA)</option> <!-- Vatican City -->
                          <option value="+58">+58 (VE)</option> <!-- Venezuela -->
                          <option value="+84">+84 (VN)</option> <!-- Vietnam -->
                          <option value="+967">+967 (YE)</option> <!-- Yemen -->
                          <option value="+260">+260 (ZM)</option> <!-- Zambia -->
                          <option value="+263">+263 (ZW)</option> <!-- Zimbabwe -->
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
              <div class="g-recaptcha" data-sitekey="6Lcy44osAAAAACYEfxBwfbFgj3-UD1MBKdYpNPn7"></div>

              <button class="complaints-btn" type="submit">Submit Details</button>

              <p class="complaints-foot d-none">
                By clicking Submit, you agree to our <a href="#">Terms &amp; Conditions</a> and <a href="#">Privacy Policy</a>.
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


  if (empty($recaptcha_response)) {
        echo "Please complete the reCAPTCHA.";
    } elseif (!is_email($email)) {
        echo "Invalid email address.";
    } else {

        $secret_key = '6Lcy44osAAAAAMSL93rG8eC0aLVmnkG03AVvDgjO';

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
                // 'support@yourdomain.com',
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

