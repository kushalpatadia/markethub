<?php


$reqAuth = false;
$module = 'viewproducts-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.viewproducts-nct.php";

$winTitle = 'Seller Products';

$headTitle = 'Seller Products';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));


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
    $short_description = $_POST['short_description'];
    $specification = $_POST['specification'];
    $additional_info = $_POST['additional_info'];
    

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

if (isset($_SESSION['username'])){
$obj = new ViewProducts($module, 0, issetor($token));
$pageContent = $obj->getPageContent();
}
else{
    redirectPage(SITE_URL);
}

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>