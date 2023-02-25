<?php
class Edit_Company_profile extends Home{
	function __construct($module = "", $id = 0) {
		global $fields,$memberId;
		$this->fields = $fields;
		$this->memberId = $memberId;

		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;
		}
		$this->module = $module;
		$this->id = $id;
	}
	
	public function getPageContent() {
		$final_result = '';
		
		$sessUserId = $this->sessUserId;

		$html = new MainTemplater(DIR_TMPL . "{$this->module}/{$this->module}.tpl.php");
		$html = $html->parse();

		$qrySel = $this->db->pdoQuery("SELECT * FROM tbl_users WHERE tbl_user_id='".$sessUserId."' AND isActive = 'y'");
		$company = $qrySel->result();

		$company_name = $company['user_name'] ? $company['user_name'] : '';
		$country = $company['country'] ? $company['country'] : '';
		$state = $company['state'] ? $company['state'] : '';
		$city = $company['city'] ? $company['city'] : '';
		
		$company_type = gettablevalue("tbl_user_type","user_type",array("tbl_user_type_id"=>$company['tbl_user_type_id']));

		if($company['profile_img'] == '' || $company['profile_img'] == NULL)
		{
			$profile_img = NOIMG;
			
		}else{

			$profile_img = SITE_UPD_COMPANY_PROFILE."th1_".$company['profile_img'];
		}
			

		// if($company['company_cover'] == '' || $company['company_cover'] == NULL){
		// 	$cover_img = NOIMG;
			
		// }else{

		// 	$cover_img = SITE_UPD_COMPANY_COVER."th1_".$company['company_cover'];
		// }

		/*Company Cover Image*/
		
		$cover_img = checkImage($company['company_cover'],4);


		$states = $this->getStates($country,$state);
		$city = $this->getCities($state,$city);

		/*COMPANY_DETAILS*/
		$qrySel= $this->db->pdoQuery("SELECT * FROM tbl_company_details as c LEFT JOIN tbl_users as u on(c.tbl_user_id=u.tbl_user_id) WHERE c.tbl_user_id='".$sessUserId."'");

		if($qrySel->affectedRows() > 0 ){
			
			$company_details = $qrySel->result();

			$company_details_id = $company_details['tbl_company_details_id'];		

			$industry=$this->getIndustry($company_details['tbl_industry_id']);

			$establish_date =$company_details['establish_date'];
			
			$about_company = $company_details['about_company'];

		}else{
			$company_details_id = 0;
			$about_company ='';
			$establish_date ='';
			$industry = $this->getIndustry();
			

		}

		$fields = array(
				"%COVER_IMAGE%",
				"%PROFILE_IMG%",
				"%COMPANY_NAME%",
				"%OPTION_INDUSTRY%",
				"%OPTION_COUNTRY%",
				"%OPTION_STATE%",
				"%OPTION_CITY%",
				"%ESTABLISH_DATE%",
				"%ABOUT_COMPANY%",
				"%TBL_COMPANY_DETAILS_ID%"
				);

		$fields_replace = array(
				$cover_img,
				$profile_img,
				$company_name,
				$industry,
				$this->getCountry($country),
				$states['states'],
				$city['cities'],
				$establish_date,
				$about_company,
				$company_details_id

			); 

		$final_result = str_replace($fields,$fields_replace,$html);
		return $final_result;
	}	
		
}
?>