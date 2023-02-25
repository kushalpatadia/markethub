<?php

$reqAuth = false;
$module = 'updateprofile-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.updateprofile-nct.php";

extract($_REQUEST);

$winTitle = 'Update Profile';
$headTitle = 'Update Profile' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle, "author" => AUTHOR));
$date =  date('Y-m-d H:i:s');

$obj = new UpdateProfile($module, 0, issetor($token));
$pageContent = $obj->getPageContent();
if (isset($_POST['update']))
{	
	$id=$_SESSION['userid'];
	$username=$_POST['username'];
	$mobi = $_POST['mobileno'];
	$gf_query = "SELECT oauth_provider FROM register_users WHERE u_id='$id'";
	$oauth_provider = mysqli_query($conn,$gf_query);
	$oauth_provider = mysqli_fetch_array($oauth_provider);
	echo $oauth_provider['oauth_provider'];
	if ($oauth_provider['oauth_provider']=='') 
	{
		$query= "UPDATE register_users SET username='$username', mobileno='$mobi', last_updatetime='$date' WHERE u_id='$id'";
	}
 	else
 	{
 		$query= "UPDATE register_users SET mobileno='$mobi', last_updatetime='$date' WHERE u_id='$id'";
 	}
 	$rel = mysqli_query($conn,$query);
 	redirectPage(SITE_MOD."profile-nct/");
}


require_once DIR_TMPL . "parsing-nct.tpl.php";
?>