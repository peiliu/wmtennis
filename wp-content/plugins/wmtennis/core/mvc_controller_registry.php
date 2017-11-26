<?php

class MvcControllerRegistry {

    var $__controllers = array();

    static function &get_instance() {
        static $instance = array();
        if (!$instance) {
            $mvc_controller_registry = new MvcControllerRegistry();
            $instance[0] =& $mvc_controller_registry;
        }
        return $instance[0];
    }

    static function &get_controller($key) {
        $_this =& self::get_instance();
        $key = MvcInflector::camelize($key);
        $return = false;
        if (isset($_this->__controllers[$key])) {
            $return =& $_this->__controllers[$key];
        } else if (class_exists($key)) {
            $_this->__controllers[$key] = new $key();
            $return =& $_this->__controllers[$key];
        }
        return $return;
    }

    static function &get_controllers() {
        $_this =& self::get_instance();
        $return =& $_this->__controllers;
        return $return;
    }
    
    static function add_controller($key, &$controller) {
        $_this =& self::get_instance();
        $key = MvcInflector::camelize($key);
        if (!isset($_this->__controllers[$key])) {
            $_this->__controllers[$key] = $controller;
            return true;
        }
        return false;
    }

}

?>
