<?php
/**
 * Featured puppies.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

$kicker = havenridge_field('kicker', 'This litter');
$title  = havenridge_field('title', 'Meet the puppies');
$lead   = havenridge_field('lead', 'Personalities are still unfolding. We’ll share more as they grow.');
$source = havenridge_field('source', 'query');
$cards  = array();

if ($source === 'manual') {
	$manual = havenridge_field('cards');
	if (is_array($manual)) {
		$cards = $manual;
	}
} else {
	$query = new WP_Query(array(
		'post_type'      => 'puppy',
		'posts_per_page' => 12,
		'post_status'    => 'publish',
	));
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$terms_size  = wp_get_post_terms(get_the_ID(), 'puppy_size', array('fields' => 'names'));
			$terms_color = wp_get_post_terms(get_the_ID(), 'coat_color', array('fields' => 'names'));
			$cards[] = array(
				'name'      => get_the_title(),
				'gender'    => havenridge_field('gender', '', get_the_ID()),
				'size'      => $terms_size[0] ?? '',
				'color'     => $terms_color[0] ?? '',
				'status'    => havenridge_field('status', 'available', get_the_ID()),
				'weight'    => havenridge_field('weight', '', get_the_ID()),
				'note'      => havenridge_field('personality', '', get_the_ID()),
				'image_url' => get_the_post_thumbnail_url(get_the_ID(), 'havenridge-card') ?: havenridge_demo_image('puppy1'),
				'permalink' => get_permalink(),
			);
		}
		wp_reset_postdata();
	}
}

if (empty($cards)) {
	$cards = havenridge_demo_puppies();
}
?>
<section class="hr-puppies" id="available">
	<header class="hr-section-head hr-reveal">
		<p class="hr-kicker"><?php echo esc_html($kicker); ?></p>
		<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
		<?php if ($lead) : ?><p class="hr-lead"><?php echo esc_html($lead); ?></p><?php endif; ?>
	</header>

	<div class="hr-filters" data-filter-group>
		<button class="is-on" type="button" data-filter="all">All</button>
		<button type="button" data-filter="available">Available</button>
		<button type="button" data-filter="reserved">Reserved</button>
		<button type="button" data-filter="adopted">Adopted</button>
	</div>

	<div class="hr-cards">
		<?php foreach ($cards as $i => $puppy) : ?>
			<?php include HAVENRIDGE_DIR . '/parts/puppy-card.php'; ?>
		<?php endforeach; ?>
	</div>
</section>
