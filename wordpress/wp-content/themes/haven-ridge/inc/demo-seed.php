<?php
/**
 * One-click demo pages + menus (Appearance → Stony Point setup).
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

add_action('admin_menu', function () {
	add_theme_page(
		__('Stony Point setup', 'havenridge'),
		__('Stony Point setup', 'havenridge'),
		'edit_theme_options',
		'havenridge-setup',
		'havenridge_setup_screen'
	);
});

function havenridge_setup_screen() {
	if (!current_user_can('edit_theme_options')) {
		return;
	}

	$notice = '';
	if (!empty($_POST['havenridge_seed']) && check_admin_referer('havenridge_seed')) {
		$notice = havenridge_seed_content();
	}

	echo '<div class="wrap"><h1>Stony Point Doodles setup</h1>';
	if ($notice) {
		echo '<div class="notice notice-success is-dismissible"><p>' . esc_html($notice) . '</p></div>';
	}
	echo '<p>Creates Home, Our Puppies, Upcoming Litters, Meet Our Dogs, Our Story, Puppy Application, FAQs, and Contact — then assigns the primary menu.</p>';
	echo '<p>Install <strong>ACF PRO</strong> first so Stony Point blocks appear in the editor (category “Stony Point”). Paste the Google Form URL in Site settings.</p>';
	echo '<form method="post">';
	wp_nonce_field('havenridge_seed');
	submit_button('Create demo pages & menu', 'primary', 'havenridge_seed');
	echo '</form></div>';
}

function havenridge_seed_content() {
	$pages = array(
		'Home'               => array('', ''),
		'Our Puppies'        => array('page-puppies.php', '/our-puppies/'),
		'Upcoming Litters'   => array('page-upcoming.php', '/upcoming-litters/'),
		'Meet Our Dogs'      => array('page-parents.php', '/meet-our-dogs/'),
		'Our Story'          => array('page-about.php', '/our-story/'),
		'Puppy Application'  => array('page-apply.php', '/puppy-application/'),
		'FAQs'               => array('page-faq.php', '/faqs/'),
		'Contact'            => array('page-contact.php', '/contact/'),
	);

	$created = array();
	foreach ($pages as $title => $meta) {
		$existing = get_page_by_title($title);
		if ($existing) {
			$created[ $title ] = $existing->ID;
			if ($meta[0]) {
				update_post_meta($existing->ID, '_wp_page_template', 'templates/' . $meta[0]);
			}
			continue;
		}
		$id = wp_insert_post(array(
			'post_title'   => $title,
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '',
			'post_name'    => trim($meta[1], '/'),
		));
		if (!is_wp_error($id)) {
			$created[ $title ] = $id;
			if ($meta[0]) {
				update_post_meta($id, '_wp_page_template', 'templates/' . $meta[0]);
			}
		}
	}

	if (!empty($created['Home'])) {
		update_option('show_on_front', 'page');
		update_option('page_on_front', $created['Home']);
		delete_post_meta($created['Home'], '_wp_page_template');
	}

	$menu_name = 'Stony Point Primary';
	$menu = wp_get_nav_menu_object($menu_name);
	$menu_id = $menu ? $menu->term_id : wp_create_nav_menu($menu_name);

	$order = array('Home', 'Our Puppies', 'Upcoming Litters', 'Meet Our Dogs', 'Our Story', 'FAQs', 'Contact');
	$i = 1;
	foreach ($order as $title) {
		if (empty($created[ $title ])) {
			continue;
		}
		wp_update_nav_menu_item($menu_id, 0, array(
			'menu-item-title'     => $title,
			'menu-item-object'    => 'page',
			'menu-item-object-id' => $created[ $title ],
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish',
			'menu-item-position'  => $i++,
		));
	}

	$locations = get_theme_mod('nav_menu_locations', array());
	$locations['primary'] = $menu_id;
	$locations['footer']  = $menu_id;
	set_theme_mod('nav_menu_locations', $locations);

	flush_rewrite_rules();

	return 'Stony Point pages and primary menu are ready.';
}
