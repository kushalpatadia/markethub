<!--breadcrumbs-->
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="{SITE_URL}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li class="active">WishList</li>
		</ol>
	</div>
</div>
<div class="container" id="wish_count">
<br>
	<h3 class="wow fadeInUp animated" data-wow-delay=".5s" style="color: red">My WishList(%itemnumber%)</h3>
</div>
<!--//breadcrumbs-->
<div id="wish_details">
%WISHLIST%
</div>
<script type="text/javascript">
	function deletewish(argument) {
		var id = argument;
		$.ajax({
			type: "GET",
			url: "{SITE_MOD}delete-nct",
			data: "wishlistid=" + id,
			success: function(data) {
				toastrAlert('success',data);
				$('#wish_details').load(document.URL +  ' #wish_details');
				$('#wish_count').load(document.URL +  ' #wish_count');
			}
		});
	}
</script>