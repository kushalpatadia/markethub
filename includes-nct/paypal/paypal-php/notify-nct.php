<?php
require_once("../../includes-nct/config-nct.php");

parse_str($_POST['custom'],$_MYVAR);

$orderid = $_MYVAR['order_id'];
$u_id = $_MYVAR['u_id'];
$purchase_date = date("Y-m-d H:i:s");
$rip = $_SERVER['REMOTE_ADDR'];
$conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");

$payment_detail = json_encode($_REQUEST);
$price = $_REQUEST['payment_gross'];
$country = $_REQUEST['address_country'];
$city = $_REQUEST['address_city'];
$payeremail = $_REQUEST['payer_email'];
$firstname = $_REQUEST['first_name'];
$payerid = $_REQUEST['payer_id'];
$payerstatus = $_REQUEST['payer_status'];

if((isset($_REQUEST['txn_type']) && $_REQUEST['txn_type']=="cart") && (strtolower($_REQUEST['payment_status'])=="completed")){	

	$update = "UPDATE `tbl_order_details` SET `status`='b',`purchase_date`='$purchase_date',`ip`='$rip',`alldetails`='$payment_detail' WHERE order_id='$orderid'";
	$result = mysqli_query($conn,$update);
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
			$purchaseditem_value = $purchaseditem_value + $qty_purchased;
			$qty_remaining= $qty_available-$qty_purchased;
			$query = "UPDATE tbl_products SET qty_available='$qty_remaining',purchased='$purchaseditem_value' WHERE id='$p_id'";
			$results=mysqli_query($conn,$query);
		}
	}
}
?>
