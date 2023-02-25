    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->

      <!-- BEGIN MENU -->
<style type="text/css">
.droping-font
{
  size: small;
}
</style>
<header>
<div class="header">
    <div class="top-header navbar navbar-default"><!--header-one-->
      <div class="container">
        <div class="nav navbar-nav navbar social-icons wow fadeInRight animated" data-wow-delay=".5s">
          <ul>
            <li><a href="%fblink%" target="_blank"> </a></li>
            <li><a href="%pinlink%" class="pin" target="_blank"> </a></li>
            <li><a href="%linkedinlink%" class="in" target="_blank"> </a></li>
            <li><a href="%behancelink%" class="be" target="_blank"> </a></li>
            <li><a href="%youtubelink%" class="you" target="_blank"> </a></li>
            <li><a href="%vimeolink%" class="vimeo" target="_blank"> </a></li>
           </ul>
        </div>
        <div class="nav navbar-nav navbar-right wow fadeInLeft animated" data-wow-delay=".5s">
           
          <?php
           
          if(isset($_SESSION['login_user']))
          {
          //echo "<a href='{SITE_MOD}profile-nct/'><img src='{SITE_IMG}profile.jpg' style='height: 40px; width: 40px;'>&nbsp  ".$_SESSION['username']."</a>";
          echo "
          <p>
            <div class='dropdown' style='color : #ff5a10;'>
            Welcome to %sitename1% %sitename2% :
            <img src='{SITE_IMG}profile.jpg' style='height: 40px; width: 40px;'>&nbsp
            <button class='btn btn-default btn-xs dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            ".$_SESSION['username']."
            <span class='caret'></span></button>
            <ul class='dropdown-menu'>
              <li><a href='{SITE_MOD}profile-nct/'>Profile</a></li>
              <li><a href='{SITE_MOD}wishlist-nct/'>My Wishlist</a></li>
              <li><a href='{SITE_MOD}cart-nct/'>My Cart</a></li>
              <li><a href='{SITE_MOD}purchase-nct/'>My Order</a></li>
              <li><a href='{SITE_MOD}logout-nct/'>Logout</a></li>
            </ul>
            </div>
            </p>
          "; 
          //echo "<a href='{SITE_MOD}logout-nct/'>Logout</a>"; 
          }
          else
          {
          echo "<p>Welcome to %sitename1% %sitename2% :<a href='{SITE_MOD}registration-nct/'>Register </a> Or <a href='{SITE_MOD}signin-nct/'>Sign In </a></p>";
          }
          
          ?>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
    <div class="header-two navbar navbar-default" style="position: static;"><!--header-two-->
      <div class="container">
        <div class="nav navbar-nav header-two-left">
          <ul>
            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>%phoneno%</li>
            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:%email%">%email%</a></li>     
          </ul>
        </div>
        <div class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".7s">
          <h1><a href="{SITE_URL}"> %sitename1% <b>%sitename2%</b><span class="tag"> %tagline% </span> </a></h1>
        </div>
        <div class="nav navbar-nav navbar-right header-two-right">
          <div class="header-right my-account">
            <a href="{SITE_MOD}contactus-nct"><span class="glyphicon glyphicon-map-marker" aria-hidden="true" style="position: static;"></span> CONTACT US</a>            
          </div>
          <div class="header-right cart">
            <a><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
            <h4><p id="cart_price">
                <span class="simpleCart_total"> &#x20B9; %amount% </span> (%item%)
            </p></h4>
            <div class="cart-box">
              <p><a href="javascript:void1(<?php echo $retVal = (isset($_SESSION['userid'])) ? 1 : 0 ; ?>)">Go to cart</a></p>
              <div class="clearfix"> </div>
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
    <div class="top-nav navbar navbar-default"><!--header-three-->
      <div class="container">
        <nav class="navbar" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <!--navbar-header-->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
              <?php
              $conn = mysqli_connect("localhost","root","","markethub");
              // $conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
              $sql = "SELECT * FROM tbl_menubar WHERE status='a'";
              $exe = mysqli_query($conn,$sql);

              while($rows = mysqli_fetch_assoc($exe)){
                // print_r($rows);
                $items[] = $rows;
              }
              // print_r($items);
              $id = '';
              echo "<div class='container'>";
              echo "<div class='container'>";
              echo "<center>";
              echo "<ul class='multidrop'>";
              foreach ($items as $item) {
                  if($item['parent_id'] == 0){
                    echo "<a href=".$item['link']."><li>".$item['menu'];
                    $id = $item['id'];
                    sub($items,$id);
                    echo "</li>";
                  }
              }
              echo "</ul>";
              echo "</center>";
              if(isset($_SESSION['login_user']))
              {
                echo "
                <a id='dLabel' role='button' data-toggle='dropdown' data-target='#' href='#'>
                  <i class='glyphicon glyphicon-bell' style='margin-top: 1.5%;'></i>
                </a>
                
                <ul class='dropdown-menu notifications' role='menu' aria-labelledby='dLabel'>
                  
                  <div class='notification-heading'><center><h4 class='menu-title'>Notifications</h4></center>
                  </div>
                  <li class='divider'></li>
                 <div class='notifications-wrapper'>
                      %NOTIFICATION%
                 </div>
                </ul>
                ";
                }
              echo "</div>";
              echo "</div>";

              function sub($items,$id){
                echo "<ul>";
                foreach ($items as $item) {
                  if($item['parent_id'] == $id){
                    echo "<a href=".$item['link']."><li>".$item['menu'];
                    sub($items, $item['id']);
                    echo "</li>";
                  }
                }
                echo "</ul>";
              }
              ?>
            <!--//navbar-collapse-->
            <header class="cd-main-header">
              <ul class="cd-header-buttons">
                <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
              </ul> <!-- cd-header-buttons -->
            </header>
          
            <!--//navbar-header-->
            </nav>
            <div id="cd-search" class="cd-search">
              <form action="{SITE_MOD}search-nct/" method="post">
                <input type="text" placeholder="Search..." name="sstring">
                <input type="submit" name="search" value="search">
              </form>
            </div>
            </div>
          </header>
    <!--=========== END HEADER SECTION ================--> 

<script type="text/javascript">
  function void1(argument) {
    if (argument > 0) {
      window.location.href='{SITE_MOD}cart-nct/';
    }
    else
    {
      toastrAlert('error','You Must Required signin.!!!!');
    }
  }
</script>