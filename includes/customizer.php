<?php

function jetwp_customize_register($wp_customize){
  // Global theme settings
  $wp_customize->add_section("jetwp-settings", array(
    "title" => __('General Theme Settings'),
    "priority" => 30,
  ));
  // Logo
  $wp_customize->add_setting("jetwp-settings--logo");
  $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize,"jetwp-settings--logo", array(
      "label" => __('Logo'),
      "section" => "jetwp-settings",
      "settings" => "jetwp-settings--logo"
    )
  ));
}
add_action("customize_register","jetwp_customize_register");

?>