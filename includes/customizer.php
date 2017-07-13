<?php

function jetwp_customize_register($wp_customize){
  // Global theme settings
  $wp_customize->add_section("jetwp-settings", array(
    "title" => "הגדרות כלליות",
    "priority" => 30,
  ));
  // Logo
  $wp_customize->add_setting("settings-logo");
  $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize,"settings-logo", array(
      "label" => "לוגו",
      "section" => "jetwp-settings",
      "settings" => "settings-logo"
    )
  ));
}
add_action("customize_register","jetwp_customize_register");

?>