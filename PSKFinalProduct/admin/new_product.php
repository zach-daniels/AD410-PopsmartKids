<?php ob_start(); ?>
<?php


//include('../includes/common.php');
require '../includes/config.php';
include INCLUDE_PATH . 'top.php'; #header must appear before any HTML is printed by PHP
echo '<link rel="stylesheet" type="text/css" href="admin_css/bootstrap.css">';
echo '<link rel="stylesheet" type="text/css" href="admin_css/dashboard.css">';
echo '<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>';
include('includes/sidebar.php');

if(isset($_GET['product_status'])){
  $product_success = "New Product Created";
}
if(isset($_GET['image_status'])){
  $image_success = "Image Uploaded";
  $useThis = $_GET['image_status'];
  //feedback("Image added successfully!", "success");
}
if(isset($_GET['error'])) {
  $error = $_GET['error'];
  //feedback($error ,"error");
}

if(isset($_POST['add_product'])){


    $product_name = $_POST['product_name'];
    $android_link = $_POST['android_link'];
    $apple_link = $_POST['apple_link'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $keywords = $_POST['keywords'];

    $query = "INSERT INTO products (productName, image, androidLink, appleLink, description, keywords) VALUES(:product_name, :image, :androidLink, :appleLink, :description, :keywords)";
    $boundQ = array(":product_name", ":image", ":androidLink", ":appleLink", ":description", ":keywords");
    $param = array($product_name, $image, $android_link, $apple_link, $description,$keywords);
    $new_product_statement = bound_query($query, $boundQ, $param);


    if($new_product_statement !== null) {
      //this bit redirects to dashboard after making new post
      //header("Location:new_product.php?status=success");
      header("Location:new_product.php?product_status=product_success");
      exit();
    }


}



?>


<div class="dashspacer"></div>
          <h1 class="page-header">Add New Product</h1>
          <div class="table-responsive">

            <form action="upload_image.php" method="post" enctype="multipart/form-data">
              <h2 style="color:red;"> <?php echo $error; ?>  </h2>
              <h2 style="color:blue;"> <?php echo $product_success; ?> </h2>
              <h2 style="color:blue;"> <?php echo $image_success; ?> </h2>

              <h3>Select and upload the image before filling in the new product details</h3>
              Select image to upload:
              <input type="file" name="fileToUpload" id="fileToUpload">
              <!--<input class="btn btn-default" type="submit" value="Upload Image" name="submit">-->
              <button type="submit"  class="btn btn-primary">Upload Image</button>
            </form>

          <form action="" method="post">
          <?php if(isset($p)) {
              echo "<input type='hidden' value='$id' name='id'/>";
          } ?>
          	<div class="form-group">
          		<label>
          			Product Name:
          		</label>
          		<input class="form-control" type="text" value="<?php echo @$p['productName']; ?>" name="product_name" >
          	</div>

          	<div class="form-group">
          		<label>
          			Android Link:
          		</label>
          		<input class="form-control" type="text" value="<?php echo @$p['androidLink']; ?>" name="android_link" >
          	</div>

          <div class="form-group">
              <label>
                  Apple Link:
              </label>
              <input class="form-control" type="text" value="<?php echo @$p['appleLink']; ?>" name="apple_link" >
          </div>

          	<div class="form-group">
          		<label>
          			Description:
          		</label>
          		<textarea name="description" class="form-control"><?php echo @$p['description']; ?></textarea>
          	</div>

              <div class="form-group">
                  <label>
                      Image:
                  </label>
                  <input class="form-control" type="text" value="<?php echo $useThis; ?>" name="image" >

              </div>
          	<div class="form-group">
          		<label>
          			Product Keywords:
          		</label>
          		<input class="form-control" type="text" value="<?php echo @$p['keywords']; ?>" name="keywords" >
          	</div>
            <button type="submit" name="add_product" class="btn btn-primary">Add Product</button> <!-- needs form validation -->

          </form>
          </div>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>

<?php ob_end_flush(); ?>
