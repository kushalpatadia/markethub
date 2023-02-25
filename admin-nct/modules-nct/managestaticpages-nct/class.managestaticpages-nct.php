<?php
class ManageStaticPages {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function getHeaderContent() {
		return get_view(DIR_ADMIN_TMPL . "header-nct.tpl.php");		
	}
	
	public function getFooterContent() {
		return get_view(DIR_ADMIN_TMPL . "footer-nct.tpl.php");		
	}

	public function getPages(){
		$html = null;
		$conn = mysqli_connect("localhost","root","","markethub");
		$exe = mysqli_query($conn,"SELECT * FROM tbl_static_pages");
		if(!empty($exe))
		{
			foreach ($exe as $key => $v) {
				$checking = null;
				if ($v['status']=='a') {
					$checking = 'checked';
				}
				else
				{
					$checking = null;
				}
				$replace = array(
					'%id%' => $v['page_id'],
					'%pagecontent%' => $v['page_content'],
					'%pagename%' => $v['page_title'],
					'%link%' => $v['page_link'],
					'%checking%' => $checking,
					'%delete%' => SITE_ADM_MOD.'deleteall-nct?deletepage='.$v['page_id'],
				);
			$html .= get_view(DIR_ADMIN_TMPL . $this->module . "/pages-nct.tpl.php",$replace);
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
		$replace = array(
			'%DYNAMIC-MENU%' => $this->getDynamicMenu(),
			'%PAGES%' => $this->getPages()
		);
		return get_view(DIR_ADMIN_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);	
	}
}
?>