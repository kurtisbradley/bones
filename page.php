<?php get_header(); ?>
				
	<section id="primary" class="content-area">
		<?php 
		while (have_posts()) {
			the_post();
			get_template_part( 'template-parts/content', 'page' );
		}

		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		?>
	</section>
	
<?php get_footer(); ?>