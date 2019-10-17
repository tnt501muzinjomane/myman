<?php
header('Content-Type: text/plain');

// including the database connection file







include_once("config.php");

//require __DIR__ . '/vendor/autoload.php';

//if (isset($_POST['email']) && $_POST['email'] && isset($_POST['password']) && $_POST['password']) {

    //$c = $_POST['email'];
    //$d = $_POST['password'];
    
   $c = "siya@yahoo.com";
   $d = "1";
    
    $user = $db->agenciesUsers->findOne(array('email'=> $c, 'password'=> $d));

    $id = (string)$user['_id'];
    $name = $user['firstname'];
    $surname = $user['lastname'];
    $email = $user['email'];
    $password = $user['password'];
    $category = $user['category'];
    $role = $user['accroles'];
    
    $cat = $db->agencies->findOne(array('uniquekey'=> $category));
    
    //$key = $cat['uniquekey'];
    $aname = $cat['name'];

    if($user){ 
        
        // Create token header as a JSON string
$header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);

// Create token payload as a JSON string
$payload = json_encode(array('success' => 1, 'token' => $id, 'firstname' => $name, 'lastname' => $surname, 'email' => $email, 'aname' => $aname, 'roles' => $role, 'category' => $category));

// Encode Header to Base64Url String
$base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

// Encode Payload to Base64Url String
$base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

// Create Signature Hash
$signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'abC123!', true);

// Encode Signature to Base64Url String
$base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

// Create JWT
$jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

//echo $jwt;
        
        
       echo json_encode(array('success' => 1, 'token' => $id, 'firstname' => $name, 'lastname' => $surname, 'email' => $email, 'aname' => $aname, 'roles' => $role, 'category' => $category)); 
        //echo json_encode(array('jwt' => $jwt));
        
        $decoded = JWT::decode($jwt, array('HS256'));
        
        echo $decoded;
        
        
    } else {  
        echo json_encode(array('success' => 0));
    }    
//} else {
    //echo json_encode(array('success' => 0));
//}

?>