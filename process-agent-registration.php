<?php
//including the database connection file
include_once("config.php");
    
    $bulk = new MongoDB\Driver\BulkWrite;

if(isset($_POST['Submit'])) {	
	$agent = array (
				'firstname' => $_POST['name'],
				'lastname' => $_POST['surname'],
                'password' => $_POST['password'],
				'email' => $_POST['email']
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
		echo '<span style="color:red">'.$errorMessage.'</span>';
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";	
	} else {
		//insert data to database table/collection named 'users'
        
    
		$db->agents->insertONe($agent);
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}

?>