
    <!--=========== BEGIN FOOTER SECTION ================-->
    <footer>
    <div class="footer">
    <div class="container">
      <div class="footer-info">
        <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".5s">
          <h4 class="footer-logo"><a href="{SITE_URL}"> %sitename1% <b>%sitename2%</b> <span class="tag">%tagline%</span> </a></h4>
          <p>© %copyrights% | Design by <a href="http://w3layouts.com" target="_blank">K & J Patners</a></p>
        </div>
        <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".7s">
          <h3>Popular</h3>
          <ul>
            <li><a href="{SITE_MOD}aboutus-nct/">About Us</a></li>
            <li><a href="javascript:void0(<?php echo $retVal = (isset($_SESSION['userid'])) ? 1 : 0 ; ?>)">Be A Seller</a></li>
            <li><a href="{SITE_MOD}contactus-nct/">Contact Us</a></li>
            <li><a href="{SITE_MOD}faq-nct/">FAQ</a></li>
            <li><a href="{SITE_MOD}privacypolicy-nct/">Privacy Policy</a></li>
            <li><a href="{SITE_MOD}t&c-nct/">T & C</a></li>

            <?php 
                $conn = mysqli_connect("localhost","root","","markethub");
                // $conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
                
                $sql = "SELECT * FROM tbl_static_pages WHERE status='a'";
                $exe = mysqli_query($conn,$sql);

                while($rows = mysqli_fetch_assoc($exe)){
                    echo "<li><a href=".$rows['page_link'].">".$rows['page_title']."</a><li>";
                }
            ?>
          </ul>
        </div>
        <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".9s">
          <h3>Subscribe</h3>
          <p>Sign Up Now For More Information <br> About Our Company </p>
          <form>
            <input type="text" placeholder="Enter Your Email" required="">
            <input type="submit" value="Go">
          </form>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  </footer>
    <!--=========== END FOOTER SECTION ================--> 



<!-- this is for the single page view -->
<link rel="stylesheet" href="{SITE_CSS}notification.css" type="text/css" media="screen" />

<script type="text/javascript">
  function void0(argument) {
    if (argument > 0) {
      window.location.href='{SITE_MOD}addproduct-nct/';
    }
    else
    {
      toastrAlert('error','You Must Required signin.!!!!');
    }
  }
</script>