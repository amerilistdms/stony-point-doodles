<?php
defined('ABSPATH') || exit;

$kicker = havenridge_field('kicker', 'Welcome to the Stony Point family');
$title  = havenridge_field('title', 'Raised in our home. Loved from day one.');
$body   = havenridge_field('body', '<p>There is a big difference between simply breeding puppies and truly raising them.</p><p>Every litter is born and raised inside our home. They hear household sounds, meet people, and grow up surrounded by affection — not a row of kennels.</p><p>Our goal is not to produce as many puppies as possible. It is to raise a small number of exceptional puppies and place each one with a family who will love them for the rest of their lives.</p>');
$btn    = havenridge_field('button');
$image  = havenridge_image_url(havenridge_field('image')) ?: havenridge_demo_image('nico3');
$right  = havenridge_field('image_right', true);
?>
<section class="hr-split <?php echo $right ? 'hr-split--image-right' : ''; ?>">
	<figure class="hr-split__media hr-reveal">
		<img src="<?php echo esc_url($image); ?>" alt="" loading="lazy" width="900" height="1100">
	</figure>
	<div class="hr-split__copy hr-reveal" style="--d:100ms">
		<p class="hr-kicker"><?php echo esc_html($kicker); ?></p>
		<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
		<div class="hr-prose"><?php echo wp_kses_post($body); ?></div>
		<?php if (!is_page_template('templates/page-about.php')) : ?>
		<a class="hr-btn hr-btn--solid" href="<?php echo esc_url(havenridge_link_url($btn, home_url('/our-story/'))); ?>">
			<?php echo esc_html(havenridge_link_title($btn, 'Our story')); ?>
		</a>
		<?php endif; ?>
	</div>
</section>
