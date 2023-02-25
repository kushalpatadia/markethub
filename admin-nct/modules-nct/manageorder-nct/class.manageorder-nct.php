<?php

class ManageOrder {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
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
			
	public function getOrderTable(){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		$results = mysqli_query($conn,"SELECT * FROM tbl_order_details WHERE status='b'");
			
		if(!empty($results)){
			$link = "<a href=''>";
			foreach ($results as $k => $v) {
				$replace = array(
				'%id%' => $v['id'],
				'%orderid%' => "<a href='".SITE_ADM_MOD."manageuserquery-nct/index.php?orderno=".$v['order_id']."'>".$v['order_id']."</a>",
				'%m_orderid%' => $v['order_id'],
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

	public function getPageContent() {
		$replace=array(
			'%ORDER TABLE%' => $this->getOrderTable(),
			'%DYNAMIC-MENU%' => $this->getDynamicMenu(),
		);
		return get_view(DIR_ADMIN_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
	}
}

?>
