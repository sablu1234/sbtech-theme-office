
<?php

add_shortcode('button_contact_form_direct', function($atts){

  $a = shortcode_atts([
    'title'     => '',
    'subtitle'  => '',
    'image_url' => '', // optional
  ], $atts);

  $action_url = esc_url(admin_url('admin-post.php'));
  $nonce      = wp_create_nonce('bcf_direct_nonce_action');

  ob_start(); ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    .button_contact_form-section{
      --clr-primary:#ef3c26;
      --clr-black:#0b0b0b;
      --clr-white:#ffffff;

      font-family:"Poppins",system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
      width:100%;
    }
    .button_contact_form-section *{box-sizing:border-box;}

    .button_contact_form-card{
      width:100%;
      background:#fff;
      border:1px solid rgba(0,0,0,.10);
      border-radius:20px;
      overflow:hidden;
      box-shadow:0 20px 55px rgba(0,0,0,.10);
    }

    /* Flex wrapper */
    .button_contact_form-wrap{
      display:flex;
      gap:0;
      align-items:stretch;
      width:100%;
    }

    .button_contact_form-left{
      flex:1 1 56%;
      padding: clamp(18px, 2.4vw, 28px);
      background:#fff;
    }

    .button_contact_form-right{
      flex:1 1 44%;
      min-height: 520px;
      background:#f3f3f3;
      position:relative;
      overflow:hidden;
    }

    .button_contact_form-photo{
      position:absolute; inset:0;
      background-size:cover;
      background-position:center;
      filter:saturate(1.02);
    }
    .button_contact_form-photo:after{
      content:"";
      position:absolute; inset:0;
      background: radial-gradient(65% 60% at 75% 75%, rgba(239,60,38,.28), rgba(0,0,0,0) 60%);
      pointer-events:none;
    }

    .button_contact_form-head h2{
      margin:0;
      font-size: clamp(20px, 2vw, 30px);
      font-weight:900;
      letter-spacing:-.02em;
      color:var(--clr-black);
      line-height:1.15;
    }
    .button_contact_form-head p{
      margin:10px 0 0;
      font-size:14px;
      line-height:1.7;
      color:rgba(0,0,0,.62);
      max-width: 560px;
    }

    /* Form */
    .button_contact_form-form{
      margin-top:18px;
      display:flex;
      flex-direction:column;
      gap:14px;
    }

    .button_contact_form-field label{
      display:block;
      font-size:13px;
      font-weight:800;
      color:rgba(0,0,0,.78);
      margin:0 0 7px;
    }
    .button_contact_form-req{color:var(--clr-primary); margin-left:2px;}

    .button_contact_form-input,
    .button_contact_form-select,
    .button_contact_form-textarea{
      width:100%;
      border:1px solid rgba(0,0,0,.12);
      border-radius:14px;
      padding:12px 12px;
      font-size:14px;
      outline:none;
      background:#fff;
      box-shadow:0 10px 26px rgba(0,0,0,.05);
      transition:.18s ease;
    }
    .button_contact_form-textarea{min-height:110px; resize:vertical;}

    .button_contact_form-input:focus,
    .button_contact_form-select:focus,
    .button_contact_form-textarea:focus{
      border-color: rgba(239,60,38,.6);
      box-shadow: 0 0 0 4px rgba(239,60,38,.12);
    }

    .button_contact_form-phone{
      display:flex;
      gap:10px;
      align-items:center;
    }
    .button_contact_form-select{max-width:160px;}

    .button_contact_form-check{
      display:flex;
      gap:10px;
      align-items:flex-start;
      font-size:13px;
      color:rgba(0,0,0,.62);
      line-height:1.6;
    }
    .button_contact_form-check input{margin-top:3px;}

    .button_contact_form-submit{
      width:100%;
      border:0;
      border-radius:14px;
      padding: 14px 16px;
      font-weight:900;
      letter-spacing:.06em;
      cursor:pointer;
      background: var(--clr-primary);
      color:#fff;
      margin-top:4px;
      transition:.18s ease;
    }
    .button_contact_form-submit:hover{
      filter: brightness(.96);
      box-shadow: 0 20px 46px rgba(239,60,38,.24);
      transform: translateY(-1px);
    }

    .button_contact_form-legal{
      margin:12px 0 0;
      font-size:12.5px;
      color:rgba(0,0,0,.58);
      line-height:1.6;
    }
    .button_contact_form-legal a{color:var(--clr-primary); font-weight:900; text-decoration:none;}
    .button_contact_form-legal a:hover{text-decoration:underline;}

    /* Responsive */
    @media (max-width: 992px){
      .button_contact_form-wrap{flex-direction:column;}
      .button_contact_form-right{min-height: 280px;}
    }
    @media (max-width: 520px){
      .button_contact_form-phone{flex-direction:column; align-items:stretch;}
      .button_contact_form-select{max-width:none;}
      .button_contact_form-right {
        display: none;
    }
        }
  </style>

  <section class="button_contact_form-section">
    <div class="button_contact_form-card">
      <div class="button_contact_form-wrap">

        <div class="button_contact_form-left">
          <div class="button_contact_form-head">
            <h2><?php echo esc_html($a['title']); ?></h2>
            <p><?php echo esc_html($a['subtitle']); ?></p>
          </div>

          <?php if(isset($_GET['bcf_status']) && $_GET['bcf_status']==='success'): ?>
            <p style="margin:14px 0 0; font-weight:800; color: var(--clr-primary);">✅ Message sent successfully!</p>
          <?php elseif(isset($_GET['bcf_status']) && $_GET['bcf_status']==='failed'): ?>
            <p style="margin:14px 0 0; font-weight:800; color:#b00020;">❌ Mail failed. Please try again.</p>
          <?php endif; ?>

          <form class="button_contact_form-form" action="<?php echo $action_url; ?>" method="post">
            <input type="hidden" name="action" value="bcf_direct_submit">
            <input type="hidden" name="bcf_direct_nonce" value="<?php echo esc_attr($nonce); ?>">
            <input type="hidden" name="bcf_source_url" value="<?php echo esc_url(home_url(add_query_arg([], $_SERVER['REQUEST_URI']))); ?>">

            <div class="button_contact_form-field">
              <label>Full Name<span class="button_contact_form-req">*</span></label>
              <input class="button_contact_form-input" type="text" name="full_name" required placeholder="Your full name">
            </div>

            <div class="button_contact_form-field">
              <label>E-Mail<span class="button_contact_form-req">*</span></label>
              <input class="button_contact_form-input" type="email" name="email" required placeholder="name@email.com">
            </div>

            <div class="button_contact_form-field">
              <label>Phone<span class="button_contact_form-req">*</span></label>
              <div class="button_contact_form-phone">
                <select class="button_contact_form-select" name="country_code" aria-label="Country code">
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
                <input class="button_contact_form-input" type="tel" name="phone" required placeholder="1812-345678">
              </div>
            </div>

            <div class="button_contact_form-field">
              <label>Message</label>
              <textarea class="button_contact_form-textarea" name="message" rows="4" placeholder="Tell us about your property; location, size, price..."></textarea>
            </div>

            <label class="button_contact_form-check">
              <input type="checkbox" name="offers" value="1">
              <span>I agree to receive information about offers, deals and services from this website (optional).</span>
            </label>

            <!-- Google reCAPTCHA -->
            <div class="g-recaptcha" data-sitekey="6Lcy44osAAAAACYEfxBwfbFgj3-UD1MBKdYpNPn7"></div>

            <button class="button_contact_form-submit" type="submit">Get In Touch</button>

          </form>
        </div>

        <div class="button_contact_form-right">
          <div class="button_contact_form-photo" style="background-image:url('<?php
            echo esc_url($a['image_url'] ? $a['image_url'] : get_template_directory_uri() . '/assets/form/pop-up-listing.jpeg');
          ?>');"></div>
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
   Submit Handler -> wp_mail (admin)
---------------------------- */
add_action('admin_post_bcf_direct_submit', 'bcf_direct_submit_handler');
add_action('admin_post_nopriv_bcf_direct_submit', 'bcf_direct_submit_handler');

function bcf_direct_submit_handler(){

  if (!isset($_POST['bcf_direct_nonce']) || !wp_verify_nonce($_POST['bcf_direct_nonce'], 'bcf_direct_nonce_action')) {
    bcf_direct_redirect('invalid_nonce');
  }

  $full_name    = isset($_POST['full_name']) ? sanitize_text_field($_POST['full_name']) : '';
  $email        = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
  $country_code = isset($_POST['country_code']) ? sanitize_text_field($_POST['country_code']) : '';
  $phone        = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
  $message      = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';
  $offers       = !empty($_POST['offers']) ? 'Yes' : 'No';
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
          
                      $source_url = isset($_POST['bcf_source_url']) ? esc_url_raw($_POST['bcf_source_url']) : home_url('/');

            if ($full_name === '' || $email === '' || $phone === '' || !is_email($email)) {
              bcf_direct_redirect('missing_required', $source_url);
            }

            // property mail 
            $property_leads_necessary_mail = get_theme_mod('property_leads_necessary_mail',__('deals@cbaestate.com','sbtech'));
            $recipients = array_filter([
              get_option('admin_email'),
              $property_leads_necessary_mail,
              // 'info@yourdomain.com',
            ]);

            $subject = 'New Property Listing Enquiry (Website)';

            $body  = "New enquiry received:\n\n";
            $body .= "Full Name: {$full_name}\n";
            $body .= "Email: {$email}\n";
            $body .= "Phone: {$country_code} {$phone}\n";
            $body .= "Offers Opt-in: {$offers}\n\n";
            $body .= "Message:\n{$message}\n\n";
            $body .= "Source Page:\n{$source_url}\n";

            $headers = [
              'Content-Type: text/plain; charset=UTF-8',
              'Reply-To: ' . $full_name . ' <' . $email . '>',
            ];

            $sent = wp_mail($recipients, $subject, $body, $headers);

            $redirect = add_query_arg('bcf_status', ($sent ? 'success' : 'failed'), $source_url);
            wp_safe_redirect($redirect);
            exit;

          } else {
              echo "reCAPTCHA validation failed. Please try again.";
          }
      }
  }
  
}

function bcf_direct_redirect($code, $source_url=''){
  if(!$source_url) $source_url = home_url('/');
  wp_safe_redirect(add_query_arg('bcf_status', $code, $source_url));
  exit;
}