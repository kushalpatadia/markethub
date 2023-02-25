<script src="{SITE_JS}js/jquery-1.11.1.js"></script>
      <script type="text/javascript" src="{SITE_JS}js/image_crop/cropper.js"></script>
      <script type="text/javascript" src="{SITE_JS}js/image_crop/tooltip.min.js"></script>
      <script type="text/javascript" src="{SITE_JS}js/image_crop/main.js"></script>

<link href="{SITE_CSS}image_crop_css/cropper.css" rel="stylesheet" type="text/css"/>
<link href="{SITE_CSS}image_crop_css/main.css" rel="stylesheet" type="text/css"/>
<link href="{SITE_CSS}image_crop_css/imgareaselect-animated.css" rel="stylesheet" type="text/css"/>
<!--breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{SITE_URL}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Update Product</li>
            </ol>
        </div>
    </div>
    <!--//breadcrumbs-->
    <!--login-->
    <div class="login-page">
        <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
            <h3 class="title">Update<span> Product</span></h3>
        </div>
        <div class="widget-shadow">
            <div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
            </div>
            <div class="login-body">
                <label>Select image for updation</label><br><br>
                <div id="showing_img" style="border-color: blue; border: solid; height: 150px;">
                  <div class="col-sm-4">
                    <input type="radio" name="imageselect" value="1" data-toggle="modal" data-target="#avatar-modal">
                    <label>image1</label>
                    <a data-toggle="modal" data-target="#img1">
                        <img src="%image1%" style="height: 100px;width: 100px;">
                    </a>
                    </div>
                    <div class="col-sm-4">
                      <input type="radio" name="imageselect" value="2" data-toggle="modal" data-target="#avatar-modal">
                        <label>image2</label>
                        <a data-toggle="modal" data-target="#img2">
                            <img src="%image2%" style="height: 100px;width: 100px;">
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <input type="radio" name="imageselect" value="3" data-toggle="modal" data-target="#avatar-modal">
                        <label>image3</label>
                        <a data-toggle="modal" data-target="#img3">
                            <img src="%image3%" style="height: 100px;width: 100px;">
                        </a>
                    </div>
                </div>
                <br><br>


                <form class="wow fadeInUp animated" data-wow-delay=".7s" action="" method="POST" enctype="multipart/form-data">
                    <h4><label>Product Title:</label></h4>
                    <input type="text" placeholder="Product Title" name="title" value="%title%" required="">
                    <h4><label>Product Price:</label></h4>
                    <input type="text" placeholder="Product Price" name="price" value="%price%" required="">
                    <h4><label>Product's Size:</label></h4>
                    <input type="text" placeholder="Product's Size" name="size" value="%size%" required="">
                    <h4><label>Product's Color:</label></h4>
                    <input type="text" placeholder="Product's Color" name="color" value="%color%" required="">
                    <h4><label>No of Products Available:</label></h4>
                    <input type="text" placeholder="No of Products Available" name="qty_avilable" value="%qty%" required>

                                       <!-- our select code -->
                    <?php
                    //Include database configuration file
                    $conn = mysqli_connect("localhost","root","","markethub");
                    // $conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");

                    //Get all country data
                    $query = mysqli_query($conn,"SELECT * FROM tbl_menubar WHERE type = 'c' AND id!='1' ORDER BY menu ASC");

                    //Count total number of rows
                    $rowCount = mysqli_num_rows($query);
                    ?>
                    <div class="form-group">
                    <h4><label for="category">Select Category:</label></h4>
                    <select class="form-control" name="category" id="category">
                        <option value="0">Select Category</option>
                        <?php
                        if($rowCount > 0){
                            while($row = mysqli_fetch_assoc($query)){ 
                                echo '<option value="'.$row['id'].'">'.$row['menu'].'</option>';
                            }
                        }else{
                            echo '<option value="">Category not available</option>';
                        }
                        ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <h4><label for="category">Select Subcategory:</label></h4>
                    <select class="form-control" name="subcategory" id="subcategory">
                        <option value="0">Select category first</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <h4><label for="category">Select Brand:</label></h4>
                    <select class="form-control" name="brand" id="brand">
                        <option value="0">Select subcategory first</option>
                    </select>
                    </div>
                    <!-- our select code end -->
                    
                    <!-- <pre><h4><label for="image1">Main Image:</label></h4> <input type="file" name="image1" value="%image1%" id="image1"></pre>
                    <pre><h4><label for="image2">Image2:</label></h4> <input type="file" name="image2" value="%image2%" id="image2"></pre>
                    <pre><h4><label for="image3">Image3:</label></h4> <input type="file" name="image3" value="%image3%" id="image3"></pre> -->
                    <h4><label for="short_discription">Description:</label></h4>
                    <textarea rows="5" name="short_description" style="width:100%;" required="">%mshortdescription%</textarea>
                    <h4><label for="specification">Specification:</label></h4>
                    <textarea rows="5" name="specification" style="width:100%;">%mspecification%</textarea>
                    <h4><label for="additional_info">Additional Info:</label></h4>
                    <textarea rows="5" name="additional_info" style="width:100%;" >%madditionalinfo%</textarea>
                    <input type="hidden" name="productdetails" value="%pid%" id="productdetails">
                    <input type="submit" value="Submit" name="updateproduct">
                </form>
            </div>
        </div>
    </div>
<!--//login-->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#category').on('change',function(){
        var categoryID = $(this).val();
        if(categoryID){
            $.ajax({
                type:'POST',
                url:'../../modules-nct/addproduct-nct/ajaxData.php',
                data:'category_id='+categoryID,
                success:function(html){
                    $('#subcategory').html(html);
                    $('#brand').html('<option value="">Select subcategory first</option>'); 
                }
            }); 
        }else{
            $('#subcategory').html('<option value="">Select category first</option>');
            $('#brand').html('<option value="">Select subcategory first</option>'); 
        }
    });
    
    $('#subcategory').on('change',function(){
        var subcategoryID = $(this).val();
        if(subcategoryID){
            $.ajax({
                type:'POST',
                url:'../../modules-nct/addproduct-nct/ajaxData.php',
                data:'subcategory_id='+subcategoryID,
                success:function(html){
                    $('#brand').html(html);
                }
            }); 
        }else{
            $('#brand').html('<option value="">Select subcategory first</option>'); 
        }
    });
});
</script>


 <!--Company Profile Image -->
    <div id="crop-avatar">
      <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form class="avatar-form" id="avtar_form"  enctype="multipart/form-data" method="post">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="avatar-modal-label">Change Profile Image</h4>
              </div>
              <div class="modal-body">
                <div class="avatar-body">
                  <div class="avatar-upload">
                    <input type="hidden" class="avatar-src" name="avatar_src">
                    <input type="hidden" class="avatar-data" name="avatar_data"> 
                    <label for="avatarInput">Local upload</label>
                    <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                  </div>
                  <div class="row">
                    <div class="col-md-9">
                      <div class="avatar-wrapper">    
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="avatar-preview preview-lg"></div>
                      <div class="avatar-preview preview-md"></div>
                      <div class="avatar-preview preview-sm"></div>
                    </div>
                  </div>

                  <div class="row avatar-btns">
                    <div class="col-md-9">
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-15">-15deg</button>
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">-30deg</button>
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">-45deg</button>
                      </div>
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="15">15deg</button>
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="30">30deg</button>
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="45">45deg</button>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <button type="submit" class="btn btn-primary btn-block avatar-save" data-dismiss="modal" onclick="return showdata1()">Done</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div><!-- /.modal -->

<script type="text/javascript">
    function showdata1(){
    var formnew = document.getElementById("avtar_form"); 
    var formData = new FormData(formnew);
    jQuery.ajax({
      url: '{SITE_MOD}crop-nct/crop.php',
      type: 'post',
      dataType:'json',
      data:  formData,
      processData: false,  // tell jQuery not to process the data
      contentType: false ,  // tell jQuery not to set contentType
      enctype: 'multipart/form-data',
      mimeType: 'multipart/form-data',
      cache: false,
      success: function (data) {
        var img_name=$('input[name="imageselect"]:checked').val();
        var product_id=document.getElementById("productdetails").value;
        update_image(img_name,product_id);
        // alert("Image Uploaded");
        $('#showing_img').load(document.URL +  ' #showing_img');
      }
      // function(data) {
      //   console.log(data.result);
      //   //$("#profile_photo_id").attr('src', data.result);
      //   window.location.href=SITE_URL+"Edit-company-profile";
      // }
      
      
    });
}


function update_image(img_name,product_id) {
    // alert(img_name);
    // alert(product_id);
    jQuery.ajax({
        url: '{SITE_MOD}updateproduct-nct/index.php',
        type: 'get',
        data: {name:img_name,id:product_id},
        success: function(data) {
            toastrAlert('success','Image Uploaded');
        }
    });
}
</script>


<!-- Modal -->
<div class="modal fade" id="img1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Main Image</h4>
            </div>
            <div class="modal-body">
                <center><img src="%image1%"></center>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="img2" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Second Image</h4>
      </div>
      <div class="modal-body">
          <center><img src="%image2%"></center>
      </div>
  </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="img3" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Third Image</h4>
      </div>
      <div class="modal-body">
          <center><img src="%image3%"></center>
      </div>
  </div>
</div>
</div>