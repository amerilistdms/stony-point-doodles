<?php
defined('ABSPATH') || exit;

$items = havenridge_field('items');
if (empty($items)) {
	$items = array(
		array('title' => 'Small by choice', 'text' => 'We do not operate rows of kennels. We breed our own beloved family dogs.'),
		array('title' => 'Raised in our home', 'text' => 'Every litter is born and raised inside our house, not a commercial kennel.'),
		array('title' => 'Thoughtfully bred', 'text' => 'Genetics, health, temperament, and structure come before anything else.'),
		array('title' => 'Loved from day one', 'text' => 'Before they become part of your family, they’re part of ours.'),
	);
}
?>
<section class="hr-pillars">
	<div class="hr-pillars__grid">
		<?php foreach ($items as $i => $item) : ?>
			<article class="hr-reveal" style="--d: <?php echo (int) $i * 70; ?>ms">
				<p class="hr-pillars__num"><?php echo esc_html(str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT)); ?></p>
				<h3><?php echo esc_html($item['title'] ?? ''); ?></h3>
				<p><?php echo esc_html($item['text'] ?? ''); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
</section>
