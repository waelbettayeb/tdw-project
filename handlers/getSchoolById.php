<?php
    require_once("../includes/classes/DB.php");

    $table = DB::getSchoolNameById($_POST['school_id']);
    echo json_encode($table);