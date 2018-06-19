<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	global $post;
	$slug = $post->post_name;
	switch ($slug) {
		case 'home':
			?>
			<div class="home">
				<div class="s-container">
					<div class="home-intro section animate fade-up">
						<h1>Welcome to Bones</h1>
						<p>A bare bones WordPress theme, designed to be the ultimate blank slate starting point of a build from scratch web site. Made for developers who like building from a blank starting point, with no dependencies, and freedom of flexibility.</p>
						<h4>Created by <a href="https://kurt.is" target="_blank" rel="noreferrer noopener">Kurtis Bradley</a></h4>
					</div>
				</div>
				<div class="container">
					<div class="home-columns section animate fade-up">
						<div class="row">
							<div class="col s12 m4">
								<i class="fas fa-bolt"></i>
								<h2>Column title</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget tempus diam.</p>
							</div>
							<div class="col s12 m4">
								<i class="fas fa-user"></i>
								<h2>Column title</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget tempus diam.</p>
							</div>
							<div class="col s12 m4">
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
			<div class="container">
				<header class="entry-header">
					<h1 class="entry-title"><?php echo get_the_title(); ?></h1>
				</header>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</div>
			<?php
		break;
	}
	?>
</article>
