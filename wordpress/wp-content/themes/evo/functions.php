<?php
add_theme_support('post-thumbnails');
add_image_size( 'carousel', 615, 324, true );

// Register Main and Footer Menu
if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'search_box_menu', 'Search Box Menu' );
}

/**
 * Create nested UL's for top-level items.
 *
 * with help from Description_Walker by toscho, http://toscho.de
 */
$menu_count=0;
class Multiple_UL_Walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth) {
    	$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
    function end_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
    }
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array $args    Additional strings.
     * @return void
     */
    function start_el(&$output, $item, $depth, $args)
    {
    	global $menu_count;
    	if($depth==0) {
    		if($menu_count==0 || $menu_count % 3 == 1) {
	    		$output .= "<li id=\"menu-count-$menu_count\"><ul class=\"nav grid4col left\">";
    		}
    		$menu_count++;
    	}
    
        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = join(
            ' ',
            apply_filters(
                'nav_menu_css_class',
                array_filter( $classes ),
                $item
            )
        );

        ! empty ( $class_names )
            and $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= "<li id='menu-item-$item->ID' $class_names>";

        $attributes  = '';

        ! empty( $item->attr_title )
            and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
            and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
            and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
            and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        
        $item_output = $args->before
            . "<a $attributes>"
            . $args->link_before
            . $title
            . '</a> '
            . $args->link_after
            . $args->after;

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el',
            $item_output,
            $item,
            $depth,
            $args
        );
    }
    function end_el(&$output, $item, $depth, $args) {
		global $menu_count;
		global $menu_limit;
		$output .= "</li>\n";
	   	if($depth==0) {
		   	if($menu_count==0 || $menu_count % 3 == 1 || $menu_count==$menu_limit) {
	    		$output .= "</ul></li>";
    		}
    	}
    }
}

function nav_menu_func($sorted_menu_items, $args) {
	global $menu_limit;
	$menu_limit=0;
	foreach($sorted_menu_items as $item) :
		if($item->menu_item_parent==0) {
			$menu_limit++;
		}
	endforeach;
	return $sorted_menu_items;
}

add_filter('wp_nav_menu_objects', nav_menu_func, 10, 2);

function add_scripts() {
	$template_url = get_bloginfo( 'stylesheet_directory' );	
	wp_enqueue_script('hoverIntent',$template_url.'/js/jquery.hoverIntent.min.js','','',true);
	wp_enqueue_script('placeholder',$template_url.'/js/jquery.placeholder.min.js','','',true);
}    

add_action('wp_loaded', 'add_scripts'); // wp_loaded chosen as it is after init, which is used by parent theme to register scripts


/* addThis widget */

function addThis($link) { ?>
<div class="addthis_toolbox addthis_default_style"<?php if (isset($link)) { echo ' addthis:url="'.$link.'"'; } ?>>
   <div class="custom_images">
      <a class="addthis_button_facebook"></a>
      <a class="addthis_button_twitter"></a>
      <a class="addthis_button_email"></a>
      <a class="addthis_button_print"></a>
   </div>
</div>	
<?php }

add_action('wp_footer', 'addThisScript');

function AddThisScript() { ?>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js"></script>
<?php }

// Add Q&A post type

if ( ! function_exists( 'post_type_q_a' ) ) :

function post_type_q_a() {

	register_post_type( 
		'q_a',
		array( 
			'label' => __('Q&A'),
			'labels' => array(
				'singular_name'=>'Q&A'
			),
			'description' => __('Create a Q&A'), 
			'public' => true, 
			'show_ui' => true,
			'register_meta_box_cb' => 'init_metaboxes_q_a',
			'supports' => array (
				'title',
				'thumbnail',
				//'editor',
				'page-attributes'
			),
			'hierarchical' => true
		)
	);

}

endif;

add_action('init', 'post_type_q_a');

function init_metaboxes_q_a() {
	if ( function_exists( 'add_meta_box' ) ) {
		add_meta_box( "Answer page", __( "Answer page" ), 'answer_box', 'q_a', 'normal', 'high' );
	}
}

// this handles the nonces and HTML for the answer box
function answer_box() {
	global $post;
	static $q_a_nonce_flag = false;
	echo '<div style="width: 95%%; margin: 10px auto 10px auto; background-color: #F9F9F9; border: 1px solid #DFDFDF; -moz-border-radius: 5px; -webkit-border-radius: 5px; padding: 10px;">';
	// Run once
	if ( ! $q_a_nonce_flag ) {
		echo_q_a_nonce();
		$q_a_nonce_flag = true;
	}
	// Generate box contents
	$url_stem = get_bloginfo('wpurl');
	$val = get_post_meta($post->ID, '_q_a_link', true);
	echo '<div style="overflow:hidden;  margin-top:10px;">'.
		'<div style="float:left; padding-top:7px;"><label for="_q_a_link"><strong>'.$url_stem.'/</strong></label></div>'.
		'<div style="width:500px; float:left;"><input style="width: 80%%;" type="text" name="_q_a_link" id="_q_a_link" value="'.$val.'" />'.
		'<p style="clear:both"><em>Complete the URL for the page name</em></p></div>'.
	'</div>';
	echo '</div>';
}

function echo_q_a_nonce () {
	// Use nonce for verification ... ONLY USE ONCE!
	echo sprintf(
		'<input type="hidden" name="%1$s" id="%1$s" value="%2$s" />',
		'q_a_nonce_name',
		wp_create_nonce( plugin_basename(__FILE__) )
	);
}

/* When the post is saved, saves our custom data */
if ( ! function_exists( 'q_a_save_postdata' ) ) :
function q_a_save_postdata($post_id, $post) {
	$post_type = $_POST['post_type'];
	if($post_type!='q_a') {
		return;
	}
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( ! wp_verify_nonce( $_POST['q_a_nonce_name'], plugin_basename(__FILE__) ) ) {
		return $post->ID;
	}
	// Is the user allowed to edit the post or page?
	if ( 'page' == $post_type ) {
		if ( ! current_user_can( 'edit_page', $post->ID ))
			return $post->ID;
		} else {
		if ( ! current_user_can( 'edit_post', $post->ID ))
			return $post->ID;
		}
		// OK, we're authenticated: we need to find and save the data
		// We'll put it into an array to make it easier to loop though.
		// The data is already in $sp_boxes, but we need to flatten it out.
		$key = '_q_a_link';
		$to_save = $_POST[$key];
		// if $value is an array, make it a CSV (unlikely)
		$value = implode(',', (array)$to_save);
		if ( get_post_meta($post->ID, $key, FALSE) ) {
			// Custom field has a value.
			update_post_meta($post->ID, $key, $value);
		} else {
			// Custom field does not have a value.
			add_post_meta($post->ID, $key, $value);
		if (!$value) {
			// delete blanks
			delete_post_meta($post->ID, $key);
		}
	}
}
endif;

if ( ! function_exists( 'echo_q_a_nonce' ) ) :
function echo_q_a_nonce () {
	// Use nonce for verification ... ONLY USE ONCE!
	echo sprintf(
		'<input type="hidden" name="%1$s" id="%1$s" value="%2$s" />',
		'q_a_nonce_name',
		wp_create_nonce( plugin_basename(__FILE__) )
	);
}
endif;

// Use the save_post action to do something with the data entered
// Save the custom fields
add_action( 'save_post', 'q_a_save_postdata', 1, 2 );

// A simple function to get data stored in a custom field
if ( !function_exists('get_custom_field') ) {
	function get_custom_field($field) {
		global $post;
		$custom_field = get_post_meta($post->ID, $field, true);
		echo $custom_field;
	}
}

function evo_widgets_init() {
	register_sidebar( array(
			'name' => __( 'News sidebar', 'evo' ),
			'id' => 'news-sidebar',
			'description' => __( 'Where to put the Twitter widget', 'evo' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'evo_widgets_init' );

add_shortcode('sub-topic', 'sub_topic_shortcode');

function sub_topic_shortcode($attr, $content = null) {
	$link = $attr ? $attr[0] : "#";
	return '<a class="block" href="'.$link.'">'.$content.'</a>';
}

add_shortcode('start-topic', 'start_topic_shortcode');
$topic_shortcode_count = 0;
function start_topic_shortcode($attr) {
	global $post;
	global $topic_shortcode_count;
	$link = $attr ? $attr[0] : "#";
	$img = get_the_post_thumbnail( $post->ID );
	$topic_shortcode_count++;
	$html = $topic_shortcode_count==1 ? '<div class="grid18col">' : '';
	$html .= '<div class="bigblock">'.$img.'<div class="container">';
	return $html;
}

add_shortcode('end-topic', 'end_topic_shortcode');

function end_topic_shortcode($attr) {
	global $topic_shortcode_count;
	$html = $topic_shortcode_count==4 ? "</div>" : "";
	$html .="</div></div>";
	return $html;
}

?>