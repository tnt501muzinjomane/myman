<?php

    /*if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'files/' . $_FILES['file']['name']);
    }*/



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

?>