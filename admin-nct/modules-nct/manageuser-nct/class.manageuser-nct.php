<?php

class ManageUser {
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
		$results = mysqli_query($conn,"SELECT * FROM register_users");
			
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$checking = null;
				if ($v['status']=='a') {
					$checking = 'checked';
				}
				else
				{
					$checking = null;
				}
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
				'%checking%' => $checking,
				'%update%' => "../updateuser-nct?id=".$v['u_id'],
				'%delete%' => "../deleteall-nct?deleteuser=".$v['u_id'],
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
			'%DYNAMIC-MENU%' => $this->getDynamicMenu(),
			'%USERS TABLE%' => $this->getUsersTable()
		);
		return get_view(DIR_ADMIN_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
	}
}

?>
