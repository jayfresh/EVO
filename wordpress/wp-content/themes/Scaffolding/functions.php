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

function sitemap_shortcode($atts) {
	$args = array(
		'depth'        => 0,
		'show_date'    => '',
		'date_format'  => get_option('date_format'),
		'child_of'     => 0,
		'exclude'      => '',
		'include'      => '',
		'title_li'     => '',
		'echo'         => 1,
		'authors'      => '',
		'sort_column'  => 'menu_order, post_title',
		'link_before'  => '',
		'link_after'   => '',
		'walker' => '' ); ?>
	<ul>
	<?php wp_list_pages($args); ?>
	</ul>
<?php }
add_shortcode('sitemap', 'sitemap_shortcode');

// add_scripts

function add_Scaffolding_scripts() {
	$template_url = get_bloginfo( 'template_directory' );
	wp_deregister_script( 'jquery' );
	wp_enqueue_script('jquery',$template_url.'/js/jquery-1.6.1.js','','',true);
	wp_enqueue_script('ie6multipleclass',$template_url.'/js/jquery.ie6MultipleClass.min.js','','',true);
	wp_enqueue_script('easing',$template_url.'/js/jquery.easing.1.3.js','','',true);
	wp_enqueue_script('togglegrid',$template_url.'/js/togglegrid.js','','',true);
}    
 
add_action('init', 'add_Scaffolding_scripts');

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