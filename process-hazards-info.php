<?php
//including the database connection file
include_once("config.php");
    
    $bulk = new MongoDB\Driver\BulkWrite;

if(isset($_POST['name'])) {	
    
    
    $name = $_POST['name'];
    $hazard = $db->hazardsInfo->findOne(array('name'=> $name));

    $uname = $hazard['name'];
if($uname != ''){
    echo json_encode(array('success' => 4));
    exit();
}
    
    
	$agent = array (
				'name' => $_POST['name'],
				'hazardCategory' => $_POST['category'],
                'tresholds' => $_POST['treshold']
                
			);
		
	// checking empty fields
	$errorMessage = '';
	foreach ($agent as $key => $value) {
		if (empty($value)) {
			$errorMessage .= $key . ' field is empty<br />';
		}
	}
	
	if ($errorMessage) {
		// print error message & link to the previous page
		echo json_encode(array('success' => 0));
	} else {
		//insert data to database table/collection named 
		$db->hazardsInfo->insertONe($agent);
		
		//display success message
		echo json_encode(array('success' => 1));
	}
}
else {
    
    echo json_encode(array('success' => 0));
}

?>