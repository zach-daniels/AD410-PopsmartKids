<?php 
//include('../includes/db.php');
//include('../includes/common.php');
require '../includes/config.php';
$myTitle = 'Blog Dashboard'; #Fills <title> tag

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
        if($entity == "post"){
            $query = "DELETE FROM blog_simple WHERE id = $id";

            $post_delete_statement = execute_query($query);
            //this bit redirects to dashboard after making new post with feedback
            $count = $post_delete_statement->rowCount();
            //feedback success or failure of deleting a blog post
            if ($count > 0)
            {
                feedback("Post deleted successfully!","success");
            }else{
                feedback("Post has not deleted successfully","error");
            }

        } else {
            $query = "DELETE FROM comments_simple WHERE id = $id";

            $comment_delete_statement = execute_query($query);
            //this bit redirects to dashboard after making new post with feedback
            $count = $comment_delete_statement->rowCount();
            //feedback success or failure of deleting a blog post
            if ($count > 0)
            {
                feedback("Comment deleted successfully!","success");
            }else{
                feedback("Comment has not deleted successfully","error");
            }
        }
    } else {
        $query = "UPDATE comments_simple SET status = '1' WHERE id = $id";

        $comment_update_statement = execute_query($query);
        //this bit redirects to dashboard after making new post with feedback
        $count = $comment_update_statement->rowCount();
        //feedback success or failure of deleting a blog post
        if ($count > 0)
        {
            feedback("Comment Approved!","success");
        }else{
            feedback("Comment Not Approved!","warning");
        }
    }

}

$posts_statement = execute_query("SELECT title, date, name, id
FROM blog_simple JOIN author ON blog_simple.author_id = author.author_id ORDER BY id DESC LIMIT 5");

$comments_statement = execute_query("SELECT * FROM comments_simple WHERE status='0' ORDER BY id DESC");
?>

<?=showFeedback();?>
  <h1 class="page-header">Blog Dashboard</h1>

  <h2 class="sub-header">Five Most Recent Posts</h2>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Date Posted</th>
          <th>Title</th>
          <th>Author</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

		<?php while($row = $posts_statement->fetch(PDO::FETCH_ASSOC)) { $rowName = $row['title']; ?>
        <tr id="<?php echo $rowName;?>">
          <td><?php echo $row['date']?></td>
          <td><?php echo $row['title']?></td>
          <td><?php echo $row['name']?></td>
          <td class="actions"><a href="new_post.php?post=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
          <a href="dashboard.php?entity=post&action=delete&id=<?php echo $row['id'];?>" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
        </tr>
        <?php } //close while loop?>
        <?php //$posts_statement->closeCursor(); ?>
          </tbody>
        </table>
      </div>

      <h2 class="sub-header">All Pending Comments</h2>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Comment</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php while($row = $comments_statement->fetch(PDO::FETCH_ASSOC)) {?>
            <tr>
              <td><?php echo $row['name']?></td>
              <td><?php echo $row['comment']?></td>
              <td><a href="dashboard.php?entity=comment&action=approve&id=<?php echo $row['id'];?>" class="btn btn-success">Approve</a>
                  <a href="dashboard.php?entity=comment&action=delete&id=<?php echo $row['id'];?>" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
              </td>
            </tr>
            <?php } //close while loop?>
            <?php //$comments_statement->closeCursor(); ?>
          </tbody>
        </table>
      </div>
<?php
include '../includes/bottom.php';
?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>