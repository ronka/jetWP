<?php
/**
 * Menus
 *
 * Registering site menus
 *
 * @category   Functions
 * @package    WordPress
 * @since      1.0.0
 */

/**
 * Register menu on init
 *
 * @return void
 */
function register_menu() {
	register_nav_menu( 'main-menu', 'Main Menu' );
}
add_action( 'init', 'register_menu' );

/**
 * Global function to include main menu
 *
 * @return void
 */
function jetwp_nav() {
	wp_nav_menu(
		array(
			'theme_location'  => 'main-menu',
			'menu'            => '',
			'container'       => 'div',
			'container_class' => 'menu-main-menu-container',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul>%3$s</ul>',
			'depth'           => 0,
			'walker'          => '',
		)
	);
}
