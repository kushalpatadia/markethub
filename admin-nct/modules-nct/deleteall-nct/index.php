<?php

$reqAuth = false;
$module = 'deleteproduct-nct';
require_once "../../../includes-nct/config-nct.php";

$winTitle = 'Delete Product';

$headTitle = 'Delete Product';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

if(isset($_GET['deleteproduct'])){
	$deleteproduct = $_GET['deleteproduct'];
    /*delete query*/
    $select = mysqli_query($conn,"SELECT imageName,image2,image3 FROM tbl_products WHERE id='$deleteproduct'");
    $fetch = mysqli_fetch_assoc($select);
    $imageName = $fetch['imageName'];
    $th11 = 'th1_'.$fetch['imageName'];
    $th12 = 'th2_'.$fetch['imageName'];
    $th13 = 'th3_'.$fetch['imageName'];
    $image2 = $fetch['image2'];
    $th21 = 'th1_'.$fetch['image2'];
    $th22 = 'th2_'.$fetch['image2'];
    $th23 = 'th3_'.$fetch['image2'];
    $image3 = $fetch['image3'];
    $th31 = 'th1_'.$fetch['image3'];
    $th32 = 'th2_'.$fetch['image3'];
    $th33 = 'th3_'.$fetch['image3'];
    
    $delete_img = DIR_IMG."Products/".$imageName;
    $delete_th1 = DIR_IMG."Products/".$th11;
    $delete_th2 = DIR_IMG."Products/".$th12;
    $delete_th3 = DIR_IMG."Products/".$th13;
    unlink($delete_img);
    unlink($delete_th1);
    unlink($delete_th2);
    unlink($delete_th3);

    if($image2 != "noimage.jpeg"){
        $delete_img2 = DIR_IMG."Products/".$image2;
        $delete_th1 = DIR_IMG."Products/".$th21;
        $delete_th2 = DIR_IMG."Products/".$th22;
        $delete_th3 = DIR_IMG."Products/".$th23;
        unlink($delete_img2);
        unlink($delete_th1);
        unlink($delete_th2);
        unlink($delete_th3);
    }
    if($image3 != "noimage.jpeg"){
        $delete_img3 = DIR_IMG."Products/".$image3;
        $delete_th1 = DIR_IMG."Products/".$th31;
        $delete_th2 = DIR_IMG."Products/".$th32;
        $delete_th3 = DIR_IMG."Products/".$th33;
        unlink($delete_img3);
        unlink($delete_th1);
        unlink($delete_th2);
        unlink($delete_th3);
    }
    $sql = "DELETE FROM tbl_products WHERE id='$deleteproduct'";
    $query= mysqli_query($conn,$sql);
    if ($query==1) {
        echo "<script>alert('Product Deleted')</script>";
        redirectPage(SITE_ADM_MOD.'manageproduct-nct/');
    }
}
if(isset($_GET['deleteuser'])){
    $deleteuser = $_GET['deleteuser'];
    /*delete query*/
    
    $sql = "DELETE FROM register_users WHERE u_id='$deleteuser'";
    $query= mysqli_query($conn,$sql);
    if ($query==1) {
        echo "<script>alert('User Deleted')</script>";
        redirectPage(SITE_ADM_MOD.'manageuser-nct/');
    }
}
if(isset($_GET['deleteimage'])){
    $deleteimage = $_GET['deleteimage'];
    /*delete query*/
    
    $sql = "DELETE FROM tbl_slider WHERE id='$deleteimage'";
    $query= mysqli_query($conn,$sql);
    if ($query==1) {
        echo "<script>alert('Image Deleted')</script>";
        redirectPage(SITE_ADM_MOD.'manageslider-nct/');
    }
}
if(isset($_GET['deletemessage'])){
    $deletemessage = $_GET['deletemessage'];
    /*delete message*/
    
    $sql = "DELETE FROM tbl_contact_us WHERE id='$deletemessage'";
    $query= mysqli_query($conn,$sql);
    if ($query==1) {
        echo "<script>alert('Message Deleted')</script>";
        redirectPage(SITE_ADM_MOD.'managecontactus-nct/');
    }
}
if(isset($_GET['deletecategory'])){
    $deletecategory = $_GET['deletecategory'];
    /*delete category*/
    
    $sql = "DELETE FROM tbl_menubar WHERE id='$deletecategory'";
    $query= mysqli_query($conn,$sql);
    if ($query==1) {
        echo "<script>alert('Category Deleted')</script>";
        redirectPage(SITE_ADM_MOD.'managecategory-nct/');
    }
}
if(isset($_GET['deletesubcategory'])){
    $deletesubcategory = $_GET['deletesubcategory'];
    /*delete subcategory*/
    
    $sql = "DELETE FROM tbl_menubar WHERE id='$deletesubcategory'";
    $query= mysqli_query($conn,$sql);
    if ($query==1) {
        echo "<script>alert('Subcategory Deleted')</script>";
        redirectPage(SITE_ADM_MOD.'managesubcategory-nct/');
    }
}
if(isset($_GET['deletebrand'])){
    $deletebrand = $_GET['deletebrand'];
    /*delete brand*/
    
    $sql = "DELETE FROM tbl_menubar WHERE id='$deletebrand'";
    $query= mysqli_query($conn,$sql);
    if ($query==1) {
        echo "<script>alert('Brand Deleted')</script>";
        redirectPage(SITE_ADM_MOD.'managebrand-nct/');
    }
}
if(isset($_GET['deletepage'])){
    $deletepage = $_GET['deletepage'];
    /* delete page */
    $sql = "DELETE FROM tbl_static_pages WHERE page_id='$deletepage'";
    $query= mysqli_query($conn,$sql);
    if ($query==1) {
        echo "<script>alert('Page Deleted')</script>";
        redirectPage(SITE_ADM_MOD.'managestaticpages-nct/');
    }
}
?>