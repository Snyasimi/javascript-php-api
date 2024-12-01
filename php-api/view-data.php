<?php

    require_once('dbconnection.php');

    $sql = "";
    $request = file_get_contents('php://input');
    $DATA = json_decode($request,true);

    

?>