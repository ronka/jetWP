<?php

$current_user = wp_get_current_user();

if( $current_user->user_login != 'interjet' ){
    // Remove WordPress core update notice
    add_filter( 'pre_site_transient_update_core', '__return_null' );
    // Remove all plugins update notice
    add_filter( 'site_transient_update_plugins', '__return_false' );

    //add_action( 'admin_menu', 'remove_menus', 999 );
}

function remove_menus(){
    remove_menu_page( 'plugins.php' ); //Plugins
    remove_menu_page( 'tools.php' ); //Tools

    remove_menu_page( 'edit.php?post_type=acf-field-group' );
    remove_menu_page( 'wp_accessibility' );
    remove_menu_page( 'yit_plugin_panel' );
}