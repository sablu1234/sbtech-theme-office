<?php

// Sbtech_header_logo
function Sbtech_header_logo() {

    $header_logo = get_theme_mod('header_logo', get_template_directory_uri() . '/assets/img/logo/logo.png');
?>
    <a href="<?php echo home_url('/'); ?>"><img src="<?php echo $header_logo; ?>" alt=""></a>
<?php
}

// Sbtech_footer_copyright
function Sbtech_footer_copyright() {
    $footer_copyright = get_theme_mod('footer_copyright', __('Full Copyright & Design By @ Theme pure – 2024'));
?>
    <p class="tp-footer-copy-paragraph tp-footer-4-copy-paragraph"><?php echo wp_kses_post($footer_copyright) ?></a></p>
<?php
}

// Sbtech_header_social
function sbtech_header_social() {
    $header_fb = get_theme_mod('header_fb', '#');
    $header_in = get_theme_mod('header_in', '#');
    $header_tw = get_theme_mod('header_tw', '#');

?>
    <?php if (!empty($header_fb)) : ?>
        <a href="<?php echo esc_url($header_fb); ?>"><i class="fa-brands fa-facebook"></i></a>
    <?php endif; ?>
    <?php if (!empty($header_in)) : ?>
        <a href="<?php echo esc_url($header_in); ?>"><i class="fa-brands fa-instagram"></i></a>
    <?php endif; ?>
    <?php if (!empty($header_tw)) : ?>
        <a href="<?php echo esc_url($header_tw); ?>"><i class="fa-brands fa-twitter"></i></a>
    <?php endif; ?>
    <?php if (!empty($header_pin)) : ?>
        <a href="<?php echo esc_url($header_pin); ?>"><i class="fa-brands fa-pinterest"></i></a>
    <?php endif; ?>
<?php
}

// Main menu display funciton
function sbtech_header_menu() {
?>
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'main-menu',
            'menu_class'      => 'menu',
            'menu_id'         => 'menu',
            'container'         => '',
            'fallback_cb'     => 'Sbtech_Walker_Nav_Menu::fallback',
            'walker'          => new Sbtech_Walker_Nav_Menu,
        )
    );
    ?>
<?php
}

/**
 * Sanitize SVG markup for front-end display.
 *
 * @param  string $svg SVG markup to sanitize.
 * @return string 	  Sanitized markup.
 */
function sbtech_kses($allow_tags = '') {
    $allowed_html = [
        'svg' => array(
            'class' => true,
            'aria-hidden' => true,
            'aria-labelledby' => true,
            'role' => true,
            'xmlns' => true,
            'width' => true,
            'height' => true,
            'viewbox' => true, // <= Must be lower case!
        ),
        'path'  => array(
            'd' => true,
            'fill' => true,
            'stroke' => true,
            'stroke-width' => true,
            'stroke-linecap' => true,
            'stroke-linejoin' => true,
            'opacity' => true,
        ),
        'a' => [
            'class'    => [],
            'href'    => [],
            'title'    => [],
            'target'    => [],
            'rel'    => [],
        ],
        'b' => [],
        'blockquote'  =>  [
            'cite' => [],
        ],
        'cite'                      => [
            'title' => [],
        ],
        'code'                      => [],
        'del'                    => [
            'datetime'   => [],
            'title'      => [],
        ],
        'dd'                     => [],
        'div'                    => [
            'class'   => [],
            'title'   => [],
            'style'   => [],
        ],
        'dl'                     => [],
        'dt'                     => [],
        'em'                     => [],
        'h1'                     => [],
        'h2'                     => [],
        'h3'                     => [],
        'h4'                     => [],
        'h5'                     => [],
        'h6'                     => [],
        'i'                         => [
            'class' => [],
        ],
        'img'                    => [
            'alt'  => [],
            'class'   => [],
            'height' => [],
            'src'  => [],
            'width'   => [],
        ],
        'li'                     => array(
            'class' => array(),
        ),
        'ol'                     => array(
            'class' => array(),
        ),
        'p'                         => array(
            'class' => array(),
        ),
        'q'                         => array(
            'cite'    => array(),
            'title'   => array(),
        ),
        'span'                      => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'iframe'                 => array(
            'width'         => array(),
            'height'     => array(),
            'scrolling'     => array(),
            'frameborder'   => array(),
            'allow'         => array(),
            'src'        => array(),
        ),
        'strike'                 => array(),
        'br'                     => array(),
        'strong'                 => array(),
    ];

    return wp_kses($allow_tags, $allowed_html);
}
