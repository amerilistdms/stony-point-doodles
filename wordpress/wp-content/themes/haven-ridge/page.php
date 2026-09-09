<?php
/**
 * Default page.
 *
 * @package HavenRidge
 */

get_header();

while (have_posts()) {
	the_post();
	if (havenridge_has_page_blocks()) {
		the_content();
	} else {
		havenridge_block('page-hero');
		if (get_the_content()) {
			echo '<section class="hr-rich"><div class="hr-prose hr-prose--wide">';
			the_content();
			echo '</div></section>';
		}
		havenridge_block('cta-band');
	}
}

get_footer();
