<?php
//including the database connection file
include_once("config.php");


    
$bulk = new MongoDB\Driver\BulkWrite;

$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

if( strcmp($password, $cpassword) != 0 ) {
		echo json_encode(array('success' => 3));
		exit();
	}

$mail = $_POST['email'];
$user = $db->registeredUsers->findOne(array('email'=> $mail));

$umail = $user['email'];
if($umail != ''){
    echo json_encode(array('success' => 2));
    exit();
}


	$agent = array (
				'firstname' => $_POST['name'],
				'lastname' => $_POST['surname'],
                'gender' => $_POST['gender'],
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