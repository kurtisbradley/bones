<?php get_header(); ?>

	<section id="primary" class="blog-archive">
		<div class="container">
			<?php if (get_option('theme_blog_format') == 'grid') { echo '<div class="row">'; } ?>
				<?php if (have_posts()) { ?>
					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header>
					<?php
					while (have_posts()) {
						the_post();
						get_template_part('template-parts/content', get_post_format());
					}
				} else {
					get_template_part( 'template-parts/content', 'none' );
				}
				?>
			<?php if (get_option('theme_blog_format') == 'grid') { echo '</div>'; } ?>
			<?php if (function_exists("pagination")) { pagination(); } ?>
		</div>
	</section>

<?php get_footer();