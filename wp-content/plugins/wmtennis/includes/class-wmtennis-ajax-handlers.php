<?php
function schedule_action() {
    global $wpdb; // this is how you get access to the database
    echo 'getting wmtennis schedule';
    //$scheduleMgr = new SchedulesController();
    $whatever = intval( $_POST['whatever'] );
    
    $whatever += 10;
    
    //echo $whatever;
    
    wp_die("hello world"); // this is required to terminate immediately and return a proper response
}

function lineup_action() {
    $lineup_id = $_POST['lineup_id'];
    //echo 'getting wmtennis schedule ' .  $lineup_id;
    $matchMgr = MvcControllerRegistry::get_controller('match_confirmations_controller');
    if (isset($matchMgr) && ($matchMgr != false)) {
        $result = $matchMgr->get_lineup($lineup_id);
    }
    //$jsonData = json_encode($result);
    echo $result;
    
    //echo 'getting wmtennis schedule';
    die();
    
}