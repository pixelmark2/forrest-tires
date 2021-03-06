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



//* Add archive content
add_action( 'genesis_loop', 'ft_archive_content' );
function ft_archive_content() { ?>

        <h1 class="ft-archive-title">Services</h1>

        <div class="wrap">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras porta vel mauris et fringilla. Quisque at lectus molestie, suscipit nunc a, tristique metus. Fusce maximus risus diam. Cras ut ullamcorper augue. Vestibulum laoreet consequat eros ac viverra. Phasellus non venenatis lorem, a ullamcorper mauris. Donec mi justo, viverra non euismod interdum, varius nec lorem. Etiam urna ipsum, tempus sodales porttitor sed, vehicula id dolor. Aenean convallis tincidunt consequat. Donec vitae euismod justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin fringilla ex sit amet metus lobortis, ut auctor sapien hendrerit.</p>
            
            <?php $ft_query2 = new WP_Query(
		array(
			'post_type' => 'service',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'title',
		)
	); 
	
    $n = 0;
    $c = 1;
    $u = $ft_query2->post_count;
    
	if ( $ft_query2->have_posts() ) : ?>
		<div class="ft-archive-block">
		<?php while ( $ft_query2->have_posts()  ) : $ft_query2->the_post(); ?>
            <?php if ( $c == 4*$n+1 ) : ?>
            <div class="ft-row">
            <div class="one-fourth first">
            <?php $n++; ?>
            <?php else: ?>
            <div class="one-fourth">
            <?php endif ?>
                <a href="<?php echo get_the_permalink(); ?>">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
                <h3><?php the_title(); ?></h3></a>
            </div>
        
        <?php if ( $c == 4*$n || $c == $u ) : ?>
            </div>
        <?php endif ?>
            <?php $c++; ?>
        <?php endwhile; ?>
        </div>
        <div class="clearfix"></div>
            <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    </div>
<?php }

genesis();