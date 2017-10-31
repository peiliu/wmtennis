<?php
/*
Plugin Name: Wmtennis
Plugin URI: 
Description: 
Author: 
Version: 
Author URI: 
*/

define( 'WMTENNIS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'WMTENNIS_PLUGIN_URL', plugin_dir_url(__FILE__ ));

register_activation_hook(__FILE__, 'wmtennis_activate');
register_deactivation_hook(__FILE__, 'wmtennis_deactivate');

function wmtennis_activate() {
    global $wp_rewrite;
    require_once dirname(__FILE__).'/wmtennis_loader.php';
    $loader = new WmtennisLoader();
    $loader->activate();
    $wp_rewrite->flush_rules( true );
}

function wmtennis_deactivate() {
    global $wp_rewrite;
    require_once dirname(__FILE__).'/wmtennis_loader.php';
    $loader = new WmtennisLoader();
    $loader->deactivate();
    $wp_rewrite->flush_rules( true );
}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

add_action( 'wp_ajax_my_action', 'my_action' );
add_action( 'wp_ajax_nopriv_my_action', 'my_action' );
function my_action() {
    global $wpdb; // this is how you get access to the database
    
    $whatever = intval( $_POST['whatever'] );
    
    $whatever += 10;
    
    echo $whatever;
    
    wp_die("hello world!"); // this is required to terminate immediately and return a proper response
}
?>