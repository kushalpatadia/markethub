<?php

class ManageOrder {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
	}

	public function getOrderTable($paypalemail,$year,$month){
		$html = null;

        // if (SITE_URL == "http://training.ncryptedprojects.com/markethub/") {
        //     $conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
        // }
        // elseif (SITE_URL == "http://localhost/markethub/") {
        //     $conn = mysqli_connect("localhost","root","","markethub");
        // }
        global $conn;



		$select_uid = mysqli_query($conn,"SELECT u_id FROM register_users WHERE paypal_email='$paypalemail'");
		$fetch = mysqli_fetch_assoc($select_uid);
		$u_id = "U".$fetch['u_id'];
		$year = $year;
		$month = $month;
		$ym = $year.'-'.$month;

		$results = mysqli_query($conn,"SELECT *,tp.price as product_price, tod.price as order_price FROM tbl_products AS tp INNER JOIN tbl_order_details AS tod ON tp.id = tod.p_id WHERE tod.status='d' AND tp.upload_by = '$u_id' AND tod.purchase_date LIKE '$ym%' ORDER BY tod.id DESC");

		if(!empty($results)){
			foreach ($results as $k => $v) {
				$userid = $v['upload_by'];
				$user = substr($userid,1);
				$query = mysqli_query($conn,"SELECT paypal_email FROM register_users WHERE u_id='$user'");
				$fetch = mysqli_fetch_assoc($query);
				$email = $fetch['paypal_email'];

				$replace = array(
					'%selleremail%' => $email,
					'%id%' => $v['id'],
					'%product%' => $v['title'],
					'%price%' => $v['order_price'],
					'%orderid%' => "<a href='".SITE_ADM_MOD."manageuserquery-nct/index.php?orderno=".$v['order_id']."'>".$v['order_id']."</a>",
					'%productid%' => $v['p_id'],
					'%userId%' => $v['u_id'],
					'%qty%' => $v['qty'],
					'%status%' => $v['status'],
					'%purchase_date%' => $v['purchase_date'],
					);
				$html .= get_view(DIR_ADMIN_TMPL . $this->module . "/paysellertable-nct.tpl.php",$replace);
			}
		}
		return $html;
	}

	public function PaypalForm($paypalemail,$year,$month)
	{
		$html = null;

        // if (SITE_URL == "http://training.ncryptedprojects.com/markethub/") {
        //     $conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
        // }
        // elseif (SITE_URL == "http://localhost/markethub/") {
        //     $conn = mysqli_connect("localhost","root","","markethub");
        // }
        global $conn;


		if (isset($_POST['submitdetails']) && $_POST['paypalemail'] && $_POST['year'] && $_POST['month'] && $_POST['month']!='0') {
			$select_uid = mysqli_query($conn,"SELECT u_id FROM register_users WHERE paypal_email='$paypalemail'");
			$fetch = mysqli_fetch_assoc($select_uid);
			$u_id = "U".$fetch['u_id'];
			$year = $year;
			$month = $month;
			$ym = $year.'-'.$month;
			$date =  date('Y-m-d H:i:s');

			$results = mysqli_query($conn,"SELECT *,tp.price as product_price,tod.id as o_id,tod.price as order_price FROM tbl_products AS tp INNER JOIN tbl_order_details AS tod ON tp.id = tod.p_id WHERE tod.status='d' AND tp.upload_by = '$u_id' AND tod.purchase_date LIKE '$ym%' ORDER BY tod.id DESC");
			$num = mysqli_num_rows($results);
			if(!empty($results && $num>0)){
				$total = 0;
				$result_json = array();
				$paypal_json = array();
				foreach ($results as $k => $v) {
					$total += $v['order_price']*$v['qty'];
					$result_json['productname']=$v['title'];
					$result_json['price']=$this->Commission($v['order_price']);
					$result_json['qty']=$v['qty'];
					$paypal_json['orderid']=$v['o_id'];

					$userid = $v['upload_by'];
					$user = substr($userid,1);
					$query = mysqli_query($conn,"SELECT paypal_email FROM register_users WHERE u_id='$user'");
					$fetch = mysqli_fetch_assoc($query);
					$email = $fetch['paypal_email'];
					$products[] = $result_json;
					$custom[] = $paypal_json;
				}
				$jsonOPArray=array('email'=>$email,'total'=>$total,'result'=>$products, 'custom'=>'done');
				$jsonOutput = json_encode($jsonOPArray);

				$jsonCustomArray=array('result'=>$custom);
				$CustomOutput = json_encode($jsonCustomArray);
				// echo $CustomOutput;

				$query = mysqli_query($conn,"INSERT INTO `tbl_seller_payment`(`seller_email`, `payment_details`,`orderid_details`,`last_payment`) VALUES ('$paypalemail','$jsonOutput', '$CustomOutput','$date')");

				if ($jsonOutput!='') {
					$html .= '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="frm_paypal" id="frm_paypal">';
					$jsonIterator = new RecursiveIteratorIterator(
						new RecursiveArrayIterator(json_decode($jsonOutput, TRUE)),
						RecursiveIteratorIterator::SELF_FIRST);
					$count = -1;
					foreach ($jsonIterator as $key => $val) {
						if(is_array($val)) {
							$count++;
						}
						else
						{
							if ($key == 'email') {
								$html .= '<input type="hidden" name="cmd" value="_cart"><input type="hidden" name="upload" value="1"><input type="hidden" name="currency_code" value="USD" id="frm_paypal">';
								$html .= "<input type='hidden' name='business' value=$val>";
							}
							elseif ($key == 'productname') {
								$html .= "<input type='hidden' name='item_name_".$count."' value=$val>";
							}
							elseif ($key == 'price') {
								$html .= "<input type='hidden' name='amount_".$count."' value=$val>";
							}
							elseif ($key == 'qty') {
								$html .= "<input type='hidden' name='quantity_".$count."' value=$val>";
							}
							elseif ($key == 'custom') {
								$html  .= "<input type='hidden' name='custom[]' value='".$custom."'/>";
								$html .= "<input type='hidden' name='notify_url' value='".SITE_URL."modules-nct/checkout-nct/notify-nct.php'><input type='hidden' name='cancel_return' value='".SITE_URL."modules-nct/checkout-nct/'><input type='hidden' name='return' value='".SITE_ADM_MOD."sellerpayment-nct/'>";
								$html .= '<input type="button" name="paynow" value="paynow" class="btn btn-success" onclick="paypal()">';

								echo '<script type="text/javascript">
								function paypal(){
									document.forms["frm_paypal"].submit();
								}
							</script>';

								// $html .= '<input type="hidden" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal -  fast, free and secure!">';
							$html .= '</form>';
						}
					}
				}
			}
		}
	}
	return $html;
}

public function Commission($price)
{
	$actualprice = $price;
	$convertprice = (($price*90)/100)/60;
	return $convertprice;
}

	public function getDynamicMenu()
	{
		$html = null;

        // if (SITE_URL == "http://training.ncryptedprojects.com/markethub/") {
        //     $conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
        // }
        // elseif (SITE_URL == "http://localhost/markethub/") {
        //     $conn = mysqli_connect("localhost","root","","markethub");
        // }
        global $conn;


		$module1 = $this->headTitle;
		$query = "SELECT * FROM tbl_admin_menu WHERE isActive='y'";
		$result = mysqli_query($conn,$query);
		// exit;
		foreach ($result as $k => $v) {
			$active = $v['title'];
			if ($active == $module1) {
				$active = "active";
			}
			else
			{
				$active = null;
			}
			$replace = array(
				'%active%' => $active,
				'%menulink%' => $v['link'],
				'%icon-class%' => $v['svg_class'],
				'%icon-use%' => $v['use_xlink'],
				'%menu-title%' => $v['title'],
				);
			$html .= get_view(DIR_ADMIN_TMPL . "dashboard-nct/sitemenu-nct.tpl.php",$replace);
		}
		return $html;
	}
			
public function getPageContent($paypalemail,$year,$month) {

        // if (SITE_URL == "http://training.ncryptedprojects.com/markethub/") {
        //     $conn = mysqli_connect("localhost","demonquf_market","M&~NB}CAUI^c","demonquf_markethub");
        // }
        // elseif (SITE_URL == "http://localhost/markethub/") {
        //     $conn = mysqli_connect("localhost","root","","markethub");
        // }
        global $conn;


	$checklastpayment = mysqli_query($conn,"SELECT * FROM tbl_seller_payment WHERE seller_email='$paypalemail' AND status='c' ORDER BY sp_id DESC LIMIT 1");
	$fetchdate = mysqli_fetch_assoc($checklastpayment);
	$getdate = $fetchdate['last_payment'];

	$select = mysqli_query($conn,"SELECT paypal_email FROM register_users WHERE paypal_email!=''");
	foreach ($select as $k => $v) {
		$email .= "<option value=".$v['paypal_email'].">".$v['paypal_email']."</option>";
	}
	$replace=array(
		'%last_payment%' => $getdate,
		'%paypalemail%' => $email,
		'%ORDER TABLE%' => $this->getOrderTable($paypalemail,$year,$month),
		'%DYNAMIC-MENU%' => $this->getDynamicMenu(),
		'%PAYNOW%' => $this->PaypalForm($paypalemail,$year,$month)
		);
	return get_view(DIR_ADMIN_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
}
}

?>
