<!--breadcrumbs-->
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="{SITE_URL}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li class="active">Cart</li>
		</ol>
	</div>
</div>
<div class="container" id="cart_count">
<br>
<h3 class="wow fadeInUp animated" data-wow-delay=".5s" style="color: red">My Shopping Cart(%itemnumber%)</h3>
</div>
<!--//breadcrumbs-->
<form method="POST">
<div id="cart_details">
%CART%
</div>
<!-- <center>
<button class='btn-success btn-lg' type="submit" name="sbtorder">Place Order</button></center><br> -->
</form>
<script type="text/javascript">
	function deletecart(argument) {
		var id = argument;
		$.ajax({
			type: "GET",
			url: "{SITE_MOD}delete-nct",
			data: "cartid=" + id,
			success: function(data) {
				//alert(data);
				toastrAlert('success',data)
				$('#cart_price').load(document.URL +  ' #cart_price');
				$('#cart_details').load(document.URL +  ' #cart_details');
				$('#cart_count').load(document.URL +  ' #cart_count');
			}
		});
	}
</script>