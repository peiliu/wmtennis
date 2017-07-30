<?php
/*
Plugin Name: Wmtennis
Plugin URI: 
Description: 
Author: 
Version: 
Author URI: 
*/

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

?>