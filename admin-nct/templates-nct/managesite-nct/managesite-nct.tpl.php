<!-- sidebar -->
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search" action="{SITE_ADM_MOD}manageuserquery-nct/" method="GET">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search" name="orderno">
        </div>
    </form>
    <ul class="nav menu">
        %DYNAMIC-MENU%
    </ul>
</div>
<!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
      <div style="height:50px;"></div>
        <div class="panel panel-default">
            <div class="panel-heading">
              <center>Manage Site Settings</center>
            </div>
            <div class="panel-body">
                <div class="login-page" style="width: 70%">
                    <div class="widget-shadow">
                        <div class="login-body">
                            <form class="wow fadeInUp animated" data-wow-delay=".7s" action="" method="POST" id="form">
                                <center><h3>Home Page Details</h3></center><br>
                                <label><h4>*Site Name:</h4></label>
                                <input type="text" placeholder="Enter Site Name" name="sitename" value="%sitename%" required="">
                                <label><h4>*Site Tagline:</h4></label>
                                <input type="text" placeholder="Enter Site Tag line" name="tagline" value="%tagline%" required="">
                                <label><h4>*Email:</h4></label>
                                <input type="text" placeholder="Enter Email Id" name="email" value="%email%" required="">
                                <label><h4>*Phone number:</h4></label>
                                <input type="text" placeholder="Enter Phone number" name="phoneno" value="%phoneno%" required="">
                                <label><h4>*Facebook Link:</h4></label>
                                <input type="text" placeholder="Facebook Link" name="fblink" value="%fblink%" required="">
                                <label><h4>*Pineterest Link:</h4></label>
                                <input type="text" placeholder="Pineterest Link" name="pinlink" value='%pinlink%' required="">
                                <label><h4>*Linkedin Link:</h4></label>
                                <input type="text" placeholder="Linkedin Link" name="linkedinlink" value='%linkedinlink%' required="">
                                <label><h4>*Behance Link:</h4></label>
                                <input type="text" placeholder="Behance Link" name="behancelink" value='%behancelink%' required="">
                                <label><h4>*Youtube Link:</h4></label>
                                <input type="text" placeholder="Youtube Link" name="youtubelink" value='%youtubelink%' required="">
                                <label><h4>*Vimeo Link:</h4></label>
                                <input type="text" placeholder="Vimeo Link" name="vimeolink" value='%vimeolink%' required="">
                                <center><h3>Contact us Page Details</h3></center><br>
                                  <label><h4>*Map Link:</h4></label>
                                <textarea rows="5" name="map" style="width:100%;" placeholder="Enter Your Address" required="">%map%</textarea>
                                <label><h4>*Address:</h4></label>
                                <textarea rows="3" name="address" style="width:100%;" placeholder="Enter Your Address" required="">%address%</textarea>
                                <label><h4>*Office Number:</h4></label>
                                <input type="text" placeholder="Enter Your Officenumber" name="officeno" value='%officeno%' required="">
                                <label><h4>*Mobile Number:</h4></label>
                                <input type="text" placeholder="Enter Your Mobilenumber" name="mobno" value='%mobno%' required="">
                                <label><h4>*(1)Email Address:</h4></label>
                                <input type="text" placeholder="Enter Your Email Address" name="email1" value='%email1%' required="">
                                <label><h4>*(2)Email Address:</h4></label>
                                <input type="text" placeholder="Enter Your Email Address" name="email2" value='%email2%' required="">
                                <label><h4>*Copy Rights:</h4></label>
                                <input type="text" placeholder="Copy Rights" name="copyrights" value='%copyrights%' required="">
                                <input type="submit" value="Submit" name="sbtsitedetails" id="sbtsitedetails">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div><!--/.row-->  


