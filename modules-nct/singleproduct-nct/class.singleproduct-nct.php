<?php

class SingleProduct {
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

	public function getSingleProduct() {			
		$html = null;
	// 	//$results = $this->db->select("tbl_products",'*',array('pcheck'=>'y'))->results();
	 	$conn=mysqli_connect("localhost","root","","markethub");;
	 	$id=$_GET['id'];
	 	$id=base64_decode($id);
	 	$results = mysqli_query($conn,"SELECT * FROM tbl_products WHERE id='$id'");
		
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$available=$v['qty_available'];
				if($available == 0 || $available < 0){
					$available = "Out Of Stock";
				}
				else{
					$available = NULL;
				}
				$back = $v['color'];
				if ($back == 'White') {
					$back = 'background-color: Black;';
				}
				else
				{
					$back = null;
				}
				$image2 = $v['image2'];
				$image3 = $v['image3'];
				if($image2 == "noimage.jpeg"){
					$image2 = $v['imageName'];
				}
				else{
					$image2 = $v['image2'];
				}
				if($image3 == "noimage.jpeg"){
					$image3 = $v['imageName'];
				}
				else{
					$image3 = $v['image3'];
				}
				$replace = array(
					'%availability%'=>$available,
					'%Wback%'=>$back,
					'%image1%'=>SITE_IMG.'Products/'.$v['imageName'],
					'%image2%'=>SITE_IMG.'Products/'.$image2,
					'%image3%'=>SITE_IMG.'Products/'.$image3,
					'%description%'=>$v['shortDescription'],
					'%rating%'=>$v['rating'],
					'%title%'=>$v['title'],
					'%price%'=>$v['price'],
					'%size%'=>$v['size'],
					'%specification%'=>$v['specification'],
					'%additionalinfo%'=>$v['additionalinfo'],
					'%reviews%'=>$v['reviews'],
					'%color%'=>$v['color'],
					// '%addtocart%'=>SITE_MOD.'addcart-nct/?id='.base64_encode($v['id']).'&module='.$this->module,
					'%addtocart%'=>base64_encode($v['id']),
					// '%addtowishlist%'=>SITE_MOD.'addwishlist-nct/?id='.base64_encode($v['id']).'&module='.$this->module,
					'%addtowishlist%'=>base64_encode($v['id']),
				);
				$html .= get_view(DIR_TMPL . $this->module . "/singleproduct-show-nct.tpl.php",$replace);
			}
		}
		
		return $html;
	}
	
	public function getRelatedProduct() {			
		$html = null;
	 	$conn=mysqli_connect("localhost","root","","markethub");;
	 	$id=$_GET['id'];
	 	$id=base64_decode($id);
	 	$results = mysqli_query($conn,"SELECT * FROM tbl_products WHERE id='$id'");
		if(!empty($results)){
			foreach ($results as $k => $v) {
					$image1=SITE_IMG.'Products/'.$v['imageName'];
					$title=$v['title'];
					$price=$v['price'];
					$brand=$v['brand'];
					$category=$v['category'];
					$subcategory=$v['subcategory'];
			}
		}

		//related product logic
		$minprice = $price-2000;
		$maxprice = $price+2000;
		$query="SELECT * FROM tbl_products WHERE  subcategory = '$subcategory'AND id!='$id' AND price BETWEEN '$minprice' AND '$maxprice' LIMIT 0,4";
		//echo $query;
		$related = mysqli_query($conn,$query);
		$n=mysqli_num_rows($related);
		//echo $n;
		$time=5;
		foreach ($related as $k => $v) {
			//echo "inthe if condition";
				$replace = array(
					'%time%'=>$time,
					'%imglink%'=>SITE_IMG.'Products/'.$v['imageName'],
					'%addtocart%'=>base64_encode($v['id']),
					'%quickviewlink%'=>SITE_MOD.'singleproduct-nct/?id='.base64_encode($v['id']),
					'%addtowishlist%'=>base64_encode($v['id']),
					'%title%'=>$v['title'],
					'%price%'=>$v['price'],
					'%id%'=>$v['id']
				);
				$time=$time+10000;
				$html .= get_view(DIR_TMPL . $this->module . "/relatedproducts-nct.tpl.php",$replace);
		}
		if($n < 4){
			$limit = 4-$n;
			$query = "SELECT * FROM tbl_products WHERE  subcategory = '$subcategory'AND id!='$id' LIMIT 0,$limit";
			$related = mysqli_query($conn,$query);
			$time=5;
			foreach ($related as $k => $v) {
				//echo "inthe if condition";
					$replace = array(
						'%time%'=>$time,
						'%imglink%'=>SITE_IMG.'Products/'.$v['imageName'],
						'%addtocart%'=>base64_encode($v['id']),
						'%quickviewlink%'=>SITE_MOD.'singleproduct-nct/?id='.base64_encode($v['id']),
						'%addtowishlist%'=>base64_encode($v['id']),
						'%title%'=>$v['title'],
						'%price%'=>$v['price'],
						'%id%'=>$v['id']
					);
					$time=$time+10000;
					$html .= get_view(DIR_TMPL . $this->module . "/relatedproducts-nct.tpl.php",$replace);
			}
		}
		return $html;
	}

	public function getPageContent() {	
		$replace = array(
			'%SHOW%' => $this->getSingleProduct(),
			'%RELATED PRODUCTS%' => $this->getRelatedProduct()
			);
		return get_view(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);	
	}
}

?>
