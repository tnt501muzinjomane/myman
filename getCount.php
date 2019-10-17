<?php

//including the database connection file
include_once("config.php");

$filter = array('status' => 'New');
$incident = $db->incident->count();
    
    echo $incident;

?>