<?php

class Checkout {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function getCartContent() {			
		$html = null;
		if(isset($_SESSION['userid'])){
	 	$conn=mysqli_connect("localhost","root","","markethub");
	 	$u_id = $_SESSION['userid'];

	 	$results = mysqli_query($conn,"SELECT * FROM tbl_products INNER JOIN tbl_cart ON 
	 							tbl_products.id=tbl_cart.p_id WHERE u_id=$u_id");
		}
		else{
			echo "<script>alert('You must signin for this..')</script>";
			echo "<script>window.location='../signin-nct/'</script>";
		}
		if(!empty($results)){
			$total = 0;
			foreach ($results as $k => $v) {
				$qty=$v['qty'];
				$total = $total + ($v['price']* $qty);
				$replace = array(
				'%image%'=>SITE_IMG."Products/".$v['imageName'],
				'%title%'=>$v['title'],
				'%mainprice%'=>$v['price'],
				'%price%'=>($v['price'] * $qty),	
				'%dlink%'=>$v['p_id'],	
				'%qty%' =>$v['qty'],
				);
				$html .= get_view(DIR_TMPL . $this->module . "/showcheckout-nct.tpl.php",$replace);
			}
			$_SESSION['$total']=$total;
		}
		return $html;
	}

	public function getShippingContent(){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
	 	$u_id = $_SESSION['userid'];
	 	$results = mysqli_query($conn,"SELECT * FROM tbl_shipping_details where u_id='$u_id'");
	 	foreach ($results as $k => $v) {
	 		$replace = array(
	 			'%id%'=>$v['id'],
	 			'%name%'=>$v['username'],
	 			'%email%'=>$v['email'],
	 			'%address%'=>$v['addressline1'].$v['addressline2'].",".$v["area"].",".$v["city"],
	 			'%addline1%' =>$v['addressline1'],
	 			'%addline2%' =>$v['addressline2'],
	 			'%area%' =>$v['area'],
	 			'%city%' =>$v['city'],
	 			'%state%' =>$v['state'],
	 			'%country%' =>$v['country'],
	 			'%pincode%'=>$v['pincode'],
	 			'%mobileno%'=>$v['mobilenumber'],
	 		);
	 		$html .=get_view(DIR_TMPL . $this->module . "/showshipping-nct.tpl.php",$replace);
	 	} 
	 	return $html;
	}

	public function getShippingModelContent(){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
	 	$u_id = $_SESSION['userid'];
	 	$results = mysqli_query($conn,"SELECT * FROM tbl_shipping_details where u_id='$u_id'");
	 	foreach ($results as $k => $v) {
	 		$replace = array(
	 			'%id%'=>$v['id'],
	 			'%name%'=>$v['username'],
	 			'%email%'=>$v['email'],
	 			'%address%'=>$v['addressline1'].$v['addressline2'].",".$v["area"].",".$v["city"],
	 			'%addline1%' =>$v['addressline1'],
	 			'%addline2%' =>$v['addressline2'],
	 			'%area%' =>$v['area'],
	 			'%city%' =>$v['city'],
	 			'%state%' =>$v['state'],
	 			'%country%' =>$v['country'],
	 			'%pincode%'=>$v['pincode'],
	 			'%mobileno%'=>$v['mobilenumber'],
	 		);
	 		$html .=get_view(DIR_TMPL . $this->module . "/showshipingmodel-nct.tpl.php",$replace);
	 	} 
	 	return $html;
	}

	public function paypalPaymentContent(){

		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
	 	$u_id = $_SESSION['userid'];
	 	$results = mysqli_query($conn,"SELECT * FROM tbl_shipping_details where u_id='$u_id'");
	 	foreach ($results as $k => $v) {
	 		$addressline1=$v['addressline1'];
 			$addressline2=$v['addressline2'];
 			$area=$v['area'];
 			$city=$v['city'];
 			$state=$v['state'];
 			$country=$v['country'];
 			$pincode=$v['pincode'];
	 	}
	 	$results = mysqli_query($conn,"SELECT * FROM tbl_products INNER JOIN tbl_cart ON 
	 							tbl_products.id=tbl_cart.p_id WHERE u_id=$u_id");
	 	$count = 1;
	 	foreach ($results as $k => $v) {
	 		$con_price = (int)($v['price'])/60;
	 		$replace = array(
	 			'%item_name%'=>"<input type='hidden' name='item_name_".$count."' value='".$v['title']."'>",
				'%amount%'=>"<input type='hidden' name='amount_".$count."' id='amount".$count."' value='".$con_price."'>",
				'%qty%'=>"<input type='hidden' name='quantity_".$count."' value='".$v['qty']."'>",
	 		);
	 		echo "<script type='text/javascript'>
                  function myFunction() {
	                    document.getElementById('amount".$count."').value=".$v['price']."
	              }
                  </script>";
	 		$count += 1;
	 		$html .=get_view(DIR_TMPL . $this->module . "/paypalpayment-nct.tpl.php",$replace);
	 	} 
	 	return $html;
	}

	public function getPageContent() {	
		$conn=mysqli_connect("localhost","root","","markethub");
	 	$u_id = $_SESSION['userid'];
	 	$results = mysqli_query($conn,"SELECT * FROM tbl_shipping_details where u_id='$u_id'");
	 	foreach ($results as $k => $v) {
		$replace = array(
			'%CART%' => $this->getCartContent(),
			'%SHIPPING%' => $this->getShippingContent(),
			'%SHIPPINGMODEL%' => $this->getShippingModelContent(),
			'%tprice%'=>$_SESSION['$total'],
			'%PAYMENT FORM%' => $this->paypalPaymentContent(),
			'%name%'=>$v['username'],
			'%email%'=>$v['email'],
			'%addline1%' =>$v['addressline1'],
			'%addline2%' =>$v['addressline2'],
			'%area%' =>$v['area'],
			'%city%' =>$v['city'],
			'%state%' =>$v['state'],
			'%pincode%'=>$v['pincode']
			);
		}
		//unset($_SESSION['$total']);
		return get_view(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);	
	}
}

?>
