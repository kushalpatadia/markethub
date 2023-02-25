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
              <center>Manage Shipping</center>
            </div>
            <div class="panel-body">
                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                  <thead>
                      <tr>
                          <th data-field="id" data-sortable="true">ID</th>
                          <th data-field="id1" data-sortable="true">User ID</th>
                          <th data-field="uname" data-sortable="true">Username</th>
                          <th data-field="email" data-sortable="true">Email</th>
                          <th data-field="mobileno" data-sortable="true">Address</th>
                          <th data-field="created_date" data-sortable="true">Pincode</th>
                          <th data-field="last_logintime" data-sortable="true">Mobilenumber</th>
                      </tr>
                  </thead>
                 
                %SHIPPING TABLE%
                 
                </table>
            </div>
        </div>
  </div>
</div><!--/.row-->  


