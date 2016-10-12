<?php
wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/includes/slick.min.js', array('jquery') );
wp_enqueue_script( 'slick-custom', get_stylesheet_directory_uri() . '/includes/slick-custom.js', array('slick', 'jquery') );



//* Add full width body class
add_filter( 'body_class', 'ft_full_width_body_class' );
function ft_full_width_body_class( $classes ) {
	$classes[] = 'ft-full-width';
	return $classes;
}

//* Add attributes
add_filter( 'genesis_attr_site-inner', 'ft_full_width_page_attributes_site_inner' );
function ft_full_width_page_attributes_site_inner( $attributes ) {
	$attributes['role']     = 'main';
	$attributes['itemprop'] = 'mainContentOfPage';

	return $attributes;
}

//* Remove div.site-inner's div.wrap
add_filter( 'genesis_structural_wrap-site-inner', '__return_empty_string' );


//* Use h1 for site title
add_filter( 'genesis_site_title_wrap', 'ft_h1_for_site_title' );
function ft_h1_for_site_title( $wrap ) {
	return 'h1';
}

//* Add homepage widgets
add_action( 'genesis_after_header', 'ft_home_widgets' );
function ft_home_widgets() {
	
	echo '<div class="home-widgets">';
	
	if ( is_active_sidebar( 'home-1-left' ) || is_active_sidebar( 'home-1-right' ) ) {
	
		echo '<div class="home-1">';
		
			genesis_widget_area( 'home-1-left', array(
				'before' => '<div id="home-1-left" class="home-1-left widget-area"><div class="wrap">',
				'after'  => '</div></div>',
			) );
			
			genesis_widget_area( 'home-1-right', array(
				'before' => '<div id="home-1-right" class="home-1-right widget-area"><div class="wrap">',
				'after'  => '</div></div>',
			) );
	
		echo '</div><!-- end .home-1 -->';
		
	}

	genesis_widget_area( 'social-bar', array(
		'before' => '<div id="social-bar" class="social-bar"><div class="wrap">',
		'after'  => '</div></div>',
	) );

	genesis_widget_area( 'home-2', array(
		'before' => '<div id="home-2" class="home-2 widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
	
	genesis_widget_area( 'home-3', array(
		'before' => '<div id="home-3" class="home-3 widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
	
	echo '</div>';
}

// Display Header
get_header();

// Display Content
the_post(); // sets the 'in the loop' property to true.
the_content();

// Display Footer
get_footer();