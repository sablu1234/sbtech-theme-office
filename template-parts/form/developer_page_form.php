<?php
/**
 * REAF Contact Form (Shortcode + Email)
 * Shortcode: [reaf_contact_form]
 */

add_shortcode('reaf_contact_form', function () {

  // Handle POST submit
  $success = '';
  $error   = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reaf_cf_submit'])) {
    if (!isset($_POST['reaf_cf_nonce']) || !wp_verify_nonce($_POST['reaf_cf_nonce'], 'reaf_cf_action')) {
      $error = 'Security check failed. Please try again.';
    } else {

      $name    = sanitize_text_field($_POST['full_name'] ?? '');
      $email   = sanitize_email($_POST['email'] ?? '');
      $phone   = sanitize_text_field($_POST['phone'] ?? '');
      $message = sanitize_textarea_field($_POST['message'] ?? '');

      if (empty($name) || empty($email) || empty($message) || !is_email($email)) {
        $error = 'Please fill in required fields correctly.';
      } else {
        $admin_email = get_option('admin_email');
        $site_name   = wp_specialchars_decode(get_bloginfo('name'), ENT_QUOTES);

        $subject = "New Inquiry - {$site_name}";
        $body    = "You received a new inquiry:\n\n";
        $body   .= "Name: {$name}\n";
        $body   .= "Email: {$email}\n";
        $body   .= "Phone: {$phone}\n\n";
        $body   .= "Message:\n{$message}\n\n";
        $body   .= "— Sent from: " . home_url() . "\n";

        // Set headers (Reply-To user email)
        $headers = [
          'Content-Type: text/plain; charset=UTF-8',
          'Reply-To: ' . $name . ' <' . $email . '>',
        ];

        $sent = wp_mail($admin_email, $subject, $body, $headers);

        if ($sent) {
          $success = 'Thank you! Your message has been sent successfully.';
        } else {
          $error = 'Sorry, email could not be sent. Please try again.';
        }
      }
    }
  }

  ob_start(); ?>

  <style>
    .reaf-wrap{max-width:1200px;margin:30px auto;padding:0 16px;}
    .reaf-card{
      background:#111;
      border-radius:14px;
      overflow:hidden;
      box-shadow:0 12px 30px rgba(0,0,0,.15);
      display:grid;
      grid-template-columns: 1fr 1.4fr;
      min-height: 420px;
    }
    .reaf-left{
      background: linear-gradient(135deg, #0c0c0c 0%, #1a1a1a 100%);
      color:#fff;
      padding:38px 34px;
    }
    .reaf-left h3{margin:0 0 6px;font-size:28px;line-height:1.2;}
    .reaf-left p{margin:0 0 22px;color:rgba(255,255,255,.8);font-size:14px;}
    .reaf-info{display:grid;gap:14px;margin-top:18px;}
    .reaf-item{
      display:flex;gap:12px;align-items:flex-start;
      padding:12px 14px;border:1px solid rgba(255,255,255,.12);
      border-radius:12px;background:rgba(255,255,255,.04);
    }
    .reaf-ico{
      width:34px;height:34px;border-radius:10px;
      background:#EF3C26;display:flex;align-items:center;justify-content:center;
      flex:0 0 auto;
    }
    .reaf-ico svg{width:18px;height:18px;fill:#fff}
    .reaf-item strong{display:block;font-size:13px;opacity:.9;margin-bottom:2px;}
    .reaf-item span{display:block;font-size:14px;color:#fff;opacity:.95;word-break:break-word;}

    .reaf-right{
      background:#fff;
      padding:38px 34px;
    }
    .reaf-right h3{margin:0 0 6px;font-size:26px;color:#111;}
    .reaf-right p{margin:0 0 22px;color:#444;font-size:14px;}

    .reaf-grid{display:grid;grid-template-columns: repeat(3, 1fr);gap:12px;}
    .reaf-field{width:100%;}
    .reaf-field input,.reaf-field textarea{
      width:100%;
      border:1px solid #e7e7e7;
      background:#fff;
      border-radius:10px;
      padding:12px 12px;
      font-size:14px;
      outline:none;
      transition:.15s ease;
    }
    .reaf-field textarea{min-height:130px;resize:vertical;}
    .reaf-field input:focus,.reaf-field textarea:focus{border-color:#EF3C26;box-shadow:0 0 0 3px rgba(239,60,38,.15);}
    .reaf-grid-2{grid-column:1 / -1;}

    .reaf-check{
      display:flex;gap:10px;align-items:flex-start;margin:14px 0 8px;
      font-size:13px;color:#333;
    }
    .reaf-check input{margin-top:3px;}

    .reaf-note{font-size:12.5px;color:#555;line-height:1.5;margin:10px 0 18px;}
    .reaf-note a{color:#EF3C26;text-decoration:none;}
    .reaf-note a:hover{text-decoration:underline;}

    .reaf-btn{
      background:#EF3C26;color:#fff;border:0;
      padding:12px 18px;border-radius:10px;
      font-weight:600;font-size:14px;
      cursor:pointer;
      transition:.15s ease;
      float:right;
      min-width:220px;
    }
    .reaf-btn:hover{filter:brightness(.95);}
    .reaf-msg{
      margin:0 0 14px;
      padding:12px 14px;border-radius:10px;font-size:14px;
    }
    .reaf-success{background:#eafff0;border:1px solid #bfe8cd;color:#0a6b2c;}
    .reaf-error{background:#fff1f1;border:1px solid #f2c5c5;color:#a01818;}

    @media (max-width: 992px){
      .reaf-card{grid-template-columns:1fr;}
      .reaf-left,.reaf-right{padding:28px 18px;}
      .reaf-grid{grid-template-columns:1fr;}
      .reaf-btn{float:none;width:100%;}
    }
  </style>

  <div class="reaf-wrap">
    <div class="reaf-card">

      <div class="reaf-left">
        <h3>Contact Us</h3>
        <p>Premium Properties — quick response & professional support.</p>

        <div class="reaf-info">
          <div class="reaf-item">
            <div class="reaf-ico">
              <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg>
            </div>
            <div>
              <strong>Email</strong>
              <span><?php echo esc_html(get_option('admin_email')); ?></span>
            </div>
          </div>

          <div class="reaf-item">
            <div class="reaf-ico">
              <svg viewBox="0 0 24 24"><path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V20a1 1 0 01-1 1C10.07 21 3 13.93 3 5a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.46.57 3.59a1 1 0 01-.25 1.01l-2.2 2.19z"/></svg>
            </div>
            <div>
              <strong>Phone</strong>
              <span>+971 4 428 6151</span>
            </div>
          </div>

          <div class="reaf-item">
            <div class="reaf-ico">
              <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1112 6a2.5 2.5 0 010 5.5z"/></svg>
            </div>
            <div>
              <strong>Address</strong>
              <span>Dubai, UAE</span>
            </div>
          </div>
        </div>
      </div>

      <div class="reaf-right">
        <h3>Get A Free Consultation</h3>
        <p>Ready for your new home? Send us a message.</p>

        <?php if ($success): ?>
          <div class="reaf-msg reaf-success"><?php echo esc_html($success); ?></div>
        <?php elseif ($error): ?>
          <div class="reaf-msg reaf-error"><?php echo esc_html($error); ?></div>
        <?php endif; ?>

        <form method="post">
          <?php wp_nonce_field('reaf_cf_action', 'reaf_cf_nonce'); ?>

          <div class="reaf-grid">
            <div class="reaf-field">
              <input type="text" name="full_name" placeholder="Full Name*" required>
            </div>
            <div class="reaf-field">
              <input type="email" name="email" placeholder="E-mail*" required>
            </div>
            <div class="reaf-field">
              <input type="tel" name="phone" placeholder="Phone (optional)">
            </div>

            <div class="reaf-field reaf-grid-2">
              <textarea name="message" placeholder="Message*" required></textarea>
            </div>
          </div>

          <label class="reaf-check">
            <input type="checkbox" name="offers_opt_in" value="1">
            <span>I agree to receive information about offers, deals and services (optional).</span>
          </label>

          <div class="reaf-note">
            By clicking submit, you agree to our <a href="#">Privacy Policy</a> and <a href="#">Terms of Use</a>.
          </div>

          <button class="reaf-btn" type="submit" name="reaf_cf_submit" value="1">Property Inquiry</button>
          <div style="clear:both"></div>
        </form>
      </div>

    </div>
  </div>

  <?php
  return ob_get_clean();
});