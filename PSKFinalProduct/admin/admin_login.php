<?php
/**
 * admin_login.php is entry point (form) page to administrative area
 *
 * Works with admin_validate.php to process administrator login requests.
 * Forwards user to admin_dashboard.php, upon successful login.
 *
 * @see admin_validate.php
 * @see admin_dashboard.php
 * @see admin_logout.php
 * @see admin_only_inc.php
 * @todo none
 */
require '../includes/config.php'; #provides configuration, pathing, error handling, db credentials
$myTitle = 'Admin Login'; #Fills <title> tag
//END CONFIG AREA ----------------------------------------------------------
if(startSession() && isset($_SESSION['red']) && $_SESSION['red'] != 'admin_logout.php')
{//store redirect to get directly back to originating page
	$red = $_SESSION['red'];
}else{//don't redirect to logout page!
	$red = '';
}#required for redirect back to previous page

include INCLUDE_PATH . 'top.php'; #header must appear before any HTML is printed by PHP
echo '<link rel="stylesheet" type="text/css" href="admin_css/bootstrap.css">';
echo '<link rel="stylesheet" type="text/css" href="admin_css/dashboard.css">';

?>
<div class="dashspacer"></div>
<?=showFeedback();?>
<?php echo '
<div class="table-responsive" style="width: 30%; margin: auto;">
 <h1 class="page-header">Admin Login</h1>
 <p class="sub-header">Please login for admin functions</p>
 <table class="table table-striped">
 	  <form action="admin_validate.php" method="post">
 	  <thead>
			<tr>
				<th>Email</th>
				<th>Password</th>
			</tr>
		</thead>
		<tbody>
      <tr>
			<td>
				<input type="email" name="em" id="em" value="zak@example.com"/>
			</td>
			<td>
      			<input type="password" required name="pw" id="pw" value="asdfasdf"/>
      		</td>
      </tr>       
      <tr>
      	<td align="center" colspan="2">
      		<input type="hidden" name="red" value="' . $red . '" />
      		<button type="submit" name="admin_reset" class="btn btn-success">Login</button>
      	</td>
      </tr>
 </table>
 </form>
 </div>
 ';

include INCLUDE_PATH . 'bottom.php';
if(isset($_SESSION['red']) && $_SESSION['red'] == 'admin_logout.php')
{#since admin_logout.php uses the session var to pass feedback, kill the session here!
	$_SESSION = array();
	session_destroy();
}
?>
