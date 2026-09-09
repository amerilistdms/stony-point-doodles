<?php
/**
 * Interest form mailer.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

add_action('admin_post_nopriv_havenridge_interest', 'havenridge_handle_interest');
add_action('admin_post_havenridge_interest', 'havenridge_handle_interest');

function havenridge_handle_interest() {
	if (!isset($_POST['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), 'havenridge_interest')) {
		wp_die(esc_html__('Invalid form submission.', 'havenridge'));
	}

	$name    = sanitize_text_field(wp_unslash($_POST['hr_name'] ?? ''));
	$email   = sanitize_email(wp_unslash($_POST['hr_email'] ?? ''));
	$phone   = sanitize_text_field(wp_unslash($_POST['hr_phone'] ?? ''));
	$size    = sanitize_text_field(wp_unslash($_POST['hr_size'] ?? ''));
	$message = sanitize_textarea_field(wp_unslash($_POST['hr_message'] ?? ''));

	$form    = sanitize_text_field(wp_unslash($_POST['hr_form'] ?? 'contact'));
	$to      = havenridge_email();
	$subject = sprintf('[%s] %s — %s', havenridge_brand(), $form === 'waitlist' ? 'Waitlist' : 'Message', $name);
	$body    = "Name: $name\nEmail: $email\nPhone: $phone\nHoping for: $size\n\n$message\n";

	wp_mail($to, $subject, $body, array('Reply-To: ' . $email));

	$redirect = wp_get_referer() ? wp_get_referer() : home_url('/contact/');
	$flag = $form === 'waitlist' ? 'waitlist' : 'interest';
	wp_safe_redirect(add_query_arg($flag, 'sent', $redirect));
	exit;
}
