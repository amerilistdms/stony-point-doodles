<?php
get_header();
?>
<header class="hr-page-hero">
	<p class="hr-kicker">404</p>
	<h1 class="hr-display hr-display--page">That page wandered off with Remy.</h1>
	<p class="hr-lead">Try our puppies, or send a note — we’ll point you the right way.</p>
	<div class="hr-actions">
		<a class="hr-btn hr-btn--solid" href="<?php echo esc_url(home_url('/')); ?>">Back home</a>
		<a class="hr-btn hr-btn--ghost" href="<?php echo esc_url(home_url('/our-puppies/')); ?>">Our puppies</a>
	</div>
</header>
<?php
get_footer();
