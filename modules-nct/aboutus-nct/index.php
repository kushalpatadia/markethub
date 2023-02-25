<?php
#############################################################
# Project:			Demo Project - Contact Us Page
# Developer ID:		107
# Page: 			Contact Us
# Started Date: 	19-Jul-2016
##############################################################
$reqAuth = false;
$module = 'aboutus-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.aboutus-nct.php";


extract($_REQUEST);
$winTitle = 'About Us ';

$headTitle = 'About Us ';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle/*, "author" => AUTHOR*/));
 
$obj = new AboutUs($module, 0, issetor($token));
$pageContent = $obj->getPageContent();

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>