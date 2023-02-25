<?php
$reqAuth = false;
$module = 'products-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.products-nct.php";


extract($_REQUEST);
$winTitle = 'Products ';

$headTitle = ' Products ';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle/*, "author" => AUTHOR*/));

$select= "SELECT * FROM tbl_products";

	$id = $_GET['id'];
	$checked = $_POST['checked'];
	$category = $_GET['category'];
	$subcategory = $_GET['subcategory'];
	$start_range = $_GET['minprice'];
	$end_range = $_GET['maxprice'];
	$sorting=$_GET['sorting'];

	echo "<script>alert('in submitrange')</script>";
	if (isset($_GET['category']) && !empty($_GET['category']))
	{	
		$query = $select." WHERE `category` = '$category'";
		//echo $query;
		echo "<script>alert('in category')</script>";
		if (isset($_GET['minprice']) && !empty($_GET['minprice']) && isset($_GET['maxprice']) && !empty($_GET['maxprice']))
		{
			$query = $query." AND `price` BETWEEN '$start_range' AND '$end_range'";
			$range = "$start_range"."-"."$end_range";
			$_SESSION['$range'] = $range;
			//echo $query;
		}
		if (isset($_GET['subcategory']) && !empty($_GET['subcategory']))
		{
			$query = $query." AND `subcategory` = '$subcategory'";
			//echo $query;
			if(isset($_GET['mobile']) && !empty($_GET['mobile'])){
    			foreach($_GET['mobile'] as $key=>$value){
        			if($value==1) $output[] = "`brand`='".mysql_escape_string($key)."'";
    			}
    			$criteria = implode(' OR ', $output);
    			$query = $query." AND ".$criteria;
				//echo $query;
			}
		}
		if (isset($_GET['sorting']) && !empty($_GET['sorting'])) {
			$query = $query." ORDER BY price ".$_GET['sorting'];
			//echo $query;
		}
	}
	else if (isset($_GET['minprice']) && !empty($_GET['minprice']) && isset($_GET['maxprice']) && !empty($_GET['maxprice']))
	{
		$query = $select." WHERE `price` BETWEEN '$start_range' AND '$end_range'";
		$range = "$start_range"."-"."$end_range";
		$_SESSION['$range'] = $range;
		//echo $query;
		if (isset($_GET['subcategory']) && !empty($_GET['subcategory']))
		{
			$query = $query." AND `subcategory` = '$subcategory'";
			//echo $query;
			if(isset($_GET['mobile']) && !empty($_GET['mobile'])){
    			foreach($_GET['mobile'] as $key=>$value){
        			if($value==1) $output[] = "`brand`='".mysql_escape_string($key)."'";
    			}
    			$criteria = implode(' OR ', $output);
    			$query = $query." AND ".$criteria;
				//echo $query;
			}
		}
		if (isset($_GET['sorting']) && !empty($_GET['sorting'])) {
			$query = $query." ORDER BY `price` ".$_GET['sorting'];
			//echo $query;
		}
	}
	else if (isset($_GET['subcategory']) && !empty($_GET['subcategory']))
	{
		$query = $select." WHERE `subcategory` = '$subcategory'";
		//echo $query;
		if(isset($_GET['mobile']) && !empty($_GET['mobile'])){
    		foreach($_GET['mobile'] as $key=>$value){
       			if($value==1) $output[] = "`brand`='".mysql_escape_string($key)."'";
    		}
    		$criteria = implode(' OR ', $output);
    		$query = $query." AND ".$criteria;
			//echo $query;
		}
		if (isset($_GET['sorting']) && !empty($_GET['sorting'])) {
			$query = $query." AND ORDER BY price ".$_GET['sorting'];
			//echo $query;
		}
	}
	else
	{
		$query = $select;
		//echo $query;
	}

// else
// {
// 	$query = "SELECT * FROM tbl_products";
// 	//echo $query;

// 	//code for the direct link from home page
// 	if (isset($_GET['sub'])) {
// 		$subcategory = $_GET['sub'];
// 		$query=$select." WHERE subcategory=".$subcategory;
// 		//echo $query;
// 		if (isset($_GET['search'])) {
// 			$brand=$_GET['search'];
// 			$query= $query." AND brand=".$brand;
// 			//echo $query;
// 		}
// 		if (isset($_GET['cata'])) {
// 			$category=$_GET['cata'];
// 			$query=$query." AND category=".$category;
// 			//echo $query;
// 		}
// 	}
// }



$obj = new Products($module, 0, issetor($token));

$pageContent = $obj->getProducts($query);

unset($_SESSION['$range']);

require_once DIR_TMPL . "parsing1-nct.tpl.php";
?>
