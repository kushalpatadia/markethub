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
                    <div align='center'>
                        Manage Seller Products
                    </div>
                </div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">Product ID</th>
                                <th>Approve/Disapprove</th>
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
                            </tr>
                        </thead>
                 
                   %PRODUCTS TABLE%
                 
                </table>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>  