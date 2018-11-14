<?php
/**
 * Created by PhpStorm.
 * User: zbrinlee
 * Date: 5/31/2018
 * Time: 4:57 PM
 */
require '../includes/config.php';
$id = $_POST['productID'];
$error = "";
$complete_dir = "/home/goldteam1/";
$target_dir = $complete_dir . "smart1.zakbrinlee.com/images/";
$useThis = "/images/";
$file_name = basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $file_name;
$useThis .= $file_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error = "File is not an image.";
        $uploadOk = 0;
        feedback("File is not an image", "error");
        header("Location: edit_product.php?product=$id&name=$useThis&error=$error");
        exit();
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $error = "Sorry, file already exists, please change the name of your file being uploaded.";
    feedback("Sorry, file already exists, please change the name of your file being uploaded.", "error");
    header("Location: edit_product.php?product=$id&name=$useThis&error=$error");
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) { //  500KB max
    $error = "Sorry, your file is too large, it must be 500kb or less.";
    $uploadOk = 0;
    feedback("Sorry, your file is too large, it must be 500kb or less.", "error");
    header("Location: edit_product.php?product=$id&name=$useThis&error=$error");
    exit();
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    feedback("Sorry, only JPG, JPEG, PNG & GIF files are allowed.", "error");
    header("Location: edit_product.php?product=$id&name=$useThis&error=$error");
    exit();
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    feedback("Image upload successful.", "success");
    header("Location: edit_product.php?product=$id&name=$useThis");
  exit();
    //$error = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        if(isset($_POST['id'])) {
          $z = $_POST['id'];
        }
        feedback("Image upload successful.", "success");
        header("Location: edit_product.php?product=$id&name=$useThis");
    } else {
        $error = $target_file;
        feedback("Image upload successful.", "success");
        header("Location: edit_product.php?product=$id&name=$useThis&error=$error");
        exit();
    }
}

