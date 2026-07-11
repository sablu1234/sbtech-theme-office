<?php

// Sbtech_header_logo
function sbtech_header_logo(){
    $header_logo = get_theme_mod('header_logo', get_template_directory_uri().'/assets/header/logo-main.jpg');
    ?>
    <a class="logo" href="<?php echo home_url('/'); ?>"><img src="<?php echo esc_url($header_logo); ?>" alt="Logo"></a>
    <?php
}

// Sbtech_social Media
function sbtech_social_media(){
    $sbtech_fb_link = get_theme_mod('sbtech_fb_link', '#');
    $sbtech_ig_link = get_theme_mod('sbtech_ig_link', '#');
    $sbtech_youtube_link = get_theme_mod('sbtech_youtube_link', '#');
    $sbtech_tw_link = get_theme_mod('sbtech_tw_link', '#');
    $sbtech_ld_link = get_theme_mod('sbtech_ld_link', '#');
    $sbtech_tg_link = get_theme_mod('sbtech_tg_link', '#');
    ?>
    
    <?php if(!empty($sbtech_fb_link)) : ?>
    <a href="<?php echo esc_url( $sbtech_fb_link ); ?>" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;border:1px solid var(--clr-primary);border-radius:8px;color:var(--clr-primary);text-decoration:none;">
        <i class="fa-brands fa-facebook-f"></i>
    </a>
    <?php endif;?>

    <?php if(!empty($sbtech_ig_link)) : ?>
    <a href="<?php echo esc_url( $sbtech_ig_link ); ?>" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;border:1px solid var(--clr-primary);border-radius:8px;color:var(--clr-primary);text-decoration:none;">
        <i class="fab fa-instagram"></i>
    </a>
    <?php endif;?>

    <?php if(!empty($sbtech_youtube_link)) : ?>
    <a href="<?php echo esc_url( $sbtech_youtube_link ); ?>" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;border:1px solid var(--clr-primary);border-radius:8px;color:var(--clr-primary);text-decoration:none;">
        <i class="fab fa-youtube"></i>
    </a>
    <?php endif;?>

    <?php if(!empty($sbtech_tw_link)) : ?>
    <a href="<?php echo esc_url( $sbtech_tw_link ); ?>" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;border:1px solid var(--clr-primary);border-radius:8px;color:var(--clr-primary);text-decoration:none;">
        <i class="fab fa-twitter"></i>
    </a>
    <?php endif;?>

    <?php if(!empty($sbtech_ld_link)) : ?>
    <a href="<?php echo esc_url( $sbtech_ld_link ); ?>" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;border:1px solid var(--clr-primary);border-radius:8px;color:var(--clr-primary);text-decoration:none;">
        <i class="fab fa-linkedin-in"></i>
    </a>
    <?php endif;?>

    <?php if(!empty($sbtech_tg_link)) : ?>
    <a href="<?php echo esc_url( $sbtech_tg_link ); ?>" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;border:1px solid var(--clr-primary);border-radius:8px;color:var(--clr-primary);text-decoration:none;">
        <i class="fab fa-telegram-plane"></i>
    </a>
    <?php endif;?>

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