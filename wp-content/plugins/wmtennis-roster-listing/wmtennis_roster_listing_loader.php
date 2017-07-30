<?php

class WmtennisRosterListingLoader extends MvcPluginLoader {

    var $db_version = '1.0';
    //var $tables = array('rosters' => $wpdb->prefix.'wmtennis_roster');

    function activate() {
        global $wpdb;
        // This call needs to be made to activate this app within WP MVC
        
        $this->activate_app(__FILE__);
        
        // Perform any databases modifications related to plugin activation here, if necessary

        require_once ABSPATH.'wp-admin/includes/upgrade.php';
    
        add_option('wmtennis_roster_listing_db_version', $this->db_version);
        
        // Use dbDelta() to create the tables for the app here
	
        $sql = '
         CREATE TABLE '.$wpdb->prefix.'wmtennis_roster (
            id int(11) NOT NULL auto_increment,
            name varchar(255) NOT NULL,
            email varchar(255) NOT NULL,
            ntrp_rating varchar(255) NOT NULL,
            description text,
            address1 varchar(255) default NULL,
            address2 varchar(255) default NULL,
            city varchar(100) default NULL,
            state varchar(5) default NULL,
            zip varchar(20) default NULL,
            PRIMARY KEY  (id)
         )';
        dbDelta($sql);
    
    }

    function deactivate() {
    
        // This call needs to be made to deactivate this app within WP MVC
        
        $this->deactivate_app(__FILE__);
        
        // Perform any databases modifications related to plugin deactivation here, if necessary
    
    }

}

?>
