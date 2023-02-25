<?php


$reqAuth = false;
$module = 'updateproduct-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.updateproduct-nct.php";

$winTitle = 'Update Product';

$headTitle = 'Update Product';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

if (isset($_GET['name']) && !empty($_GET['name']) && isset($_SESSION['pic']) && !empty($_SESSION['pic'])) {
$selectquery=$_GET['name'];
$productdetails=$_GET['id'];
$imagename = $_SESSION['pic'];

$conn=mysqli_connect("localhost","root","","markethub");

$select = mysqli_query($conn,"SELECT imageName,image2,image3 FROM tbl_products WHERE id='$productdetails'");
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

// $conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
if ($selectquery == '1') {
     $delete_img1 = DIR_IMG."Products/".$imageName;
     $delete_th1 = DIR_IMG."Products/".$th11;
     $delete_th2 = DIR_IMG."Products/".$th12;
     $delete_th3 = DIR_IMG."Products/".$th13;
     unlink($delete_img1);
     unlink($delete_th1);
     unlink($delete_th2);
     unlink($delete_th3);
     $result= "UPDATE `tbl_products` SET `imageName`='$imagename' WHERE id='$productdetails'";
}
elseif ($selectquery == '2') {
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
     $result= "UPDATE `tbl_products` SET `image2`='$imagename' WHERE id='$productdetails'";
}
elseif ($selectquery == '3') {
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
     $result= "UPDATE `tbl_products` SET `image3`='$imagename' WHERE id='$productdetails'";
}
unset($_SESSION['pic']);

$query = mysqli_query($conn,$result);
}


/* GET Value from Admin for Active/Disactive Product*/
if (isset($_GET['pid'])){
    $pid = $_GET['pid'];
    $conn=mysqli_connect("localhost","root","","markethub");
    // $conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
    $select = "SELECT isActive FROM tbl_products WHERE id='$pid'";
    $result = mysqli_query($conn,$select);
    $value = mysqli_fetch_array($result);
    if($value['isActive'] == 'y'){
        $query = "UPDATE tbl_products SET isActive='n' WHERE id='$pid'";
        $exe = mysqli_query($conn,$query);
        redirectPage(SITE_ADM_MOD.'viewproducts-nct/');
    }
    else{
        $query = "UPDATE tbl_products SET isActive='y' WHERE id='$pid'";
        $exe = mysqli_query($conn,$query);
        redirectPage(SITE_MOD.'viewproducts-nct/');
    }
}
/* End GET Value from Admin for Active/Disactive Product*/

/* GET Value from user */
if(isset($_POST['updateproduct'])){
	$productdetails=$_POST['productdetails'];
    // $target_dir = "../../themes-nct/images-nct/Products/";
    // $target_file = $target_dir . basename($_FILES["image1"]["name"]);
    // $imagename1 = basename($_FILES["image1"]["name"]);
    // $target_file2 = $target_dir . basename($_FILES["image2"]["name"]);
    // $imagename2 = basename($_FILES["image2"]["name"]);
    // $target_file3 = $target_dir . basename($_FILES["image3"]["name"]);
    // $imagename3 = basename($_FILES["image3"]["name"]);
    $uploadOk = 1;

    // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $title = $_POST['title'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $qty_available = $_POST['qty_avilable'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $brand = $_POST['brand'];
    $selected_image = $_POST['imageselect'];

    $exe1 = mysqli_query($conn,"SELECT * FROM tbl_menubar WHERE id='$category'");
    foreach ($exe1 as $k => $v) {
        $category = $v['menu'];
    }

    $exe2 = mysqli_query($conn,"SELECT * FROM tbl_menubar WHERE id='$subcategory'");
    foreach ($exe2 as $k => $v) {
        $subcategory = $v['menu'];
    } 

    $exe3 = mysqli_query($conn,"SELECT * FROM tbl_menubar WHERE id='$brand'");
    foreach ($exe3 as $k => $v) {
        $brand = $v['menu'];
    } 

    $short_description = $_POST['short_description'];
    $specification = $_POST['specification'];
    $additional_info = $_POST['additional_info'];

    $array1 = explode(PHP_EOL, $additional_info);
    foreach ($array1 as $key => $value) 
    {    
            $add1[] =  "<li>".$array1[$key]."</li>";
    }
    $additional_info = implode("",$add1);
    
    $array2 = explode(PHP_EOL, $short_description);
    foreach ($array2 as $key => $value) 
    {    
            $add2[] =  "<li>".$array2[$key]."</li>";
    }
    $short_description = implode("",$add2);
    $array3 = explode(PHP_EOL, $specification);
    foreach ($array3 as $key => $value) 
    {    
            $add3[] =  "<li>".$array3[$key]."</li>";
    }
    $specification = implode("",$add3);

    $imagename = $_SESSION['pic'];

    $conn=mysqli_connect("localhost","root","","markethub");
    // $conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
    if ($selected_image == '1') {
        echo $result= "UPDATE `tbl_products` SET `imageName`='$imagename',`title`='$title',`category`='$category',`subcategory`='$subcategory',`brand`='$brand',`price`='$price',`qty_available`='$qty_available',`size`='$size',`color`='$color',`shortDescription`='$short_description',`specification`='$specification',`additionalinfo`='$additional_info',`isActive`='u' WHERE id='$productdetails'";
    }
    elseif ($selected_image == '2') {
        echo $result= "UPDATE `tbl_products` SET `image2`='$imagename',`title`='$title',`category`='$category',`subcategory`='$subcategory',`brand`='$brand',`price`='$price',`qty_available`='$qty_available',`size`='$size',`color`='$color',`shortDescription`='$short_description',`specification`='$specification',`additionalinfo`='$additional_info',`isActive`='u' WHERE id='$productdetails'";
    }
    elseif ($selected_image == '3') {
        echo $result= "UPDATE `tbl_products` SET `image3`='$imagename',`title`='$title',`category`='$category',`subcategory`='$subcategory',`brand`='$brand',`price`='$price',`qty_available`='$qty_available',`size`='$size',`color`='$color',`shortDescription`='$short_description',`specification`='$specification',`additionalinfo`='$additional_info',`isActive`='u' WHERE id='$productdetails'";
    }
    else
    {
        echo $result= "UPDATE `tbl_products` SET `title`='$title',`category`='$category',`subcategory`='$subcategory',`brand`='$brand',`price`='$price',`qty_available`='$qty_available',`size`='$size',`color`='$color',`shortDescription`='$short_description',`specification`='$specification',`additionalinfo`='$additional_info',`isActive`='u' WHERE id='$productdetails'";    
    }
    // exit();
    unset($_SESSION['pic']);

    $query = mysqli_query($conn,$result);
    echo "<script>window.location='../viewproducts-nct/'</script>";
    redirectPage(SITE_MOD.'viewproducts-nct/');
}
//

if (isset($_SESSION['username'])){
$obj = new ViewProducts($module, 0, issetor($token));
$pageContent = $obj->getPageContent();
}
else{
    redirectPage(SITE_URL);
}

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>