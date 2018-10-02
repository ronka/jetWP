<?php 

// Register menu
function register_menu(){
  register_nav_menu( 'main-menu', 'Main Menu' );
}
add_action('init', 'register_menu' );

// main menu config
function jetwp_nav(){
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
      'walker'          => ''
    )
  );
}

?>