<?php
/**
 * Template Name: Meet our dogs
 */
get_header();
while (have_posts()) {
	the_post();
	if (havenridge_has_page_blocks()) {
		the_content();
	} else {
		echo '<header class="hr-page-hero hr-page-hero--mint hr-reveal"><p class="hr-kicker">Meet our dogs</p><h1 class="hr-display hr-display--page">The pack that makes Stony Point feel like home.</h1><p class="hr-lead">Our breeding dogs are our pets first. They share the couch, the yard, and everyday family life with us.</p></header>';
		havenridge_block('family-dogs');
		havenridge_block('household');
		havenridge_block('cta-band');
	}
}
get_footer();
