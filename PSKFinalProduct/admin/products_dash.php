<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 5/23/2018
 * Time: 10:55 AM
 */
ob_start();
//include('../includes/common.php');
require '../includes/config.php';
$myTitle = 'Products Dashboard'; #Fills <title> tag
include INCLUDE_PATH . 'top.php'; #header must appear before any HTML is printed by PHP
echo '<link rel="stylesheet" type="text/css" href="admin_css/bootstrap.css">';
echo '<link rel="stylesheet" type="text/css" href="admin_css/dashboard.css">';
echo '<script type="text/javascript" src="../js/util.js"></script>';
include_once INCLUDE_PATH . 'admin_only_inc.php'; #session protected page - level is defined in $access var

include('includes/sidebar.php');

if( isset($_GET['entity']) && isset($_GET['action']) && isset($_GET['id'])) {
    $entity = $_GET['entity'];
    $action = $_GET['action'];
    $id = $_GET['id'];

    if($action == "delete"){
        if($entity == "product"){
            $query = "DELETE FROM products WHERE productID = '$id'";
        }
    }
    $result = execute_query($query);
    $count = $result->rowCount();
    //feedback success or failure of insert
    if ($count > 0)
    {
        feedback("Product Successfully Deleted!","notice");
    }else{
        feedback("Product not successfully deleted!");
    }
}
$posts_statement = execute_query("SELECT * FROM products ORDER BY productID DESC");

?>
<div class="dashspacer"></div>
<?=showFeedback();?>
  <h1 class="page-header">Products</h1>
  <a href="new_product.php" class="btn btn-info btn-lg">Add New</a>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Android Link</th>
          <th>Apple Link</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

		<?php while($row = $posts_statement->fetch(PDO::FETCH_ASSOC)) { $rowName = $row['productName']; ?>
        <tr id="<?php echo $rowName;?>">
          <td><?php echo $row['productName']?></td>
          <td><?php echo $row['androidLink']?></td>
          <td><?php echo $row['appleLink']?></td>
          <td><?php echo $row['description']?></td>
          <td class="actions"><a href="edit_product.php?product=<?php echo $row['productID']; ?>" class="btn btn-warning">Edit</a>
          <a href="products_dash.php?entity=product&action=delete&id=<?php echo $row['productID'];?>" class="btn btn-danger" onclick="return confirmDelete()">Delete</a></td>
        </tr>
        <?php } //close while loop?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
<?php include INCLUDE_PATH . 'bottom.php'; ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>

