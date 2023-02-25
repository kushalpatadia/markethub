<?php

$reqAuth = false;
$module = 'dashboard-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.dashboard-nct.php";

extract($_REQUEST);

	$winTitle = 'Home';
$headTitle = 'Dashboard' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle, "author" => AUTHOR));

if(isset($_POST['sendmessage'])){
	$conn=mysqli_connect("localhost","root","","markethub");
	$message = $_POST['message'];
	$u_id = $_SESSION['adminuserid'];
	$query = mysqli_query($conn,"INSERT INTO tbl_todo_list VALUES ('','$u_id','$message')");
}

if (isset($_SESSION['adminusername'])){
$obj = new Dashboard($module, 0, issetor($token));
$pageContent = $obj->getPageContent();
}
else{
	redirectPage(SITE_ADMIN_URL);
}
require_once DIR_ADMIN_TMPL . "parsing-nct.tpl.php";
?>