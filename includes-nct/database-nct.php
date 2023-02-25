<?php
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "markethub");
    define("PROJECT_DIRECTORY_NAME", "markethub");

    define('SITE_URL', 'http://' . $_SERVER["SERVER_NAME"] . '/markethub/');
    define('ADMIN_URL', SITE_URL . 'admin-nct/');
    define('DIR_URL', $_SERVER["DOCUMENT_ROOT"] . '/markethub/');

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // Check connection
	//echo '<pre>';print_r($conn);exit;
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
