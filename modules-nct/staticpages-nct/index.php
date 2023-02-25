<?php

$reqAuth = false;
$module = 'staticpages-nct';
require_once "../../includes-nct/config-nct.php";
require_once "../../includes-nct/database-nct.php";

require_once "class.staticpages-nct.php";

extract($_REQUEST);


$winTitle = $page;
$headTitle = $page;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle));

$page = $_GET['page'];

if(!empty($page)){
$obj = new StaticPages($module, 0, issetor($token));
$pageContent = $obj->getPageContent($page);
}
else{
	redirectPage(SITE_URL);
}

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>