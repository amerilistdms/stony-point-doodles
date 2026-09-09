<?php
defined('ABSPATH') || exit;

$title = havenridge_field('title', "Healthy puppies.\nLoving homes.");
$lead  = havenridge_field('lead', 'Family raised doodle puppies, raised with love from the very beginning.');
$btn1  = havenridge_field('primary_button');
$btn2  = havenridge_field('secondary_button');
$image = havenridge_image_url(havenridge_field('image')) ?: havenridge_demo_image('hero');
?>
<section class="hr-hero hr-hero--splash hr-hero--banner" id="top" style="--hero-image: url('<?php echo esc_url($image); ?>')">
	<img class="hr-hero__photo" src="<?php echo esc_url($image); ?>" alt="Three Stony Point doodle puppies">
	<div class="hr-hero__inner">
		<div class="hr-hero__copy">
			<h1 class="hr-display"><?php echo wp_kses(nl2br(esc_html($title)), array('br' => array())); ?></h1>
			<p class="hr-script">Lifelong friends</p>
			<?php if ($lead) : ?>
				<p class="hr-lead"><?php echo esc_html($lead); ?></p>
			<?php endif; ?>
			<div class="hr-actions">
				<a class="hr-btn hr-btn--solid" href="<?php echo esc_url(havenridge_link_url($btn1, home_url('/our-puppies/'))); ?>">
					<?php echo esc_html(havenridge_link_title($btn1, 'View available puppies')); ?>
				</a>
				<a class="hr-btn hr-btn--ghost" href="<?php echo esc_url(havenridge_link_url($btn2, havenridge_apply_url())); ?>">
					<?php echo esc_html(havenridge_link_title($btn2, 'Apply for a puppy')); ?>
				</a>
			</div>
		</div>
	</div>
</section>
