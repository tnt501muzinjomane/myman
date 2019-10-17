<?php
//including the database connection file
include_once("config.php");
    
    $bulk = new MongoDB\Driver\BulkWrite;

if (isset($_POST['email']) && $_POST['email'] && isset($_POST['password']) && $_POST['password']) {
        
        $password = $_POST['password'];
$cpassword = $_POST['cpassword'];

if( strcmp($password, $cpassword) != 0 ) {
		echo json_encode(array('success' => 3));
		exit();
	}

$mail = $_POST['email'];
$user = $db->agenciesUsers->findOne(array('email'=> $mail));

$umail = $user['email'];
if($umail != ''){
    echo json_encode(array('success' => 2));
    exit();
}

        
	$agent = array (
				'firstname' => $_POST['firstname'],
				'lastname' => $_POST['lastname'],
                'category' => $_POST['category'],
                'physicaladdress' => $_POST['address'],
                'cell_number' => $_POST['contact'],
                'password' => $_POST['password'],
                'accroles' => $_POST['roles'],
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
		echo json_encode(array('success' => 4));	
	} else {
		//insert data to database table/collection 
		$db->agenciesUsers->insertONe($agent);
		
		//display success message
		echo json_encode(array('success' => 1));
	}
        
        } else {
    echo json_encode(array('success' => 0));
}


?>