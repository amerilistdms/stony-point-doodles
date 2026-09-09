<?php
defined('ABSPATH') || exit;

$on_home = function_exists('is_front_page') && is_front_page();
$kicker = havenridge_field('kicker', $on_home ? 'The Stony Point adoption process' : 'How it works');
$title  = havenridge_field('title', 'From our family to yours.');
$steps  = havenridge_field('steps');
if (empty($steps)) {
	if ($on_home) {
		$steps = array(
			array('title' => 'Apply', 'text' => 'Tell us about your household. We want loving homes — not simply a sale.', 'image' => havenridge_demo_image('apply')),
			array('title' => 'We review', 'text' => 'We read your application, then we talk so the match feels right.', 'image' => havenridge_demo_image('review')),
			array('title' => 'Watch them grow', 'text' => 'Pictures, updates, and personalities as they emerge.', 'image' => havenridge_demo_image('grow')),
			array('title' => 'Welcome home', 'text' => 'Your puppy becomes part of your family. We hope you remain part of ours.', 'image' => havenridge_demo_image('welcome')),
		);
	} else {
		$steps = array(
			array('title' => 'Submit your application', 'text' => 'Tell us about your household. We want loving homes — not simply a sale.'),
			array('title' => 'Application approval', 'text' => 'We read your application, then we talk so the match feels right.'),
			array('title' => 'Secure your pick', 'text' => 'Your deposit secures your place. Pick order follows approval and deposits.'),
			array('title' => 'Watch them grow', 'text' => 'Pictures, updates, and personalities as they emerge.'),
			array('title' => 'Veterinary evaluation', 'text' => 'Health always comes before selection.'),
			array('title' => 'Choose your puppy', 'text' => 'When your turn arrives, we help you find the match that feels right.'),
			array('title' => 'Welcome home', 'text' => 'Your puppy becomes part of your family. We hope you remain part of ours.'),
		);
	}
}

if (!$on_home && count($steps) >= 7) :
	$groups = array(
		array('kicker' => 'Start here', 'heading' => 'Apply', 'items' => array_slice($steps, 0, 3), 'offset' => 0),
		array('kicker' => 'While they grow', 'heading' => 'Watch & wait', 'items' => array_slice($steps, 3, 2), 'offset' => 3),
		array('kicker' => 'Then', 'heading' => 'Welcome home', 'items' => array_slice($steps, 5, 2), 'offset' => 5),
	);
	?>
<section class="hr-journey" id="process">
	<header class="hr-section-head hr-reveal">
		<p class="hr-kicker"><?php echo esc_html($kicker); ?></p>
		<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
	</header>
	<div class="hr-journey__grid">
		<?php foreach ($groups as $g => $group) : ?>
			<article class="hr-reveal" style="--d: <?php echo (int) $g * 80; ?>ms">
				<p class="hr-kicker"><?php echo esc_html($group['kicker']); ?></p>
				<h3><?php echo esc_html($group['heading']); ?></h3>
				<ol>
					<?php foreach ($group['items'] as $i => $step) :
						$n = (int) $group['offset'] + $i + 1;
						?>
						<li>
							<span><?php echo esc_html(str_pad((string) $n, 2, '0', STR_PAD_LEFT)); ?></span>
							<div>
								<strong><?php echo esc_html($step['title'] ?? ''); ?></strong>
								<p><?php echo esc_html($step['text'] ?? ''); ?></p>
							</div>
						</li>
					<?php endforeach; ?>
				</ol>
			</article>
		<?php endforeach; ?>
	</div>
</section>
	<?php
	return;
endif;

$list_class = count($steps) > 4 ? 'hr-process__list hr-process__list--seven' : 'hr-process__list';
?>
<section class="hr-process" id="process">
	<header class="hr-section-head hr-reveal">
		<p class="hr-kicker"><?php echo esc_html($kicker); ?></p>
		<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
	</header>
	<ol class="<?php echo esc_attr($list_class); ?>">
		<?php foreach ($steps as $i => $step) : ?>
			<li class="hr-reveal" style="--d: <?php echo (int) $i * 50; ?>ms">
				<?php
				$step_img = $step['image'] ?? '';
				$step_url = $step_img ? (havenridge_image_url($step_img) ?: havenridge_demo_image($step_img)) : '';
				if ($step_url) :
					?>
					<img src="<?php echo esc_url($step_url); ?>" alt="">
				<?php endif; ?>
				<span><?php echo esc_html(str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT)); ?></span>
				<h3><?php echo esc_html($step['title'] ?? ''); ?></h3>
				<p><?php echo esc_html($step['text'] ?? ''); ?></p>
			</li>
		<?php endforeach; ?>
	</ol>
	<?php if ($on_home || count($steps) <= 4) : ?>
		<p class="hr-more"><a class="hr-btn hr-btn--ghost" href="<?php echo esc_url(havenridge_apply_url()); ?>">See the full process</a></p>
	<?php endif; ?>
</section>
