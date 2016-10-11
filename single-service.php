<?php

/** Remove the post info function */
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

/** Remove the author box on single posts */
remove_action( 'genesis_after_entry', 'genesis_do_author_box_single' );

/** Remove the post meta function */
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

/** Remove the comments template */
remove_action( 'genesis_after_entry', 'genesis_get_comments_template' );

//* Add left side post carousel
wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/includes/slick.min.js', array('jquery') );
wp_enqueue_script( 'slick-custom', get_stylesheet_directory_uri() . '/includes/slick-custom.js', array('slick', 'jquery') );
add_filter( 'body_class', 'ft_body_class' );
function ft_body_class( $classes ) {
	
	$classes[] = 'ft-carousel-page';
	return $classes;
	
}
add_action( 'genesis_before_content_sidebar_wrap', 'ft_side_carousel' );
function ft_side_carousel() {
	?>
	<div class="ft-header" style="display: none;" data-postid="<?php echo get_the_ID(); ?>"></div>
	<?php
	$ft_query = new WP_Query(
		array(
			'post_type' => 'service',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'title'
		)
	);
	$count = 0;
	if ( $ft_query->have_posts() ) : ?>
	
		<div class="ft-carousel-wrapper">
			<p class="ft-carousel-title">Services</p>
			<div class="ft-carousel">
			<?php while ( $ft_query->have_posts()  ) : $ft_query->the_post(); ?>
				
				<div class="ft-carousel-item" data-count="<?php echo $count; ?>" id="<?php echo get_the_ID(); ?>")>
						<a href="<?php echo get_the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'medium' ); ?>" /></a>
				</div>
				
			<?php $count++ ;?>
			<?php endwhile; ?>
			</div>
			<?php wp_reset_postdata(); ?>
			</div>
	<?php endif;
}

genesis();