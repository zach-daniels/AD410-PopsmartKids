<?php
ob_start();
//include('../includes/common.php');
require '../includes/config.php';
$myTitle = 'Blog Posts'; #Fills <title> tag
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
            //$query = "DELETE FROM blog_simple WHERE id = $id";
            $delete_post_statement = execute_query("DELETE FROM blog_simple WHERE id = $id");

            $count = $delete_post_statement->rowCount();
            if($count > 0)//at least one record!
            {# someone already has email!
                feedback("Blog post deleted successfully.", "success");
                die;
            }
        }
    }
       
    /*
    $action_statement = $db->prepare($query);
    $action_statement->execute();
    $action_statement->closeCursor(); //closes connection to the server so other SQL statements can be issued*/
}
/*
$query = "SELECT * FROM blog_simple";
$posts_statement = $db->prepare($query);
$posts_statement->execute();
//$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
*/
$posts_statement = execute_query("SELECT title, body, date, keywords, name, id
FROM blog_simple JOIN author ON blog_simple.author_id = author.author_id ORDER BY id DESC");


?>
<div class="dashspacer"></div>
<?=showFeedback();?>
<h1 class="page-header">All Posts</h1>

<a href="new_post.php" class="btn btn-info btn-lg">Add New</a>
<div class="table-responsive">
    <form method="post">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Date Posted</th>
                <th>Title</th>
                <th>Author</th>
                <th>Keywords</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = $posts_statement->fetch(PDO::FETCH_ASSOC)) { $rowName = $row['title'];?>
                <tr id="<?php echo $rowName;?>">
                    <td><?php echo $row['date']?></td>
                    <td><?php echo $row['title']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['keywords']?></td>
                    <td class="actions"><a href="new_post.php?post=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="dashboard.php?entity=post&action=delete&id=<?php echo $row['id'];?>" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
                    </td>
                </tr>
            <?php } //close while loop?>
            <?php //$posts_statement->closeCursor(); ?>
            </tbody>
        </table>

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
