<?php


$reqAuth = false;
$module = 'managebrand-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.managebrand-nct.php";

$winTitle = 'Manage Brand';

$headTitle = 'Manage Brand';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

/* GET Value from Admin for Active/Disactive Brand*/
if (isset($_GET['brandid'])){
    $brandid = $_GET['brandid'];
    $conn=mysqli_connect("localhost","root","","markethub");
    $select = "SELECT status FROM tbl_menubar WHERE id='$brandid'";
    $result = mysqli_query($conn,$select);
    $value = mysqli_fetch_array($result);
    if($value['status'] == 'a'){
        $query = "UPDATE tbl_menubar SET status='d' WHERE id='$brandid'";
        $exe = mysqli_query($conn,$query);
        echo "msg1";
        break;
    }
    else{
        $query = "UPDATE tbl_menubar SET status='a' WHERE id='$brandid'";
        $exe = mysqli_query($conn,$query);
        echo "msg2";
        break;
    }
}
/* End GET Value from Admin for Active/Disactive Brand*/

if(isset($_POST['addbrand'])){
    $brand_name = $_POST['brand'];
    $subcat_id = $_POST['subcategory'];
    $link = mysqli_real_escape_string($conn,$_POST['link']);
    $query = "INSERT INTO tbl_menubar(parent_id,menu,type,link) VALUES ('$subcat_id','$brand_name','b','$link')";
    // echo $query;
    mysqli_query($conn,$query);
    redirectPage(SITE_ADM_MOD.'managebrand-nct/');
}

if(isset($_POST['updatebrand'])){
    $brand_name = $_POST['brand'];
    $subcat_id = $_POST['subcategory'];
    $link = mysqli_real_escape_string($conn,$_POST['link']);
    $brandid = $_POST['brandid'];
    $status = $_POST['status'];
    $update = "UPDATE tbl_menubar SET parent_id='$subcat_id',menu='$brand_name',link='$link',status='$status' WHERE id='$brandid'";
    // echo $update;
    // exit();
    $exe = mysqli_query($conn,$update);
    redirectPage(SITE_ADM_MOD.'managebrand-nct/');
}


if (isset($_SESSION['adminusername'])){
$obj = new ManageSubcategory($module, 0, issetor($token));

$pageContent = $obj->getPageContent();
}
else{
	redirectPage(SITE_ADMIN_URL);
}

require_once DIR_ADMIN_TMPL . "parsing-nct.tpl.php";
?>