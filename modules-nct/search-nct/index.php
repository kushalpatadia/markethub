<?php

$reqAuth = false;
$module = 'search-nct';
require_once "../../includes-nct/config-nct.php";
require_once "../../includes-nct/database-nct.php";

require_once "class.search-nct.php";

extract($_REQUEST);

$winTitle = 'Search Products';
$headTitle = 'Search Products' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle));

if(isset($_POST['search']))
{ 
	extract($_POST);
	$sstring=isset($sstring)?$sstring:'';
	$sstring=mysqli_real_escape_string($conn,$sstring);
}
$obj = new SearchP($module, 0, issetor($token));

$pageContent = $obj->getPageContent($sstring);

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>