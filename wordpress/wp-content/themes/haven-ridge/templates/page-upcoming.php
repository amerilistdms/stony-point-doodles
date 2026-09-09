<?php
/**
 * Template Name: Upcoming litters
 */
get_header();
while (have_posts()) {
	the_post();
	if (havenridge_has_page_blocks()) {
		the_content();
	} else {
		echo '<header class="hr-page-hero hr-page-hero--mint hr-reveal"><p class="hr-kicker">Upcoming litters</p><h1 class="hr-display hr-display--page">Planning ahead for your Stony Point puppy?</h1><p class="hr-lead">We only plan a limited number of litters. Families who reach out are the first to hear when the next one is on the way.</p></header>';
		havenridge_block('litters');
		havenridge_block('cta-band');
	}
}
get_footer();
