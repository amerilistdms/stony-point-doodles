<?php
/**
 * Stats block.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

$stats = havenridge_field('stats');
if (empty($stats) || !is_array($stats)) {
	$stats = array(
		array('value' => '400+', 'label' => 'Families', 'note' => 'Placed across the U.S. and Mexico'),
		array('value' => '5', 'label' => 'Sizes', 'note' => 'Micro Mini through Standard XL'),
		array('value' => '1 yr', 'label' => 'Guarantee', 'note' => 'Genetic health, in writing'),
		array('value' => '0', 'label' => 'Kennel rows', 'note' => 'Every litter is home-raised'),
	);
}
?>
<section class="hr-stats">
	<div class="hr-stats__grid">
		<?php foreach ($stats as $i => $stat) : ?>
			<div class="hr-stat hr-reveal" style="--d: <?php echo (int) $i * 80; ?>ms">
				<p class="hr-stat__value" data-count><?php echo esc_html($stat['value'] ?? ''); ?></p>
				<p class="hr-stat__label"><?php echo esc_html($stat['label'] ?? ''); ?></p>
				<p class="hr-stat__note"><?php echo esc_html($stat['note'] ?? ''); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
</section>
