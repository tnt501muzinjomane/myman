<?php
//including the database connection file
include_once("config.php");
    
    $bulk = new MongoDB\Driver\BulkWrite;

if(isset($_POST['name'])) {	
	$agent = array (
				'name' => $_POST['name'],
				'description' => $_POST['description']
                
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
		echo json_encode(array('success' => 1));	
	} else {
		//insert data to database table/collections'
		$db->hazardsCategories->insertONe($agent);
		//display success message
		echo json_encode(array('success' => 1));
	}
}

?>