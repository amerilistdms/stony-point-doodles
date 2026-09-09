<?php
/**
 * Upcoming litters.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

$items = havenridge_field('items');
if (empty($items)) {
	$items = havenridge_demo_litters();
}
?>
<section class="hr-litters" id="litters">
	<?php foreach ($items as $i => $item) :
		$img = is_string($item['image'] ?? '') ? $item['image'] : havenridge_image_url($item['image'] ?? '');
		$current = ($item['status'] ?? '') === 'current';
		?>
		<article class="hr-litter-card hr-reveal" style="--d: <?php echo (int) $i * 80; ?>ms">
			<figure>
				<img src="<?php echo esc_url($img ?: havenridge_demo_image('hero2')); ?>" alt="">
			</figure>
			<div>
				<p class="hr-kicker"><?php echo esc_html($item['kicker'] ?? ''); ?></p>
				<h2 class="hr-h2"><?php echo esc_html($item['title'] ?? ''); ?></h2>
				<?php if (!empty($item['lead'])) : ?><p class="hr-lead"><?php echo esc_html($item['lead']); ?></p><?php endif; ?>
				<?php if (!empty($item['text'])) : ?><p><?php echo esc_html($item['text']); ?></p><?php endif; ?>
				<div class="hr-actions">
					<?php if ($current) : ?>
						<a class="hr-btn hr-btn--solid" href="<?php echo esc_url(home_url('/our-puppies/')); ?>">See the puppies</a>
						<a class="hr-btn hr-btn--ghost" href="<?php echo esc_url(havenridge_apply_url()); ?>">Apply for a puppy</a>
					<?php else : ?>
						<a class="hr-btn hr-btn--solid" href="<?php echo esc_url(havenridge_google_form_url()); ?>" target="_blank" rel="noopener noreferrer">Send a message</a>
					<?php endif; ?>
				</div>
			</div>
		</article>
	<?php endforeach; ?>
</section>
