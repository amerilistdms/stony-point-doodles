<?php
/**
 * Template Name: Guardian program
 *
 * @package HavenRidge
 */

get_header();
while (have_posts()) {
	the_post();
	if (havenridge_has_page_blocks()) {
		the_content();
	} else {
	echo '<header class="hr-page-hero"><p class="hr-kicker">Guardian homes</p><h1 class="hr-display hr-display--page">Give a parent dog a forever family. Help us raise the next generation.</h1><p class="hr-lead">We are looking for exceptional homes in Dallas–Fort Worth, Austin, and Houston for male and female Mini-Bernedoodles of every size.</p></header>';
	havenridge_block('split-story');
	havenridge_block('process');
	havenridge_block('faq');
	havenridge_block('contact');
	}
}
get_footer();
