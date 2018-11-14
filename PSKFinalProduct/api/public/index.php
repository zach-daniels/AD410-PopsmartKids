<?php
//echo 'adfadfasdfasdfadsf';
// request and response objects used with every route for every slim app
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// created by Composer and allows access to Slim dependencies
require '../vendor/autoload.php';
require '../src/config/db.php';
/*
// create main slim object
$app = new \Slim\App;
//  this is our first “route” - when we make a GET request to /hello/someone then this is the code that will respond to it.
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});
*/
// Customer routes
require '../src/routes/applications.php';


$app->run(); // this line to tell Slim that we’re done configuring and it’s time to get on with the main event.

// to run go to browser and enter --> http://localhost/slimapp2/public/api/applications
