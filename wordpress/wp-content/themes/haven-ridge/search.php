<?php
get_header();
?>
<header class="hr-page-hero">
	<p class="hr-kicker">Search</p>
	<h1 class="hr-display hr-display--page"><?php echo esc_html(get_search_query()); ?></h1>
</header>
<div class="hr-blog__grid hr-wrap">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article class="hr-blog__card">
			<a href="<?php the_permalink(); ?>">
				<div>
					<time><?php echo esc_html(get_the_date()); ?></time>
					<h3><?php the_title(); ?></h3>
					<p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 22)); ?></p>
				</div>
			</a>
		</article>
	<?php endwhile; else : ?>
		<p class="hr-lead">Nothing matched that search.</p>
	<?php endif; ?>
</div>
<?php
get_footer();
