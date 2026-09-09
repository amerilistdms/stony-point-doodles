<?php
/**
 * Single post.
 *
 * @package HavenRidge
 */

get_header();
while (have_posts()) :
	the_post();
	?>
	<article class="hr-article">
		<header class="hr-page-hero">
			<p class="hr-kicker"><?php echo esc_html(get_the_date()); ?></p>
			<h1 class="hr-display hr-display--page"><?php the_title(); ?></h1>
		</header>
		<?php if (has_post_thumbnail()) : ?>
			<figure class="hr-article__hero"><?php the_post_thumbnail('havenridge-hero'); ?></figure>
		<?php endif; ?>
		<div class="hr-prose hr-prose--wide">
			<?php the_content(); ?>
		</div>
	</article>
	<?php
endwhile;
havenridge_block('cta-band');
get_footer();
