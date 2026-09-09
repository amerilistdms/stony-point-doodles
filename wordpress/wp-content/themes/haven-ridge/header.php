<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$announce = get_theme_mod('havenridge_announcement', 'Before they become part of your family, they’re part of ours.');
if (function_exists('get_field')) {
	$opt = get_field('announcement', 'option');
	if ($opt) {
		$announce = $opt;
	}
}
?>

<a class="hr-skip" href="#content">Skip to content</a>

<?php if ($announce) : ?>
	<div class="hr-announce">
		<p><?php echo esc_html($announce); ?></p>
		<a href="<?php echo esc_url(havenridge_apply_url()); ?>">Apply for a puppy</a>
	</div>
<?php endif; ?>

<header class="hr-header" data-header>
	<div class="hr-header__inner">
		<a class="hr-logo" href="<?php echo esc_url(home_url('/')); ?>">
			<?php if (has_custom_logo()) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<img class="hr-logo__img" src="<?php echo esc_url(havenridge_logo_url()); ?>" alt="<?php echo esc_attr(havenridge_brand()); ?>">
			<?php endif; ?>
		</a>

		<nav class="hr-nav" data-nav aria-label="Primary">
			<?php
			if (has_nav_menu('primary')) {
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'hr-nav__list',
					'depth'          => 2,
				));
			} else {
				?>
				<ul class="hr-nav__list">
					<li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
					<li><a href="<?php echo esc_url(home_url('/our-puppies/')); ?>">Our Puppies</a></li>
					<li><a href="<?php echo esc_url(home_url('/upcoming-litters/')); ?>">Upcoming Litters</a></li>
					<li><a href="<?php echo esc_url(home_url('/meet-our-dogs/')); ?>">Meet Our Dogs</a></li>
					<li><a href="<?php echo esc_url(home_url('/our-story/')); ?>">Our Story</a></li>
					<li><a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a></li>
					<li><a href="<?php echo esc_url(home_url('/alumni/')); ?>">Alumni</a></li>
					<li><a href="<?php echo esc_url(home_url('/faqs/')); ?>">FAQs</a></li>
					<li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
				</ul>
				<?php
			}
			?>
		</nav>

		<div class="hr-header__actions">
			<?php if (havenridge_phone()) : ?>
				<a class="hr-header__phone" href="<?php echo esc_url(havenridge_phone_href()); ?>"><?php echo esc_html(havenridge_phone()); ?></a>
			<?php endif; ?>
			<a class="hr-btn hr-btn--solid hr-btn--sm" href="<?php echo esc_url(havenridge_apply_url()); ?>">Apply for a puppy</a>
			<button class="hr-menu-btn" type="button" data-menu-toggle aria-expanded="false" aria-label="Open menu">
				<span></span><span></span>
			</button>
		</div>
	</div>
</header>

<div class="hr-mobile-cta hr-mobile-cta--top">
	<a href="<?php echo esc_url(home_url('/our-puppies/')); ?>">Available puppies</a>
	<a class="is-primary" href="<?php echo esc_url(havenridge_apply_url()); ?>">Apply now</a>
</div>

<main id="content" class="hr-main">
