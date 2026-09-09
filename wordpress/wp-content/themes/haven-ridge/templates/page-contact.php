<?php
/**
 * Template Name: Contact
 */
get_header();
while (have_posts()) {
	the_post();
	if (havenridge_has_page_blocks()) {
		the_content();
	} else {
		echo '<header class="hr-page-hero hr-page-hero--mint hr-reveal"><p class="hr-kicker">Contact</p><h1 class="hr-display hr-display--page">We’d love to hear from you.</h1><p class="hr-lead">Ready for a puppy, thinking about a future litter, or simply have a question — this is the place.</p></header>';
		havenridge_block('contact');
	}
}
get_footer();
