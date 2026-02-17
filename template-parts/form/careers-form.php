<?php
/* =========================
  1) CPT: Career Applications
========================= */
add_action('add_meta_boxes', function () {
    add_meta_box(
        'career_app_details',
        'Application Details',
        'career_app_details_box_cb',
        'career_application',
        'normal',
        'high'
    );
});

function career_app_details_box_cb($post) {
    $full_name  = get_post_meta($post->ID, '_career_full_name', true);
    $email      = get_post_meta($post->ID, '_career_email', true);
    $phone      = get_post_meta($post->ID, '_career_phone', true);
    $position   = get_post_meta($post->ID, '_career_position', true);
    $location   = get_post_meta($post->ID, '_career_location', true);
    $experience = get_post_meta($post->ID, '_career_experience', true);
    $message    = get_post_meta($post->ID, '_career_message', true);
    $cv_url     = get_post_meta($post->ID, '_career_cv_url', true);

    echo '<style>
    .career_admin_table{width:100%;border-collapse:collapse}
    .career_admin_table th,.career_admin_table td{padding:10px;border-bottom:1px solid #e5e7eb;text-align:left;vertical-align:top}
    .career_admin_table th{width:220px}
    .career_admin_msg{white-space:pre-wrap;line-height:1.7}
  </style>';

    echo '<table class="career_admin_table">';
    echo '<tr><th>Full Name</th><td>' . esc_html($full_name) . '</td></tr>';
    echo '<tr><th>Email</th><td><a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a></td></tr>';
    echo '<tr><th>Phone</th><td>' . esc_html($phone) . '</td></tr>';
    echo '<tr><th>Position</th><td>' . esc_html($position) . '</td></tr>';
    echo '<tr><th>Location</th><td>' . esc_html($location) . '</td></tr>';
    echo '<tr><th>Experience</th><td>' . esc_html($experience) . '</td></tr>';
    echo '<tr><th>Message</th><td class="career_admin_msg">' . esc_html($message) . '</td></tr>';

    if ($cv_url) {
        echo '<tr><th>CV File</th><td><a href="' . esc_url($cv_url) . '" target="_blank" rel="noopener">Download CV</a></td></tr>';
    } else {
        echo '<tr><th>CV File</th><td>No file</td></tr>';
    }

    echo '</table>';
}

add_action('init', function () {
    register_post_type('career_application', [
        'labels' => [
            'name' => 'Career Applications',
            'singular_name' => 'Career Application',
        ],
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-id-alt',
        'supports' => ['title'], // title will be auto-set, rest saved as meta
        'show_in_rest' => false,
    ]);
});

/* =========================
  2) Shortcode: [careers_form]
========================= */
add_shortcode('careers_form', function () {
    // enqueue font only when shortcode used
    wp_enqueue_style('careers-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap', [], null);

    $success = !empty($_GET['career_success']);
    $error   = !empty($_GET['career_error']) ? sanitize_text_field(wp_unslash($_GET['career_error'])) : '';

    ob_start(); ?>
    <style>
        :root {
            --career-primary: var(--clr-primary);
            --career-black: var(--clr-black);
            --career-white: var(--clr-white);
            --career-border: #e5e7eb;
            --career-max: 1200px;
        }

        .career_wrap {
            font-family: Poppins, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            background: var(--career-white);
            padding: 22px 0;
        }

        .career_container {
            max-width: var(--career-max);
            margin: 0 auto;
            padding: 0 16px;
        }

        .career_card {
            border: 1px solid var(--career-border);
            border-radius: 16px;
            padding: 18px;
            background: var(--career-white);
        }

        .career_head {
            margin-bottom: 14px;
        }

        .career_title {
            margin: 0 0 6px;
            font-weight: 600;
            font-size: clamp(18px, 2.2vw, 28px);
            color: var(--career-black);
        }

        .career_sub {
            margin: 0;
            color: rgba(0, 0, 0, .65);
            font-weight: 400;
            line-height: 1.7;
        }

        .career_grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            margin-top: 14px;
        }

        .career_field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .career_label {
            font-weight: 600;
            color: var(--career-black);
            font-size: 13px;
        }

        .career_input,
        .career_textarea,
        .career_select {
            border: 1px solid var(--career-border);
            border-radius: 12px;
            padding: 12px 12px;
            outline: none;
            font-weight: 500;
            color: var(--career-black);
            background: var(--career-white);
            width: 100%;
        }

        .career_input:focus,
        .career_textarea:focus,
        .career_select:focus {
            border-color: rgba(2, 178, 238, .55);
            box-shadow: 0 0 0 6px rgba(2, 178, 238, .10);
        }

        .career_textarea {
            min-height: 120px;
            resize: vertical;
        }

        .career_full {
            grid-column: 1/-1;
        }

        .career_hint {
            margin: 0;
            color: rgba(0, 0, 0, .55);
            font-size: 12px;
            line-height: 1.5;
        }

        .career_actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
            margin-top: 14px;
        }

        .career_btn {
            border: 0;
            border-radius: 999px;
            padding: 12px 16px;
            background: var(--career-primary);
            color: #fff;
            font-weight: 600;
            cursor: pointer;
        }

        .career_btn:hover {
            filter: brightness(.98);
        }

        .career_note {
            margin: 0;
            color: rgba(0, 0, 0, .65);
            font-size: 12px;
            font-weight: 500;
        }

        .career_msg {
            border: 1px solid var(--career-border);
            border-radius: 12px;
            padding: 12px;
            margin: 0 0 14px;
            font-weight: 500;
        }

        .career_msg.success {
            border-color: rgba(34, 197, 94, .35);
            background: rgba(34, 197, 94, .06);
        }

        .career_msg.error {
            border-color: rgba(239, 68, 68, .35);
            background: rgba(239, 68, 68, .06);
        }

        @media(max-width:820px) {
            .career_grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <section class="career_wrap">
        <div class="career_container">
            <div class="career_card">

                <div class="career_head">
                    <h2 class="career_title">Apply for a Position</h2>
                    <p class="career_sub">Submit your application and upload your CV. Our team will review and contact shortlisted candidates.</p>
                </div>

                <?php if ($success): ?>
                    <div class="career_msg success">Application submitted successfully.</div>
                <?php endif; ?>

                <?php if ($error): ?>
                    <div class="career_msg error"><?php echo esc_html($error); ?></div>
                <?php endif; ?>

                <form class="career_form" method="post" enctype="multipart/form-data" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <input type="hidden" name="action" value="career_submit_form">
                    <?php wp_nonce_field('career_submit_form', 'career_nonce'); ?>

                    <div class="career_grid">
                        <div class="career_field">
                            <label class="career_label">Full Name *</label>
                            <input class="career_input" type="text" name="full_name" required>
                        </div>

                        <div class="career_field">
                            <label class="career_label">Email *</label>
                            <input class="career_input" type="email" name="email" required>
                        </div>

                        <div class="career_field">
                            <label class="career_label">Phone *</label>
                            <input class="career_input" type="tel" name="phone" required>
                        </div>

                        <div class="career_field">
                            <label class="career_label">Position *</label>
                            <input class="career_input" type="text" name="position" placeholder="e.g., Sales Executive" required>
                        </div>

                        <div class="career_field">
                            <label class="career_label">Current Location</label>
                            <input class="career_input" type="text" name="location" placeholder="e.g., Dubai">
                        </div>

                        <div class="career_field">
                            <label class="career_label">Experience (Years)</label>
                            <select class="career_select" name="experience">
                                <option value="">Select</option>
                                <option>0-1</option>
                                <option>1-3</option>
                                <option>3-5</option>
                                <option>5-8</option>
                                <option>8+</option>
                            </select>
                        </div>

                        <div class="career_field career_full">
                            <label class="career_label">Message</label>
                            <textarea class="career_textarea" name="message" placeholder="Tell us about your experience and why you’re a good fit..."></textarea>
                        </div>

                        <div class="career_field career_full">
                            <label class="career_label">Upload CV (PDF/DOC/DOCX) *</label>
                            <input class="career_input" type="file" name="cv_file" accept=".pdf,.doc,.docx" required>
                            <p class="career_hint">Max size depends on your WordPress upload limit.</p>
                        </div>
                    </div>

                    <div class="career_actions">
                        <button class="career_btn" type="submit">Submit Application</button>
                        <p class="career_note">By submitting, you agree your details will be used for recruitment purposes.</p>
                    </div>
                </form>

            </div>
        </div>
    </section>
<?php
    return ob_get_clean();
});

/* =========================
  3) Handle Form Submit (Admin mail + CPT + File Upload)
========================= */
add_action('admin_post_nopriv_career_submit_form', 'career_handle_submit');
add_action('admin_post_career_submit_form', 'career_handle_submit');

function career_handle_submit() {
    if (!isset($_POST['career_nonce']) || !wp_verify_nonce($_POST['career_nonce'], 'career_submit_form')) {
        career_redirect_error('Security check failed.');
    }

    $full_name = isset($_POST['full_name']) ? sanitize_text_field(wp_unslash($_POST['full_name'])) : '';
    $email     = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $phone     = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';
    $position  = isset($_POST['position']) ? sanitize_text_field(wp_unslash($_POST['position'])) : '';
    $location  = isset($_POST['location']) ? sanitize_text_field(wp_unslash($_POST['location'])) : '';
    $experience = isset($_POST['experience']) ? sanitize_text_field(wp_unslash($_POST['experience'])) : '';
    $message   = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';

    if (!$full_name || !$email || !$phone || !$position) {
        career_redirect_error('Please fill required fields.');
    }

    // -------- File upload
    if (empty($_FILES['cv_file']['name'])) {
        career_redirect_error('Please upload your CV.');
    }

    $allowed = ['pdf', 'doc', 'docx'];
    $ext = strtolower(pathinfo($_FILES['cv_file']['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed, true)) {
        career_redirect_error('Invalid file type. Only PDF/DOC/DOCX allowed.');
    }

    require_once ABSPATH . 'wp-admin/includes/file.php';
    $upload_overrides = ['test_form' => false];
    $movefile = wp_handle_upload($_FILES['cv_file'], $upload_overrides);

    if (isset($movefile['error'])) {
        career_redirect_error('Upload failed: ' . $movefile['error']);
    }

    // Create attachment so it’s stored in Media Library
    $attachment_id = 0;
    if (!empty($movefile['file'])) {
        require_once ABSPATH . 'wp-admin/includes/image.php';
        $filetype = wp_check_filetype(basename($movefile['file']), null);

        $attachment_id = wp_insert_attachment([
            'post_mime_type' => $filetype['type'],
            'post_title'     => sanitize_file_name(basename($movefile['file'])),
            'post_content'   => '',
            'post_status'    => 'inherit',
        ], $movefile['file']);

        if ($attachment_id && !is_wp_error($attachment_id)) {
            $attach_data = wp_generate_attachment_metadata($attachment_id, $movefile['file']);
            wp_update_attachment_metadata($attachment_id, $attach_data);
        } else {
            $attachment_id = 0;
        }
    }

    $cv_url = !empty($movefile['url']) ? esc_url_raw($movefile['url']) : '';

    // -------- Save to CPT (title + meta fields)
    $title = $full_name . ' — ' . $position;

    $post_id = wp_insert_post([
        'post_type'   => 'career_application',
        'post_status' => 'publish',
        'post_title'  => $title,
    ]);

    if (!$post_id || is_wp_error($post_id)) {
        career_redirect_error('Could not save application.');
    }

    update_post_meta($post_id, '_career_full_name', $full_name);
    update_post_meta($post_id, '_career_email', $email);
    update_post_meta($post_id, '_career_phone', $phone);
    update_post_meta($post_id, '_career_position', $position);
    update_post_meta($post_id, '_career_location', $location);
    update_post_meta($post_id, '_career_experience', $experience);
    update_post_meta($post_id, '_career_message', $message);
    update_post_meta($post_id, '_career_cv_url', $cv_url);
    update_post_meta($post_id, '_career_cv_attachment_id', (int)$attachment_id);

    // -------- Email to admin
    $admin_email = get_option('admin_email');
    $subject = 'New Career Application: ' . $position . ' — ' . $full_name;

    $body =
        "New career application received:\n\n" .
        "Name: {$full_name}\n" .
        "Email: {$email}\n" .
        "Phone: {$phone}\n" .
        "Position: {$position}\n" .
        "Location: {$location}\n" .
        "Experience: {$experience}\n\n" .
        "Message:\n{$message}\n\n" .
        "CV Link: {$cv_url}\n" .
        "Admin Entry: " . admin_url('post.php?post=' . $post_id . '&action=edit') . "\n";

    $headers = ['Content-Type: text/plain; charset=UTF-8'];

    // Attach file to email (optional but requested)
    $attachments = [];
    if (!empty($movefile['file']) && file_exists($movefile['file'])) {
        $attachments[] = $movefile['file'];
    }

    wp_mail($admin_email, $subject, $body, $headers, $attachments);

    // redirect success
    wp_safe_redirect(add_query_arg('career_success', 1, wp_get_referer() ?: home_url('/careers/')));
    exit;
}

function career_redirect_error($msg) {
    wp_safe_redirect(add_query_arg('career_error', rawurlencode($msg), wp_get_referer() ?: home_url('/careers/')));
    exit;
}

/* =========================
  4) Admin list columns (optional but useful)
========================= */
add_filter('manage_career_application_posts_columns', function ($cols) {
    $cols['app_email'] = 'Email';
    $cols['app_phone'] = 'Phone';
    $cols['app_position'] = 'Position';
    return $cols;
});

add_action('manage_career_application_posts_custom_column', function ($col, $post_id) {
    if ($col === 'app_email') echo esc_html(get_post_meta($post_id, '_career_email', true));
    if ($col === 'app_phone') echo esc_html(get_post_meta($post_id, '_career_phone', true));
    if ($col === 'app_position') echo esc_html(get_post_meta($post_id, '_career_position', true));
}, 10, 2);


// newsletter start
/* =========================
   NEWSLETTER SHORTCODE
   ========================= */

add_shortcode('newsletter_form', function () {

    ob_start(); ?>

    <style>
        .newsletter_box {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 18px;
            background: linear-gradient(135deg, var(--clr-primary), var(--clr-black));
            color: var(--clr-white);
        }

        .newsletter_row {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }

        .newsletter_left {
            flex: 1 1 320px;
        }

        .newsletter_title {
            font-size: 22px;
            font-weight: 600;
            margin: 0 0 5px;
            font-style: 'Poppins';
        }

        .newsletter_desc {
            font-size: 14px;
            opacity: .9;
            margin: 0;
        }

        .newsletter_form {
            flex: 1 1 520px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .newsletter_input {
            flex: 1 1 200px;
            height: 44px;
            border-radius: 10px;
            border: 0;
            padding: 0 12px;
            font-weight: 600;
            color: #111;
        }

        .newsletter_btn {
            height: 44px;
            border-radius: 10px;
            border: 0;
            padding: 0 18px;
            font-weight: 600;
            background: var(--clr-primary);
            color: var(--clr-white);
            cursor: pointer;
        }

        .newsletter_msg {
            margin-top: 8px;
            font-size: 13px;
            font-weight: 700;
        }

        @media(max-width:680px) {
            .newsletter_form {
                width: 100%;
            }

            .newsletter_btn {
                width: 100%;
            }
        }
    </style>

    <div class="newsletter_box">
        <div class="newsletter_row">

            <div class="newsletter_left">
                <h3 class="newsletter_title">Our newsletter</h3>
                <p class="newsletter_desc">Get weekly updates, new projects and insights.</p>
            </div>

            <form class="newsletter_form" method="post">
                <input class="newsletter_input" type="text" name="newsletter_name" placeholder="Enter your Name*" required>
                <input class="newsletter_input" type="email" name="newsletter_email" placeholder="Enter your E-mail*" required>
                <button class="newsletter_btn" type="submit" name="newsletter_submit">SUBSCRIBE</button>
            </form>

        </div>

        <div class="newsletter_msg">
            <?php
            if (isset($_POST['newsletter_submit'])) {
                $name  = sanitize_text_field($_POST['newsletter_name']);
                $email = sanitize_email($_POST['newsletter_email']);

                if (is_email($email)) {

                    $subject = "Newsletter Subscription";
                    $message = "Hi $name,\n\nThank you for subscribing to our newsletter.\nYou will receive updates, new projects and market insights.\n\nRegards";
                    $headers = ['Content-Type: text/plain; charset=UTF-8'];

                    wp_mail($email, $subject, $message, $headers);

                    echo "Subscription successful. Please check your email.";
                } else {
                    echo "Invalid email address.";
                }
            }
            ?>
        </div>
    </div>

<?php
    return ob_get_clean();
});
