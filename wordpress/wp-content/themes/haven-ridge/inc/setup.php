<?php
/**
 * Theme setup.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

add_action('after_setup_theme', function () {
	load_theme_textdomain('havenridge', HAVENRIDGE_DIR . '/languages');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
	add_theme_support('custom-logo', array(
		'height'      => 80,
		'width'       => 280,
		'flex-height' => true,
		'flex-width'  => true,
	));
	add_theme_support('align-wide');
	add_theme_support('editor-styles');
	add_theme_support('responsive-embeds');
	add_editor_style('assets/css/editor.css');

	register_nav_menus(array(
		'primary' => __('Primary menu', 'havenridge'),
		'footer'  => __('Footer menu', 'havenridge'),
	));

	set_post_thumbnail_size(1200, 900, true);
	add_image_size('havenridge-card', 800, 960, true);
	add_image_size('havenridge-hero', 1800, 1200, true);
	add_image_size('havenridge-square', 800, 800, true);
});

add_action('wp_head', function () {
	$icon32  = havenridge_asset('images/favicon-32.png');
	$icon192 = havenridge_asset('images/favicon-192.png');
	$apple   = havenridge_asset('images/apple-touch-icon.png');
	echo '<link rel="icon" type="image/png" sizes="32x32" href="' . esc_url($icon32) . '">' . "\n";
	echo '<link rel="icon" type="image/png" sizes="192x192" href="' . esc_url($icon192) . '">' . "\n";
	echo '<link rel="apple-touch-icon" href="' . esc_url($apple) . '">' . "\n";
}, 1);

add_action('widgets_init', function () {
	register_sidebar(array(
		'name'          => __('Footer', 'havenridge'),
		'id'            => 'footer-1',
		'before_widget' => '<div class="hr-footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="hr-kicker">',
		'after_title'   => '</p>',
	));
});

add_filter('body_class', function ($classes) {
	if (is_front_page()) {
		$classes[] = 'is-home';
	} else {
		$classes[] = 'is-interior';
	}
	return $classes;
});

add_action('admin_notices', function () {
	if (!current_user_can('edit_theme_options')) {
		return;
	}
	if (!function_exists('acf_register_block_type')) {
		echo '<div class="notice notice-warning"><p><strong>Stony Point Doodles</strong> needs <a href="https://www.advancedcustomfields.com/pro/" target="_blank" rel="noopener">ACF PRO</a> so editors can build pages with blocks. Install and activate it, then use the block inserter on any page.</p></div>';
	}
});
