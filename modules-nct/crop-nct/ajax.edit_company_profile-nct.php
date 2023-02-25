<?php
require_once("../../includes-nct/config-nct.php");


$action = isset($_GET["action"]) ? $_GET["action"] : (isset($_POST["action"]) ? $_POST["action"] : '');
$obj = new Home($module, 0, issetor($token));
$return_array = array();

	if(isset($_POST['action']) && $_POST['action'] == 'getStates'){
		extract($_POST);
		echo json_encode($objHome->getStates($cid,0));
		exit;
	}
	elseif(isset($_POST['action']) && $_POST['action'] == 'getCities'){
		extract($_POST);
		echo json_encode($objHome->getCities($sid,0));
		exit;
	}
echo json_encode($return_array);
exit;
?>