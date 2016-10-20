<?php

/** Remove the post info function */
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

/** Remove the author box on single posts */
remove_action( 'genesis_after_entry', 'genesis_do_author_box_single' );

/** Remove the post meta function */
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

/** Remove the comments template */
remove_action( 'genesis_after_entry', 'genesis_get_comments_template' );

//* Add left side image
wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/includes/side-image-height.js', array('jquery') );

add_filter( 'body_class', 'ft_body_class' );
function ft_body_class( $classes ) {
	
	$classes[] = 'ft-left-image-page';
	return $classes;
	
}
add_action( 'genesis_before_content_sidebar_wrap', 'ft_side_image' );
function ft_side_image() { ?>
	<div class="ft-left-image" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/images/ft-side.jpg') no-repeat scroll center/cover;">

    <?php $ft_query = new WP_Query(
                    array(
                        'post_type' => 'service',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'orderby' => 'title',
                    )
                );
            if ( $ft_query->have_posts() ) : ?>
                <div class="ft-services-list">
                <?php while ( $ft_query->have_posts()  ) : $ft_query->the_post(); ?>
                    <a href="<?php echo get_the_permalink(); ?>">
                        <h4 class="ft-services-item"><?php echo get_the_title(); ?></h4>
                    </a>
                <?php endwhile; ?>
                </div>
        <?php wp_reset_postdata(); ?>
            <?php endif; ?>
    
</div>

<?php }

add_action( 'genesis_before_entry', 'ft_top_wrap' );
function ft_top_wrap() {
    echo '<div class="wrap"';
}

add_action( 'genesis_after_entry', 'ft_bottom_wrap' );
function ft_bottom_wrap() {
    echo '</div>';
}

genesis();