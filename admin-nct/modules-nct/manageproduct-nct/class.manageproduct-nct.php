<?php

class ManageProduct {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function allCategory(){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		$query = "SELECT * FROM tbl_category WHERE status='a' ORDER BY cat_name ASC";
		$results = mysqli_query($conn,$query);
		if(!empty($results)){
			foreach ($results as $k => $v) {
				// $replace = array(
				// 	'%category%' => $v['cat_name'],
				// );
				// $html .= get_view(DIR_TMPL . $this->module . "/category-nct.tpl.php",$replace);
				$html .= "<option>".$v['cat_name']."</option>";
			}
		}
		return $html;
	}

	public function allSubcategory(){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		$query = "SELECT * FROM tbl_subcategory WHERE status='a' ORDER BY subcat_name ASC";
		$query1 = "SELECT * FROM tbl_category WHERE status='a' ORDER BY cat_name ASC";
		$results = mysqli_query($conn,$query);
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$html .= "<option>".$v['subcat_name']."</option>";
			}
		}
		return $html;
	}

	public function allBrand(){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		$query = "SELECT * FROM tbl_brand WHERE status='a' ORDER BY brand_name ASC";
		$results = mysqli_query($conn,$query);
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$html .= "<option>".$v['brand_name']."</option>";
			}
		}
		return $html;
	}

	public function getProductsTable(){
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		$results = mysqli_query($conn,"SELECT * FROM tbl_products");
			
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$model_description = $v['shortDescription'];
				$model_description = str_replace("<li>","",$model_description);
				$model_description = str_replace("</li>","",$model_description);
				$model_specification = $v['specification'];
				$model_specification = str_replace("<li>","",$model_specification);
				$model_specification = str_replace("</li>","",$model_specification);
				$model_additionalinfo = $v['additionalinfo'];
				$model_additionalinfo = str_replace("<li>","",$model_additionalinfo);
				$model_additionalinfo = str_replace("</li>","",$model_additionalinfo);

				$checking = null;
				if ($v['isActive']=='y') {
					$checking = 'checked';
				}
				else
				{
					$checking = null;
				}
				$replace = array(
				'%productid%' => base64_encode($v['id']),
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
				'%mshortdescription%' => $model_description,
				'%specification%' => $v['specification'],
				'%mspecification%' => $model_specification,
				'%additionalinfo%' => $v['additionalinfo'],
				'%madditionalinfo%' => $model_additionalinfo,
				'%purchased%' => $v['purchased'],
				'%active%' => $v['isActive'],
				'%uploadby%' => $v['upload_by'],
				'%checking%' => $checking,
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
			'%PRODUCTS TABLE%' => $this->getProductsTable(),
			'%CATEGORY%' => $this->allCategory(),
			'%SUBCATEGORY%' => $this->allSubcategory(),
			'%BRAND%' => $this->allBrand(),
			'%DYNAMIC-MENU%' => $this->getDynamicMenu(),
		);
		return get_view(DIR_ADMIN_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
	}
}

?>
