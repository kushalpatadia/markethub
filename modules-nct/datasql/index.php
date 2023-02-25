<?php

$servername = "localhost";
$username = "demonquf_market";
$password = "M&~NB}CAUI^c";
$dbname = "demonquf_markethub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE IF NOT EXISTS `tbl_confirm_user` (
  `con_id` double NOT NULL AUTO_INCREMENT,
  `con_key` varchar(250) NOT NULL,
  `con_u_id` double NOT NULL,
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

// $sql = "ALTER TABLE `tbl_products` CHANGE `isActive` `isActive` ENUM( 'y', 'n', 'u' ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'n' COMMENT 'y=yes;n=no;u=updated'";
//$sql = "ALTER TABLE `register_users` CHANGE `status` `status` ENUM( 'a', 'd' ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'd' COMMENT 'a=active,d=deactive'";
?>