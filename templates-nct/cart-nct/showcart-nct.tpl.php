	<!--cart-items-->
	<div class="cart-items">
		<div class="container">
			<div class="cart-header wow fadeInUp animated" data-wow-delay=".5s">
				<a href="javascript:void(0)" onclick="deletecart('%dlink%')"><div class="alert-close"></div></a>
				<div class="cart-sec simpleCart_shelfItem">
					<div class="cart-item cyc">
						<a href="%link%"><img src="%image%" class="img-responsive" alt=""></a>
					</div>
					<div class="cart-item-info">
						<h4><a href="%link%">%title%</a></h4>
						<div class="delivery">
							<p>Price : &#x20B9;%price%</p>
							<div class="clearfix"></div>
						</div>	
						<div class="delivery">
							<div class="quantity">
							<p class="qty"> Qty :  </p><input min="1" max="%qty_available%" type="number" value="%qty%" class="item_quantity" name="%id%">
							</div>
						</div>
						<div class="delivery">
							<div><h3 style="color: red;">%availability%</h3></div>
						</div>
						<div class="delivery">
							<p>Color:</p>
							%color%
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>	
	<!--//cart-items-->	
