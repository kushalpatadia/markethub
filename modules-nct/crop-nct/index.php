<?php

	$reqAuth = true;
	$module = 'edit_company_profile-nct';
	require_once "../../includes-nct/config-nct.php";
	require_once "class.edit_company_profile-nct.php";

 	extract($_REQUEST);
 	$action = isset($_GET["action"]) ? $_GET["action"] : (isset($_POST["action"]) ? $_POST["action"] : '');
	$page = (isset($_REQUEST['page']) && $_REQUEST['page']!='')?$_REQUEST['page']:1;

	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;

	$objPost = new stdClass();
	$mainObj = new Edit_Company_profile($module);
	
	$winTitle = 'Company Profile - ' . SITE_NM;
    $headTitle = "Company Profile";

    $metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle, "author" => AUTHOR));
	
	if(isset($_POST['sbt_profile']) && $_SERVER['REQUEST_METHOD']=="POST"){
        extract($_POST);
       	//_print_r($_POST);
        //exit;

       	if($company_name != ''){

            $company = array(

            	'user_name' =>isset($company_name) ? $company_name : '',
     
            	'country' =>isset($country) ? $country : '',

            	'state'=>isset($state) ? $state : '',

            	'city' =>isset($city) ? $city: '',


            	);

            $db->update("tbl_users",$company,array('tbl_user_id'=>$_SESSION['sessUserId']));

            $company_details =array(
            	
            	'tbl_user_id'=>$_SESSION['sessUserId'],

                'tbl_industry_id'=>isset($industry) ? $industry : '',

            	'establish_date'=>isset($establish_date) ? $establish_date : '',

            	'about_company'=>isset($about_company) ? $about_company : '',

            	);

            $tbl_company_details_id =isset($tbl_company_details_id) ? $tbl_company_details_id : 0;

            if($tbl_company_details_id != 0){
                
                $db->update("tbl_company_details",$company_details,
                        array('tbl_user_id'=>$_SESSION['sessUserId'],
                        "tbl_company_details_id"=>$tbl_company_details_id));

            }else{

                $db->insert("tbl_company_details",$company_details);
            }

            $msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=>'Profile has been successfully Updated.'));

            redirectPage(SITE_URL.'Company-profile');

        }else{

            $msgType = $_SESSION["msgType"] = disMessage(array('type'=>'err','var'=>'Please Fill All values.'));
        }

    }

	$pageContent = $mainObj->getPageContent();

    require_once DIR_THEME . "theme.template.php";
	
?>