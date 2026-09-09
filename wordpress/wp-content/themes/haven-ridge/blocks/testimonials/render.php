<?php
/**
 * Testimonials.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

$kicker = havenridge_field('kicker', 'Families');
$title  = havenridge_field('title', 'They came for a puppy. They stayed for the care.');
$items  = havenridge_field('items');
if (empty($items)) {
	$items = array(
		array('quote' => 'Far from an ordinary dog breeder. Committed to high-quality puppies, and equally committed to the people who take them home.', 'name' => 'Melissa Sumrall', 'meta' => 'Mini-Bernedoodle · Texas'),
		array('quote' => 'A week in and she is sweet, playful, and already on her way to being house trained. The process was calm from the first text.', 'name' => 'Lane Green', 'meta' => 'Mini · Dallas'),
		array('quote' => 'Someone gets right back to you. They answered every question and more. It felt like we had made new friends — and the puppy is everything we hoped.', 'name' => 'Slay Queen', 'meta' => 'Medium · California'),
		array('quote' => 'Over the moon with Marley. Sweetest temperament, super smart. Working with the team was smooth and professional.', 'name' => 'Jana Stokes', 'meta' => 'Mini · New York'),
		array('quote' => 'The flight nanny service was fantastic. Our male pup arrived well-adjusted. You can tell he was raised with human hands, not a warehouse.', 'name' => 'Cindy White', 'meta' => 'Standard Ultra · Mexico'),
	);
}
?>
<section class="hr-quotes">
	<header class="hr-section-head hr-section-head--row hr-reveal">
		<div>
			<p class="hr-kicker"><?php echo esc_html($kicker); ?></p>
			<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
		</div>
		<div class="hr-quotes__nav">
			<button type="button" class="hr-icon-btn" data-quote-prev aria-label="Previous"><?php echo '&larr;'; ?></button>
			<button type="button" class="hr-icon-btn" data-quote-next aria-label="Next"><?php echo '&rarr;'; ?></button>
		</div>
	</header>
	<div class="hr-quotes__viewport" data-quotes>
		<div class="hr-quotes__track">
			<?php foreach ($items as $item) : ?>
				<blockquote class="hr-quote">
					<p><?php echo esc_html($item['quote'] ?? ''); ?></p>
					<footer>
						<strong><?php echo esc_html($item['name'] ?? ''); ?></strong>
						<span><?php echo esc_html($item['meta'] ?? ''); ?></span>
					</footer>
				</blockquote>
			<?php endforeach; ?>
		</div>
	</div>
</section>
