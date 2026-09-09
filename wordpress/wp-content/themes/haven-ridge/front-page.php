<?php
/**
 * Front page — ACF blocks, or the default Haven Ridge home.
 *
 * @package HavenRidge
 */

get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();
		if (havenridge_has_page_blocks()) {
			the_content();
		} else {
			havenridge_home_default();
		}
	}
} else {
	havenridge_home_default();
}

get_footer();
