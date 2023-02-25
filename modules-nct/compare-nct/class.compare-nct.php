<?php
error_reporting(0);
class CompareProducts {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
		
	}

	public function getPageContent($query1,$query2) {
		$conn=mysqli_connect("localhost","root","","markethub");
		
		$result1 = mysqli_query($conn,$query1);
		$result2 = mysqli_query($conn,$query2);
		$result1 = mysqli_fetch_array($result1);
		$result2 = mysqli_fetch_array($result2);
		$img1 = "<td><center><img src='".SITE_IMG."Products/".$result1['imageName']."' class='my-img-class'></center></td>";
		$img2 = "<td><center><img src='".SITE_IMG."Products/".$result2['imageName']."' class='my-img-class'></center></td>";
		$title1 ="<td>".$result1['title']."</td>";
		$title2 ="<td>".$result2['title']."</td>";
		$price1 ="<td>".$result1['price']."</td>";
		$price2 ="<td>".$result2['price']."</td>";
		$size1 ="<td>".$result1['size']."</td>";
		$size2 ="<td>".$result2['size']."</td>";
		$desc1 ="<td>".$result1['shortDescription']."</td>";
		$desc2 ="<td>".$result2['shortDescription']."</td>";
		$spec1 ="<td>".$result1['specification']."</td>";
		$spec2 ="<td>".$result2['specification']."</td>";
		$addinfo1 ="<td>".$result1['additionalinfo']."</td>";
		$addinfo2 ="<td>".$result2['additionalinfo']."</td>";
		
		$replace = array(
			'%proimg%' => $img1.$img2,'%protitle%' => $title1.$title2,'%proprice%' => $price1.$price2,
			'%prosize%' => $size1.$size2,'%prodesc%' => $desc1.$desc2,'%prospecification%' => $spec1.$spec2,
			'%proaddinfo%' => $addinfo1.$addinfo2
			);
		return get_view(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
	}

	
}

?>
