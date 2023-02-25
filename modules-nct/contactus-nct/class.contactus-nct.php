<?php
class ContactUs {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
		
	}
	public function getPageContent() {
		$conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
		$sql = "SELECT * FROM tbl_site";
		$exe = mysqli_query($conn,$sql);
		$details = mysqli_fetch_array($exe);
		$map = $details['map'];
		$address = $details['contact_address'];
		$officeno = $details['contact_officeno'];
		$mobno = $details['contact_mob'];
		$mail1 = $details['contact_mail1'];
		$mail2 = $details['contact_mail2'];
		$replace = array(
			'%map%' => $map,
			'%address%' => $address,
			'%officeno%' => $officeno,
			'%mobno%' => $mobno,
			'%mail1%' => $mail1,
			'%mail2%' => $mail2,
		);
		return get_view(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
	}

	
}

?>
