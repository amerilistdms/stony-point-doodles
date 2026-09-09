<?php
/**
 * Gallery.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

$kicker = havenridge_field('kicker', 'Life at Stony Point');
$title  = havenridge_field('title', 'Before they’re part of your family, they’re part of ours.');
$images = havenridge_field('images');
if (empty($images)) {
	$images = array(
		array('url' => havenridge_demo_image('puppy1'), 'alt' => ''),
		array('url' => havenridge_demo_image('puppy2'), 'alt' => ''),
		array('url' => havenridge_demo_image('bernese'), 'alt' => ''),
		array('url' => havenridge_demo_image('hero2'), 'alt' => ''),
		array('url' => havenridge_demo_image('poodle'), 'alt' => ''),
		array('url' => havenridge_demo_image('family'), 'alt' => ''),
	);
}
?>
<section class="hr-gallery">
	<header class="hr-section-head hr-reveal">
		<p class="hr-kicker"><?php echo esc_html($kicker); ?></p>
		<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
	</header>
	<div class="hr-gallery__grid">
		<?php foreach ($images as $image) :
			$url = havenridge_image_url($image) ?: ($image['url'] ?? '');
			if (!$url) {
				continue;
			}
			?>
			<figure>
				<img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr(havenridge_image_alt($image)); ?>" loading="lazy">
			</figure>
		<?php endforeach; ?>
	</div>
</section>
