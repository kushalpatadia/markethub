<?php
class UpdateProfile {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function getUpdateProfile() {			
		$html = null;
		$id = $_SESSION['userid'];
		$conn=mysqli_connect("localhost","root","","markethub");;
		$results = mysqli_query($conn,"SELECT * FROM register_users WHERE u_id='$id'");	
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$replace = array(
					'%username%'=>$v['username'],
					'%email%'=>$v['email'],
					'%mobileno%' => $v['mobileno'],
					'%ldate%'=>$v['last_updatetime'],
				);
				$html .= get_view(DIR_TMPL . $this->module . "/showupdateprofile-nct.tpl.php",$replace);
			}
		}
		return $html;
	}
	
	public function getPageContent() {	
		if (isset($_SESSION['userid'])) {
			$replace = array(
			'%PROFILE%' => $this->getUpdateProfile()
			);
		}
		else
		{
			header('Location: ../home-nct');
		}
		return get_view(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);	
	}
}

?>
