<?php

class ManageShipping {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function getShippingTable(){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		$results = mysqli_query($conn,"SELECT * FROM tbl_shipping_details");
			
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$replace = array(
					'%id%' => $v['id'],
					'%userid%' => $v['u_id'],
					'%username%' => $v['username'],
					'%email%' => $v['email'],
					'%address%' => $v['addressline1'].'<br>'.$v['addressline2'].'<br>'.$v['area'].'<br>'.$v['city'],
					'%pincode%' => $v['pincode'],
					'%mobileno%' => $v['mobilenumber'],
				);
				$html .= get_view(DIR_ADMIN_TMPL . $this->module . "/shippingtable-nct.tpl.php",$replace);
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
		$replace=array(
			'%SHIPPING TABLE%' => $this->getShippingTable(),
			'%DYNAMIC-MENU%' => $this->getDynamicMenu(),
		);
		return get_view(DIR_ADMIN_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
	}
}

?>
