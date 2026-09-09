<?php
defined('ABSPATH') || exit;

$kicker = havenridge_field('kicker', 'The rest of the family');
$title  = havenridge_field('title', 'It takes a village to raise a doodle.');
$lead   = havenridge_field('lead', 'Mila, Nico and Remy get a lot of the attention. They are definitely not the only four-legged personalities running the household.');
$dogs   = havenridge_field('dogs');
if (empty($dogs)) {
	$dogs = havenridge_demo_household();
}
$close = havenridge_field('close', "They are our family. And that’s\nwhere every Stony Point puppy’s story begins.");
?>
<section class="hr-house" id="household">
	<header class="hr-section-head hr-reveal">
		<p class="hr-kicker"><?php echo esc_html($kicker); ?></p>
		<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
		<p class="hr-lead"><?php echo esc_html($lead); ?></p>
	</header>
	<div class="hr-house__grid">
		<?php foreach ($dogs as $i => $dog) :
			$img = is_string($dog['image'] ?? '') ? $dog['image'] : havenridge_image_url($dog['image'] ?? '');
			?>
			<article class="hr-reveal" style="--d: <?php echo (int) $i * 80; ?>ms">
				<img src="<?php echo esc_url($img ?: havenridge_demo_image('poodle')); ?>" alt="<?php echo esc_attr($dog['name'] ?? ''); ?>" loading="lazy">
				<p class="hr-kicker"><?php echo esc_html(($dog['breed'] ?? '') . (empty($dog['breed']) ? '' : ' · ') . ($dog['role'] ?? '')); ?></p>
				<h3><?php echo esc_html($dog['name'] ?? ''); ?></h3>
				<p><?php echo esc_html($dog['bio'] ?? ''); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
	<p class="hr-house__close hr-reveal"><?php echo nl2br(esc_html($close)); ?></p>
</section>
