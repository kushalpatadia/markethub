<!-- Modal -->
<div class="modal fade" id="myshippingaddress%id%" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><center>Edit Address</center></h4>
      </div>
      <div class="modal-body">
        <fieldset>
          <form action="" id="form" method="POST">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </span>
                <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="name" value="%name%" id="fname" required="">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">
                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                </span>
                <input type="email" class="form-control" placeholder="Email Address" aria-describedby="basic-addon2" name="email"  value="%email%" id="email" required="">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                </span>
                <input type="text" class="form-control" placeholder="Block Number & Appartment/Building" aria-describedby="basic-addon3" name="addline1" value="%addline1%" id="addline1" required="">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon4">
                <span class="glyphicon glyphicon-road" aria-hidden="true"></span>
                </span>
                <input type="text" class="form-control" placeholder="Street Name/Near Landmarks" aria-describedby="basic-addon4" name="addline2" value="%addline2%" id="addline2" required="">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon5">
                <span aria-hidden="true"><b>A</b></span>
                </span>
                <input type="text" class="form-control" placeholder="Area" aria-describedby="basic-addon5" name="area" 
                id="area" value="%area%" required="">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon6">
                <span aria-hidden="true"><b>C</b></span>
                </span>
                <input type="text" class="form-control" placeholder="City" aria-describedby="basic-addon6" name="city" 
                value="%city%" id="addline1" required="">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon7">
                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                </span>
                <input type="text" class="form-control" aria-describedby="basic-addon7" placeholder="Pincode" 
                name="pincode" value="%pincode%" required="">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon8">
                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                </span>
                <input type="text" class="form-control" aria-describedby="basic-addon8" placeholder="State" name="state" 
                value="%state%" required="">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon9">
                <span class="glyphicon glyphicon-flag" aria-hidden="true"></span>
                </span>
                <input type="text" class="form-control" placeholder="Country" aria-describedby="basic-addon9" name="country" id="country" value="%country%" required="">
              </div>
            </div>


            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon10">
                  <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>
                </span>
                <input type="text" class="form-control" placeholder="Mobile Number" name="phone_no" value="%mobileno%" aria-describedby="basic-addon10" required="">
              </div>
            </div>

            <input type="hidden" name="my_id" value="%id%" area-hidden="true">
            <center><button type="submit" class="btn btn-default btn-info" value="Register" name="editaddress" id="sbtdetails">Register</button></center>
          </form>
        </fieldset>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div><br><br>
<!--// end add address -->
