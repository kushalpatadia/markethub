<?php
require_once("../../includes-nct/config-nct.php");
require_once("class.edit_company_profile-nct.php");

class CropAvatar {
  private $src;
  private $data;
  private $dst;
  private $type;
  private $extension;
  private $msg;

  function __construct($src, $data, $file) {
    $this->setSrc($src);
    $this->setData($data);
    $this->setFile($file);
    $this->crop($this->src, $this->dst, $this->data);
  }

  private function setSrc($src) {
    if (!empty($src)) {
      $type = exif_imagetype($src);
      if ($type) {
        $this->src = $src;
        $this->type = $type;
        $this->extension = image_type_to_extension($type);
        $this->setDst();
      }
    }
  }
  
  private function setData($data) {
    if (!empty($data)) {
      $this->data = json_decode(stripslashes($data));
    }
  }
  
  private function setFile($file) {
    $errorCode = $file['error'];
    if ($errorCode === UPLOAD_ERR_OK) {
      $type = exif_imagetype($file['tmp_name']);
      if ($type) {
        $extension = image_type_to_extension($type);
        $src = DIR_UPD_COMPANY_COVER. date('YmdHis') . '.original' . $extension;
        if ($type == IMAGETYPE_GIF || $type == IMAGETYPE_JPEG || $type == IMAGETYPE_PNG) {
          if (file_exists($src)) {
            unlink($src);
          }          
          $data_array = array("type"=>"COMPANY_COVER");
          
          $pic = upload_file($_FILES['avatar_file'],$data_array);
          
          $src = DIR_UPD_COMPANY_COVER. $pic;  
          
          if($pic) {
            $this->src = $src;
            $this->type = $type;
            $this->extension = $extension;
            $this->setDst($pic);
            $this->fname = $pic;
          } else {
             $this->msg = 'Failed to save file';
          }
        } else {
          $this->msg = 'Please upload image with the following types: JPG, PNG, GIF';
        }
      } else {
        $this->msg = 'Please upload image file';
      }
    } else {
      $this->msg = $this->codeToMessage($errorCode);
    }
  }

  private function setDst($pic = NULL) {
    $this->fname = $pic;
    $this->dst =  DIR_UPD_COMPANY_COVER .$this->fname;
  }

  private function crop($src, $dst, $data) {
    if (!empty($src) && !empty($dst) && !empty($data)) {
      switch ($this->type) {
        case IMAGETYPE_GIF:
          $src_img = imagecreatefromgif($src);
          break;
        case IMAGETYPE_JPEG:
          $src_img = imagecreatefromjpeg($src);
          break;
        case IMAGETYPE_PNG:
          $src_img = imagecreatefrompng($src);
          break;
      }
      if (!$src_img) {
        $this->msg = "Failed to read the image file";
        return;
      }      
      $size = getimagesize($src);
      $size_w = $size[0]; // natural width
      $size_h = $size[1]; // natural height
      $src_img_w = $size_w;
      $src_img_h = $size_h;
      $degrees = $data->rotate;
      // Rotate the source image
      if (is_numeric($degrees) && $degrees != 0) {
        // PHP's degrees is opposite to CSS's degrees
        $new_img = imagerotate( $src_img, -$degrees, imagecolorallocatealpha($src_img, 0, 0, 0, 127) );
        imagedestroy($src_img);
        $src_img = $new_img;
        $deg = abs($degrees) % 180;
        $arc = ($deg > 90 ? (180 - $deg) : $deg) * M_PI / 180;
        $src_img_w = $size_w * cos($arc) + $size_h * sin($arc);
        $src_img_h = $size_w * sin($arc) + $size_h * cos($arc);
        // Fix rotated image miss 1px issue when degrees < 0
        $src_img_w -= 1;
        $src_img_h -= 1;
      }
      $tmp_img_w = $data->width;
      $tmp_img_h = $data->height;
      $dst_img_w = 300;//220
      $dst_img_h = 300;//220
      $src_x = $data->x;
      $src_y = $data->y;
      if ($src_x <= -$tmp_img_w || $src_x > $src_img_w) {
        $src_x = $src_w = $dst_x = $dst_w = 0;
      } else if ($src_x <= 0) {
        $dst_x = -$src_x;
        $src_x = 0;
        $src_w = $dst_w = min($src_img_w, $tmp_img_w + $src_x);
      } else if ($src_x <= $src_img_w) {
        $dst_x = 0;
        $src_w = $dst_w = min($tmp_img_w, $src_img_w - $src_x);
      }
      if ($src_w <= 0 || $src_y <= -$tmp_img_h || $src_y > $src_img_h) {
        $src_y = $src_h = $dst_y = $dst_h = 0;
      } else if ($src_y <= 0) {
        $dst_y = -$src_y;
        $src_y = 0;
        $src_h = $dst_h = min($src_img_h, $tmp_img_h + $src_y);
      } else if ($src_y <= $src_img_h) {
        $dst_y = 0;
        $src_h = $dst_h = min($tmp_img_h, $src_img_h - $src_y);
      }
      // Scale to destination position and size
      $ratio = $tmp_img_w / $dst_img_w;
      $dst_x /= $ratio;
      $dst_y /= $ratio;
      $dst_w /= $ratio;
      $dst_h /= $ratio;
      $dst_img = imagecreatetruecolor($dst_img_w, $dst_img_h);
      // Add transparent background to destination image
      imagefill($dst_img, 0, 0, imagecolorallocatealpha($dst_img, 0, 0, 0, 127));
      imagesavealpha($dst_img, true);
      $result = imagecopyresampled($dst_img, $src_img, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
      if ($result) {
        if (!imagepng($dst_img, $dst)) {
          $this->msg = "Failed to save the cropped image file";
        }
      } else {
        $this->msg = "Failed to crop the image file";
      }
      imagedestroy($src_img);
      imagedestroy($dst_img);
    }
  }
  
  private function codeToMessage($code) {
    $errors = array(
      UPLOAD_ERR_INI_SIZE =>'The uploaded file exceeds the upload_max_filesize directive in php.ini',
      UPLOAD_ERR_FORM_SIZE =>'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
      UPLOAD_ERR_PARTIAL =>'The uploaded file was only partially uploaded',
      UPLOAD_ERR_NO_FILE =>'No file was uploaded',
      UPLOAD_ERR_NO_TMP_DIR =>'Missing a temporary folder',
      UPLOAD_ERR_CANT_WRITE =>'Failed to write file to disk',
      UPLOAD_ERR_EXTENSION =>'File upload stopped by extension',
    );
    if (array_key_exists($code, $errors)) {
      return $errors[$code];
    }
    return 'Unknown upload error';
  }
  public function getResult() {
    return !empty($this->data) ? $this->dst : $this->src;
  }
  public function getMsg() {
    return $this->msg;
  }
  public function getfilename(){
    return $this->fname;
  }
}

$crop = new CropAvatar(
  isset($_POST['avatar_src']) ? $_POST['avatar_src'] : null,
  isset($_POST['avatar_data']) ? $_POST['avatar_data'] : null,
  isset($_FILES['avatar_file']) ? $_FILES['avatar_file'] : null
);
$response = array(
  'state'  => 200,
  'message' => $crop->getMsg(),
  'result' => $crop->getResult(),
  'filename' => $crop->getfilename()
);
$pro_pic_name = $crop->getfilename();

if($pro_pic_name!='' || $pro_pic_name!=NULL){
  
  $pic = getTableValue("tbl_users","company_cover",array("tbl_user_id"=>$sessUserId));
  
  if($pic != ''){
    
    $pic_name = pathinfo($pic);
    $pic_fname = $pic_name['filename'];
    $pic_ext = $pic_name['extension'];
    $pic_dst = DIR_UPD_COMPANY_COVER.$pic_fname.'.'.$pic_ext;
    unlink($pic_dst);
    $pic_profile = DIR_UPD_COMPANY_COVER.$pic_fname.'.'.$pic_ext;  
    //unlink($pic_profile);
    unlink(DIR_UPD_COMPANY_COVER.'th1_'.$pic);
    // unlink(DIR_UPD_COMPANY_COVER.'th2_'.$pic);
    // unlink(DIR_UPD_COMPANY_COVER.'th3_'.$pic);
  }

  $val = array("company_cover"=>$pro_pic_name);
  $qrysel = $db->update("tbl_users",$val,array("tbl_user_id"=>$sessUserId));
  
  //$_SESSION['img'] = SITE_UPD_COMPANY_COVER.'th2_'.$pro_pic_name;
  
   resize(DIR_UPD_COMPANY_COVER.$pro_pic_name, DIR_UPD_COMPANY_COVER.'th1_'.$pro_pic_name, '1140', '250');
  // resize(DIR_UPD_COMPANY_COVER.$pro_pic_name, DIR_UPD_COMPANY_COVER.'th2_'.$pro_pic_name, '48', '48');
  // resize(DIR_UPD_COMPANY_COVER.$pro_pic_name, DIR_UPD_COMPANY_COVER.'th2_'.$pro_pic_name, '100', '100');
  
}

echo json_encode($response);