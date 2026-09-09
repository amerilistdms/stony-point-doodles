<?php
/**
 * Rich content.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

$body = havenridge_field('body', '');
if (!$body) {
	return;
}
?>
<section class="hr-rich">
	<div class="hr-prose hr-prose--wide">
		<?php echo wp_kses_post($body); ?>
	</div>
</section>
