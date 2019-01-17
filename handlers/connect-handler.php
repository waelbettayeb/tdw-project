<?php
require_once("../includes/classes/DB.php");
function auth($user, $pwd){
    
    $table = DB::getAccount($user);
    return ((sizeof($table)>=1)&&(($user == $table[0][0]) && ($pwd == $table[0][1])));    
}
    if(auth($_POST['username'], $_POST['password'])){
        session_start();
        $_SESSION["user"] = $_POST['username'];
        $_SESSION["pwd"] = $_POST['password'];
        echo true;
    }
    else
        echo false;
?>