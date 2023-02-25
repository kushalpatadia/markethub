<style type="text/css">
.rightbtn
{
    float: right;
    margin-top: 15px;
    margin-right: 5px;   
}
h4 {
    font-size: 1em;
    color: #FF590F;
    line-height: 1.8em;
    text-transform: uppercase;
    font-weight: 700;
    font-family: 'Raleway', sans-serif;
}

</style>
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
        <li><a href="{SITE_ADM_MOD}manageproduct-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Product</a></li>
        <li><a href="{SITE_ADM_MOD}sellerproduct-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Seller Product</a></li>
        <li><a href="{SITE_ADM_MOD}manageuser-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage User</a></li>
        <li><a href="{SITE_ADM_MOD}manageorder-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Order</a></li>
        <li><a href="{SITE_ADM_MOD}manageshipping-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Shipping</a></li>
        <li><a href="{SITE_ADM_MOD}manageslider-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Home Page Slider</a></li>
        <li><a href="{SITE_ADM_MOD}managecontactus-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Contact Us</a></li>
        <li><a href="{SITE_ADM_MOD}managecategory-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Category</a></li>
        <li><a href="{SITE_ADM_MOD}managesubcategory-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Subcategory</a></li>
        <li class="active"><a href="{SITE_ADM_MOD}managebrand-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Brand</a></li>
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
                        Manage Brand
                        <button class="btn btn-success rightbtn" name="addBrand" data-toggle="modal" data-target="#addBrand">Add Brand</button>
                    </div>
            </div>
            <div class="panel-body">
                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                  <thead>
                      <tr>
                          <th data-field="Subcategory" data-sortable="true">Subcategory Name</th>
                          <th data-field="Brand" data-sortable="true">Brand Name</th>
                          <th data-field="Status" data-sortable="true">Status</th>
                          <th data-field="Link" data-sortable="true">Link</th>
                          <th data-field="Update" data-sortable="true">Update</th>
                          <th data-field="Delete" data-sortable="true">Delete</th>
                      </tr>
                  </thead>
                 
                %BRAND TABLE%
                 
                </table>
            </div>
        </div>
  </div>
</div><!--/.row-->  

<div class="container">
  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  <div class="modal fade" id="addBrand" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center>Add Brand</center></h4>
        </div>
        <div class="modal-body">
            <div class="login-page" style="width:80%;">
                <form class="wow fadeInUp animated" data-wow-delay=".7s" action="" method="POST">
                    <div class="form-group">
                        <h4><label for="subcategory">Select Subcategory:</label></h4>
                        <select class="form-control" name="subcategory">
                            %SUBCATEGORY%
                        </select>
                    </div>
                    <h4><label for="title">Brand:</label></h4><br>
                    <input type="text" placeholder="brand" name="brand" required="">
                    <h4><label for="title">Brand Link:</label></h4><br>
                    <input type="text" placeholder="brand Link" name="link" required="">
                    <input type="submit" value="Submit" name="addbrand">
                </form>
            </div>
        </div>

        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
</div>


