<?php


$reqAuth = false;
$module = 'manageproduct-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.manageproduct-nct.php";

$winTitle = 'Manage Products';

$headTitle = 'Manage Products';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

/* GET Value from Admin for Active/Disactive Product*/
if (isset($_GET['pid'])){
    $pid = $_GET['pid'];
    $conn=mysqli_connect("localhost","root","","markethub");
    $select = "SELECT isActive FROM tbl_products WHERE id='$pid'";
    $result = mysqli_query($conn,$select);
    $value = mysqli_fetch_array($result);
    if($value['isActive'] == 'y'){
        $query = "UPDATE tbl_products SET isActive='n' WHERE id='$pid'";
        $exe = mysqli_query($conn,$query);
        echo "msg1";
        break;
    }
    else{
        $query = "UPDATE tbl_products SET isActive='y' WHERE id='$pid'";
        $exe = mysqli_query($conn,$query);
        echo "msg2";
        break;
    }
}
/* End GET Value from Admin for Active/Disactive Product*/

/* GET Value from user */
if(isset($_POST['updateproduct'])){
	$productdetails=$_POST['productdetails'];
    $target_dir = "../../../themes-nct/images-nct/Products/";
    $target_file = $target_dir . basename($_FILES["image1"]["name"]);
    $imagename1 = basename($_FILES["image1"]["name"]);
    $target_file2 = $target_dir . basename($_FILES["image2"]["name"]);
    $imagename2 = basename($_FILES["image2"]["name"]);
    $target_file3 = $target_dir . basename($_FILES["image3"]["name"]);
    $imagename3 = basename($_FILES["image3"]["name"]);
    $uploadOk = 1;

    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $title = $_POST['title'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $qty_available = $_POST['qty_avilable'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $brand = $_POST['brand'];
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

    $check = getimagesize($_FILES["image1"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        //echo "Sorry, file already exists.";
        $uploadOk = 0;}
    // Check file size
    if ($_FILES["image1"]["size"] > 500000) {
        //echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        
        if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["image1"]["name"]). " has been uploaded.";
        }
         else { //echo "Sorry, there was an error uploading your file.";
        }
            if (move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file2)) {
            //echo "The file ". basename( $_FILES["image2"]["name"]). " has been uploaded.";
        }
         else { //echo "Sorry, there was an error uploading your file.";
        }
                    if (move_uploaded_file($_FILES["image3"]["tmp_name"], $target_file3)) {
            //echo "The file ". basename( $_FILES["image3"]["name"]). " has been uploaded.";
        }
         else { //echo "Sorry, there was an error uploading your file.";
        }
    }


    $conn=mysqli_connect("localhost","root","","markethub");;
	if (!empty($imagename1) && !empty($imagename2) && !empty($imagename3)) {
		$result= "UPDATE `tbl_products` SET `imageName`='$imagename1',`image2`='$imagename2',`image3`='$imagename3',`title`='$title',`category`='$category',`subcategory`='$subcategory',`brand`='$brand',`price`='$price',`qty_available`='$qty_available',`size`='$size',`color`='$color',`shortDescription`='$short_description',`specification`='$specification',`additionalinfo`='$additional_info' WHERE id='$productdetails'";
	}
	else
	{
		$result= "UPDATE `tbl_products` SET `title`='$title',`category`='$category',`subcategory`='$subcategory',`brand`='$brand',`price`='$price',`qty_available`='$qty_available',`size`='$size',`color`='$color',`shortDescription`='$short_description',`specification`='$specification',`additionalinfo`='$additional_info' WHERE id='$productdetails'";	
	}

	$query = mysqli_query($conn,$result);
    echo "<script>window.location='../manageproduct-nct/'</script>";
    redirectPage(SITE_ADM_MOD.'manageproduct-nct/');
}
//


if(isset($_POST['addproduct'])){
    $target_dir = "../../../themes-nct/images-nct/Products/";

    $target_file = $target_dir . basename($_FILES["image1"]["name"]);
    $imagename1 = basename($_FILES["image1"]["name"]);//this for just getting the name of product

    $target_file2 = $target_dir . basename($_FILES["image2"]["name"]);
    $imagename2 = basename($_FILES["image2"]["name"]);//this for just getting the name of product

    $target_file3 = $target_dir . basename($_FILES["image3"]["name"]);
    $imagename3 = basename($_FILES["image3"]["name"]);//this for just getting the name of product

    $uploadOk = 1;

    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    //data geting from the form
    $title = $_POST['title'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $qty_available = $_POST['qty_avilable'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $brand = $_POST['brand'];
    $short_description = $_POST['shortdescription'];
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

    

    //data getting from form is complete
    $check = getimagesize($_FILES["image1"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;}
    // Check file size
    if ($_FILES["image1"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["image1"]["name"]). " has been uploaded.";
        } else { echo "Sorry, there was an error uploading your file.";
        }
        move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file2);
        move_uploaded_file($_FILES["image3"]["tmp_name"], $target_file3);
    }
    

    /*insert query*/
    $u_id = 'A'.$_SESSION['adminuserid'];
    $sql = "INSERT INTO tbl_products VALUES ('','$imagename1','$imagename2','$imagename3','$title','$category','$subcategory','$brand','$price','$qty_available','','','$size','$color','$short_description','$specification','$additional_info','','y','$u_id')";
    $query = mysqli_query($conn,$sql);
    if ($query==1) {
        echo "<script>alert('Product Added')</script>";
    }
}
/*Upload logic end*/

if (isset($_SESSION['adminusername'])){
$obj = new ManageProduct($module, 0, issetor($token));
$pageContent = $obj->getPageContent();
}
else{
    redirectPage(SITE_ADMIN_URL);
}

require_once DIR_ADMIN_TMPL . "parsing-nct.tpl.php";
?>