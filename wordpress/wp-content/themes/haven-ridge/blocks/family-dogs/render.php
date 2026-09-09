<?php
defined('ABSPATH') || exit;

$on_home = function_exists('is_front_page') && is_front_page();
$kicker = havenridge_field('kicker', 'Meet our family');
$title  = havenridge_field('title', $on_home ? 'The dogs behind Stony Point' : 'The dogs behind Stony Point Doodles');
$lead   = havenridge_field('lead', $on_home ? '' : 'Our breeding dogs are our family dogs. They live with us, play with us, relax with us, and are loved members of our home.');
$dogs   = havenridge_field('dogs');
if (empty($dogs)) {
	$dogs = havenridge_demo_parents();
}
?>
<section class="hr-family hr-family--pack" id="meet-our-dogs">
	<?php if ($on_home) : ?>
	<header class="hr-section-head hr-reveal">
		<p class="hr-kicker"><?php echo esc_html($kicker); ?></p>
		<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
		<?php if ($lead) : ?><p class="hr-lead"><?php echo esc_html($lead); ?></p><?php endif; ?>
	</header>
	<?php else : ?>
	<header class="hr-section-head hr-reveal">
		<p class="hr-kicker">The dogs behind Stony Point</p>
		<h2 class="hr-h2">Mila, Nico &amp; Remy</h2>
	</header>
	<?php endif; ?>
	<div class="hr-family__grid">
		<?php foreach ($dogs as $i => $dog) :
			$img = is_string($dog['image'] ?? '') ? $dog['image'] : havenridge_image_url($dog['image'] ?? '');
			?>
			<article class="hr-family__card hr-reveal" style="--d: <?php echo (int) $i * 80; ?>ms">
				<img src="<?php echo esc_url($img ?: havenridge_demo_image('hero2')); ?>" alt="<?php echo esc_attr($dog['name'] ?? ''); ?>" loading="lazy">
				<p class="hr-kicker"><?php echo esc_html($dog['role'] ?? ''); ?></p>
				<h3><?php echo esc_html($dog['name'] ?? ''); ?></h3>
				<?php if (!$on_home && !empty($dog['bio'])) : ?><p><?php echo esc_html($dog['bio']); ?></p><?php endif; ?>
			</article>
		<?php endforeach; ?>
	</div>
	<?php if ($on_home) : ?>
	<p class="hr-more"><a class="hr-btn hr-btn--ghost" href="<?php echo esc_url(home_url('/meet-our-dogs/')); ?>">Meet the whole pack</a></p>
	<?php endif; ?>
</section>
