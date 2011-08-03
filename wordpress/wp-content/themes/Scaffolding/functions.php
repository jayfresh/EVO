<?php 

// Custom header constants
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'scaffolding_header_image_width', 220 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'scaffolding_header_image_height', 220 ) );
define( 'NO_HEADER_TEXT', true );

// Allow for a custom header
add_custom_image_header();

// Allow for a custom background
add_custom_background();

add_post_type_support('page', 'excerpt');

// Register Main and Footer Menu
if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'main_menu', 'Main Menu' );
	register_nav_menu( 'footer_menu', 'Footer Menu' );
}


// Utility functions
function get_post_by_slug( $slug, $post_type='post' ) {
    global $post;
    $query = new WP_Query(
        array(
            'name' => $slug,
            'post_type' => $post_type
        )
    );
    while ( $query->have_posts() ) : $query->the_post();
		$the_post = $post;
	endwhile;
	wp_reset_query();
	return $the_post;
}

?>