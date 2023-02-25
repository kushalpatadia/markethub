<?php

$reqAuth = false;
$module = 'addwishlist-nct';
require_once "../../includes-nct/config-nct.php";
require_once "../../includes-nct/database-nct.php";

//require_once "class.addcart-nct.php";
$winTitle = 'AddWishlist';
$headTitle = 'AddWishlist';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle));

if (isset($_SESSION['login_user'])) {
	extract($_REQUEST);
	$id=$_GET['id'];
	//$module=$_GET['module'].'/';
	$p_id=base64_decode($id);
	$u_id=$_SESSION['userid'];
	$check=mysqli_query($conn,"SELECT p_id FROM tbl_wishlist WHERE p_id='$p_id' AND u_id='$u_id'");
	$rows=mysqli_num_rows($check);
	if ($rows==1) {
		// echo "Already added to Wishlist";
		echo "msg1";
	}
	else
	{
		if (!empty($p_id)) {
			$query= "INSERT INTO tbl_wishlist VALUES ('','$p_id','$u_id')";
			$rel = mysqli_query($conn,$query);
			// echo "Product Added To Wishlist";
			echo "msg2";
		}
	}
}
else
{
	// echo "For Add to Wishlist You Must Require Login";
	echo "msg3";
}

?>