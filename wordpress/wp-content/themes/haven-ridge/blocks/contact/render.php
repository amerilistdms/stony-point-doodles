<?php
defined('ABSPATH') || exit;

$title = havenridge_field('title', 'A small program with a real family behind it.');
$lead  = havenridge_field('lead', 'Interested in a puppy? Complete our application — we’d love to hear from you.');
?>
<section class="hr-contact hr-contact--cta" id="contact">
	<div class="hr-contact__copy hr-reveal">
		<p class="hr-kicker">Say hello</p>
		<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
		<ul class="hr-contact__details">
			<?php if (havenridge_phone()) : ?>
				<li><span>Phone</span> <a href="<?php echo esc_url(havenridge_phone_href()); ?>"><?php echo esc_html(havenridge_phone()); ?></a></li>
			<?php endif; ?>
			<li><span>Email</span> <a href="mailto:<?php echo esc_attr(havenridge_email()); ?>"><?php echo esc_html(havenridge_email()); ?></a></li>
		</ul>
		<?php if ($lead) : ?><p class="hr-lead"><?php echo esc_html($lead); ?></p><?php endif; ?>
		<div class="hr-actions">
			<?php echo havenridge_form_embed('hello'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<a class="hr-btn hr-btn--ghost" href="<?php echo esc_url(havenridge_apply_url()); ?>">Apply for a puppy</a>
		</div>
	</div>
</section>
