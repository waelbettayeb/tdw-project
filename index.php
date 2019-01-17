<?php
require_once( './includes/Routes.php' );

function __autoload($class_name) {
    if(file_exists('./includes/classes/'.$class_name.'.php')) {
        require_once './includes/classes/'.$class_name.'.php';
    }
    else if (file_exists('./includes/controller/'.$class_name.'.php')) {
        require_once './includes/controller/' . $class_name.'.php';
    }
}