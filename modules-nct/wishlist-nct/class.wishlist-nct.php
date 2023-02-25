<?php

class WishList {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function getWishListContent() {			
		$html = null;
		if(isset($_SESSION['userid'])){
	 	$conn=mysqli_connect("localhost","root","","markethub");;
	 	$u_id = $_SESSION['userid'];

	 	$results = mysqli_query($conn,"SELECT * FROM tbl_products INNER JOIN tbl_wishlist ON 
	 							tbl_products.id=tbl_wishlist.p_id WHERE u_id=$u_id");
		}
		else{
			echo "<script>alert('You must signin for this..')</script>";
			echo "<script>window.location='../signin-nct/'</script>";
		}
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$available=$v['qty_available'];
				if($available == 0){
					$available = "Out Of Stock";
				}
				else{
					$available = NULL;
				}
				$replace = array(
				'%availability%'=>$available,
				'%image%'=>SITE_IMG."Products/".$v['imageName'],
				'%title%'=>$v['title'],
				'%price%'=>$v['price'],	
				'%dlink%'=>base64_encode($v['id']),
				'%color%'=>$v['color'],
				'%specification%'=>$v['specification'],
				'%link%'=>SITE_MOD.'singleproduct-nct/?id='.base64_encode($v['id']),
				'%addtocart%'=>base64_encode($v['id']),
				);
				$html .= get_view(DIR_TMPL . $this->module . "/showwishlist-nct.tpl.php",$replace);
			}
		}
		
		$check= mysqli_num_rows($results);
		if ($check == 0)
		{
			$html = "<center><img src=".SITE_IMG."wishlist-empty.jpg></center><br><br>";
		}
		return $html;
	}

	public function getItemContent() {			
		$html = null;
		if(isset($_SESSION['userid'])){
		$conn=mysqli_connect("localhost","root","","markethub");;
	 	$u_id = $_SESSION['userid'];

	 	$results = mysqli_query($conn,"SELECT * FROM tbl_products INNER JOIN tbl_wishlist ON 
	 							tbl_products.id=tbl_wishlist.p_id WHERE u_id=$u_id");
	 	$html= mysqli_num_rows($results);
		}
		return $html;
	}
	public function getPageContent() {	
		$replace = array(
			'%WISHLIST%' => $this->getWishListContent(),
			'%itemnumber%' => $this->getItemContent()
			);
		return get_view(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);	
	}
}

?>
