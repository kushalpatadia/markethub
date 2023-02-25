<?php
$module = 'logout-nct';
require_once "../../includes-nct/config-nct.php";
//session_start();
if(session_destroy()) // Destroying All Sessions
{
redirectPage(SITE_URL);// Redirecting To Home Page
}
?>