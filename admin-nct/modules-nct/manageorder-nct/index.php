<?php


$reqAuth = false;
$module = 'manageorder-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.manageorder-nct.php";

$winTitle = 'Manage Order';

$headTitle = 'Manage Order';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

/* GET Value from admin for update order*/
if(isset($_POST['updateorder'])){
	$orderdetails = $_POST['orderdetails'];
	$status = $_POST['status'];
	$result= "UPDATE `tbl_order_details` SET `status`='$status' WHERE order_id='$orderdetails'";
	$query = mysqli_query($conn,$result);
	echo "<script>alert('Updated')</script>";
	redirectPage(SITE_ADM_MOD.'manageorder-nct/');
}

if (isset($_SESSION['adminusername'])){
$obj = new ManageOrder($module, 0, issetor($token));

$pageContent = $obj->getPageContent();
}
else{
	redirectPage(SITE_ADMIN_URL);
}

require_once DIR_ADMIN_TMPL . "parsing-nct.tpl.php";
?>