<?php
/**
 * Customizer API
 *
 * Starter settings to customizer
 *
 * @category   Functions
 * @package    WordPress
 * @since      1.0.0
 */

/**
 * Registering settings fields to Customizer
 *
 * @param WP_Customizer $wp_customize - object to add settings with.
 * @return void
 */
function jetwp_customize_register( $wp_customize ) {
	// Global theme settings.
	$wp_customize->add_section(
		'jetwp-settings',
		array(
			'title'    => __( 'General Theme Settings' ),
			'priority' => 30,
		)
	);

	// Logo.
	$wp_customize->add_setting( 'jetwp-settings--logo' );
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'jetwp-settings--logo',
			array(
				'label'    => __( 'Logo' ),
				'section'  => 'jetwp-settings',
				'settings' => 'jetwp-settings--logo',
			)
		)
	);
}
add_action( 'customize_register', 'jetwp_customize_register' );
