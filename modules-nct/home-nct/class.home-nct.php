<?php
class Home {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
		
	}

	public function getHeaderContent() {
		$html = null;
		$total= '00.0';
		$item = 0;
	 	$conn=mysqli_connect("localhost","root","","markethub");
		$link = "SELECT * FROM tbl_site"; 
		$exe = mysqli_query($conn,$link);
		$links = mysqli_fetch_assoc($exe);
		$sitename = $links["site_name"];
		$words = explode(' ', $sitename);
		foreach ($words as $key => $value) {
			$name[] = $value;
		}
		$tagline = $links["site_tagline"];
		$fblink = $links["fb_link"];
		$pinlink = $links["pinterest_link"];
		$linkedinlink = $links["linkedin_link"];
		$behancelink = $links["behance_link"];
		$youtubelink = $links["youtube_link"];
		$vimeolink = $links["vimeo_link"];
		$phoneno = $links["phoneno"];
		$email = $links["email"];

		if(isset($_SESSION['userid'])){
	 	$u_id = $_SESSION['userid'];

	 	$results = mysqli_query($conn,"SELECT * FROM tbl_products INNER JOIN tbl_cart ON 
	 							tbl_products.id=tbl_cart.p_id WHERE u_id=$u_id");
		$item= mysqli_num_rows($results);
		}
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$total=$total+$v['price'];
			}
		}

		$replace = array(
			'%sitename1%' => $name[0],
			'%sitename2%' => $name[1],
			'%tagline%' => $tagline,
			'%amount%' => $total, 
			'%item%' => $item,
			'%NOTIFICATION%' =>  $this->headerContent(),
			'%fblink%' => $fblink,
			'%pinlink%' => $pinlink,
			'%linkedinlink%' => $linkedinlink,
			'%behancelink%' => $behancelink,
			'%youtubelink%' => $youtubelink,
			'%vimeolink%' => $vimeolink,
			'%phoneno%' => $phoneno,
			'%email%' => $email,
			); 
		$html .= get_view(DIR_TMPL . "header-nct.tpl.php",$replace);
		return $html;
	}

	public function headerContent()
	{
		$html=null;
		$conn=mysqli_connect("localhost","root","","markethub");
		if(isset($_SESSION['userid'])){
		 	$u_id = $_SESSION['userid'];
			$query = "SELECT * FROM tbl_products AS tp INNER JOIN tbl_notifications AS tn ON 
		 			  tp.id=tn.p_id WHERE u_id=$u_id ORDER BY n_id DESC";
			$exe = mysqli_query($conn,$query);
			foreach ($exe as $k => $v) {
				$pid = base64_encode($v['p_id']);
				$subject = $v['title'].' '.$v['message'];
				$date = $v['n_date'];
				$replace=array(
					'%SUBJECT%' => $subject,
					'%DAY%' => $date,
					'%PRODUCT%' => SITE_MOD.'updateproduct-nct/?id='.$pid,
					);
				$html .= get_view(DIR_TMPL . $this->module . "/notification-nct.tpl.php",$replace);
			}
		}
		return $html;
	}
	
	public function getFooterContent() {
		$conn=mysqli_connect("localhost","root","","markethub");
		$link = "SELECT * FROM tbl_site"; 
		$exe = mysqli_query($conn,$link);
		$links = mysqli_fetch_assoc($exe);
		$sitename = $links["site_name"];
		$words = explode(' ', $sitename);
		foreach ($words as $key => $value) {
			$name[] = $value;
		}
		$tagline = $links["site_tagline"];
		$copyrights = $links["site_copyrights"];

		$replace = array(
		'%sitename1%' => $name[0],
		'%sitename2%' => $name[1],
		'%tagline%' => $tagline,
		'%copyrights%' => $copyrights,
		); 

		return get_view(DIR_TMPL . "footer-nct.tpl.php",$replace);		
	}

	public function getSliderUp() {			
		$html = null;
		$results = $this->db->select("tbl_slider",'*',array('isUpDown'=>'u','isActive' =>'a'))->results();	
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$replace = array(
					'%img%'=>SITE_IMG.'Slider/'.$v['imageName'],
					'%discount%'=>$v['discount'],
				);
				$html .= get_view(DIR_TMPL . $this->module . "/home-sliderup-nct.tpl.php",$replace);
			}
		}
		return $html;
	}

	public function getSliderDown() {			
		$html = null;
		$results = $this->db->select("tbl_slider",'*',array('isUpDown'=>'d','isActive' =>'a'))->results();
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$replace = array(
					'%img%'=>SITE_IMG.'Slider/'.$v['imageName'],
					'%discount%'=>$v['discount'],
					'%description%' => $v['description'],
				);
				$html .= get_view(DIR_TMPL . $this->module . "/home-sliderdown-nct.tpl.php",$replace);
			}
		}
		return $html;
	}


	public function getNewArrivals() {			
		$html = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		$results = mysqli_query($conn,"SELECT * FROM tbl_products WHERE isActive = 'y' ORDER BY id DESC LIMIT 0,4");
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$replace = array(
					'%image%'=>SITE_IMG.'Products/'.$v['imageName'],
					'%title%'=>$v['title'],
					'%price%' => $v['price'],
					'%link%'=>SITE_MOD.'singleproduct-nct/?id='.base64_encode($v['id']),
					// '%addtocart%'=>SITE_MOD.'addcart-nct/?id='.base64_encode($v['id']).'&module='.$this->module,
					'%addtocart%'=>base64_encode($v['id']),
					// '%addtowishlist%'=>SITE_MOD.'addwishlist-nct/?id='.base64_encode($v['id']).'&module='.$this->module,
					'%addtowishlist%'=>base64_encode($v['id']),
				);
				$html .= get_view(DIR_TMPL . $this->module . "/home-newarrivals-nct.tpl.php",$replace);
			}
		}
		return $html;
	}

	public function getPopularProducts() {			
		$html = null;
		//$results = $this->db->select("tbl_products",'*','LIMIT 0,4')->results();	
		$conn=mysqli_connect("localhost","root","","markethub");
		$query = "SELECT * FROM tbl_products WHERE isActive = 'y' ORDER BY purchased DESC LIMIT 0,4";
		$results = mysqli_query($conn,$query);
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$replace = array(
					'%image%'=>SITE_IMG.'Products/'.$v['imageName'],
					'%title%'=>$v['title'],
					'%price%' => $v['price'],
					'%link%'=>SITE_MOD.'singleproduct-nct/?id='.base64_encode($v['id']),
					// '%addtocart%'=>SITE_MOD.'addcart-nct/?id='.base64_encode($v['id']).'&module='.$this->module,
					'%addtocart%'=>base64_encode($v['id']),
					// '%addtowishlist%'=>SITE_MOD.'addwishlist-nct/?id='.base64_encode($v['id']).'&module='.$this->module,
					'%addtowishlist%'=>base64_encode($v['id']),
				);
				$html .= get_view(DIR_TMPL . $this->module . "/home-popularproducts-nct.tpl.php",$replace);
			}
		}
		return $html;
	}

	public function getPageContent() {	
		$replace = array(
			'%new%' => $this->getNewArrivals(),
			'%POPULARPRODUCTS%' => $this->getPopularProducts(),
			'%SLIDERUP%' => $this->getSliderUp(),
			'%SLIDERDOWN%' => $this->getSliderDown()
			);
		//echo "hello hhhhh";
		return get_view(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);	
	}
}

?>
