 <tr>
    <td>%menu%</td>
 	<td><center>
	    <label class="switch">
	    <input type="checkbox" name="selector" onclick="changeCategoryStatus(%catid%);" %checking%>
	    <div class="slider round"></div>
	    </label></center>
	</td>
    <td>%link%</td>
    <td><a class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal%catid%">Update</a></td>
    <td><a class="btn btn-danger btn-xs" href="%delete%">Delete</a></td>
</tr>

<div class="container">
  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  <div class="modal fade" id="myModal%catid%" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center>Update Category</center></h4>
        </div>
        <div class="modal-body">
            <div class="login-page" style="width:80%;">
              <form class="wow fadeInUp animated" data-wow-delay=".7s" action="" id="form" method="POST">
                <label>Category Name</label>
                <input type="text" placeholder="Category Name" name="category" value="%menu%" >
                <label>Link</label>
                <input type="text" placeholder="Link" name="link" value="%link%" >
                <label>Status</label> (current:%status%)<br>
                <input type="radio" name="status" value="a" checked="">
                <label>Active</label><br> 
                <input type="radio" name="status" value="d">
                <label>Disactive</label>
                <input type="hidden" name="catid" value="%catid%">
                <input type="submit" value="Submit" name="updateCategory" id="updateCategory">
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


