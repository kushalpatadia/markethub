<?php
require_once("../../../includes-nct/config-nct.php");

$select = mysqli_query($conn,"SELECT * FROM tbl_seller_payment ORDER BY sp_id DESC LIMIT 1");

foreach ($select as $k => $v) {
	$id = $v['sp_id'];
	$orderid_details = $v['orderid_details'];
}
$date =  date('Y-m-d H:i:s');
$update = mysqli_query($conn,"UPDATE tbl_seller_payment SET status='c',last_payment='$date' WHERE sp_id='$id'");

$jsonIterator = new RecursiveIteratorIterator(
					new RecursiveArrayIterator(json_decode($orderid_details, TRUE)),
					RecursiveIteratorIterator::SELF_FIRST);
foreach ($jsonIterator as $key => $val) {
	if(is_array($val)) {	
		echo $val;
		echo $key."<br>";
	}
	else
	{
		echo $val."<br>";
		$updatepayment = mysqli_query($conn,"UPDATE tbl_order_details SET status='sent' WHERE id='$val'");
	}
}
// exit();

redirectPage(SITE_ADM_MOD.'payseller-nct/');

?>
