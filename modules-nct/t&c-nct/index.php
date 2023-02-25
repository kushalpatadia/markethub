<?php
$reqAuth = false;
$module = 't&c-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.t&c-nct.php";


extract($_REQUEST);
$winTitle = 'Terms and Conditions';

$headTitle = 'Terms and Conditions ';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle/*, "author" => AUTHOR*/));

$obj = new TermsAndConditions($module, 0, issetor($token));
$pageContent = $obj->getPageContent();

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>