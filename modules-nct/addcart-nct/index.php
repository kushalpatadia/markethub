<?php

$reqAuth = false;
$module = 'addcart-nct';
require_once "../../includes-nct/config-nct.php";
require_once "../../includes-nct/database-nct.php";

//require_once "class.addcart-nct.php";
$winTitle = 'AddCart';
$headTitle = 'AddCart';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle));

if (isset($_SESSION['login_user'])) {
	extract($_REQUEST);
	$id=$_GET['id'];
	$p_id=base64_decode($id);
	$u_id=$_SESSION['userid'];
	$check=mysqli_query($conn,"SELECT p_id FROM tbl_cart WHERE p_id='$p_id' AND u_id='$u_id'");
	$rows=mysqli_num_rows($check);
	if ($rows==1) {
		// echo "Already added to cart";
		echo "msg1";
	}
	else
	{
	$checkquery=mysqli_query($conn,"SELECT qty_available FROM tbl_products WHERE id='$p_id' AND isActive='y'");
	$check_qty = mysqli_fetch_assoc($checkquery);
	$qty = $check_qty["qty_available"];
		if($qty == 0){
			// echo "product is not available";
			echo "msg2";

		}
		else{
			if (!empty($p_id)) {
				$query= "INSERT INTO tbl_cart VALUES ('','$p_id','$u_id','1')";
				$rel = mysqli_query($conn,$query);
				// echo "Product Added To Cart";
				echo "msg3";
			}
		}
	}
}
else
{
	// echo "For Add to Cart You Must Require Login";
	echo "msg4";
}

?>