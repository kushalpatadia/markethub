<?php


$reqAuth = false;
$module = 'payseller-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.payseller-nct.php";

$winTitle = 'Pay to Seller';

$headTitle = 'Pay to Seller';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));
if(isset($_POST['submitdetails'])){
	$paypalemail = $_POST['paypalemail'];
	$year = $_POST['year'];
	$month = $_POST['month'];
}


if (isset($_SESSION['adminusername'])){
$obj = new ManageOrder($module, 0, issetor($token));

$pageContent = $obj->getPageContent($paypalemail,$year,$month);
}
else{
	redirectPage(SITE_ADMIN_URL);
}

require_once DIR_ADMIN_TMPL . "parsing-nct.tpl.php";
?>