<?php
defined('ABSPATH') || exit;

$puppy  = $puppy ?? array();
$name   = $puppy['name'] ?? 'Puppy';
$gender = $puppy['gender'] ?? '';
$size   = $puppy['size'] ?? '';
$color  = $puppy['color'] ?? '';
$status = $puppy['status'] ?? 'available';
$weight = $puppy['weight'] ?? '';
$note   = $puppy['note'] ?? ($puppy['personality'] ?? '');
$image  = havenridge_image_url($puppy['image'] ?? '') ?: ($puppy['image_url'] ?? havenridge_demo_image('puppy1'));
$link   = havenridge_link_url($puppy['link'] ?? '', '');
$permalink = $puppy['permalink'] ?? $link;
$delay  = isset($i) ? (int) $i * 70 : 0;
$meta   = trim(implode(' · ', array_filter(array($gender, $color, $size))));
$show_weight = $weight && strpos($weight, 'XX') === false;
$href = $status === 'available' ? havenridge_apply_url() : '';
$badge = havenridge_status_label($status);
?>
<article class="hr-card hr-reveal" data-size="<?php echo esc_attr(strtolower($size)); ?>" data-status="<?php echo esc_attr($status); ?>" data-color="<?php echo esc_attr(strtolower($color)); ?>" style="--d: <?php echo (int) $delay; ?>ms">
	<?php if ($href) : ?>
		<a class="hr-card__media" href="<?php echo esc_url($href); ?>">
			<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($name); ?>" loading="lazy" width="640" height="800">
			<span class="hr-card__badge hr-card__badge--<?php echo esc_attr($status); ?>"><?php echo esc_html($badge); ?></span>
		</a>
	<?php else : ?>
		<div class="hr-card__media">
			<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($name); ?>" loading="lazy" width="640" height="800">
			<span class="hr-card__badge hr-card__badge--<?php echo esc_attr($status); ?>"><?php echo esc_html($badge); ?></span>
		</div>
	<?php endif; ?>
	<?php if ($meta) : ?><p class="hr-kicker"><?php echo esc_html($meta); ?></p><?php endif; ?>
	<h3 class="hr-card__name"><?php echo esc_html($name); ?></h3>
	<?php if ($show_weight) : ?>
		<p class="hr-card__facts">Expected size: <?php echo esc_html($weight); ?></p>
	<?php endif; ?>
	<?php if ($note) : ?>
		<p class="hr-card__note"><?php echo esc_html($note); ?></p>
	<?php endif; ?>
	<?php if ($status === 'available') : ?>
		<a class="hr-btn hr-btn--solid hr-btn--sm" href="<?php echo esc_url($href); ?>">Apply for <?php echo esc_html($name); ?></a>
	<?php endif; ?>
</article>
