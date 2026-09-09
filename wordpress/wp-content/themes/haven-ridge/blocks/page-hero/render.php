<?php
/**
 * Interior page hero.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

$kicker = havenridge_field('kicker', '');
$title  = havenridge_field('title', get_the_title());
$lead   = havenridge_field('lead', '');
?>
<header class="hr-page-hero hr-reveal">
	<?php if ($kicker) : ?><p class="hr-kicker"><?php echo esc_html($kicker); ?></p><?php endif; ?>
	<h1 class="hr-display hr-display--page"><?php echo esc_html($title); ?></h1>
	<?php if ($lead) : ?><p class="hr-lead"><?php echo esc_html($lead); ?></p><?php endif; ?>
</header>
