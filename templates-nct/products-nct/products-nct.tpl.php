<script type="text/javascript">
	  function addcompare(){
	    toastrAlert('success','Added to Compare');
	  }
      function compare(){
			var inputElements = document.getElementsByClassName('messageCheckbox');
			    var checkedValue=[];
			    for(var i=0; inputElements[i]; ++i){
			       console.log(inputElements[i]);
			       if(inputElements[i].checked){
			           checkedValue.push(inputElements[i].value);
			       }
			    }
			//alert(checkedValue);
			if(checkedValue[0] == null || checkedValue[1] == null){
				toastrAlert('error','Must Required Two Products For Comparison');
			}
			else
			{
				window.location.href='../../modules-nct/compare-nct/?compareid1='+checkedValue[0]+'&compareid2='+checkedValue[1];
			}
			
		}
</script>
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
				<?php/*
				if (isset($_POST['minprice']) && !empty($_POST['minprice']) && isset($_POST['maxprice']) && !empty($_POST['maxprice']))
				{
				echo "<center><h2>Price:  %RANGE%</h2><br/></center>";
				}*/
				?>
				<div id="ajax">
					%PRODUCTS%
				</div>			
			</div>
			<div class="col-md-3 rsidebar" id="right">
				<div class="rsidebar-top">
					<div class="slider-left">
						<form action="" method="POST" id="filter">
						<div><h2><b style="color: #ff5a10;">Filter:</b></h2></div>
						<br><br>
						<div class="clearfix"></div>
						<div>
							<h3>Price</h3>
                        	<select name="minprice" id="minprice">
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
                        	<select name="maxprice" id="maxprice">
                        		<option value="10000000">Max</option>
	                            <option value="500">500</option>
	                            <option value="1000">1000</option>
	                            <option value="2000">2000</option>
	                            <option value="5000">5000</option>
	                            <option value="10000">10000</option>
	                            <option value="18000">18000</option>
	                            <option value="25000">25000</option>
	                            <option value="10000000">30000+</option>
                        	</select>
						</div>
						<br>
						<div class="clearfix"></div>

						<div>
							<h3>Category</h3>
                        	<select class="form-control" name="category" id="category">
                            	<option value="0">Select Category</option>
                        		%category%
                        	</select>
						</div>
						<br>
						<div class="clearfix"></div>
						<div>
							<h3>Sub-Category</h3>
	                        <select name="subcategory" class="form-control" id="subcategory">
	                            <option value="0">Select Category first</option>
	                        </select>
						</div>
						<br>
						<div class="clearfix"></div>
						<div id="brand"">
						</div>
<!-- 						<div>
							<input type="checkbox" name="brand" value="check1" checked>
  							<label for="ch1">Apply Filter</label>	
  						</div>						 -->
						<br>
						<div><h2><b style="color: #ff5a10;">Sorting</b></h2></div>
						<br>
						<div class="clearfix"></div>
						<input type="radio" name="sorting" value="ASC" id="sorting" checked="">Ascending By Price
						<br>
						<input type="radio" name="sorting" value="DESC" id="sorting2">Descending By Price
						<br>
						<div class="clearfix"></div>
						<br>

						
						<br><br>
						<input type="submit" name="submitrange" value="APPLY" id="submitrange" class="btn btn-primary btn-block">
						<!-- <input type="button" value="AJAX CALL" onclick="ajaxFunction()" class="btn btn-danger btn-block"> -->
						<input type="button" value="COMPARE" onclick="compare()" class="btn btn-danger btn-block">
						</form>
						
						<!-- For Checking Results -->
						<p><tt id="results"></tt></p>
						<!-- end -->
					</div>
								 
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<center>
		%pagenumbers%
		</center>
	</div>
	<br><br>
	<!--//products-->	
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
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#category').on('change',function(){
          var categoryID = $(this).val();
          if(categoryID){
            $.ajax({
              type:'POST',
              url:'../../modules-nct/products-nct/ajaxData.php',
              data:'category_id='+categoryID,
              success:function(html){
                $('#subcategory').html(html);
              }
            }); 
          }else{
            $('#subcategory').html('<option value="">Select category first</option>');
          }
        });

        $('#subcategory').on('change',function(){
          var subcategoryID = $(this).val();
          if(subcategoryID){
            $.ajax({
              type:'POST',
              url:'../../modules-nct/products-nct/ajaxData.php',
              data:'subcategory_id='+subcategoryID,
              success:function(html){
                $('#brand').html(html);
              }
            }); 
          }else{
          }
        });
      });
    </script>
