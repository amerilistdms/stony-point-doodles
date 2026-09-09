<?php
/**
 * ACF options page — site-wide contact, social, announcement.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

add_action('acf/init', function () {
	if (!function_exists('acf_add_options_page')) {
		return;
	}

	acf_add_options_page(array(
		'page_title' => __('Stony Point settings', 'havenridge'),
		'menu_title' => __('Site settings', 'havenridge'),
		'menu_slug'  => 'havenridge-settings',
		'capability' => 'edit_theme_options',
		'redirect'   => false,
		'icon_url'   => 'dashicons-heart',
		'position'   => 59,
	));
});
