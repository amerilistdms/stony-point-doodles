<?php
/**
 * Template Name: Puppy application
 */
get_header();
while (have_posts()) {
	the_post();
	if (havenridge_has_page_blocks()) {
		the_content();
	} else {
		echo '<header class="hr-page-hero hr-page-hero--mint hr-reveal"><p class="hr-kicker">Puppy application</p><h1 class="hr-display hr-display--page">Ready to welcome a Stony Point puppy?</h1><p class="hr-lead">Finding the right puppy is exciting. Finding the right family for each puppy is just as important to us.</p></header>';
		havenridge_block('process');
		havenridge_block('apply');
	}
}
get_footer();
