<?php
/**
 * Template Name: Our story
 */
get_header();
while (have_posts()) {
	the_post();
	if (havenridge_has_page_blocks()) {
		the_content();
	} else {
		echo '<header class="hr-page-hero hr-reveal"><p class="hr-kicker">Our story</p><h1 class="hr-display hr-display--page">We aren’t trying to raise the most puppies.</h1><p class="hr-lead">We’re trying to raise our puppies the right way.</p></header>';
		havenridge_block('split-story');
		havenridge_block('pillars');
		havenridge_block('love-letter');
		havenridge_block('cta-band');
	}
}
get_footer();
