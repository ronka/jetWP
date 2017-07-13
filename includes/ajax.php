<?php 

// ajax setup
function myplugin_ajaxurl() {
   echo '<script type="text/javascript"> var ajaxurl = "' . admin_url('admin-ajax.php') . '";</script>';
}
//add_action('wp_head', 'myplugin_ajaxurl');

// action: 'my_action'
function wp_ajax_my_action() {
  $data = get_fields($_POST['data'],false);

  echo json_encode($data);
  wp_die();
}
//add_action( 'wp_ajax_my_action', 'wp_ajax_my_action' );

?>