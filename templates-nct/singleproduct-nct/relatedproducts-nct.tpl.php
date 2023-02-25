<div class="col-sm-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay=".%time%s">
	<div class="new-top">
		<center><a href="%quickviewlink%"><img src="%imglink%" class="img-responsive my-img-class" alt=""/></a></center>
		<div class="new-text">
			<ul>
				<li><a class="item_add" href="javascript:void(0)" onclick="addingcart('%addtocart%')"> Add to cart</a></li>
				<li><a href="%quickviewlink%">Quick View </a></li>
				<li><a href="javascript:void(0)" onclick="addingwish('%addtowishlist%')">Add to wishlist </a></li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="new-bottom">
			<h5><a class="name" href="%quickviewlink%" onmouseover="showTitle('%id%','%title%')" onmouseout="hideTitle('%id%')">%title%</a></h5>
			<!-- <div class="rating">
				<span class="on">☆</span>
				<span class="on">☆</span>
				<span class="on">☆</span>
				<span class="on">☆</span>
				<span>☆</span>
			</div> -->	
			<div class="ofr">
				<!-- <p class="pric1"><del>&#x20B9;2000.00</del></p> -->
				<p>Price: <span class="item_price">&#x20B9;%price%</span></p>
			</div>
		</div>
	</div>
	<div id="%id%" style=""></div>
</div>