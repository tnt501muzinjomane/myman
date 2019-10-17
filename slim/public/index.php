<?php
require "../vendor/autoload.php";
use \Slim\App;

$app = new App();
$app->get('../../getAgencies.php', function () {
    echo "Hello";
});
$app->run();
?>