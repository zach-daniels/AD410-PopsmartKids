<?php
/**
 * $adminEdit.php is a single page web application that allows an admin to 
 * edit some of their personal data
 *
 * This page is an addition to the application started as the nmAdmin package
 * 
 * @package nmAdmin
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 2.21 2015/12/07
 * @link http://www.newmanix.com/  
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see admin_add.php 
 * @see admin_reset.php
 * @see admin_only_inc.php
 * @todo Add ability to change privilege level of admin by developer - add ability of SuperAdmin to change priv. level
 */

require '../includes/config.php'; #provides configuration, pathing, error handling, db credentials
$myTitle = 'Edit Administrator'; #Fills <title> tag
$metaRobots = 'no index, no follow';#never index admin pages
include INCLUDE_PATH . 'top.php';
echo '<link rel="stylesheet" type="text/css" href="admin_css/bootstrap.css">';
echo '<link rel="stylesheet" type="text/css" href="admin_css/dashboard.css">';
include('includes/sidebar.php');
//END CONFIG AREA ----------------------------------------------------------

$access = "admin"; #admins can edit themselves, developers can edit any - don't change this var or no one can edit their own data
include_once INCLUDE_PATH . 'admin_only_inc.php'; #session protected page - level is defined in $access var

# Read the value of 'action' whether it is passed via $_POST or $_GET with $_REQUEST
if(isset($_REQUEST['act'])){$myAction = (trim($_REQUEST['act']));}else{$myAction = "";}

switch ($myAction) 
{//check for type of process
	case "edit": # 2) show form to edit data
	 	editDisplay();
	 	break;
	case "update": # 3) execute SQL, redirect
		updateExecute();
		break; 
	default: # 1)Select Administrator
	 	selectAdmin();
}

function selectAdmin()
{//Select administrator
	if($_SESSION["Privilege"] == "admin")
	{#redirect if logged in only as admin
		header('Location:' . ADMIN_PATH . THIS_PAGE . "?act=edit");
        die; 
	} ?>
   <div class="dashspacer"></div>
    <?=showFeedback();?>
    <div class="table-responsive">
	<?php
    echo '<h1 class="page-header">Edit Administrator Data</h1>';
	if($_SESSION["Privilege"] == "developer" || $_SESSION["Privilege"] == "superadmin")
	{# must be greater than admin level to have  choice of selection
		echo '<p class="sub-header">Select an Administrator, to edit their data:</p>';
	}

	$sql = "select AdminID,FirstName,LastName,Email,Privilege,LastLogin,NumLogins from retro_Admin";
	if($_SESSION["Privilege"] != "developer" && $_SESSION["Privilege"] != "superadmin")
	{# limit access to the individual, if not developer level
		$sql .= " where AdminID=" . $_SESSION["AdminID"];
	}
	$result = execute_query($sql);
	$count = $result->rowCount();
	if ($count > 0)//at least one record!
	{//show results for superadmin/developer access and select
        echo '
		<form action="admin_edit.php" method="post">
		<table class="table table-striped">
		<thead>
            <tr>
                <th>AdminID</th>
                <th>Admin</th>
                <th>Email</th>
                <th>Privilege</th>
            </tr>
        </thead>
        <tbody>
		';
        while ($row = $result->fetch(PDO::FETCH_ASSOC))
        {//dbOut() function is a 'wrapper' designed to strip slashes, etc. of data leaving db
            echo '
		     <tr>
		     	<td>
		     		<input type="radio" required name="AdminID" value="' . (int)$row['AdminID'] . '">' .
                (int)$row['AdminID'] . '</td>
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
		';
?>
    </div>
    <?php
	}else{//no records
      echo '<p align="center"><h3>Currently No Administrators in Database.</h3></p>';
	}
	include INCLUDE_PATH . 'bottom.php';
}

/**
 * @param string $nav1
 */
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
            header('Location:' . ADMIN_PATH . THIS_PAGE);
            die;
        }
    }

	$sql = "select FirstName,LastName,Email,Privilege from retro_Admin WHERE AdminID = '$myID'";
	$result = execute_query($sql);
	$count = $result->rowCount();
	if($count > 0)//at least one record!
	{//show results
		while ($row = $result->fetch(PDO::FETCH_ASSOC))
		{//dbOut() function is a 'wrapper' designed to strip slashes, etc. of data leaving db
		     $FirstName = dbOut($row['FirstName']);
		     $LastName = dbOut($row['LastName']);
		     $Email = dbOut($row['Email']);
		     $Privilege = dbOut($row['Privilege']);
		}
	}else{//no records
      //put links on page to reset form, exit
      echo '
      <p align="center"><h3>No such administrator.</h3></p>
      ';
	} ?>
    <div class="dashspacer"></div>
    <?=showFeedback();?>
	<?php echo '
    <div class="table-responsive">
	<h1 class="page-header">Edit Administrator</h1>
	<form action="admin_edit.php" method="post">
	<table class="table table-striped">
	    <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Privilege</th>
                <th>Actions</th>
            </tr>
		</thead>
		<tbody>
		<tr>
		    <td>
				<input type="text" autofocus required name="FirstName" value="' . $FirstName . '" />
			</td>
			<td>
				<input type="text" required name="LastName" value="' . $LastName . '" />
			</td>
			<td>
				<input type="text" required name="Email" value="' . $Email . '" />
			</td>
        
	';
		if($_SESSION["Privilege"] == "developer" || $_SESSION["Privilege"] == "superadmin")
		{# uses returnSelect() function to preload the select option
			echo '
				<td>
				';
				#creates preloaded radio, select, checkbox set
            $privileges = getENUM('retro_Admin','Privilege'); #grab all possible 'Privileges' from ENUM
			echo returnSelect("select","Privilege",$privileges,"",$privileges,",");	
				echo '
				</td>';
		}else{
			echo '<input type="hidden" name="Privilege" value="' . $_SESSION["Privilege"] . '" />';
		}	
	echo '
	   
	   <td>
            <button type="submit" class="btn btn-success">Update Admin</button>
	    </td>
		</tr>
		</tbody>
		<input type="hidden" name="AdminID" value="' . $myID . '" />
	   <input type="hidden" name="act" value="update" />
	</table>    
	</form>
	';
	include INCLUDE_PATH . 'bottom.php';
}

function updateExecute()
{
    $params = array('FirstName','LastName','AdminID','Email','Privilege');#required fields
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

    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Privilege = $_POST['Privilege'];

	
	#check for duplicate email
	$sql = "select AdminID from retro_Admin WHERE Email = '$Email' and AdminID != '$AdminID'";
	$result = execute_query($sql);

	$count = $result->rowCount();
	if($count > 0)//at least one record!
	{# someone already has email!
		feedback("Email already exists - please choose a different email.");
		header('Location:' . ADMIN_PATH . THIS_PAGE);
        die;
	}

	#sprintf() function allows us to filter data by type while inserting DB values.  Illegal data is neutralized, ie: numerics become zero
	$sql = "UPDATE " . PREFIX . "Admin set FirstName='$FirstName',LastName='$LastName',Email='$Email',Privilege='$Privilege' WHERE AdminID='$AdminID'";
    
    $statement = execute_query($sql);
	$count = $statement->rowCount();
	//feedback success or failure of insert
	if ($count > 0){
         feedback("Successfully Updated!","notice");
         if($_SESSION["AdminID"] == $AdminID)
         {#this is me!  update current session info:
            $_SESSION["Privilege"] = $Privilege;
            $_SESSION["FirstName"] = $FirstName;
         }
	}else{
	 	feedback("Data NOT Updated! (or not changed from original values)");
	} ?>

	<div class="dashspacer"></div>
    <?=showFeedback();?>
	<?php echo '
    <div class="table-responsive">
	<h1 class="page-header">Edit Administrator</h1>
	<a href="' . ADMIN_PATH . THIS_PAGE . '" class="btn btn-info" style="margin-left: 45%; margin-bottom: 20px;">Edit More</a>
		';
	include INCLUDE_PATH . 'bottom.php';
   
}

