<?php
defined('ABSPATH') || exit;

$on_home = function_exists('is_front_page') && is_front_page();
$kicker = havenridge_field('kicker', $on_home ? 'Our promise' : 'More than a puppy');
$title  = havenridge_field('title', $on_home ? 'We aren’t trying to raise the most puppies.' : 'A new member of your family');
$body   = havenridge_field('body', '');
if (!$body && !$on_home) {
	$body = '<p>A puppy changes a household. There are kisses, midnight potty trips, chewed shoes, zoomies, and eventually the dog waiting at the door when you come home.</p><p>We are not simply looking for someone to purchase a puppy. We are looking for the families who will love them.</p>';
}
$quote = havenridge_field('quote', $on_home ? 'Before they become part of your family, they’re part of ours.' : 'We care where our puppies go.');
$image = havenridge_image_url(havenridge_field('image')) ?: havenridge_demo_image('love');
?>
<section class="hr-love<?php echo $on_home ? ' hr-love--split' : ''; ?>">
	<?php if ($on_home) : ?>
		<figure class="hr-love__media hr-reveal">
			<img src="<?php echo esc_url($image); ?>" alt="A Stony Point doodle">
		</figure>
	<?php endif; ?>
	<div class="hr-love__inner hr-reveal">
		<p class="hr-kicker"><?php echo esc_html($kicker); ?></p>
		<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
		<?php if ($body) : ?>
			<div class="hr-prose"><?php echo wp_kses_post($body); ?></div>
		<?php endif; ?>
		<blockquote class="hr-love__quote"><?php echo esc_html($quote); ?></blockquote>
	</div>
</section>
