<?php

class AddProduct {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function allCategory(){
		$html = null;
		// $conn=mysqli_connect("localhost","root","","markethub");
		$conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
		$query = "SELECT * FROM tbl_category WHERE status='a' ORDER BY cat_name ASC";
		$results = mysqli_query($conn,$query);
		if(!empty($results)){
			foreach ($results as $k => $v) {
				// $replace = array(
				// 	'%category%' => $v['cat_name'],
				// );
				// $html .= get_view(DIR_TMPL . $this->module . "/category-nct.tpl.php",$replace);
				$html .= "<option>".$v['cat_name']."</option>";
			}
		}
		return $html;
	}

	public function allSubcategory(){
		$html = null;
		// $conn=mysqli_connect("localhost","root","","markethub");
		$conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
		$query = "SELECT * FROM tbl_subcategory WHERE status='a' ORDER BY subcat_name ASC";
		$query1 = "SELECT * FROM tbl_category WHERE status='a' ORDER BY cat_name ASC";
		$results = mysqli_query($conn,$query);
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$html .= "<option>".$v['subcat_name']."</option>";
			}
		}
		return $html;
	}

	public function allBrand(){
		$html = null;
		// $conn=mysqli_connect("localhost","root","","markethub");
		$conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
		$query = "SELECT * FROM tbl_brand WHERE status='a' ORDER BY brand_name ASC";
		$results = mysqli_query($conn,$query);
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$html .= "<option>".$v['brand_name']."</option>";
			}
		}
		return $html;
	}

	public function getPageContent() {
		// $conn = mysqli_connect("localhost","root","","markethub");
		$conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
		$u_id = $_SESSION['userid'];
		$query = "SELECT paypal_email FROM register_users WHERE u_id='$u_id'";
		$exe = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($exe);
		if(!empty($row['paypal_email'])){
			$paypal = '<button type="button" class="btn btn-primary nextBtn btn-lg pull-left" data-toggle="modal" data-target="#paypal">Update Paypal Email Id</button>';
			$paypal_email = $row['paypal_email'];
		}
		else{
			$paypal = '<button type="button" class="btn btn-primary nextBtn btn-lg pull-left" data-toggle="modal" data-target="#paypal">Add Paypal Email Id</button>';
			$paypal_email = $row['paypal_email'];
		}
		$replace = array(
			'%PAYPALEMAIL%' => $paypal_email,
			'%PAYPAL%' => $paypal,
			'%CATEGORY%' => $this->allCategory(),
			'%SUBCATEGORY%' => $this->allSubcategory(),
			'%BRAND%' => $this->allBrand()
		);
		return get_view(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);	
	}
}

?>
