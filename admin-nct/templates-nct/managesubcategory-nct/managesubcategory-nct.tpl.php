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
    </ul>
</div>
<!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
      <div style="height:50px;"></div>
        <div class="panel panel-default">
            <div class="panel-heading">
              <div align='center'>
                  Manage Subcategory
                  <button class="btn btn-success rightbtn" name="addCategory" data-toggle="modal" data-target="#addSubcategory">Add Subcategory</button>
              </div>
            </div>
            <div class="panel-body">
                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                  <thead>
                      <tr>
                          <th data-field="categoryname" data-sortable="true">Category Name</th>
                          <th data-field="id1" data-sortable="true">Subcategory Name</th>
                          <th data-field="status" data-sortable="true">Status</th>
                          <th data-field="subcatname" data-sortable="true">Link</th>
                          <th>Update</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
                 
                %SUBCATEGORY TABLE%
                 
                </table>
            </div>
        </div>
  </div>
</div><!--/.row-->  

<div class="container">
  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  <div class="modal fade" id="addSubcategory" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center>Add Subcategory</center></h4>
        </div>
        <div class="modal-body">
            <div class="login-page" style="width:80%;">
                <form class="wow fadeInUp animated" data-wow-delay=".7s" action="" method="POST">
                    <div class="form-group">
                        <h4><label for="category">Select Category:</label></h4>
                        <select class="form-control" name="category">
                            %CATEGORY%
                        </select>
                    </div>
                    <h4><label for="title">Subcategory:</label></h4><br>
                    <input type="text" placeholder="Subcategory" name="subcategory" required="">
                    <h4><label for="title">Subcategory Link:</label></h4><br>
                    <input type="text" placeholder="Subcategory Link" name="link" required="">
                    <input type="submit" value="Submit" name="addSubcategory">
                </form>
            </div>
        </div>

        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
</div>


