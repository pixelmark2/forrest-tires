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
wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/includes/slick.min.js', array('jquery') );
wp_enqueue_script( 'slick-custom', get_stylesheet_directory_uri() . '/includes/slick-custom.js', array('slick', 'jquery') );

//* Add Image Sizes
add_image_size( 'featured-image', 720, 400, TRUE );

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

//* Add left side post carousel
add_filter( 'body_class', 'ft_body_class' );
function ft_body_class( $classes ) {
	
	$classes[] = 'ft-carousel-page';
	return $classes;
	
}

add_action( 'genesis_before_content_sidebar_wrap', 'ft_side_carousel' );
function ft_side_carousel() {
	
	$ft_query = new WP_Query(
		array(
			'post_type' => 'location',
			'posts_per_page' => -1,
		)
	);
	$count = 0;
	if ( $ft_query->have_posts() ) : ?>
	
		<div class="ft-carousel">

		<p class="ft-carousel-title">Location</p>
		<?php while ( $ft_query->have_posts()  ) : $ft_query->the_post(); ?>
		
			<div class="ft-carousel-item" data-count="<?php echo $count; ?>" id="<?php echo get_the_ID(); ?>" style="background: url('<?php echo get_field('featured_image')['sizes']['medium']; ?>') no-repeat scroll center/cover;">
				<div class="ft-carousel-item-overlay">
					<a href="<?php echo get_the_permalink(); ?>"><h3 class="ft-carousel-item-title"><?php the_title(); ?></h3></a>
				</div>
			</div>
		<?php $count++ ;?>
		<?php endwhile; ?>
		</div>
		<?php wp_reset_postdata(); ?>

	<?php endif;
}

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