<?php
/**
 * User Restricions
 *
 * @category   Functions
 * @package    WordPress
 * @since      1.0.0
 */

$user       = wp_get_current_user();
$admin_user = '';

if ( $user->user_login !== $admin_user ) {
	// Remove WordPress core update notice.
	add_filter( 'pre_site_transient_update_core', '__return_null' );
	// Remove all plugins update notice.
	add_filter( 'site_transient_update_plugins', '__return_false' );

	// @add_action( 'admin_menu', 'remove_menus', 999 );
}

/**
 * Remove pages from menu
 *
 * @return void
 */
function remove_menus() {
	remove_menu_page( 'plugins.php' ); // Plugins.
	remove_menu_page( 'tools.php' ); // Tools.

	remove_menu_page( 'edit.php?post_type=acf-field-group' ); // ACF settings page.
	remove_menu_page( 'yit_plugin_panel' ); // YITH plugins menu item.
}
