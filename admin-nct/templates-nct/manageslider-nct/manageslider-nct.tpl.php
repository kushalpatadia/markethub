<style type="text/css">
.rightbtn
{
    float: right;
    margin-top: 15px;
    margin-right: 5px;   
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
                    <div align="center">
                    Manage Slider
                    <button class="btn btn-success rightbtn" data-toggle="modal" data-target="#AddSlider">Add Slider Image</button></center>
                    </div>
                </div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="active/disacive" data-sortable="true">Status</th>
                                <th data-field="imagename" data-sortable="true">Image</th>
                                <th data-field="title" data-sortable="true">Title</th>
                                <th data-field="discount" data-sortable="true">Discount</th>
                                <th data-field="Position Status" data-sortable="true">Position Status</th>
                                <th data-field="description" data-sortable="true">Description</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                     
                       %Slider TABLE%
                     
                    </table>
                </div>
            </div>
            <div class="container">
              <!-- Trigger the modal with a button -->
              
              <!-- Modal -->
              <div class="modal fade" id="AddSlider" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><center>Add Slider Image</center></h4>
                    </div>
                    <div class="modal-body">
                        <div class="login-page" style="width:80%;">
                          <form class="wow fadeInUp animated" data-wow-delay=".7s" id="form" method="POST" action="" enctype="multipart/form-data">
                            <h4><label>Set Image</label></h4>
                            <pre><h4><label for="image">Main Image:</label></h4> <input type="file" name="image1" id="image1"></pre>
                            <h4><label>Title</label></h4>
                            <input type="text" placeholder="Slider Title" name="title">
                            <h4><label>Discount</label></h4>
                            <input type="text" placeholder="Discount" name="discount" required="">
                            <h4><label>Position of Image</label></h4>
                            <input type="radio" name="position" value="u" checked="">
                            <label>Home Page Upper Slider</label><br> 
                            <input type="radio" name="position" value="d">
                            <label>Home Page Down Slider</label><br>
                            <h4><label>Description</label></h4>
                            <textarea rows="5" name="description" style="width:100%;" ></textarea>
                            <h4><label>Image Activation</label></h4>
                            <input type="radio" name="status" value="a" checked="">
                            <label>Image Active</label><br> 
                            <input type="radio" name="status" value="d">
                            <label>Image Disactive</label>
                            <input type="submit" value="Submit" name="insertslider" id="insertslider">
                            <input type="submit"  data-dismiss="modal" value="Close">
                          </form>
                        </div>
                    </div>

                    <div class="modal-footer">
                    </div>
                  </div>
                  
                </div>
              </div>
              
            </div>

    </div>
<!--/.row-->  
</div>