<?php

class StaticPages {
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

	public function getPageContent($page) {
		$conn = mysqli_connect("localhost","root","","markethub");
		$getpage = mysqli_query($conn,"SELECT * FROM tbl_static_pages WHERE page_link LIKE '%$page'");

		foreach ($getpage as $k => $v) {
			$heading = $v['page_title'];
			$pagecontent = $v['page_content'];
		}

		$exe = mysqli_query($conn,$getpage);
		$replace = array(
			'%pageheading%'=> $heading,
			'%pagecontent%' => $pagecontent,

		);
		return get_view(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);	
	}
}

?>
