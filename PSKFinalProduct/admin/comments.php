<?php
ob_start();
//include('../includes/common.php');
require '../includes/config.php';
$myTitle = 'Blog Comments'; #Fills <title> tag
include INCLUDE_PATH . 'top.php'; #header must appear before any HTML is printed by PHP
echo '<link rel="stylesheet" type="text/css" href="admin_css/bootstrap.css">';
echo '<link rel="stylesheet" type="text/css" href="admin_css/dashboard.css">';
echo '<script type="text/javascript" src="../js/util.js"></script>';
include('includes/sidebar.php');

include_once INCLUDE_PATH . 'admin_only_inc.php'; #session protected page - level is defined in $access var

if( isset($_GET['entity']) && isset($_GET['action']) && isset($_GET['id'])) {
    $entity = $_GET['entity'];
    $action = $_GET['action'];
    $id = $_GET['id'];

    if($action == "delete"){
        //$query = "DELETE FROM comments_simple WHERE id = $id";
        $action_statement = execute_query("DELETE FROM comments_simple WHERE id = $id");
    }

    //this bit provides feedback for delete function
    $count = $action_statement->rowCount();
    //feedback success or failure of insert
    if ($count > 0)
    {
        feedback("Comment deleted successfully!","success");
    }else{
        feedback("Comment has not deleted successfully","error");
    }
}


//$query = "SELECT * FROM comments_simple ORDER BY id DESC";
$comments_statement = execute_query("SELECT * FROM comments_simple ORDER BY id DESC");
/*
$comments_statement = $db->prepare($query);
$comments_statement->execute();*/

?>
<div class="dashspacer"></div>
<?=showFeedback();?>
          <h1 class="page-header">Comments</h1>

          <div class="table-responsive">
          <form method="post">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Author</th>
                  <th>Comment</th>
                  <th>Post</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
          <?php while($row = $comments_statement->fetch(PDO::FETCH_ASSOC)) {

              $postID = $row['post'];
              /*$q = "SELECT * from blog_simple WHERE id = $postID";
              $stmt = $db->prepare($q);
              $stmt->execute();*/
              $stmt = execute_query("SELECT * from blog_simple WHERE id = $postID");
              $pTitle = $stmt->fetch(PDO::FETCH_ASSOC)['title'];

              ?>
            <tr>
            	<?php if(isset($pTitle)) {?>
              <td><?php echo $row['name']?></td>
              <td><?php echo $row['comment']?></td>
              <td><?php echo $pTitle ?></td>
              <td><a href="dashboard.php?entity=comment&action=delete&id=<?php echo $row['id'];?>" class="btn btn-danger" onclick="confirmDelete()">Delete</a></td>
                <?php } //end if?>
            </tr>
            <?php } //close while loop?>
            <?php //$comments_statement->closeCursor(); ?>
              </tbody>
            </table>

            <!--
            <select name="action">
            	<option>Delete</option>
            	<option>Approve</option>
            </select>
            <button type="submit" name="apply" class="btn btn-default">Apply</button>
            -->

          </form>
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
