<?php
/**
 * Sidebar
 *
 * @category   Functions
 * @package    WordPress
 * @since      1.0.0
 */

// If Dynamic Sidebar Exists.
if ( function_exists( 'register_sidebar' ) ) {
	// Define Sidebar Widget Area 1.
	register_sidebar(
		array(
			'name'          => __( 'Widget Area 1' ),
			'description'   => __( 'Widget area description' ),
			'id'            => 'widget-area-1',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);
}
