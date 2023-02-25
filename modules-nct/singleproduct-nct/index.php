<?php

$reqAuth = false;
$module = 'singleproduct-nct';
require_once "../../includes-nct/config-nct.php";
//require_once "../../includes-nct/database-nct.php";

require_once "class.singleproduct-nct.php";

extract($_REQUEST);

$winTitle = 'Single Product';
$headTitle = 'Single Product' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle));

$obj = new SingleProduct($module, 0, issetor($token));

$pageContent = $obj->getPageContent();

require_once DIR_TMPL . "parsing-nct.tpl1.php";
?>