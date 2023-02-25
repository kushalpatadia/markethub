<?php
require_once "../../includes-nct/config-nct.php";
// require_once "class.checkout-nct.php";
$module = 'checkout-nct';
require_once "../../includes-nct/database-nct.php";

$conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
$u_id = $_SESSION['userid'];
$addressid = $_REQUEST['add'];
$addressid = base64_decode($addressid);
$order_id='p'.rand(1000,9999).$u_id.rand(100,999);
$purchase_date=date('Y-m-d H:i:s');
$rip = $_SERVER['REMOTE_ADDR'];
$res=mysqli_query($conn,"SELECT p_id,qty FROM tbl_cart WHERE u_id='$u_id'");
while ($row=mysqli_fetch_array($res)) {
	$p_id=$row['p_id'];
	$query = "SELECT price FROM tbl_products WHERE id = '$p_id'";
	$exe = mysqli_query($conn,$query);
	$exe = mysqli_fetch_array($exe);
	$price=$exe['price'];
	$qty=$row['qty'];
	$query = "INSERT INTO tbl_order_details (address_id, order_id,p_id,u_id ,qty ,price ,status ,purchase_date ,ip ) VALUES ('$addressid', '$order_id','$p_id','$u_id','$qty' ,'$price' ,'p' ,'$purchase_date' ,'$rip')";
	$results = mysqli_query($conn,$query);
	$last_id = mysqli_insert_id($conn);
}
if (isset($_REQUEST['add']) && !empty($order_id) && isset($_SESSION['userid']) && !empty($last_id)) {
	$select_order = "SELECT * FROM tbl_order_details AS p_h JOIN tbl_shipping_details as ship ON p_h.address_id=ship.id WHERE order_id='$order_id'";
	$result = mysqli_query($conn,$select_order);
	foreach ($result as $k => $v) {
		$name = $v['username'];
		$email = $v['email'];
		$addressline1 = $v['addressline1'];
		$addressline2 = $v['addressline2'];
		$area = $v['area'];
		$city = $v['city'];
		$state = $v['state'];
		$country = $v['country'];
		$pincode = $v['pincode'];
	}
}

?>









<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="frm_paypal" id="frm_paypal">
	<input type="hidden" name="business" value="kushalpatadia-facilitator@gmail.com">
	<input type="hidden" name="cmd" value="_cart">

	<input type="hidden" name="upload" value="1">
	<input type="hidden" name="currency_code" value="USD">

<?php
		$results = mysqli_query($conn,"SELECT * FROM tbl_products INNER JOIN tbl_cart ON 
							tbl_products.id=tbl_cart.p_id WHERE u_id=$u_id");
		$count = 1;
		foreach ($results as $k => $v) {
		$con_price = (int)($v['price'])/60;
		echo "<input type='hidden' name='item_name_".$count."' value='".$v['title']."'>";
		echo "<input type='hidden' name='amount_".$count."' id='amount".$count."' value='".$con_price."'>";
		echo "<input type='hidden' name='quantity_".$count."' value='".$v['qty']."'>";
	
		$count += 1;
		} 

?>

	<!-- Enable override of buyers's address stored with PayPal . -->
	<input type="hidden" name="address_override" value="1">
	<!-- Set variables that override the address stored with PayPal. -->
	<input type="hidden" name="first_name" value="<?php echo $name?>">
	<!-- <input type="hidden" name="last_name" value="Parmar"> -->
	<input type="hidden" name="address1" value="<?php echo $addressline1?>">
	<input type="hidden" name="address2" value="<?php echo $addressline2;?>">
	<input type="hidden" name="city" value="<?php echo $city;?>">
	<input type="hidden" name="state" value="<?php echo $state;?>">
	<input type="hidden" name="zip" value="<?php echo $pincode;?>">
	<input type="hidden" name="country" value="IN">
	<input type='hidden' name='notify_url' value='<?php echo SITE_URL; ?>modules-nct/checkout-nct/notify-nct.php'>
	<input type='hidden' name='cancel_return' value='<?php echo SITE_URL; ?>modules-nct/checkout-nct/'>
	<input type='hidden' name='custom' value='order_id=<?php echo $order_id; ?>&u_id=<?php echo $u_id; ?>' />
	<input type="hidden" name="return" value="<?php echo SITE_URL?>">


</form>



<script type="text/javascript">
	// document.frm_paypal.submit();
window.onload = function(){
document.forms['frm_paypal'].submit();

}
</script>