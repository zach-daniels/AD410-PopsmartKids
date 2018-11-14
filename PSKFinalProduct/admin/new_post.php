<?php
ob_start();
require '../includes/config.php';
$myTitle = 'Blog Post'; #Fills <title> tag
include INCLUDE_PATH . 'top.php'; #header must appear before any HTML is printed by PHP
echo '<link rel="stylesheet" type="text/css" href="admin_css/bootstrap.css">';
echo '<link rel="stylesheet" type="text/css" href="admin_css/dashboard.css">';
include('includes/sidebar.php');
include_once INCLUDE_PATH . 'admin_only_inc.php'; #session protected page - level is defined in $access var
$button_text = 'Add New';
if(isset($_POST['add_post'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $body = $_POST['body'];
    $keywords = $_POST['keywords'];
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $a = check_author($author);
        //echo "<script type='text/javascript'>alert('$a . YES');</script>";
        if($a == ""){
            execute_query("INSERT INTO author (name) VALUES('$author')");
            $a = check_author($author);
        }
        $query = "UPDATE blog_simple SET title=:title, author_id=:author, body=:body, keywords=:keywords WHERE `blog_simple`.`id` = $id";
        $boundQ = array(":title", ":author", ":body", ":keywords");
        $param = array($title, $a, $body, $keywords);
        $update_blog_statement = bound_query($query, $boundQ, $param);
        $count = $update_blog_statement->rowCount();
        if($count > 0)//at least one record!
        {# someone already has email!
            feedback("Blog updated successfully.", "success");
        }
        
    } else {
        $d = getDate();
        $date = "$d[month] $d[mday], $d[year]";
        $a = check_author($author);
      //  echo "<script type='text/javascript'>alert('$a . YES');</script>";
        if($a == ""){
            execute_query("INSERT INTO author (name) VALUES('$author')");
            $a = check_author($author);
        }
        $query = "INSERT INTO blog_simple (title, author_id, body, keywords, date) VALUES(:title, :author, :body, :keywords, :date)";
        $boundQ = array(":title", ":author", ":body", ":keywords", ":date");
        $param = array($title, $a, $body, $keywords, $date);
        $insert_blog_statement = bound_query($query, $boundQ, $param);
        $count = $insert_blog_statement->rowCount();
        if($count > 0)//at least one record!
        {# someone already has email!
            feedback("Blog post created successfully.", "success");
        }
    }
    
   
    /*$new_post_statement = $db->prepare($query);
    $new_post_statement->execute();*/
    //this bit redirects to dashboard after making new post
    header("Location:dashboard.php");
    exit();
}
if(isset($_GET['post'])){
    $id = $_GET['post'];
    //$query = "SELECT * FROM blog_simple WHERE id = '$id'";
    $button_text = 'Edit';
    /*$edit_post_statement = $db->prepare("SELECT * FROM blog_simple WHERE id = '$id'");
    $edit_post_statement->execute();*/
    $edit_post_statement = execute_query("SELECT title, body, date, keywords, name, id
FROM blog_simple JOIN author ON blog_simple.author_id = author.author_id WHERE id = $id");
    
    $p = $edit_post_statement->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="dashspacer"></div>
<?=showFeedback();?>
          <h1 class="page-header"><?=$button_text;?> Post</h1>
          <div class="table-responsive">
          <form method="post">
          <?php if(isset($p)) {
              echo "<input type='hidden' value='$id' name='id'/>";
          } ?>
          	<div class="form-group">
          		<label>
          			Post Title:
          		</label>
                        <input class="form-control" type="text" value="<?php echo @$p['title']; ?>" name="title" >
          	</div>
          	
          	<div class="form-group">
          		<label>
          			Post Author:
          		</label>
          		<input class="form-control" type="text" value="<?php echo @$p['name']; ?>" name="author" >
          	</div>
          	        	
          	<div class="form-group">
          		<label>
          			Post Body:
          		</label>
          		<textarea name="body" id="myTextarea" class="form-control"><?php echo @$p['body']; ?></textarea>
          	</div>
          	
          	<div class="form-group">
          		<label>
          			Post Keywords:
          		</label>
          		<input class="form-control" type="text" value="<?php echo @$p['keywords']; ?>" name="keywords" >
          	</div>            
            <button type="submit" name="add_post" class="btn btn-primary" style="margin-left: 45%"><?=$button_text;?> Post</button>
            
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
