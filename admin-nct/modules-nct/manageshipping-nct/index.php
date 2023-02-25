<?php


$reqAuth = false;
$module = 'manageshipping-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.manageshipping-nct.php";

$winTitle = 'Manage Shipping';

$headTitle = 'Manage Shipping';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

if (isset($_SESSION['adminusername'])){
$obj = new ManageShipping($module, 0, issetor($token));

$pageContent = $obj->getPageContent();
}
else{
	redirectPage(SITE_ADMIN_URL);
}

require_once DIR_ADMIN_TMPL . "parsing-nct.tpl.php";
?>