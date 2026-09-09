<?php
/**
 * FAQ accordion.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

$kicker = havenridge_field('kicker', 'Questions');
$on_home = function_exists('is_front_page') && is_front_page();
$title  = havenridge_field('title', $on_home ? 'A few things families ask' : 'Frequently asked questions');
$items  = havenridge_field('items');
if (empty($items)) {
	if ($on_home) {
		$items = array(
			array('question' => 'Where are your puppies raised?', 'answer' => 'Inside our home, with our family — not in a kennel.'),
			array('question' => 'Are you a kennel?', 'answer' => 'No. We are a small, family-based program. Our breeding dogs are our pets first.'),
			array('question' => 'How do I reserve a puppy?', 'answer' => 'Start with our application. Approved families may then place a deposit.'),
		);
	} else {
		$mapped = array();
		foreach (havenridge_demo_faqs() as $faq) {
			$mapped[] = array('question' => $faq['q'], 'answer' => $faq['a']);
		}
		$items = $mapped;
	}
}
?>
<section class="hr-faq" id="faq">
	<?php if ($on_home) : ?>
	<header class="hr-section-head hr-reveal">
		<p class="hr-kicker"><?php echo esc_html($kicker); ?></p>
		<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
	</header>
	<?php endif; ?>
	<div class="hr-faq__list">
		<?php foreach ($items as $i => $item) :
			$q = $item['question'] ?? ($item['q'] ?? '');
			$a = $item['answer'] ?? ($item['a'] ?? '');
			?>
			<details class="hr-faq__item hr-reveal" <?php echo $i === 0 ? 'open' : ''; ?> style="--d: <?php echo (int) $i * 40; ?>ms">
				<summary><?php echo esc_html($q); ?></summary>
				<div class="hr-faq__answer hr-prose"><?php echo wp_kses_post(wpautop($a)); ?></div>
			</details>
		<?php endforeach; ?>
	</div>
	<?php if ($on_home) : ?>
		<p class="hr-more"><a class="hr-btn hr-btn--solid" href="<?php echo esc_url(home_url('/faqs/')); ?>">More questions</a></p>
	<?php endif; ?>
</section>
