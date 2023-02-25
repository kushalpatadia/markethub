<?php
$reqAuth = false;
$module = 'registration-nct';
require_once "../../includes-nct/config-nct.php";
//require_once "class.registration-nct.php";
//require_once(DIR_INC.'hybridauth-master/hybridauth/Hybrid/Auth.php'); 

extract($_REQUEST);

$winTitle = 'Confirmation';

$headTitle = 'Confirmation';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

$rand_code=$_GET['code'];
$passkey=$_GET['pass'];

$rand_code=base64_decode($rand_code);
$passkey=base64_decode($passkey);

$sql1 = "SELECT * FROM register_users WHERE con_key ='$rand_code' AND u_id = '$passkey'";
$result1 = mysqli_query($conn,$sql1);

// If successfully queried 
if($result1){

// Count how many row has this passkey
	$count = mysqli_num_rows($result1);

// if found this passkey in our database, retrieve data from table "temp_members_db"
	if($count==1)
	{
		$sql2 = "UPDATE register_users SET status= 'a' WHERE u_id= '$passkey'";
		$result2=mysqli_query($conn,$sql2);
	}
// if not found passkey, display message "Wrong Confirmation code" 
	else
	{
		echo "Wrong Confirmation code";
	}

// if successfully moved data from table"temp_members_db" to table "registered_members" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
	if($result2){

		echo "Your account has been activated";
		echo "<a href=".SITE_URL.">click here</a> for back to the MarkrtHub.";
	}

}
?>