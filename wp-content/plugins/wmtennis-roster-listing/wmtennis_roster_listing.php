<?php
/*
Plugin Name: Wmtennis Roster Listing
Plugin URI: 
Description: 
Author: 
Version: 
Author URI: 
*/

register_activation_hook(__FILE__, 'wmtennis_roster_listing_activate');
register_deactivation_hook(__FILE__, 'wmtennis_roster_listing_deactivate');

function wmtennis_roster_listing_activate() {
    global $wp_rewrite;
    require_once dirname(__FILE__).'/wmtennis_roster_listing_loader.php';
    $loader = new WmtennisRosterListingLoader();
    $loader->activate();
    $wp_rewrite->flush_rules( true );
}

function wmtennis_roster_listing_deactivate() {
    global $wp_rewrite;
    require_once dirname(__FILE__).'/wmtennis_roster_listing_loader.php';
    $loader = new WmtennisRosterListingLoader();
    $loader->deactivate();
    $wp_rewrite->flush_rules( true );
}

?>