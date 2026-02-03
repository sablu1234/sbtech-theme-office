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

include_once get_template_directory() . '/template-parts/filter/buy-ajax-filter.php';
