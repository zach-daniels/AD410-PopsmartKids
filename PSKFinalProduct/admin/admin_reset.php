<?php
/**
 * admin_reset.php allows an administrator to reset (reselect) a password 
 *
 * Because passwords are encrypted via the MySQL encrpyption SHA() method, 
 * we can't recover them, so we instead create new ones.
 *
 * As of v 2.21, requires $nav1 to be name of nav element from config file
 * 
 * @package nmAdmin
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 2.21 2015/12/07
 * @link http://www.newmanix.com/
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

require '../includes/config.php';#provides configuration, pathing, error handling, db credentials
$myTitle = 'Reset Administrator Password'; #Fills <title> tag
include INCLUDE_PATH . 'top.php';
echo '<link rel="stylesheet" type="text/css" href="admin_css/bootstrap.css">';
echo '<link rel="stylesheet" type="text/css" href="admin_css/dashboard.css">';
echo '<script type="text/javascript" src="../js/util.js"></script>';
include('includes/sidebar.php');
//END CONFIG AREA ----------------------------------------------------------
echo '<div class="dashspacer"></div>'; ?>
<?=showFeedback();?>
<?=$loadhead;?>
<?php
$access = "admin"; #admin can reset own password, superadmin can reset others
include_once INCLUDE_PATH . 'admin_only_inc.php'; #session protected page - level is defined in $access var

# Read the value of 'action' whether it is passed via $_POST or $_GET with $_REQUEST
if(isset($_REQUEST['act'])){$myAction = (trim($_REQUEST['act']));}else{$myAction = "";}

switch ($myAction) 
{//check for type of process
	case "edit": //2) show password change form
	 	editDisplay();
	 	break;
	case "update": //3) change password, feedback to user
		updateExecute();
		break; 
	default: //1)Select Administrator
	 	selectAdmin();
}


function selectAdmin()
{//Select administrator
	
	if($_SESSION["Privilege"] == "admin")
	{#redirect if logged in only as admin
        header('Location:' . ADMIN_PATH . THIS_PAGE . "?act=edit");
        die;
	}
	?>

    <div class="table-responsive">

    <?php
    echo '<h1 class="page-header">Reset Administrator Password</h1>';
	if($_SESSION["Privilege"] != "admin")
	{# must be greater than admin level to have  choice of selection
		echo '<p class="sub-header">Select an Administrator, to reset their password:</p>';
	}

    echo '<form action="admin_reset.php" method="post" onsubmit="return checkForm(this);">';

    $sql = "select AdminID,FirstName,LastName,Email,Privilege,LastLogin,NumLogins from retro_Admin";
	
    if($_SESSION["Privilege"] == "admin")
	{# limit access to the individual, if admin level
		$sql .= " where AdminID=" . $_SESSION["AdminID"];
	}
	
    $result = execute_query($sql);
    $count = $result->rowCount();
    if ($count > 0)//at least one record!
	{//show results
		echo '
		<form action="admin_reset.php" method="post" onsubmit="return checkForm(this);">
		<table class="table table-striped">
		<thead>
			<tr>
				<th>Admin</th>
				<th>Email</th>
				<th>Privilege</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>';
        while ($row = $result->fetch(PDO::FETCH_ASSOC))
		{//dbOut() function is a 'wrapper' designed to strip slashes, etc. of data leaving db
		     echo '
                 <tr>
					<td>
						<input type="radio" required name="AdminID" value="' . dbOut($row['AdminID']) . '">'
                 . dbOut($row['AdminID']) . '
					</td>
					<td>' . dbOut($row['FirstName']) . ' ' . dbOut($row['LastName']) . '</td>
					<td>' . dbOut($row['Email']) . '</td>
			     	<td>' . dbOut($row['Privilege']) . '</td>
			     </tr> 
		     ';
		}
		echo '
            <input type="hidden" name="act" value="edit" />
			<tr>
				<td align="center" colspan="4">
					<button type="submit" class="btn btn-warning">Edit Admin</button>
				</td>
			</tr>
		</tbody>
		</table>
		</form>
		';?>
    </div>
    <?php
	}else{//no records
      //put links on page to reset form, exit
      echo '<p align="center"><h3>Currently No Administrators in Database.</h3></p>';
	}
	include INCLUDE_PATH . 'bottom.php';
}

function editDisplay()
{
	if($_SESSION["Privilege"] == "admin")
	{#use session data if logged in as admin only
		$myID = (int)$_SESSION['AdminID'];
	}else{
		if(isset($_POST['AdminID']) && (int)$_POST['AdminID'] > 0)
		{
		 	$myID = (int)$_POST['AdminID']; #Convert to integer, will equate to zero if fails
		}else{
			feedback("AdminID not numeric","error");
			header('Location:' . ADMIN_PATH . THIS_PAGE);
        die;
		}
	}


    $sql = "select AdminID,FirstName,LastName,Email,Privilege from retro_Admin WHERE AdminID='$myID'";
    $result = execute_query($sql);
    $count = $result->rowCount();
    if($count > 0)//at least one record!
	{//show results
		while ($row = $result->fetch(PDO::FETCH_ASSOC))
		{//dbOut() function is a 'wrapper' designed to strip slashes, etc. of data leaving db
		     $Name = dbOut($row['FirstName']) . ' ' . dbOut($row['LastName']);
		     $Email = dbOut($row['Email']);
		     $Privilege = dbOut($row['Privilege']);
		}
	}else{//no records
      //put links on page to reset form, exit
      echo '
    <div> 
        <div class="dashspacer"></div>
        <div class="table-responsive">
        <h1 class="page-header">No such administrator</h1>
      	';
	}
	echo '
    <div class="dashspacer"></div>
    <div class="table-responsive">
	<h1 class="page-header">Reset Administrator Password</h1>
	<p>
		Admin: <font color="red"><b>' . $Name . '</b></font> 
		Email: <font color="red"><b>' . $Email . '</b></font>
		Privilege: <font color="red"><b>' . $Privilege . '</b></font> 
	</p> 
	<p class="sub-header">Be sure to write down password!!</p>
	<form action="admin_reset.php" method="post" onsubmit="return checkForm(this);">
	<table class="table table-striped">
	<tbody>
	    <tr>
		   	<td align="right">Password</td>
		   	<td>
		   		<input required type="password" name="PWord1" />
		   		<font color="red"><b>*</b></font> <em>(6-20 alphanumeric chars)</em>
		   	</td>
	   </tr>
	   <tr>
	   		<td align="right">Re-enter Password</td>
	   		<td>
	   			<input required type="password" name="PWord2" />
	   			<font color="red"><b>*</b></font>
	   		</td>
	   </tr>
	   <tr>
	   		<td align="center" colspan="2">
	   			<input type="hidden" name="AdminID" value="' .$myID . '" />
	   			<input type="hidden" name="act" value="update" />
	   			<button type="submit" class="btn btn-warning">Reset Password</button>
	   		</td>
	   	</tr>
	</tbody>
	</table>    
	</form>
	';
	include INCLUDE_PATH . 'bottom.php';
}

function updateExecute()
{
    $params = array('AdminID','PWord1');#required fields
    if(!required_params($params))
    {//abort - required fields not sent
        feedback("Data not entered/updated. (error code #" . createErrorCode(THIS_PAGE,__LINE__) . ")","error");
        header('Location:' . ADMIN_PATH . THIS_PAGE);
        die;	    
    }

	if(isset($_POST['AdminID']) && (int)$_POST['AdminID'] > 0)
	{
	 	$AdminID = (int)$_POST['AdminID']; #Convert to integer, will equate to zero if fails
	}else{
		feedback("AdminID not numeric","warning");
		header('Location:' . ADMIN_PATH . THIS_PAGE);
        die;
	}
	
	if(!onlyAlphaNum($_POST['PWord1']))
	{//data must be alphanumeric or punctuation only	
		feedback("Data entered for password must be alphanumeric only");
		header('Location:' . ADMIN_PATH . THIS_PAGE);
        die;
	}

	$AdminPW1 = $_POST['PWord1'];
    $AdminPW2 = $_POST['PWord2'];

    if($AdminPW1 != $AdminPW2){
        feedback("Passwords must match");
        header('Location:' . ADMIN_PATH . THIS_PAGE);
        die;
    }
	
    # SHA() is the MySQL function that encrypts the password
	$sql = sprintf("UPDATE " . PREFIX . "Admin set AdminPW=SHA('%s') WHERE AdminID=%d",$AdminPW,$AdminID);

    $result = execute_query($sql);
    $count = $result->rowCount();
	 //feedback success or failure of insert
	 if ($count > 0)
	 {
		 feedback("Password Successfully Reset!","notice");
 	 }else{
		 feedback("Password NOT Reset! (or not changed from original value)");
	 }

    echo '<div class="dashspacer"></div>'; ?>
    <?=showFeedback();?>
    <?php
    echo '
    <div class="table-responsive">
    <h1 class="page-header">Reset Administrator Password</h1>
	<a href="' . ADMIN_PATH . THIS_PAGE . '" class="btn btn-info" style="margin-left: 45%; margin-bottom: 20px;">Reset More</a>
	
	';
	include INCLUDE_PATH . 'bottom.php';
}

