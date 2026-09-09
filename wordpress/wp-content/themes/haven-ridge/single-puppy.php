<?php
/**
 * Single puppy.
 *
 * @package HavenRidge
 */

get_header();

while (have_posts()) :
	the_post();
	$status = havenridge_field('status', 'available');
	$gender = havenridge_field('gender');
	$price  = havenridge_field('price');
	$weight = havenridge_field('weight');
	$dob    = havenridge_field('dob');
	$home   = havenridge_field('take_home');
	$collar = havenridge_field('collar');
	$gen    = havenridge_field('generation');
	$hero   = get_the_post_thumbnail_url(get_the_ID(), 'havenridge-hero') ?: havenridge_demo_image('hero2');
	$gallery = havenridge_field('gallery');
	?>
	<article class="hr-puppy">
		<div class="hr-puppy__grid">
			<figure class="hr-puppy__media">
				<img src="<?php echo esc_url($hero); ?>" alt="<?php the_title_attribute(); ?>">
			</figure>
			<div class="hr-puppy__copy">
				<p class="hr-kicker"><?php echo esc_html(havenridge_status_label($status)); ?></p>
				<h1 class="hr-display hr-display--page"><?php the_title(); ?></h1>
				<?php if ($price) : ?><p class="hr-puppy__price"><?php echo esc_html($price); ?></p><?php endif; ?>
				<div class="hr-prose"><?php the_content(); ?></div>
				<dl class="hr-facts">
					<?php if ($gender) : ?><div><dt>Gender</dt><dd><?php echo esc_html($gender); ?></dd></div><?php endif; ?>
					<?php if ($weight) : ?><div><dt>Est. adult weight</dt><dd><?php echo esc_html($weight); ?></dd></div><?php endif; ?>
					<?php if ($dob) : ?><div><dt>Born</dt><dd><?php echo esc_html($dob); ?></dd></div><?php endif; ?>
					<?php if ($home) : ?><div><dt>Go home</dt><dd><?php echo esc_html($home); ?></dd></div><?php endif; ?>
					<?php if ($collar) : ?><div><dt>Collar</dt><dd><?php echo esc_html($collar); ?></dd></div><?php endif; ?>
					<?php if ($gen) : ?><div><dt>Generation</dt><dd><?php echo esc_html($gen); ?></dd></div><?php endif; ?>
				</dl>
				<div class="hr-actions">
					<a class="hr-btn hr-btn--solid" href="<?php echo esc_url(havenridge_apply_url()); ?>">Apply for <?php the_title(); ?></a>
					<a class="hr-btn hr-btn--ghost" href="<?php echo esc_url(home_url('/our-puppies/')); ?>">Back to our puppies</a>
				</div>
			</div>
		</div>
		<?php if (is_array($gallery) && $gallery) : ?>
			<div class="hr-gallery__grid">
				<?php foreach ($gallery as $image) : ?>
					<figure><img src="<?php echo esc_url(havenridge_image_url($image)); ?>" alt=""></figure>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</article>
	<?php
endwhile;

havenridge_block('cta-band');
get_footer();
