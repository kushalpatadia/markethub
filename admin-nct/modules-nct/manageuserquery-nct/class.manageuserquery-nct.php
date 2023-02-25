<?php

class ManageUserQuery {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function getProductsTable($orderno){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		$query = "SELECT * FROM tbl_order_details AS o JOIN tbl_products AS p ON o.p_id=p.id WHERE o.order_id='$orderno'";
		//$query= "SELECT * FROM tbl_products WHERE id = $productid";
		$results = mysqli_query($conn,$query);
			
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$replace = array(
				'%pid%' => $v['id'],
				'%title%' => $v['title'],
				'%category%' => $v['category'],
				'%subcategory%' => $v['subcategory'],
				'%brand%' => $v['brand'],
				'%price%' => $v['price'],
				'%qty%' => $v['qty'],
				'%rating%' => $v['rating'],
				'%reviews%'	=> $v['reviews'],
				'%size%' => $v['size'],
				'%color%' => $v['color'],
				'%shortdescription%' => $v['shortDescription'],
				'%specification%' => $v['specification'],
				'%additionalinfo%' => $v['additionalinfo']
				);
				$html .= get_view(DIR_ADMIN_TMPL . $this->module . "/productstable-nct.tpl.php",$replace);
			}
		}
		return $html;
	}
	public function getOrderTable(){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		$results = mysqli_query($conn,"SELECT * FROM tbl_order_details");
			
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$replace = array(
				'%id%' => $v['id'],
				'%orderid%' => $v['order_id'],
				'%productid%' => $v['p_id'],
				'%userId%' => $v['u_id'],
				'%qty%' => $v['qty'],
				'%status%' => $v['status'],
				'%purchase_date%' => $v['purchase_date'],
				'%user_ip%' => $v['ip'],
				'%update%' => "../updateproduct-nct?id=".$v['id'],
				'%delete%' => "../deleteall-nct?id=".$v['id'],
				);
				$html .= get_view(DIR_ADMIN_TMPL . $this->module . "/ordertable-nct.tpl.php",$replace);
			}
		}
		return $html;
	}
	public function getShippingTable($orderno){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");;
		$query ="SELECT * FROM tbl_shipping_details AS ship JOIN tbl_order_details AS o ON ship.id=o.address_id WHERE o.order_id = '$orderno'";
		$results = mysqli_query($conn,$query);
			
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$replace = array(
					'%username%' => $v['username'],
					'%email%' => $v['email'],
					'%address%' => $v['addressline1'].'<br>'.$v['addressline2'].'<br>'.$v['area'].'<br>'.$v['city'],
					'%pincode%' => $v['pincode'],
					'%state%' => $v['state'],
					'%country%' => $v['country'],
					'%mobileno%' => $v['mobilenumber'],
				);
				$html .= get_view(DIR_ADMIN_TMPL . $this->module . "/shippingtable-nct.tpl.php",$replace);
			}
		}
		return $html;
	}
	public function getUsersTable($orderno){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		$query = "SELECT * FROM register_users AS ru JOIN tbl_order_details AS o ON ru.u_id=o.u_id WHERE o.order_id = '$orderno'";
		$results = mysqli_query($conn,$query);
			
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$replace = array(
				'%uid%' => $v['u_id'],
				'%username%' => $v['username'],
				'%email%' => $v['email'],
				'%mobileno%' => $v['mobileno'],
				'%createddate%' => $v['created_date'],
				'%lastlogin%' => $v['last_logintime'],
				'%lastupdate%' => $v['last_updatetime'],
				'%ipaddress%' => $v['ipaddress'],
				'%oauthprovider%' => $v['oauth_provider'],
				'%oauthid%' => $v['oauth_uid'],
				'%status%' => $v['status'],
				);
				$html .= get_view(DIR_ADMIN_TMPL . $this->module . "/userstable-nct.tpl.php",$replace);
			}
		}
		return $html;
	}

	public function getDynamicMenu()
	{
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		$module1 = $this->headTitle;
		$query = "SELECT * FROM tbl_admin_menu WHERE isActive='y'";
		$result = mysqli_query($conn,$query);
		// exit;
		foreach ($result as $k => $v) {
			$active = $v['title'];
			if ($active == $module1) {
				$active = "active";
			}
			else
			{
				$active = null;
			}
			$replace = array(
				'%active%' => $active,
				'%menulink%' => $v['link'],
				'%icon-class%' => $v['svg_class'],
				'%icon-use%' => $v['use_xlink'],
				'%menu-title%' => $v['title'],
				);
			$html .= get_view(DIR_ADMIN_TMPL . "dashboard-nct/sitemenu-nct.tpl.php",$replace);
		}
		return $html;
	}
			
	public function getPageContent() {
		$conn = mysqli_connect('localhost','root','','markethub');
		$orderno=$_GET['orderno'];
		$query = "SELECT * FROM tbl_order_details WHERE order_id = '$orderno'";
		$results = mysqli_query($conn,$query);
		foreach ($results as $k => $v) {
			$userid = $v['u_id'];
			//$productid = $v['p_id'];
			$addressid = $v['address_id'];
			//$qty = $v['qty'];
		}
		$replace=array(
			'%ORDER-NO%' => $orderno,
			'%PRODUCTS TABLE%' => $this->getProductsTable($orderno),
			'%USERS TABLE%' => $this->getUsersTable($orderno),
			'%DYNAMIC-MENU%' => $this->getDynamicMenu(),
			'%ORDER TABLE%' => $this->getShippingTable($orderno)
		);
		return get_view(DIR_ADMIN_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
	}
}

?>
