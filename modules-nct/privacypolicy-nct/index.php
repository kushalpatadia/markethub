<?php
$reqAuth = false;
$module = 'privacypolicy-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.privacypolicy-nct.php";


extract($_REQUEST);
$winTitle = 'PrivacyPolicy';

$headTitle = 'PrivacyPolicy';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle/*, "author" => AUTHOR*/));

$obj = new PrivacyPolicy($module, 0, issetor($token));
$pageContent = $obj->getPageContent();

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>