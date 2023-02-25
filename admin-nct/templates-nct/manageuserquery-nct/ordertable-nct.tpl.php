 <tr>
    <td>%id%</td>
    <td>%orderid%</td>
    <td>%productid%</td>
    <td>%userId%</td>
    <td>%qty%</td>
    <td>%status%</td>
    <td>%purchase_date%</td>
    <td>%user_ip%</td>
    <td><a class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal%id%">Update</a></td>
    <td><a class="btn btn-danger btn-xs" href="%delete%">Delete</a></td>
</tr>

<div class="container">
  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  <div class="modal fade" id="myModal%id%" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center>Update Order Details</center></h4>
        </div>
        <div class="modal-body">
            <div class="login-page" style="width:80%;">
                        <form class="wow fadeInUp animated" data-wow-delay=".7s" action="" id="form" method="POST">
                            <label><pre>Order ID       :       %orderid%</pre></label><br>
                            <label><pre>User ID        :       %userId%</pre></label><br>
                            <label><pre>Current Status :       %status%</pre></label><br>
                            <label>Update Status:</label><br>
                            <input type="radio" name="status" value="b" checked="">
                            <label>Purchased(but not deliverd yet)</label><br> 
                            <input type="radio" name="status" value="d">
                            <label>Deliverd</label>
                            <br>
                            <input type="hidden" name="orderdetails" value="%orderid%">
                            <input type="submit" value="Submit" name="updateorder" id="updateorder">
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