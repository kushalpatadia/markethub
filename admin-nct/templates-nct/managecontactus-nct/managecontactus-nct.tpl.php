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
        <li class="active"><a href="{SITE_ADM_MOD}managecontactus-nct"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Manage Contact Us</a></li>
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
              <center>Manage Users</center>
            </div>
            <div class="panel-body">
                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                  <thead>
                      <tr>
                          <th data-field="id" data-sortable="true">User ID</th>
                          <th data-field="mobileno" data-sortable="true">Email</th>
                          <th data-field="uname" data-sortable="true">Username</th>
                          <th data-field="email" data-sortable="true">Subject</th>
                          <th data-field="created_date" data-sortable="true">Message</th>
                          <th data-field="last_logintime" data-sortable="true">Reply Message</th>
                          <th data-field="last_updatetime" data-sortable="true">Created Date</th>
                          <th data-field="ipaddress" data-sortable="true">Ip Address</th>
                          <th>Reply</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
                 
                %USERS TABLE%
                 
                </table>
            </div>
        </div>
  </div>
</div><!--/.row-->  


