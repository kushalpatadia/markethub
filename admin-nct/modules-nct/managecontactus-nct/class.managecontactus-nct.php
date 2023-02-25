<?php

class ManageContactUs {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function getUsersTable(){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		$results = mysqli_query($conn,"SELECT * FROM tbl_contact_us");
			
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$replace = array(
				'%uid%' => $v['id'],
				'%username%' => $v['firstName'],
				'%subject%' => $v['subject'],
				'%email%' => $v['email'],
				'%message%' => $v['message'],
				'%replymessage%' => $v['replyMessage'],
				'%createddate%' => $v['createdDate'],
				'%ipaddress%' => $v['ipAddress'],
				//'%update%' => "../updateuser-nct?id=".$v['id'],
				'%delete%' => "../deleteall-nct?deletemessage=".$v['id'],
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
		$replace=array(
			'%USERS TABLE%' => $this->getUsersTable(),
			'%DYNAMIC-MENU%' => $this->getDynamicMenu(),
		);
		return get_view(DIR_ADMIN_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
	}
}

?>
