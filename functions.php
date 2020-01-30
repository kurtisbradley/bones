<?php
/*
Theme Name: Bones
Theme URI: https://kurt.is
Author: Kurtis Bradley
Author URI: https://kurt.is
Version: 1.0.0
Text Domain: bones
*/


/*--------------------------------------------------------------
WordPress
--------------------------------------------------------------*/
function bones_setup() {
	// translations
	load_theme_textdomain('bones', get_template_directory() . '/languages');

	// add default posts and comments RSS feed links to head
	add_theme_support('automatic-feed-links');

	// add document title to head
	add_theme_support('title-tag');

	// thumbnails
	add_theme_support('post-thumbnails');

	// register menus
	register_nav_menus(array(
		'primary' => esc_html__('Primary Menu', 'bones'),
	));

	// html5 support
	add_theme_support('html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	// enable support for post formats.
	add_theme_support('post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	));
}
add_action('after_setup_theme', 'bones_setup');

// register widgets
function bones_widgets_init() {
	register_sidebar(array(
		'name'          => esc_html__( 'Sidebar', 'bones' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
}
add_action( 'widgets_init', 'bones_widgets_init' );

// enqueue scripts and styles
function bones_scripts() {
	// css
	wp_enqueue_style('main', get_stylesheet_uri());

	// js
	wp_enqueue_script('main', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'));
	wp_localize_script('main', 'main_ajax', array('url' => admin_url('admin-ajax.php'), 'token' => wp_create_nonce('bones_nonce')));
	
	// comments
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'bones_scripts');

// hide admin bar
show_admin_bar(false);



/*--------------------------------------------------------------
Plugins
--------------------------------------------------------------*/
// register acf options pages
//if (function_exists('acf_add_options_page')) {
//	acf_add_options_page();
//}



/*--------------------------------------------------------------
Blog Options
--------------------------------------------------------------*/
// change excerpt length
function change_excerpt_length() {
	return 50;
}
add_filter('excerpt_length', 'change_excerpt_length', 999);

// change excerpt more 
function change_excerpt_more() {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('[Read More]', 'bones') . '</a>';
}
add_filter('excerpt_more', 'change_excerpt_more');

// blog pagination
function pagination($pages = '', $range = 2) {  
	$showitems = ($range * 2)+1;  
	global $paged;
	if (empty($paged)) $paged = 1;

	if ($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if (!$pages) {
		    $pages = 1;
		}
	}   
	if (1 != $pages) {
		echo "<div class='pagination'>";
		if ($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
		if ($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
			}
		}
		if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
		echo "</div>\n";
	}
}



/*--------------------------------------------------------------
Theme Options
--------------------------------------------------------------*/
// add theme options menu item in wordpress admin
function add_theme_menu_item() {
	add_theme_page('Theme Options', 'Theme Options', 'manage_options', 'theme-options', 'theme_option_page', null, 99);
}
add_action('admin_menu', 'add_theme_menu_item');

// setup theme options backend page
function theme_option_page() { ?>
	<div class="wrap">
		<h1>Bones Theme Options</h1>
		<form method="post" action="options.php">
			<?php
			settings_fields('theme-options-group');
			do_settings_sections('theme-options');
			submit_button();
			?>
		</form>
	</div>
	<?php
}

// theme options blog format
function theme_blog_format_callback() {
	if (empty(get_option('theme_blog_format'))) {
		update_option('theme_blog_format', 'grid');
	}
	echo '<input type="radio" name="theme_blog_format" value="grid"'.checked('grid', get_option('theme_blog_format'), false).'> Grid
	<input type="radio" name="theme_blog_format" value="list"'.checked('list', get_option('theme_blog_format'), false).'> List';
}

// theme options settings
function theme_settings() {
	add_settings_section('theme_options_section', 'General Options', '', 'theme-options');
	
	add_settings_field('blog_format', 'Blog Format', 'theme_blog_format_callback', 'theme-options', 'theme_options_section');
	register_setting('theme-options-group', 'theme_blog_format');
}
add_action('admin_init', 'theme_settings');