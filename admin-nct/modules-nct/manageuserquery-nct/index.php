<?php


$reqAuth = false;
$module = 'manageuserquery-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.manageuserquery-nct.php";

$winTitle = 'Manage User Query';

$headTitle = 'Manage User Query';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));


if (isset($_SESSION['adminusername'])){
$obj = new ManageUserQuery($module, 0, issetor($token));
$pageContent = $obj->getPageContent();
}
else{
    redirectPage(SITE_ADMIN_URL);
}

require_once DIR_ADMIN_TMPL . "parsing-nct.tpl.php";
?>