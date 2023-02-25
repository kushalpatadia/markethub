<?php
require_once ('facebook-php-sdk-v4-4.0-dev/autoload.php');
//import required class to the current scope
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRedirectLoginHelper;
class Registration {

	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function signinWithGoogle(){
		$html = null;
		$date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];
		$conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
		require_once ('libraries/Google/autoload.php');
		//Insert your cient ID and secret 
		//You can get it from : https://console.developers.google.com/
		$client_id = '1085071923066-q73oq7g5lg6obp3p347pdukjgkot3kc4.apps.googleusercontent.com'; 
		$client_secret = '_Ij7_rcIpaxLmXwDA_wycyLG';
		$redirect_uri = 'http://localhost/S-Markethub/modules-nct/signin-nct/';

		//database
		$db_username = "demonquf_market"; //Database Username
		$db_password = "M&~NB}CAUI^c"; //Database Password
		$host_name = "localhost"; //Mysql Hostname
		$db_name = 'demonquf_markethub'; //Database Name

		//incase of logout request, just unset the session var
		if (isset($_GET['logout'])) {
		  unset($_SESSION['access_token']);
		}

		/************************************************
		  Make an API request on behalf of a user. In
		  this case we need to have a valid OAuth 2.0
		  token for the user, so we need to send them
		  through a login flow. To do this we need some
		  information from our API console project.
		 ************************************************/
		$client = new Google_Client();
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setRedirectUri($redirect_uri);
		$client->addScope("email");
		$client->addScope("profile");

		/************************************************
		  When we create the service here, we pass the
		  client to it. The client then queries the service
		  for the required scopes, and uses that when
		  generating the authentication URL later.
		 ************************************************/
		$service = new Google_Service_Oauth2($client);

		/************************************************
		  If we have a code back from the OAuth 2.0 flow,
		  we need to exchange that with the authenticate()
		  function. We store the resultant access token
		  bundle in the session, and redirect to ourself.
		*/

		if (isset($_GET['code'])) {
		  $client->authenticate($_GET['code']);
		  $_SESSION['access_token'] = $client->getAccessToken();
		  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
		  exit;
		}

		/************************************************
		  If we have an access token, we can make
		  requests, else we generate an authentication URL.
		 ************************************************/
		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
		  $client->setAccessToken($_SESSION['access_token']);
		} else {
		  $authUrl = $client->createAuthUrl();
		}


		//Display user info or display login url as per the info we have.
		// echo '<div style="margin:20px">';
		if (isset($authUrl)){ 
			//show login url
			$replace = array(
			'%signinwithgoogle%'=>$authUrl,
			);
			$html .= get_view(DIR_TMPL . $this->module . "/signingoogle-nct.tpl.php",$replace);
			return $html;
		} else {
			
			$user = $service->userinfo->get(); //get user info 
			$_SESSION['login_user']=$user->email;
			$_SESSION['username']=$user->name;
			// connect to database
			$mysqli = new mysqli($host_name, $db_username, $db_password, $db_name);
		    if ($mysqli->connect_error) {
		        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		    }
			
			//check if user exist in database using COUNT
			$result = $mysqli->query("SELECT COUNT(oauth_uid) as usercount FROM register_users WHERE oauth_uid=$user->id");
			$user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist
			
			//show user picture
			// echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
			
			if($user_count) //if user already exist change greeting text to "Welcome Back"
		    {
		        // echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
		        $update = "UPDATE register_users SET last_logintime='$date' WHERE oauth_uid='$user->id'";
		        mysqli_query($conn,$update);
		        $retrieve= "SELECT u_id FROM register_users WHERE oauth_uid='$user->id'";
		        $result = mysqli_query($conn,$retrieve);
		        foreach ($result as $k => $v) {
		        	$_SESSION['userid'] = $v['u_id'];
		        }
		        redirectPage(SITE_URL);
		    }
			else //else greeting text "Thanks for registering"
			{ 
		        // echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
		        $query = "INSERT INTO `register_users`(`username`, `email`, `oauth_provider`, `oauth_uid`, `created_date`, `last_logintime`,`ipaddress`) VALUES ('$user->name','$user->email','Google','$user->id','$date','$date','$ip')";
		        mysqli_query($conn,$query);
		        $retrieve= "SELECT u_id FROM register_users WHERE oauth_uid='$user->id'";
		        $result = mysqli_query($conn,$retrieve);
		        foreach ($result as $k => $v) {
		        	$_SESSION['userid'] = $v['u_id'];
		        }
		        redirectPage(SITE_URL);
				// $statement = $mysqli->prepare("INSERT INTO google_users (google_id, google_name, google_email, google_link, google_picture_link) VALUES (?,?,?,?,?)");
				// $statement->bind_param('issss', $user->id,  $user->name, $user->email, $user->link, $user->picture);
				// $statement->execute();
				// echo $mysqli->error;
		    }
			
			//print user details
			// echo '<pre>';
			// print_r($user);
			// echo '</pre>';
		}
		// echo '</div>';

	}

	public function signinWithFacebook(){
		$html = null;
		$date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];
		$conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
		require_once __DIR__ . "/facebook-php-sdk-v4-4.0-dev/autoload.php"; //include autoload from SDK folder
		$app_id				= '1207873772623378';  //localhost
		$app_secret 		= 'a72809142b4ec20a99b1642a2ed1bdb3';
		$required_scope 	= 'public_profile, publish_actions'; //Permissions required
		$redirect_url 		= 'http://localhost/S-Markethub/modules-nct/signin-nct/index.php'; //FB redirects to this page with a code

		//MySqli details for saving user details
		$mysql_host			= 'localhost';
		$mysql_username		= 'demonquf_market';
		$mysql_password		= 'M&~NB}CAUI^c';
		$mysql_db_name		= 'demonquf_markethub';

		
		FacebookSession::setDefaultApplication($app_id , $app_secret);
		$helper = new FacebookRedirectLoginHelper($redirect_url);

		try {
		  $session = $helper->getSessionFromRedirect();
		} catch(FacebookRequestException $ex) {
			die(" Error : " . $ex->getMessage());
		} catch(\Exception $ex) {
			die(" Error : " . $ex->getMessage());
		}


		//if user wants to log out
		if(isset($_GET["log-out"]) && $_GET["log-out"]==1){
			unset($_SESSION["fb_user_details"]);
			//session ver is set, redirect user 
			header("location: ". $redirect_url);
		}

		//Test normal login / logout with session

		if ($session){ //if we have the FB session
			//get user data

			$user_profile = (new FacebookRequest($session, 'GET', '/me?locale=en_US&fields=id,name,email'))->execute()->getGraphObject(GraphUser::className());
			
			//save session var as array
			$_SESSION["fb_user_details"] = $user_profile->asArray(); 
			
			$user_id = ( isset( $_SESSION["fb_user_details"]["id"] ) )? $_SESSION["fb_user_details"]["id"] : "";
			$user_name = ( isset( $_SESSION["fb_user_details"]["name"] ) )? $_SESSION["fb_user_details"]["name"] : "";
			$user_email = ( isset( $_SESSION["fb_user_details"]["email"] ) )? $_SESSION["fb_user_details"]["email"] : "";
			
			if(empty($user_email)){
				echo "<script>alert('Login Failed')</script>";
				session_destroy();
				echo "<script>window.location='../signin-nct'</script>";
			}
			else{
			###### connect to user table ########
			$_SESSION['login_user']=$user_email;
			$_SESSION['username']=$user_name;
			$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_db_name);
			if ($mysqli->connect_error) {
				die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
			}
			
			//check user exist in table (using Facebook ID)
			$results = $mysqli->query("SELECT COUNT(*) FROM register_users WHERE oauth_uid=".$user_id);
			$get_total_rows = $results->fetch_row();
			
			if(!$get_total_rows[0]){ //no user exist in table, create new user
				$insert_row = $mysqli->query("INSERT INTO register_users (oauth_uid,username, email,created_date,
					last_logintime,ipaddress,oauth_provider) VALUES(".$user_id.", '".$user_name."', '".$user_email."','".$date."','".$date."','".$ip."','Facebook')");
				$retrieve= "SELECT u_id FROM register_users WHERE oauth_uid='$user_id'";
		        $result = mysqli_query($conn,$retrieve);
		        foreach ($result as $k => $v) {
		        	$_SESSION['userid'] = $v['u_id'];
		        }
			}
			else{
				$update = "UPDATE register_users SET last_logintime='$date' WHERE oauth_uid='$user_id'";
		        mysqli_query($conn,$update);
		        $retrieve= "SELECT u_id FROM register_users WHERE oauth_uid='$user_id'";
		        $result = mysqli_query($conn,$retrieve);
		        foreach ($result as $k => $v) {
		        	$_SESSION['userid'] = $v['u_id'];
		        }
		        
			}
			
			//session ver is set, redirect user 
			header("location: ". $redirect_url);
			}
		}else{ 
			
			//session var is still there
			if(isset($_SESSION["fb_user_details"]))
			{
				// print 'Hi '.$_SESSION["fb_user_details"]["name"].' you are logged in! [ <a href="?log-out=1">log-out</a> ] ';
				// print '<pre>';
				// print_r($_SESSION["fb_user_details"]);
				// print '</pre>';

				redirectPage(SITE_URL);
			}
			else
			{
				//display login url 
				$login_url = $helper->getLoginUrl( array( 'scope' => 'email' ) );
				$replace = array(
				'%signinwithfb%'=>$login_url,
				);
				$html .= get_view(DIR_TMPL . $this->module . "/signinfacebook-nct.tpl.php",$replace);
				return $html;
			}
		}

	}

	public function getPageContent() {
		$replace=array(
			'%facebook%'=>$this->signinWithFacebook(),
			'%google%'=>$this->signinWithGoogle(),
		);
		return get_view(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
	}

}

?>
