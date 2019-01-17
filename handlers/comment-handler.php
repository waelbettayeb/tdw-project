<?php
require_once("../includes/classes/DB.php");
session_start();

    DB::insertComment($_POST['content'], $_SESSION["user_id"], $_POST['school_id'])
?>