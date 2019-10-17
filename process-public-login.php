<?php
header('Content-Type: text/plain');

// including the database connection file

include_once("config.php");

if (isset($_POST['email']) && $_POST['email'] && isset($_POST['password']) && $_POST['password']) {

    $c = $_POST['email'];
    $d = $_POST['password'];
    
   //$c = "admin@dalcrue.com";
   //$d = "123";
    
    $user = $db->registeredUsers->findOne(array('email'=> $c, 'password'=> $d));

    $id = (string)$user['_id'];
    $name = $user['firstname'];
    $surname = $user['lastname'];
    $email = $user['email'];
    $password = $user['password'];
    $cell_number = $user['cell_number'];

    if($user){ 
       echo json_encode(array('success' => 1, 'token' => $id, 'firstname' => $name, 'lastname' => $surname, 'email' => $email, 'password' => $password, 'cell_number' => $cell_number));    
    } else {  
        echo json_encode(array('success' => 0));
    }    
} else {
    echo json_encode(array('success' => 0));
}

?>