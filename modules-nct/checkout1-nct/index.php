<?php

$reqAuth = false;
$module = 'checkout-nct';
require_once "../../includes-nct/config-nct.php";
require_once "../../includes-nct/database-nct.php";

require_once "class.checkout-nct.php";

extract($_REQUEST);

$winTitle = 'Checkout';
$headTitle = 'Checkout' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle));

$u_id = $_SESSION['userid'];

if(isset($_REQUEST['deleteid'])) {
	$deleteid = $_REQUEST['deleteid'];
	$query = mysqli_query($conn,"DELETE FROM tbl_shipping_details WHERE id='$deleteid'");
	echo "msg";
	break;
}

if(isset($_POST['sbtdetails']))
{
	$name = $_POST["name"];
	$email = $_POST["email"];
	$addline1 = $_POST["addline1"];
	$addline2 = $_POST["addline2"];
	$area =	$_POST["area"];
	$city = $_POST["city"];
	$pincode = $_POST["pincode"];
	$state = $_POST["state"];
	$country = $_POST["country"];
	$mob = $_POST["phone_no"];

	$result = "INSERT INTO tbl_shipping_details VALUES ('','$u_id','$name','$email','$addline1','$addline2','$area','$city','$pincode','$state','$country','$mob')";
	mysqli_query($conn,$result);
	echo "<script>window.onload = function() {
    					toastrAlert('success','Inserted Successfully')
		  }</script>";
}

if(isset($_POST['bycash']))
{
	$query = "SELECT * FROM tbl_products INNER JOIN tbl_cart ON tbl_products.id=tbl_cart.p_id WHERE u_id=$u_id";
	$results = mysqli_query($conn,$query); 
	if(!empty($results)){
		foreach ($results as $k => $v) {	
			$qty=$v['qty'];
			$p_id = $v['p_id'];
			$qty_available =$v['qty_available'];
			$title = $v['title'];
			if($qty_available >= $qty){
				$status = "go";
			}
			else 
			{	
				if ($qty_available > 0)
				{
					echo "<script>window.onload = function() {
    					toastrAlert('info','only $qty_available Products are avilable for $title')
		  			}</script>";
				}
				else
				{
					echo "<script>window.onload = function() {
    					toastrAlert('info','$title not avilable')
		  			}</script>";
					echo "<script>window.onload = function() {
    					toastrAlert('info','so please remove $title from your cart for countinue shopping')
		  			}</script>";
				}
				$status = "stop";
			}
		}
	}

	if ($status == "go") {
		$address_id = $_POST['hiddenvariable'];
		if (empty($address_id)) {
			// echo "<script>alert('Address is not selected')</script>";
			echo "<script>window.onload = function() {
    					toastrAlert('error','Address is not selected')
					}</script>";
			// echo "<script>window.location=''</script>";
		}
		else
		{
			$order_id=rand(1000,9999).$u_id.rand(100,999);
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
					$purchaseditem_value = $v['purchased'];
					$qty_available =$v['qty_available'];
					$qty_purchased = $v['qty'];
					$purchaseditem_value = $purchaseditem_value + $qty_available;
					$qty_remaining= $qty_available-$qty_purchased;
					$query = "UPDATE tbl_products SET qty_available='$qty_remaining', purchased='$purchaseditem_value' WHERE id='$p_id'";
					echo $query;
					$results=mysqli_query($conn,$query);
				}
			}
			redirectPage(SITE_MOD.'purchase-nct/');		
		}
	}
	else
	{
		echo "<script>window.onload = function() {
		toastrAlert('info','Stock Empty!!!')
		}</script>";
		// echo "<script>window.location='../cart-nct/'</script>";
	}	
}

if(isset($_POST['editaddress']) && !empty($_POST['editaddress']))
{	
	$id = $_POST['my_id'];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$addline1 = $_POST["addline1"];
	$addline2 = $_POST["addline2"];
	$area = $_POST["area"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$country = $_POST["country"];
	$pincode = $_POST["pincode"];
	$mob = $_POST["phone_no"];

	$result = "UPDATE `tbl_shipping_details` SET `username`='$name',`addressline1`='$addline1',`addressline2`='$addline2',
	`area`='$area',`city`='$city',`state`='$state',`country`='$country',`pincode`='$pincode',`mobilenumber`='$mob' WHERE id='$id'";

	mysqli_query($conn,$result);
	echo "<script>window.onload = function() {
		toastrAlert('success','Address Updated Successfully')
		}</script>";
	//redirectPage(SITE_MOD."checkout-nct/");
}


$results = mysqli_query($conn,"SELECT * FROM tbl_products INNER JOIN tbl_cart ON tbl_products.id=tbl_cart.p_id WHERE u_id=$u_id");
$check = mysqli_num_rows($results);

if(isset($_SESSION['username'])) {
	if($check == 0) {
		echo "<script>alert('dont try to hack our web')</script>";
		echo "<script>window.location='../cart-nct/'</script>";
	}
	else
	{
		foreach ($results as $v) {
			$qty = $v['qty'];
			if ($qty == 0) {
				echo "<script>alert('dont try to hack our web')</script>";
				echo "<script>window.location='../cart-nct/'</script>";
			}
		}
	}
	$obj = new Checkout($module, 0, issetor($token));
	$pageContent = $obj->getPageContent();
}
else {
	redirectPage(SITE_URL);
}
require_once DIR_TMPL . "parsing-nct.tpl.php";
?>	