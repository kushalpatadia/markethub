<?php
class Profile {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function getProfile() {			
		$html = null;
		$id = $_SESSION['userid'];
		$conn=mysqli_connect("localhost","root","","markethub");;
		$results = mysqli_query($conn,"SELECT * FROM register_users WHERE u_id='$id'");	
		if(!empty($results)){
			foreach ($results as $k => $v) {
				$replace = array(
					'%ldate%'=>$v['last_updatetime'],
					'%username%'=>$v['username'],
					'%email%'=>$v['email'],
					'%mobileno%' => $v['mobileno'],
				);
				$html .= get_view(DIR_TMPL . $this->module . "/showprofile-nct.tpl.php",$replace);
			}
		}
		return $html;
	}
	
	public function getPageContent() {	
		if (isset($_SESSION['userid'])) {
			$replace = array(
			'%PROFILE%' => $this->getProfile()
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
