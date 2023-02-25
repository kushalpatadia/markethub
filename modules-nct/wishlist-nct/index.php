<?php

$reqAuth = false;
$module = 'wishlist-nct';
require_once "../../includes-nct/config-nct.php";
require_once "../../includes-nct/database-nct.php";

require_once "class.wishlist-nct.php";

extract($_REQUEST);

$winTitle = 'Wish List';
$headTitle = 'Wish List' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle));

$obj = new WishList($module, 0, issetor($token));

$pageContent = $obj->getPageContent();

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>