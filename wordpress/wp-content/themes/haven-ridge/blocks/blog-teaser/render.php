<?php
/**
 * Blog teaser.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

$kicker = havenridge_field('kicker', 'Knowledgebase');
$title  = havenridge_field('title', 'Quiet guidance for first-time doodle families.');
$btn    = havenridge_field('button');
$posts  = get_posts(array('numberposts' => 3));
$fallback = array(
	array('title' => 'Are Mini-Bernedoodles good with kids?', 'date' => 'June 8, 2025', 'excerpt' => 'The short answer is yes — with the right pairing and a household that treats a large dog as a family member, not a lawn ornament.', 'url' => home_url('/knowledgebase/')),
	array('title' => 'Raising a Mini-Bernedoodle in Manhattan', 'date' => 'June 30, 2025', 'excerpt' => 'Apartment life, elevator etiquette, and why Mini and Petite Mini pairings tend to settle into city rhythm faster.', 'url' => home_url('/knowledgebase/')),
	array('title' => 'Why Texas-raised puppies settle well in Mexico', 'date' => 'December 23, 2025', 'excerpt' => 'Climate, travel, and the families we have placed south of the border — what the logistics actually look like.', 'url' => home_url('/knowledgebase/')),
);
?>
<section class="hr-blog">
	<header class="hr-section-head hr-section-head--row hr-reveal">
		<div>
			<p class="hr-kicker"><?php echo esc_html($kicker); ?></p>
			<h2 class="hr-h2"><?php echo esc_html($title); ?></h2>
		</div>
		<a class="hr-btn hr-btn--ghost" href="<?php echo esc_url(havenridge_link_url($btn, get_permalink(get_option('page_for_posts')) ?: home_url('/knowledgebase/'))); ?>">
			<?php echo esc_html(havenridge_link_title($btn, 'All articles')); ?>
		</a>
	</header>
	<div class="hr-blog__grid">
		<?php if ($posts) : ?>
			<?php foreach ($posts as $i => $post) : ?>
				<article class="hr-blog__card hr-reveal" style="--d: <?php echo (int) $i * 80; ?>ms">
					<a href="<?php echo esc_url(get_permalink($post)); ?>">
						<?php if (has_post_thumbnail($post)) : ?>
							<?php echo get_the_post_thumbnail($post, 'large'); ?>
						<?php else : ?>
							<img src="<?php echo esc_url(havenridge_demo_image($i === 0 ? 'family' : ($i === 1 ? 'home' : 'poodle'))); ?>" alt="" loading="lazy">
						<?php endif; ?>
						<div>
							<time><?php echo esc_html(get_the_date('', $post)); ?></time>
							<h3><?php echo esc_html(get_the_title($post)); ?></h3>
							<p><?php echo esc_html(wp_trim_words($post->post_excerpt ?: $post->post_content, 22)); ?></p>
						</div>
					</a>
				</article>
			<?php endforeach; ?>
		<?php else : ?>
			<?php foreach ($fallback as $i => $item) : ?>
				<article class="hr-blog__card hr-reveal" style="--d: <?php echo (int) $i * 80; ?>ms">
					<a href="<?php echo esc_url($item['url']); ?>">
						<img src="<?php echo esc_url(havenridge_demo_image($i === 0 ? 'family' : ($i === 1 ? 'home' : 'poodle'))); ?>" alt="" loading="lazy">
						<div>
							<time><?php echo esc_html($item['date']); ?></time>
							<h3><?php echo esc_html($item['title']); ?></h3>
							<p><?php echo esc_html($item['excerpt']); ?></p>
						</div>
					</a>
				</article>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>
