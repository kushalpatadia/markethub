<?php

$reqAuth = false;
$module = 'cart-nct';
require_once "../../includes-nct/config-nct.php";
require_once "../../includes-nct/database-nct.php";

require_once "class.cart-nct.php";

extract($_REQUEST);

$winTitle = 'Cart';
$headTitle = 'Cart' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle));

$obj = new Cart($module, 0, issetor($token));
if (isset($_POST['sbtorder'])) {
	$u_id = $_SESSION['userid'];
	$query = "SELECT * FROM tbl_products INNER JOIN tbl_cart ON tbl_products.id=tbl_cart.p_id WHERE u_id=$u_id";
	$results = mysqli_query($conn,$query); 
	if(!empty($results)){
		foreach ($results as $k => $v) {	
			$qty=$_POST[$v['p_id']];
			$p_id = $v['p_id'];
			$qty_available =$v['qty_available'];
			$status = $v['isActive'];
			$title = $v['title'];
			if($qty_available >= $qty && $status == 'y'){
				$query = "UPDATE tbl_cart SET qty='$qty' WHERE u_id='$u_id' AND p_id='$p_id'";
				$results=mysqli_query($conn,$query);
			}
			else 
			{	
				if ($qty_available > 0 && $status == 'y')
				{
					// echo "<script>alert('only $qty_available Products are avilable for $title')</script>";
					echo "<script>window.onload = function() {
    					toastrAlert('info','only $qty_available Products are avilable for $title')
					}</script>";
					echo "<script>window.location=''</script>";
				}
				else
				{
					// echo "<script>alert('$title not avilable')</script>";
					// echo "<script>alert('so please remove $title from your cart for countinue shopping')</script>";
					echo "<script>window.onload = function() {
    					toastrAlert('error','$title not avilable')
					}</script>";
					echo "<script>window.onload = function() {
    					toastrAlert('info','so please remove $title from your cart for countinue shopping')
					}</script>";
					echo "<script>window.location=''</script>";
				}
			}
		}
	}
	echo "<script>window.location='../checkout-nct/'</script>";
}

$pageContent = $obj->getPageContent();

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>