<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php echo get_the_title(); ?></h1>
	</header>
	
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="entry-image">
			<?php the_post_thumbnail('full'); ?>
		</div>
	<?php } ?>
	
	<div class="entry-content">
		<?php if ( 'post' === get_post_type() ) { ?>
			<div class="entry-meta">
				<?php echo get_the_date('F jS, Y'); ?>
			</div>
		<?php }
		the_content();
		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bones' ),
			'after'  => '</div>',
		));
		?>
	</div>
	
	<div class="social-shares">
		<a class="social-share-link" href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&amp;body=<?php echo urlencode(get_permalink()); ?>" target="_self" rel="noreferrer noopener" aria-label="">
			<div class="social-share-button social-share-button-email">
				<div aria-hidden="true" class="social-share-icon">
					<i class="fas fa-envelope"></i>
				</div>
			</div>
		</a>
		<a class="social-share-link" href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noreferrer noopener" aria-label="">
			<div class="social-share-button social-share-button-facebook">
				<div aria-hidden="true" class="social-share-icon">
					<i class="fab fa-facebook-square"></i>
				</div>
			</div>
		</a>
		<a class="social-share-link" href="https://twitter.com/intent/tweet/?text=<?php echo urlencode(get_the_title()); ?>&amp;url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noreferrer noopener" aria-label="">
			<div class="social-share-button social-share-button-twitter">
				<div aria-hidden="true" class="social-share-icon">
					<i class="fab fa-twitter-square"></i>
				</div>
			</div>
		</a>
	</div>
</article>