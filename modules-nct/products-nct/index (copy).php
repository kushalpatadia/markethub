<?php
$reqAuth = false;
$module = 'products-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.products-nct.php";


extract($_REQUEST);
$winTitle = 'Products ';

$headTitle = ' Products ';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle/*, "author" => AUTHOR*/));

$select= "SELECT * FROM tbl_products ";

if(isset($_POST['submitrange'])){
	echo "cat".$category = $_POST['category'];
	echo "scat".$subcategory = $_POST['subcategory'];
	echo "start".$start_range = $_POST['minprice'];
	echo "end".$end_range = $_POST['maxprice'];
	echo "sor".$sorting=$_POST['sorting'];
	echo "brand".$brand=$_POST['brand'];
	foreach($_POST['brand'] as $check) {
            echo $check;
    }
	exit;
	if (isset($_POST['category']) && !empty($_POST['category']))
	{	
		$query = $select." WHERE `category` = '$category' AND isActive='y'";
		//echo $query;
		if (isset($_POST['minprice']) && !empty($_POST['minprice']) && isset($_POST['maxprice']) && !empty($_POST['maxprice']))
		{
			$query = $query." AND `price` BETWEEN '$start_range' AND '$end_range'";
			$range = "$start_range"."-"."$end_range";
			$_SESSION['$range'] = $range;
			//echo $query;
		}
		if (isset($_POST['subcategory']) && !empty($_POST['subcategory']))
		{
			$query = $query." AND `subcategory` = '$subcategory'";
			//echo $query;
			if(isset($_POST['mobile']) && !empty($_POST['mobile'])){
    			foreach($_POST['mobile'] as $key=>$value){
        			if($value==1) $output[] = "`brand`='".mysql_escape_string($key)."'";
    			}
    			$criteria = implode(' OR ', $output);
    			$query = $query." AND ".$criteria;
				//echo $query;
			}
		}
		if (isset($_POST['sorting']) && !empty($_POST['sorting'])) {
			$query = $query." ORDER BY price ".$_POST['sorting'];
			//echo $query;
		}
	}
	else if (isset($_POST['minprice']) && !empty($_POST['minprice']) && isset($_POST['maxprice']) && !empty($_POST['maxprice']))
	{
		$query = $select." WHERE `price` BETWEEN '$start_range' AND '$end_range' AND isActive='y'";
		//$range = "$start_range"."-"."$end_range";
		//$_SESSION['$range'] = $range;
		//echo $query;
		if (isset($_POST['subcategory']) && !empty($_POST['subcategory']))
		{
			$query = $query." AND `subcategory` = '$subcategory'";
			//echo $query;
			if(isset($_POST['mobile']) && !empty($_POST['mobile'])){
    			foreach($_POST['mobile'] as $key=>$value){
        			if($value==1) $output[] = "`brand`='".mysql_escape_string($key)."'";
    			}
    			$criteria = implode(' OR ', $output);
    			$query = $query." AND ".$criteria;
				//echo $query;
			}
		}
		if (isset($_POST['sorting']) && !empty($_POST['sorting'])) {
			$query = $query." ORDER BY `price` ".$_POST['sorting'];
			//echo $query;
		}
	}
	else if (isset($_POST['subcategory']) && !empty($_POST['subcategory']))
	{
		$query = $select." WHERE `subcategory` = '$subcategory' AND isActive='y'";
		//echo $query;
		if(isset($_POST['mobile']) && !empty($_POST['mobile'])){
    		foreach($_POST['mobile'] as $key=>$value){
       			if($value==1) $output[] = "`brand`='".mysql_escape_string($key)."'";
    		}
    		$criteria = implode(' OR ', $output);
    		$query = $query." AND ".$criteria;
			//echo $query;
		}
		if (isset($_POST['sorting']) && !empty($_POST['sorting'])) {
			$query = $query." AND ORDER BY price ".$_POST['sorting'];
			//echo $query;
		}
	}
	else
	{
		$query = $select."WHERE isActive='y'";
		//echo $query;
	}
}
else
{
	$query = "SELECT * FROM tbl_products WHERE isActive='y'";
	//echo $query;

	//code for the direct link from home page
	if(isset($_GET['cata'])){
		$category=$_GET['cata'];
		$query=$query." AND category=".$category."AND isActive='y'";
		if(isset($_GET['sub'])){
			$subcategory = $_GET['sub'];
		 	$query=$select." WHERE subcategory=".$subcategory."AND isActive='y'";
		}
	}
	else if(isset($_GET['sub'])){
			$subcategory = $_GET['sub'];
		 	$query=$select." WHERE subcategory=".$subcategory."AND isActive='y'";
		 	if (isset($_GET['search'])) {
			$brand=$_GET['search'];
			$query= $query." AND brand=".$brand."AND isActive='y'";
		}
	}
}

$obj = new Products($module, 0, issetor($token));
$pageContent = $obj->getPageContent($query);
unset($_SESSION['$range']);

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>
