<?php

$reqAuth = false;
$module = 'newpassword-nct';
require_once "../../includes-nct/config-nct.php";
require_once "../../includes-nct/database-nct.php";
require_once "../../includes-nct/phpmailer/class.phpmailer.php";
require_once "class.setnewpassword-nct.php";

$winTitle = 'Set New Password';
$headTitle = 'Set New Password' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle));

	$email=$_GET['passcode'];
	$code=$_GET['code'];
	$email = base64_decode($email);
	$code = base64_decode($code);
if(isset($_GET['code']) && isset($_GET['passcode'])){
}
else{
	redirectpage(SITE_URL);
}

if (isset($_POST['sbtpassword'])) {
	$password = $_POST['password'];
	$password=md5(md5('mh'.$password.'hm'));
	$query = "UPDATE register_users SET password = '$password' ,con_key='Markethub' WHERE email = '$email' AND con_key='$code'";
	$result = mysqli_query($conn,$query);
	if ($result) {
		echo '<script>
			setTimeout(function() {
				swal({
					title: "Password Successfully Updated !",
					type: "success",
					timer: 2000,
					showConfirmButton: false
				}, function() {
					window.location = "../signin-nct/";
				});
			}, 1000);
		</script>';
	}
}
$obj = new SetNewPassword($module, 0, issetor($token));
$pageContent = $obj->getPageContent();

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>