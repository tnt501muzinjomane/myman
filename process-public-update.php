<?php
// including the database connection file
include_once("config.php");

	$id = $_POST['id'];
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
		//updating the 'public users' table/collection
		$db->registeredUsers->updateOne(
						array('_id' => new MongoDB\BSON\ObjectId($id)),
						array('$set' => $agent)
					);
        
        echo json_encode(array('success' => 1));
		
	}

?>