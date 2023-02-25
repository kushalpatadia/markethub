<?php

$reqAuth = false;
$module = 'home-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.home-nct.php";

$winTitle = 'Admin Login';
$headTitle = 'Admin Login' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle, "author" => AUTHOR));

if(isset($_POST['sbtsignin']))
{ 
	$email=$_POST['email'];
	$pass=$_POST['password'];
	
	extract($_POST);
	// To protect MySQL injection for Security purpose

	$email = stripslashes($email);
	$pass = stripslashes($pass);
	$email = mysqli_real_escape_string($conn, $email);
	$pass = mysqli_real_escape_string($conn, $pass);
	$date = date('Y-m-d H:i:s');
	$ip = $_SERVER['REMOTE_ADDR'];

	if($email != '' && $pass != '') 
	{
		$query = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE password='$pass' AND username='$email'");
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {
			$row=mysqli_fetch_array($query);
				$_SESSION['adminusername']=$row['username'];
				$_SESSION['adminuserid']=$row['id']; // Initializing Session
				echo "<script>window.location='".SITE_ADM_MOD."dashboard-nct/'</script>";
		}
		else {
				echo "<script>alert('enter valid email or password')</script>";		
		}
		mysqli_close($conn); // Closing Connection
		}
} 



$obj = new Home($module, 0, issetor($token));

$pageContent = $obj->getPageContent();

require_once DIR_ADMIN_TMPL . "loginparsing-nct.tpl.php";
?>