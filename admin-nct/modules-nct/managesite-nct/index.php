<?php


$reqAuth = false;
$module = 'managesite-nct';
require_once "../../../includes-nct/config-nct.php";
require_once "class.managesite-nct.php";

$winTitle = 'Manage Site';

$headTitle = 'Manage Site';
$metaTag = getMetaTags(array("description" => $winTitle, "keywords" => $headTitle /*, "author" => AUTHOR*/));

if (isset($_POST['sbtsitedetails'])){
	$conn=mysqli_connect("localhost","root","","markethub");
	$sitename = $_POST['sitename'];
	$tagline = $_POST['tagline'];
	$tagline = mysqli_real_escape_string($conn,$tagline);
	$fb = $_POST['fblink'];
	$pin = $_POST['pinlink'];
	$linkedin = $_POST['linkedinlink'];
	$behance = $_POST['behancelink'];
	$youtube = $_POST['youtubelink'];
	$vimeo = $_POST['vimeolink'];
	$email = $_POST['email'];
	$phoneno = $_POST['phoneno'];
	$address = $_POST['address'];
	$officeno = $_POST['officeno'];
	$mobno = $_POST['mobno'];
	$email1 = $_POST['email1'];
	$email2 = $_POST['email2'];
	$map = $_POST['map'];
	$copyrights = $_POST['copyrights'];

	$update = "UPDATE tbl_site SET site_name='$sitename',site_tagline='$tagline',fb_link='$fb',pinterest_link='$pin',linkedin_link='$linkedin',behance_link='$behance',
	youtube_link='$youtube',vimeo_link='$vimeo',email='$email',phoneno='$phoneno',contact_address='$address',contact_officeno='$officeno',`contact_mob`='$mobno',`contact_mail1`='$email1',`contact_mail2`='$email2',`map`='$map',`site_copyrights`='$copyrights' WHERE s_id='1'";
	mysqli_query($conn,$update);
	echo '<script>
		    setTimeout(function() {
		        swal({
		            title: "Site Setting",
		            text: "Updated Successfully",
		            type: "success",
		            timer: 1500,
		            showConfirmButton: false
		        });
		    }, 1000);
    		</script>';
}

if (isset($_SESSION['adminusername'])){
$obj = new ManageSite($module, 0, issetor($token));

$pageContent = $obj->getPageContent();
}
else{
	redirectPage(SITE_ADMIN_URL);
}

require_once DIR_ADMIN_TMPL . "parsing-nct.tpl.php";
?>