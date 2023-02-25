<style type="text/css">
  .rightbtn
  {
    float: right;
    margin-top: 15px;
    margin-right: 5px;   
  }</style>
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
      <div style="height:50px;"></div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <div align='center'>
            Manage Products
            <a href="{SITE_ADM_MOD}addproduct-nct/"><button class="btn btn-success rightbtn">Add Product</button></a>
          </div>
        </div>
        <div class="panel-body">
          <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
            <thead>
              <tr>
                <th data-field="id" data-sortable="true">Product ID</th>
                <th data-field="isActive" data-sortable="true">Is Active</th>
                <th data-field="title" data-sortable="true">Title</th>
                <th data-field="image1" data-sortable="true">Image1</th>
                <th data-field="image2" data-sortable="true">Image2</th>
                <th data-field="image3" data-sortable="true">Image3</th>
                <th data-field="category" data-sortable="true">Category</th>
                <th data-field="subcategory" data-sortable="true">Subcategory</th>
                <th data-field="brand" data-sortable="true">Brand</th>
                <th data-field="price" data-sortable="true">Price</th>
                <th data-field="qty_avilable" data-sortable="true">Qty</th>
                <th data-field="rating" data-sortable="true">Rating</th>
                <th data-field="reviews" data-sortable="true">Reviews</th>
                <th data-field="size" data-sortable="true">Size</th>
                <th data-field="color" data-sortable="true">Color</th>
                <th data-field="shortdiscription" data-sortable="true">ShortDescription</th>
                <th data-field="specification" data-sortable="true">Specification</th>
                <th data-field="additionalinfo" data-sortable="true">Additional Info</th>
                <th data-field="total_sell" data-sortable="true">Total Selling</th>
                <th data-field="uploadedby" data-sortable="true">Uploaded By</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            
            %PRODUCTS TABLE%
            
          </table>
        </div>
      </div>
  </div>
  <!-- /row -->
</div>  


<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>     
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script>
  jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
  }, "Letters only please");
  $(function() {

    $("#form").validate({
      errorClass: "my-error-class",
      validClass: "my-valid-class",
      rules: {
        name:{
          required:true,  
          lettersonly:true
        },
        email: {
          required:true,
          email:true,
          minlength:7
        },
        password: {
          required:true,
          minlength:5
        },
        password2: {
          required:true,
          minlength:5,
          equalTo:"#password"
        },
        phone_no: {
          required:true,
          minlength:10,
          maxlength:10,
          number: true  
        },
        price: {
          required:true,
          number:true
        }
      },
      messages:{
        name:{
          required:'Please Enter Name',
          lettersonly:'Only Characters are allowed'
        },
        email: {
          required: 'Please Enter an Email address',
          email:'Please Enter an Valid Email address'
        },
        phone_no: {
          required: 'Please Enter Mobile Number',
          maxlength: 'Must use Mobile Number Only',
          minlength: 'Must use Mobile Number Only' 
        },
        price:{
          number: 'Please Enter Price Properly'
        }
      }
    });
  });

</script>

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

