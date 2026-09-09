<?php
defined('ABSPATH') || exit;

$kicker = havenridge_field('kicker', 'Why Stony Point Doodles?');
$title  = havenridge_field('title', 'Healthy beginnings matter.');
$items  = havenridge_field('items');
if (empty($items)) {
	$items = array(
		array('title' => 'Thoughtful Genetics', 'text' => 'Carefully considered parent pairings with health and temperament in mind.'),
		array('title' => 'Veterinary Care', 'text' => 'Puppies receive appropriate veterinary evaluation and care before joining their families.'),
		array('title' => 'Daily Socialization', 'text' => 'Regular handling, interaction, household exposure and plenty of love.'),
		array('title' => 'Family Raised', 'text' => 'Born and raised right inside our home rather than in a commercial kennel environment.'),
	);
}
?>
<section class="hr-values">
	<header class="hr-section-head hr-reveal">
		<p class="hr-kicker"><?php echo esc_html($kicker); ?></p>
		<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
		<p class="hr-lead">Beautiful puppies are wonderful, but health and temperament come first. We carefully consider the genetics, health, temperament, personality, structure, and characteristics of our parent dogs before planning a litter.</p>
	</header>
	<div class="hr-values__grid hr-values__grid--four">
		<?php foreach ($items as $i => $item) : ?>
			<article class="hr-value hr-reveal" style="--d: <?php echo (int) $i * 70; ?>ms">
				<span class="hr-value__index"><?php echo esc_html(str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT)); ?></span>
				<h3><?php echo esc_html($item['title'] ?? ''); ?></h3>
				<p><?php echo esc_html($item['text'] ?? ''); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
</section>
