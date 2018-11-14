<?php
include 'credentials.php';
//connection info for testing purposes
$servername = DB_HOST;
$server_username = DB_USER;
$server_password = DB_PASSWORD;
$dbname = DB_NAME;
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