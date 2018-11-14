<?php

$servername = 'localhost';
$server_username = 'root';
$server_password = 'root';
$dbname = 'icoolsho_smart1';
$dsn = "mysql:host=$servername;dbname=$dbname";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try{
    $db = new PDO($dsn, $server_username, $server_password, $options);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //FOR DEBUGGING ONLY
    //echo "<p>Connected</p>";
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p>Error connecting to database: $error_message </p>";
    exit();
}


 ?>
