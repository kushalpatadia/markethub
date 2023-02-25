<?php

$reqAuth = false;
$module = 'deletecart-nct';
require_once "../../includes-nct/config-nct.php";
require_once "../../includes-nct/database-nct.php";

//require_once "class.cart-nct.php";

extract($_REQUEST);

$winTitle = 'Delete Cart';
$headTitle = 'Delete Cart' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle));

$u_id = $_SESSION['userid'];
if (isset($_GET['cartid'])) {
	$p_id = $_GET['cartid'];
	$p_id = base64_decode($p_id);

		$sql = "DELETE FROM tbl_cart WHERE p_id='$p_id' AND u_id='$u_id'";
		mysqli_query($conn, $sql);
		echo "Product Remove From Your Cart";
	//redirectPage(SITE_MOD.'cart-nct/');
}
if (isset($_GET['wishlistid']))
{
	$p_id = $_GET['wishlistid'];
	$p_id = base64_decode($p_id);

		$sql = "DELETE FROM tbl_wishlist WHERE p_id='$p_id' AND u_id='$u_id'";
		mysqli_query($conn, $sql);
		echo "Product Remove From Your Wishlist";
	//redirectPage(SITE_MOD.'wishlist-nct/');
}
?>
