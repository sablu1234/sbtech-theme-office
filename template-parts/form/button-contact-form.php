<?php
/**
 * Direct Contact Form (Shortcode)
 * Shortcode: [button_contact_form_direct]
 * Prefix: button_contact_form-
 */

add_shortcode('button_contact_form_direct', function($atts){

  $a = shortcode_atts([
    'title'     => 'List your property with CBA Real Estate',
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
                  <option value="+971" selected>🇦🇪 +971</option>
                  <option value="+880">🇧🇩 +880</option>
                  <option value="+91">🇮🇳 +91</option>
                  <option value="+1">🇺🇸 +1</option>
                  <option value="+44">🇬🇧 +44</option>
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

            <button class="button_contact_form-submit" type="submit">Get In Touch</button>

            <p class="button_contact_form-legal">
              By clicking the submit button, you agree to our <a href="#">Privacy Policy</a> and <a href="#">Terms of Use</a>.
            </p>
          </form>
        </div>

        <div class="button_contact_form-right">
          <div class="button_contact_form-photo" style="background-image:url('<?php
            echo esc_url($a['image_url'] ? $a['image_url'] : 'https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1200&q=70');
          ?>');"></div>
        </div>

      </div>
    </div>
  </section>

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

  $source_url = isset($_POST['bcf_source_url']) ? esc_url_raw($_POST['bcf_source_url']) : home_url('/');

  if ($full_name === '' || $email === '' || $phone === '' || !is_email($email)) {
    bcf_direct_redirect('missing_required', $source_url);
  }

  $recipients = array_filter([
    get_option('admin_email'),
    // 'sales@yourdomain.com',
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
}

function bcf_direct_redirect($code, $source_url=''){
  if(!$source_url) $source_url = home_url('/');
  wp_safe_redirect(add_query_arg('bcf_status', $code, $source_url));
  exit;
}