<?php

class AdminMatchConfirmationsController extends MvcAdminController {
    
    //var $default_columns = array('id', 'position', 'player_id', 'player2_id');


    var $default_columns = array(
        'id',
        'time' => array('value_method' => 'admin_column_time'),
        'position' => array('value_method' => 'admin_column_position'),
        'player1' => array('value_method' => 'admin_column_player1'),
        'player2' => array('value_method' => 'admin_column_player2')
        
        
    );

    public function __construct() {
        parent::__CONSTRUCT();
        $this->enqueue_fontawesome();
    }
    
    public function enqueue_fontawesome() {
        $style_url = '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css';
        wp_enqueue_style( 'wmtennis-fontawesome', $style_url);
    }
    
    private function set_rosters() {
        
        $this->load_model('Roster');
        $rosters = $this->Roster->find(array('selects' => array('id', 'name')));
        $this->rosters = $rosters;
        
    }
    
    public function admin_column_position($object) {
        $position = '1S';
        switch ($object->position) {
            case 1:
                $position = '1S';
                break;
            case 2:
                $position = '2S';
                break;
            case 3:
                $position = '1D';
                break;
            case 4:
                $position = '2D';
                break;
            case 5:
                $position = '3D';
                break;
        }
        
        return $position;
        
    }
    public function admin_column_player1($object) {
        return $object->player->name . '&emsp;  <i class="fa fa-thumbs-up fa-lg" aria-hidden="true" style="color:green"></i>';
    }
    
    public function admin_column_player2($object) {
        return $object->player2->name . '&emsp; <i class="fa fa-thumbs-down fa-lg" aria-hidden="true" style="color:red"></i>';
    }
    
    public function admin_column_time($object) {
        return empty($object->time) ? null : date('g:ia', strtotime($object->time));
    }
    
    /*
    public function admin_column_confirmed($object) {
        return 'true';
    }
    */
}

?>