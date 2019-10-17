<?php
//including the database connection file
include_once("config.php");
    
    $bulk = new MongoDB\Driver\BulkWrite;

    $q = $_POST['t1'];
    $str = preg_replace('/[^A-Za-z0-9\. -]/', '', $q);
    

    $name = $_POST['name'];
    $agencies = $db->agencies->findOne(array('name'=> $name));

    $aname = $agencies['name'];
    if($aname != ''){
      echo json_encode(array('success' => 2));
      exit();
    }


	$agent = array (
				'name' => $_POST['name'],
				'email' => $_POST['email'],
                'contact' => $_POST['contact'],
				'publ' => $_POST['publ'],
                'uniquekey' => $str,
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
		
        echo json_encode(array('success' => 0));
        
	} else {
		//insert data to database table/collection named 'users'
        
    
		$db->agencies->insertONe($agent);
		
        echo json_encode(array('success' => 1));
	}


?>