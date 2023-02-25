<?php

class ViewProducts {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function getProductsTable(){
		$html = null;
		$userid = "U".$_SESSION['userid'];
		$conn=mysqli_connect("localhost","root","","markethub");
		// $conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
		$pid = base64_decode($_GET['id']);
		$results = mysqli_query($conn,"SELECT * FROM tbl_products WHERE id='$pid'");
			
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
				'%pid%' => $v['id'],
				'%image1%' => SITE_IMG.'Products/'.$v['imageName'],
				'%image2%' => SITE_IMG.'Products/'.$v['image2'],
				'%image3%' => SITE_IMG.'Products/'.$v['image3'],
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
				'%link%'=>SITE_MOD.'singleproduct-nct/?id='.base64_encode($v['id']),
				'%update%' => "../updateproduct-nct?id=".$v['id'],
				'%delete%' => "../deleteall-nct?deleteproduct=".$v['id'],
				);
				$html .= get_view(DIR_TMPL . $this->module . "/getproductdetails-nct.tpl.php",$replace);
			}
		}
		return $html;
	}

	public function getPageContent() {
		$replace=array(
		   '%UPDATEPRODUCT%' => $this->getProductsTable()
		);
		return get_view(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
	}
}

?>
