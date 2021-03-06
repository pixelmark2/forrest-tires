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

//* Enqueue scripts
wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBz06oMoasKKpneJIUzv2hR1c0mqByO_k4' );
wp_enqueue_script( 'google-maps-marker', get_stylesheet_directory_uri() . '/includes/google-map.js', array('google-maps', 'jquery') );


//* Add featured image and title/subtext in the header
add_action( 'genesis_entry_header', 'ft_entry_header' );
function ft_entry_header() { ?>

	<div class="ft-header" data-postid="<?php echo get_the_ID(); ?>" style="background: url('<?php echo get_field('featured_image')['sizes']['large']; ?>') no-repeat scroll center/cover;">
		<div class="ft-header-text-background">
			<div class="wrap">
				<div class="ft-header-text-container">
					<h1 class="ft-header-title"><?php the_title(); ?></h1>
					<p class="ft-header-text"><?php the_field('below_title_text'); ?></p>
				</div>
			</div>
		</div>
	</div>
	
<?php
}

//* Add content class
add_filter( 'genesis_attr_content', 'ft_content_class' );
function ft_content_class( $attributes ) {
	
	$attributes['class'] .= ' ft-fullwidth-content';
	return $attributes;
	
}

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

//* Add entry content
add_action( 'genesis_entry_content', 'ft_entry_content' );
function ft_entry_content() { ?>

		<div class="wrap">
			<div class="ft-section">
				<div class="ft-team-pic">
					<img src="<?php echo get_field('team_image')['sizes']['medium_large']; ?>" />	
				</div>
				<div class="ft-team-text-container">
					<p class="ft-team-text"><?php the_field('team_text'); ?></p>
					<p class="ft-team-address"><?php the_field('address'); ?></p>
				</div>
			</div>
			<?php if( have_rows('team_members') ): ?>
			<div class="ft-section">
				<h2 class="ft-team-heading">Team</h2>
				<div class="ft-team-pic-container">	
					<?php while ( have_rows('team_members') ) : the_row(); ?>
					<div class="ft-team-member-pic">
						<img src="<?php echo get_sub_field('picture')['sizes']['thumbnail']; ?>" />
						<h3 class="ft-team-name"><?php the_sub_field('name'); ?></h3>
						<p class="ft-team-position"><?php the_sub_field('position'); ?></p>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
			<?php endif; ?>
			<div class="ft-section">
				<div class="ft-map">
					<div class="marker" data-lat="<?php echo get_field('map')['lat']; ?>" data-lng="<?php echo get_field('map')['lng']; ?>"></div>
				</div>
			</div>
		</div>
	
<?php
}
			
genesis();