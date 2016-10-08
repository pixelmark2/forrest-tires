<?php

// Add full width body class
add_filter( 'body_class', 'ft_full_width_body_class' );
function ft_full_width_body_class( $classes ) {
	$classes[] = 'ft-full-width';
	return $classes;
}

//Add attributes
add_filter( 'genesis_attr_site-inner', 'ft_full_width_page_attributes_site_inner' );
function ft_full_width_page_attributes_site_inner( $attributes ) {
	$attributes['role']     = 'main';
	$attributes['itemprop'] = 'mainContentOfPage';

	return $attributes;
}

// Remove div.site-inner's div.wrap
add_filter( 'genesis_structural_wrap-site-inner', '__return_empty_string' );

// Display Header
get_header();

// Display Content
the_post(); // sets the 'in the loop' property to true.
the_content();

// Display Footer
get_footer();
