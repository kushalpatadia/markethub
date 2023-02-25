<?php
class FAQ {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
		
	}
	public function getPageContent() {
		return html(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php");
	}
}
?>