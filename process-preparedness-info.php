<?php




define ("MAX_SIZE","1000"); 
function getExtension($str)
{
	 $i = strrpos($str,".");
	 if (!$i) { return ""; }
	 $l = strlen($str) - $i;
	 $ext = substr($str,$i+1,$l);
	 return $ext;
}
 
$errors=0;
$image=$_FILES['file']['name'];
if ($image) 
{
	$filename = stripslashes($_FILES['file']['name']);
	$extension = getExtension($filename);
	$extension = strtolower($extension);
	if (($extension != "jpg") && ($extension != "JPG") && ($extension != "png") && ($extension != "PNG") && ($extension != "jpeg") && ($extension != "JPEG")) 
	{
		echo '<h3>Unknown extension! Please attach a jpg or png image!</h3>';
		$errors=1;
		exit();
	}
	else
	{
		$size=filesize($_FILES['file']['tmp_name']);
 
		if ($size > MAX_SIZE*1024)
		{
			echo '<h4>You have exceeded the size limit!</h4>';
			$errors=1;
			exit();
		}
 
		$image_name=time().'.'.$extension;
		$newname="files/".$image_name;
 
		$copied = copy($_FILES['file']['tmp_name'], $newname);
		
	}
}


//including the database connection file
include_once("config.php");
    
    $bulk = new MongoDB\Driver\BulkWrite;

if(isset($_POST['title'])) {	
	$agent = array (
				'title' => $_POST['title'],
				'maincontent' => $_POST['maincontent'],
                'featuredimage' => $newname
                
                
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
        
    
		$db->preparednesInfo->insertONe($agent);
		
		//display success message
		echo json_encode(array('success' => 1));
	}
}

?>