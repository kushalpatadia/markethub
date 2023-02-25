<?php


$reqAuth = false;
$module = 'managesubcategory-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.managesubcategory-nct.php";

$winTitle = 'Manage Subcategory';

$headTitle = 'Manage Subcategory';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

/* GET Value from Admin for Active/Disactive Category*/
if (isset($_GET['subcatid'])){
    $subcatid = $_GET['subcatid'];
    $conn=mysqli_connect("localhost","root","","markethub");
    $select = "SELECT status FROM tbl_menubar WHERE id='$subcatid'";
    $result = mysqli_query($conn,$select);
    $value = mysqli_fetch_array($result);
    if($value['status'] == 'a'){
        $query = "UPDATE tbl_menubar SET status='d' WHERE id='$subcatid'";
        $exe = mysqli_query($conn,$query);
        echo "msg1";
        break;
    }
    else{
        $query = "UPDATE tbl_menubar SET status='a' WHERE id='$subcatid'";
        $exe = mysqli_query($conn,$query);
        echo "msg2";
        break;
    }
}
/* End GET Value from Admin for Active/Disactive Category*/

if(isset($_POST['addSubcategory'])){
    $subcat_name = $_POST['subcategory'];
    $cat_id = $_POST['category'];
    $link = mysqli_real_escape_string($conn,$_POST['link']);
    $query = "INSERT INTO tbl_menubar(parent_id,menu,type,link) VALUES ('$cat_id','$subcat_name','s','$link')";
    mysqli_query($conn,$query);
    redirectPage(SITE_ADM_MOD.'managesubcategory-nct/');
}

if(isset($_POST['updateSubcategory'])){
    $subcatid = $_POST['subcatid'];
    $cat_id = $_POST['category'];
    $subcat_name = $_POST['subcategory'];
    $link = mysqli_real_escape_string($conn,$_POST['link']);
    $status = $_POST['status'];
    $update = "UPDATE tbl_menubar SET parent_id='$cat_id',menu='$subcat_name',link='$link',status='$status' WHERE id='$subcatid'";
    echo $update;
    $exe = mysqli_query($conn,$update);
    redirectPage(SITE_ADM_MOD.'managesubcategory-nct/');
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