<?php
header('Content-Type: text/plain');

// including the database connection file

include_once("config.php");

if (isset($_POST['email']) && $_POST['email'] && isset($_POST['password']) && $_POST['password']) {

    $c = $_POST['email'];
    $d = $_POST['password'];
    
   //$c = "admin@dalcrue.com";
   //$d = "123";
    
    $user = $db->agenciesUsers->findOne(array('email'=> $c, 'password'=> $d));

    $id = (string)$user['_id'];
    $name = $user['firstname'];
    $surname = $user['lastname'];
    $email = $user['email'];
    $password = $user['password'];
    $category = $user['category'];
    $role = $user['roles'];
    
    $cat = $db->agencies->findOne(array('uniquekey'=> $category));
    
    $key = $cat['uniquekey'];
    $aname = $cat['name'];

    if($user){ 
       echo json_encode(array('success' => 1, 'token' => $id, 'firstname' => $name, 'lastname' => $surname, 'email' => $email, 'password' => $password, 'keys' => $key, 'aname' => $aname, 'role' => $role));    
    } else {  
        echo json_encode(array('success' => 0));
    }    
} else {
    echo json_encode(array('success' => 0));
}

?>