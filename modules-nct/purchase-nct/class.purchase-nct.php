<?php
class Purchase {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function getPurchaseDetails() {			
		$html = null;
		$u_id = $_SESSION['userid'];
		$conn=mysqli_connect("localhost","root","","markethub");;
		$query = "SELECT * FROM tbl_products INNER JOIN tbl_order_details ON tbl_products.id = tbl_order_details.p_id
		 WHERE u_id='$u_id' AND (status='b' OR status='d' OR status='sent')";
		//echo $query;
		$results = mysqli_query($conn,$query);
		if(!empty($results)){
			$total = 0;
			foreach ($results as $k => $v) {
				$address = $v['address_id'];
				$order_id = $v['order_id'];
				$query= "SELECT * FROM tbl_shipping_details WHERE id='$address'";
				$result = mysqli_query($conn,$query);
				foreach($result as $row)
				{
					$address = $row['addressline1'].',<br>'.$row['addressline2'].',<br>'.$row['area'].','.$row['city'].',<br>'.$row['pincode'];
				}
				$status = null;
				if ($v['status']=='b') {
					$status = "Delivered In Short Time";
					$status .= "<center><label class='switch'>";
					$status .= "<input type='checkbox' name='selector' onclick=changePurchaseStatus('".$order_id."');>";
					$status .= "<div class='slider round'></div></label></center>";
				}
				elseif ($v['status']=='d' || $v['status']=='sent') {
					$status= "Delivered";
				}
				$replace = array(
					'%pimage%'=>SITE_IMG."Products/".$v['imageName'],
					'%orderid%'=>$v['order_id'],
					'%pname%'=>$v['title'],
					'%qty%' => $v['qty'],
					'%price%'=>$v['price'],
					'%totalprice%'=>$v['price'] * $v['qty'],
					'%purchasedate%' => $v['purchase_date'],
					'%address%' => $address,
					'%status%' => $status
				);
				$html .= get_view(DIR_TMPL . $this->module . "/showpurchasedetails-nct.tpl.php",$replace);
			}
		}
		return $html;
	}
	
	public function getPageContent() {	
			$replace = array(
			'%PURCHASE%' => $this->getPurchaseDetails(),
			);
		return get_view(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);	
	}
}

?>
