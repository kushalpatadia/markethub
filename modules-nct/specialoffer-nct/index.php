<?php

$reqAuth = false;
$module = 'specialoffer-nct';
require_once "../../includes-nct/config-nct.php";
require_once "../../includes-nct/database-nct.php";

require_once "class.specialoffer-nct.php";

extract($_REQUEST);

$winTitle = 'Special Offers';
$headTitle = 'Special Offers' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle));

if(isset($_POST['search']))
{ 
	extract($_POST);
	$sstring=isset($sstring)?$sstring:'';
	$sstring=mysqli_real_escape_string($conn,$sstring);
}
$obj = new SpecialOffer($module, 0, issetor($token));

$pageContent = $obj->getPageContent($sstring);

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>