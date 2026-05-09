<?php
/**
 * Agent Consultation Form.
 * Shortcode: [aget_form]
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Render consultation form shortcode.
 */
add_shortcode( 'aget_form', 'aget_consultation_form_shortcode' );

function aget_consultation_form_shortcode() {
    $site_key   = '6Ld8NdAsAAAAAMgO-9tp_JHOxQFspATYeLWu-ulo';
    $source_url = aget_get_current_url();

    $status = isset( $_GET['aget_status'] )
        ? sanitize_text_field( wp_unslash( $_GET['aget_status'] ) )
        : '';

    ob_start();
    ?>

    <style>
        .aget-form-wrap,
        .aget-form-wrap * {
            box-sizing: border-box;
        }

        .aget-form-wrap {
            width: 100%;
            max-width: 420px;
            min-width: 0;
            background: #ffffff;
            border: 1px solid #e9eef4;
            border-radius: 18px;
            padding: 24px;
            font-family: inherit;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
            overflow: hidden;
        }

        .aget-form-title {
            margin: 0 0 18px;
            color: #111111;
            font-size: 22px;
            line-height: 1.3;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .aget-form-field {
            width: 100%;
            margin-bottom: 14px;
        }

        .aget-form-field input,
        .aget-form-field textarea {
            display: block;
            width: 100%;
            max-width: 100%;
            min-width: 0;
            min-height: 48px;
            border: 1px solid #e5eaf0;
            border-radius: 12px;
            background: #ffffff;
            color: #111111;
            font-size: 15px;
            line-height: 1.5;
            padding: 13px 14px;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
            appearance: none;
            -webkit-appearance: none;
        }

        .aget-form-field textarea {
            min-height: 92px;
            resize: vertical;
        }

        .aget-form-field input::placeholder,
        .aget-form-field textarea::placeholder {
            color: #7d7d7d;
        }

        .aget-form-field input:focus,
        .aget-form-field textarea:focus {
            border-color: #f43b2f;
            box-shadow: 0 0 0 4px rgba(244, 59, 47, 0.10);
            background-color: #ffffff;
        }

        .aget-recaptcha {
            width: 100%;
            max-width: 100%;
            margin: 16px 0;
            overflow: hidden;
        }

        .aget-recaptcha .g-recaptcha {
            max-width: 100%;
            transform-origin: left top;
        }

        .aget-submit-btn {
            display: block;
            width: 100%;
            max-width: 100%;
            min-height: 52px;
            border: 0;
            border-radius: 12px;
            background: #f43b2f;
            color: #ffffff;
            font-size: 16px;
            font-weight: 700;
            line-height: 1;
            padding: 16px 18px;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 8px 18px rgba(244, 59, 47, 0.20);
        }

        .aget-submit-btn:hover {
            background: #e52f24;
            box-shadow: 0 10px 22px rgba(244, 59, 47, 0.26);
        }

        .aget-submit-btn:active {
            transform: translateY(1px);
        }

        .aget-alert {
            margin: 0 0 16px;
            padding: 11px 13px;
            border-radius: 10px;
            font-size: 14px;
            line-height: 1.5;
        }

        .aget-alert-success {
            color: #166534;
            background: #dcfce7;
            border: 1px solid #bbf7d0;
        }

        .aget-alert-error {
            color: #991b1b;
            background: #fee2e2;
            border: 1px solid #fecaca;
        }

        @media (max-width: 1024px) {
            .aget-form-wrap {
                max-width: 100%;
                padding: 22px;
                border-radius: 18px;
            }

            .aget-form-title {
                font-size: 21px;
            }
        }

        @media (max-width: 480px) {
            .aget-form-wrap {
                width: 100%;
                max-width: 100%;
                padding: 18px;
                border-radius: 16px;
                box-shadow: 0 8px 24px rgba(15, 23, 42, 0.05);
            }

            .aget-form-title {
                font-size: 20px;
                margin-bottom: 16px;
            }

            .aget-form-field {
                margin-bottom: 12px;
            }

            .aget-form-field input,
            .aget-form-field textarea {
                min-height: 48px;
                border-radius: 11px;
                font-size: 14px;
                padding: 13px;
            }

            .aget-form-field textarea {
                min-height: 88px;
            }

            .aget-submit-btn {
                min-height: 50px;
                border-radius: 11px;
                font-size: 15px;
            }

            .aget-recaptcha {
                height: 70px;
                margin: 14px 0;
            }

            .aget-recaptcha .g-recaptcha {
                transform: scale(0.90);
            }
        }

        @media (max-width: 390px) {
            .aget-form-wrap {
                padding: 16px;
                border-radius: 15px;
            }

            .aget-form-title {
                font-size: 19px;
            }

            .aget-recaptcha {
                height: 68px;
            }

            .aget-recaptcha .g-recaptcha {
                transform: scale(0.86);
            }
        }

        @media (max-width: 360px) {
            .aget-form-wrap {
                padding: 14px;
                border-radius: 14px;
            }

            .aget-form-title {
                font-size: 18px;
            }

            .aget-recaptcha {
                height: 64px;
            }

            .aget-recaptcha .g-recaptcha {
                transform: scale(0.80);
            }
        }
    </style>

    <div class="aget-form-wrap">
        <h3 class="aget-form-title">Get Free Consultation</h3>

        <?php
        if ( $status ) {
            echo aget_get_status_message( $status ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
        ?>

        <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="aget_consultation_submit">
            <input type="hidden" name="aget_source_url" value="<?php echo esc_url( $source_url ); ?>">

            <?php wp_nonce_field( 'aget_consultation_nonce_action', 'aget_consultation_nonce' ); ?>

            <div class="aget-form-field">
                <input type="text" name="full_name" placeholder="Full Name*" required>
            </div>

            <div class="aget-form-field">
                <input type="email" name="email" placeholder="Email*" required>
            </div>

            <div class="aget-form-field">
                <input type="text" name="phone" placeholder="Phone*" required>
            </div>

            <div class="aget-form-field">
                <textarea name="message" placeholder="Message"></textarea>
            </div>

            <div class="aget-recaptcha">
                <div class="g-recaptcha" data-sitekey="<?php echo esc_attr( $site_key ); ?>"></div>
            </div>

            <button type="submit" class="aget-submit-btn">Contact me</button>
        </form>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <?php
    return ob_get_clean();
}

/**
 * Submit handler for logged-in users.
 */
add_action( 'admin_post_aget_consultation_submit', 'aget_consultation_submit_handler' );

/**
 * Submit handler for guest users.
 */
add_action( 'admin_post_nopriv_aget_consultation_submit', 'aget_consultation_submit_handler' );

function aget_consultation_submit_handler() {
    $source_url = isset( $_POST['aget_source_url'] )
        ? esc_url_raw( wp_unslash( $_POST['aget_source_url'] ) )
        : home_url( '/' );

    if (
        ! isset( $_POST['aget_consultation_nonce'] ) ||
        ! wp_verify_nonce(
            sanitize_text_field( wp_unslash( $_POST['aget_consultation_nonce'] ) ),
            'aget_consultation_nonce_action'
        )
    ) {
        aget_redirect_with_status( 'invalid_nonce', $source_url );
    }

    $full_name = isset( $_POST['full_name'] )
        ? sanitize_text_field( wp_unslash( $_POST['full_name'] ) )
        : '';

    $email = isset( $_POST['email'] )
        ? sanitize_email( wp_unslash( $_POST['email'] ) )
        : '';

    $phone = isset( $_POST['phone'] )
        ? sanitize_text_field( wp_unslash( $_POST['phone'] ) )
        : '';

    $message = isset( $_POST['message'] )
        ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) )
        : '';

    $recaptcha_response = isset( $_POST['g-recaptcha-response'] )
        ? sanitize_text_field( wp_unslash( $_POST['g-recaptcha-response'] ) )
        : '';

    if ( '' === $full_name || '' === $email || '' === $phone ) {
        aget_redirect_with_status( 'missing_required', $source_url );
    }

    if ( ! is_email( $email ) ) {
        aget_redirect_with_status( 'invalid_email', $source_url );
    }

    if ( '' === $recaptcha_response ) {
        aget_redirect_with_status( 'missing_recaptcha', $source_url );
    }

    $secret_key = '6Ld8NdAsAAAAADZy5t6j_sDzMNMs77cpL5xY70UQ';

    $verify_response = wp_remote_post(
        'https://www.google.com/recaptcha/api/siteverify',
        array(
            'timeout' => 15,
            'body'    => array(
                'secret'   => $secret_key,
                'response' => $recaptcha_response,
                'remoteip' => isset( $_SERVER['REMOTE_ADDR'] )
                    ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) )
                    : '',
            ),
        )
    );

    if ( is_wp_error( $verify_response ) ) {
        aget_redirect_with_status( 'recaptcha_request_failed', $source_url );
    }

    $response_body = wp_remote_retrieve_body( $verify_response );
    $result        = json_decode( $response_body, true );

    if ( empty( $result['success'] ) || true !== $result['success'] ) {
        aget_redirect_with_status( 'recaptcha_failed', $source_url );
    }

    /**
     * Mail recipients.
     * এখানে তোমার email change/add করতে পারো।
     */
    $recipients = array_filter(
        array_unique(
            array(
                get_option( 'admin_email' ),
                'deals@cbaestate.com',
                'mdsablu36@gmail.com',
            )
        )
    );

    $subject = 'New Free Consultation Request';

    $body  = "New consultation request received:\n\n";
    $body .= "Full Name: {$full_name}\n";
    $body .= "Email: {$email}\n";
    $body .= "Phone: {$phone}\n\n";

    if ( '' !== $message ) {
        $body .= "Message:\n{$message}\n\n";
    }

    $body .= "Source Page:\n{$source_url}\n";
    $body .= "Website:\n" . home_url( '/' ) . "\n";

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . aget_clean_mail_header_name( $full_name ) . ' <' . $email . '>',
    );

    $sent = wp_mail( $recipients, $subject, $body, $headers );

    aget_redirect_with_status( $sent ? 'success' : 'failed', $source_url );
}

/**
 * Redirect helper.
 */
function aget_redirect_with_status( $status, $source_url = '' ) {
    if ( ! $source_url ) {
        $source_url = home_url( '/' );
    }

    wp_safe_redirect(
        add_query_arg(
            'aget_status',
            sanitize_key( $status ),
            esc_url_raw( $source_url )
        )
    );

    exit;
}

/**
 * Get current URL.
 */
function aget_get_current_url() {
    $scheme = is_ssl() ? 'https://' : 'http://';

    $host = isset( $_SERVER['HTTP_HOST'] )
        ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_HOST'] ) )
        : '';

    $uri = isset( $_SERVER['REQUEST_URI'] )
        ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) )
        : '';

    if ( ! $host ) {
        return home_url( '/' );
    }

    return esc_url_raw( $scheme . $host . $uri );
}

/**
 * Status message.
 */
function aget_get_status_message( $status ) {
    $messages = array(
        'success' => array(
            'type'    => 'success',
            'message' => 'Thank you. Your message has been sent successfully.',
        ),
        'failed' => array(
            'type'    => 'error',
            'message' => 'Sorry, mail could not be sent. Please try again.',
        ),
        'invalid_nonce' => array(
            'type'    => 'error',
            'message' => 'Security verification failed. Please refresh the page and try again.',
        ),
        'missing_required' => array(
            'type'    => 'error',
            'message' => 'Please fill in all required fields.',
        ),
        'invalid_email' => array(
            'type'    => 'error',
            'message' => 'Please enter a valid email address.',
        ),
        'missing_recaptcha' => array(
            'type'    => 'error',
            'message' => 'Please complete the reCAPTCHA.',
        ),
        'recaptcha_request_failed' => array(
            'type'    => 'error',
            'message' => 'reCAPTCHA verification failed. Please try again.',
        ),
        'recaptcha_failed' => array(
            'type'    => 'error',
            'message' => 'reCAPTCHA validation failed. Please try again.',
        ),
    );

    if ( ! isset( $messages[ $status ] ) ) {
        return '';
    }

    $type    = $messages[ $status ]['type'];
    $message = $messages[ $status ]['message'];

    $class = 'success' === $type ? 'aget-alert-success' : 'aget-alert-error';

    return sprintf(
        '<div class="aget-alert %1$s">%2$s</div>',
        esc_attr( $class ),
        esc_html( $message )
    );
}

/**
 * Clean Reply-To name.
 */
function aget_clean_mail_header_name( $name ) {
    $name = sanitize_text_field( $name );
    $name = str_replace( array( "\r", "\n" ), '', $name );

    return $name ? $name : 'Website Visitor';
}