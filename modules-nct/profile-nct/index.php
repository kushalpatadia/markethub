<?php

$reqAuth = false;
$module = 'profile-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.profile-nct.php";

extract($_REQUEST);

$winTitle = 'Profile';
$headTitle = 'Profile' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle, "author" => AUTHOR));

$obj = new Profile($module, 0, issetor($token));
$pageContent = $obj->getPageContent();

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>