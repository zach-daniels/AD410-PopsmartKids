<?php
include 'includes/config.php'; 
$email = $_POST['email'];
$statement = execute_query("SELECT subscribed FROM nlSubscribers WHERE subs_email = '$email'");
$exists = $statement->fetch(PDO::FETCH_ASSOC);
$subed = $exists['subscribed'];
if($subed == 'N'){
    execute_query("UPDATE nlSubscribers SET subscribed = 'Y' WHERE subs_email = '$email'");
}else if($subed != 'Y'){
    execute_query("INSERT INTO nlSubscribers (subs_email) VALUE ('$email')");
}
?>