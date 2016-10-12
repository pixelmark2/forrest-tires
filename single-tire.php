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

		<div class="ft-header">
			<div class="wrap">
					<h1 class="ft-header-title"><?php the_title(); ?></h1>
			</div>
		</div>
	
<?php
}

//* Add left side post carousel
add_filter( 'body_class', 'ft_body_class' );
function ft_body_class( $classes ) {
	
	$classes[] = 'ft-tire-page';
	return $classes;
	
}



//* Add entry content
add_action( 'genesis_entry_content', 'ft_entry_content' );
function ft_entry_content() { ?>

		<div class="wrap">
			<div class="ft-section left-featured-image">
				<div class="tire-featured-image" style='background-image: url("<?php echo the_post_thumbnail_url(); ?>")'>
				</div>
			</div>
			<div class="ft-section tire-info">
				<div class="tire-text">
					<div class="tire-text-header"><h1><?php the_title(); ?></h1><span class="tire-category"><?php echo $tire_description = get_field( 'tire_type' ); ?></span>
					</div>
					<h2 class="secondary-tire-title"><?php echo $secondary_tire_title = get_field( 'secondary_tire_title' ); ?></h2>
					<p><?php echo $tire_description = get_field( 'tire_description' ); ?></p>
				</div>
				<table border="0"  cellpadding=5>
					<thead>
						<tr>
							<th>Tire Size</th>
							<th>Rim Recommended (Inches)</th>
							<th>Cold Pressure Recommended Range Bar (PSI)</th>
							<th>Hot Pressure Recommended Range Bar (PSI)</th>
							<th>Warmer Usage C (F)</th>
						</tr>
					</thead>


<?php
$table = get_field( 'tire_table_data' );

if ( $table ) {

        echo '<tbody>';

            foreach ( $table['body'] as $tr ) {

                echo '<tr>';

                    foreach ( $tr as $td ) {

                        echo '<td>';
                            echo $td['c'];
                        echo '</td>';
                    }

                echo '</tr>';
            }

        echo '</tbody>';
}
?>
					</table>
				</div>
			</div>
	
<?php
}
			
genesis();