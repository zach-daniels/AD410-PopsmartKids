<?php
/*
config.php - will allow us to swap html pieces dynamically
include this file at the top 'top.php'!
*/

define('DEBUG',true); #we want to see all errors

define('SECURE',false); #force secure, https, for all site pages

define('PREFIX', 'retro_'); #Adds uniqueness to your DB table names.  Limits hackability, naming collisions

date_default_timezone_set('America/Los_Angeles'); #sets default date/timezone for this website

/*
 *   Virtual (web) 'root' of application for images, JS & CSS files
 *
 *   IF SECURE, MUST BE https://
 *   Contact hosting company for assistance:
 *   http://wiki.dreamhost.com/Secure_Hosting
*/

/* use the following path settings for placing all code in one application folder - gadgets is our example app name */
//define('VIRTUAL_PATH', 'http://smart1.icoolshow.net/Zak/');

define('VIRTUAL_PATH', 'https://smart1.zakbrinlee.com/');

define('PHYSICAL_PATH', '/home/goldteam1/smart1.zakbrinlee.com/'); # Physical (PHP) 'root' of application for file & upload reference

define('INCLUDE_PATH', PHYSICAL_PATH . 'includes/'); # Path to PHP include files - INSIDE APPLICATION ROOT

define('ADMIN_PATH', 'https://smart1.zakbrinlee.com/admin/');

/* testing defines for using zakbrinlee domain for admin access */

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//Google Recaptcha siteKey/secretKey
//Here are the keys for the server: smart1.zakbrinlee.com
$siteKey = "6LedIVoUAAAAACzpLBR9G_od9AHI6jwpYOgByIXL";
$secretKey = "6LedIVoUAAAAACjonlqG6WKltQdmrAEaHK_SEqpf";

/*
 * reference required include files here
 */

include 'credentials.php'; //stores database login info
include 'common.php'; //stores all unsightly application functions, etc.

ob_start();  #buffers our page to be prevent header errors. Call before INC files or ANY html!
header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching

//place URL & labels in the variable/array here for navigation:
$nav1[VIRTUAL_PATH . 'index.php'] = "Home";
$nav1[VIRTUAL_PATH . 'products.php'] = "Products";
$nav1[VIRTUAL_PATH . 'safeZone.php'] = "Safe Zone";
$nav1[VIRTUAL_PATH . 'about.php'] = "About Us";
$nav1[VIRTUAL_PATH . 'blog.php'] = "Blog";
$nav1[VIRTUAL_PATH . 'contactUs.php'] = "Contact Us";

/* below we can create 'case' statements to accommodate
 unique data items (title and an image) that will
reside in the 'top.php' file
*/
switch(THIS_PAGE)
{
  case "index.php":
  $myTitle = "PopSmartKids Home";
  $myAlt = "PopSmart Home";
  break;
  
  case "products.php":
  $myTitle = "PopSmartKids Products";
  $myAlt = "PopSmartKids Products";
  break; 
  
  case "about.php":
  $myTitle = "PopSmartKids About Us";
  $myAlt = "PopSmartKids About Us";
  break;
  
  case "safeZone.php":
  $myTitle = "PopSmartKids Safe Zone";
  $myAlt = "PopSmartKids Safe Zone";
  break;
  
  case "blog.php":
  $myTitle = "PopSmartKids Blog";
  $myAlt = "PopSmartKids Blog";
  break;

  case "contactUs.php":
   $myTitle = "PopSmartKids Contact Us";
   $myAlt = "PopSmartKids Contact Us";
   break;
  //fallback values for undefined pages
  default:
  $myTitle = THIS_PAGE; #the file name is unique
  $myAlt = "PopSmartKids";
}
//--------------END CONFIG AREA --------------------------------


/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
if(startSession() && isset($_SESSION['AdminID']))
{#add admin logged in info to sidebar or nav
    $adminWidget = '<li><a href="' . ADMIN_PATH . 'admin_dashboard.php">ADMIN</a></li>';
    $adminWidget .= '<li><a href="' . ADMIN_PATH . 'admin_logout.php">LOGOUT</a></li>';
}else{//show login (YOU MAY WANT TO SET TO EMPTY STRING FOR SECURITY)
    $adminWidget = '<li><a href="' . ADMIN_PATH . 'admin_login.php">LOGIN</a></li>';
}

/*
 * These variables, when added to the header.php and footer.php files,
 * allow custom JS or CSS scripts to be loaded into <head> element and
 * just before the closing body tag, respectively
 */
$loadhead = '';
$loadfoot = '';
?>