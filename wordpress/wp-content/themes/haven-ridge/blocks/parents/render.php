<?php
/**
 * Parents row.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

$kicker = havenridge_field('kicker', 'The dogs behind the puppies');
$title  = havenridge_field('title', 'Meet the dams and sires.');
$lead   = havenridge_field('lead', 'Each parent lives as a forever pet in a vetted guardian home. Happy dogs, considered pairings.');
$btn    = havenridge_field('button');

$parents = array();
$query = new WP_Query(array(
	'post_type'      => 'parent_dog',
	'posts_per_page' => 8,
	'post_status'    => 'publish',
));
if ($query->have_posts()) {
	while ($query->have_posts()) {
		$query->the_post();
		$parents[] = array(
			'name'  => get_the_title(),
			'role'  => havenridge_field('role', '', get_the_ID()),
			'size'  => havenridge_field('size', '', get_the_ID()),
			'image' => get_the_post_thumbnail_url(get_the_ID(), 'havenridge-square') ?: havenridge_demo_image('portrait'),
			'url'   => get_permalink(),
		);
	}
	wp_reset_postdata();
}
if (empty($parents)) {
	$parents = havenridge_demo_parents();
}
?>
<section class="hr-parents">
	<header class="hr-section-head hr-section-head--row hr-reveal">
		<div>
			<p class="hr-kicker"><?php echo esc_html($kicker); ?></p>
			<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
			<?php if ($lead) : ?><p class="hr-lead"><?php echo esc_html($lead); ?></p><?php endif; ?>
		</div>
		<a class="hr-btn hr-btn--ghost" href="<?php echo esc_url(havenridge_link_url($btn, get_post_type_archive_link('parent_dog') ?: home_url('/parents/'))); ?>">
			<?php echo esc_html(havenridge_link_title($btn, 'All puppy parents')); ?>
		</a>
	</header>
	<div class="hr-parents__scroller" tabindex="0">
		<?php foreach ($parents as $parent) : ?>
			<a class="hr-parent" href="<?php echo esc_url($parent['url'] ?? '#'); ?>">
				<img src="<?php echo esc_url(is_string($parent['image'] ?? '') ? $parent['image'] : havenridge_image_url($parent['image'] ?? '')); ?>" alt="<?php echo esc_attr($parent['name']); ?>" loading="lazy" width="400" height="480">
				<div>
					<p class="hr-parent__role"><?php echo esc_html(trim(($parent['role'] ?? '') . ' · ' . ($parent['size'] ?? ''), ' ·')); ?></p>
					<h3><?php echo esc_html($parent['name']); ?></h3>
				</div>
			</a>
		<?php endforeach; ?>
	</div>
</section>
