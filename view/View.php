<?php

abstract class View {
    public static $theme = 1;

    public static function makeUserView() {
        require_once('./indexView.php');
    }public static function makeAdminView() {
        require_once('./adminView.php');
    }
    public static function getTheme(){
        $myfile = fopen("../config.txt", "r");
        return fgetc($myfile);
//        return self::$theme;
    }
    public static function setYellowTheme(){
        $myfile = fopen("config.txt", "w") or die("Unable to open file!");
        fwrite($myfile, 0);
        echo("Actual theme : {yellow}");

    }
    public static function setBlueTheme(){
        $myfile = fopen("config.txt", "w") or die("Unable to open file!");
        fwrite($myfile, 1);
        echo("Actual theme : {blue}");
    }
}