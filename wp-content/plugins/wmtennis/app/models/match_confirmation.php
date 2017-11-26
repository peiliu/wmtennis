<?php

class MatchConfirmation extends MvcModel {

    var $display_field = 'name';
    var $includes = array('Roster');
    var $belongs_to = array('Schedule');
    var $field_foreign_keys = array(
        'player_id' => 'Roster',
        'player2_id' => 'Roster',
        'schedule_id' => 'Schedule'
    );
    
    public function PositionEnumToString($position) {
        $newposition = $position;
        
        if (is_numeric($position)) {
            switch ($position) {
                case 1: 
                    $newposition =  "1S"; 
                    break;
                case 2: 
                    $newposition = "2S"; 
                    break;
                case 3: 
                    $newposition = "1D"; 
                    break;
                case 4: 
                    $newposition = "2D"; 
                    break;
                case 5: 
                    $newposition =  "3D";
                    break;
            }
        }
        return $newposition;
    }
    
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
        
        // set the position
        $object->position = $this->PositionEnumToString($object->position);
        
        
  
    }
    
    // get the schedule object based on the schedule ID
    public function get_match($schedule_id) {
        $options = array(
            'conditions' => array(
                'schedule_id' => $schedule_id                
            )
            
        );
        return $this->find($options);
    }
    
    public function confirm_match($schedule_id, $player_id, $conf_val) {
        $options = array(
            'conditions' => array(
            'schedule_id' => $schedule_id,
            'player_id' => $player_id
                )
    
        );
        
        
        if (count($matches) == 1) { 
            $match = $matches[0];
            $data = array(
                'player_confirmed' => $conf_val
            );
        }
        else {
            $options = array(
                'conditions' => array (
                'schedule_id' => $schedule_id,
                'player2_id' => $player_id
                    )
            );
            
           
            $matches = $this->find($options);
            if(count($matches) == 1) {
                $match = $matches[0];
                $data = array(
                    'player2_confirmed' => $conf_val
                );
            }
        }
        
        if (isset($match)) {           
            $this->update_all($data, $options);
        }
    }
    
}

?>