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
    .complaints-flag{
      flex:0 0 64px;
      border:1px solid rgba(0,0,0,.12);
      border-radius:14px;
      padding:12px 10px;
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
                    <div class="complaints-flag">+971</div>
                    <input class="complaints-input" name="phone" type="tel" placeholder="Phone number" required>
                  </div>
                </div>

                <div class="complaints-field">
                  <label class="complaints-label">Preferred Language</label>
                  <select class="complaints-select" name="language">
                    <option value="English">English</option>
                    <option value="Arabic">Arabic</option>
                    <option value="Hindi">Hindi</option>
                    <option value="Urdu">Urdu</option>
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

              <button class="complaints-btn" type="submit">Submit Details</button>

              <p class="complaints-foot">
                By clicking Submit, you agree to our <a href="#">Terms &amp; Conditions</a> and <a href="#">Privacy Policy</a>.
              </p>
            </form>
          </div>
        </div>

        <!-- RIGHT: CONTACT DETAILS -->
        <div class="complaints-right">
          <div class="complaints-card">
            <p class="complaints-sideTitle">Contact Details</p>

            <div class="complaints-infoBlock">
              <p class="complaints-infoLabel">Office Address</p>
              <p class="complaints-infoText">
                Marina Plaza, Dubai Marina,<br>Dubai, UAE
              </p>
              <a class="complaints-link" target="_blank" rel="noopener" href="https://www.google.com/maps?q=Dubai+Marina&output=embed">
                Open in Google Maps
              </a>
            </div>

            <div class="complaints-infoBlock">
              <p class="complaints-infoLabel">Dubai Phone</p>
              <p class="complaints-infoText">+971 4 428 6151</p>
            </div>

            <div class="complaints-infoBlock">
              <p class="complaints-infoLabel">Email</p>
              <p class="complaints-infoText">info@cba-realestate.com</p>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>

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
  $phone          = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
  $language       = isset($_POST['language']) ? sanitize_text_field($_POST['language']) : '';
  $contact_method = isset($_POST['contact_method']) ? sanitize_text_field($_POST['contact_method']) : '';
  $details        = isset($_POST['details']) ? sanitize_textarea_field($_POST['details']) : '';
  $source_url     = isset($_POST['complaints_source_url']) ? esc_url_raw($_POST['complaints_source_url']) : home_url('/');

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
  $body .= "Phone: +971 {$phone}\n";
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
}

function complaints_redirect_back($error_code){
  $source_url = isset($_POST['complaints_source_url']) ? esc_url_raw($_POST['complaints_source_url']) : home_url('/');
  $redirect = add_query_arg('complaints-error', $error_code, $source_url);
  wp_safe_redirect($redirect);
  exit;
}