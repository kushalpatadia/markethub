<style>
  .alert-close{
    position: static;
    float: right;
  }
</style>
<div class="panel panel-info">
  <div class="panel-heading">
    <?php
      $id1=rand('5555','9999');
      $id2=rand('111','999');
    ?>
    <a href="javascript:void(0)" onclick="deleteAdd(%id%)"><div class="alert-close"></div></a>
    <input type="radio" name="deliverhere" value="%id%" onclick="getRadioValue(this.id)" id="btn%id%">
        <h3><center>%name% <a href="" data-toggle="modal" data-target="#myshippingaddress%id%" class="glyphicon glyphicon-pencil"></a></center></h3>
  </div>  
  <div class="panel-body">
    <div class="row">
      <div class=" col-md-12 col-lg-12"> 
        <table class="table table-user-information">
        <tbody>
          <tr>
              <td>Address</td>
              <td><p>%address%</p></td>
          </tr>
                   
          <tr>
            <td>Pincode</td>
            <td>%pincode%</td>
          </tr>
          <tr>
            <td>Phone Number</td>
            <td>%mobileno%</td>
          </tr>
          <tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function deleteAdd(argument) {
    var id = argument;
     $.ajax({
        type: "GET",
        url: "{SITE_MOD}checkout-nct",
        data: "deleteid=" + id,
        success: function(data) {
          var result = $.trim(data);
          if(result == "msg"){
              toastrAlert('success','Deleted Successfully')
          }
          $('#deletebyajax').load(document.URL +  ' #deletebyajax');
          window.location.reload();
        }
     });
  }
</script>
