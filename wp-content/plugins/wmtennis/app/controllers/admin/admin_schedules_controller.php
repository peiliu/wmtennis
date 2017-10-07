<?php

class AdminSchedulesController extends MvcAdminController {
             
    var $default_columns = array(
        'id',
        'date' => array('value_method' => 'admin_column_date'),
        'time' => array('value_method' => 'admin_column_time'),
        'home' => array('value_method' => 'home_team_edit_link'),
        'visitor' => array('value_method' => 'visit_team_edit_link')
    );
    
    public function add() {
        
        $this->set_teams();
        $this->create_or_save();
        
    }
    
    public function edit() {
        
        $this->set_teams();
        $this->verify_id_param();
        $this->set_object();
        $this->create_or_save();
        
    }
    
    private function set_teams() {
        
        $this->load_model('Team');
        $teams = $this->Team->find(array('selects' => array('id', 'name')));
        $this->teams = $teams;
        
    }
       
    public function admin_column_date($object) {
        return empty($object->date) ? null : date('F jS, Y', strtotime($object->date));
    }
    
    public function admin_column_time($object) {
        return empty($object->time) ? null : date('g:ia', strtotime($object->time));
    }
    
    public function home_team_edit_link($object) {
        /*
        if (!isset($this->teams)) {
            $this->set_teams();
        }
        */
        
            
        return $object->home_team->name;
        //return empty($object->home_team_id) ? null : HtmlHelper::admin_object_link($object->team, array('action' => 'edit'));
    }
    
    public function visit_team_edit_link($object) {
        return $object->visit_team->name;
        //return empty($object->home_team_id) ? null : HtmlHelper::admin_object_link($object->team, array('action' => 'edit'));
    }
    
}

?>