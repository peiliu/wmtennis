<?php

class MatchConfirmation extends MvcModel {

    var $display_field = 'name';
    var $includes = array('Roster');
    var $belongs_to = array('Schedule');
    var $field_foreign_keys = array(
        'player_id' => 'Roster',
        'player2_id' => 'Roster'
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
        
        $object->position = $this->PositionEnumToString($object->position);
        
    }
}

?>