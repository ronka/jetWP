<?php
/**
 *  Author: Ron Kantor
 *  URL: https://github.com/ronka/jetWP
 *  Custom functions, support, custom post types and more.
 *
 * @package WordPress
 */

/*********************************
	General Settings
 *********************************/

define( 'ENV', 'dev' );

// Admin bar only for admins.
if ( ! current_user_can( 'manage_options' ) ) {
	show_admin_bar( false );
}

/**
 * Add Theme CSS fields
 */
function add_theme_stylesheets() {
	if ( ENV === 'production' ) {
		wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css.gz', array(), '1.0' );
	} else {
		wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1.0' );
	}
}
add_action( 'wp_enqueue_scripts', 'add_theme_stylesheets' );

/**
 * Add Theme JS scripts
 */
function add_theme_scripts() {
	if ( ENV === 'production' ) {
		wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/app.js.gz', array( 'jquery' ), '1.0', true );
	} else {
		wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery' ), '1.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/**
 * Add Theme Admin Stylesheets
 */
function add_custom_admin_stylesheets() {
	wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/css/admin-style.css', array(), '1.0' );
}
// @add_action( 'admin_enqueue_scripts', 'add_custom_admin_stylesheets' );

/**
 * Add google maps api key to ACF
 *
 * @param String $api - google api key.
 */
function my_acf_google_map_api( $api ) {
	$api['key'] = '';
	return $api;
}
// @add_filter('acf/fields/google_map/api', 'my_acf_google_map_api' );

/**
 * Thumbnail Support
 */
if ( function_exists( 'add_image_size' ) ) {
	// @add_image_size( 'example-thumbnail', 220, 135, true );
	add_theme_support( 'post-thumbnails' );
}

/**
 *  Includes
 */

// Menus.
require_once __DIR__ . '/includes/menus.php';

// Custom Posts Type.
require_once __DIR__ . '/includes/custom-posts-type.php';

// Custom Taxonomy.
require_once __DIR__ . '/includes/custom-taxonomy.php';

// Customizer page.
require_once __DIR__ . '/includes/customizer.php';

// Sidebars.
require_once __DIR__ . '/includes/sidebars.php';

// Ajax Stuff.
require_once __DIR__ . '/includes/ajax.php';

// Share.
require_once __DIR__ . '/includes/share.php';

// Users Restrictions.
require_once __DIR__ . '/includes/users-restrictions.php';
