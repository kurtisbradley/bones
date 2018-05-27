<?php get_header(); ?>

	<div class="error-404 not-found">
		<div class="container">
			<h1>404</h1>
			<h2>Oops that page cannot be found.</h2>
			<a href="<?php echo site_url(); ?>" class="button">Home</a>
			<ul class="inline-list error-404-social">
				<li><a href="mailto:<?php echo get_option('theme_email'); ?>" target="_top"><i class="fas fa-envelope"></i></a></li>
			</ul>
		</div>
	</div>

<?php get_footer();