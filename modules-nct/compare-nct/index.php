<?php
$reqAuth = false;
$module = 'compare-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.compare-nct.php";


extract($_REQUEST);
$winTitle = 'Compare Products ';

$headTitle = 'Compare Products ';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle/*, "author" => AUTHOR*/));

if(isset($_GET['compareid1']) && isset($_GET['compareid2']) && !empty($_GET['compareid1']) && !empty($_GET['compareid2'])){
	$id1 = $_GET['compareid1'];
	$id2 = $_GET['compareid2'];
	$query1 = "SELECT * FROM tbl_products WHERE id='$id1'";
	$query2 = "SELECT * FROM tbl_products WHERE id='$id2'";
}

$obj = new CompareProducts($module, 0, issetor($token));
$pageContent = $obj->getPageContent($query1,$query2);

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>
