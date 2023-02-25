<?php
$reqAuth = false;
$module = 'registration-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.registration-nct.php";


extract($_REQUEST);

	$winTitle = 'Registration ';

$headTitle = 'Registration';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

if(isset($_POST['sbtuser']))
{ 
	if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['phone_no']) && !empty($_POST['phone_no']) && isset($_POST['password2']) && !empty($_POST['password2']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$email = strtolower($email);
		$pass=$_POST['password'];
		$pass=md5(md5('mh'.$pass.'hm'));
		$mob=$_POST['phone_no'];
		$date =  date('Y-m-d H:i:s');
		$rip = $_SERVER['REMOTE_ADDR'];
		$check=mysqli_query($conn,"SELECT * FROM register_users WHERE email='$email'");
		$rows=mysqli_num_rows($check);
		if ($rows > 0) {
			foreach ($check as $k => $v) {
				$register_by = $v['oauth_provider'];
			}
			echo "<script>window.onload = function() {
				toastrAlert('error','Email Address already registered by:".$register_by."')
			}</script>";	
		}
		else
		{
			if($email != '' && $name != '' && isset($_POST['password']) && $mob != '') 
			{
				$sql = "INSERT INTO register_users(`username`, `email`, `password`, `mobileno`, `created_date`, `ipaddress`, `status`) VALUES('$name','$email','$pass','$mob','$date','$rip','d')";
				mysqli_query($conn, $sql);
				// echo "<script>window.location = '../signin-nct/';</script>";

				$lastID = mysqli_insert_id($conn);
				$ID = rand();
				$insert ="UPDATE `register_users` SET `con_key` = '$ID' WHERE `u_id`='$lastID'";
				$update = mysqli_query($conn,$insert);

				$message = '<html><head><title>Email Verification</title></head><body>';
				$message .= '<h1>Hi ' . $name . '!</h1>';
				$message .= '<p><a href="'.SITE_MOD.'registration-nct/confirmation-nct.php?code='.base64_encode($ID).'&pass='.base64_encode($lastID).'">CLICK TO ACTIVATE YOUR ACCOUNT</a>';
				$message .= "</body></html>";

				$subject = "Email Verifcation - MarketHub";
				sendEmailAddress($email,$subject,$message);

				echo "<script>window.onload = function() {
					toastrAlert('success','Email Sent Successfully')
				}</script>";	
			}
			else
			{
				echo "<script>window.onload = function() {
					toastrAlert('error','Oops Something wrong happens');
				}</script>";	
			}
		}
	}
	else
	{
		echo "<script>window.onload = function() {
			toastrAlert('error','All Fields are required');
		}</script>";	
	}

} 

if (isset($_SESSION['login_user']) && $_SESSION['userid']) {
	redirectPage(SITE_URL);
}
else
{
	$obj = new Registration($module, 0, issetor($token));
	$pageContent = $obj->getPageContent();
}
require_once DIR_TMPL . "parsing-nct.tpl.php";
?>