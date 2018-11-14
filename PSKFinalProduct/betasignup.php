<?php
include 'includes/config.php';
$email = $_POST['email'];
//echo "<script type='text/javascript'>alert('JeS');</script>";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Invalid email; please check your email and try again.';
}else{
    $statement = execute_query("SELECT beta FROM nlSubscribers WHERE subs_email = '$email'");
    $exists = $statement->fetch(PDO::FETCH_ASSOC);
    $beta = $exists['beta'];
    if($beta == 'N'){
        execute_query("UPDATE nlSubscribers SET beta = 'Y' WHERE subs_email = '$email'");
    }else{
        execute_query("INSERT INTO nlSubscribers (subs_email, beta, subscribed) VALUE ('$email', 'Y', 'N')");
    }
}
echo 'Thank you for your intrest, we will send you information about our beta products soon!';
?>

