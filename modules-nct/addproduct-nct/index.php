<?php

$reqAuth = false;
$module = 'addproduct-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.addproduct-nct.php";

extract($_REQUEST);

$winTitle = 'Add Product';

$headTitle = 'Add Product';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

/*Upload Logic start*/
// Check if image file is a actual image or fake image
if (isset($_SESSION['login_user'])) {
if(isset($_POST['addproduct'])){
    // $target_dir = "../../themes-nct/images-nct/Products/";

    // $target_file = $target_dir . basename($_FILES["image1"]["name"]);
    // $imagename1 = basename($_FILES["image1"]["name"]);//this for just getting the name of product

    // $target_file2 = $target_dir . basename($_FILES["image2"]["name"]);
    // $imagename2 = basename($_FILES["image2"]["name"]);//this for just getting the name of product

    // $target_file3 = $target_dir . basename($_FILES["image3"]["name"]);
    // $imagename3 = basename($_FILES["image3"]["name"]);//this for just getting the name of product

    // $uploadOk = 1;

    // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    //data geting from the form
    $title = $_POST['title'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $qty_available = $_POST['qty_avilable'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $brand = $_POST['brand'];

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

    $short_description = $_POST['short_discription'];
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
    /*$check = getimagesize($_FILES["image1"]["tmp_name"]);
    if($check !== false) {
        //echo "<script>alert('File is an image - " . $check["mime"] . ".')</script>";
        $uploadOk = 1;
    } else {
        //echo "<script>alert('File is not an image.')</script>";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        //echo "<script>alert('Sorry, file already exists.')</script>";
        $uploadOk = 0;}
    // Check file size
    if ($_FILES["image1"]["size"] > 500000) {
        //echo "<script>alert('Sorry, your file is too large.')</script>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.')</script>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file)) {
            echo "<script>alert('The file ". basename( $_FILES["image1"]["name"]). " has been uploaded.')</script>";
        } else { echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
        }
        move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file2);
        move_uploaded_file($_FILES["image3"]["tmp_name"], $target_file3);
    }
    */
    $u_id = 'U'.$_SESSION['userid'];
    // $color1 = $_POST['color1'];
    // foreach ($color1 as $key => $value) {
    //     $color[] = $value; 
    // }
    // $color = implode(",", $color);
    /*insert query*/
    $imagename1 = $_SESSION['pic'];
    //echo "image name:::::::".$imagename1."<br>";
    $imagename2 = 'noimage.jpeg';
    $imagename3 = 'noimage.jpeg';
    $sql = "INSERT INTO tbl_products VALUES ('','$imagename1','$imagename2','$imagename3','$title','$category','$subcategory','$brand','$price','$qty_available','','','$size','$color','$short_description','$specification','$additional_info','','n','$u_id')";
    // exit();
    $query = mysqli_query($conn,$sql);
    unset($_SESSION['pic']);
    if ($query==1) {

        // echo "<script>alert('Product Added')</script>";
        echo '<script>
            setTimeout(function() {
                swal({
                    title: "Product Added Successfully !",
                    message : "Your Product Goes For Approval,In Short Time It Will be Approved",
                    type: "success",
                    timer: 1500,
                    showConfirmButton: false
                }, function() {
                    window.location = "../addproduct-nct/";
                });
            }, 1000);
        </script>';

    }
}
/*Upload logic end*/

/*Add Paypal ID */

if(isset($_POST['submitpaypalid']) && !empty($_POST['submitpaypalid'])){
    $u_id = $_SESSION['userid'];
    $paypalid = $_POST['paypalid'];
    $query = "UPDATE `register_users` SET `paypal_email`='$paypalid' WHERE u_id='$u_id'";
    $exe = mysqli_query($conn,$query);
}

/*End Paypal ID */

$obj = new AddProduct($module, 0, issetor($token));

$pageContent = $obj->getPageContent();
}
else
{
    // echo "<script>alert('for this you must sign in')</script>";
    // echo "<script>window.location='../signin-nct/'</script>";
     echo '<script>
            setTimeout(function() {
                swal({
                    title: "You Must Sign in For This",
                    type: "success",
                    timer: 1500,
                    showConfirmButton: false
                }, function() {
                    window.location = "../signin-nct/";
                });
            }, 1000);
        </script>';
}
require_once DIR_TMPL . "parsing-nct.tpl.php";
?>
