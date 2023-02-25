<?php

class ManageSite {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
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
		$conn=mysqli_connect("localhost","root","","markethub");
		$link = "SELECT * FROM tbl_site"; 
		$exe = mysqli_query($conn,$link);
		$links = mysqli_fetch_assoc($exe);
		$sitename = $links["site_name"];
		$tagline = $links["site_tagline"];
		$fblink = $links["fb_link"];
		$pinlink = $links["pinterest_link"];
		$linkedinlink = $links["linkedin_link"];
		$behancelink = $links["behance_link"];
		$youtubelink = $links["youtube_link"];
		$vimeolink = $links["vimeo_link"];
		$phoneno = $links["phoneno"];
		$email = $links["email"];
		$map = $links["map"];
		$address = $links["contact_address"];
		$officeno = $links["contact_officeno"];
		$mobno = $links["contact_mob"];
		$mail1 = $links["contact_mail1"];
		$mail2 = $links["contact_mail2"];
		$copyrights = $links["site_copyrights"];
		$replace=array(
			'%sitename%' => $sitename,
			'%tagline%' => $tagline,
			'%fblink%' => $fblink,
			'%pinlink%' => $pinlink,
			'%linkedinlink%' => $linkedinlink,
			'%behancelink%' => $behancelink,
			'%youtubelink%' => $youtubelink,
			'%vimeolink%' => $vimeolink,
			'%phoneno%' => $phoneno,
			'%email%' => $email,
			'%map%' => $map,
			'%address%' => $address,
			'%officeno%' => $officeno,
			'%mobno%' => $mobno,
			'%email1%' => $mail1,
			'%email2%' => $mail2,
			'%copyrights%' => $copyrights,
			'%DYNAMIC-MENU%' => $this->getDynamicMenu(),
		);
		return get_view(DIR_ADMIN_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
	}
}

?>
