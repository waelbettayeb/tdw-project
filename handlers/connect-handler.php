<?php
require_once("../includes/classes/DB.php");

    $table = DB::getAccount($_POST['username']);
    if((sizeof($table)>=1)&&
    (($_POST['username'] == $table[0][0]) && ($_POST['password'] == $table[0][1]))){
        session_start();
        $_SESSION["user"] = $_POST['username'];
        $_SESSION["pwd"] = $_POST['password'];
        $_SESSION["user_id"] = $table[0][4];
        echo true;
    }
    else
        echo false;
?>