<?php

/* ----------------------- Location Custom Post Type --------------------------- */
 
//* Create location custom post type
add_action( 'init', 'location_post_type' );
function location_post_type() {
    register_post_type( 'location',
        array(
            'labels' => array(
                'name' => __( 'Location' ),
                'singular_name' => __( 'Location' ),
				'all_items'=> __( 'All Locations' )
            ),
            'public' => true,
            'rewrite' => array( 'slug' => 'stores' ),
            'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes'/*, 'genesis-seo', 'genesis-cpt-archives-settings'*/ ),
        )
    );
	flush_rewrite_rules();
}

//* Create new taxonomy
add_action( 'init', 'location_taxonomy', 0 );
function location_taxonomy() {
	$labels = array(
		'name'              => _x( 'Location Category', 'taxonomy general name' ),
		'singular_name'     => _x( 'Location Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Category' ),
		'all_items'         => __( 'All Location Categories' ),
		'parent_item'       => __( 'Parent Categories' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Categories' ), 
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category' ),
		'menu_name'         => __( 'Location Category' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_admin_column' => true
	);
	register_taxonomy( 'location_category', 'location', $args );
}

?>