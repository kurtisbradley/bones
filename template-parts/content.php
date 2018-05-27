<?php 
	if (get_option('theme_blog_format') == 'grid') {
		$blog_format = 'grid col s12 m6 l4';
	} else {
		$blog_format = 'list clear';
	} 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($blog_format); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="entry-image">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

		</div>
	<?php } ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
</article>