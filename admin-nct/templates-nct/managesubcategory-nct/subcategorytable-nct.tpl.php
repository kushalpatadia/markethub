 <tr>
 	<td>%catname%</td>
    <td>%subcatname%</td>
    <td><center>
	    <label class="switch">
	    <input type="checkbox" name="selector" onclick="changeSubcategoryStatus(%subcatid%);" %checking%>
	    <div class="slider round"></div>
	    </label></center>
	</td>
    <td>%link%</td>
    <td><a class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal%subcatid%">Update</a></td>
    <td><a class="btn btn-danger btn-xs" href="%delete%">Delete</a></td>
</tr>

<div class="container">
  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  <div class="modal fade" id="myModal%subcatid%" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center>Update Subcategory</center></h4>
        </div>
        <div class="modal-body">
            <div class="login-page" style="width:80%;">
              <form class="wow fadeInUp animated" data-wow-delay=".7s" action="" id="form" method="POST">
                <label for="category">Select Category:</label>
                <select class="form-control" name="category">
                	<option value="%catid%">%catname%</option>
                    %CATEGORY%
                </select>
                <label>Subcategory Name</label>
                <input type="text" placeholder="Subcategory Name" name="subcategory" value="%subcatname%" >
                <label>Subcategory Link</label>
                <input type="text" placeholder="SubCategory Link" name="link" value="%link%" >
                <label>Status</label> (current:%status%)<br>
                <input type="radio" name="status" value="a" checked="">
                <label>Active</label><br> 
                <input type="radio" name="status" value="d">
                <label>Disactive</label>
                <input type="hidden" name="subcatid" value="%subcatid%">
                <input type="submit" value="Submit" name="updateSubcategory" id="updateSubcategory">
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


