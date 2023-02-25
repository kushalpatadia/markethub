<?php
$module = 'signin-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.signin-nct.php";


extract($_REQUEST);

$winTitle = 'Signin';

$headTitle = 'Signin';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));


if(isset($_POST['sbtsignin']))
{ 
	$email=$_POST['email'];
	$pass=$_POST['password'];
	
	extract($_POST);
	// To protect MySQL injection for Security purpose
	$pass=md5(md5('mh'.$pass.'hm'));
	$email = stripslashes($email);
	$pass = stripslashes($pass);
	$email = mysqli_real_escape_string($conn, $email);
	$pass = mysqli_real_escape_string($conn, $pass);
	$date = date('Y-m-d H:i:s');
	$ip = $_SERVER['REMOTE_ADDR'];

	if($email != '' && $pass != '') 
	{
		$query = mysqli_query($conn, "SELECT * FROM register_users WHERE password='$pass' AND email='$email'");
		$updated = "UPDATE register_users SET last_logintime = '$date', ipaddress = '$ip' WHERE email = '$email'";
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {
			$row=mysqli_fetch_array($query);
			$status = $row['status'];
			if($status == 'a'){
				$_SESSION['login_user']=$row['email'];
				$_SESSION['username']=$row['username'];
				$_SESSION['userid']=$row['u_id']; // Initializing Session
				mysqli_query($conn,$updated);
				echo "<script>window.onload = function() {
    					toastrAlert('success','Login Successfully')
					}</script>";	
				echo "<script>window.location='../home-nct/'</script>";
			}	
			else{
				echo "<script>window.onload = function() {
    					toastrAlert('error','must active your acount','Error!!!!!')
					}</script>";		
			}
		}
		else {
			echo "<script>window.onload = function() {
    					toastrAlert('error','enter valid email or password','Error!!!!!')
				  }</script>";	
		}
		mysqli_close($conn); // Closing Connection
	}
} 

if (isset($_SESSION['login_user']) && $_SESSION['userid']) {
	// redirectPage(SITE_URL);
}
else
{
	$obj = new Registration($module, 0, issetor($token));
	$pageContent = $obj->getPageContent();
}
require_once DIR_TMPL . "parsing-nct.tpl.php";
?>	
