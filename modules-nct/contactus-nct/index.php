<?php
#############################################################
# Project:			Demo Project - Contact Us Page
# Developer ID:		107
# Page: 			Contact Us
# Started Date: 	19-Jul-2016
##############################################################
$reqAuth = false;
$module = 'contactus-nct';
require_once "../../includes-nct/config-nct.php";
require_once "class.contactus-nct.php";


extract($_REQUEST);
$winTitle = 'Contact Us ';

$headTitle = 'Contact Us ';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle/*, "author" => AUTHOR*/));


if(isset($_POST['sbtcontact']))
{ 
	extract($_POST);
	$email=isset($email)?$email:'';
	$message=isset($message)?$message:'';
    $firstName=isset($firstName)?$firstName:'';
    $subject=isset($subject)?$subject:'';
	$date =  date('Y-m-d H:i:s'); 
	$ip = get_ip_address();
	    
	if($email != '' && $message != '' && $firstName != '' && $subject != '') 
	{
		$insertarray=array("email"=>$email,"firstName"=>$firstName,"subject"=>$subject,"ipAddress"=>$ip,"message"=>$message,"createdDate"=>$date);
	             
            $insert_id=$db->insert('tbl_contact_us',$insertarray)->getLastInsertId();
	        $msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=>'Your query has been submited successfully,Very soon you will receive your answer.'));   
	        redirectPage(SITE_MOD.'contactus-nct/');
	        /*$arrayCont = array('email'=>$email,'username'=>$firstName.' '.$lastName,'message'=>$message);
	       
	        $array = generateEmailTemplate('user_feedback',$arrayCont);
	        */
	        }else{
	        	$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'err','var'=>'Fill all value first.'));
	        }
	    
} 
$obj = new ContactUs($module, 0, issetor($token));
$pageContent = $obj->getPageContent();

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>