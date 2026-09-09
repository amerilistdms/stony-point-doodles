<?php
/**
 * Helpers.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

function havenridge_brand() {
	$name = get_bloginfo('name');
	return ($name && $name !== 'WordPress') ? $name : 'Stony Point Doodles';
}

function havenridge_apply_url() {
	$url = get_theme_mod('havenridge_apply_url', '');
	if (function_exists('get_field')) {
		$opt = get_field('application_url', 'option');
		if ($opt) {
			$url = $opt;
		}
	}
	return $url ?: home_url('/puppy-application/');
}

function havenridge_form_value($slot) {
	$slot = $slot === 'apply' ? 'apply' : 'hello';
	$val  = get_theme_mod('havenridge_form_' . $slot, '');
	if (function_exists('get_field')) {
		$opt = get_field('form_' . $slot, 'option');
		if ($opt) {
			$val = $opt;
		}
	}
	return trim((string) $val);
}

function havenridge_form_id_number($slot) {
	$raw = havenridge_form_value($slot);
	if ($slot === 'apply' && $raw === '') {
		$raw = '6976913';
	}
	if ($slot === 'hello' && $raw === '') {
		$raw = '6976914';
	}
	if (preg_match('/(\d{4,})/', $raw, $m)) {
		return $m[1];
	}
	return '';
}

function havenridge_google_form_url() {
	return home_url('/contact/#contact');
}

function havenridge_form_embed($slot) {
	if ($slot === 'hello') {
		return '<a class="hr-btn hr-btn--solid" href="' . esc_url(home_url('/contact/#contact')) . '">Send a message</a>';
	}
	return '<a class="hr-btn hr-btn--solid" href="' . esc_url(havenridge_apply_url()) . '#apply">Start the application</a>';
}

function havenridge_waitlist_url() {
	return home_url('/contact/#contact');
}

function havenridge_phone() {
	$phone = get_theme_mod('havenridge_phone', '');
	if (function_exists('get_field')) {
		$opt = get_field('phone', 'option');
		if ($opt) {
			$phone = $opt;
		}
	}
	return $phone;
}

function havenridge_phone_href() {
	return 'tel:' . preg_replace('/[^\d+]/', '', havenridge_phone());
}

function havenridge_email() {
	$email = get_theme_mod('havenridge_email', 'stonypointdoodles@gmail.com');
	if (function_exists('get_field')) {
		$opt = get_field('email', 'option');
		if ($opt) {
			$email = $opt;
		}
	}
	return $email;
}

function havenridge_instagram() {
	$url = get_theme_mod('havenridge_instagram', 'https://www.instagram.com/stonypointdoodles/');
	if (function_exists('get_field')) {
		$opt = get_field('instagram', 'option');
		if ($opt) {
			$url = $opt;
		}
	}
	return $url;
}

function havenridge_facebook() {
	$url = get_theme_mod('havenridge_facebook', 'https://www.facebook.com/stonypointdoodles');
	if (function_exists('get_field')) {
		$opt = get_field('facebook', 'option');
		if ($opt) {
			$url = $opt;
		}
	}
	return $url;
}

function havenridge_asset($path) {
	return HAVENRIDGE_URI . '/assets/' . ltrim($path, '/');
}

function havenridge_demo_image($key = 'hero') {
	$images = array(
		'hero'      => havenridge_asset('images/photos/hero-doodles.png'),
		'love'      => havenridge_asset('images/photos/secondseccion.png'),
		'lulu'      => havenridge_asset('images/photos/lulu.png'),
		'zoey'      => havenridge_asset('images/photos/zoey.jpg'),
		'chai'      => havenridge_asset('images/photos/chai.png'),
		'mila'      => havenridge_asset('images/photos/milaprofile.png'),
		'nico'      => havenridge_asset('images/photos/nicoprofile.png'),
		'remy'      => havenridge_asset('images/photos/remyprofile.png'),
		'nico3'     => havenridge_asset('images/photos/nico3.jpg'),
		'newborn'   => havenridge_asset('images/photos/newborn.jpg'),
		'zeus'      => havenridge_asset('images/photos/zeus.png'),
		'apollo'    => havenridge_asset('images/photos/apollo.png'),
		'frodo'     => havenridge_asset('images/photos/frodo.png'),
		'simba'     => havenridge_asset('images/photos/simba.png'),
		'nala'      => havenridge_asset('images/photos/nala.png'),
		'athena'    => havenridge_asset('images/photos/athena.png'),
		'kiara'     => havenridge_asset('images/photos/kiara.png'),
		'apply'     => havenridge_asset('images/photos/apply.png'),
		'review'    => havenridge_asset('images/photos/review.png'),
		'grow'      => havenridge_asset('images/photos/grow.png'),
		'welcome'   => havenridge_asset('images/photos/welcome.png'),
		'familyportrait' => havenridge_asset('images/photos/familyportrait.png'),
		'hero2'     => 'https://images.unsplash.com/photo-1583511655826-05700d52f4d9?auto=format&fit=crop&w=1400&q=80',
		'bernese'   => 'https://images.unsplash.com/photo-1477884213360-7e9d7dcc1e48?auto=format&fit=crop&w=1400&q=80',
		'poodle'    => 'https://images.unsplash.com/photo-1558788353-f76d92427f16?auto=format&fit=crop&w=1400&q=80',
		'puppy1'    => 'https://images.unsplash.com/photo-1611003228941-98852ba62227?auto=format&fit=crop&w=900&q=80',
		'puppy2'    => 'https://images.unsplash.com/photo-1587300003388-59208cc962cb?auto=format&fit=crop&w=900&q=80',
		'puppy3'    => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&fit=crop&w=900&q=80',
		'puppy4'    => 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&fit=crop&w=900&q=80',
		'puppy5'    => 'https://images.unsplash.com/photo-1534361960057-19889db9621e?auto=format&fit=crop&w=900&q=80',
		'family'    => 'https://images.unsplash.com/photo-1601758125946-6ec2ef64daf8?auto=format&fit=crop&w=1400&q=80',
		'home'      => 'https://images.unsplash.com/photo-1518717758536-85ae29035b6d?auto=format&fit=crop&w=1400&q=80',
		'portrait'  => 'https://images.unsplash.com/photo-1552053831-71594a27632d?auto=format&fit=crop&w=900&q=80',
	);
	return $images[ $key ] ?? $images['hero'];
}

function havenridge_field($name, $default = '', $id = false) {
	if (function_exists('get_field')) {
		$value = get_field($name, $id);
		if ($value !== null && $value !== false && $value !== '') {
			return $value;
		}
	}
	return $default;
}

function havenridge_sub($name, $default = '') {
	if (function_exists('get_sub_field')) {
		$value = get_sub_field($name);
		if ($value !== null && $value !== false && $value !== '') {
			return $value;
		}
	}
	return $default;
}

function havenridge_image_url($image, $size = 'large') {
	if (is_array($image)) {
		if (!empty($image['sizes'][ $size ])) {
			return $image['sizes'][ $size ];
		}
		return $image['url'] ?? '';
	}
	if (is_numeric($image)) {
		$url = wp_get_attachment_image_url((int) $image, $size);
		return $url ?: '';
	}
	if (is_string($image)) {
		return $image;
	}
	return '';
}

function havenridge_image_alt($image, $fallback = '') {
	if (is_array($image) && !empty($image['alt'])) {
		return $image['alt'];
	}
	return $fallback;
}

function havenridge_link_url($link, $fallback = '#') {
	if (is_array($link) && !empty($link['url'])) {
		return $link['url'];
	}
	if (is_string($link) && $link !== '') {
		return $link;
	}
	return $fallback;
}

function havenridge_link_title($link, $fallback = '') {
	if (is_array($link) && !empty($link['title'])) {
		return $link['title'];
	}
	return $fallback;
}

function havenridge_link_target($link) {
	if (is_array($link) && !empty($link['target'])) {
		return $link['target'];
	}
	return '_self';
}

function havenridge_nl2p($text) {
	$text = wp_kses_post($text);
	if (strpos($text, '<') !== false) {
		return $text;
	}
	return wpautop(esc_html($text));
}

function havenridge_demo_puppies() {
	return array(
		array(
			'name'   => 'Zeus',
			'gender' => 'Male',
			'size'   => '',
			'color'  => 'Merle Parti',
			'status' => 'available',
			'weight' => '',
			'image'  => havenridge_demo_image('zeus'),
			'note'   => 'Merle parti boy — personality still unfolding as he grows.',
		),
		array(
			'name'   => 'Apollo',
			'gender' => 'Male',
			'size'   => '',
			'color'  => 'Merle',
			'status' => 'available',
			'weight' => '',
			'image'  => havenridge_demo_image('apollo'),
			'note'   => 'Merle boy — personality still unfolding as he grows.',
		),
		array(
			'name'   => 'Frodo',
			'gender' => 'Male',
			'size'   => '',
			'color'  => 'Merle',
			'status' => 'available',
			'weight' => '',
			'image'  => havenridge_demo_image('frodo'),
			'note'   => 'Merle boy — personality still unfolding as he grows.',
		),
		array(
			'name'   => 'Simba',
			'gender' => 'Male',
			'size'   => '',
			'color'  => 'Tri-color',
			'status' => 'available',
			'weight' => '',
			'image'  => havenridge_demo_image('simba'),
			'note'   => 'Tri-color boy — personality still unfolding as he grows.',
		),
		array(
			'name'   => 'Nala',
			'gender' => 'Female',
			'size'   => '',
			'color'  => 'Apricot Tuxedo',
			'status' => 'available',
			'weight' => '',
			'image'  => havenridge_demo_image('nala'),
			'note'   => 'Apricot tuxedo girl — personality still unfolding as she grows.',
		),
		array(
			'name'   => 'Athena',
			'gender' => 'Female',
			'size'   => '',
			'color'  => 'Tri-color',
			'status' => 'available',
			'weight' => '',
			'image'  => havenridge_demo_image('athena'),
			'note'   => 'Tri-color girl — personality still unfolding as she grows.',
		),
		array(
			'name'   => 'Kiara',
			'gender' => 'Female',
			'size'   => '',
			'color'  => 'Tri-color',
			'status' => 'available',
			'weight' => '',
			'image'  => havenridge_demo_image('kiara'),
			'note'   => 'Tri-color girl — personality still unfolding as she grows.',
		),
	);
}

function havenridge_demo_litters() {
	return array(
		array(
			'kicker' => 'Current',
			'title'  => 'Mila & Nico',
			'lead'   => '7 puppies. Born 8/18/2026. Raised in our home, with our family.',
			'text'   => 'Selections begin after their first veterinary visit. Health always comes first.',
			'image'  => havenridge_demo_image('newborn'),
			'status' => 'current',
		),
		array(
			'kicker' => 'Fall 2027',
			'title'  => 'The next family litter',
			'lead'   => 'We only plan litters when the pairing and the timing feel right. Details will follow.',
			'text'   => '',
			'image'  => havenridge_demo_image('familyportrait'),
			'status' => 'planned',
		),
	);
}

function havenridge_demo_parents() {
	return array(
		array(
			'name'  => 'Mila',
			'role'  => 'The Mama',
			'size'  => '',
			'image' => havenridge_demo_image('mila'),
			'url'   => home_url('/meet-our-dogs/'),
			'bio'   => 'Mila is not simply one of our breeding dogs. She is part of our family. Affectionate, loving, intelligent, and happiest when she is close to her people.',
		),
		array(
			'name'  => 'Nico',
			'role'  => 'The Proud Papa',
			'size'  => '',
			'image' => havenridge_demo_image('nico'),
			'url'   => home_url('/meet-our-dogs/'),
			'bio'   => 'Nico brings personality everywhere he goes. Beautiful coloring, an affectionate temperament, and a happy heart.',
		),
		array(
			'name'  => 'Remy',
			'role'  => 'Chief Puppy Supervisor',
			'size'  => '',
			'image' => havenridge_demo_image('remy'),
			'url'   => home_url('/meet-our-dogs/'),
			'bio'   => 'Remy has not participated in the breeding plan yet, but he is certainly part of the family — and occasionally convinced that everything involves him.',
		),
	);
}

function havenridge_demo_household() {
	return array(
		array(
			'name'  => 'Chai',
			'role'  => 'The Tiny Boss',
			'breed' => 'Yorkie',
			'image' => havenridge_demo_image('chai'),
			'bio'   => 'Easily the smallest member of the family. Just don’t tell her that.',
		),
		array(
			'name'  => 'Lulu',
			'role'  => 'The Matriarch',
			'breed' => 'Shorkie',
			'image' => havenridge_demo_image('lulu'),
			'bio'   => 'Grandma of the house. She watches the younger dogs with an expression that says, “I would have handled that differently.”',
		),
		array(
			'name'  => 'Zoey',
			'role'  => 'The Sweet One',
			'breed' => 'Maltipoo',
			'image' => havenridge_demo_image('zoey'),
			'bio'   => 'Loving and affectionate — but once she and Remy get going, the rest of the house usually isn’t far behind.',
		),
	);
}

function havenridge_demo_faqs() {
	return array(
		array(
			'q' => 'Where are your puppies raised?',
			'a' => 'Every Stony Point puppy is raised inside our home, with our family — not in a kennel.',
		),
		array(
			'q' => 'Are you a kennel?',
			'a' => 'No. We are a small, family-based breeding program. Our breeding dogs are our pets first.',
		),
		array(
			'q' => 'How many litters do you have?',
			'a' => 'We keep the program small and only plan litters when the timing and pairing feel right.',
		),
		array(
			'q' => 'How do I reserve a puppy?',
			'a' => 'Start with our application. Approved families may then place a deposit to secure their position on the selection list.',
		),
		array(
			'q' => 'How is puppy selection order determined?',
			'a' => 'Selection order is based on application approval and the order in which deposits are received.',
		),
		array(
			'q' => 'When do families select their puppy?',
			'a' => 'We let them grow first. We also want puppies to receive their initial veterinary evaluation before selections begin. Health always comes first.',
		),
		array(
			'q' => 'Can I choose based on color?',
			'a' => 'Absolutely — appearance is part of it. We also encourage families to consider personality, temperament, energy, and overall fit.',
		),
		array(
			'q' => 'Can I visit the puppies?',
			'a' => 'Because the health of young puppies matters so much, visits may be limited in their earliest weeks. We’ll share visit details when the time is right.',
		),
		array(
			'q' => 'Do you stay in touch after the puppy goes home?',
			'a' => 'We certainly hope so. We love receiving updates. Puppy pickup does not have to be the end of our relationship.',
		),
	);
}

function havenridge_status_label($status) {
	$map = array(
		'available' => 'Available',
		'reserved'  => 'Reserved',
		'adopted'   => 'Adopted',
		'coming'    => 'Coming soon',
		'placed'    => 'Adopted',
	);
	return $map[ $status ] ?? ucfirst((string) $status);
}

function havenridge_current_url() {
	global $wp;
	if (isset($wp->request)) {
		return home_url(add_query_arg(array(), $wp->request));
	}
	return home_url('/');
}

function havenridge_block($slug) {
	$file = HAVENRIDGE_DIR . '/blocks/' . $slug . '/render.php';
	if (is_readable($file)) {
		include $file;
	}
}

function havenridge_has_page_blocks($post = null) {
	$post = get_post($post);
	if (!$post) {
		return false;
	}
	$content = $post->post_content ?? '';
	return $content && function_exists('has_blocks') && has_blocks($content);
}

function havenridge_logo_url() {
	return havenridge_asset('images/logo.png');
}

function havenridge_home_default() {
	foreach (array(
		'hero',
		'pillars',
		'love-letter',
		'family-dogs',
		'current-litter',
		'process',
		'faq',
		'cta-band',
	) as $slug) {
		havenridge_block($slug);
	}
}
