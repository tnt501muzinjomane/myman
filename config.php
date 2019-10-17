<?php

require 'vendor/autoload.php';



//coonecting to mongo db server
//$connection = new MongoDB\Client;

//$manager = new MongoDB\Driver\Manager('mongodb://165.22.89.29:27017');

//connect to a database
//$db = $connection->ndmatest;


$mongo = new MongoDB\Client('mongodb://165.22.89.29:27017');
$db = $mongo->ndmatest;



?>
