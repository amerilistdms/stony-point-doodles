<?php
defined('ABSPATH') || exit;

$kicker  = havenridge_field('kicker', 'Current litter');
$title   = havenridge_field('title', "Mila & Nico’s puppies are here.");
$born    = havenridge_field('born', '8/18/2026');
$lead    = havenridge_field('lead', 'Mama and puppies are resting, growing, and soaking up these first weeks at home.');
$count   = havenridge_field('count', '7');
$males   = havenridge_field('males', '4');
$females = havenridge_field('females', '3');
$note    = havenridge_field('note', 'Selections begin after their first veterinary visit. Health always comes first.');
$on_home = function_exists('is_front_page') && is_front_page();
?>
<section class="hr-litter-now" id="current-litter">
	<figure class="hr-litter-now__media hr-reveal">
		<img src="<?php echo esc_url(havenridge_demo_image('newborn')); ?>" alt="Current Stony Point litter" width="900" height="700">
	</figure>
	<div class="hr-litter-now__copy hr-reveal">
		<p class="hr-kicker"><?php echo esc_html($kicker); ?></p>
		<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
		<p class="hr-litter-now__born">Born: <?php echo esc_html($born); ?></p>
		<p class="hr-lead"><?php echo esc_html($lead); ?></p>
		<aside class="hr-litter-now__stats">
			<p class="hr-stat__value"><?php echo esc_html($count); ?></p>
			<p class="hr-stat__label">Puppies born</p>
			<ul>
				<li><?php echo esc_html($males); ?> Male</li>
				<li><?php echo esc_html($females); ?> Female</li>
			</ul>
		</aside>
		<p class="hr-litter-now__aside"><?php echo esc_html($note); ?></p>
		<div class="hr-actions">
			<?php if ($on_home) : ?>
				<a class="hr-btn hr-btn--solid" href="<?php echo esc_url(home_url('/our-puppies/')); ?>">See the puppies</a>
				<a class="hr-btn hr-btn--ghost" href="<?php echo esc_url(havenridge_apply_url()); ?>">Apply for a puppy</a>
			<?php else : ?>
				<a class="hr-btn hr-btn--solid" href="<?php echo esc_url(havenridge_apply_url()); ?>">Apply for a puppy</a>
			<?php endif; ?>
		</div>
	</div>
</section>
