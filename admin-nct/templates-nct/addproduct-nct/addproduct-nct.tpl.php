<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style type="text/css">
  .login-page{
    width: 70%;
  }
</style>
<link href="{SITE_CSS}image_crop_css/cropper.css" rel="stylesheet" type="text/css"/>
<link href="{SITE_CSS}image_crop_css/main.css" rel="stylesheet" type="text/css"/>
<link href="{SITE_CSS}image_crop_css/imgareaselect-animated.css" rel="stylesheet" type="text/css"/>

<!-- sidebar -->
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  <form role="search" action="{SITE_ADM_MOD}manageuserquery-nct/" method="GET">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Search" name="orderno">
    </div>
  </form>
  <ul class="nav menu">
  %DYNAMIC-MENU%
    <!-- <li><a href="{SITE_ADM_MOD}dashboard-nct"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
    <li><a href="{SITE_ADM_MOD}managesite-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Site</a></li>
    <li><a href="{SITE_ADM_MOD}managestaticpages-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Static Pages</a></li>
    <li class="active"><a href="{SITE_ADM_MOD}manageproduct-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Product</a></li>
    <li><a href="{SITE_ADM_MOD}sellerproduct-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Seller Product</a></li>
    <li><a href="{SITE_ADM_MOD}manageuser-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage User</a></li>
    <li><a href="{SITE_ADM_MOD}manageorder-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Order</a></li>
    <li><a href="{SITE_ADM_MOD}manageshipping-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Shipping</a></li>
    <li><a href="{SITE_ADM_MOD}manageslider-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Home Page Slider</a></li>
    <li><a href="{SITE_ADM_MOD}managecontactus-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Contact Us</a></li>
    <li><a href="{SITE_ADM_MOD}managecategory-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Category</a></li>
    <li><a href="{SITE_ADM_MOD}managesubcategory-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Subcategory</a></li>
    <li><a href="{SITE_ADM_MOD}managebrand-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Brand</a></li>
    <li><a href="{SITE_ADM_MOD}updatesellerproduct-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Seller Update</a></li> -->
  </ul>
</div>
<!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="login-page">
      <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
        <h3 class="title">Add<span> Product</span></h3>
      </div>
      <div class="widget-shadow">
        <div class="login-body">
          <form class="wow fadeInUp animated" id="form" data-wow-delay=".7s" action="" method="POST" enctype="multipart/form-data">
            <h4><label>Product Title:</label></h4>
            <input type="text" placeholder="Product Title" name="title" required="">
            <h4><label>Product Price:</label></h4>
            <input type="text" placeholder="Product Price" name="price" required="">
            <h4><label>Product's Size:</label></h4>
            <input type="text" placeholder="Product's Size" name="size" required="">
            <div class="form-group">
            <h4><label for="color">Select Color:</label></h4>
            <select class="form-control" name="color">
              <option>Others</option>
              <option>White</option>
              <option>Black</option>
              <option>Gold</option>
              <option>Silver</option>
              <option>Red</option>
              <option>Blue</option>
              <option>Yellow</option>
              <option>Pink</option>
              <option>Green</option>
              <option>Wooden</option>
              <option>Grey</option>
              <option>Rosegold</option>
            </select>
            </div>
            <h4><label>No of Products Available:</label></h4>
            <input type="text" placeholder="No of Products Available" name="qty_avilable" required>

            <!-- our select code -->
            <?php
                                    //Include database configuration file
            $conn = mysqli_connect("localhost","root","","markethub");

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
              <h4><label for="subcategory">Select Subcategory:</label></h4>
              <select class="form-control" name="subcategory" id="subcategory">
                <option value="0">Select category first</option>
              </select>
            </div>

            <div class="form-group">
              <h4><label for="brand">Select Brand:</label></h4>
              <select class="form-control" name="brand" id="brand">
                <option value="0">Select subcategory first</option>
              </select>
            </div>
            <!-- our select code end -->

            <div class="form-group">
              <pre><h4><label for="image1" class="form-control">*Main Image:</label></h4>   <a href="javascript:void(0);" class="edit-btn company-edit-btn" data-toggle="modal" data-target="#avatar-modal"><i class="fa fa-pencil">Upload Image</i></a>
              </pre>
            </div>

            <h4><label for="short_discription">Description:</label></h4>
            <textarea rows="5" name="short_discription" placeholder="Short Description About Your Product" style="width:100%;" required=""></textarea>
            <h4><label for="specification">Specification:</label></h4>
            <textarea rows="5" name="specification" placeholder="Specification About Your Product" style="width:100%;" required=""></textarea>
            <h4><label for="additional_info">Additional Info:</label></h4>
            <textarea rows="5" name="additional_info" placeholder="Additional Information About Your Product" style="width:100%;" required=""></textarea>

            <input type="submit" value="Submit" name="addproduct" id="addproduct" onclick="return showdata()">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#category').on('change',function(){
      var categoryID = $(this).val();
      if(categoryID){
        $.ajax({
          type:'POST',
          url:'../../modules-nct/manageproduct-nct/ajaxData.php',
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
          url:'../../modules-nct/manageproduct-nct/ajaxData.php',
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
                <input type="file" class="avatar-input" id="avatarInput" name="avatar_file" required="">
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
                  <button type="submit" class="btn btn-primary btn-block avatar-save" data-dismiss="modal">Done</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div><!-- /.modal -->
  <script type="text/javascript">
    function showdata(){
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
        // alert("Image Uploaded");
      }
      // function(data) {
      //   console.log(data.result);
      //   //$("#profile_photo_id").attr('src', data.result);
      //   window.location.href=SITE_URL+"Edit-company-profile";
      // }
      
      
    });
    }
  </script>




