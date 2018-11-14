<?php
// request and response objects used with every route for every slim app
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// create main slim object
$app = new \Slim\App;

// Route to Get all Apps
$app->get('/applications', function(Request $request, Response $response) {
  $sql = "SELECT productName, image, androidLink, appleLink, description FROM products";
  try {
    // get database objects
    $db = new db();
    // connect
    $db = $db->connect();

    $statement = $db->query($sql);
    $products = $statement->fetchAll(PDO::FETCH_OBJ);
    $db = null;
    echo json_encode($products);
  } catch(PDOException $e) {
    echo '{"error": {"text": '.$e->getMessage().'}}';
    $db = null;
  }


});
// test by:
// enter into url --> http://localhost/slimapp2/public/api/applications
// enter into url --> https://ncsmart1.azurewebsites.net/api/public/api/applications

// Route to Get a single Apps
// users can enter productName with space BUT NO "" or '' surrounding entry, put in instructions
// entry's works and (entry's entry)
$app->get('/applications/{productName}', function(Request $request, Response $response) {
  $productName = $request->getAttribute('productName');
  //$sql = "SELECT productName, image, androidLink, appleLink, description FROM products WHERE productName = '$productName'";
  $sql = 'SELECT productName, image, androidLink, appleLink, description FROM products WHERE productName = :productName';

  try {
    // get database objects
    $db = new db();
    // connect
    $db = $db->connect();

    //$statement = $db->query($sql);
    $statement = $db->prepare($sql);
    $statement->bindValue(':productName', $productName);
    $statement->execute();
    $product = $statement->fetchAll(PDO::FETCH_OBJ);
    $db = null;

    if(empty($product)) {
      header("HTTP/1.1 404 Unauthorized");
      include("error404.html");
      $db = null;
      exit();
    }
    else {
    echo json_encode($product);
    }

  } catch(PDOException $e) {
    echo '{"error": {"text": '.$e->getMessage().'}}';
    $db = null;
  }


});
// test by:
// enter into url --> http://localhost/slimapp2/public/api/"app name spaces are ok"

// stoped video at 34:22
