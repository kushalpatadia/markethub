<?php


$reqAuth = false;
$module = 'updatesellerproduct-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.updatesellerproduct-nct.php";

$winTitle = 'Approve Seller Products Update';

$headTitle = 'Approve Seller Products Update';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

if (isset($_GET['pid'])){
	$conn=mysqli_connect("localhost","root","","markethub");
	$date = date('Y-m-d H:i:s');
	$pid = $_GET['pid'];
	$query = "UPDATE tbl_products SET isActive='y' WHERE id='$pid'";
	$exe = mysqli_query($conn,$query);
	
	$user_id = "SELECT upload_by FROM tbl_products WHERE id='$pid'"; 
	$exe = mysqli_query($conn,$user_id);
	$user_id = mysqli_fetch_array($exe);
	$u_id=$user_id['upload_by'];
	preg_match_all('!\d+!', $u_id, $u_id1);
	$u_id = implode(' ', $u_id1[0]);
	$query2="INSERT INTO tbl_notifications (u_id,p_id,message,n_date) VALUES ('$u_id','$pid','is updated','$date')";
	$exe2 = mysqli_query($conn,$query2);
	redirectPage(SITE_ADM_MOD.'updatesellerproduct-nct/');
}

if (isset($_SESSION['adminusername'])){
$obj = new UpdateSellerProduct($module, 0, issetor($token));
$pageContent = $obj->getPageContent();
}
else{
    redirectPage(SITE_ADMIN_URL);
}

require_once DIR_ADMIN_TMPL . "parsing-nct.tpl.php";
?>