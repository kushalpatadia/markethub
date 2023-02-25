 <tr>
    <td>%uid%</td>
    <td>%email%</td>
    <td>%username%</td>
    <td>%subject%</td>
    <td>%message%</td>
    <td>%replymessage%</td>
    <td>%createddate%</td>
    <td>%ipaddress%</td>
    <td><a class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal%uid%">Reply</a></td>
    <td><a class="btn btn-danger btn-xs" href="%delete%">Delete</a></td>
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
              <h4 class="modal-title"><center>Manage Contact Us</center></h4>
            </div>
            <div class="modal-body">
                <div class="login-page" style="width:80%;">
                    <form class="wow fadeInUp animated" data-wow-delay=".7s" action="" id="form" method="POST">
                        <input type="hidden" value="%username%" name="username">
                        Email Id:
                        <input type="text" value="%email%" name="email">
                        Subject:
                        <input type="text" value="%subject%" name="subject">
                        <textarea  rows="4" placeholder="Message" name="message" disabled="" style="width: 100%;">%message%</textarea><br>
                        <textarea  rows="4" placeholder="ReplyMessage" name="replymessage" style="width: 100%;">%replymessage%</textarea><br>
                        <input type="hidden" name="userdetails" value="%uid%">
                        <input type="submit" value="submit" name="submitmessage" id="replymessage">
                        <input type="submit"  data-dismiss="modal" value="Close">
                    </form>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
  </div>
</div>

