<?php


$reqAuth = false;
$module = 'managecategory-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.managecategory-nct.php";

$winTitle = 'Manage Category';

$headTitle = 'Manage Category';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

$conn=mysqli_connect("localhost","root","","markethub");
/* GET Value from Admin for Active/Disactive Category*/
if (isset($_GET['catid'])){
    $catid = $_GET['catid'];
    $select = "SELECT status FROM tbl_menubar WHERE id='$catid'";
    $result = mysqli_query($conn,$select);
    $value = mysqli_fetch_array($result);
    if($value['status'] == 'a'){
        $query = "UPDATE tbl_menubar SET status='d' WHERE id='$catid'";
        $exe = mysqli_query($conn,$query);
        echo "msg1";
        break;
    }
    else{
        $query = "UPDATE tbl_menubar SET status='a' WHERE id='$catid'";
        $exe = mysqli_query($conn,$query);
        echo "msg2";
        break;
    }
}
/* End GET Value from Admin for Active/Disactive Category*/

if(isset($_POST['addCategory'])){
    $cat_name = $_POST['category'];
    $link = mysqli_real_escape_string($conn,$_POST['link']);
    $query = "INSERT INTO tbl_menubar(menu,link) VALUES ('$cat_name','$link')";
    mysqli_query($conn,$query);
    // echo $query;
    redirectPage(SITE_ADM_MOD.'managecategory-nct/');
}

if(isset($_POST['updateCategory'])){
    $catid = $_POST['catid'];
    $cat_name = $_POST['category'];
    $link = mysqli_real_escape_string($conn,$_POST['link']);
    $status = $_POST['status'];
    $update = "UPDATE tbl_menubar SET menu='$cat_name',link='$link',status='$status' WHERE id='$catid'";
    echo $update;
    $exe = mysqli_query($conn,$update);
    redirectPage(SITE_ADM_MOD.'managecategory-nct/');
}

if (isset($_SESSION['adminusername'])){
$obj = new ManageCategory($module, 0, issetor($token));

$pageContent = $obj->getPageContent();
}
else{
	redirectPage(SITE_ADMIN_URL);
}

require_once DIR_ADMIN_TMPL . "parsing-nct.tpl.php";
?>