<?php
require 'db.php';
$qry = mysqli_query($con,"SELECT * from `admin` WHERE `email` = '".$_POST['email']."'");
$row = mysqli_num_rows($qry);
echo $row;
?>