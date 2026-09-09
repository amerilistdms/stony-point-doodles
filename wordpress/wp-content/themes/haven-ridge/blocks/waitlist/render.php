<?php
defined('ABSPATH') || exit;

$title = havenridge_field('title', 'We’ll keep you in the loop — gently.');
$lead  = havenridge_field('lead', 'No pressure, no hard sell. Just a note when there is news worth sharing.');
?>
<section class="hr-contact hr-contact--cta" id="waitlist">
	<div class="hr-contact__copy hr-reveal">
		<p class="hr-kicker">Stay in touch</p>
		<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
		<p class="hr-lead"><?php echo esc_html($lead); ?></p>
		<div class="hr-actions">
			<?php echo havenridge_form_embed('hello'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<a class="hr-btn hr-btn--ghost" href="<?php echo esc_url(havenridge_apply_url()); ?>">I’d rather apply now</a>
		</div>
	</div>
</section>
