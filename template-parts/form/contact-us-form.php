<?php
/**
 * Contact Us Form (Shortcode) + Send email to Admin
 * Shortcode: [contact_us_form]
 * Action: admin-post.php (works for logged-in + guests)
 */

/* ---------------------------
   1) Shortcode: Form UI + CSS
---------------------------- */
add_shortcode('contact_us_form', function () {

  $action_url = esc_url(admin_url('admin-post.php'));
  $nonce      = wp_create_nonce('contact_us_form_nonce');
  $success    = isset($_GET['contact-us-success']) && $_GET['contact-us-success'] === '1';
  $error      = isset($_GET['contact-us-error']) ? sanitize_text_field($_GET['contact-us-error']) : '';

  ob_start(); ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    .contact-us-section{
      --clr-primary:#ef3c26;
      --clr-black:#0b0b0b;
      --clr-white:#ffffff;

      font-family:"Poppins",system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
      background: var(--clr-white);
      color: var(--clr-black);
      padding: clamp(18px, 3vw, 44px) 16px;
    }
    .contact-us-section *{box-sizing:border-box;}
    .contact-us-container{max-width:1200px;margin:54px auto;}
    .contact-us-card{
      border:1px solid rgba(0,0,0,.10);
      border-radius:18px;
      padding: clamp(16px, 2.4vw, 26px);
      box-shadow: 0 16px 44px rgba(0,0,0,.08);
      background:#fff;
    }
    .contact-us-head{
      display:flex;align-items:flex-start;justify-content:space-between;gap:12px;flex-wrap:wrap;
      margin-bottom: 14px;
    }
    .contact-us-title{
      margin:0;
      font-weight:800;
      font-size: clamp(18px, 2vw, 24px);
      letter-spacing:-.02em;
    }
    .contact-us-subtitle{
      margin:6px 0 0;
      color:rgba(0,0,0,.65);
      font-size:14px;
      line-height:1.7;
      max-width:720px;
    }

    .contact-us-alert{
      border-radius:14px;
      padding:12px 14px;
      font-size:14px;
      margin: 10px 0 16px;
    }
    .contact-us-alert.success{
      background: rgba(34,197,94,.10);
      border:1px solid rgba(34,197,94,.25);
      color: #0b0b0b;
    }
    .contact-us-alert.error{
      background: rgba(239,60,38,.08);
      border:1px solid rgba(239,60,38,.25);
      color: #0b0b0b;
    }

    .contact-us-grid{
      display:flex;
      flex-wrap:wrap;
      gap:14px;
      margin-top: 12px;
    }
    .contact-us-field{
      flex: 1 1 calc(33.333% - 14px);
      min-width: 220px;
    }
    .contact-us-field.w-50{flex: 1 1 calc(50% - 14px);}
    .contact-us-field.w-100{flex: 1 1 100%;}
    .contact-us-label{
      display:block;
      font-size:12.5px;
      font-weight:700;
      margin: 0 0 6px;
      color:rgba(0,0,0,.72);
    }
    .contact-us-input, .contact-us-select, .contact-us-textarea{
      width:100%;
      border:1px solid rgba(0,0,0,.12);
      border-radius:14px;
      padding:12px 12px;
      font-size:14px;
      outline:none;
      background:#fff;
      box-shadow: 0 10px 26px rgba(0,0,0,.05);
      transition: .18s ease;
    }
    .contact-us-textarea{min-height:120px;resize:vertical;}
    .contact-us-input:focus, .contact-us-select:focus, .contact-us-textarea:focus{
      border-color: rgba(239,60,38,.55);
      box-shadow: 0 0 0 4px rgba(239,60,38,.12);
    }

    .contact-us-sectionTitle{
      margin: 16px 0 6px;
      font-size:14px;
      font-weight:800;
      color: rgba(0,0,0,.82);
    }

    .contact-us-submitWrap{
      margin-top: 16px;
    }
    .contact-us-btn{
      width:100%;
      border:0;
      border-radius:14px;
      padding: 14px 16px;
      font-size:14px;
      font-weight:900;
      letter-spacing:.08em;
      text-transform:uppercase;
      cursor:pointer;
      background: var(--clr-black);
      color:#fff;
      transition:.18s ease;
    }
    .contact-us-btn:hover{
      background: #000;
      box-shadow: 0 16px 38px rgba(0,0,0,.18);
      transform: translateY(-1px);
    }
    .contact-us-req{color: var(--clr-primary); font-weight:800;}
    .contact-us-small{
      margin:10px 0 0;
      font-size:12.5px;
      color:rgba(0,0,0,.6);
      line-height:1.6;
    }

    /* Mobile */
    @media (max-width: 720px){
      .contact-us-field{flex: 1 1 100%;}
      .contact-us-field.w-50{flex: 1 1 100%;}
    }
  </style>

  <section class="contact-us-section">
    <div class="contact-us-container">
      <div class="contact-us-card">

        <div class="contact-us-head">
          <div>
            <h3 class="contact-us-title">Contact Us</h3>
            <p class="contact-us-subtitle">
              Share your details and property requirements. Our team will respond quickly with the right next steps.
            </p>
          </div>
        </div>

        <?php if ($success): ?>
          <div class="contact-us-alert success">✅ Thank you! Your message has been sent successfully.</div>
        <?php elseif (!empty($error)): ?>
          <div class="contact-us-alert error">⚠️ Something went wrong: <?php echo esc_html($error); ?></div>
        <?php endif; ?>

        <form method="post" action="<?php echo $action_url; ?>" class="contact-us-form" novalidate>
          <input type="hidden" name="action" value="contact_us_form_submit">
          <input type="hidden" name="contact_us_nonce" value="<?php echo esc_attr($nonce); ?>">
          <input type="hidden" name="contact_us_source_url" value="<?php echo esc_url(home_url(add_query_arg([], $_SERVER['REQUEST_URI']))); ?>">

          <div class="contact-us-sectionTitle">Personal Information</div>

          <div class="contact-us-grid">
            <div class="contact-us-field">
              <label class="contact-us-label" for="contact-us-title">Title <span class="contact-us-req">*</span></label>
              <select class="contact-us-select" id="contact-us-title" name="title" required>
                <option value="">Select</option>
                <option>Mr</option>
                <option>Mrs</option>
                <option>Ms</option>
                <option>Dr</option>
              </select>
            </div>

            <div class="contact-us-field">
              <label class="contact-us-label" for="contact-us-first">First name <span class="contact-us-req">*</span></label>
              <input class="contact-us-input" id="contact-us-first" name="first_name" type="text" placeholder="First name" required>
            </div>

            <div class="contact-us-field">
              <label class="contact-us-label" for="contact-us-last">Last name <span class="contact-us-req">*</span></label>
              <input class="contact-us-input" id="contact-us-last" name="last_name" type="text" placeholder="Last name" required>
            </div>

            <div class="contact-us-field w-50">
              <label class="contact-us-label" for="contact-us-email">Email address <span class="contact-us-req">*</span></label>
              <input class="contact-us-input" id="contact-us-email" name="email" type="email" placeholder="Email address" required>
            </div>

            <div class="contact-us-field w-50">
              <label class="contact-us-label" for="contact-us-phone">Phone number <span class="contact-us-req">*</span></label>
              <input class="contact-us-input" id="contact-us-phone" name="phone" type="tel" placeholder="Phone number" required>
            </div>
          </div>

          <div class="contact-us-sectionTitle">Property Information</div>

          <div class="contact-us-grid">
            <div class="contact-us-field">
              <label class="contact-us-label" for="contact-us-type">Type</label>
              <select class="contact-us-select" id="contact-us-type" name="property_type">
                <option value="">Select</option>
                <option value="Apartment">Apartment</option>
                <option value="Villa">Villa</option>
                <option value="Townhouse">Townhouse</option>
                <option value="Penthouse">Penthouse</option>
                <option value="Commercial">Commercial</option>
              </select>
            </div>

            <div class="contact-us-field">
              <label class="contact-us-label" for="contact-us-zip">Zip code</label>
              <input class="contact-us-input" id="contact-us-zip" name="zip" type="text" placeholder="Zip code">
            </div>

            <div class="contact-us-field">
              <label class="contact-us-label" for="contact-us-city">City</label>
              <select class="contact-us-select" id="contact-us-city" name="city">
                <option value="">Select</option>
                <option value="Dubai">Dubai</option>
                <option value="Abu Dhabi">Abu Dhabi</option>
                <option value="Sharjah">Sharjah</option>
                <option value="Ajman">Ajman</option>
              </select>
            </div>

            <div class="contact-us-field">
              <label class="contact-us-label" for="contact-us-bed">N. of bedrooms</label>
              <select class="contact-us-select" id="contact-us-bed" name="bedrooms">
                <option value="">Select</option>
                <option value="Studio">Studio</option>
                <option value="1">1</option><option value="2">2</option><option value="3">3</option>
                <option value="4">4</option><option value="5+">5+</option>
              </select>
            </div>

            <div class="contact-us-field">
              <label class="contact-us-label" for="contact-us-bath">N. of bathrooms</label>
              <select class="contact-us-select" id="contact-us-bath" name="bathrooms">
                <option value="">Select</option>
                <option value="1">1</option><option value="2">2</option><option value="3">3</option>
                <option value="4+">4+</option>
              </select>
            </div>

            <div class="contact-us-field">
              <label class="contact-us-label" for="contact-us-budget">Your budget</label>
              <input class="contact-us-input" id="contact-us-budget" name="budget" type="text" placeholder="Your budget">
            </div>

            <div class="contact-us-field w-100">
              <label class="contact-us-label" for="contact-us-message">Message</label>
              <textarea class="contact-us-textarea" id="contact-us-message" name="message" placeholder="Tell us what you’re looking for…"></textarea>
            </div>
          </div>

          <div class="contact-us-submitWrap">
            <button class="contact-us-btn" type="submit">Submit</button>
            <p class="contact-us-small">
              By submitting this form, you agree to be contacted by our team regarding your enquiry.
            </p>
          </div>
        </form>

      </div>
    </div>
  </section>

  <?php
  return ob_get_clean();
});


/* ---------------------------
   2) Handle form submit -> Send email to Admin
---------------------------- */
add_action('admin_post_contact_us_form_submit', 'contact_us_form_submit_handler');
add_action('admin_post_nopriv_contact_us_form_submit', 'contact_us_form_submit_handler');

function contact_us_form_submit_handler() {

  // Basic nonce check
  if (!isset($_POST['contact_us_nonce']) || !wp_verify_nonce($_POST['contact_us_nonce'], 'contact_us_form_nonce')) {
    contact_us_redirect_back('invalid_nonce');
  }

  // Sanitize inputs
  $title       = isset($_POST['title']) ? sanitize_text_field($_POST['title']) : '';
  $first_name  = isset($_POST['first_name']) ? sanitize_text_field($_POST['first_name']) : '';
  $last_name   = isset($_POST['last_name']) ? sanitize_text_field($_POST['last_name']) : '';
  $email       = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
  $phone       = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';

  $property_type = isset($_POST['property_type']) ? sanitize_text_field($_POST['property_type']) : '';
  $zip           = isset($_POST['zip']) ? sanitize_text_field($_POST['zip']) : '';
  $city          = isset($_POST['city']) ? sanitize_text_field($_POST['city']) : '';
  $bedrooms      = isset($_POST['bedrooms']) ? sanitize_text_field($_POST['bedrooms']) : '';
  $bathrooms     = isset($_POST['bathrooms']) ? sanitize_text_field($_POST['bathrooms']) : '';
  $budget        = isset($_POST['budget']) ? sanitize_text_field($_POST['budget']) : '';
  $message       = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

  $source_url = isset($_POST['contact_us_source_url']) ? esc_url_raw($_POST['contact_us_source_url']) : home_url('/');

  // Required validation
  if ($title === '' || $first_name === '' || $last_name === '' || $email === '' || $phone === '') {
    contact_us_redirect_back('missing_required');
  }

  if (!is_email($email)) {
    contact_us_redirect_back('invalid_email');
  }

  // Email to admin
  $admin_email = get_option('admin_email');

  $subject = 'New Contact Enquiry - CBA Real Estate';

  $body  = "New enquiry received:\n\n";
  $body .= "Name: {$title} {$first_name} {$last_name}\n";
  $body .= "Email: {$email}\n";
  $body .= "Phone: {$phone}\n\n";
  $body .= "Property Information:\n";
  $body .= "Type: {$property_type}\n";
  $body .= "Zip: {$zip}\n";
  $body .= "City: {$city}\n";
  $body .= "Bedrooms: {$bedrooms}\n";
  $body .= "Bathrooms: {$bathrooms}\n";
  $body .= "Budget: {$budget}\n\n";
  $body .= "Message:\n{$message}\n\n";
  $body .= "Source Page:\n{$source_url}\n";

  $headers = [];
  $headers[] = 'Content-Type: text/plain; charset=UTF-8';
  // Reply-to user so admin can reply directly
  $headers[] = 'Reply-To: ' . $first_name . ' ' . $last_name . ' <' . $email . '>';

  $sent = wp_mail($admin_email, $subject, $body, $headers);

  if (!$sent) {
    contact_us_redirect_back('mail_failed');
  }

  // success
  $redirect = add_query_arg('contact-us-success', '1', $source_url);
  wp_safe_redirect($redirect);
  exit;
}


/* ---------------------------
   3) Helper redirect with error
---------------------------- */
function contact_us_redirect_back($error_code) {
  $source_url = isset($_POST['contact_us_source_url']) ? esc_url_raw($_POST['contact_us_source_url']) : home_url('/');
  $redirect = add_query_arg('contact-us-error', $error_code, $source_url);
  wp_safe_redirect($redirect);
  exit;
}