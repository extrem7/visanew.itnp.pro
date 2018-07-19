<?php

class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
	/**
	 * Display Element
	 */
	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( isset( $args[0] ) && is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		}

		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	/**
	 * Start Element
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( is_object( $args ) && ! empty( $args->has_children ) ) {
			$link_after = $args->link_after;
			$args->link_before = '';
			//$args->link_after = ' <b class="caret"></b>';
		}
		//pre($args);
		if ( is_object( $args ) && empty( $args->has_children ) ) {
			$flag = get_field( 'flag', $item );
			if ( $flag ) {
				$args->link_before = "<span class=\"flag\" style=\"background-image: url('" . $flag . "')\"></span>";
			}
		}
		if($depth == 0){
			$args->link_before = '';
		}
		parent::start_el( $output, $item, $depth, $args, $id );
		if ( is_object( $args ) && ! empty( $args->has_children ) ) {
			$args->link_before = '';
			$args->link_after = $link_after;
		}
	}

	/**
	 * Start Level
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "t", $depth );
		$output .= "\n$indent<ul class=\"dropdown-menu list-unstyled\">\n";
	}
}

add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args ) {
	if ( $args->has_children ) {
		$atts['data-toggle'] = 'dropdown';
		$atts['class']       = 'dropdown';
	}

	return $atts;
}, 10, 3 );

