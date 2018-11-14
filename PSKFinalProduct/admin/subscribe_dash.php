<?php

ob_start();
include('../includes/db.php');
require '../includes/config.php';
$myTitle = 'Email Subscriptions'; #Fills <title> tag
include INCLUDE_PATH . 'top.php'; #header must appear before any HTML is printed by PHP
echo '<link rel="stylesheet" type="text/css" href="admin_css/bootstrap.css">';
echo '<link rel="stylesheet" type="text/css" href="admin_css/dashboard.css">';
include('includes/sidebar.php');


if(isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    if($action == "delete"){
            $query = "DELETE FROM nlSubscribers WHERE subscriberID = '$id'";
    }

    execute_query($query);
}

$subscribers_statement = execute_query("SELECT * FROM nlSubscribers");

?>
<div class="spacer"></div>
<h1 class="page-header">Email Subscribers</h1>

<a href="export_subscribers.php" class="btn btn-info btn-lg" style="margin-left: 0;">Download List</a>
<div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Subscriber ID</th>
                <th>Email</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = $subscribers_statement->fetch(PDO::FETCH_ASSOC)) {?>
                <tr>
                    <td><?php echo $row['subscriberID']?></td>
                    <td><?php echo $row['subs_email']?></td>
                    <td><?php echo $row['subscribed']?></td>
                    <td><a href="subscribe_dash.php?action=delete&id=<?php echo $row['subscriberID'];?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php } //close while loop?>
            <?php $subscribers_statement->closeCursor(); ?>
            </tbody>
        </table>

        <!--
        <select name="action">
            <option>Delete</option>
            <option>Clone</option>
        </select>

        <button type="submit" name="apply" class="btn btn-default">Apply</button>
        -->
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