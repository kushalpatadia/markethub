<body>
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="{SITE_URL}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Products</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--products-->
	<div class="products">	 
		<div class="container">
			<div class="col-md-9 product-model-sec">
				<?php
				if(isset($_POST['minprice']) && isset($_POST['maxprice']) && !empty($_POST['minprice']) && !empty($_POST['maxprice'])){ 
				echo "<center><h2>Price:  %RANGE%</h2><br/></center>";
				}
				?>
				%PRODUCTS%
			</div>
			<div class="col-md-3 rsidebar">
				<div class="rsidebar-top">
					<div class="slider-left">
						<form action="" method="POST">
						<div><h2><b style="color: #ff5a10;">Filter:</b></h2></div>
						<br><br>
						<div class="clearfix"></div>
						<div>
							<h3>Price</h3>
                        	<select name="minprice" >
                            	<option value="1">Min</option>
	                            <option value="250">250</option>
	                            <option value="500">500</option>
	                            <option value="1000">1000</option>
	                            <option value="2000">2000</option>
	                            <option value="5000">5000</option>
	                            <option value="10000">10000</option>
	                            <option value="18000">18000</option>
	                            <option value="25000">25000</option>
	                            <option value="30000">30000</option>
                        	</select>
                        	to
                        	<select name="maxprice">
                        		<option value="">Max</option>
	                            <option value="500">500</option>
	                            <option value="1000">1000</option>
	                            <option value="2000">2000</option>
	                            <option value="5000">5000</option>
	                            <option value="10000">10000</option>
	                            <option value="18000">18000</option>
	                            <option value="25000">25000</option>
	                            <option value="50000">50000</option>
	                            <option value="200000">200000+</option>
                        	</select>
						</div>
						<br>
						<div class="clearfix"></div>

						<div>
							<h3>Category</h3>
                        	<select class="form-control" name="category">
                            	<option value="">others</option>
	                            <option value="Electronics">Electronics</option>
	                            <option value="Men">Men</option>
	                            <option value="Women">Women</option>
	                            <option value="Kids">Kids</option>
                        	</select>
						</div>
						<br>
						<div class="clearfix"></div>
						<div>
							<h3>Sub-Catagory</h3>
	                        <select name="subcategory" class="form-control" id="mySelect" onchange="changeBrand()">
	                            <option value="">Others</option>
	                            <option value="Mobiles">Mobiles</option>
	                            <option value="Laptops">Laptops</option>
	                            <option value="Headphones">Headphones</option>
	                            <option value="Power Banks">Power Banks</option>
	                            <option value="Chargers">Chargers</option>
	                            <option value="Memory Cards">Memory Cards</option>
	                            <option value="Pendrives">Pendrives</option>
	                            <option value="Screenguards">Screenguards</option>
	                            <option value="Hard Disk">Hard Disk</option>
	                            <option value="Mouse">Mouse</option>
	                            <option value="Monitor">Monitor</option>
	                            <option value="Keyboards">Keyboards</option>
	                        </select>
							<script type="text/javascript"> 
							function changeBrand() {
								$('#mobiles').hide();
								$('#laptops').hide();	
							    var x = document.getElementById("mySelect").value;
							    if(x == "Mobiles"){
							    	$('#mobiles').show();
							    }
							    if(x == "Laptops"){
									$('#laptops').show();							    	
							    }
							    document.getElementById("demo").innerHTML = "You selected: " + x;
							}
							</script>

						</div>
						<br>
						<div class="clearfix"></div>
						<div id="mobiles">
							<h3>Brand</h3>
							<input type="search" name="search"/><br>
							<input name="mobile[Samsung]" type="checkbox" value="1">Samsung<br>
							<input name="mobile[MI]" type="checkbox" value="1">MI<br>
							<input name="mobile[Sony]" type="checkbox" value="1">Sony<br>
							<input name="mobile[Micromax]" type="checkbox" value="1">Micromax<br>
						</div>
						<div id="laptops">
							<h3>Brand</h3>
							<input type="search" name="search"/><br>
							<input name="mobile[HP]" type="checkbox" value="1">HP<br>
							<input name="mobile[Dell]" type="checkbox" value="1">Dell<br>
							<input name="mobile[Lenovo]" type="checkbox" value="1">Lenovo<br>
							<input name="mobile[Micromax]" type="checkbox" value="1">Micromax<br>
							<input name="mobile[Apple]" type="checkbox" value="1">Apple<br>
							<input name="mobile[Acer]" type="checkbox" value="1">Acer<br>
						</div>
						<br>
						<input type="submit" name="submitrange" class="btn btn-primary btn-block">
						<br>

						<div class="clearfix"></div>
						<div><h2><b style="color: #ff5a10;">Sorting</b></h2></div>
						<br>
						<div class="clearfix"></div>
						<button type="submit" name="submitdesc" value="Descending By Price" class="btn btn-block btn-success">Descending By Price</button>
						<br>
						<button type="submit" name="submitasc" value="Ascending By Price" class="btn btn-block btn-success">Ascending By Price</button>
						<br><br>
						</form>
					</div>
								 
				</div>
				<div class="gallery-grid ">
					<h6>YOU MAY ALSO LIKE</h6>
					<a href="single.tpl.php"><img src="images/b1.png" class="img-responsive" alt=""/></a>
					<div class="gallery-text simpleCart_shelfItem">
						<h5><a class="name" href="single.tpl.php">Full Sleeves Romper</a></h5>
						<p><span class="item_price">60$</span></p>
						<h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
						<ul>
							<li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
							<li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
							<li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<center>
			<?php
			if(!isset($_POST['submitrange'])){
				$check = $_SESSION['pagenumbers'];
				for($j=1;$j<=$check;$j++){
					echo "<a href='../products-nct/?page=$j'> <button>$j</button></a>";
				}
			}
			?>
			
		</center>
	</div>
	<br><br>
	<!--//products-->	
</body>
