<?php 

function custom_coupon_taxonomy() {
  register_taxonomy(
    'coupon-category',
    'coupon',
    array(
      'label' => 'קטגוריות קופונים',
      'rewrite' => array( 'slug' => 'coupons' ,'with_front' => false),
      'hierarchical' => true,
    )
  );
}
//add_action( 'init', 'custom_coupon_taxonomy' );

?>