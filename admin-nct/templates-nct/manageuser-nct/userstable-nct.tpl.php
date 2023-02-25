 <tr>
    <td>%uid%</td>
    <td><center>
        <label class="switch">
        <input type="checkbox" name="selector" onclick="changeUserStatus(%uid%);" %checking%>
        <div class="slider round"></div>
        </label></center>
    </td>
    <td>%username%</td>
    <td>%email%</td>
    <td>%mobileno%</td>
    <td>%createddate%</td>
    <td>%lastlogin%</td>
    <td>%lastupdate%</td>
    <td>%ipaddress%</td>
    <!-- <td>%oauthprovider%</td>
    <td>%oauthid%</td> -->
    <td><a class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal%uid%">Update</a></td>
    <td><a class="btn btn-danger btn-xs" onclick="deleteUser(%uid%)">Delete</a></td>
</tr>

<div class="container">
  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  <div class="modal fade" id="myModal%uid%" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center>Update User Details</center></h4>
        </div>
        <div class="modal-body">
            <div class="login-page" style="width:80%;">
                        <form class="wow fadeInUp animated" data-wow-delay=".7s" action="" id="form" method="POST">
                            <input type="text" placeholder="Username" name="username" value="%username%" required="">
                            <br>
                            <input type="text" class="email" placeholder="Email Address" name="email" value="%email%" required="" disabled=""><br>
                            <input type="text" placeholder="Mobile Number" name="phone_no" value="%mobileno%" required="" disabled=""> <br>

                            <label>Status:</label>
                            <input type="radio" name="status" value="a" checked="">
                            <label>Active</label><br/> 
                            <input type="radio" name="status" value="d" style="margin-left: 60px;">
                            <label>Disactive</label>
                            <br>
                            <input type="hidden" name="userdetails" value="%uid%">
                            <input type="submit" value="Submit" name="updateuser" id="updateuser">
                            <input type="submit"  data-dismiss="modal" value="Close">
                        </form>
            </div>
        </div>

        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<!-- FOR DELETE USER FUNCTION -->
<script type="text/javascript">
    function deleteUser(value) {
      var deleteuser = value;
      $.ajax({
        type: "GET",
        url: "{SITE_ADM_MOD}manageuser-nct/index.php",
        data: "deleteuser=" + deleteuser,
         success: function(data) {
            toastrAlert('success','User Deleted Successfully');
            window.location.reload();
         }
      });
    }
 </script>

