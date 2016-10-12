<?php
/**
 * Genesis Sample.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'genesis-sample', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'genesis-sample' ) );

//* Add Image upload and Color select to WordPress Theme Customizer
require_once( get_stylesheet_directory() . '/lib/customize.php' );

//* Include Customizer CSS
include_once( get_stylesheet_directory() . '/lib/output.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.2.4' );

//* Enqueue Scripts and Styles
add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
function genesis_sample_enqueue_scripts_styles() {

	wp_enqueue_style( 'genesis-sample-fonts', '//fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );

	wp_enqueue_script( 'genesis-sample-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true );
	$output = array(
		'mainMenu' => __( 'Menu', 'genesis-sample' ),
		'subMenu'  => __( 'Menu', 'genesis-sample' ),
	);
	wp_localize_script( 'genesis-sample-responsive-menu', 'genesisSampleL10n', $output );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

//* Add Accessibility support
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

// //* Add support for 3-column footer widgets
// add_theme_support( 'genesis-footer-widgets', 4 );

//* Add Image Sizes
add_image_size( 'featured-image', 720, 400, TRUE );

//* Rename primary and secondary navigation menus
add_theme_support( 'genesis-menus' , array( 'primary' => __( 'After Header Navigation', 'genesis-sample' ), 'secondary' => __( 'Footer Menu', 'genesis-sample' ) ) );

//* Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

//* Reduce the secondary navigation menu to one level depth
add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}

//* Modify size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
function genesis_sample_author_box_gravatar( $size ) {

	return 90;

}

//* Modify size of the Gravatar in the entry comments
add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}

/* -- Custom Forrest Tire code -- */

/* -- Include custom post types files -- */
if( file_exists( get_stylesheet_directory() . '/includes/location-custom-post.php' ) )
{
  require_once( get_stylesheet_directory() . '/includes/location-custom-post.php' );
}
if( file_exists( get_stylesheet_directory() . '/includes/service-custom-post.php' ) )
{
  require_once( get_stylesheet_directory() . '/includes/service-custom-post.php' );
}

//* Remove the header right widget area
unregister_sidebar( 'header-right' );

//* Add site logo and others to Primary Nav
add_filter( 'genesis_nav_items', 'ft_nav_site_title', 10, 2 );
add_filter( 'wp_nav_menu_items', 'ft_nav_site_title', 10, 2 );
function ft_nav_site_title( $menu, $args ) {

	$args = (array)$args;
	if ( 'primary' !== $args['theme_location']  )
		return $menu;
	$before = '<a href="' . home_url() . '"><div class="ft-nav-logo"></div></a>';
	$after = '<div class="ft-nav-links"><a href="#">Call</a><a href="#">Request a quote</a></div>';
	return $before . $menu . $after;

}

//* Change footer
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'ft_custom_footer' );
function ft_custom_footer() {
	?>
	<p>&copy; Copyright Notice <a href="#">Forrest Tires</a> &middot; All Rights Reserved &middot;</p>
	<?php
}

//* Add logo and text to header
add_action( 'genesis_header', 'ft_custom_header' );
function ft_custom_header() {
	echo '<div class="ft-header-container"><a href="' . home_url() . '"><div class="ft-header-logo"><img src="' . get_stylesheet_directory_uri() . '/images/logo-white-anniversary.png" /></div></a>';
	echo '<h2 class="ft-header-text">Serving you for over 70 years</h2></div>';
}

//* Reguster google maps api key
add_filter('acf/fields/google_map/api', 'tf_google_map_api');
function tf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyBz06oMoasKKpneJIUzv2hR1c0mqByO_k4';
	
	return $api;
	
}

genesis_register_sidebar( array(
	'id'          => 'footer-one',
	'class' => 'footer-widgets-1',
	'name'        => __( 'Footer Widget 1', 'altitude' ),
	'description' => __( 'This is the Footer Widget  input', 'altitude' ),
) );


genesis_register_sidebar( array(
	'id'          => 'footer-two',
	'name'        => __( 'Footer Widget 2', 'altitude' ),
	'description' => __( 'This is the Footer Widget  input', 'altitude' ),
) );


genesis_register_sidebar( array(
	'id'          => 'footer-three',
	'name'        => __( 'Footer Widget 3', 'altitude' ),
	'description' => __( 'This is the Footer Widget  input', 'altitude' ),
) );

genesis_register_sidebar( array(
	'id'          => 'footer-four',
	'name'        => __( 'Footer Widget 4', 'altitude' ),
	'description' => __( 'This is the Footer Widget  input', 'altitude' ),
) );



add_action ('genesis_before_footer','footer_widgets', 2);
function footer_widgets()  {
		echo '<div class="footer-widgets"><div class="wrap"><div class="inner-wrap">';
		genesis_widget_area ('footer-one', array(
		'before' => '<div class="footer-widgets-1 widget-area">',
		'after' => '</div>',
	));
		genesis_widget_area ('footer-two', array(
		'before' => '<div class="footer-widgets-2 widget-area">',
		'after' => '</div>',
	));
		genesis_widget_area ('footer-three', array(
		'before' => '<div class="footer-widgets-3 widget-area">',
		'after' => '</div>',
	));
		genesis_widget_area ('footer-four', array(
		'before' => '<div class="footer-widgets-4 widget-area">',
		'after' => '</div>',
	));
		echo '</div></div></div>';
}



genesis_register_sidebar( array(
	'id'          => 'home-1-left',
	'name'        => __( 'Home 1 Left', 'genesis-sample' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-1-right',
	'name'        => __( 'Home 1 Right', 'genesis-sample' ),
) );
genesis_register_sidebar( array(
	'id'          => 'social-bar',
	'name'        => __( 'Social Bar', 'genesis-sample' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-2',
	'name'        => __( 'Home 2', 'genesis-sample' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-3',
	'name'        => __( 'Home 3', 'genesis-sample' ),
) );


add_filter('widget_text', 'do_shortcode');