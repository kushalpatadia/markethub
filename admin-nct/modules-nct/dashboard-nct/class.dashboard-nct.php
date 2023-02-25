<?php
class Dashboard {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
		global $conn;
		$this->conn = $conn;
	}

	public function getHeaderContent() {
		return get_view(DIR_ADMIN_TMPL . "header-nct.tpl.php");		
	}
	
	public function getFooterContent() {
		return get_view(DIR_ADMIN_TMPL . "footer-nct.tpl.php");		
	}
	
	public function getQuery($var,$tbl,$where)
	{
		global $conn;
		if (empty($where)) 
		{
			$query = "SELECT ".$var." FROM ".$tbl;
			$result = mysqli_query($conn,$query);
			$output = mysqli_num_rows($result);
		}
		else
		{
			$query = "SELECT ".$var." FROM ".$tbl." WHERE ".$where;
			$result = mysqli_query($conn,$query);
			$output = mysqli_num_rows($result);	
				// echo $query;
			// echo $output;
			// exit;
		}
		return $output;
	}


	public function getNewMessages(){
		$html = null;
		global $conn;

		$results = mysqli_query($conn,"SELECT * FROM tbl_todo_list ORDER BY td_id DESC LIMIT 0,8");
		
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$u_id = $v['u_id'];
				if($u_id == 1){
					$adname = 'K';
				}
				elseif ($u_id == 2) {
					$adname = 'J';
				}
				else{
					$adname = 'A';
				}
				$replace = array(
				'%adname%' => $adname,
				'%messages%' => $v['message'],
				);
				$html .= get_view(DIR_ADMIN_TMPL . $this->module . "/messges-nct.tpl.php",$replace);
			}
		}
		return $html;
	}

	public function getDynamicMenu()
	{
		$html = null;
		$module1 = $this->headTitle;
		$query = "SELECT * FROM tbl_admin_menu WHERE isActive='y'";
		$result = mysqli_query($this->conn,$query);
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
		$total_users = $this -> getQuery('u_id','register_users','');
		$new_orders = $this -> getQuery('id','tbl_order_details',"status ='b'");
		$total_subadmins = $this -> getQuery('id','tbl_admin',"priority = 't' OR priority = 's'");
		$total_new_messages = $this -> getQuery('id','tbl_contact_us',"replyMessage=''");
		$totalproducts = $this -> getQuery('id','tbl_products','');
		$totalelectronics = $this -> getQuery('id','tbl_products',"category= 'Electronics'");
		$perelectronics = intval(($totalelectronics/$totalproducts) * 100);
		$totalmensproducts = $this -> getQuery('id','tbl_products',"category='Men'");
		$permensproducts = intval(($totalmensproducts/$totalproducts) * 100);
		$totalwomensproducts = $this -> getQuery('id','tbl_products',"category='Women'");
		$perwomensproducts = intval(($totalwomensproducts/$totalproducts) * 100);
		$totalappliances = $this -> getQuery('id','tbl_products',"category='Appliances'");
		$perappliances = intval(($totalappliances/$totalproducts) * 100);
		$totalkids = $this -> getQuery('id','tbl_products',"category='Kids'");
		$perkids = intval(($totalkids/$totalproducts) * 100);
		$replace=array(
			'%MESSAGES%' => $this->getNewMessages(),
			'%TOTAL USERS%' => $total_users,
			'%NEW ORDERS%' => $new_orders,
			'%SUBADMINS%' => $total_subadmins,
			'%NEW MESSAGES%' => $total_new_messages,
			'%ELECTRONICS%' => $perelectronics,
			'%MEN%' =>	$permensproducts,
			'%WOMEN%' => $perwomensproducts,
			'%APPLIANCES%' => $perappliances,
			'%KIDS%' => $perkids,
			'%DYNAMIC-MENU%' => $this->getDynamicMenu(),
		);
		return get_view(DIR_ADMIN_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);	
	}
}

?>