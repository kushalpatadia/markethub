<?php

class ManageSellerProduct {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function getProductsTable(){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		
		$results = mysqli_query($conn,"SELECT * FROM tbl_products WHERE isActive='n' AND upload_by LIKE 'U%'");
			
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$fetchuser = $v['upload_by'];
				$userid = substr($fetchuser,1);
				$query = mysqli_query($conn,"SELECT email FROM register_users WHERE u_id='$userid'");
				$fetch = mysqli_fetch_assoc($query);
				$fetchemail = $fetch['email'];
				$replace = array(
				'%pid%' => $v['id'],
				'%image1%' => "<img src='".SITE_IMG."Products/".$v['imageName']."' style='height:100%;width:100%;'>",
				'%image2%' => "<img src='".SITE_IMG."Products/".$v['image2']."' style='height:100%;width:100%;'>",
				'%image3%' => "<img src='".SITE_IMG."Products/".$v['image3']."' style='height:100%;width:100%;'>",
				'%title%' => $v['title'],
				'%category%' => $v['category'],
				'%subcategory%' => $v['subcategory'],
				'%brand%' => $v['brand'],
				'%price%' => $v['price'],
				'%qty%' => $v['qty_available'],
				'%rating%' => $v['rating'],
				'%reviews%'	=> $v['reviews'],
				'%size%' => $v['size'],
				'%color%' => $v['color'],
				'%shortdescription%' => $v['shortDescription'],
				'%specification%' => $v['specification'],
				'%additionalinfo%' => $v['additionalinfo'],
				'%purchased%' => $v['purchased'],
				'%uploaded_by%'=>$fetchemail,
				'%update%' => "../updateproduct-nct?id=".$v['id'],
				'%delete%' => "../deleteall-nct?deleteproduct=".$v['id'],
				);
				$html .= get_view(DIR_ADMIN_TMPL . $this->module . "/productstable-nct.tpl.php",$replace);
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
			'%PRODUCTS TABLE%' => $this->getProductsTable()
		);
		return get_view(DIR_ADMIN_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
	}
}

?>
