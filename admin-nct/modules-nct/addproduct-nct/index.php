<?php

$reqAuth = false;
$module = 'addproduct-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.addproduct-nct.php";

extract($_REQUEST);

$winTitle = 'Add Product';

$headTitle = 'Manage Products';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

/*Upload Logic start*/
if(isset($_POST['addproduct'])){
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
    
    $Uploaded_by = "ADMIN";
    /*insert query*/
    $imagename1 = $_SESSION['pic'];
    //echo "image name:::::::".$imagename1."<br>";
    $imagename2 = 'noimage.jpeg';
    $imagename3 = 'noimage.jpeg';
    $sql = "INSERT INTO tbl_products VALUES ('','$imagename1','$imagename2','$imagename3','$title','$category','$subcategory','$brand','$price','$qty_available','','','$size','$color','$short_description','$specification','$additional_info','','y','$Uploaded_by')";
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

if (isset($_SESSION['adminusername'])){
$obj = new AddProduct($module, 0, issetor($token));

$pageContent = $obj->getPageContent();
}
else{
    redirectPage(SITE_ADMIN_URL);
}


require_once DIR_ADMIN_TMPL . "parsing-nct.tpl.php";
?>