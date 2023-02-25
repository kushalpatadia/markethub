<style>
/* For Toggle  Switch Active/Disactive */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: red;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "D"; 
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: lightblue;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: green;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
  content: "A";
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

/*  End For Toggle  Switch Active/Disactive */
</style>
<br>
<div class="container">
    <div class=" col-md-12 col-lg-12">
    <div style="overflow-x: auto;">
      <table class="table" border="1">
          <tr style="background-color: #eee">
            <td><b>Order ID</b></td>
            <td><b>Product Name</b></td>
            <td><b>Product Image</b></td>
            <td><b>Quantity</b></td>
            <td><b>Price</b></td>
            <td><b>Total Price</b></td>
            <td><b>Purchase Date</b></td>
            <td><b>Deliver Address</b></td>
            <td><b>Status</b></td>
          </tr>
		%PURCHASE%
	</table>
  </div>
   </div>
</div>
<br>
<script type="text/javascript">
function changePurchaseStatus(value){
var id = value;
window.location.href = "{SITE_MOD}purchase-nct/index.php?orderid=" + id; 
}
</script>