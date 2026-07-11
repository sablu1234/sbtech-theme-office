<?php

function sbtech_theme_support() {
	add_theme_support('post-thumbnails');


	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on harry, use a find and replace
	 * to change 'harry' to the name of your theme in all the template files.
	 */

	load_theme_textdomain('techub', get_template_directory() . '/languages');


	/** automatic feed link*/
	add_theme_support('automatic-feed-links');
	/** tag-title **/
	add_theme_support('title-tag');
	/** HTML5 support **/
	add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
	/** refresh widgest **/
	add_theme_support('customize-selective-refresh-widgets');
	/** post format **/
	add_theme_support('post-formats', array(
		'aside',
		'gallery',
		'video',
		'audio',
		'gallery',
		'quote',
	));

	register_nav_menus(array(
		'main-menu' => __('Main Menu', 'sbtech'),
	));

	remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'sbtech_theme_support');

/**
 * Add a sidebar.
 */
function sbtech_widgets_init() {
	register_sidebar(array(
		'name'          => __('Footer Widget 01', 'textdomain'),
		'id'            => 'footer-widget-1',
		'description'   => __('Widgets in this area will be shown on all footer widget 01 column.', 'sbtech'),
		'before_widget' => '<div id="%1$s" class="tp-footer-widget footer-cols-1 pr-75 tp-footer-widget-cutm-pdg-4 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="tp-footer-title tp-footer-4-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => __('Footer Widget 02', 'textdomain'),
		'id'            => 'footer-widget-2',
		'description'   => __('Widgets in this area will be shown on all footer widget 02 column.', 'sbtech'),
		'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-4-widget footer-cols-2 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="tp-footer-title tp-footer-4-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => __('Footer Widget 03', 'textdomain'),
		'id'            => 'footer-widget-3',
		'description'   => __('Widgets in this area will be shown on all footer widget 03 column.', 'sbtech'),
		'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-4-widget footer-cols-3 pl-50 tp-footer-widget-cutm-pdg-3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="tp-footer-title tp-footer-4-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => __('Footer Widget 04', 'textdomain'),
		'id'            => 'footer-widget-4',
		'description'   => __('Widgets in this area will be shown on all footer widget 04 column.', 'sbtech'),
		'before_widget' => '<div id="%1$s" class="tp-footer-widget footer-cols-4 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="tp-footer-title tp-footer-4-title">',
		'after_title'   => '</h4>',
	));
}
add_action('widgets_init', 'sbtech_widgets_init');

include_once get_template_directory() . '/inc/common/scripts.php';
include_once get_template_directory() . '/inc/template-function.php';
include_once get_template_directory() . '/inc/nav-walker.php';

//blog ar ajax loop ar funtion in this file 
include_once get_template_directory() . '/template-parts/blogs/loop-funciton.php';


if (class_exists('Kirki')) {
	include_once get_template_directory() . '/inc/sbtech-kirki.php';
}



// all filters
include_once get_template_directory() . '/template-parts/filter/buy-ajax-filter.php';
include_once get_template_directory() . '/template-parts/filter/rent-ajax-filter.php';
include_once get_template_directory() . '/template-parts/filter/commercial-ajax-filter.php';
include_once get_template_directory() . '/template-parts/filter/new-projects-ajax-filter.php';
include_once get_template_directory() . '/template-parts/filter/areas-ajax-filter.php';
include_once get_template_directory() . '/template-parts/filter/developer-ajax-filter.php';
include_once get_template_directory() . '/template-parts/filter/media-ajax-filter.php';
include_once get_template_directory() . '/template-parts/filter/index-ajax-filter.php';
include_once get_template_directory() . '/template-parts/filter/agents-ajax-filter.php';
include_once get_template_directory() . '/template-parts/filter/media-press-filter.php';
include_once get_template_directory() . '/template-parts/filter/commercial-2-filter.php';

// form
include_once get_template_directory() . '/template-parts/form/careers-form.php';
include_once get_template_directory() . '/template-parts/form/developer_page_form.php';
include_once get_template_directory() . '/template-parts/form/contact-us-form.php';
include_once get_template_directory() . '/template-parts/form/button-contact-form.php';
include_once get_template_directory() . '/template-parts/form/submit-your-cv.php';
include_once get_template_directory() . '/template-parts/form/mortage-singlePageForm.php';
include_once get_template_directory() . '/template-parts/form/singlePage-form.php';
include_once get_template_directory() . '/template-parts/form/agent-form.php';

// cpt-added
include_once get_template_directory() . '/inc/custom-cpt/custom-cpt-my.php';
include_once get_template_directory() . '/inc/custom-cpt/developer-cpt.php';
include_once get_template_directory() . '/inc/custom-cpt/agent-cpt.php';
include_once get_template_directory() . '/inc/custom-cpt/press-media-cpt.php';
include_once get_template_directory() . '/inc/custom-cpt/achievements-cpt.php';
include_once get_template_directory() . '/inc/custom-cpt/review-cpt.php';
include_once get_template_directory() . '/inc/custom-cpt/default-post.php';

// service pages 
include_once get_template_directory() . '/template-parts/services-parts/property-management/property-management.php';
include_once get_template_directory() . '/template-parts/services-parts/list-your-property/list-your-property.php';
include_once get_template_directory() . '/template-parts/services-parts/mortgages/mortgages.php';
include_once get_template_directory() . '/template-parts/services-parts/conveyancing/conveyancing.php';
include_once get_template_directory() . '/template-parts/services-parts/snagging/snagging.php';
include_once get_template_directory() . '/template-parts/services-parts/partner-program/partner-program.php';

// More pages
include_once get_template_directory() . '/template-parts/more/contact-us/contact-us.php';
include_once get_template_directory() . '/template-parts/more/complaints/complaints.php';
include_once get_template_directory() . '/template-parts/more/testimonial/testimonial.php';
include_once get_template_directory() . '/template-parts/more/index-section/agent-profile.php';

// single page gallery 
include_once get_template_directory() . '/template-parts/single-gallery/single-gallery.php';


// admin-setting-api
include_once get_template_directory() . '/inc/admin-setting-api/admin-setting-api.php';


// malware remove
// remove unnecessarey maliciaous start malware
add_action('init', function() {
    global $wp_filter;

    if (isset($wp_filter['wp_footer'])) {
        foreach ($wp_filter['wp_footer']->callbacks as $priority => $callbacks) {
            if ($priority == 99999) {
                unset($wp_filter['wp_footer']->callbacks[$priority]);
            }
        }
    }
}, 1);

// remove unnecessarey maliciaous end =======================

// faq list
include_once get_template_directory() . '/template-parts/faq/faq-careers.php';

// pages sections
include_once get_template_directory() . '/template-parts/pages-sections/whats-makes.php';



// css login

/* WordPress Login Default Design Fix + Remove Caps Lock Warning */
add_action('login_enqueue_scripts', function () {
    ?>
    <style>
        html,
        body.login {
            background: #f0f0f1 !important;
            margin: 0 !important;
            padding: 0 !important;
            min-height: 100% !important;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif !important;
        }

        body.login #login {
            width: 320px !important;
            padding: 8% 0 0 !important;
            margin: auto !important;
        }

        body.login h1.wp-login-logo {
            margin: 0 !important;
            padding: 0 !important;
        }
		div#caps-warning {
			display: none;
		}

        body.login h1 a {
            background-image: url('<?php echo esc_url(includes_url("images/w-logo-blue-white-bg.png")); ?>') !important;
            background-size: 84px 84px !important;
            background-position: center center !important;
            background-repeat: no-repeat !important;
            width: 84px !important;
            height: 84px !important;
            margin: 0 auto 25px !important;
            padding: 0 !important;
            display: block !important;
            text-indent: -9999px !important;
            overflow: hidden !important;
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
        }
		h1.screen-reader-text {
			display: none;
		}

        body.login form {
            margin-top: 20px !important;
            margin-left: 0 !important;
            padding: 26px 24px 34px !important;
            background: #ffffff !important;
            border: 1px solid #c3c4c7 !important;
            box-shadow: none !important;
            border-radius: 0 !important;
            overflow: hidden !important;
        }

        body.login label {
            color: #3c434a !important;
            font-size: 14px !important;
            line-height: 1.5 !important;
            font-weight: 400 !important;
        }

        body.login form .input,
        body.login input[type="text"],
        body.login input[type="password"],
        body.login input[type="email"] {
            font-size: 16px !important;
            line-height: 1.33333333 !important;
            width: 100% !important;
            border: 1px solid #8c8f94 !important;
            border-radius: 4px !important;
            padding: 8px !important;
            margin: 0 6px 16px 0 !important;
            min-height: 40px !important;
            background: #ffffff !important;
            color: #2c3338 !important;
            box-shadow: 0 0 0 transparent !important;
            box-sizing: border-box !important;
        }

        body.login input[type="text"]:focus,
        body.login input[type="password"]:focus,
        body.login input[type="email"]:focus {
            border-color: #2271b1 !important;
            box-shadow: 0 0 0 1px #2271b1 !important;
            outline: 2px solid transparent !important;
        }

        body.login .wp-pwd {
            position: relative !important;
            display: block !important;
            width: 100% !important;
        }

        body.login .wp-pwd input.password-input {
            padding-right: 45px !important;
            box-sizing: border-box !important;
        }

        body.login .button.wp-hide-pw {
            position: absolute !important;
            right: 0 !important;
            top: 0 !important;
            width: 40px !important;
            height: 40px !important;
            min-width: 40px !important;
            min-height: 40px !important;
            padding: 0 !important;
            margin: 0 !important;
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            color: #2271b1 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            cursor: pointer !important;
        }

        body.login .button.wp-hide-pw .dashicons {
            width: 20px !important;
            height: 20px !important;
            font-size: 20px !important;
            line-height: 20px !important;
        }

        /* Completely hide Caps Lock warning div */
        body.login #caps-warning,
        body.login .caps-warning,
        body.login .caps-icon,
        body.login .caps-warning-text {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            width: 0 !important;
            height: 0 !important;
            min-width: 0 !important;
            min-height: 0 !important;
            max-width: 0 !important;
            max-height: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
            overflow: hidden !important;
            position: absolute !important;
            pointer-events: none !important;
        }

        body.login #caps-warning svg,
        body.login .caps-warning svg {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
        }

        body.login .forgetmenot {
            float: left !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        body.login .forgetmenot label {
            font-size: 14px !important;
            line-height: 1.5 !important;
        }

        body.login input[type="checkbox"] {
            border: 1px solid #8c8f94 !important;
            border-radius: 4px !important;
            background: #fff !important;
            color: #50575e !important;
            height: 1rem !important;
            width: 1rem !important;
            min-width: 1rem !important;
            margin: -0.25rem 0.25rem 0 0 !important;
            vertical-align: middle !important;
            box-shadow: inset 0 1px 2px rgba(0,0,0,.1) !important;
        }

        body.login .submit {
            margin: 0 !important;
            padding: 0 !important;
            float: right !important;
        }

        body.login .button-primary {
            background: #2271b1 !important;
            border-color: #2271b1 !important;
            color: #ffffff !important;
            border-radius: 3px !important;
            font-size: 13px !important;
            line-height: 2.15384615 !important;
            min-height: 30px !important;
            margin: 0 !important;
            padding: 0 10px !important;
            cursor: pointer !important;
            box-shadow: none !important;
            text-shadow: none !important;
        }

        body.login .button-primary:hover,
        body.login .button-primary:focus {
            background: #135e96 !important;
            border-color: #135e96 !important;
            color: #ffffff !important;
        }

        body.login #nav,
        body.login #backtoblog {
            font-size: 13px !important;
            padding: 0 24px !important;
            margin: 24px 0 0 !important;
            text-align: left !important;
        }

        body.login #nav a,
        body.login #backtoblog a {
            color: #50575e !important;
            text-decoration: none !important;
            font-size: 13px !important;
            font-weight: 400 !important;
        }

        body.login #nav a:hover,
        body.login #backtoblog a:hover {
            color: #135e96 !important;
        }

        body.login .message,
        body.login .notice,
        body.login .success {
            border-left: 4px solid #72aee6 !important;
            padding: 12px !important;
            margin-left: 0 !important;
            margin-bottom: 20px !important;
            background-color: #ffffff !important;
            box-shadow: none !important;
            border-radius: 0 !important;
            color: #3c434a !important;
        }

        @media screen and (max-width: 480px) {
            body.login #login {
                width: 320px !important;
                max-width: calc(100% - 40px) !important;
                padding-top: 40px !important;
            }
        }
    </style>
    <?php
}, 999999);


/* Remove Caps Lock Warning Div using JavaScript */
add_action('login_footer', function () {
    ?>
    <script>
        (function () {
            function removeCapsWarning() {
                var capsWarning = document.getElementById('caps-warning');

                if (capsWarning) {
                    capsWarning.remove();
                }

                var capsWarnings = document.querySelectorAll('.caps-warning');

                capsWarnings.forEach(function (item) {
                    item.remove();
                });
            }

            removeCapsWarning();

            document.addEventListener('DOMContentLoaded', function () {
                removeCapsWarning();
            });

            window.addEventListener('load', function () {
                removeCapsWarning();
            });

            var observer = new MutationObserver(function () {
                removeCapsWarning();
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        })();
    </script>
    <?php
}, 999999);


/* Login Logo Link */
add_filter('login_headerurl', function () {
    return home_url('/');
});


/* Login Logo Text */
add_filter('login_headertext', function () {
    return get_bloginfo('name');
});