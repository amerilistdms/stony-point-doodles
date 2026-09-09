<?php
/**
 * Template Name: Our puppies
 */
get_header();
while (have_posts()) {
	the_post();
	if (havenridge_has_page_blocks()) {
		the_content();
	} else {
		echo '<header class="hr-page-hero hr-page-hero--mint hr-reveal"><p class="hr-kicker">Our puppies</p><h1 class="hr-display hr-display--page">Looking for your new best friend?</h1><p class="hr-lead">Raised in our home, with our family — not in a kennel.</p></header>';
		havenridge_block('current-litter');
		havenridge_block('featured-puppies');
		havenridge_block('cta-band');
	}
}
get_footer();
