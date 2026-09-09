<?php
/**
 * Customizer — brand fallbacks when ACF Options is not filled.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

add_action('customize_register', function (WP_Customize_Manager $wp_customize) {
	$wp_customize->add_section('havenridge_contact', array(
		'title'    => __('Stony Point — Contact', 'havenridge'),
		'priority' => 30,
	));

	$fields = array(
		'havenridge_phone'      => array('Phone', ''),
		'havenridge_email'      => array('Email', 'stonypointdoodles@gmail.com'),
		'havenridge_instagram'  => array('Instagram URL', 'https://www.instagram.com/stonypointdoodles/'),
		'havenridge_facebook'   => array('Facebook URL', 'https://www.facebook.com/stonypointdoodles'),
		'havenridge_apply_url'  => array('Puppy application page URL', ''),
		'havenridge_form_apply' => array('123FormBuilder — Apply form ID or URL', ''),
		'havenridge_form_hello' => array('123FormBuilder — Contact / waitlist form ID or URL', ''),
		'havenridge_hours'      => array('Hours', ''),
		'havenridge_locations'  => array('Locations', 'Raised in our family home'),
	);

	foreach ($fields as $id => $meta) {
		$wp_customize->add_setting($id, array(
			'default'           => $meta[1],
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control($id, array(
			'label'   => $meta[0],
			'section' => 'havenridge_contact',
			'type'    => 'text',
		));
	}
});
