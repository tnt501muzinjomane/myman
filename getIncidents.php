
<?php
//including the database connection file
include_once("config.php");

// select data in descending order from table/collection "users"

$filter  = [];
$options = ['sort' => ['incident' => -1]];
$result = $db->incident->find($filter, $options);

$output = [];
foreach( $result as $key => $val){
    $val->_id = strval($val->_id);
    $output[$key] = $val;
}

echo json_encode( $output);

?>