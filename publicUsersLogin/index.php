<?php
//including the database connection file
include_once("../config.php");

// select data in descending order from table/collection "users"

$filter  = [];
$options = ['sort' => ['lastname' => -1]];
$result = $db->registeredUsers->find($filter, $options);

$json = array();

foreach ($result as $res) {
        $json[] = $res;		
	}

    echo json_encode($json);

?>