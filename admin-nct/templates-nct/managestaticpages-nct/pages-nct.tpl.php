<div class="col-xs-12 col-md-12 col-lg-4">
  <div class="panel panel-blue panel-widget ">
   <div class="row no-padding">
     <div class="col-sm-3 col-lg-3 widget-left">
       <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
     </div>
     <div class="col-sm-9 col-lg-9 widget-right">
       <div class="large">
        <a href="%link%" target="_blank">%pagename%</a>
      </div>
      <label class="switch" style="float: right;margin-top: 20px">
        <input type="checkbox" name="selector" onclick="changePageStatus(%id%);" %checking%>
        <div class="slider round"></div>
      </label><br>
      <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#updatePage%id%">Update</button>
      <a class="btn btn-danger btn-sm" href="%delete%">Delete</a>
    </div>
  </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="updatePage%id%" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><center>Update Page</center></h4>
      </div>
      <div class="modal-body">
        <div class="login-page" style="width:80%;">
          <form class="wow fadeInUp animated" data-wow-delay=".7s" action="" method="POST" id="form">
            <label><h4>*Page Title:</h4></label>
            <input type="text" placeholder="Enter Page Header" name="header" value="%pagename%" required="">
            <label><h4>*Page Content:</h4></label>
            <textarea name="text" id="text%id%">%pagecontent%</textarea>
            <script>
              CKEDITOR.replace( 'text%id%' );
            </script>
            <label><h4>*Page Link:</h4></label>
            <input type="text" placeholder="Enter Page Link" name="link" value="%link%" required="">
            <label><h4>*Status:</h4></label><br>
            <input type="radio" name="status" value="a" checked="">
            <label>Active</label><br> 
            <input type="radio" name="status" value="d">
            <label>Disactive</label>
            <input type="hidden" name="page_id" value="%id%">
            <input type="submit" value="Submit" name="updatepagedetails" id="updatepagedetails">
          </form>
        </div>
      </div>
    </div>

  </div>
</div>