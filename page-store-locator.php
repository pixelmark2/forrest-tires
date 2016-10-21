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
    <div class="ft-left-image" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/images/ft-side.jpg') no-repeat scroll center/cover;"></div>
    <?php }

//* Add archive content
add_action( 'genesis_loop', 'ft_archive_content' );
function ft_archive_content() { ?>


        <h1 class="ft-archive-title">Store Locator</h1>
        <div class="wrap">
        <?php
    genesis_widget_area ('store-search', array(
        'before' => '<div class="store-search-widget widget-area">',
        'after' => '</div>',
    ));?>
    
    <?php
// Display Content
the_post(); // sets the 'in the loop' property to true.
the_content(); ?>
</div>
<?php
 }

genesis();