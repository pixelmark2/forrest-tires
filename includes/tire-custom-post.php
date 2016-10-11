<?php

/* ----------------------- Location Custom Post Type --------------------------- */
 
//* Create location custom post type
add_action( 'init', 'tire_post_type' );
function tire_post_type() {
    register_post_type( 'tire',
        array(
            'labels' => array(
                'name' => __( 'Tire' ),
                'singular_name' => __( 'Tire' ),
				'all_items'=> __( 'All Tires' )
            ),
            'public' => true,
            'rewrite' => array( 'slug' => 'tires' ),
            'supports' => array( 'title', 'thumbnail', 'page-attributes'/*, 'genesis-seo', 'genesis-cpt-archives-settings'*/ ),
        )
    );
	flush_rewrite_rules();
}

//* Create new taxonomy
add_action( 'init', 'tire_taxonomy', 0 );
function tire_taxonomy() {
	$labels = array(
		'name'              => _x( 'Tire Category', 'taxonomy general name' ),
		'singular_name'     => _x( 'Tire Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Category' ),
		'all_items'         => __( 'All Tire Categories' ),
		'parent_item'       => __( 'Parent Categories' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Categories' ), 
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category' ),
		'menu_name'         => __( 'Tire Category' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_admin_column' => true
	);
	register_taxonomy( 'tire_category', 'tire', $args );
}

?>