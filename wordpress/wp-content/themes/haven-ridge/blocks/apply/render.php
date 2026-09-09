<?php
defined('ABSPATH') || exit;

$title = havenridge_field('title', 'This is how the conversation starts.');
$lead  = havenridge_field('lead', 'Submitting an application does not obligate you and does not guarantee placement. There are no perfect answers — just an honest conversation.');
?>
<section class="hr-contact hr-contact--cta" id="apply">
	<div class="hr-contact__copy hr-reveal">
		<p class="hr-kicker">Tell us about your family</p>
		<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
		<p class="hr-lead"><?php echo esc_html($lead); ?></p>
		<div class="hr-actions">
			<?php echo havenridge_form_embed('apply'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
	</div>
</section>
