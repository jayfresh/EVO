<?php
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
	    		$output .= "<li><ul class=\"nav grid4col left\">";
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
		$output .= "</li>\n";
	   	if($depth==0) {
		   	if($menu_count==0 || $menu_count % 3 == 1) {
	    		$output .= "</ul></li>";
    		}
    	}
    }
}

?>