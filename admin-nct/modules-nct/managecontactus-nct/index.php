<?php


$reqAuth = false;
$module = 'managecontactus-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.managecontactus-nct.php";
// require_once "../../../includes-nct/phpmailer/class.phpmailer.php";

$winTitle = 'Manage Contactus';

$headTitle = 'Manage Contactus';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

if(isset($_POST['submitmessage'])){
	$replymessage = $_POST['replymessage'];
	$replymessage = mysqli_real_escape_string($conn,$replymessage);
	$userdetails = $_POST['userdetails'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$subject = $_POST['subject'];
	$conn=mysqli_connect("localhost","root","","markethub");
	$query = "UPDATE tbl_contact_us SET replyMessage='$replymessage' WHERE id='$userdetails'";
	// echo $query;
	$exe = mysqli_query($conn,$query);

	$message = '<html><head><title>Email Verification</title></head><body>';
	$message .= '<h1>Hello ' . $username . '!</h1>';
	$message .= '<h3>Subject:' .$subject.'</h3>';
	$message .= '<p>Reply Message:<br>' .$replymessage.'</p>';
	$message .= '</body></html>';

	$subject = "MarketHub";
	sendEmailAddress($email,$subject,$message);

	echo "<script>window.onload = function() {
		toastrAlert('success','Email Sent Successfully')
	 }</script>";	
}

if (isset($_SESSION['adminusername'])){
$obj = new ManageContactUs($module, 0, issetor($token));

$pageContent = $obj->getPageContent();
}
else{
	redirectPage(SITE_ADMIN_URL);
}

require_once DIR_ADMIN_TMPL . "parsing-nct.tpl.php";
?>