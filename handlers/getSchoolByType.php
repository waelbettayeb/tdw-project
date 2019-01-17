<?php
    require_once("../includes/classes/DB.php");

    $table = DB::getSchoolByTypeId($_POST['type_id']);
    echo json_encode($table);