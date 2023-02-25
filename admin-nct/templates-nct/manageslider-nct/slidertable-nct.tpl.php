 <tr>
    <td>%id%</td>
    <td><center>
        <label class="switch">
        <input type="checkbox" name="selector" onclick="changeSliderStatus(%id%);" %checking%>
        <div class="slider round"></div>
        </label></center>
    </td>
    <td>%image%</td>
    <td>%title%</td>
    <td>%discount%</td>
    <td>%position%</td>
    <td>%description%</td>
    <td>
      <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal%id%">Update</a><br><br>
      <a class="btn btn-danger btn-xs" href="%delete%">Delete</a>
    </td>
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
          <h4 class="modal-title"><center>Update Slider</center></h4>
        </div>
        <div class="modal-body">
            <div class="login-page" style="width:80%;">
              <form class="wow fadeInUp animated" data-wow-delay=".7s" action="" id="form" method="POST">
                <label>Set Image</label>
                <pre><h4><label for="image1">Main Image:</label></h4> <input type="file" name="image1" value="%image1%" id="image1"></pre>
                <label>Title</label>
                <input type="text" placeholder="Slider Title" name="title" value="%title%" >
                <label>Discount</label>
                <input type="text" placeholder="Discount" name="discount" value="%discount%" required="">
                <label>Position of Image</label> (current:%position%)<br>
                <input type="radio" name="position" value="u" checked="">
                <label>Home Page Upper Slider</label><br> 
                <input type="radio" name="position" value="d">
                <label>Home Page Down Slider</label><br>
                <label>Discription</label>
                <textarea rows="5" name="description" style="width:100%;" >%description%</textarea>
                <label>Image Activation</label> (current:%status%)<br>
                <input type="radio" name="status" value="a" checked="">
                <label>Image Active</label><br> 
                <input type="radio" name="status" value="d">
                <label>Image Disactive</label>
                <input type="hidden" name="sliderdetails" value="%id%">
                <input type="submit" value="Submit" name="updateslider" id="updateslider">
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