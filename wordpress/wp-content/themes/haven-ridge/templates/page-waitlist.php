<?php
/**
 * Template Name: Waitlist
 */
get_header();
while (have_posts()) {
	the_post();
	if (havenridge_has_page_blocks()) {
		the_content();
	} else {
		echo '<header class="hr-page-hero hr-page-hero--mint hr-reveal"><p class="hr-kicker">Waitlist</p><h1 class="hr-display hr-display--page">Your future best friend may be just around the corner.</h1><p class="hr-lead">Our litters are intentionally limited. The waitlist is how families hear about the next one first.</p></header>';
		havenridge_block('waitlist');
	}
}
get_footer();
