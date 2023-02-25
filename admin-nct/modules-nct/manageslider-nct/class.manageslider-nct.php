<?php

class ManageSlider {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function getOrderTable(){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		$results = mysqli_query($conn,"SELECT * FROM tbl_slider");
			
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$checking = null;
				if ($v['isActive']=='a') {
					$checking = 'checked';
				}
				else
				{
					$checking = null;
				}
				$replace = array(
				'%id%' => $v['id'],
				'%image%' => $v['imageName'],
				'%title%' => $v['title'],
				'%discount%' => $v['discount'],
				'%position%' => $v['isUpDown'],
				'%description%' => $v['description'],
				'%status%' => $v['isActive'],
				'%checking%' => $checking,
				// '%update%' => "../updateproduct-nct?id=".$v['id'],
				'%delete%' => "../deleteall-nct?deleteimage=".$v['id'],
				);
				$html .= get_view(DIR_ADMIN_TMPL . $this->module . "/slidertable-nct.tpl.php",$replace);
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
			'%DYNAMIC-MENU%' => $this->getDynamicMenu(),
			'%Slider TABLE%' => $this->getOrderTable()
		);
		return get_view(DIR_ADMIN_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
	}
}

?>
