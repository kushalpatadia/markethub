<!--breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{SITE_URL}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Register</li>
            </ol>
        </div>
    </div>
    <!--//breadcrumbs-->
    <!--login-->
    <div class="login-page">
        <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
            <h3 class="title">Register<span> Form</span></h3>
        </div>
        <div class="widget-shadow">
            <div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
                <h4>Already have an Account ?<a href="{SITE_MOD}signin-nct/">  Sign In »</a> </h4>
            </div>
            <div class="login-body">
                <form class="wow fadeInUp animated" data-wow-delay=".7s" action="" method="POST" id="form">
                    <input type="text" placeholder="Username" name="name" required="">
                    <input type="text" class="email" placeholder="Email Address" name="email" required="">
                    <input type="password" name="password" class="lock" placeholder="Password" id="password" required="">
                    <input type="password" name="password2" placeholder="Reenter Password" id="password2" required="">
                    <input type="text" placeholder="Mobile Number" name="phone_no" required=""> 
                    <input type="submit" value="Register" name="sbtuser">
                </form>
            </div>
        </div>
    </div>
    <!--//login-->