<?php

$reqAuth = false;
$module = 'forgotpassword-nct';
require_once "../../includes-nct/config-nct.php";
require_once "../../includes-nct/database-nct.php";
require_once "class.forgotpassword-nct.php";

$winTitle = 'ForgotPassword';
$headTitle = 'ForgotPassword' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle));

$obj = new ForgotPassword($module, 0, issetor($token));

if (isset($_POST['submit'])) {

	$email = $_POST['email'];

	$query = "SELECT * FROM register_users WHERE email='$email'";
	$result = mysqli_query($conn,$query);
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		$ID = rand();
		$insert ="UPDATE `register_users` SET `con_key` = '$ID' WHERE `email`='$email'";
		$update = mysqli_query($conn,$insert);

		$message = '<html><head><title>Email Verification</title></head><body>';
		$message .= '<h1>Hi ' . $name . '!</h1>';
		$message .= '<p><a href="'.SITE_MOD.'newpassword-nct/?code='.base64_encode($ID).'&passcode='.base64_encode($email).'">CLICK TO RESET YOUR PASSWORD</a>';
		$message .= "</body></html>";

		$subject = trim("ForgotPassword - MarketHub");
		sendEmailAddress($email, $subject, $message);

		echo "<script>window.onload = function() {
    					toastrAlert('success','Email Sent Successfully')
			 }</script>";		
}
else
{
	echo '<script>
	setTimeout(function() {
		swal({
			title: "Wrong Email !",
			type: "error",
			timer: 1500,
			showConfirmButton: false
		});
	}, 1000);
</script>';
}

}

$pageContent = $obj->getPageContent();

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>