<?php
/**
functions that handles the shortcodes
*/

/**
 * gets the list of schedules
 */
function wmtennis_schedule() {
    echo 'getting wmtennis schedule';
    $fileIncluder = new MvcFileIncluder();
    if ($fileIncluder->require_first_app_file_or_core_file('controllers/schedules_controller.php') == false) {
        echo 'can not find schedule controller';
    }
   
    $scheduleMgr = new SchedulesController();
    $scheduleMgr->init();
    $params = array ( 'controller' => 'schedules', 'action' => 'index');
    $scheduleMgr->params = $params;
    
    $response = $scheduleMgr->index();
    //echo "Hello from WMTENNIS, current url " . $current_url;
    //echo '</div></div></main></div>';
    $scheduleMgr->render_view($scheduleMgr->views_path.index, $params);
    
    echo 'got wmtennis schedule';
}

