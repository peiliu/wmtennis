<?php

class AdminTeamsController extends MvcAdminController {
    
    
    var $default_columns = array(
        'id',
        'name',
        'address' => array('value_method' => 'admin_column_address')
    );
    
    public function admin_column_address($object) {
        $buildaddr = '';
        if (!empty($object->address1))
        {
            $buildaddr = $object->address1 .  ', ';
        }
        if (!empty($object->address2))
        {
                $buildaddr .= $object->address2 .  ', ';
        }
        $buildaddr .= $object->city . ' ' . $object->state . ' ' . $object->post_id;
        return $buildaddr;
    }
}

?>