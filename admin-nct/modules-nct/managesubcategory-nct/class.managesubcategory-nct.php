<?php

class ManageSubcategory {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function getSubcategory(){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		$results = mysqli_query($conn,"SELECT * FROM tbl_menubar WHERE type='s'");
			
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$category = mysqli_query($conn,"SELECT * FROM tbl_menubar WHERE id=".$v['parent_id']);
				foreach ($category as $key => $value) {
					$catname = $value['menu'];
					$catid = $value['id'];
				}

				$checking = null;
				if ($v['status']=='a') {
					$checking = 'checked';
					$status = "active";
				}
				else
				{
					$checking = null;
					$status = "disactive";
				}
				$replace = array(
					'%CATEGORY%' => $this->allCategory(),
					'%catid%' => $catid,
					'%catname%' => $catname,
					'%subcatid%' => $v['id'],
					'%subcatname%' => $v['menu'],
					'%link%' => $v['link'],
					'%checking%' => $checking,
					'%status%' => $status,
					'%delete%' => "../deleteall-nct?deletesubcategory=".$v['id'],
				);
				$html .= get_view(DIR_ADMIN_TMPL . $this->module . "/subcategorytable-nct.tpl.php",$replace);
			}
		}
		return $html;
	}

	public function allCategory(){
		$html = null;
		$conn = mysqli_connect('localhost','root','','markethub');
		$query = "SELECT * FROM tbl_menubar WHERE status='a' AND type='c' ORDER BY menu ASC";
		$results = mysqli_query($conn,$query);
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$html .= "<option value=".$v['id'].">".$v['menu']."</option>";
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
			'%CATEGORY%' => $this->allCategory(),
			'%SUBCATEGORY TABLE%' => $this->getSubcategory()
		);
		return get_view(DIR_ADMIN_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
	}
}

?>
