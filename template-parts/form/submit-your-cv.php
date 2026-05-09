<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_enqueue_scripts', 'submit_your_cv_enqueue_assets');
function submit_your_cv_enqueue_assets() {
    wp_enqueue_style(
        'submit-your-cv-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'submit-your-cv-select2',
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
        [],
        '4.1.0-rc.0'
    );

    wp_enqueue_script(
        'submit-your-cv-select2',
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
        ['jquery'],
        '4.1.0-rc.0',
        true
    );

    wp_add_inline_script('submit-your-cv-select2', <<<'JS'
(function($) {
    'use strict';

    function submitYourCvFormatCountry(option) {
        if (!option.id) {
            return option.text;
        }

        var flagUrl = $(option.element).data('flag-url');
        var $item = $('<span class="submit-your-cv-country-item"></span>');

        if (flagUrl) {
            $('<img>', {
                src: flagUrl,
                alt: '',
                loading: 'lazy'
            }).appendTo($item);
        }

        $('<span class="submit-your-cv-country-text"></span>').text(option.text).appendTo($item);
        return $item;
    }

    function submitYourCvInit(context) {
        var $context = context ? $(context) : $(document);

        $context.find('.submit-your-cv-country-select').each(function() {
            var $select = $(this);

            if (typeof $.fn.select2 !== 'function') {
                return;
            }

            if ($select.hasClass('select2-hidden-accessible')) {
                $select.select2('destroy');
            }

            $select.select2({
                width: '100%',
                minimumResultsForSearch: 10,
                dropdownAutoWidth: false,
                dropdownParent: $(document.body),
                dropdownCssClass: 'submit-your-cv-select2-dropdown',
                templateResult: submitYourCvFormatCountry,
                templateSelection: submitYourCvFormatCountry
            });
        });

        $context.find('.submit-your-cv-file-input').each(function() {
            var input = this;
            var $input = $(this);
            var $card = $input.closest('.submit-your-cv-upload');
            var $name = $card.find('.submit-your-cv-file-name');
            var $hint = $card.find('.submit-your-cv-file-hint');

            $input.off('change.submitYourCv').on('change.submitYourCv', function() {
                if (input.files && input.files.length) {
                    $name.text(input.files[0].name);
                    $hint.text('Selected file is ready to upload.');
                    $card.addClass('has-file');
                } else {
                    $name.text('Browse and choose the file you want to upload from your computer');
                    $hint.text('PDF, DOC or DOCX up to 5MB');
                    $card.removeClass('has-file');
                }
            });
        });
    }

    $(window).on('load', function() {
        submitYourCvInit(document);
    });

    $(document).on('submitYourCv:init', function(e, context) {
        submitYourCvInit(context || document);
    });
})(jQuery);
JS
    );
}

add_shortcode('submit-your-cv', 'submit_your_cv_shortcode');
function submit_your_cv_shortcode($atts) {
    $a = shortcode_atts([
        'title'          => 'Ready to join our team?',
        'subtitle'       => '',
        'image_url'      => '',
        'contact_number' => '+971 4 428 6151',
    ], $atts, 'submit-your-cv');

    $action_url  = esc_url(admin_url('admin-post.php'));
    $nonce       = wp_create_nonce('submit_your_cv_nonce_action');
    $source_url  = esc_url(home_url(add_query_arg([], $_SERVER['REQUEST_URI'])));
    $image_url   = $a['image_url'] ? $a['image_url'] : get_template_directory_uri() . '/assets/form/pop-up-listing.jpeg';
    $privacy_url = home_url('/privacy-policy');
    $terms_url   = home_url('/terms-of-use');
    $status      = isset($_GET['submit_your_cv_status']) ? sanitize_text_field(wp_unslash($_GET['submit_your_cv_status'])) : '';

    ob_start(); ?>

    <style>
        .submit-your-cv-section {
            --syc-accent: #ef3c26;
            --syc-accent-dark: #065f95;
            --syc-bg: #f5f5f5;
            --syc-text: #202020;
            --syc-muted: #7a7a7a;
            --syc-border: #d8d8d8;
            --syc-white: #ffffff;
            font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            width: 100%;
        }
        .submit-your-cv-section * { box-sizing: border-box; }
        .submit-your-cv-card {
            position: relative;
            display: flex;
            align-items: stretch;
            width: 100%;
            background: var(--syc-bg);
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,.08);
            box-shadow: 0 20px 55px rgba(0,0,0,.12);
        }
        .submit-your-cv-left {
            position: relative;
            z-index: 2;
            flex: 1 1 64%;
            padding: 34px 30px 30px;
            background: var(--syc-bg);
        }
        .submit-your-cv-right {
            position: relative;
            flex: 1 1 36%;
            min-height: 760px;
            background: var(--syc-accent-dark);
            overflow: hidden;
        }
        .submit-your-cv-right::before {
            content: '';
            position: absolute;
            inset: -40px auto -40px -84px;
            width: 160px;
            background: var(--syc-bg);
            transform: skewX(-8deg);
            z-index: 2;
        }
        .submit-your-cv-right::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(255,255,255,.04) 0%, rgba(0,0,0,.06) 100%);
            pointer-events: none;
            z-index: 1;
        }
        .submit-your-cv-contact {
            position: absolute;
            top: 34px;
            right: 22px;
            z-index: 3;
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: .01em;
        }
        .submit-your-cv-figure {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            background-image: url('<?php echo esc_url($image_url); ?>');
            background-repeat: no-repeat;
            background-position: right bottom;
            background-size: cover;
            z-index: 2;
        }
        .submit-your-cv-head h2 {
            margin: 0;
            color: var(--syc-text);
            font-size: clamp(30px, 3vw, 48px);
            line-height: 1.12;
            font-weight: 800;
            letter-spacing: -.03em;
        }
        .submit-your-cv-head p {
            margin: 8px 0 0;
            color: var(--syc-muted);
            font-size: 14px;
            line-height: 1.7;
            max-width: 520px;
        }
        .submit-your-cv-notice {
            margin-top: 16px;
            padding: 12px 14px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
        }
        .submit-your-cv-notice.success {
            color: #0c7c43;
            background: rgba(12,124,67,.10);
            border: 1px solid rgba(12,124,67,.16);
        }
        .submit-your-cv-notice.error {
            color: #b42318;
            background: rgba(180,35,24,.08);
            border: 1px solid rgba(180,35,24,.14);
        }
        .submit-your-cv-form {
            margin-top: 22px;
        }
        .submit-your-cv-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px 26px;
        }
        .submit-your-cv-field,
        .submit-your-cv-field-full {
            min-width: 0;
        }
        .submit-your-cv-field-full {
            grid-column: 1 / -1;
        }
        .submit-your-cv-label {
            display: block;
            margin: 0 0 8px;
            color: #344054;
            font-size: 13px;
            font-weight: 600;
        }
        .submit-your-cv-label .req {
            color: #e11d48;
        }
        .submit-your-cv-input,
        .submit-your-cv-textarea,
        .submit-your-cv-phone-control {
            width: 100%;
            min-height: 50px;
            border: 1px solid var(--syc-border);
            border-radius: 12px;
            background: #fff;
            color: #222;
            font-size: 15px;
            padding: 0 16px;
            outline: none;
            transition: .18s ease;
            box-shadow: inset 0 1px 0 rgba(255,255,255,.6);
        }
        .submit-your-cv-input::placeholder,
        .submit-your-cv-textarea::placeholder {
            color: #a0a0a0;
        }
        .submit-your-cv-input:focus,
        .submit-your-cv-textarea:focus,
        .submit-your-cv-phone-control:focus-within {
            border-color: rgba(239,60,38,.7);
            box-shadow: 0 0 0 4px rgba(239,60,38,.12);
        }
        .submit-your-cv-phone-control {
            display: flex;
            align-items: center;
            padding: 0;
            overflow: hidden;
        }
        .submit-your-cv-country-wrap {
            position: relative;
            flex: 0 0 128px;
            min-width: 128px;
            border-right: 1px solid var(--syc-border);
        }
        .submit-your-cv-phone-input {
            flex: 1 1 auto;
            min-width: 0;
            border: 0;
            box-shadow: none;
            border-radius: 0;
            height: 48px;
            background: transparent;
        }
        .submit-your-cv-phone-input:focus {
            box-shadow: none;
        }
        .submit-your-cv-section .select2-container {
            width: 100% !important;
        }
        .submit-your-cv-section .select2-container .selection,
        .submit-your-cv-section .select2-container .select2-selection--single {
            height: 48px !important;
        }
        .submit-your-cv-section .select2-container--default .select2-selection--single {
            background: transparent;
            border: 0;
            border-radius: 0;
            box-shadow: none;
        }
        .submit-your-cv-section .select2-container--default .select2-selection--single .select2-selection__rendered {
            height: 48px;
            padding-left: 12px;
            padding-right: 28px;
            display: flex;
            align-items: center;
            color: #202020;
            line-height: 48px;
        }
        .submit-your-cv-section .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 48px;
            right: 8px;
        }
        .submit-your-cv-country-item {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
            font-size: 14px;
        }
        .submit-your-cv-country-item img {
            width: 22px;
            height: 16px;
            object-fit: cover;
            border-radius: 2px;
            box-shadow: 0 0 0 1px rgba(0,0,0,.12);
            flex: 0 0 auto;
        }
        .submit-your-cv-select2-dropdown {
            border: 1px solid var(--syc-border) !important;
            border-radius: 12px !important;
            overflow: hidden;
            box-shadow: 0 16px 40px rgba(0,0,0,.12);
        }
        .submit-your-cv-select2-dropdown .select2-results__option {
            padding: 10px 12px;
        }
        .submit-your-cv-select2-dropdown .select2-results__option--highlighted[aria-selected] {
            background: var(--syc-accent) !important;
            color: #fff;
        }
        .submit-your-cv-upload {
            position: relative;
        }
        .submit-your-cv-file-input {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0,0,0,0);
            border: 0;
        }
        .submit-your-cv-upload-label {
            display: flex;
            align-items: center;
            gap: 14px;
            min-height: 100px;
            width: 100%;
            padding: 20px 22px;
            border: 2px dashed var(--syc-accent);
            border-radius: 14px;
            background: rgba(239,60,38,.03);
            cursor: pointer;
            transition: .18s ease;
        }
        .submit-your-cv-upload-label:hover {
            background: rgba(239,60,38,.06);
        }
        .submit-your-cv-upload.has-file .submit-your-cv-upload-label {
            border-color: #22c55e;
            background: rgba(34,197,94,.06);
        }
        .submit-your-cv-upload-icon {
            flex: 0 0 54px;
            width: 54px;
            height: 54px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #fff;
            color: var(--syc-accent);
            box-shadow: 0 8px 24px rgba(239,60,38,.12);
        }
        .submit-your-cv-upload-text {
            min-width: 0;
        }
        .submit-your-cv-file-name {
            display: block;
            color: #8d8d8d;
            font-size: 14px;
            line-height: 1.5;
            font-weight: 500;
        }
        .submit-your-cv-file-hint {
            display: block;
            margin-top: 4px;
            color: #a6a6a6;
            font-size: 12px;
            line-height: 1.4;
        }
        .submit-your-cv-check {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 4px;
            color: #8a8a8a;
            font-size: 13px;
            line-height: 1.9;
        }
        .submit-your-cv-check input {
            flex: 0 0 20px;
            width: 20px;
            height: 20px;
            margin-top: 2px;
            accent-color: var(--syc-accent);
        }
        .submit-your-cv-legal {
            margin-top: 8px;
            color: #7d7d7d;
            font-size: 13px;
            line-height: 1.9;
        }
        .submit-your-cv-legal a {
            color: #6f6f6f;
            text-decoration: underline;
        }
        .submit-your-cv-submit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 52px;
            margin-top: 12px;
            padding: 14px 20px;
            border: 0;
            border-radius: 10px;
            background: var(--syc-accent);
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: .01em;
            cursor: pointer;
            transition: .18s ease;
        }
        .submit-your-cv-submit:hover {
            background: #d9301d;
            transform: translateY(-1px);
            box-shadow: 0 14px 30px rgba(239,60,38,.24);
        }
        @media (max-width: 991px) {
            .submit-your-cv-section {
                max-height: 100vh;
                overflow-y: auto;
                -webkit-overflow-scrolling: touch;
            }
            .submit-your-cv-card {
                display: block;
                max-height: calc(100vh - 20px);
                overflow-y: auto;
                -webkit-overflow-scrolling: touch;
            }
            .submit-your-cv-left {
                width: 100%;
                flex: 1 1 100%;
                padding: 28px 20px 40px;
            }
            .submit-your-cv-right {
                display: none !important;
            }
            .submit-your-cv-submit {
                background: #ef3c26 !important;
                margin-bottom: 20px;
            }
            .submit-your-cv-submit:hover {
                background: #d9301d !important;
            }
        }
        @media (max-width: 640px) {
            .submit-your-cv-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }
            .submit-your-cv-right {
                min-height: 240px;
            }
            .submit-your-cv-contact {
                top: 18px;
                right: 18px;
                font-size: 13px;
            }
            .submit-your-cv-head h2 {
                font-size: 34px;
            }
            .submit-your-cv-phone-control {
                flex-direction: row;
            }
            .submit-your-cv-country-wrap {
                flex-basis: 120px;
                min-width: 120px;
            }
            .submit-your-cv-upload-label {
                min-height: 88px;
                padding: 16px;
            }
        }

        /* Select2 dropdown fix: prevent clipping inside mobile/tablet scroll containers */
        .select2-container--open,
        .select2-dropdown.submit-your-cv-select2-dropdown {
            z-index: 9999999 !important;
        }
        .select2-dropdown.submit-your-cv-select2-dropdown {
            border: 1px solid #d8d8d8 !important;
            border-radius: 12px !important;
            overflow: hidden !important;
            box-shadow: 0 16px 40px rgba(0,0,0,.16) !important;
            background: #fff !important;
        }
        .select2-dropdown.submit-your-cv-select2-dropdown .select2-results__options {
            max-height: 260px !important;
            overflow-y: auto !important;
            -webkit-overflow-scrolling: touch;
        }
        .select2-dropdown.submit-your-cv-select2-dropdown .select2-results__option {
            padding: 10px 12px !important;
        }
        .select2-dropdown.submit-your-cv-select2-dropdown .select2-results__option--highlighted[aria-selected] {
            background: #ef3c26 !important;
            color: #fff !important;
        }


        /* Remove Select2 horizontal scrollbar in desktop/mobile dropdown */
        .select2-container--open .select2-dropdown,
        .select2-container--open .select2-results,
        .select2-container--open .select2-results__options {
            overflow-x: hidden !important;
        }
        .select2-container--open .select2-results__options {
            max-width: 100% !important;
        }
        .select2-dropdown.submit-your-cv-select2-dropdown {
            overflow-x: hidden !important;
        }
        .select2-dropdown.submit-your-cv-select2-dropdown .select2-results__options {
            overflow-x: hidden !important;
            overflow-y: auto !important;
            scrollbar-width: thin;
        }
        .select2-dropdown.submit-your-cv-select2-dropdown .select2-results__option {
            max-width: 100% !important;
            overflow: hidden !important;
        }
        .select2-dropdown.submit-your-cv-select2-dropdown .submit-your-cv-country-item {
            max-width: 100%;
            overflow: hidden;
            display: flex;
        }
        .select2-dropdown.submit-your-cv-select2-dropdown .submit-your-cv-country-text {
            display: inline-block;
            max-width: 110px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>

    <?php
    
    $submit_cv_form_title = get_theme_mod( 'submit_cv_form_title', 'Ready to join our team?' );
    $submit_cv_checkbox_text = get_theme_mod( 'submit_cv_checkbox_text', 'I agree to receive information about offers, deals and services from this website (optional).' );
    ?>

    <section class="submit-your-cv-section">
        <div class="submit-your-cv-card">
            <div class="submit-your-cv-left">
                <div class="submit-your-cv-head">

                    <?php if (!empty($submit_cv_form_title)) : ?>
                    <h2><?php echo esc_html($submit_cv_form_title); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($submit_cv_form_subtitle)) : ?>
                        <p><?php echo esc_html($submit_cv_form_subtitle); ?></p>
                    <?php endif; ?>
                </div>

                <?php
                $notice_map = [
                    'success'            => ['success', 'Your CV has been submitted successfully.'],
                    'failed'             => ['error', 'Mail sending failed. Please try again.'],
                    'invalid_nonce'      => ['error', 'Security validation failed. Please refresh and try again.'],
                    'missing_required'   => ['error', 'Please fill in all required fields.'],
                    'invalid_email'      => ['error', 'Please enter a valid email address.'],
                    'missing_recaptcha'  => ['error', 'Please complete the reCAPTCHA.'],
                    'recaptcha_failed'   => ['error', 'reCAPTCHA validation failed. Please try again.'],
                    'invalid_file_type'  => ['error', 'Only PDF, DOC, and DOCX files are allowed.'],
                    'file_too_large'     => ['error', 'The uploaded file must be 5MB or less.'],
                    'upload_failed'      => ['error', 'File upload failed. Please try again.'],
                ];
                if ($status && isset($notice_map[$status])) :
                    $notice = $notice_map[$status];
                    ?>
                    <div class="submit-your-cv-notice <?php echo esc_attr($notice[0]); ?>">
                        <?php echo esc_html($notice[1]); ?>
                    </div>
                <?php endif; ?>

                <form class="submit-your-cv-form" action="<?php echo $action_url; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="submit_your_cv_submit">
                    <input type="hidden" name="submit_your_cv_nonce" value="<?php echo esc_attr($nonce); ?>">
                    <input type="hidden" name="submit_your_cv_source_url" value="<?php echo esc_url($source_url); ?>">

                    <div class="submit-your-cv-grid">
                        <div class="submit-your-cv-field">
                            <label class="submit-your-cv-label">*Full Name</label>
                            <input class="submit-your-cv-input" type="text" name="full_name" required placeholder="Your Name">
                        </div>

                        <div class="submit-your-cv-field">
                            <label class="submit-your-cv-label">*Email</label>
                            <input class="submit-your-cv-input" type="email" name="email" required placeholder="email@gmail.com">
                        </div>

                        <div class="submit-your-cv-field-full">
                            <label class="submit-your-cv-label">*Phone number</label>
                            <div class="submit-your-cv-phone-control">
                                <div class="submit-your-cv-country-wrap">
                                    <select class="submit-your-cv-country-select" name="country_code" aria-label="Country code"><option value="+93" data-flag-url="https://flagcdn.com/24x18/af.png">+93 (AF)</option> <!-- Afghanistan -->
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
                                </div>
                                <input class="submit-your-cv-input submit-your-cv-phone-input" type="tel" name="phone" required placeholder="1812-345678">
                            </div>
                        </div>

                        <div class="submit-your-cv-field-full">
                            <label class="submit-your-cv-label">*Linkedin profile link</label>
                            <input class="submit-your-cv-input" type="url" name="linkedin_url" required placeholder="https://www.linkedin.com/in/your-profile">
                        </div>

                        <div class="submit-your-cv-field-full submit-your-cv-upload">
                            <label class="submit-your-cv-label">Upload your CV</label>
                            <input class="submit-your-cv-file-input" type="file" name="cv_file" id="submit-your-cv-file" accept=".pdf,.doc,.docx" required>
                            <label class="submit-your-cv-upload-label" for="submit-your-cv-file">
                                <span class="submit-your-cv-upload-icon" aria-hidden="true">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 3H7C5.89543 3 5 3.89543 5 5V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V9M13 3L19 9M13 3V9H19M12 12V18M9 15H15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <span class="submit-your-cv-upload-text">
                                    <span class="submit-your-cv-file-name">Browse and choose the file you want to upload from your computer</span>
                                    <span class="submit-your-cv-file-hint">PDF, DOC or DOCX up to 5MB</span>
                                </span>
                            </label>
                        </div>
                    </div>

                    <label class="submit-your-cv-check">
                        <input type="checkbox" name="offers" value="1">
                        
                        <?php if (!empty($submit_cv_checkbox_text)) : ?>
                            <span><?php echo esc_html($submit_cv_checkbox_text); ?></span>
                        <?php endif; ?>

                    </label>

                    <p class="submit-your-cv-legal d-none">
                        By clicking the submit button, I accept and provide my personal information, and agree to the
                        <a href="<?php echo esc_url($privacy_url); ?>">Privacy Policy</a>, applicable data protection laws, and
                        <a href="<?php echo esc_url($terms_url); ?>">Terms of Use</a>.
                    </p>

                    <div class="g-recaptcha" data-sitekey="6Ld8NdAsAAAAAMgO-9tp_JHOxQFspATYeLWu-ulo"></div>

                    <button class="submit-your-cv-submit" type="submit">Submit Your CV</button>
                </form>
            </div>

            <div class="submit-your-cv-right">
                <div class="submit-your-cv-contact d-none"><?php echo esc_html($a['contact_number']); ?></div>
                <div class="submit-your-cv-figure"></div>
            </div>
        </div>
    </section>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <?php
    return ob_get_clean();
}

add_action('admin_post_submit_your_cv_submit', 'submit_your_cv_submit_handler');
add_action('admin_post_nopriv_submit_your_cv_submit', 'submit_your_cv_submit_handler');
function submit_your_cv_submit_handler() {
    $source_url = isset($_POST['submit_your_cv_source_url']) ? esc_url_raw(wp_unslash($_POST['submit_your_cv_source_url'])) : home_url('/');

    if (!isset($_POST['submit_your_cv_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['submit_your_cv_nonce'])), 'submit_your_cv_nonce_action')) {
        submit_your_cv_redirect('invalid_nonce', $source_url);
    }

    $full_name          = isset($_POST['full_name']) ? sanitize_text_field(wp_unslash($_POST['full_name'])) : '';
    $email              = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $country_code       = isset($_POST['country_code']) ? sanitize_text_field(wp_unslash($_POST['country_code'])) : '';
    $phone              = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';
    $linkedin_url       = isset($_POST['linkedin_url']) ? esc_url_raw(wp_unslash($_POST['linkedin_url'])) : '';
    $offers             = !empty($_POST['offers']) ? 'Yes' : 'No';
    $recaptcha_response = isset($_POST['g-recaptcha-response']) ? sanitize_text_field(wp_unslash($_POST['g-recaptcha-response'])) : '';

    if ($full_name === '' || $email === '' || $phone === '' || $linkedin_url === '') {
        submit_your_cv_redirect('missing_required', $source_url);
    }

    if (!is_email($email)) {
        submit_your_cv_redirect('invalid_email', $source_url);
    }

    if (empty($recaptcha_response)) {
        submit_your_cv_redirect('missing_recaptcha', $source_url);
    }

    $secret_key = '6Ld8NdAsAAAAADZy5t6j_sDzMNMs77cpL5xY70UQ';
    $verify_response = wp_remote_post('https://www.google.com/recaptcha/api/siteverify', [
        'body' => [
            'secret'   => $secret_key,
            'response' => $recaptcha_response,
            'remoteip' => isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'])) : '',
        ],
    ]);

    if (is_wp_error($verify_response)) {
        submit_your_cv_redirect('recaptcha_failed', $source_url);
    }

    $result = json_decode(wp_remote_retrieve_body($verify_response), true);
    if (empty($result['success'])) {
        submit_your_cv_redirect('recaptcha_failed', $source_url);
    }

    if (empty($_FILES['cv_file']['name'])) {
        submit_your_cv_redirect('missing_required', $source_url);
    }

    if (!function_exists('wp_handle_upload')) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
    }

    $uploaded_file = $_FILES['cv_file'];
    $max_file_size = 5 * 1024 * 1024;
    if (!empty($uploaded_file['size']) && (int) $uploaded_file['size'] > $max_file_size) {
        submit_your_cv_redirect('file_too_large', $source_url);
    }

    $allowed_mimes = [
        'pdf'  => 'application/pdf',
        'doc'  => 'application/msword',
        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    ];

    $file_check = wp_check_filetype_and_ext($uploaded_file['tmp_name'], $uploaded_file['name'], $allowed_mimes);
    if (empty($file_check['ext']) || empty($allowed_mimes[$file_check['ext']])) {
        submit_your_cv_redirect('invalid_file_type', $source_url);
    }

    $upload = wp_handle_upload($uploaded_file, [
        'test_form' => false,
        'mimes'     => $allowed_mimes,
    ]);

    if (isset($upload['error'])) {
        submit_your_cv_redirect('upload_failed', $source_url);
    }

    $attachment_path = isset($upload['file']) ? $upload['file'] : '';
    $property_leads_necessary_mail = get_theme_mod('property_leads_necessary_mail', __('deals@cbaestate.com', 'sbtech'));
    $recipients = array_filter([
        get_option('admin_email'),
        $property_leads_necessary_mail,
        'mdsablu36@gmail.com',
    ]);

    $subject = 'New CV Submission (Website)';
    $body  = "New CV submission received:

";
    $body .= "Full Name: {$full_name}
";
    $body .= "Email: {$email}
";
    $body .= "Phone: {$country_code} {$phone}
";
    $body .= "LinkedIn: {$linkedin_url}
";
    $body .= "Offers Opt-in: {$offers}

";
    $body .= "Source Page:
{$source_url}
";

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $full_name . ' <' . $email . '>',
    ];

    $attachments = $attachment_path ? [$attachment_path] : [];
    $sent = wp_mail($recipients, $subject, $body, $headers, $attachments);

    submit_your_cv_redirect($sent ? 'success' : 'failed', $source_url);
}

function submit_your_cv_redirect($code, $source_url = '') {
    if (!$source_url) {
        $source_url = home_url('/');
    }
    wp_safe_redirect(add_query_arg('submit_your_cv_status', $code, $source_url));
    exit;
}
