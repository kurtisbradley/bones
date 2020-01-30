<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/favicon.ico" />
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/favicons/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/favicons/favicon-16x16.png" sizes="16x16" />

		<?php wp_head(); ?>
	</head>

	<?php
	$classes = array();
	$classes[] = 'fixed-header';
	?>

	<body <?php body_class($classes); ?>>
		<header class="site-header" role="banner">
			<h1 class="site-logo">
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
					<img src="<?php echo wp_get_attachment_url(26); ?>" title="<?php echo get_bloginfo('name'); ?>" alt="<?php echo get_bloginfo('name'); ?>">
				</a>
			</h1>
			<nav class="site-navigation" role="navigation">
				<a href="#" class="navigation-toggle"><span></span></a>
				<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
			</nav>
		</header>
		
		<div class="mobile-navigation">
			<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
		</div>

		<div class="site">
		
			<div class="parallax-container">
				<div class="site-banner parallax">
					<!--<div class="banner-image" style="background-image: url('')"></div>-->
				</div>
			</div>
				
			<main class="site-main" role="main">