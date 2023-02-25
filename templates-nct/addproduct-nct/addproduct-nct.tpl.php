<script src="{SITE_JS}js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="{SITE_JS}js/image_crop/cropper.js"></script>
<script type="text/javascript" src="{SITE_JS}js/image_crop/tooltip.min.js"></script>
<script type="text/javascript" src="{SITE_JS}js/image_crop/main.js"></script>

<link href="{SITE_CSS}image_crop_css/cropper.css" rel="stylesheet" type="text/css"/>
<link href="{SITE_CSS}image_crop_css/main.css" rel="stylesheet" type="text/css"/>
<link href="{SITE_CSS}image_crop_css/imgareaselect-animated.css" rel="stylesheet" type="text/css"/>
 
<style type="text/css">
  body {
    margin-top:40px;
  }
  .stepwizard-step p {
    margin-top: 10px;
  }
  .stepwizard-row {
    display: table-row;
  }
  .stepwizard {
    display: table;
    width: 50%;
    position: relative;
  }
  .stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
  }
  .stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
  }
  .stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
  }
  .btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
  }
</style>
<!-- breadcrumbs-->
<div class="breadcrumbs">
  <div class="container">
    <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
      <li><a href="{SITE_URL}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
      <li class="active">Add Product</li>
    </ol>
  </div>
</div>
<!--//breadcrumbs-->

<div class="container"><br>
	<form action="{SITE_MOD}viewproducts-nct/">
   <button class="btn btn-primary nextBtn btn-lg pull-left" type="submit">View Your Products</button>
 	</form>
 <div class="stepwizard col-md-offset-3">
  <div class="stepwizard-row setup-panel">
    <div class="stepwizard-step">
      <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
      <p>Step 1</p>
    </div>
    <div class="stepwizard-step">
      <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
      <p>Step 2</p>
    </div>
    <div class="stepwizard-step">
      <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
      <p>Step 3</p>
    </div>
  </div>
</div>
	%PAYPAL%
</div>

<form role="form" id="form" class="wow fadeInUp animated" data-wow-delay=".7s" action="" method="POST" enctype="multipart/form-data">
  <div class="row setup-content" id="step-1">
    <div class="col-xs-6 col-md-offset-3">
      <div class="col-md-12"><br>
        <h3> Step 1</h3>
        <div class="form-group">
         <label class="control-label"><h4>*Product Title:</h4></label>
         <input maxlength="100" type="text" class="form-control" placeholder="Enter Product Title" name="title" required="">
       </div>
       <div class="form-group">
         <label class="control-label"><h4>*Price:</h4></label>
         <input type="text" class="form-control" placeholder="Enter Product Price" name="price" required="">
       </div>
       <div class="form-group">
         <label class="control-label"><h4>*Size:</h4></label>
         <input type="text" class="form-control" placeholder="Enter Product Size" name="size" required="">
       </div>
       <div class="form-group">
         <label class="control-label"><h4>*Total Quantity:</h4></label>
         <input type="number" class="form-control" placeholder="Enter Product Total Quantities" name="qty_avilable" required="">
       </div>
       <div class="form-group">
        <h4><label for="color">Select Color:</label></h4>
        <select class="form-control" name="color" required="">
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
            <!-- <div class="form-group">
                <label class="control-label"><h4>*No of Colors:</h4></label>
                <input id="no_of_fields" class="form-control" type="text" placeholder="Total Number Of Colors" required=""/>
                <div id="input_set">
                    <p><label for="my_input"></label></p>
                <button id="btn" href="#" type="button">Add</button>
                </div>
              </div> -->
              <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
            </div>
          </div>
        </div>
        <div class="row setup-content" id="step-2">
          <div class="col-xs-6 col-md-offset-3">
            <div class="col-md-12">
              <h3> Step 2</h3>
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
                <select class="form-control" name="category" id="category" required="">
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
                <select class="form-control" name="subcategory" id="subcategory" required="">
                  <option value="0">Select category first</option>
                </select>
              </div>

              <div class="form-group">
                <h4><label for="brand">Select Brand:</label></h4>
                <select class="form-control" name="brand" id="brand" required="">
                  <option value="0">Select subcategory first</option>
                </select>
              </div>
              <!-- our select code end -->

<!--             <div class="form-group">
               <label class="control-label"><h4>*Select Category:</h4></label>
                    <select class="form-control" name="category" required="">
                        <option>Others</option>
                        %CATEGORY%
                    </select>
            </div>
             <div class="form-group">
                <label for="subcategory"><h4>*Select Sub Catagory:</h4></label>
                    <select class="form-control" name="subcategory" required="">
                        <option>Others</option>
                        %SUBCATEGORY%
                    </select>
            </div>
            <div class="form-group">
                <label for="subcategory"><h4>*Select Brand:</h4></label>
                    <select class="form-control" name="brand" required="">
                        <option>Others</option>
                        %BRAND%
                    </select>
            </div>
          -->           
           <div class="form-group">
          <pre><h4><label for="image1" class="form-control">*Main Image:</label></h4> <!-- <input type="file" name="image1" id="image1" required=""> -->
            <a href="javascript:void(0);" class="edit-btn company-edit-btn" data-toggle="modal" data-target="#avatar-modal"><i class="fa fa-pencil"></i></a>
          </pre>
        </div>
        <div class="form-group">
         <!--  <pre><h4><label for="image2" class="form-control">Image2:</label></h4> <input type="file" name="image2" id="image2" required="" 
            ></pre>
            <pre><h4><label for="image3" class="form-control">Image3:</label></h4> <input type="file" name="image3" id="image3" required=""></pre> -->
          </div>
          <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-3">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 3</h3>
          <h4><label for="short_discription">*Description:</label></h4>
          <textarea rows="5" name="short_discription" placeholder="Short Description About Your Product" style="width:100%;" required=""></textarea>
          <h4><label for="specification">*Specification:</label></h4>
          <textarea rows="5" name="specification" placeholder="Specification About Your Product" style="width:100%;"
          required=""></textarea>
          <h4><label for="additional_info">*Additional Info:</label></h4>
          <textarea rows="5" name="additional_info" placeholder="Additional Information About Your Product" style="width:100%;" required=""></textarea>
          <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
          <button class="btn btn-success nextBtn btn-lg pull-right" type="submit" name="addproduct" id="addproduct" onclick="return showdata()">Submit</button>
        </div>
      </div>
    </div>
  </form>
  <br>
</div>

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
        alert("Image Uploaded");
      }
      // function(data) {
      //   console.log(data.result);
      //   //$("#profile_photo_id").attr('src', data.result);
      //   window.location.href=SITE_URL+"Edit-company-profile";
      // }
      
      
    });
}
</script>


  

  <!-- Modal -->
  <div class="modal fade" id="paypal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center>Paypal Id</center></h4>
        </div>
        <div class="modal-body">
            <div class="login-page" style="width:80%;">
	            <div class="login-body">
	                <form class="wow fadeInUp animated" data-wow-delay=".7s" action="" method="POST" id="form">
	                	<div class="form-group">
				         <label class="control-label"><h4>*Paypal Id:</h4></label>
				         <input maxlength="100" type="email" class="form-control" placeholder="Enter Paypal Id" name="paypalid" required="" value="%PAYPALEMAIL%">
				       	</div>
	          		<input type="submit" name="submitpaypalid" value="submit" id="submitpaypalid" class="btn btn-sm">
	          	  </form>
	            </div>
            </div>	
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
