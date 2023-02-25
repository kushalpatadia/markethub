<?php

$reqAuth = false;
$module = 'purchase-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.purchase-nct.php";

extract($_REQUEST);

$winTitle = 'Purchase Details';
$headTitle = 'Purchase Details' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle, "author" => AUTHOR));

if (isset($_GET['orderid'])) {
	$orderid = $_GET['orderid'];
	$u_id = $_SESSION['userid'];
	$query = "UPDATE tbl_order_details SET status='d' WHERE order_id='$orderid' AND u_id='$u_id'";
	$exe = mysqli_query($conn,$query);
	redirectPage(SITE_MOD."purchase-nct/");
}

$obj = new Purchase($module, 0, issetor($token));
$pageContent = $obj->getPageContent();

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>