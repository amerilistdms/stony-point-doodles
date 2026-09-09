<?php
get_header();
while (have_posts()) :
	the_post();
	$role  = havenridge_field('role');
	$size  = havenridge_field('size');
	$color = havenridge_field('color');
	$hero  = get_the_post_thumbnail_url(get_the_ID(), 'havenridge-hero') ?: havenridge_demo_image('bernese');
	?>
	<article class="hr-puppy">
		<div class="hr-puppy__grid">
			<figure class="hr-puppy__media">
				<img src="<?php echo esc_url($hero); ?>" alt="<?php the_title_attribute(); ?>">
			</figure>
			<div class="hr-puppy__copy">
				<p class="hr-kicker"><?php echo esc_html(trim($role . ' · ' . $size, ' ·')); ?></p>
				<h1 class="hr-display hr-display--page"><?php the_title(); ?></h1>
				<?php if ($color) : ?><p class="hr-lead"><?php echo esc_html($color); ?></p><?php endif; ?>
				<div class="hr-prose"><?php the_content(); ?></div>
			</div>
		</div>
	</article>
	<?php
endwhile;
havenridge_block('cta-band');
get_footer();
