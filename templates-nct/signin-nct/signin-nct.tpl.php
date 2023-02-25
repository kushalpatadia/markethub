<!--breadcrumbs-->
	<div class="breadcrumbs">
			<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow fadeInUp" data-wow-delay=".5s">
				<li><a href="{SITE_URL}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Sign In</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--login-->
	<div class="login-page">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title">SignIn<span> Form</span></h3>
		</div>
		<script type="text/javascript" src="../modules-nct/siginin-nct/"></script>
		<div class="widget-shadow">
			<div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
				<h4>Welcome back to Market Hub ! <br> Not a Member? <a href="{SITE_MOD}registration-nct/">  Register Now »</a> </h4>
			</div>
			<center><span style="color:red"><?php //echo $error; ?></span></center>
			<div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
				<form name="signin-form" method="post" id="form" class="center_div" action="">
					<input type="text" class="user" placeholder="Enter your email" name="email" required="">
					<input type="password" class="lock" placeholder="Password" name="password" required="">
					<input type="submit" name="sbtsignin" value="Sign In" id="submit">
					<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
						<div class="forgot">
							<a href="{SITE_MOD}forgotpassword-nct/">Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>
		</div>
		<div class="login-page-bottom">
			<h5> - OR -</h5>
			%facebook%
			%google%
		</div>
	</div>
	<!--//login-->
<?php 
	// if (isset($_POST['sbtsignin'])) {
	// 	echo("<script>$(document).ready(function () { $('body').overhang({type : '%TYP%',message: '%MSG%'});});</script>");
	// }
?>
<!-- <script>$(document).ready(function () { $('body').overhang({type : '%TYP%',message: '%MSG%'});});</script> -->

