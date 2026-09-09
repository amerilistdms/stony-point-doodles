<?php
/**
 * Register ACF Gutenberg blocks.
 *
 * Editors assemble every page from these blocks — same idea as Amerilist
 * flexible layouts, native to the block editor.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

function havenridge_blocks() {
	return array(
		'hero' => array(
			'title'       => 'Stony Point — Hero',
			'description' => 'Full-width family photo, headline, and application buttons.',
			'icon'        => 'cover-image',
			'keywords'    => array('hero', 'banner', 'home'),
		),
		'pillars' => array(
			'title'       => 'Stony Point — Four pillars',
			'description' => 'Small by choice, raised in our home, thoughtfully bred, loved from day one.',
			'icon'        => 'grid-view',
			'keywords'    => array('pillars', 'values'),
		),
		'current-litter' => array(
			'title'       => 'Stony Point — Current litter',
			'description' => 'Mila & Nico announcement, born date, availability counts.',
			'icon'        => 'buddicons-activity',
			'keywords'    => array('litter', 'available', 'born'),
		),
		'family-dogs' => array(
			'title'       => 'Stony Point — Mila, Nico & Remy',
			'description' => 'The three dogs behind the program, with bios.',
			'icon'        => 'groups',
			'keywords'    => array('mila', 'nico', 'remy', 'parents'),
		),
		'love-letter' => array(
			'title'       => 'Stony Point — More than a puppy',
			'description' => 'Emotional copy band about placing puppies with families.',
			'icon'        => 'heart',
			'keywords'    => array('promise', 'family'),
		),
		'household' => array(
			'title'       => 'Stony Point — Rest of the family',
			'description' => 'Chai, Lulu, and Zoey — the household dogs.',
			'icon'        => 'pets',
			'keywords'    => array('chai', 'lulu', 'zoey', 'family'),
		),
		'waitlist' => array(
			'title'       => 'Stony Point — Waitlist form',
			'description' => 'Name, email, phone, puppy type.',
			'icon'        => 'email-alt',
			'keywords'    => array('waitlist', 'form'),
		),
		'apply' => array(
			'title'       => 'Stony Point — Application CTA',
			'description' => 'Links out to the Google Form.',
			'icon'        => 'yes-alt',
			'keywords'    => array('apply', 'google form'),
		),
		'stats' => array(
			'title'       => 'Stony Point — Stats',
			'description' => 'Four editorial figures (families, sizes, guarantee…).',
			'icon'        => 'chart-bar',
			'keywords'    => array('stats', 'numbers'),
		),
		'split-story' => array(
			'title'       => 'Stony Point — Split story',
			'description' => 'Photo + copy. Flip image left/right from the sidebar.',
			'icon'        => 'align-pull-left',
			'keywords'    => array('about', 'story', 'image'),
		),
		'values' => array(
			'title'       => 'Stony Point — Values grid',
			'description' => 'Health, temperament, coat — three to six cards.',
			'icon'        => 'grid-view',
			'keywords'    => array('values', 'features'),
		),
		'featured-puppies' => array(
			'title'       => 'Stony Point — Featured puppies',
			'description' => 'Filterable puppy cards. Pulls from the Puppies CPT or a manual list.',
			'icon'        => 'pets',
			'keywords'    => array('puppies', 'available', 'litter'),
		),
		'litters' => array(
			'title'       => 'Stony Point — Upcoming litters',
			'description' => 'Timeline of upcoming or selecting litters.',
			'icon'        => 'calendar-alt',
			'keywords'    => array('litters', 'upcoming'),
		),
		'parents' => array(
			'title'       => 'Stony Point — Puppy parents',
			'description' => 'Horizontal gallery of dams and sires.',
			'icon'        => 'groups',
			'keywords'    => array('parents', 'dams', 'sires'),
		),
		'process' => array(
			'title'       => 'Stony Point — Process steps',
			'description' => 'How bringing a puppy home actually works.',
			'icon'        => 'editor-ol',
			'keywords'    => array('process', 'steps'),
		),
		'testimonials' => array(
			'title'       => 'Stony Point — Testimonials',
			'description' => 'Quote carousel from families.',
			'icon'        => 'format-quote',
			'keywords'    => array('reviews', 'quotes'),
		),
		'faq' => array(
			'title'       => 'Stony Point — FAQ',
			'description' => 'Accordion questions. Add, edit, reorder in the sidebar.',
			'icon'        => 'editor-help',
			'keywords'    => array('faq', 'questions'),
		),
		'blog-teaser' => array(
			'title'       => 'Stony Point — Blog teaser',
			'description' => 'Latest posts from the Knowledgebase.',
			'icon'        => 'welcome-write-blog',
			'keywords'    => array('blog', 'news'),
		),
		'cta-band' => array(
			'title'       => 'Stony Point — Waitlist CTA',
			'description' => 'Closing band with waitlist / contact buttons.',
			'icon'        => 'megaphone',
			'keywords'    => array('cta', 'waitlist'),
		),
		'page-hero' => array(
			'title'       => 'Stony Point — Page hero',
			'description' => 'Shorter interior-page header.',
			'icon'        => 'heading',
			'keywords'    => array('header', 'interior'),
		),
		'contact' => array(
			'title'       => 'Stony Point — Contact',
			'description' => 'Details + interest form (or a shortcode).',
			'icon'        => 'email',
			'keywords'    => array('contact', 'form'),
		),
		'gallery' => array(
			'title'       => 'Stony Point — Gallery',
			'description' => 'Editorial photo grid.',
			'icon'        => 'format-gallery',
			'keywords'    => array('photos', 'gallery'),
		),
		'rich-content' => array(
			'title'       => 'Stony Point — Rich content',
			'description' => 'WYSIWYG section for one-off copy.',
			'icon'        => 'editor-paragraph',
			'keywords'    => array('text', 'content'),
		),
	);
}

add_action('acf/init', function () {
	if (!function_exists('acf_register_block_type')) {
		return;
	}

	foreach (havenridge_blocks() as $slug => $block) {
		acf_register_block_type(array(
			'name'            => 'havenridge-' . $slug,
			'title'           => $block['title'],
			'description'     => $block['description'],
			'category'        => 'havenridge',
			'icon'            => $block['icon'],
			'keywords'        => $block['keywords'],
			'mode'            => 'preview',
			'supports'        => array(
				'align'  => array('wide', 'full'),
				'anchor' => true,
				'mode'   => true,
			),
			'render_template' => 'blocks/' . $slug . '/render.php',
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array('is_preview' => true),
				),
			),
		));
	}
});

add_filter('block_categories_all', function ($categories) {
	array_unshift($categories, array(
		'slug'  => 'havenridge',
		'title' => 'Stony Point',
		'icon'  => 'heart',
	));
	return $categories;
});
