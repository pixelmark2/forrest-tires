<?php

/** Remove the post info function */
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

//* Remove the entry title (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

/** Remove the author box on single posts */
remove_action( 'genesis_after_entry', 'genesis_do_author_box_single' );

/** Remove the post meta function */
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

/** Remove the comments template */
remove_action( 'genesis_after_entry', 'genesis_get_comments_template' );

//* Remove loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

//* Add left side post carousel
wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/includes/slick.min.js', array('jquery') );
wp_enqueue_script( 'slick-custom', get_stylesheet_directory_uri() . '/includes/slick-custom.js', array('slick', 'jquery') );
add_filter( 'body_class', 'ft_body_class' );
function ft_body_class( $classes ) {
	
	$classes[] = 'ft-carousel-page';
	return $classes;
	
}


//* Add archive content
add_action( 'genesis_loop', 'ft_archive_content' );
function ft_archive_content() { ?>


	<h1>Tires</h1>

	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras porta vel mauris et fringilla. Quisque at lectus molestie, suscipit nunc a, tristique metus. Fusce maximus risus diam. Cras ut ullamcorper augue. Vestibulum laoreet consequat eros ac viverra. Phasellus non venenatis lorem, a ullamcorper mauris. Donec mi justo, viverra non euismod interdum, varius nec lorem. Etiam urna ipsum, tempus sodales porttitor sed, vehicula id dolor. Aenean convallis tincidunt consequat. Donec vitae euismod justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin fringilla ex sit amet metus lobortis, ut auctor sapien hendrerit.</p>

	<?php $ft_query2 = new WP_Query(
		array(
			'post_type' => 'tire',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'title'
		)
	); 
	
	if ( $ft_query2->have_posts() ) :
		
		while ( $ft_query2->have_posts()  ) : $ft_query2->the_post(); ?>
		
			<div class="ft-one-third">
				<div class="tire-post-image" style='background-image: url("<?php echo the_post_thumbnail_url(); ?>")'>
				
				</div>
				<a href="<?php echo get_the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
			</div>
			
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		
	<?php endif; ?>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras porta vel mauris et fringilla. Quisque at lectus molestie, suscipit nunc a, tristique metus. Fusce maximus risus diam. Cras ut ullamcorper augue. Vestibulum laoreet consequat eros ac viverra. Phasellus non venenatis lorem, a ullamcorper mauris. Donec mi justo, viverra non euismod interdum, varius nec lorem. Etiam urna ipsum, tempus sodales porttitor sed, vehicula id dolor. Aenean convallis tincidunt consequat. Donec vitae euismod justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin fringilla ex sit amet metus lobortis, ut auctor sapien hendrerit.</p>
<?php


}

genesis();