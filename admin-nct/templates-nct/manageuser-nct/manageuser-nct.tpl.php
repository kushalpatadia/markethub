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
              <center>Manage Users</center>
            </div>
            <div class="panel-body">
                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                  <thead>
                      <tr>
                          <th data-field="id" data-sortable="true">User ID</th>
                          <th data-field="active/disactive" data-sortable="true">Status</th>
                          <th data-field="uname" data-sortable="true">Username</th>
                          <th data-field="email" data-sortable="true">Email</th>
                          <th data-field="mobileno" data-sortable="true">Mobilenumber</th>
                          <th data-field="created_date" data-sortable="true">Created Date</th>
                          <th data-field="last_logintime" data-sortable="true">Last Login</th>
                          <th data-field="last_updatetime" data-sortable="true">Last Update</th>
                          <th data-field="ipaddress" data-sortable="true">Ip Address</th>
                         <!--  <th data-field="oauth_provider" data-sortable="true">Oauth Provider</th>
                          <th data-field="oauth_uid" data-sortable="true">Oauth Id</th> -->
                          <th>Update</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
                 
                %USERS TABLE%
                 
                </table>
            </div>
        </div>
  </div>
</div><!--/.row-->  
<div class="container">
  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


