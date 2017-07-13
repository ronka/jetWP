<?php 

// Custom Post type, coupons
function custom_post_type_coupon() {
  $labels = array(
    'name'                => 'קופונים',
    'singular_name'       => 'קופון',
    'menu_name'           => 'קופונים',
    'parent_item_colon'   => 'קופון אב',
    'all_items'           => 'כל הקופונים',
    'view_item'           => 'צפה בקופון',
    'add_new_item'        => 'הוסף קופון חדש',
    'add_new'             => 'הוסף חדש',
    'edit_item'           => 'ערוך קופון',
    'update_item'         => 'עדכן קופון',
    'search_items'        => 'חפש קופון',
    'not_found'           => 'לא נמצא',
    'not_found_in_trash'  => 'לא נמצא בסל מחזור'
  );
  
  $args = array(
    'label'               => 'קופונים',
    'description'         => 'קופונים לעסקים',
    'labels'              => $labels,
    'supports'            => array( 'title', 'thumbnail'),
    'taxonomies'          => array( 'post_tag', 'coupon-category' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-tickets-alt',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  
  register_post_type( 'coupons', $args );
}
//add_action( 'init', 'custom_post_type_coupon');

?>