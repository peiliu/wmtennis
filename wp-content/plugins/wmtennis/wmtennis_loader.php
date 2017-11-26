<?php

class WmtennisLoader extends MvcPluginLoader {

    var $db_version = '1.0';
    
    function init() {
        
        // Include any code here that needs to be called when this class is instantiated
        
        global $wpdb;
        
        //TODO: Add matches table, and the lineup
        $this->tables = array(
            'rosters' => $wpdb->prefix.'rosters',
            'schedules' => $wpdb->prefix.'schedules',
            'teams' => $wpdb->prefix.'teams'
        );
        
        $this->wmtennis_add_roles_and_capabilities();
        
    }
        
    function activate() {
    
        // This call needs to be made to activate this app within WP MVC
        
        $this->activate_app(__FILE__);
        
        // Perform any databases modifications related to plugin activation here, if necessary

        require_once ABSPATH.'wp-admin/includes/upgrade.php';
    
        add_option('wmtennis_db_version', $this->db_version);
        
        $sql = '
            CREATE TABLE '.$this->tables['rosters'].' (
              id int(11) NOT NULL auto_increment,
              team_id int(7) default NULL,
              name varchar(100) NOT NULL,
              email varchar(100) NOT NULL,
              phone varchar(30),
              ntrp_rating varchar(10) NOT NULL,
              is_captain tinyint(1) NOT NULL default 0,
              description text,
              PRIMARY KEY  (id),
              KEY team_id (team_id)
            )';
        dbDelta($sql);
        
        $sql = '
            CREATE TABLE '.$this->tables['schedules'].' (
              id int(7) NOT NULL auto_increment,
              home_team_id int(11) default NULL,
              visit_team_id int(11) default NULL,
              match_id int(11) default NULL,
              date date default NULL,
              time time default NULL,
              PRIMARY KEY  (id),
              KEY home_team_id (home_team_id),
              KEY visit_team_id (visit_team_id)
            )';
        dbDelta($sql);
        
        $sql = '
            CREATE TABLE '.$this->tables['teams'].' (
              id int(7) NOT NULL auto_increment,
              name varchar(100) NOT NULL,
              address1 varchar(255) default NULL,
              address2 varchar(255) default NULL,
              city varchar(100) default NULL,
              state varchar(100) default NULL,
              zip varchar(20) default NULL,
              post_id BIGINT(20),
              description text,
              PRIMARY KEY  (id),
              KEY rosters_id (rosters_id)
            )';
        dbDelta($sql);
        $this->insert_example_data();
        
    }

    function deactivate() {
    
        // This call needs to be made to deactivate this app within WP MVC
        
        $this->deactivate_app(__FILE__);
        
        // Perform any databases modifications related to plugin deactivation here, if necessary
    
    }
    
    function insert_example_data() {
        
        // Only insert the example data if no data already exists
        
        $sql = '
            SELECT
                id
            FROM
                '.$this->tables['rosters'].'
            LIMIT
                1';
        $data_exists = $this->wpdb->get_var($sql);
        if ($data_exists) {
            return false;
        }
        
        // Insert example data
        
        $rows = array(
            array(
                'id' => 1,
                'team_id' => 2,
                'name' => 'Doug Beil',
                'email' => 'doug@cox.net',
                'phone' => '702-123-4567',
                'ntrp_rating' => '3.5',
                'is_captain' => '0',
                'description' => ''
            ),
            array(
                'id' => 2,
                'team_id' => 2,
                'name' => 'Pei Liu',
                'email' => 'pei@cox.net',
                'phone' => '702-123-4567',
                'ntrp_rating' => '3.5',
                'is_captain' => '1',
                'description' => ''
            ),
            array(
                'id' => 3,
                'team_id' => 2,
                'name' => 'Brian H',
                'email' => 'brian@cox.net',
                'phone' => '702-123-4567',
                'ntrp_rating' => '4.0',
                'is_captain' => '0',
                'description' => ''
            )
        );
        foreach($rows as $row) {
            $this->wpdb->insert($this->tables['rosters'], $row);
        }
        
        $rows = array(
            array(
                'id' => 1,
                'home_team_id' => 1,
                'visit_team_id' => 2,
                'match_id' => 1,
                'date' => '2011-06-17',
                'time' => '18:00:00'
            ),
            array(
                'id' => 2,
                'home_team_id' => 1,
                'visit_team_id' => 3,
                'match_id' => 2,
                'date' => '2011-06-18',
                'time' => '18:00:00'
            )
        );
        foreach($rows as $row) {
            $this->wpdb->insert($this->tables['schedules'], $row);
        }
        
        $rows = array(
            array(
                'id' => 1,
                'name' => 'Whitney Mesa',
                'address1' => '1575 Galleria Drive',
                'city' => 'Henderson',
                'state' => 'NV',
                'post_id' => '89052',
                'description' => 'Beautiful facility with 9 courts...'
            ),
            array(
                'id' => 2,
                'name' => 'Darling Tennis Center #1',
                'address1' => '2222 Washington Drive',
                'city' => 'Las Vegas',
                'state' => 'NV',
                'post_id' => '89052',
                'description' => 'Beautiful facility with 22 courts...'
            ),
            array(
                'id' => 3,
                'name' => 'Spanish Trails',
                'address1' => '3333 Spanish Trails Drive',
                'city' => 'Las Vegas',
                'state' => 'NV',
                'post_id' => '89052',
                'description' => 'facility with 4 courts...'
            )
        );
        foreach($rows as $row) {
            $this->wpdb->insert($this->tables['teams'], $row);
        }
        
    }

    function wmtennis_add_roles_and_capabilities() {
        // add roles only when not exist
        $baseRole = get_role('wm_roster');
        if (isset($baseRole)) {
            $baseRole->add_cap('view_schedule');
            $baseRole->add_cap('view_lineup');
            $baseRole->add_cap('confirm_match');
        }
        
        $baseRole = get_role('wm_captain');
        if (isset($baseRole)) {
            $baseRole->add_cap('view_schedule');
            $baseRole->add_cap('view_lineup');
            $baseRole->add_cap('confirm_match');
            $baseRole->add_cap('edit_schedule');
            $baseRole->add_cap('edit_lineup');
        }
    }
    
}

?>