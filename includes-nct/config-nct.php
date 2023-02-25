<?php
ob_start();
error_reporting(0);
session_start();
set_time_limit(0);

//error_reporting(0);

session_set_cookie_params(3600);
session_name('NCT');
date_default_timezone_set('Asia/Kolkata');

$include_sharing_js = false;

$header_panel = true;
$footer_panel = true;
$styles = array();
$scripts = array();

$reqAuth = isset($reqAuth) ? $reqAuth : false;

$allowedUserType = isset($allowedUserType) ? $allowedUserType : 'a';

$adminUserId = (isset($_SESSION["adminUserId"]) && $_SESSION["adminUserId"] > 0 ? (int) $_SESSION["adminUserId"] : 0);

$sessUserId = (isset($_SESSION["user_id"]) && $_SESSION["user_id"] > 0 ? (int) $_SESSION["user_id"] : 0);
$sessFirstName = (isset($_SESSION["first_name"]) && $_SESSION["first_name"] != '' ? $_SESSION["first_name"] : NULL);
$sessLastName = (isset($_SESSION["last_name"]) && $_SESSION["last_name"] != '' ? $_SESSION["last_name"] : NULL);
$sessUserType = (isset($_SESSION["user_type"]) && $_SESSION["user_type"] != '' ? $_SESSION["user_type"] : '');

$toastr_message = isset($_SESSION["toastr_message"]) ? $_SESSION["toastr_message"] : NULL;
unset($_SESSION['toastr_message']);
$memberId = isset($sessUserId)?$sessUserId : 0;
global $db, $helper, $fields, $module, $adminUserId, $sessUserId, $objHome, $main_temp, $breadcrumb, $Permission, $memberId;
global $head, $header, $left, $right, $footer, $content, $title, $resend_email_verification_popup,$conn;

require_once('database-nct.php');

require_once('functions-nct/class.pdohelper.php');
require_once('functions-nct/class.pdowrapper.php');
require_once('functions-nct/class.pdowrapper-child.php');
//require_once('mime_type_lib.php');

$dbConfig = array("host" => DB_HOST, "dbname" => DB_NAME, "username" => DB_USER, "password" => DB_PASS);
$db = new PdoWrapper($dbConfig);
//$db = new PdoWrapperChild($dbConfig);

$helper = new PDOHelper();

$error_log = true;

$db->setErrorLog($error_log);


require_once('constant-nct.php');

require_once('functions-nct/functions-nct.php'); 
//require_once('pagination.php');
require_once(DIR_FUN . 'validation.class.php');

curPageURL();
curPageName();

checkIfIsActive();
Authentication($reqAuth, true, $allowedUserType);

require("class.main_template-nct.php");

$main = new MainTemplater();
$msgType = isset($_SESSION["msgType"])?$_SESSION["msgType"]:NULL;
unset($_SESSION['msgType']);

if (domain_details('dir') == 'admin-nct') {
    $left_panel = true;
   require_once(DIR_ADM_INC . 'functions-nct/admin-function-nct.php');

    require_once(DIR_ADM_MOD . 'home-nct/class.home-nct.php');
    $objHome = new Home($module, 0);
    
} else {
    require_once(DIR_MOD . 'home-nct/class.home-nct.php');
    $objHome = new Home("home-nct");
}

$objPost = new stdClass();

//$description = SITE_NM;
$description = "";
$keywords = "";
