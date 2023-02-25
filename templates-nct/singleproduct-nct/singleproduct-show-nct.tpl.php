<div class="single-info">		
	<div class="col-md-6 single-top wow fadeInLeft animated" data-wow-delay=".5s">	
		<div class="flexslider">
			<ul class="slides">
				<li data-thumb="%image1%">
					<div class="thumb-image"> <img src="%image1%" data-imagezoom="true" class="img-responsive my-img-class" alt="" style="width: auto;"> </div>
				</li>
				<li data-thumb="%image2%">
					 <div class="thumb-image"> <img src="%image2%" data-imagezoom="true" class="img-responsive my-img-class" alt="" style="width: auto;"> </div>
				</li>
				<li data-thumb="%image3%">
				   <div class="thumb-image"> <img src="%image3%" data-imagezoom="true" class="img-responsive my-img-class" alt="" style="width: auto;"> </div>
				</li> 
			</ul>
		</div>
	</div>
	<div class="col-md-6 single-top-left simpleCart_shelfItem wow fadeInRight animated" data-wow-delay=".5s" style="float:right;">
		<h3>%title%</h3>
		<!-- <div class="single-rating">
			<span class="starRating">
				<input id="rating5" type="radio" name="rating" value="5">
				<label for="rating5">5</label>
				<input id="rating4" type="radio" name="rating" value="4">
				<label for="rating4">4</label>
				<input id="rating3" type="radio" name="rating" value="3">
				<label for="rating3">3</label>
				<input id="rating2" type="radio" name="rating" value="2">
				<label for="rating2">2</label>
				<input id="rating1" type="radio" name="rating" value="1">
				<label for="rating1">1</label>
			</span>
			<p>%rating% out of 5</p>
			<a href="#">Add Your Review</a>
		</div> -->
		<h6 class="item_price">&#x20B9;%price%</h6>			
		<p>%description%</p>
		<ul class="size">
			<h4>Size</h4>
			<li>%size%</li>
			<?php 
			/*
			<li><a href="#">6-12 M</a></li>
			<li><a href="#">1-2 Y</a></li>
			<li><a href="#">2-3 Y</a></li>
			<li><a href="#">3-4 Y</a></li>
			*/
			?>
		</ul>
		<ul class="color">
			<h4>Color</h4>
			<li onmouseover="showColor()" onmouseout="hideColor()" style="%Wback%"><a style="background-color: %color%;"></a><p id="colorname" style="color: %color%;%Wback%"></p></li>
			<!-- <li><a href="#" class="red" style="background-color: white;"></a></li>
			<li><a href="#" class="green"></a></li>
			<li><a href="#" class="pink"></a></li> -->
		</ul>
		<div class="clearfix"> </div>
		<div class="quantity">
			<div class=""><h3 style="color: red;">%availability%</h3></div>
			<!-- <p class="qty"> Qty :  </p><input min="1" type="number" value="1" class="item_quantity"> -->
		</div>
		<div class="btn_form">
			<a href="javascript:void(0)" onclick="addingcart('%addtocart%')" class="add-cart item_add">ADD TO CART</a>
			<a href="javascript:void(0)" onclick="addingwish('%addtowishlist%')" class="add-cart item_add">ADD TO WISHLIST</a>
		</div>
	</div>
   <div class="clearfix"> </div>
</div>
<!--collapse-tabs-->
<div class="collpse tabs">
	<div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default wow fadeInUp animated" data-wow-delay=".5s">
			<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					  Specification
					</a>
				</h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
					%specification%
				</div>
			</div>
		</div>
		<div class="panel panel-default wow fadeInUp animated" data-wow-delay=".6s">
			<div class="panel-heading" role="tab" id="headingTwo">
				<h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					   additional information
					</a>
				</h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				<div class="panel-body">
					%additionalinfo%
				</div>
			</div>
		</div>
		<div class="panel panel-default wow fadeInUp animated" data-wow-delay=".8s">
			<div class="panel-heading" role="tab" id="headingFour">
				<h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
						help
					</a>
				</h4>
			</div>
			<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
				<div class="panel-body">
					Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				</div>
			</div>
		</div>
	</div>
</div>
<!--//collapse -->
<script type="text/javascript">
	function showTitle(argument,argument2) {
		var id = '#'+argument;
		var title = argument2;
		$(id).html(title);
	}
	function hideTitle(argument) {
		var id = '#'+argument;
		$(id).html(null);
	}
	function showColor() {
		var colorname = '%color%';
		$('#colorname').html(colorname);
	}
	function hideColor() {
		var colorname = null;
		$('#colorname').html(colorname);
	}
</script>
