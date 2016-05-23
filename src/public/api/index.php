<?php

// use \Psr\Http\Message\ServerRequestInterface as Request;
// use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';
require './config.php';

// instantiate the App object
$app = new \Slim\App();

$app->get('/', function () use ($app) {
    $app->render('index.html');
});

$app->run();

?>
