<?php
    require_once("../includes/classes/DB.php");

    $table = DB::deleteSchoolById($_POST['school_id']);