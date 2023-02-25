<?php

class SearchP {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
		
	}

	public function getHeaderContent() {
		return get_view(DIR_TMPL . "header-nct.tpl.php");		
	}
	
	public function getFooterContent() {
		return get_view(DIR_TMPL . "footer-nct.tpl.php");		
	}

	public function getSearchProduct($sstring) {
		$html = null;
		if (empty($sstring)) {
			$html = "<center><img src='".SITE_IMG."No-results-found.jpg' alt='NO Image Found'></center>";
			echo "<script>window.onload = function() { toastrAlert('warning','Please Enter Some String') }</script>";
		}
		else
		{
			//$results = $this->db->select("tbl_products",'*',array('pcheck'=>'y'))->results();
			$conn=mysqli_connect("localhost","root","","markethub");
			// $conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");;
			$query = "SELECT * FROM tbl_products 
				WHERE isActive='y' AND ((`title` LIKE '%".$sstring."%') 
				OR (`category` LIKE '%".$sstring."%') 
				OR (`subcategory` LIKE '%".$sstring."%') 
				OR (`brand` LIKE '%".$sstring."%'))";

			//echo $query;	
			$results = mysqli_query($conn,$query);
			$check = mysqli_num_rows($results);
			if ($check == "") {
				$html = "<center><img src='".SITE_IMG."No-results-found.jpg' alt='NO Image Found'></center>";
				echo "<script>window.onload = function() { toastrAlert('error','Search Product Not Found') }</script>";
			}
			if(!empty($results)){
				foreach ($results as $k => $v) {
					$replace = array(
						'%image%'=>SITE_IMG.'Products/'.$v['imageName'],
						'%title%'=>$v['title'],
						'%price%'=>$v['price'],
						'%addtocart%'=>base64_encode($v['id']),
						'%addtowishlist%'=>base64_encode($v['id']),
						'%link%'=>SITE_MOD.'singleproduct-nct/?id='.base64_encode($v['id'])
					);
					$html .= get_view(DIR_TMPL . $this->module . "/searchproducts-nct.tpl.php",$replace);
				}
			}
		}
		return $html;
	}

	public function getPageContent($searching) {	
		$sstring= $searching;
		$replace = array(
			'%SEARCHPRODUCTS%' => $this->getSearchProduct($sstring),
			);
		return get_view(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);	
	}
}

?>
