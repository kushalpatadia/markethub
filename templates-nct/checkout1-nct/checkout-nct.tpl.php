<!-- breadcrumbs-->
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="{SITE_URL}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li class="active">Checkout</li>
		</ol>
	</div>
</div>
<div class="container">
<br>
</div>
<!--//breadcrumbs-->
<body>
<!-- show shipping details !-->
<div class="container">
<div class="row"><br></div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">


<!--collapse-tabs-->
<div class="collpse tabs" id="deletebyajax">
	<div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default wow fadeInUp animated" data-wow-delay=".5s">
			<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					  1. Login ID
					</a>
				</h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
					<center><h3><label>Email id:</label><?php echo $_SESSION['login_user']; ?></h3></center>
				</div>
			</div>
		</div>
		<div class="panel panel-default wow fadeInUp animated" data-wow-delay=".6s">
			<div class="panel-heading" role="tab" id="headingTwo">
				<h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					   2. Delivery Address
					</a>
				</h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				<div class="panel-body">
					<script>
					    function getRadioValue(id) {
					    var radioBtn = document.getElementById(id);
					    toastrAlert('success','Address is Selected');	
					    document.getElementById('hiddenvariable').value = radioBtn.value;
					    document.getElementById('hiddenvariable2').value = radioBtn.value;
					    }  
					    </script>
					%SHIPPING%
					<!-- add address -->
          			<center>
          				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Address</button>
          			</center>


				</div>
			</div>
		</div>
		<div class="panel panel-default wow fadeInUp animated" data-wow-delay=".7s">
			<div class="panel-heading" role="tab" id="headingThree">
				<h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						3. Order Summary
					</a>
				</h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
				<div class="panel-body">
				<div style="overflow-x:auto;">
					<table class="table" border="1">
						<tr>
							<td><b>Product Image</b></td>
							<td><b>Title</b></td>
							<td><b>Delivery Charge</b></td>
							<td><b>Product Price</b></td>
							<td><b>Quantity</b></td>
							<td><b>Total Price</b></td>
						</tr>
							%CART%
						<tr>
							<td colspan="3">Total Price:</td>
							<td></td>
							<td></td>
							<td>&#x20B9;%tprice%</td>
						</tr>
					</table>
				</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default wow fadeInUp animated" data-wow-delay=".8s">
			<div class="panel-heading" role="tab" id="headingFour">
				<h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
						4. Payment
					</a>
				</h4>
			</div>
			<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
				<div class="panel-body">
					<center>
					<h4><label>Select Payment Mode</label></h4></center>

					<div>
						<div class="col-md-6">
							<input type="radio" name="paymentmode" value="atm" onclick="getRadioValue1('atm')" id="atm">Paypal
						</div>
						<div class="col-md-6">
							<input type="radio" name="paymentmode" value="cash" onclick="getRadioValue1('cash')" id="cash">Cash On Deliver
						</div>
					</div>
					<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
						<!-- <input type="hidden" name="hiddenvariable2" id="hiddenvariable2" value="2" required=""> -->
						<input type="hidden" name="business" value="kushalpatadia-facilitator@gmail.com">
						<input type="hidden" name="cmd" value="_cart">

						<input type="hidden" name="upload" value="1">
						<input type="hidden" name="currency_code" value="USD">

							%PAYMENT FORM%
					
						<!-- Enable override of buyers's address stored with PayPal . -->
						  <input type="hidden" name="address_override" value="1">
						  <!-- Set variables that override the address stored with PayPal. -->
						  <input type="hidden" name="first_name" value="%name%">
						  <!-- <input type="hidden" name="last_name" value="Parmar"> -->
						  <input type="hidden" name="address1" value="%addline1%">
						  <input type="hidden" name="address2" value="%addline2%">
						  <input type="hidden" name="city" value="%city%">
						  <input type="hidden" name="state" value="%state%">
						  <input type="hidden" name="zip" value="%pincode%">
						  <input type="hidden" name="country" value="IN">

						<input type="hidden" name="notify_url" value="{SITE_MOD}payment-nct/">
						<input type="hidden" name="return" value="{SITE_MOD}payment-nct/">

						<center>
						<!-- <button type="submit" name="submit" class="btn btn-primary" alt="Make payments with PayPal - it's fast, free and secure!" onclick="myFunction()" id="paynow1">Buy Now from Paypal</button> -->
						<button type="submit" name="submit" class="btn btn-primary" alt="Make payments with PayPal - it's fast, free and secure!" id="paynow1">Buy Now from Paypal</button><br>
						</center>
					</form>
					<form name="bycashform" method="POST" action="">
						<input type="hidden" name="hiddenvariable" id="hiddenvariable" value="" required="">
						<center>
							<button type="submit" name="bycash" class="btn btn-primary" id="paynow2">Cash On delivery</button>
						</center>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!--//collapse -->

</div><!-- this is for the div of col-12 -->
</div><!-- this is for container -->

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><center>Enter Shipping Address</center></h4>
			</div>
			<div class="modal-body">
				<fieldset>
				<form action="" id="form" method="POST">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">
							<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
							</span>
							<input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="name" id="fname" required="">
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon2">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
							</span>
							<input type="email" class="form-control" placeholder="Email Address" aria-describedby="basic-addon2" name="email" id="email" required="">
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
							</span>
							<input type="text" class="form-control" placeholder="Block Number & Appartment/Building" aria-describedby="basic-addon3" name="addline1" id="addline1" required="">
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon4">
							<span class="glyphicon glyphicon-road" aria-hidden="true"></span>
							</span>
							<input type="text" class="form-control" placeholder="Street Name/Near Landmarks" aria-describedby="basic-addon4" name="addline2" id="addline2" required="">
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon5">
							<span aria-hidden="true"><b>A</b></span>
							</span>
							<input type="text" class="form-control" placeholder="Area" aria-describedby="basic-addon5" name="area" id="area" required="">
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon6">
							<span aria-hidden="true"><b>C</b></span>
							</span>
							<input type="text" class="form-control" placeholder="City" aria-describedby="basic-addon6" name="city" id="addline1" required="">
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon7">
							<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
							</span>
							<input type="text" class="form-control" aria-describedby="basic-addon7" placeholder="Pincode" name="pincode" required="">
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon8">
							<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
							</span>
							<input type="text" class="form-control" aria-describedby="basic-addon8" placeholder="State" name="state" required="">
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon9">
							<span class="glyphicon glyphicon-flag" aria-hidden="true"></span>
							</span>
							<input type="text" class="form-control" placeholder="Country" aria-describedby="basic-addon9" name="country" id="country" required="">
						</div>
					</div>


					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon10">
							<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>
							</span>
							<input type="text" class="form-control" placeholder="Mobile Number" name="phone_no" aria-describedby="basic-addon10" required="">
						</div>
					</div>

					<center>
						<button type="submit" class="btn btn-default btn-info" value="Register" name="sbtdetails" id="sbtdetails">Register</button>
					</center>
				</form>
				</fieldset>    
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div> <!--// end add address -->

%SHIPPINGMODEL%





</div>

<!--//cart-items-->	

</body>


<script>
function getRadioValue1(id) {
var radioBtnpayment = document.getElementById(id);
var output = radioBtnpayment.value;
if ( output == 'atm')
{
	var addvalue = $('#hiddenvariable2').val();
	if (addvalue == '') {
		//alert('address is not selected');
		//swal("Address is not selected");	
	}
	else
	{
		$('#paynow1').show();		
	}
$('#paynow2').hide();
}
else if( output == 'cash')
{
$('#paynow2').show();
$('#paynow1').hide();
}
else
{
$('#paynow1').hide();
$('#paynow2').hide();
}
}  
</script>
<!-- <script type="text/javascript">
    jQuery(document).ready(function($) {
    $(document).keydown(function(event){
    if(event.keyCode==123){
        return false;
       }
    else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
          return false;  //Prevent from ctrl+shift+i
       }
    else if(event.shiftKey && event.keyCode==123){        
          return false;  //Prevent from shift+i
       }
    });
    $(document).on("contextmenu",function(e){        
       e.preventDefault();
    });
</script> 