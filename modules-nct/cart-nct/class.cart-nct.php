<?php
class Cart {
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
		global $conn;
	 	// $conn=mysqli_connect("localhost","root","","markethub");
	 	$u_id = $_SESSION['userid'];

	 // 	$check = mysqli_query($conn,"SELECT * FROM tbl_products INNER JOIN tbl_cart ON 
	 // 							tbl_products.id=tbl_cart.p_id WHERE u_id=$u_id");
		// foreach ($check as $k => $v) {
		// 	$status = $v['isActive'];	 						
		// 	$p_id = $v['id'];
		// 	if($status != 'y'){
		// 		$delete = mysqli_query($conn,"DELETE FROM tbl_cart WHERE u_id='$u_id' AND p_id='$p_id'");
		// 	}
		// }


	 	$results = mysqli_query($conn,"SELECT * FROM tbl_products INNER JOIN tbl_cart ON 
	 							tbl_products.id=tbl_cart.p_id WHERE u_id=$u_id");
		}
		else{
			echo "<script>alert('You must signin for this..')</script>";
			echo "<script>window.location='../signin-nct/'</script>";
		}
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$available=$v['qty_available'];
				$status=$v['isActive'];
				if($available == 0 || $status != 'y'){
					$available = "Out Of Stock";
				}
				else{
					$available = NULL;
				}
				$replace = array(
				'%availability%'=>$available,
				'%image%'=>SITE_IMG."Products/".$v['imageName'],
				'%title%'=>$v['title'],
				'%price%'=>$v['price'],
				'%dlink%'=>base64_encode($v['id']),
				'%id%'=>$v['p_id'],		
				'%qty%'=>$v['qty'],
				'%color%'=>$v['color'],
				'%qty_available%'=>$v['qty_available'],
				'%link%'=>SITE_MOD.'singleproduct-nct/?id='.base64_encode($v['id']),
				);
				$html .= get_view(DIR_TMPL . $this->module . "/showcart-nct.tpl.php",$replace);
			}
			$html .= "<center><button class='btn-success btn-lg' type='submit' name='sbtorder'>Place Order</button></center><br>";
		}
		
		$check= mysqli_num_rows($results);
		if ($check == 0)
		{
			$html = "<center><img src=".SITE_IMG."empty-cart.jpg style='width:45%;'></center><br><br>";
		}
		return $html;
	}

	public function getItemContent() {			
		$html = null;
		if(isset($_SESSION['userid'])){
		$conn=mysqli_connect("localhost","root","","markethub");
	 	$u_id = $_SESSION['userid'];

	 	$results = mysqli_query($conn,"SELECT * FROM tbl_products INNER JOIN tbl_cart ON 
	 							tbl_products.id=tbl_cart.p_id WHERE u_id=$u_id");
	 	$html= mysqli_num_rows($results);
		}
		return $html;
	}
	public function getPageContent() {	
		$replace = array(
			'%CART%' => $this->getCartContent(),
			'%itemnumber%' => $this->getItemContent()
			);
		return get_view(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);	
	}
}

?>
