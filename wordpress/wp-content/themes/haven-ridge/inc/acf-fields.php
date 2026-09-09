<?php
/**
 * Local ACF field groups — blocks, options, and CPT fields.
 *
 * Editors see labeled fields in Gutenberg. No JSON import required.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

add_action('acf/init', function () {
	if (!function_exists('acf_add_local_field_group')) {
		return;
	}

	$block_location = function ($slug) {
		return array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/havenridge-' . $slug,
				),
			),
		);
	};

	$link = function ($key, $name, $label) {
		return array(
			'key'           => $key,
			'label'         => $label,
			'name'          => $name,
			'type'          => 'link',
			'return_format' => 'array',
		);
	};

	acf_add_local_field_group(array(
		'key'      => 'group_hr_hero',
		'title'    => 'Hero',
		'location' => $block_location('hero'),
		'fields'   => array(
			array('key' => 'field_hr_hero_kicker', 'label' => 'Kicker', 'name' => 'kicker', 'type' => 'text', 'default_value' => 'Family-raised Mini-Bernedoodles'),
			array('key' => 'field_hr_hero_title', 'label' => 'Title', 'name' => 'title', 'type' => 'textarea', 'rows' => 2, 'new_lines' => 'br', 'default_value' => "A quieter kind\nof companion."),
			array('key' => 'field_hr_hero_lead', 'label' => 'Lead', 'name' => 'lead', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Health-tested bloodlines, considered temperaments, and a coat meant for living with — raised in family homes across Texas.'),
			$link('field_hr_hero_btn1', 'primary_button', 'Primary button'),
			$link('field_hr_hero_btn2', 'secondary_button', 'Secondary button'),
			array('key' => 'field_hr_hero_image', 'label' => 'Hero image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
			array('key' => 'field_hr_hero_aside', 'label' => 'Photo caption', 'name' => 'caption', 'type' => 'text', 'default_value' => 'Standard Ultra · Dallas program'),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_stats',
		'title'    => 'Stats',
		'location' => $block_location('stats'),
		'fields'   => array(
			array(
				'key'          => 'field_hr_stats',
				'label'        => 'Stats',
				'name'         => 'stats',
				'type'         => 'repeater',
				'layout'       => 'table',
				'min'          => 1,
				'max'          => 6,
				'button_label' => 'Add stat',
				'sub_fields'   => array(
					array('key' => 'field_hr_stat_value', 'label' => 'Value', 'name' => 'value', 'type' => 'text'),
					array('key' => 'field_hr_stat_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text'),
					array('key' => 'field_hr_stat_note', 'label' => 'Note', 'name' => 'note', 'type' => 'text'),
				),
			),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_split',
		'title'    => 'Split story',
		'location' => $block_location('split-story'),
		'fields'   => array(
			array('key' => 'field_hr_split_kicker', 'label' => 'Kicker', 'name' => 'kicker', 'type' => 'text'),
			array('key' => 'field_hr_split_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'),
			array('key' => 'field_hr_split_body', 'label' => 'Body', 'name' => 'body', 'type' => 'wysiwyg', 'tabs' => 'visual', 'toolbar' => 'basic', 'media_upload' => 0),
			$link('field_hr_split_btn', 'button', 'Button'),
			array('key' => 'field_hr_split_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array'),
			array(
				'key'           => 'field_hr_split_flip',
				'label'         => 'Image on the right',
				'name'          => 'image_right',
				'type'          => 'true_false',
				'ui'            => 1,
				'default_value' => 1,
			),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_values',
		'title'    => 'Values',
		'location' => $block_location('values'),
		'fields'   => array(
			array('key' => 'field_hr_values_kicker', 'label' => 'Kicker', 'name' => 'kicker', 'type' => 'text', 'default_value' => 'The program'),
			array('key' => 'field_hr_values_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'What we refuse to compromise.'),
			array(
				'key'          => 'field_hr_values_items',
				'label'        => 'Cards',
				'name'         => 'items',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add card',
				'sub_fields'   => array(
					array('key' => 'field_hr_val_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'),
					array('key' => 'field_hr_val_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 3),
				),
			),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_pups',
		'title'    => 'Featured puppies',
		'location' => $block_location('featured-puppies'),
		'fields'   => array(
			array('key' => 'field_hr_pups_kicker', 'label' => 'Kicker', 'name' => 'kicker', 'type' => 'text', 'default_value' => 'Available now'),
			array('key' => 'field_hr_pups_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Puppies ready to meet their people.'),
			array('key' => 'field_hr_pups_lead', 'label' => 'Lead', 'name' => 'lead', 'type' => 'textarea', 'rows' => 2),
			$link('field_hr_pups_btn', 'button', 'View all button'),
			array(
				'key'           => 'field_hr_pups_source',
				'label'         => 'Source',
				'name'          => 'source',
				'type'          => 'select',
				'choices'       => array(
					'query'  => 'Latest puppies (CPT)',
					'manual' => 'Manual cards below',
				),
				'default_value' => 'query',
			),
			array(
				'key'          => 'field_hr_pups_cards',
				'label'        => 'Manual cards',
				'name'         => 'cards',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add puppy card',
				'conditional_logic' => array(array(array('field' => 'field_hr_pups_source', 'operator' => '==', 'value' => 'manual'))),
				'sub_fields'   => array(
					array('key' => 'field_hr_pc_name', 'label' => 'Name', 'name' => 'name', 'type' => 'text'),
					array('key' => 'field_hr_pc_gender', 'label' => 'Gender', 'name' => 'gender', 'type' => 'text'),
					array('key' => 'field_hr_pc_size', 'label' => 'Size', 'name' => 'size', 'type' => 'text'),
					array('key' => 'field_hr_pc_color', 'label' => 'Color', 'name' => 'color', 'type' => 'text'),
					array('key' => 'field_hr_pc_price', 'label' => 'Price', 'name' => 'price', 'type' => 'text'),
					array('key' => 'field_hr_pc_status', 'label' => 'Status', 'name' => 'status', 'type' => 'select', 'choices' => array('available' => 'Available', 'reserved' => 'Reserved', 'adopted' => 'Adopted')),
					array('key' => 'field_hr_pc_weight', 'label' => 'Est. weight', 'name' => 'weight', 'type' => 'text'),
					array('key' => 'field_hr_pc_dob', 'label' => 'DOB', 'name' => 'dob', 'type' => 'text'),
					array('key' => 'field_hr_pc_collar', 'label' => 'Collar', 'name' => 'collar', 'type' => 'text'),
					array('key' => 'field_hr_pc_image', 'label' => 'Photo', 'name' => 'image', 'type' => 'image', 'return_format' => 'array'),
					$link('field_hr_pc_link', 'link', 'Link'),
				),
			),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_litters',
		'title'    => 'Litters',
		'location' => $block_location('litters'),
		'fields'   => array(
			array('key' => 'field_hr_lit_kicker', 'label' => 'Kicker', 'name' => 'kicker', 'type' => 'text', 'default_value' => 'We are expecting'),
			array('key' => 'field_hr_lit_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Upcoming litters, planned with intention.'),
			array(
				'key'          => 'field_hr_lit_items',
				'label'        => 'Litters',
				'name'         => 'items',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add litter',
				'sub_fields'   => array(
					array('key' => 'field_hr_li_title', 'label' => 'Pairing', 'name' => 'title', 'type' => 'text'),
					array('key' => 'field_hr_li_size', 'label' => 'Size', 'name' => 'size', 'type' => 'text'),
					array('key' => 'field_hr_li_born', 'label' => 'Born', 'name' => 'born', 'type' => 'text'),
					array('key' => 'field_hr_li_home', 'label' => 'Go-home window', 'name' => 'go_home', 'type' => 'text'),
					array('key' => 'field_hr_li_loc', 'label' => 'Location', 'name' => 'location', 'type' => 'text'),
					array('key' => 'field_hr_li_status', 'label' => 'Status', 'name' => 'status', 'type' => 'text'),
					array('key' => 'field_hr_li_pups', 'label' => 'Pups', 'name' => 'pups', 'type' => 'text'),
				),
			),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_parents_b',
		'title'    => 'Parents block',
		'location' => $block_location('parents'),
		'fields'   => array(
			array('key' => 'field_hr_par_kicker', 'label' => 'Kicker', 'name' => 'kicker', 'type' => 'text', 'default_value' => 'The dogs behind the puppies'),
			array('key' => 'field_hr_par_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Meet the dams and sires.'),
			array('key' => 'field_hr_par_lead', 'label' => 'Lead', 'name' => 'lead', 'type' => 'textarea', 'rows' => 2),
			$link('field_hr_par_btn', 'button', 'Button'),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_process',
		'title'    => 'Process',
		'location' => $block_location('process'),
		'fields'   => array(
			array('key' => 'field_hr_pr_kicker', 'label' => 'Kicker', 'name' => 'kicker', 'type' => 'text', 'default_value' => 'How it works'),
			array('key' => 'field_hr_pr_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'A calm path from first note to go-home day.'),
			array(
				'key'          => 'field_hr_pr_steps',
				'label'        => 'Steps',
				'name'         => 'steps',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add step',
				'sub_fields'   => array(
					array('key' => 'field_hr_pr_st_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'),
					array('key' => 'field_hr_pr_st_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 3),
				),
			),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_testimonials',
		'title'    => 'Testimonials',
		'location' => $block_location('testimonials'),
		'fields'   => array(
			array('key' => 'field_hr_te_kicker', 'label' => 'Kicker', 'name' => 'kicker', 'type' => 'text', 'default_value' => 'Families'),
			array('key' => 'field_hr_te_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'They came for a puppy. They stayed for the care.'),
			array(
				'key'          => 'field_hr_te_items',
				'label'        => 'Quotes',
				'name'         => 'items',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add quote',
				'sub_fields'   => array(
					array('key' => 'field_hr_te_quote', 'label' => 'Quote', 'name' => 'quote', 'type' => 'textarea', 'rows' => 4),
					array('key' => 'field_hr_te_name', 'label' => 'Name', 'name' => 'name', 'type' => 'text'),
					array('key' => 'field_hr_te_meta', 'label' => 'Meta', 'name' => 'meta', 'type' => 'text', 'instructions' => 'e.g. Mini-Bernedoodle · Austin'),
				),
			),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_faq',
		'title'    => 'FAQ',
		'location' => $block_location('faq'),
		'fields'   => array(
			array('key' => 'field_hr_faq_kicker', 'label' => 'Kicker', 'name' => 'kicker', 'type' => 'text', 'default_value' => 'Questions'),
			array('key' => 'field_hr_faq_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Straightforward answers.'),
			array(
				'key'          => 'field_hr_faq_items',
				'label'        => 'Questions',
				'name'         => 'items',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add question',
				'sub_fields'   => array(
					array('key' => 'field_hr_faq_q', 'label' => 'Question', 'name' => 'question', 'type' => 'text'),
					array('key' => 'field_hr_faq_a', 'label' => 'Answer', 'name' => 'answer', 'type' => 'wysiwyg', 'tabs' => 'visual', 'toolbar' => 'basic', 'media_upload' => 0),
				),
			),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_blog',
		'title'    => 'Blog teaser',
		'location' => $block_location('blog-teaser'),
		'fields'   => array(
			array('key' => 'field_hr_blog_kicker', 'label' => 'Kicker', 'name' => 'kicker', 'type' => 'text', 'default_value' => 'Knowledgebase'),
			array('key' => 'field_hr_blog_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Quiet guidance for first-time doodle families.'),
			$link('field_hr_blog_btn', 'button', 'Button'),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_cta',
		'title'    => 'Waitlist CTA',
		'location' => $block_location('cta-band'),
		'fields'   => array(
			array('key' => 'field_hr_cta_kicker', 'label' => 'Kicker', 'name' => 'kicker', 'type' => 'text', 'default_value' => 'Don’t miss a pairing'),
			array('key' => 'field_hr_cta_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Join the waitlist. We’ll walk you through the rest.'),
			array('key' => 'field_hr_cta_lead', 'label' => 'Lead', 'name' => 'lead', 'type' => 'textarea', 'rows' => 2),
			$link('field_hr_cta_btn1', 'primary_button', 'Primary button'),
			$link('field_hr_cta_btn2', 'secondary_button', 'Secondary button'),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_pagehero',
		'title'    => 'Page hero',
		'location' => $block_location('page-hero'),
		'fields'   => array(
			array('key' => 'field_hr_ph_kicker', 'label' => 'Kicker', 'name' => 'kicker', 'type' => 'text'),
			array('key' => 'field_hr_ph_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'),
			array('key' => 'field_hr_ph_lead', 'label' => 'Lead', 'name' => 'lead', 'type' => 'textarea', 'rows' => 3),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_contact',
		'title'    => 'Contact',
		'location' => $block_location('contact'),
		'fields'   => array(
			array('key' => 'field_hr_co_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Tell us about the companion you hope for.'),
			array('key' => 'field_hr_co_lead', 'label' => 'Lead', 'name' => 'lead', 'type' => 'textarea', 'rows' => 3),
			array('key' => 'field_hr_co_shortcode', 'label' => 'Form shortcode (optional)', 'name' => 'form_shortcode', 'type' => 'text', 'instructions' => 'Paste a Contact Form 7 / WPForms shortcode. Leave empty to use the built-in interest form.'),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_gallery',
		'title'    => 'Gallery',
		'location' => $block_location('gallery'),
		'fields'   => array(
			array('key' => 'field_hr_ga_kicker', 'label' => 'Kicker', 'name' => 'kicker', 'type' => 'text'),
			array('key' => 'field_hr_ga_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'),
			array('key' => 'field_hr_ga_images', 'label' => 'Images', 'name' => 'images', 'type' => 'gallery', 'return_format' => 'array', 'preview_size' => 'medium'),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_rich',
		'title'    => 'Rich content',
		'location' => $block_location('rich-content'),
		'fields'   => array(
			array('key' => 'field_hr_rich_body', 'label' => 'Content', 'name' => 'body', 'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'full', 'media_upload' => 1),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_options',
		'title'    => 'Site settings',
		'location' => array(array(array('param' => 'options_page', 'operator' => '==', 'value' => 'havenridge-settings'))),
		'fields'   => array(
			array('key' => 'field_hr_opt_announce', 'label' => 'Announcement bar', 'name' => 'announcement', 'type' => 'text', 'default_value' => 'Merle & tri-color Mini litters selecting this month'),
			array('key' => 'field_hr_opt_phone', 'label' => 'Phone', 'name' => 'phone', 'type' => 'text'),
			array('key' => 'field_hr_opt_email', 'label' => 'Email', 'name' => 'email', 'type' => 'email'),
			array('key' => 'field_hr_opt_hours', 'label' => 'Hours', 'name' => 'hours', 'type' => 'text'),
			array('key' => 'field_hr_opt_locations', 'label' => 'Locations', 'name' => 'locations', 'type' => 'text'),
			array('key' => 'field_hr_opt_ig', 'label' => 'Instagram', 'name' => 'instagram', 'type' => 'url'),
			array('key' => 'field_hr_opt_fb', 'label' => 'Facebook', 'name' => 'facebook', 'type' => 'url'),
			array('key' => 'field_hr_opt_apply', 'label' => 'Puppy application page URL', 'name' => 'application_url', 'type' => 'url'),
			array('key' => 'field_hr_opt_form_apply', 'label' => '123FormBuilder — Apply form ID or URL', 'name' => 'form_apply', 'type' => 'text', 'instructions' => 'Example: 5879364 or the full form URL. One form for the puppy application.'),
			array('key' => 'field_hr_opt_form_hello', 'label' => '123FormBuilder — Contact / waitlist form ID or URL', 'name' => 'form_hello', 'type' => 'text', 'instructions' => 'Same form on Contact and Waitlist. Add a dropdown: I have a question / Join the waitlist.'),
		),
	));

	$puppy_fields = array(
		array(
			'key'           => 'field_hr_puppy_status',
			'label'         => 'Status',
			'name'          => 'status',
			'type'          => 'select',
			'choices'       => array('available' => 'Available', 'reserved' => 'Reserved', 'adopted' => 'Adopted'),
			'default_value' => 'available',
		),
		array('key' => 'field_hr_puppy_gender', 'label' => 'Gender', 'name' => 'gender', 'type' => 'select', 'choices' => array('Male' => 'Male', 'Female' => 'Female')),
		array('key' => 'field_hr_puppy_price', 'label' => 'Price', 'name' => 'price', 'type' => 'text'),
		array('key' => 'field_hr_puppy_weight', 'label' => 'Estimated adult weight', 'name' => 'weight', 'type' => 'text'),
		array('key' => 'field_hr_puppy_dob', 'label' => 'Date of birth', 'name' => 'dob', 'type' => 'text'),
		array('key' => 'field_hr_puppy_home', 'label' => 'Take-home window', 'name' => 'take_home', 'type' => 'text'),
		array('key' => 'field_hr_puppy_collar', 'label' => 'Collar color', 'name' => 'collar', 'type' => 'text'),
		array('key' => 'field_hr_puppy_generation', 'label' => 'Generation', 'name' => 'generation', 'type' => 'text', 'instructions' => 'F1, Multigen, Ultra…'),
		array('key' => 'field_hr_puppy_personality', 'label' => 'Personality notes', 'name' => 'personality', 'type' => 'textarea', 'rows' => 3),
		array('key' => 'field_hr_puppy_litter', 'label' => 'Litter', 'name' => 'litter', 'type' => 'post_object', 'post_type' => array('litter'), 'return_format' => 'object', 'allow_null' => 1),
		array('key' => 'field_hr_puppy_gallery', 'label' => 'Gallery', 'name' => 'gallery', 'type' => 'gallery', 'return_format' => 'array'),
	);

	acf_add_local_field_group(array(
		'key'      => 'group_hr_puppy',
		'title'    => 'Puppy details',
		'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'puppy'))),
		'fields'   => $puppy_fields,
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_litter',
		'title'    => 'Litter details',
		'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'litter'))),
		'fields'   => array(
			array('key' => 'field_hr_litter_size', 'label' => 'Estimated adult size', 'name' => 'size', 'type' => 'text'),
			array('key' => 'field_hr_litter_born', 'label' => 'Born', 'name' => 'born', 'type' => 'text'),
			array('key' => 'field_hr_litter_home', 'label' => 'Go-home window', 'name' => 'go_home', 'type' => 'text'),
			array('key' => 'field_hr_litter_loc', 'label' => 'Location', 'name' => 'location', 'type' => 'text'),
			array('key' => 'field_hr_litter_status', 'label' => 'Status', 'name' => 'status', 'type' => 'text'),
			array('key' => 'field_hr_litter_pups', 'label' => 'Pups summary', 'name' => 'pups', 'type' => 'text'),
			array('key' => 'field_hr_litter_dam', 'label' => 'Dam', 'name' => 'dam', 'type' => 'post_object', 'post_type' => array('parent_dog'), 'return_format' => 'object', 'allow_null' => 1),
			array('key' => 'field_hr_litter_sire', 'label' => 'Sire', 'name' => 'sire', 'type' => 'post_object', 'post_type' => array('parent_dog'), 'return_format' => 'object', 'allow_null' => 1),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_parent',
		'title'    => 'Parent dog details',
		'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'parent_dog'))),
		'fields'   => array(
			array('key' => 'field_hr_parent_role', 'label' => 'Role', 'name' => 'role', 'type' => 'select', 'choices' => array('The Mama' => 'The Mama', 'The Proud Papa' => 'The Proud Papa', 'Chief Puppy Supervisor' => 'Chief Puppy Supervisor', 'Household' => 'Household', 'Dam' => 'Dam', 'Sire' => 'Sire')),
			array('key' => 'field_hr_parent_size', 'label' => 'Size / breed', 'name' => 'size', 'type' => 'text'),
			array('key' => 'field_hr_parent_bio', 'label' => 'Short bio', 'name' => 'bio', 'type' => 'textarea', 'rows' => 4),
			array('key' => 'field_hr_parent_color', 'label' => 'Color', 'name' => 'color', 'type' => 'text'),
			array('key' => 'field_hr_parent_gallery', 'label' => 'Gallery', 'name' => 'gallery', 'type' => 'gallery', 'return_format' => 'array'),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_current_litter',
		'title'    => 'Current litter',
		'location' => $block_location('current-litter'),
		'fields'   => array(
			array('key' => 'field_hr_cl_kicker', 'label' => 'Kicker', 'name' => 'kicker', 'type' => 'text'),
			array('key' => 'field_hr_cl_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'),
			array('key' => 'field_hr_cl_born', 'label' => 'Born date', 'name' => 'born', 'type' => 'text'),
			array('key' => 'field_hr_cl_lead', 'label' => 'Lead', 'name' => 'lead', 'type' => 'textarea', 'rows' => 4),
			array('key' => 'field_hr_cl_count', 'label' => 'Puppies born', 'name' => 'count', 'type' => 'text'),
			array('key' => 'field_hr_cl_males', 'label' => 'Males', 'name' => 'males', 'type' => 'text'),
			array('key' => 'field_hr_cl_females', 'label' => 'Females', 'name' => 'females', 'type' => 'text'),
			array('key' => 'field_hr_cl_note', 'label' => 'Selection note', 'name' => 'note', 'type' => 'text'),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_pillars',
		'title'    => 'Pillars',
		'location' => $block_location('pillars'),
		'fields'   => array(
			array(
				'key'          => 'field_hr_pillars_items',
				'label'        => 'Pillars',
				'name'         => 'items',
				'type'         => 'repeater',
				'layout'       => 'block',
				'max'          => 4,
				'sub_fields'   => array(
					array('key' => 'field_hr_pil_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'),
					array('key' => 'field_hr_pil_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 3),
				),
			),
		),
	));

	acf_add_local_field_group(array(
		'key'      => 'group_hr_apply_block',
		'title'    => 'Application CTA',
		'location' => $block_location('apply'),
		'fields'   => array(
			array('key' => 'field_hr_ap_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'),
			array('key' => 'field_hr_ap_lead', 'label' => 'Lead', 'name' => 'lead', 'type' => 'textarea', 'rows' => 4),
			array('key' => 'field_hr_ap_note', 'label' => 'Fine print', 'name' => 'note', 'type' => 'textarea', 'rows' => 3),
			array('key' => 'field_hr_ap_url', 'label' => 'Form URL override', 'name' => 'form_url', 'type' => 'url'),
		),
	));
});
