<?php
// including the database connection file
include_once("config.php");

	$id = $_POST['id'];
	$agent = array (
				'title' => $_POST['title'],
				'naincontent' => $_POST['maincontent'],
                'featureimage' => $_POST['featureimage']
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
		$db->preparednesInfo->updateOne(
						array('_id' => new MongoDB\BSON\ObjectId($id)),
						array('$set' => $agent)
					);
        echo json_encode(array('success' => 1));
	}

?>