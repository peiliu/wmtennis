<?php

class Schedule extends MvcModel {

    var $display_field = 'name';
    var $includes = array('Team','MatchConfirmation');
    //var $has_many = array('MatchConfirmation');
    var $field_foreign_keys = array(
        'home_team_id' => 'Team',
        'visit_team_id' => 'Team'
        );
    /*
    var $belongs_to = array(
        'Team' => array(
            'foreign_key' => 'home_team_id',
            'foreign_key' => 'visit_team_id'
        ),
        'Team' => array(
            'foreign_key' => 'visit_team_id'
        )
    );
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
}

?>