<?php get_header(); ?>

	<section id="primary" class="blog-single">
		<div class="container">
			<?php while (have_posts()) {
				the_post(); 
				get_template_part( 'template-parts/content', 'single' );
			} ?>
		</div>
	</section>

<?php get_footer();