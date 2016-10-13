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
	
	$classes[] = 'ft-tire-page ft-carousel-page';
	return $classes;
	
}


add_action( 'genesis_before_content_sidebar_wrap', 'ft_side_carousel' );
function ft_side_carousel() {
	
	$ft_query = new WP_Query(
		array(
			'post_type' => 'tire',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'title'
		)
	);
	$count = 0;
	$prev_post = get_previous_post();
	$prev_url = $prev_post->guid;

	$next_post = get_next_post();
	$next_url = $next_post->guid;

	$current_post_id = get_the_ID();
	if ( $ft_query->have_posts() ) : ?>
		<div class="ft-menu-wrapper">
			<p class="ft-menu-title">Location</p>
			<div class="ft-menu">
			<?php while ( $ft_query->have_posts()  ) : $ft_query->the_post(); ?>
				<?php $menu_item_id = get_the_ID(); ?>
				<div class="ft-menu-item <?php if ($current_post_id == $menu_item_id) {echo 'current-ft-menu-item';}; ?>" data-count="<?php echo $count; ?>">
					<img src="<?php echo the_post_thumbnail_url(); ?>">
						<a href="<?php echo get_the_permalink(); ?>"><h3 class="ft-menu-item-title"><?php the_title(); ?></h3></a>

				</div>
				
			<?php $count++ ;?>
			<?php endwhile; ?>

			</div>
			<?php wp_reset_postdata(); ?>
			</div>
	<?php endif;
}



//* Add entry content
add_action( 'genesis_entry_content', 'ft_entry_content' );
function ft_entry_content() { ?>

		<div class="wrap">

			<div class="ft-section tire-info">
				<div class="tire-text">
					<div class="tire-text-header"><h1><?php the_title(); ?></h1><span class="tire-category"><?php echo $tire_description = get_field( 'tire_type' ); ?></span>
					</div>
					<h2 class="secondary-tire-title"><?php echo $secondary_tire_title = get_field( 'secondary_tire_title' ); ?></h2>
			<div class="ft-section left-featured-image">
				<div class="tire-featured-image" style='background-image: url("<?php echo the_post_thumbnail_url(); ?>")'>
				</div>
			</div>
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