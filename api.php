<?php


$url = "https://protected-garden-26356.herokuapp.com/api/v1/rtables/";
$contents = file_get_contents($url);

echo $contents;

$clima=json_decode($contents);

foreach ($clima as $clim){
    
echo $clim -> name;
echo $clim -> min_guest;
echo $clim -> max_guest.'<br>';
    
}



?>


<?php

/*$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://protected-garden-26356.herokuapp.com/api/v1/rtables/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET"
]);

curl_setopt($curl, CURLOPT_HTTPHEADER, [
        "cache-control: no-cache",
        "X-DreamFactory-API-Key: YOUR_API_KEY"
]);

$response = curl_exec($curl);
$error = curl_error($curl);

curl_close($curl);

if ($error) {
        echo "cURL error #:" . $error;
} else {
        echo $response;
    
}

*/



?>

