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
        <div class="panel panel-default">
            <div class="panel-heading">
                <center>Pay to Seller</center>
            </div>
            <div class="panel-body">
                    <center>
                        <form method="POST">
                           <select id="paypalemail" name="paypalemail">
                           <option value="0">Select Email Address *</option>
                                %paypalemail%
                           </select>
                           <select id="year" name="year">
                            <option value="0">Select Year *</option>
                           <?php
                                $current_year = date("Y");
                                for ($i=0; $i < 5; $i++) { 
                                    echo "<option value=$current_year>$current_year</option>";
                                    $current_year--;
                                }
                           ?>
                           </select>
                           <select id="month" name="month">
                           <option value="0">Select Month *</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                           </select>
                           <input type="submit" name="submitdetails" value="Apply">
                        </form>
                            LAST PAYMENT DATE: %last_payment%
                            %PAYNOW%
                </center>

                <br><br>
                <table data-toggle="table" data-url="tables/data1.json">
                <thead>
                    <tr>
                        <th data-field="orderid" data-sortable="true">Order Id</th>
                        <th data-field="sellername" data-sortable="true">Seller Email ID</th>
                        <th data-field="product" data-sortable="true">Product</th>
                        <th data-field="price" data-sortable="true">Price</th>
                        <th data-field="qty" data-sortable="true">Qty</th>
                        <th data-field="status" data-sortable="true">Status</th>
                        <th data-field="purchase_date" data-sortable="true">Purchase date</th>
                    </tr>
                </thead>
                
                    %ORDER TABLE%

            </table>
                <tbody id="response-div">
                </tbody>
        </div>
    </div>
</div>
<!--/.row-->  
</div>

<script type="text/javascript">
   function check() {
            var email = document.getElementById('paypalemail').value;
            var year = document.getElementById('year').value;
            var month = document.getElementById('month').value;
            $.ajax({
              type: "GET",
              url: "{SITE_ADM_MOD}payseller-nct/ajax1234.php",
              data: {paypalemail:email ,year:year ,month:month},
              success: function(responseText) {
                $("#response-div").html(responseText);
            }
            });
          }
</script>

