<?php
/**
 * Ajax Funtions
 *
 * @category   Template
 * @package    WordPress
 * @since      1.0.0
 */

/**
 * Print admin ajax url in header
 *
 * @return void
 */
function myplugin_ajaxurl() {
	echo '<script type="text/javascript"> var ajaxurl = "' . esc_js( admin_url( 'admin-ajax.php' ) ) . '";</script>';
}
// @add_action('wp_head', 'myplugin_ajaxurl');

/**
 * Example ajax function handler
 * action: my_action
 *
 * @return void
 */
function wp_ajax_my_action() {
	// Security check.
	check_ajax_referer( 'ajax-nonce', 'security' );

	echo wp_json_encode();
	wp_die();
}
// @add_action( 'wp_ajax_nopriv_my_action', 'wp_ajax_my_action' );
// @add_action( 'wp_ajax_my_action', 'wp_ajax_my_action' );
