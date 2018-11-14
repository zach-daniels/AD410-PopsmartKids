<?php 
include '../../includes/config.php';
?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li style="font-weight: bold; font-size: medium"><a>Admin Dashboard</a></li>
              <li><a href="admin_add.php"><i class="glyphicon glyphicon-plus"></i>Add Admin</a></li>
              <li><a href="<?=VIRTUAL_PATH;?>manual.pdf" target="_blank"><i class="glyphicon glyphicon-book"></i>Admin User Manual</a></li>
              <li><a href="dashboard.php"><i class="glyphicon glyphicon-pencil"></i>Blog Dashboard</a></li>
              <li><a href="comments.php"><i class="glyphicon glyphicon-comment"></i>Comments</a></li>
              <li><a href="admin_edit.php"><i class="glyphicon glyphicon-edit"></i>Edit Admin Data</a></li>
              <li><a href="subscribe.php"><i class="glyphicon glyphicon-envelope"></i>Email Subscriptions</a></li>
              <li><a href="posts.php"><i class="glyphicon glyphicon-pushpin"></i>Posts</a></li>
              <li><a href="products_dash.php"><i class="glyphicon glyphicon-list"></i>Products Dashboard</a></li>
              <li><a href="admin_reset.php"><i class="glyphicon glyphicon-saved"></i>Reset Admin PW</a></li>
              <li><a href="admin_logout.php"><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>
            </ul>
        </div>
      </div>
    </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


<!--            <li><a href="dashboard.php"><i class="glyphicon glyphicon-pencil"></i>Blog Dashboard</a></li>-->
<!--            <li><a href="posts.php"><i class="glyphicon glyphicon-pushpin"></i>Posts</a></li>-->
<!--            <li><a href="comments.php"><i class="glyphicon glyphicon-comment"></i>Comments</a></li>-->
<!--            <li><a href="products_dash.php"><i class="glyphicon glyphicon-list"></i>Products Dashboard</a></li>-->
<!--            <li><a href="subscribe.php"><i class="glyphicon glyphicon-envelope"></i>Email Subscriptions</a></li>-->
<!--            <li><a href="admin_add.php"><i class="glyphicon glyphicon-plus"></i>Add Admin</a></li>-->
<!--            <li><a href="admin_reset.php"><i class="glyphicon glyphicon-saved"></i>Reset Admin PW</a></li>-->
<!--            <li><a href="admin_edit.php"><i class="glyphicon glyphicon-edit"></i>Edit Admin Data</a></li>-->
<!--            <li><a href="--><?//=VIRTUAL_PATH;?><!--manual.pdf" target="_blank"><i class="glyphicon glyphicon-book"></i>Admin User Manual</a></li>-->
<!--            <li><a href="admin_logout.php"><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>-->