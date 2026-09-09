</main>

<footer class="hr-footer">
	<div class="hr-footer__grid">
		<div class="hr-footer__brand">
			<p>We aren’t trying to raise the most puppies. We’re trying to raise our puppies the right way. Before they become part of your family, they’re part of ours.</p>
			<div class="hr-footer__social">
				<a href="<?php echo esc_url(havenridge_facebook()); ?>" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
					<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.04c-5.5 0-10 4.49-10 10.02 0 5 3.66 9.15 8.44 9.9v-7H7.9v-2.9h2.54V9.85c0-2.51 1.49-3.89 3.78-3.89 1.09 0 2.23.19 2.23.19v2.47h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.45 2.9h-2.33v7a10 10 0 0 0 8.44-9.9c0-5.53-4.5-10.02-10-10.02z"/></svg>
				</a>
				<a href="<?php echo esc_url(havenridge_instagram()); ?>" aria-label="Instagram" target="_blank" rel="noopener noreferrer">
					<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z"/></svg>
				</a>
			</div>
		</div>
		<div>
			<p class="hr-kicker">Our home</p>
			<ul class="hr-footer__home-links">
				<li><a href="<?php echo esc_url(home_url('/our-story/')); ?>">Raised in our family home</a></li>
				<li><a href="<?php echo esc_url(home_url('/meet-our-dogs/')); ?>">Meet the dogs behind the program</a></li>
				<li><a href="<?php echo esc_url(home_url('/about-bernedoodles/')); ?>">About Mini-Bernedoodles</a></li>
			</ul>
		</div>
		<div>
			<p class="hr-kicker">Talk with us</p>
			<?php if (havenridge_phone()) : ?>
				<p><a href="<?php echo esc_url(havenridge_phone_href()); ?>"><?php echo esc_html(havenridge_phone()); ?></a></p>
			<?php endif; ?>
			<p><a href="mailto:<?php echo esc_attr(havenridge_email()); ?>"><?php echo esc_html(havenridge_email()); ?></a></p>
			<p><a href="<?php echo esc_url(home_url('/contact/#contact')); ?>">Send a message</a></p>
		</div>
		<div>
			<p class="hr-kicker">Explore</p>
			<ul class="hr-footer__links">
				<li><a href="<?php echo esc_url(home_url('/our-puppies/')); ?>">Our puppies</a></li>
				<li><a href="<?php echo esc_url(home_url('/upcoming-litters/')); ?>">Upcoming litters</a></li>
				<li><a href="<?php echo esc_url(havenridge_apply_url()); ?>">Puppy application</a></li>
				<li><a href="<?php echo esc_url(home_url('/new-puppy-guide/')); ?>">New puppy guide</a></li>
				<li><a href="<?php echo esc_url(home_url('/alumni/')); ?>">Where are they now?</a></li>
				<li><a href="<?php echo esc_url(home_url('/about-bernedoodles/')); ?>">About Mini-Bernedoodles</a></li>
				<li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
				<li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy policy</a></li>
			</ul>
		</div>
	</div>
	<div class="hr-footer__bar">
		<p>© <?php echo esc_html(gmdate('Y')); ?> Stony Point Doodles. All rights reserved.</p>
		<p>This website was made by <a href="https://amerilistwebdesign.com/" target="_blank" rel="noopener noreferrer">Amerilist Web Design</a>.</p>
	</div>
</footer>

<div class="hr-mobile-cta">
	<a href="<?php echo esc_url(home_url('/our-puppies/')); ?>">Available</a>
	<a class="is-primary" href="<?php echo esc_url(havenridge_apply_url()); ?>">Apply now</a>
</div>

<?php wp_footer(); ?>
</body>
</html>
