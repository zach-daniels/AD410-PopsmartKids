<?php
include "db.php";

//echo $file;

try {
  //$query = "UPDATE products SET image = :file WHERE productID = :id";
  $query = "UPDATE products SET image = :target_file WHERE productID = :z";
  $query = "INSERT INTO products VALUES ()";
  $statement = $db->prepare($query);
  $statement->bindValue(":target_file", $target_file);
  $statement->bindValue(":z", $z);
  $statement->execute();
  $statement->closeCursor();
} catch(PDOExecption $e) {
  //echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
  echo $e->getMessage();
  exit();
}


 ?>
