<style type="text/css">
.rightbtn
{
    float: right;
    margin-top: -30px;
    margin-right: 5px;   
}
.widget-left {
    height: 120px;
}

</style>
<!-- sidebar -->
<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
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
                  <center>Manage Static Pages</center>
                    <!-- <a href="{SITE_ADM_MOD}addpage-nct"><button class="btn btn-success rightbtn">Add New Page</button></a> -->
                    <button class="rightbtn btn btn-success" name="addProduct" data-toggle="modal" data-target="#addPage">Add Page</button>
                </div>
            </div>
            <div class="panel-body">
                    <div class="widget-shadow">
                        %PAGES%
                    </div>
                </div>
            </div>
        </div>
  </div>
</div><!--/.row-->  


<div class="container">
  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  <div class="modal fade" id="addPage" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center>Add Page</center></h4>
        </div>
        <div class="modal-body">
            <div class="login-page" style="width:80%;">
                <form class="wow fadeInUp animated" data-wow-delay=".7s" action="" method="POST" id="form">
                <label><h4>*Page Title:</h4></label>
                <input type="text" placeholder="Enter Page Header" name="header" required="">
                <label><h4>*Page Content:</h4></label>
                <!-- <input type="text" placeholder="Enter Page Content" class="ckeditor" id="text" name="content" required=""> -->
                <textarea name="text" id="text1"></textarea>
                <script>
                    CKEDITOR.replace( 'text1' );
                </script>
                <label><h4>*Page Link:</h4></label>
                <input type="text" placeholder="Enter Page Link" name="link" required="">
                <label><h4>*Status:</h4></label><br>
                <input type="radio" name="status" value="a" checked="">
                <label>Active</label><br> 
                <input type="radio" name="status" value="d">
                <label>Disactive</label>
                <input type="submit" value="Submit" name="sbtpagedetails" id="sbtpagedetails">
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
    <!-- /row -->
</div>  
