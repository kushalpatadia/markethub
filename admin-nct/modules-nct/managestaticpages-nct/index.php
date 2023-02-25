<?php

$reqAuth = false;
$module = 'managestaticpages-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.managestaticpages-nct.php";

$winTitle = 'Manage Static Pages';
$headTitle = 'Manage Static Pages' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle, "author" => AUTHOR));

/* GET Value from Admin for Active/Disactive Slider Image*/
if (isset($_GET['pid'])){
    $pid = $_GET['pid'];
    $conn=mysqli_connect("localhost","root","","markethub");
    $select = "SELECT status FROM tbl_static_pages WHERE page_id='$pid'";
    $result = mysqli_query($conn,$select);
    $value = mysqli_fetch_array($result);
    if($value['status'] == 'a'){
        $query = "UPDATE tbl_static_pages SET status='d' WHERE page_id='$pid'";
        $exe = mysqli_query($conn,$query);
        echo "msg1";
        break;
    }
    else{
        $query = "UPDATE tbl_static_pages SET status='a' WHERE page_id='$pid'";
        $exe = mysqli_query($conn,$query);
        echo "msg2";
        break;
    }
}
/* End GET Value from Admin for Active/Disactive Slider Image*/

if(isset($_POST['sbtpagedetails'])){
	$header = $_POST['header'];
	$text = $_POST['text'];
	$link = SITE_MOD.'staticpages-nct/?page='.$_POST['link'];
	$status = $_POST['status'];

	$query = mysqli_query($conn,"INSERT INTO `tbl_static_pages`(`page_title`, `page_link`, `page_content`, `status`) VALUES ('$header','$link','$text','$status')");

	// $menu = mysqli_query($conn,"INSERT INTO `tbl_menubar`(`menu`, `link`, `parent_id`, `type`, `status`) VALUES ('$header','$link','0','o','a')");
}

if(isset($_POST['updatepagedetails'])){
	$page_id = $_POST['page_id'];
	$header = $_POST['header'];
	$page_content = $_POST['text'];
	$link = $_POST['link'];
	$status = $_POST['status'];

	$update = "UPDATE `tbl_static_pages` SET page_title='$header',page_content='$page_content',page_link='$link',status='$status' WHERE page_id='$page_id'";
	$exe = mysqli_query($conn,$update);
}

if (isset($_SESSION['adminusername'])){
$obj = new ManageStaticPages($module, 0, issetor($token));
$pageContent = $obj->getPageContent();
}
else{
	redirectPage(SITE_ADMIN_URL);
}
require_once DIR_ADMIN_TMPL . "parsing-nct.tpl.php";
?>