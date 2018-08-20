<?php
/*
 *  Author: Ron Kantor
 *  URL: https://github.com/ronka/jetWP
 *  Custom functions, support, custom post types and more.
 */

/*********************************
  General Settings
**********************************/

// Admin bar only for admins
if ( ! current_user_can( 'manage_options' ) ) {
  show_admin_bar( false );
}

/**
 * Add Theme CSS fields
 *
 * @return void
 */
function add_theme_stylesheets(){
  // styles
  wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'add_theme_stylesheets');

/**
 * Add Theme JS scripts
 *
 * @return void
 */
function add_theme_scripts() {
  wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'));
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' ); 

/**
 * Add Theme Admin Stylesheets
 *
 * @return void
 */
function add_custom_admin_stylesheets() {
  wp_enqueue_style( 'admin-style',  get_template_directory_uri() . '/css/admin-style.css' );
}
add_action( 'admin_enqueue_scripts', 'add_custom_admin_stylesheets' );


// Add google maps api key to ACF
function my_acf_google_map_api( $api ){
  $api['key'] = '';
	return $api;
}
//add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// thumbnail support
if ( function_exists( 'add_image_size' ) ) { 
  add_image_size( 'coupon-thumbnail', 220, 135, true );
}
add_theme_support( 'post-thumbnails' );

// custom fonts
function add_font_selection_to_tinymce($buttons) {
  array_push($buttons, 'fontselect');
  return $buttons;
}
add_filter('mce_buttons', 'add_font_selection_to_tinymce');

/*********************************
  Includes
**********************************/

/**
 * Menus
 */
require_once( __DIR__ . '/includes/menus.php'); 

/**
 * Custom Posts Type
 */
require_once( __DIR__ . '/includes/custom-posts-type.php'); 

/**
 * Custom Taxonomy
 */
require_once(__DIR__ . '/includes/custom-taxonomy.php');

/**
 * Customizer page
 */
require_once( __DIR__ . '/includes/customizer.php');  

/**
 * Sidebars
 */
require_once( __DIR__ . '/includes/sidebars.php'); 

/**
 * Ajax Stuff
 */
require_once( __DIR__ . '/includes/ajax.php');

/**
 * Share
 */
require_once( __DIR__ . '/includes/share.php');

/**
 * Users Restrictions
 */
require_once( __DIR__ . '/includes/users-restrictions.php');