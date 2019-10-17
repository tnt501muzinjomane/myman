<?php
// including the database connection file
include_once("config.php");

if (isset($_POST['email']) && $_POST['email'] && isset($_POST['password']) && $_POST['password']) {

    $c = $_POST['email'];
    $d = $_POST['password'];
    
    $user = $db->agenciesUsers->findOne(array('email'=> $c, 'password'=> $d));
    
    $id = (string)$user['_id'];
    $name = $user['firstname'];
    $surname = $user['lastname'];
    $email = $user['email'];
    $password = $user['password'];
    
    if($user){  
       echo json_encode(array('success' => 1, 'token' => $id, 'name' => $name, 'surname' => $surname)); 
    } else {
        echo json_encode(array('success' => 0));
    }    
} else {
    echo json_encode(array('success' => 0));
}

?>