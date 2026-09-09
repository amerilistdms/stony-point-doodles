<?php
/**
 * Template Name: FAQs
 */
get_header();
while (have_posts()) {
	the_post();
	if (havenridge_has_page_blocks()) {
		the_content();
	} else {
		echo '<header class="hr-page-hero hr-reveal"><p class="hr-kicker">Questions</p><h1 class="hr-display hr-display--page">A few things families ask</h1><p class="hr-lead">If something isn’t here, send a note. We’re happy to talk it through.</p></header>';
		havenridge_block('faq');
		havenridge_block('cta-band');
	}
}
get_footer();
