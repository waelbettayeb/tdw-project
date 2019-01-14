<?php
require_once( './Routes.php' );

function __autoload($class_name) {
    if(file_exists('./classes/'.$class_name.'.php')) {
        require_once './classes/'.$class_name.'.php';
    }
    else if (file_exists('./controller/'.$class_name.'.php')) {
        require_once './controller/' . $class_name.'.php';
    }
}