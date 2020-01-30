<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	global $post;
	$slug = $post->post_name;
	switch ($slug) {
		case 'home':
			?>
			<div class="home">
				<div class="container container-small">
					<div class="home-intro section animate fade-up">
						<h1>This is Bones</h1>
						<p>The bare bones WordPress theme, developed to be a blank slate starting point of a build from scratch WordPress website. Made for developers who like the freedom and flexibility of a blank starting point to build upon.</p>
						<h4>Created by <a href="https://kurt.is" target="_blank" rel="noreferrer noopener">Kurtis Bradley</a></h4>
					</div>
				</div>
				<div class="container">
					<div class="home-columns section animate fade-up">
						<div class="row">
							<div class="col-12 col-md-4 col-sm-6">
								<i class="fas fa-bolt"></i>
								<h2>Column title</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget tempus diam.</p>
							</div>
							<div class="col-12 col-md-4 col-sm-6">
								<i class="fas fa-user"></i>
								<h2>Column title</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget tempus diam.</p>
							</div>
							<div class="col-12 col-md-4 col-sm-6">
								<i class="fas fa-cog"></i>
								<h2>Column title</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget tempus diam.</p>
							</div>
						</div>
					</div>
					<div class="home-outro">
						
					</div>
				</div>
			</div>
			<?php
		break;
		default:
			?>
			<div class="default">
				<div class="container">
					<header class="entry-header">
						<h1 class="entry-title"><?php echo get_the_title(); ?></h1>
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<?php
		break;
	}
	?>
</article>
