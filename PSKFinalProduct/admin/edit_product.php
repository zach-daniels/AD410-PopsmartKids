<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 5/30/2018
 * Time: 11:33 AM
 */

ob_start();

//include('../includes/common.php');
require '../includes/config.php';
$myTitle = 'Edit Product';
include INCLUDE_PATH . 'top.php'; #header must appear before any HTML is printed by PHP
echo '<link rel="stylesheet" type="text/css" href="admin_css/bootstrap.css">';
echo '<link rel="stylesheet" type="text/css" href="admin_css/dashboard.css">';
include('includes/sidebar.php');
include_once INCLUDE_PATH . 'admin_only_inc.php'; #session protected page - level is defined in $access var

if(isset($_GET['status'])){
    $success = "SUCCESS!";
    $_GET = null;
}

if(isset($_GET['error'])){
    $uploadError = $_GET['error'];
    feedback("' . $uploadError . '", "error");
}

if(isset($_POST['edit_product'])){
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $android_link = $_POST['android_link'];
    $apple_link = $_POST['apple_link'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $keywords = $_POST['keywords'];
    
    $query = "UPDATE products SET productName=:product_name, androidLink=:androidLink, appleLink=:appleLink, image=:image, description=:description, keywords=:keywords WHERE `productID` = $id";
    $boundQ = array(":product_name", ":androidLink", ":appleLink", ":image", ":description", ":keywords");
    $param = array($product_name, $android_link, $apple_link, $image, $description,$keywords);
    $edit_product_statement = bound_query($query, $boundQ, $param);

    /*$new_product_statement = $db->prepare($query);
    $new_product_statement->execute();*/

    //this bit redirects to dashboard after making new post with feedback
    $count = $edit_product_statement->rowCount();
    //feedback success or failure of insert
    if ($count > 0)
    {
        feedback("Product Successfully Edited!","notice");
        header("Location:products_dash.php");
    }else{
        feedback("Product edits entered. (error code #" . createErrorCode(THIS_PAGE,__LINE__) . ")","error");
    }
    exit();
}

if(isset($_GET['product'])){
    $id = $_GET['product'];
    //$query = "SELECT * FROM blog_simple WHERE id = '$id'";

    $edit_product_statement = execute_query("SELECT * FROM products WHERE productID = $id");

    /*$edit_product_statement = $db->prepare("SELECT * FROM products WHERE productID = $id");
    $edit_product_statement->execute();*/

    $p = $edit_product_statement->fetch(PDO::FETCH_ASSOC);

    //this bit redirects to dashboard after making new post
}

if(isset($_GET['name'])){
    $useThis = $_GET['name'];
    //feedback("Image uploaded successfully", "success");
    //gets image name from upload_image doc
} else {
    $useThis = $p['image'];
    //gets image name saved database field
}

?>
    <div class="dashspacer"></div>
<?=showFeedback();?>
<h1 class="page-header">Edit Product</h1>
<div class="table-responsive">
    <!--    this is the code for image upload-->
    <div class="form-group">
        <form action="edit_image_upload.php" method="post" enctype="multipart/form-data">
            <h2 style="color:red;"> <?php echo $error; ?> </h2>
            <h2 style="color:blue;"> <?php echo $success; ?> </h2>
            <h3>Select and upload the image before editing product details</h3>
            <label>Select image to upload: </label>
            <input type="hidden" value="<?php echo $id; ?>" name="productID">
            <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" style="width: 25%;">
            <button type="submit"  class="btn btn-primary" style="margin-left: 0;">Upload Image</button>
        </form>
    </div>
    <form method="post">
        <?php if(isset($p)) {
            echo "<input type='hidden' value='$id' name='id'/>";
        } ?>
        <div class="form-group">
            <label>
                Product Name:
            </label>
            <input class="form-control" type="text" value="<?php echo @$p['productName']; ?>" name="product_name" required>
        </div>

        <div class="form-group">
            <label>
                Android Link:
            </label>
            <input class="form-control" type="text" value="<?php echo @$p['androidLink']; ?>" name="android_link" required >
        </div>

        <div class="form-group">
            <label>
                Apple Link:
            </label>
            <input class="form-control" type="text" value="<?php echo @$p['appleLink']; ?>" name="apple_link" required >
        </div>

        <div class="form-group">
            <label>
                Description:
            </label>
            <textarea name="description" class="form-control" required><?php echo @$p['description']; ?></textarea>
        </div>

        <div class="form-group">
            <label>
                Image Name:
            </label>
            <input class="form-control" type="text" value="<?php echo $useThis; ?>" name="image" readonly>
        </div>
        <div class="form-group">
            <label>
                Product Keywords:
            </label>
            <input class="form-control" type="text" value="<?php echo @$p['keywords']; ?>" name="keywords" >
        </div>
        <button type="submit" name="edit_product" class="btn btn-primary">Edit Product</button>

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