<?php

class MatchConfirmationsController extends MvcPublicController {   
    var $includes = array('Team', 'Schedule');
    var $field_foreign_keys = array(
        'home_team_id' => 'Team',
        'visit_team_id' => 'Team',
        'schedule_id' => 'Schedule'
    );
    var $belongs_to = array('Schedule');
    
/*    
    function __construct() {
        parent::__CONSTRUCT();
               
        add_action( 'wp_ajax_lineup_action', array($this, 'get_schedules') );
        add_action( 'wp_ajax_nopriv_schedule_action', array($this, 'get_schedules') );
        
        add_shortcode('wmtennis_schedule', array($this, 'wmtennis_schedule'));
        //add_action( 'init', array($this, 'loadhook'));
        $this->enqueue_scripts();
        $this->before = 'before';
    }
  */  
    public function after_find(&$object) {
        // setting the home team and visit team
        foreach ($this->field_foreign_keys as $key => $value) {
            $field = substr($key, 0, strlen($key)-3 );
            if (!isset($this->{$value})) {
                $model = MvcModelRegistry::get_model($value);
                $this->{$value} = $model;
            }
            if (!isset($this->{$field})) {
                $model = $this->{$value};
                $object->{$field} = $model->find_by_id($object->{$key});
            }
        }
        
    }
    
    public function find($model, $id) {
        $modelobj = MvcModelRegistry::get_model($mode);
        if (isset($modelobj)) {
            return $modelobj->find_by_id($id);
        }
    }
    
    
    public function index() {
        $this->set_objects();
        $this->show();
    }
    
    public function show() {
        if (!current_user_can('view_lineup')) {
            
            echo get_header();
            echo '<p style="font-size: 2em; color:red">Login to view lineup! </p>';
            echo get_footer();
            die();
        }
        
        if (!isset($this->form))
        {
            $this->load_helper('Form');
        }
        
        //$this->get_post_param_data();
        $this->set_object();
    }
    
    public function get_confirmation_html($player, $confirmed) {
        $str = '';
        if ($player) {
            $str .= $player->first_name . ' ' . $player->last_name;
            
            if ($confirmed == 1)
            {
                $str .= '<span class="um-tip um-tip-w" title="Confirmed">';
                $str .= '<span class="dashicons dashicons-yes" style="color:green;font-size:24px;"></span>';
            }
            else if ($confirmed == -1)
            {
                $str .= '<span class="um-tip um-tip-w" title="Unavailable">';
                $str .= '<span class="dashicons dashicons-no" style="color:red;font-size:24px;"> </span>';
            }
            else
            {
                $str .= '<span class="um-tip um-tip-w" title="Not Responded">';
                $str .= '<span class="dashicons dashicons-editor-help" style="color:black;font-size:24px;"></span>';
            }
            $str .= '</span>';
        }
        return $str;
        
    }
    public function GenerateJson()
    {
        $objects = $this->view_vars['objects'];
        foreach ($objects as $object) {
            $player1 = get_userdata($object->player_id);
            $player2 = get_userdata($object->player2_id);
            
            $play1str = $this->get_confirmation_html($player1,$object->player_confirmed);
            $play2str = $this->get_confirmation_html($player2,$object->player2_confirmed);
            
            
            $result[] = array(
                'Position' => $object->position,
                'Time' =>$object->time,
                'Player' => $play1str,
                'Player2' => $play2str
            );
        }
        
        $jsonData = json_encode($result);
        return $jsonData;
        
    }
    
    /**
     * Getting all the match confirmations from the schedule id in form of JSON format
     * @param unknown $schedule_id
     */
    public function get_lineup($schedule_id) {
        $objects = $this->model->get_match($schedule_id);
        $this->set('objects', $objects);
        return $this->GenerateJson();
    }
    
}

?>