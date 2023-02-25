<?php
function get_view($tpl_path, $replace = array()){
    $tpl = new MainTemplater($tpl_path);
    $parsed_tpl = $tpl->parse();
    if(!empty($replace)){
        return str_replace(array_keys($replace), array_values($replace), $parsed_tpl);
        
    }else{
        return $parsed_tpl;
    }
}


/* Redirect page */

function redirectPage($url) {
    header('Location:' . $url);
    exit;
}

function redirectErrorPage($error) {
    echo $error;
    //redirectPage(SITE_URL.'modules/error?u='.base64_encode($error));
}

/* Santitize Output */

function sanitize_output($buffer) {

    $search = array('/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s', '/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s');
    $replace = array('>', '<', '\\1', '');
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}

/* Use to remove whitespacs,Spaces and make string to lower case. Add '-' where Space. */

function Slug($string) {
    $slug = strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
    $slug_exists = slug_exist($slug);
    
    if($slug_exists) {
        $i = 1; $baseSlug = $slug;
        while(slug_exist($slug)){
            $slug = $baseSlug . "-" . $i++;        
        }
    }
    
    return $slug;
}

function slug_exist($slug) {
    global $db;
    $sql = "SELECT page_slug FROM tbl_content WHERE page_slug = '".$slug."' ";
    $content_page = $db->pdoQuery($sql)->result();
    
    if ($content_page) {
        return true;
    }
}

/* Comment Remaining */

function requiredLoginId() {
    global $sessUserType, $sesspUserId, $memberId;
    if (isset($sessUserType) && $sessUserType == 's')
        return $sesspUserId;
    else
        return $memberId;
}
function closetags($html) {
    #put all opened tags into an array
    preg_match_all('#<([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);

    $openedtags = $result[1];   #put all closed tags into an array
    preg_match_all('#</([a-z]+)>#iU', $html, $result);
    $closedtags = $result[1];
    $len_opened = count($openedtags);
    # all tags are closed
    if (count($closedtags) == $len_opened) {
        return $html;
    }
    $openedtags = array_reverse($openedtags);
    # close tags
    for ($i = 0; $i < $len_opened; $i++) {

        if (!in_array($openedtags[$i], $closedtags)) {

            $html .= '</' . $openedtags[$i] . '>';
        } else {

            unset($closedtags[array_search($openedtags[$i], $closedtags)]);
        }
    } return $html;
}

/* Get IP Address of current system. */

function get_ip_address() {
    foreach (array(
'HTTP_CLIENT_IP',
 'HTTP_X_FORWARDED_FOR',
 'HTTP_X_FORWARDED',
 'HTTP_X_CLUSTER_CLIENT_IP',
 'HTTP_FORWARDED_FOR',
 'HTTP_FORWARDED',
 'REMOTE_ADDR'
    ) as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                    return $ip;
                }
            }
        }
    }
}

/* Get Domain name from url */

function GetDomainName($url) {
    $now1 = ereg_replace('www\.', '', $url);
    $now2 = ereg_replace('\.com', '', $now1);
    $domain = parse_url($now2);
    if (!empty($domain["host"])) {
        return $domain["host"];
    } else {
        return $domain["path"];
    }
}

/* Generate Random String as type alpha,nume,alphanumeric,hexidec */

function genrateRandom($length = 8, $seeds = 'alphanum') {
    // Possible seeds
    $seedings['alpha'] = 'abcdefghijklmnopqrstuvwqyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $seedings['numeric'] = '0123456789';
    $seedings['alphanum'] = 'abcdefghijklmnopqrstuvwqyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $seedings['hexidec'] = '0123456789abcdef';
    // Choose seed
    if (isset($seedings[$seeds])) {
        $seeds = $seedings[$seeds];
    }
    // Seed generator
    list($usec, $sec) = explode(' ', microtime());
    $seed = (float) $sec + ((float) $usec * 100000);
    mt_srand($seed);
    // Generate
    $str = '';
    $seeds_count = strlen($seeds);
    for ($i = 0; $length > $i; $i++) {
        $str .= $seeds{mt_rand(0, $seeds_count - 1)};
    }
    return $str;
}
/* Generate Random String */

function generateRandString($totalString = 10, $type = 'alphanum') {
    if ($type == 'alphanum')
        $alphanum = "AaBbC0cDdEe1FfGgH2hIiJj3KkLlM4mNnOo5PpQqR6rSsTt7UuVvW8wXxYy9Zz";
    else if ($type == 'num')
        $alphanum = "098765432101234567890098765432101234567890098765432101234567890";
    return substr(str_shuffle($alphanum), 0, $totalString);
}

/* Sub admin Check Permission */

function checkPermission($usertype, $pagenm, $permission) {
    if ($usertype == 'a') {
        $flag = 0;
        $sadm_page = array('subadmin');
        if (in_array($pagenm, $sadm_page)) {
            $flag = 1;
        } else {
            $getval = getValFromTbl('id', 'adminrole', 'id IN (' . $permission . ') AND pagenm="' . $pagenm . '"');
            if ($getval == 0)
                $flag = 1;
        }
        if ($flag == 1) {

            $_SESSION['notice'] = NOTPER;
            redirectPage(SITE_URL . get_language_url() . 'admin/dashboard');
            exit;
        }
    }
}

/* Load Css Set directory and give filenname as array */

function load_css($filename = array()) {
    $returnStyle = '';
    $filePath = array();
    if (!empty($filename)) {
        if (domain_details('dir') == 'admin-nct') {
            foreach ($filename as $k => $v) {
                if (is_array($v)) {
                    if (isset($v[1]) && $v[1] != "") {
                        $filePath[] = $v[1] . $v[0];
                    } else {
                        $filePath[] = SITE_ADM_CSS . $v[0];
                    }
                } else {
                    $filePath[] = SITE_ADM_CSS . $v;
                }
            }
        } else {
            foreach ($filename as $k => $v) {
                if (is_array($v)) {
                    if (isset($v[1]) && $v[1] != "") {
                        $filePath[] = $v[1] . $v[0];
                    } else {
                        $filePath[] = SITE_CSS . $v[0];
                    }
                } else {
                    $filePath[] = SITE_CSS . $v;
                }
            }
        }
    }
    foreach ($filePath as $style) {
        $returnStyle .= '<link rel="stylesheet" type="text/css" href="' . $style . '">';
    }
    return $returnStyle;
}

/* Load JS Set directory and give filenname as array */

function load_js($filename = array()) {
    $returnStyle = '';
    $filePath = array();
    if (!empty($filename)) {
        if (domain_details('dir') == 'admin-nct') {
            foreach ($filename as $k => $v) {
                if (is_array($v)) {
                    if (isset($v[1]) && $v[1] != "") {
                        $filePath[] = $v[1] . $v[0];
                    } else {
                        $filePath[] = SITE_ADM_JS . $v[0];
                    }
                } else {
                    $filePath[] = SITE_ADM_JS . $v;
                }
            }
        } else {
            foreach ($filename as $k => $v) {
                if (is_array($v)) {
                    if (isset($v[1]) && $v[1] != "") {
                        $filePath[] = $v[1] . $v[0];
                    } else {
                        $filePath[] = SITE_JS . $v[0];
                    }
                } else {
                    $filePath[] = SITE_JS . $v;
                }
            }
        }
    }
    foreach ($filePath as $scripts) {
        $returnStyle .= '<script type="text/javascript" src="' . $scripts . '"></script>';
    }
    return $returnStyle;
}

/* Diplay message function */

function disMessage($msgArray, $script = true) {
    if(domain_details('dir') == 'admin-nct'){
        $script = false;
    }
    $message = '';
    $content = '';
    $type = isset($msgArray["type"]) ? $msgArray["type"] : NULL;
    $message = isset($msgArray["var"]) ? $msgArray["var"] : NULL;
    
    $type1 = ($type == 'suc' ? 'success' : ($type == 'inf' ? 'info' : ($type == 'war' ? 'warning' : 'error')));
    if ($script) {
        $content = '<script type="text/javascript"> toastr["' . $type1 . '"]("' . $message . '");</script>';
    } else {
        $content = 'toastr["' . $type1 . '"]("' . $message . '");';
    }

    return $content;
}

/* Check Authentication */

function Authentication($reqAuth = false, $redirect = true, $allowedUserType = 'a') {
    $todays_date = date("Y-m-d");
    global $adminUserId, $sessUserId, $db;

    $whichSide = domain_details('dir');
    if ($reqAuth == true) {
        if ($whichSide == 'admin-nct') {

            if ($adminUserId == 0) {
                $_SESSION["toastr_message"] = disMessage(array('type' => 'err', 'var' => 'loginRequired'));
                $_SESSION['req_uri_adm'] = $_SERVER['REQUEST_URI'];

                if ($redirect) {
                    redirectPage(SITE_ADMIN_URL);
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {

            if ($sessUserId <= 0) {
                $_SESSION["toastr_message"] = disMessage(array('type' => 'err', 'var' => 'loginRequired'));
                $_SESSION['req_uri'] = $_SERVER['REQUEST_URI'];

                if ($redirect) {
                    redirectPage(SITE_URL);
                } else {
                    return false;
                }
            }
            return true;
        }
    }
}
function getTableValue($table, $field, $wherecon = array()) {
    global $db;
    $qrySel = $db->select($table, array($field), $wherecon);
    $qrysel1 = $qrySel->result();
    $totalRow = $qrySel->affectedRows();
    $fetchRes = $qrysel1;

    if ($totalRow > 0) {
        return $fetchRes[$field];
    } else {
        return "";
    }
}
function getExt($file) {
    $path_parts = pathinfo($file);
    $ext = $path_parts['extension'];
    return $ext;
}

function GenerateThumbnail($varPhoto, $uploadDir, $tmp_name, $th_arr = array(), $file_nm = '', $addExt = true, $crop_coords = array()) {
    //$ext=strtoupper(substr($varPhoto,strlen($varPhoto)-4));die;
    $ext = '.' . strtoupper(getExt($varPhoto));
    $tot_th = count($th_arr);


    if (($ext == ".JPG" || $ext == ".GIF" || $ext == ".PNG" || $ext == ".BMP" || $ext == ".JPEG" || $ext == ".ICO")) {
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777);
        }

        if ($file_nm == '')
            $imagename = rand() . time();
        else
            $imagename = $file_nm;

        if ($addExt || $file_nm == '')
            $imagename = $imagename . $ext;

        $pathToImages = $uploadDir . $imagename;
        $Photo_Source = copy($tmp_name, $pathToImages);

        if ($Photo_Source) {
            for ($i = 0; $i < $tot_th; $i++) {
                resizeImage($uploadDir . $imagename, $uploadDir . 'th' . ($i + 1) . '_' . $imagename, $th_arr[$i]['width'], $th_arr[$i]['height'], false, $crop_coords);
            }

            return $imagename;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
    list($imagewidth, $imageheight, $imageType) = getimagesize($image);
    $imageType = image_type_to_mime_type($imageType);
    
    $newImageWidth = ceil($width * $scale);
    $newImageHeight = ceil($height * $scale);
    $newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
    switch($imageType) {
        case "image/gif":
            $source=imagecreatefromgif($image); 
            break;
        case "image/pjpeg":
        case "image/jpeg":
        case "image/jpg":
            $source=imagecreatefromjpeg($image); 
            break;
        case "image/png":
        case "image/x-png":
            $source=imagecreatefrompng($image); 
            break;
    }
    imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
    switch($imageType) {
        case "image/gif":
            imagegif($newImage,$thumb_image_name); 
            break;
        case "image/pjpeg":
        case "image/jpeg":
        case "image/jpg":
            imagejpeg($newImage,$thumb_image_name,100); 
            break;
        case "image/png":
        case "image/x-png":
            imagepng($newImage,$thumb_image_name);  
            break;
    }
    chmod($thumb_image_name, 0777);
    return $thumb_image_name;
}

function resizeImage($filename, $newfilename = "", $max_width, $max_height = '', $withSampling = true, $crop_coords = array()) {

    if ($newfilename == "") {
        $newfilename = $filename;
    }

    $fileExtension = strtolower(getExt($filename));
    if ($fileExtension == "jpg" || $fileExtension == "jpeg") {
        $img = imagecreatefromjpeg($filename);
    } else if ($fileExtension == "png") {
        $img = imagecreatefrompng($filename);
    } else if ($fileExtension == "gif") {
        $img = imagecreatefromgif($filename);
    } else {
        $img = imagecreatefromjpeg($filename);
    }

    $width = imageSX($img);
    $height = imageSY($img);

    // Build the thumbnail
    $target_width = $max_width;
    $target_height = $max_height;
    $target_ratio = $target_width / $target_height;
    $img_ratio = $width / $height;

    if (empty($crop_coords)) {

        if ($target_ratio > $img_ratio) {
            $new_height = $target_height;
            $new_width = $img_ratio * $target_height;
        } else {
            $new_height = $target_width / $img_ratio;
            $new_width = $target_width;
        }

        if ($new_height > $target_height) {
            $new_height = $target_height;
        }
        if ($new_width > $target_width) {
            $new_height = $target_width;
        }
        $new_img = imagecreatetruecolor($target_width, $target_height);

        $white = imagecolorallocate($new_img, 255, 255, 255);
        imagecolortransparent($new_img);
        @imagefilledrectangle($new_img, 0, 0, $target_width - 1, $target_height - 1, $white);
        @imagecopyresampled($new_img, $img, ($target_width - $new_width) / 2, ($target_height - $new_height) / 2, 0, 0, $new_width, $new_height, $width, $height);

        //$new_img = imagecreatetruecolor($new_width, $new_height);
        //@imagecopyresampled($new_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    } else {
        $new_img = imagecreatetruecolor($target_width, $target_height);
        $white = imagecolorallocate($new_img, 255, 255, 255);
        @imagefilledrectangle($new_img, 0, 0, $target_width - 1, $target_height - 1, $white);
        @imagecopyresampled($new_img, $img, 0, 0, $crop_coords['x1'], $crop_coords['y1'], $target_width, $target_height, $crop_coords['x2'], $crop_coords['y2']);
    }

    if ($fileExtension == "jpg" || $fileExtension == "jpeg") {
        $createImageSave = imagejpeg($new_img, $newfilename, 90);
    } else if ($fileExtension == 'png') {
        $createImageSave = imagepng($new_img, $newfilename, 9);
    } else if ($fileExtension == "gif") {
        $createImageSave = imagegif($new_img, $newfilename, 90);
    } else {
        $createImageSave = imagejpeg($new_img, $newfilename, 90);
    }

}

if (!function_exists('dump')) {
    function dump($var, $label = 'Dump', $exit = false, $echo = TRUE) {
        // Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: rgba(244, 25, 113, 1);
    color: #FFFFFF;
    border: 1px dotted #000;
    padding: 10px;
    margin: 10px 0;
    text-align: left;
    font-size: 14px;">' . $label . ' => ' . $output . '</pre>';

        // Output
        if ($echo == TRUE) {
            echo $output;
        } else {
            return $output;
        }
        if ($exit) {
            die();
        }

    }
}
function getMetaTags($metaArray) {
    $content = NULL;
    //$content = '<meta name="description" content="' . $metaArray["description"] . ', ' . $metaArray["keywords"] . ', ' . SITE_NM . ', ' . REGARDS . '" />
    $content = '<meta name="description" content="' . $metaArray["description"] . ', ' . $metaArray["keywords"] . '" />
        <meta name="keywords" content="' . $metaArray["keywords"] . '" />';

    if (isset($metaArray["nocache"]) && $metaArray["nocache"] == true) {
        $content .= '<meta HTTP-EQUIV="CACHE-CONTROL" content="NO-CACHE" />
        ';
    }

    return sanitize_output($content);
}
function issetor(&$var, $default = false) {
    return isset($var) ? $var : $default;
}

/* Send SMTP Mail */
function generateEmailTemplate($type, $arrayCont) {
    global $sessUserId;
    global $db;
    
    $query = $db->select('tbl_email_templates', array("subject", "templates"), array("constant" => $type))->result();
    $q = $query;

    $subject = trim(stripslashes($q["subject"]));
    $subject = str_replace("###SITE_NM###", SITE_NM, $subject);

    $message = trim(stripslashes($q["templates"]));
    $message = str_replace("###SITE_LOGO_URL###", SITE_IMG.SITE_LOGO, $message);
    $message = str_replace("###SITE_URL###", SITE_URL, $message);
    $message = str_replace("###SITE_NM###", SITE_NM, $message);
    $message = str_replace("###YEAR###", date('Y'), $message);

    $array_keys = (array_keys($arrayCont));

    for ($i = 0; $i < count($array_keys); $i++) {
        $message = str_replace("###".$array_keys[$i]."###", "".$arrayCont[$array_keys[$i]] . "",$message);
        $subject = str_replace("###" . $array_keys[$i] . "###", "" . $arrayCont[$array_keys[$i]] . "", $subject);
    }

    $data['message'] = $message;
    $data['subject'] = $subject;
    return $data;
}

function sendEmailAddress($to, $subject, $message) {

    require_once("class.phpmailer.php");
    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    //mail via gmail
    //$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    //$mail->Host = "smtp.gmail.com";
    //$mail->Port = 465; // or 587
    //mail via hosting server	

    /* $mail->Host = "mail.ncryptedprojects.com";
      $mail->Port = 587; // or 587 */

    $mail->Host = SMTP_HOST;
    $mail->Port = SMTP_PORT;

    $mail->IsHTML(true);
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    //$mail->SetFrom(SMTP_USERNAME);
    $mail->SetFrom(FROM_EMAIL, FROM_NM);

    $mail->AddReplyTo(FROM_EMAIL, FROM_NM);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AddAddress($to);
    $result = true;
    if (!$mail->Send()) {
        //echo "Mailer Error: " . $mail->ErrorInfo;
        $result = false;
    }
    return $result;
}


/*Admin Functions*/
function convertDate($date, $time = false, $what = 'default') {
    if ($what == 'wherecond') {
        return date('Y-m-d', strtotime($date));
    } else if ($what == 'display') {
        return date('M d, Y h:i A', strtotime($date));
    } else if ($what == 'onlyDate') {
        return date('M d, Y', strtotime($date));
    } else if ($what == 'gmail') {
        return date('D, M d, Y - h:i A', strtotime($date));
        //Tue, Jul 16, 2013 at 12:14 PM
    } else if ($what == 'default') {
        if (trim($date) != '' && $date != '0000-00-00' && $date != '1970-01-01') {
            if (!$time) {
                $retDt = date('d-m-Y', strtotime($date));
                return $retDt == '01-01-1970' ? '' : $retDt;
            } else {
                '1970-01-01 01:00:00';
                '01-01-1970 01:00 AM';
                $retDt = date('d-m-Y h:i A', strtotime($date));
                return $retDt == '01-01-1970 01:00 AM' ? '' : $retDt;
            }
        } else {
            return '';
        }

    } else if ($what == 'db') {
        if (trim($date) != '' && $date != '0000-00-00' && $date != '1970-01-01') {
            if (!$time) {
                $retDt = date('Y-m-d', strtotime($date));
                return $retDt == '1970-01-01' ? '' : $retDt;
            } else {
                $retDt = date('Y-m-d H:i:s', strtotime($date));
                return $retDt == '1970-01-01 01:00:00' ? '' : $retDt;
            }
        } else {
            return '';
        }

    }
}
function curPageURL() {
    $pageURL = 'http';

    if (isset($_SERVER["HTTPS"])) {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }

    define('CURRENT_PAGE_URL', $pageURL);
}

function curPageName() {
    $pageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
    define('CURRENT_PAGE_NAME', $pageName);
}
function checkIfIsActive() {
    global $db;

    if (isset($_SESSION['user_id']) && '' != $_SESSION['user_id']) {
        $user_details = $db->select("tbl_users", "*", array(
                    "id" => $_SESSION['user_id']
                ))->result();
        if ($user_details) {
            if ('n' == $user_details['isActive']) {
                unset($_SESSION['user_id']);
                unset($_SESSION['first_name']);
                unset($_SESSION['last_name']);

                $_SESSION['toastr_message'] = disMessage(array('type' => 'err', 'var' => "You have not verified the email address that is registered with us. Please try logging in again after verifying your email address."));
                redirectPage(SITE_URL);
                return false;
            } else if ('d' == $user_details['status']) {
                unset($_SESSION['user_id']);
                unset($_SESSION['first_name']);
                unset($_SESSION['last_name']);

                $_SESSION['toastr_message'] = disMessage(array('type' => 'err', 'var' => "Your account has been deactivated by Admin. Please contact Site Admin to re-activate your account."));
                redirectPage(SITE_URL);
                return false;
            } else {
                return true;
            }
        } else {
            unset($_SESSION['user_id']);
            unset($_SESSION['first_name']);
            unset($_SESSION['last_name']);

            $_SESSION['toastr_message'] = disMessage(array('type' => 'err', 'var' => "There seems to be an issue. Please try logging in again."));
            redirectPage(SITE_URL);
            return false;
        }
    } else {
        return true;
    }
}


/* get domain details, pass module, dir, file or file-module whichever required. */

function domain_details($returnWhat) {
    $arrScriptName = explode('/', $_SERVER['SCRIPT_NAME']);

    if (PROJECT_DIRECTORY_NAME != '' && in_array(PROJECT_DIRECTORY_NAME, $arrScriptName) == true) {
        $arrKey = array_search(PROJECT_DIRECTORY_NAME, $arrScriptName);
        unset($arrScriptName[$arrKey]);
    }

    $arrScriptName = array_values($arrScriptName);

    if ($returnWhat == 'module'){
        return ($arrScriptName[3] != "" ? $arrScriptName[3] : '');
    }
    else if ($returnWhat == 'dir'){
        if($arrScriptName[1]!="" && $arrScriptName[2]!="admin-nct"){
            return $arrScriptName[1];
        }else if($arrScriptName[2]=='admin-nct'){
            return $arrScriptName[2];
        }else{
            return '';
        }
        
    }else if ($returnWhat == 'file'){
        return ($arrScriptName[4] != "" ? $arrScriptName[4] : '');
    }
    else if ($returnWhat == 'file-module'){
        return ($arrScriptName[2] != "" ? $arrScriptName[2] : '');
    }
}
/*new structure html function*/
function html($fileName, $flg = false) {
    if (file_exists($fileName)) {
        if ($flg) {
            echo (new MainTemplater($fileName))->parse();
        } else {
            return (new MainTemplater($fileName))->parse();
        }
    } else {
        dump($fileName, "File Not Found");
    }
}
function html_r($fileName, $find = "", $replace = "", $flg = false) {
    if (file_exists($fileName)) {
        if ($flg) {
            echo replace($find, $replace, (new MainTemplater($fileName))->parse(), false);
        } else {
            return replace($find, $replace, (new MainTemplater($fileName))->parse(), false);
        }
    } else {
        dump($fileName, "File Not Found");
    }
}
function html_t($fileName) {
    if (file_exists($fileName)) {
        return new MainTemplater($fileName);
    } else {
        dump($fileName, "File Not Found");
    }
}
function replace($search, $replace,$html, $flg = true) {
    if ($flg) {
        echo str_replace($search, $replace, $html);
    } else {
        return str_replace($search, $replace, $html);
    }
}

function generatePassword($length = 8) {
    // start with a blank password
    $password = "";
    // define possible characters - any character in this string can be
    // picked for use in the password, so if you want to put vowels back in
    // or add special characters such as exclamation marks, this is where
    // you should do it
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
    // we refer to the length of $possible a few times, so let's grab it now
    $maxlength = strlen($possible);
    // check for length overflow and truncate if necessary
    if ($length > $maxlength) {
        $length = $maxlength;
    }
    // set up a counter for how many characters are in the password so far
    $i = 0;
    // add random characters to $password until $length is reached
    while ($i < $length) {

        // pick a random character from the possible ones
        $char = substr($possible, mt_rand(0, $maxlength - 1), 1);

        // have we already used this character in $password?
        if (!strstr($password, $char)) {
            // no, so it's OK to add it onto the end of whatever we've already got...
            $password .= $char;
            // ... and increase the counter by one
            $i++;
        }
    }
    return $password;
}

function closePopup() {
    $content = '<script type="text/javascript">window.close();</script>';
    return $content;
}
function humanTiming($time) {

    $time = time() - $time; // to get the time since that moment

    $tokens = array(
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second',
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) {
            continue;
        }

        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
    }

}
function getTime($date) {
    $time = humanTiming(strtotime($date));
    if ($time == "") {
        $time = "Just Now";
    } else {
        $time .= " ago";
    }

    return $time;
}
function get_listing($limit = 3, $bunchNo = 0){ 
    global $db,$sessUserId;
    $start = $limit * $bunchNo;
    $limit++;
    ob_start();
    $pQuery = $db->pdoQuery("Select p.*,c.categoryName,s.subcategoryName from tbl_product p LEFT JOIN tbl_category c on(p.categoryID = c.id) LEFT JOIN tbl_subcategory s on(p.subcategoryID = s.id) where p.isActive = 'y' ORDER BY p.createdDate limit $start,$limit");
    
    $limit--;
    $totP = $pQuery->affectedRows();
    if($totP>0){
        $products = $pQuery->results();
       foreach ($products as $key => $value) {
            if ($key == $limit) {
                    break;
            }
            extract($value);
            $pImage = SITE_UPD.'product/th1_'.$image;
            $html = html(DIR_TMPL."listing-nct/listing-row-nct.tpl.php");
                echo str_replace(array("%ID%","%PRODUCT%","%CATEGORY%","%SUBCATEGORY%","%IMG%"),array($id,$productName,$categoryName,$subcategoryName,$pImage), $html); 
        }
    }else{
            html_r(DIR_TMPL . "load_more-msg-nct.tpl.php", "%MSG%", "No any product found", true);
    }

    if ($totP <= $limit) {
            
    } else {
            html_r(DIR_TMPL . "load_more-nct.tpl.php", array("%START%", "%LIMIT%","%CLASS%"), array($bunchNo + 1, $limit,'product'), true);
    }  
 return ob_get_clean();
}     
        
function get_search($fromTable = '',$tableArray = array(),$fieldList = '',$whereCond = '',$limit = 3, $bunchNo = 0){ 
    global $db,$sessUserId;
    $start = $limit * $bunchNo;
    $limit++;
    ob_start();
    if(count($tableArray) > 0){
        $leftJoin  = '';
        foreach ($tableArray as $tableName => $leftJoinCond) {
            $leftJoin  .= ' LEFT JOIN '.$tableName.'  ON ( '.$leftJoinCond.' ) ';
        }
    }
    $q = ("SELECT $fieldList FROM $fromTable $leftJoin $whereCond LIMIT $start,$limit");
    $pQuery = $db->pdoQuery($q);
    
    $limit--;
    $totP = $pQuery->affectedRows();
    if($totP>0){
        $products = $pQuery->results();
       foreach ($products as $key => $value) {
            if ($key == $limit) {
                    break;
            }
            extract($value);
            $pImage = SITE_UPD.'product/th1_'.$image;
            $html = html(DIR_TMPL."listing-nct/listing-row-nct.tpl.php");
                echo str_replace(array("%ID%","%PRODUCT%","%CATEGORY%","%SUBCATEGORY%","%IMG%"),array($id,$productName,$categoryName,$subcategoryName,$pImage), $html); 
        }
    }else{
            html_r(DIR_TMPL . "load_more-msg-nct.tpl.php", "%MSG%", "No any product found", true);
    }

    if ($totP <= $limit) {
            
    } else {
            html_r(DIR_TMPL . "load_more-nct.tpl.php", array("%START%", "%LIMIT%","%CLASS%"), array($bunchNo + 1, $limit,'search-product'), true);
    }  
    return ob_get_clean();
}     
        
        
        