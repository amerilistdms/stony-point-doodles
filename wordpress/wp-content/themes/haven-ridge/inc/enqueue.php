<?php
/**
 * Assets.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'havenridge-fonts',
		'https://fonts.googleapis.com/css2?family=Allura&family=Lato:ital,wght@0,400;0,700;1,400&family=Oswald:wght@400;500;600&display=swap',
		array(),
		null
	);

	$css = HAVENRIDGE_DIR . '/assets/css/main.css';
	wp_enqueue_style(
		'havenridge',
		havenridge_asset('css/main.css'),
		array('havenridge-fonts'),
		file_exists($css) ? (string) filemtime($css) : HAVENRIDGE_VERSION
	);

	$js = HAVENRIDGE_DIR . '/assets/js/main.js';
	$config = HAVENRIDGE_DIR . '/assets/js/forms-config.js';
	wp_enqueue_script(
		'havenridge-forms',
		havenridge_asset('js/forms-config.js'),
		array(),
		file_exists($config) ? (string) filemtime($config) : HAVENRIDGE_VERSION,
		true
	);
	wp_enqueue_script(
		'havenridge',
		havenridge_asset('js/main.js'),
		array('havenridge-forms'),
		file_exists($js) ? (string) filemtime($js) : HAVENRIDGE_VERSION,
		true
	);

	$forms = array(
		'apply' => havenridge_form_value('apply'),
		'hello' => havenridge_form_value('hello'),
	);
	wp_add_inline_script(
		'havenridge-forms',
		'window.HR_FORMS = Object.assign({}, window.HR_FORMS || {}, ' . wp_json_encode($forms) . ');',
		'after'
	);

	wp_localize_script('havenridge', 'HavenRidge', array(
		'ajax' => admin_url('admin-ajax.php'),
	));
});

add_filter('script_loader_tag', function ($tag, $handle) {
	if ($handle === 'havenridge' || $handle === 'havenridge-forms') {
		return str_replace(' src', ' defer src', $tag);
	}
	return $tag;
}, 10, 2);
