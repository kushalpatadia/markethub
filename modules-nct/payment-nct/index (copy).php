<?php

$reqAuth = false;
$module = 'payment-nct';
require_once "../../includes-nct/config-nct.php";
require_once "../../includes-nct/database-nct.php";

//require_once "class.payment-nct.php";

extract($_REQUEST);

$winTitle = 'Payment';
$headTitle = 'Payment' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle));

$conn=mysqli_connect("localhost","root","","markethub");

$u_id = $_SESSION['userid'];
$address_id = $_POST['hiddenvariable2'];
echo "<script>alert($address_id)</script>";
$query = "SELECT * FROM tbl_products INNER JOIN tbl_cart ON tbl_products.id=tbl_cart.p_id WHERE u_id=$u_id";
$results = mysqli_query($conn,$query); 
if(!empty($results)){
	foreach ($results as $k => $v) {	
		$qty=$v['qty'];
		$p_id = $v['p_id'];
		$title = $v['title'];
		$order_id='p'.rand(1000,9999).$u_id.rand(100,999);
		$purchase_date=date('Y-m-d H:i:s');
		$rip = $_SERVER['REMOTE_ADDR'];
		$res=mysqli_query($conn,"SELECT p_id,qty FROM tbl_cart WHERE u_id='$u_id'");
		while ($row=mysqli_fetch_array($res)) {
			$p_id=$row['p_id'];
			$qty=$row['qty'];	
			$query = "INSERT INTO tbl_order_details (order_id,p_id,u_id,qty) VALUES ('$order_id','$p_id','$u_id','$qty')";
			$results = mysqli_query($conn,$query);
		}
		$update = "UPDATE tbl_order_details SET status='b',purchase_date='$purchase_date',ip='$rip',address_id='$address_id' WHERE u_id='$u_id' AND order_id='$order_id'";
		$results = mysqli_query($conn,$update);
		$delete = "DELETE FROM `tbl_cart` WHERE u_id = '$u_id'";
		$results = mysqli_query($conn,$delete);

		$query = "SELECT * FROM tbl_products INNER JOIN tbl_order_details ON tbl_products.id=tbl_order_details.p_id WHERE u_id=$u_id";
		$results = mysqli_query($conn,$query); 
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$p_id = $v['p_id'];
				$qty_available =$v['qty_available'];
				$qty_purchased = $v['qty'];
				$qty_remaining= $qty_available-$qty_purchased;
				$query = "UPDATE tbl_products SET qty_available='$qty_remaining' WHERE id='$p_id'";
				$results=mysqli_query($conn,$query);
			}
		}
		redirectPage(SITE_MOD.'purchase-nct/');		
	}
}
else
{
	echo "<script>alert('Stock Empty!!!')</script>";
	echo "<script>window.location='../cart-nct/'</script>";
}	


if(isset($_SESSION['username'])) {
	if($check == 0) {
		echo "<script>alert('dont try to hack our web')</script>";
		echo "<script>window.location='../home-nct/'</script>";
	}
	else
	{
		foreach ($results as $v) {
			$qty = $v['qty'];
			if ($qty == 0) {
				echo "<script>alert('dont try to hack our web')</script>";
				echo "<script>window.location='../home-nct/'</script>";
			}
		}
	}
	$obj = new Payment($module, 0, issetor($token));
	$pageContent = $obj->getPageContent();
}
else {
	redirectPage(SITE_URL);
}
require_once DIR_TMPL . "parsing-nct.tpl.php";
?>