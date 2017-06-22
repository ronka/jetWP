<?php
/*
 *  Author: Ron Kantor
 *  URL: https://github.com/ronka/jetWP
 *  Custom functions, support, custom post types and more.
 */

/**
 * Hooks and Actions
 */

// Admin bar only for admins
if ( ! current_user_can( 'manage_options' ) ) {
  show_admin_bar( false );
}

// Enqueing styles and scripts
function add_theme_scripts(){
  // styles
  wp_enqueue_style( 'style', get_stylesheet_uri(), array('fonts'));
  wp_enqueue_style( 'fonts', get_template_directory_uri() . '/inc/webfont/stylesheet.css', array(), '1.0', 'all');

  // scripts
  wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

// Register menu
function register_menu(){
  register_nav_menu( 'main-menu', 'Main Menu' );
}
add_action('init', 'register_menu' );

// custom fonts
add_filter('mce_buttons', 'add_font_selection_to_tinymce');
function add_font_selection_to_tinymce($buttons) {
    array_push($buttons, 'fontselect');
    return $buttons;
}

// Customizer page
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

/*********************************
  Functions
**********************************/

// main menu config
function jetwp_nav(){
  wp_nav_menu(
    array(
      'theme_location'  => 'main-menu',
      'menu'            => '',
      'container'       => 'div',
      'container_class' => 'menu-{menu slug}-container',
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
      'walker'          => ''
    )
  );
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
  register_sidebar(array(
    'name' => 'איזור וידג\'טים 1',
    'description' => 'תיאור האיזור',
    'id' => 'widget-area-1',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
  register_sidebar(array(
    'name' => 'איזור וידג\'טים 2',
    'description' => 'תיאור האיזור',
    'id' => 'widget-area-2',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
    ));
}