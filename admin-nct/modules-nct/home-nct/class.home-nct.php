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
		return get_view(DIR_ADMIN_TMPL . "header-nct.tpl.php");		
	}
	
	public function getFooterContent() {
		return get_view(DIR_ADMIN_TMPL . "footer-nct.tpl.php");		
	}

	public function getPageContent() {	
		return get_view(DIR_ADMIN_TMPL . $this->module . "/" . $this->module . ".tpl.php");	
	}
}

?>
