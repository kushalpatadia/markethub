<?php
$reqAuth = false;
$module = 'faq-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.faq-nct.php";


extract($_REQUEST);
$winTitle = 'FAQ';

$headTitle = 'FAQ';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle/*, "author" => AUTHOR*/));
 
$obj = new FAQ($module, 0, issetor($token));
$pageContent = $obj->getPageContent();

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>