<?php
defined('ABSPATH') || exit;

$tpl = function_exists('get_page_template_slug') ? (string) get_page_template_slug() : '';
$on_puppies = (function_exists('is_page_template') && is_page_template('templates/page-puppies.php'))
	|| (function_exists('is_post_type_archive') && is_post_type_archive('puppy'));

$kicker       = 'Ready when you are';
$title        = 'Healthy Puppies. Loving Homes. Lifelong Friends.';
$lead         = '';
$btn1_url     = havenridge_apply_url();
$btn1_label   = 'Apply for a puppy';
$btn2_url     = havenridge_google_form_url();
$btn2_label   = 'Send a message';

if ($on_puppies) {
	$kicker     = 'Falling for one of them?';
	$title      = 'Start with the puppy application.';
	$lead       = 'Submitting it does not obligate you — it just begins the conversation.';
} elseif (strpos($tpl, 'page-upcoming') !== false) {
	$kicker     = 'Thinking ahead?';
	$title      = 'We’ll keep you in the loop — gently.';
	$btn1_url   = havenridge_google_form_url();
	$btn1_label = 'Send a message';
	$btn2_url   = havenridge_apply_url();
	$btn2_label = 'Apply for a puppy';
} elseif (strpos($tpl, 'page-parents') !== false) {
	$btn2_url   = home_url('/our-puppies/');
	$btn2_label = 'See the puppies';
} elseif (strpos($tpl, 'page-about') !== false) {
	$kicker     = 'If this feels like home';
	$title      = 'Start with the puppy application.';
	$btn2_url   = home_url('/meet-our-dogs/');
	$btn2_label = 'Meet our dogs';
} elseif (strpos($tpl, 'page-faq') !== false) {
	$kicker     = 'Still curious?';
	$title      = 'We’re happy to talk it through.';
	$btn1_url   = home_url('/contact/');
	$btn1_label = 'Contact us';
	$btn2_url   = havenridge_apply_url();
	$btn2_label = 'Apply for a puppy';
}

$kicker     = havenridge_field('kicker', $kicker);
$title      = havenridge_field('title', $title);
$lead       = havenridge_field('lead', $lead);
$btn1       = havenridge_field('primary_button');
$btn2       = havenridge_field('secondary_button');
$btn1_href  = havenridge_link_url($btn1, $btn1_url);
$btn2_href  = havenridge_link_url($btn2, $btn2_url);
$btn1_ext   = strpos($btn1_href, 'docs.google.com') !== false;
$btn2_ext   = strpos($btn2_href, 'docs.google.com') !== false;
?>
<section class="hr-cta" id="apply-cta">
	<div class="hr-cta__inner hr-reveal">
		<p class="hr-kicker hr-kicker--on-dark"><?php echo esc_html($kicker); ?></p>
		<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
		<?php if ($lead) : ?>
			<p class="hr-lead"><?php echo esc_html($lead); ?></p>
		<?php endif; ?>
		<div class="hr-actions">
			<a class="hr-btn hr-btn--light" href="<?php echo esc_url($btn1_href); ?>"<?php echo $btn1_ext ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
				<?php echo esc_html(havenridge_link_title($btn1, $btn1_label)); ?>
			</a>
			<a class="hr-btn hr-btn--outline-light" href="<?php echo esc_url($btn2_href); ?>"<?php echo $btn2_ext ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
				<?php echo esc_html(havenridge_link_title($btn2, $btn2_label)); ?>
			</a>
		</div>
	</div>
</section>
