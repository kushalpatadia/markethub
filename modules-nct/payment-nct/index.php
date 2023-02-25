<?php

$reqAuth = false;
$module = 'payment-nct';
require_once "../../includes-nct/config-nct.php";
require_once "../../includes-nct/database-nct.php";

//require_once "class.payment-nct.php";

extract($_REQUEST);

$winTitle = 'Payment';
$headTitle = 'Payment' ;
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle));

$conn=mysqli_connect("localhost","root","","markethub");

$address = $_GET['address_name'];
$zipcode = $_GET['address_zip'];
$firstname = $_POST['first_name'];
$country_code = $_POST['address_country_code'];
echo $zipcode;
echo $address;
echo $firstname;
echo $country_code;

require_once DIR_TMPL . "parsing-nct.tpl.php";
?>