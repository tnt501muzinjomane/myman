<?php
//including the database connection file
include_once("config.php");
    
$bulk = new MongoDB\Driver\BulkWrite;
	
	$agent = array (
				'firstname' => $_POST['name'],
				'lastname' => $_POST['surname'],
                'cell_number' => $_POST['cell_number'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
                
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
		//insert data to database table/collection 
		$db->registeredUsers->insertONe($agent);
        // print success message 
		echo json_encode(array('success' => 1));
    }

?>