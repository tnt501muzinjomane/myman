<?php
// including the database connection file
include_once("config.php");


if (isset($_POST['email']) && $_POST['email'] && isset($_POST['password']) && $_POST['password']) {

    $c = $_POST['email'];
    $d = $_POST['password'];
    
    $user = $db->agents->findOne(array('email'=> $c, 'password'=> $d));
    if($user){  
       echo json_encode(array('success' => 1)); 
    } else {
        echo json_encode(array('success' => 0));
    }    
} else {
    echo json_encode(array('success' => 0));
}

?>