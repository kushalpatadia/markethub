<?php
	// session_start();
?>
<!DOCTYPE html>
<div class="se-pre-con"></div>
	<!--//header-->

	<!--banner-->
	<div class="banner">
		<div class="container">
			<div class="banner-text">			
				<div class="col-sm-5 banner-left wow fadeInLeft animated" data-wow-delay=".5s">			
					<h2>On Entire Fashion range</h2>
					<h3>Coming Soon </h3>
					<h4>Our New Designs</h4>
					<div class="count main-row">
						<ul id="example">
							<li><span class="hours">00</span><p class="hours_text">Hours</p></li>
							<li><span class="minutes">00</span><p class="minutes_text">Minutes</p></li>
							<li><span class="seconds">00</span><p class="seconds_text">Seconds</p></li>
						</ul>
							<div class="clearfix"> </div>
							<script type="text/javascript" src="{SITE_CSS}js/jquery.countdown.min.js"></script>
					</div>

				</div>
				<div class="col-sm-7 banner-right wow fadeInRight animated" data-wow-delay=".5s">			
					<section class="slider grid">
						<div class="flexslider">
							<ul class="slides">
							%SLIDERUP%
							<?php
							/*
								<li>
									<h4>-30%</h4>
									<img src="{SITE_IMG}b1.png" alt="">
								</li>
								<li>
									<h4>-25%</h4>
									<img src="{SITE_IMG}b2.png" alt="">
								</li>
								<li>
									<h4>-32%</h4>
									<img src="{SITE_IMG}b3.png" alt="">
								</li> */
							?>
							</ul>
						</div>
					</section>
					<!--FlexSlider-->
					<script defer src="{SITE_CSS}js/jquery.flexslider.js"></script>
					<script type="text/javascript">
						$(window).load(function(){
						  $('.flexslider').flexslider({
							animation: "pagination",
							start: function(slider){
							  $('body').removeClass('loading');
							}
						  });
						});
					</script>
					<!--End-slider-script-->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>			
	<!--//banner-->
	<!--new-->
	<div class="new">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
				<h3 class="title">New <span>Arrivals</span></h3>
			</div>
			<div class="new-info">
				%new%
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>		
	<!--//new-->
	<!--gallery-->
	<div class="gallery">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
				<h3 class="title">Popular<span> Products</span></h3>
			</div>
			<div class="gallery-info">
				%POPULARPRODUCTS%
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//gallery-->
	<!--trend-->
	<div class="trend wow zoomIn animated" data-wow-delay=".5s">
		<div class="container">
			<div class="trend-info">
				<section class="slider grid">
					<div class="flexslider trend-slider">
						<ul class="slides">
							%SLIDERDOWN%
						</ul>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!--//trend-->
	<!--// footer -->
	<!--search jQuery-->
	<script src="{SITE_JS}js/main.js"></script>
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->
	<!-- <script type="text/javascript">
		$(document).ready(function() {
		
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script> -->
	<!--//smooth-scrolling-of-move-up-->
	<!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->
    <script src="{SITE_JS}js/bootstrap.js"></script>

<!-- Loader -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script type="text/javascript">
//paste this code under the head tag or in a separate js file.
// Wait for window load
$(window).load(function() {
  // Animate loader off screen
  $(".se-pre-con").fadeOut("slow");;
});
</script>
<!-- End Loader -->
