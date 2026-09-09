<?php
/**
 * Fallback index.
 *
 * @package HavenRidge
 */

get_header();
?>
<header class="hr-page-hero">
	<p class="hr-kicker">Knowledgebase</p>
	<h1 class="hr-display hr-display--page"><?php echo esc_html(get_the_archive_title() ?: 'Journal'); ?></h1>
</header>
<div class="hr-blog__grid hr-wrap">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<article class="hr-blog__card">
				<a href="<?php the_permalink(); ?>">
					<?php if (has_post_thumbnail()) : the_post_thumbnail('large'); endif; ?>
					<div>
						<time><?php echo esc_html(get_the_date()); ?></time>
						<h3><?php the_title(); ?></h3>
						<p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24)); ?></p>
					</div>
				</a>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<p class="hr-lead">No articles yet.</p>
	<?php endif; ?>
</div>
<?php
get_footer();
