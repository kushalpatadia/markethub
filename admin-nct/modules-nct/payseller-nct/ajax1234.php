<?php
$module = 'payseller-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.payseller-nct.php";

$paypalemail = $_GET['paypalemail'];
$year = $_GET['year'];
$month = $_GET['month'];
$obj1 = new ManageOrder($module, 0, issetor($token));

$pageContent = $obj1->getOrderTable($paypalemail,$year,$month);


?>