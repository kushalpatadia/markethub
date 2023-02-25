<?php


$reqAuth = false;
$module = 'manageuser-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.manageuser-nct.php";

$winTitle = 'Manage Users';

$headTitle = 'Manage Users';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

/* GET Value from Admin for Active/Disactive User*/
if (isset($_GET['uid'])){
    $uid = $_GET['uid'];
    $conn=mysqli_connect("localhost","root","","markethub");
    $select = "SELECT status FROM register_users WHERE u_id='$uid'";
    $result = mysqli_query($conn,$select);
    $value = mysqli_fetch_array($result);
    if($value['status'] == 'a'){
        $query = "UPDATE register_users SET status='d' WHERE u_id='$uid'";
        $exe = mysqli_query($conn,$query);
        echo "msg1";
        break;
    }
    else{
        $query = "UPDATE register_users SET status='a' WHERE u_id='$uid'";
        $exe = mysqli_query($conn,$query);
        echo "msg2";
        break;
    }
}
/* End GET Value from Admin for Active/Disactive User*/

/*Delete User*/
if (isset($_GET['deleteuser'])) {
    $deleteuser = $_GET['deleteuser'];
    $sql = "DELETE FROM register_users WHERE u_id='$deleteuser'";
    $query= mysqli_query($conn,$sql);
    if ($query==1) {
        echo "User Deleted";
        exit;
    }
}


/* end Delete User*/

/* GET Value from user for update details*/
if(isset($_POST['updateuser'])){
		$userdetails = $_POST['userdetails'];
    	$username = $_POST['username'];
    	$status = $_POST['status'];
		$result= "UPDATE `register_users` SET `username`='$username',`status`='$status' WHERE u_id='$userdetails'";
		$query = mysqli_query($conn,$result);
		echo "<script>alert('Updated')</script>";
		redirectPage(SITE_ADM_MOD.'manageuser-nct/');
}

if (isset($_SESSION['adminusername'])){
$obj = new ManageUser($module, 0, issetor($token));

$pageContent = $obj->getPageContent();
}
else{
	redirectPage(SITE_ADMIN_URL);
}

require_once DIR_ADMIN_TMPL . "parsing-nct.tpl.php";
?>