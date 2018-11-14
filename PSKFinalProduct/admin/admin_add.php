<?php
/**
 * admin_add.php is a single page web application that adds an administrator
 * to the admin database table
 */

require '../includes/config.php'; #provides configuration, pathing, error handling, db credentials
$myTitle = 'Add Administrator'; #Fills <title> tag

//END CONFIG AREA ----------------------------------------------------------
$access = "superadmin"; #superadmin or above can add new administrators
include_once INCLUDE_PATH . 'admin_only_inc.php'; #session protected page - level is defined in $access var

if (isset($_POST['Email']))
{# if Email is set, check for valid data
    if(!onlyEmail($_POST['Email']))
    {//data must be valid email
        feedback("Data entered for email is not valid", "error");
        header('Location:' . ADMIN_PATH . THIS_PAGE);
        die;
    }

//    if(!onlyAlphaNum($_POST['PWord1']))
//    {//data must be alphanumeric or punctuation only
//        feedback("Password must contain letters and numbers only.","error");
//        header('Location:' . ADMIN_PATH . THIS_PAGE);
//        die;
//    }

    $params = array('FirstName','LastName','PWord1','Email','Privilege');#required fields
    if(!required_params($params))
    {//abort - required fields not sent
        feedback("Data not entered/updated. (error code #" . createErrorCode(THIS_PAGE,__LINE__) . ")","error");
        header('Location:' . ADMIN_PATH . THIS_PAGE);
        die;
    }

    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $AdminPW = $_POST['PWord1'];
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

    #sprintf() function allows us to filter data by type while inserting DB values.
    $sql = "INSERT INTO retro_Admin (FirstName,LastName,AdminPW,Email,Privilege) VALUES('$FirstName', '$LastName', SHA('$AdminPW'), '$Email', '$Privilege')";
    # insert is done here
    $statement = execute_query($sql);

    $count = $statement->rowCount();
    # feedback success or failure of insert
    if ($count > 0){
        feedback("Administrator Added!","notice");
    }else{
        feedback("Administrator NOT Added!", "error");
    }

    include INCLUDE_PATH . 'top.php';
    echo '<link rel="stylesheet" type="text/css" href="admin_css/bootstrap.css">';
    echo '<link rel="stylesheet" type="text/css" href="admin_css/dashboard.css">';
    include('includes/sidebar.php');
    echo '<div class="dashspacer"></div>'; ?>
    <?=showFeedback();?>
    <?php
    echo '
   <div class="table-responsive">
     <h1 class="page-header" style="margin-left: 40%; margin-right: 40%;">Add Administrator</h1>
     <a href="' . ADMIN_PATH . THIS_PAGE . '" class="btn btn-info" style="margin-left: 45%; margin-bottom: 20px;">Add More</a>
     ';
    include INCLUDE_PATH . 'bottom.php';
}else{ //show form - provide feedback

    include INCLUDE_PATH . 'top.php';
    echo '<link rel="stylesheet" type="text/css" href="admin_css/bootstrap.css">';
    echo '<link rel="stylesheet" type="text/css" href="admin_css/dashboard.css">';
    include('includes/sidebar.php');

    echo '
  <div class="dashspacer"></div>'; ?>
  <?=showFeedback();?>
  <?php
    echo '
  <h1 class="page-header">Add New Administrator</h1>
  <p align="center">Be sure to write down the password!!</p>
  <form action="admin_add.php" method="post">
  <table class="table table-striped">
     <tr>
        <td align="right">First Name</td>
        <td>
           <input type="text" autofocus required name="FirstName" />
           <font color="red"><b>*</b></font>
        </td>
     </tr>
     <tr>
        <td align="right">Last Name</td>
        <td>
           <input type="text" required name="LastName" />
           <font color="red"><b>*</b></font>
        </td>
     </tr>
     <tr>
        <td align="right">Email</td>
        <td>
           <input type="email" required name="Email" />
           <font color="red"><b>*</b></font>
        </td>
     </tr>
     <tr>
            <td align="right">Privilege:</td>
            <td>
         ';


    $iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
    $privileges = getENUM(PREFIX . 'Admin','Privilege',$iConn); #grab all possible 'Privileges' from ENUM
    echo returnSelect("select","Privilege",$privileges,"",$privileges,",");
    echo '
            </td>
     </tr>
     <tr>
            <td align="right">Password</td>
            <td>
               <input type="password" required name="PWord1" />
                  <font color="red"><b>*</b></font>
                  <em>(6-20 alphanumeric chars)</em>
            </td>
         </tr>
     <tr>
            <td align="right">Re-enter Password</td>
            <td>
               <input type="password" required name="PWord2" />
               <font color="red"><b>*</b></font>
            </td>
     </tr>
     <tr>
            <td align="center" colspan="2">
            <button type="submit" name="add_admin" class="btn btn-success">Add Admin!</button>
            </td>
         </tr>
  </table>   
  </form>
  ';

    @mysqli_close($iConn);
    include INCLUDE_PATH . 'bottom.php';
}

?>

