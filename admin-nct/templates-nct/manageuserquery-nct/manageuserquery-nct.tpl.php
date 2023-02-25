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
        <div><h2><center>ORDER NO: %ORDER-NO%</center></h2><br></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <center>Products Details</center>
            </div>
            <div class="panel-body">
                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="id" data-sortable="true">Product ID</th>
                            <th data-field="title" data-sortable="true">Title</th>
                            <th data-field="category" data-sortable="true">Category</th>
                            <th data-field="subcategory" data-sortable="true">Subcategory</th>
                            <th data-field="brand" data-sortable="true">Brand</th>
                            <th data-field="price" data-sortable="true">Price</th>
                            <th data-field="qty_avilable" data-sortable="true">Qty</th>
                            <th data-field="size" data-sortable="true">Size</th>
                            <th data-field="color" data-sortable="true">Color</th>
                            <th data-field="shortdiscription" data-sortable="true">ShortDescription</th>
                            <th data-field="specification" data-sortable="true">Specification</th>
                            <th data-field="additionalinfo" data-sortable="true">Additional Info</th>
                        </tr>
                    </thead>
             
                    %PRODUCTS TABLE%
               </table>
        </div>
    </div><!-- panel for products -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <center>Shipping details</center>
        </div>
        <div class="panel-body">
            <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                <thead>
                    <tr>
                        <th data-field="Username" data-sortable="true">Username</th>
                        <th data-field="Email" data-sortable="true">email</th>
                        <th data-field="Address" data-sortable="true">Address</th>
                        <th data-field="Pincode" data-sortable="true">Pincode</th>
                        <th data-field="State" data-sortable="true">State</th>
                        <th data-field="Country" data-sortable="true">Country</th>
                        <th data-field="Mobile No" data-sortable="true">mobileno</th>
                    </tr>
                </thead>
             
               %ORDER TABLE%
             
            </table>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <center>User Details</center>
        </div>
        <div class="panel-body">
            <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                <thead>
                    <tr>
                        <th data-field="id" data-sortable="true">User ID</th>
                        <th data-field="uname" data-sortable="true">Username</th>
                        <th data-field="email" data-sortable="true">Email</th>
                        <th data-field="mobileno" data-sortable="true">Mobilenumber</th>
                        <th data-field="created_date" data-sortable="true">Created Date</th>
                        <th data-field="last_logintime" data-sortable="true">Last Login</th>
                        <th data-field="ipaddress" data-sortable="true">Ip Address</th>
                        <th data-field="status" data-sortable="true">Status</th>
                        <th data-field="oauth_provider" data-sortable="true">Oauth Provider</th>
                        <!-- <th data-field="oauth_uid" data-sortable="true">Oauth Id</th> -->
                    </tr>
                </thead>

            %USERS TABLE%

            </table>
        </div>
    </div>

</div><!-- /row -->