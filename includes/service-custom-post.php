<?php

/* ----------------------- Service Custom Post Type --------------------------- */
 
//* Create service custom post type
add_action( 'init', 'service_post_type' );
function service_post_type() {
    register_post_type( 'service',
        array(
            'labels' => array(
                'name' => __( 'Service' ),
                'singular_name' => __( 'Service' ),
				'all_items'=> __( 'All Services' )
            ),
            'public' => true,
			'has_archive' => true,
            'rewrite' => array( 'slug' => 'services' ),
            'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes'/*, 'genesis-seo', 'genesis-cpt-archives-settings'*/ ),
        )
    );
	flush_rewrite_rules();
}

//* Create new taxonomy
add_action( 'init', 'service_taxonomy', 0 );
function service_taxonomy() {
	$labels = array(
		'name'              => _x( 'Services Category', 'taxonomy general name' ),
		'singular_name'     => _x( 'Services Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Category' ),
		'all_items'         => __( 'All Services Categories' ),
		'parent_item'       => __( 'Parent Categories' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Categories' ), 
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category' ),
		'menu_name'         => __( 'Services Category' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_admin_column' => true
	);
	register_taxonomy( 'service_category', 'service', $args );
}