<?php
error_reporting(0);
class Products {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;

		}
		$this->module = $module;
		$this->id = $id;
		
	}
	function paginate($reload, $page, $tpages) {
	    $adjacents = 2;
	    $prevlabel = "&lsaquo; Prev";
	    $nextlabel = "Next &rsaquo;";
	    $out = "";
	    // previous
	    if ($page == 1) {
	        $out.= "<span>" . $prevlabel . "</span>";
	    } elseif ($page == 2) {
	        $out.= "&nbsp<a  href=\"" . $reload . "\"><button>" . $prevlabel . "</button></a>&nbsp";
	    } else {
	        $out.= "&nbsp<a  href=\"" . $reload . "&amp;page=" . ($page - 1) . "\"><button>" . $prevlabel . "</button></a>&nbsp";
	    }
	  
	    $pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
	    $pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
	    for ($i = $pmin; $i <= $pmax; $i++) {
	        if ($i == $page) {
	            $out.= "<span  class=\"active\"><a href=''><button>" . $i . "</button></a>&nbsp</span>";
	        } elseif ($i == 1) {
	            $out.= "&nbsp<a  href=\"" . $reload . "\"><button>" . $i . "</button></a>&nbsp";
	        } else {
	            $out.= "&nbsp<a  href=\"" . $reload . "&amp;page=" . $i . "\"><button>" . $i . "</button></a>&nbsp";
	        }
	    }
	    
	    if ($page < ($tpages - $adjacents)) {
	        $out.= "<a style='font-size:11px' href=\"" . $reload . "&amp;page=" . $tpages . "\"><button>" . $tpages . "</button></a>";
	    }
	    // next
	    if ($page < $tpages) {
	        $out.= "&nbsp<a  href=\"" . $reload . "&amp;page=" . ($page + 1) . "\"><button>" . $nextlabel . "</button></a>&nbsp";
	    } else {
	        $out.= "<span style='font-size:11px'><button>" . $nextlabel . "</button></span>";
	    }
	    $out.= "";
	    return $out;
	}
	public function getProducts($query) {
		global $pagenumbers;
		$mysql_hostname = "localhost";  //your mysql host name
		$mysql_user = "root";			//your mysql user name
		$mysql_password = "";			//your mysql password
		$mysql_database = "markethub";	//your mysql database

		$conn = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
		mysql_select_db($mysql_database, $conn) or die("Error on database connection");
			
		$html = null;
		$result = mysql_query($query);
		$check = mysql_num_rows($result);
		if ($check == "") {
			$html = "<center><h1 style='color:red;'>No Result Found</h1></center><div class = 'divspace'></div>";
		}
		else{
		//coding of pagination
		$per_page = 12;         // number of results to show per page

		$total_results = mysql_num_rows($result);
		// echo "total result:".$total_results;
		//echo $total_results;
		$total_pages = ceil($total_results / $per_page);//total pages we going to have

		//-------------if page is setcheck------------------//
		if (isset($_GET['page'])) {
		    $show_page = $_GET['page'];             //it will telles the current page
		    if ($show_page > 0 && $show_page <= $total_pages) {
		        $start = ($show_page - 1) * $per_page;
		        $end = $start + $per_page;
		    } else {
		        // error - show first set of results
		        $start = 0;              
		        $end = $per_page;
		    }
		} else {
		    // if page isn't set, show first set of results
		    $start = 0;
		    $end = $per_page;
		}
		// display pagination
		$page = intval($_GET['page']);

		$tpages=$total_pages;
		if ($page <= 0)
		    $page = 1;
		if (isset($_GET['cata']) && isset($_GET['sub'])) {
			$cata = $_GET['cata'];
			$sub = $_GET['sub'];
			$reload = $_SERVER['PHP_SELF'] . "?cata=" . $cata . "&sub=" . $sub . "&tpages=" . $tpages;
		}
		else if (isset($_GET['search']) && isset($_GET['sub'])) {
			$search = $_GET['search'];
			$sub = $_GET['sub'];
			$reload = $_SERVER['PHP_SELF'] . "?search=" . $search . "&sub=" . $sub . "&tpages=" . $tpages;
		}
		else if (isset($_GET['cata'])) {
			$cata = $_GET['cata'];
			$reload = $_SERVER['PHP_SELF'] . "?cata=" . $cata . "&tpages=" . $tpages;
		}
		else
		{
			$reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;
		}	
		if ($total_pages > 1) {
            $pagenumbers = $this->paginate($reload, $show_page, $total_pages);
            $_SESSION['pagenumbers'] = $pagenumbers;
        }
        for ($i = $start; $i < $end; $i++) {
        // make sure that PHP doesn't try to show results that don't exist
        if ($i == $total_results) {
            break;
        }
            	$replace = array(
            		'%productid%'=>mysql_result($result, $i, 'id'),
					'%image%'=>SITE_IMG.'Products/'.mysql_result($result, $i, 'imageName'),
					'%title%'=>mysql_result($result, $i, 'title'),
					'%price%' => mysql_result($result, $i, 'price'),
					'%id%' => mysql_result($result, $i, 'id'),
					'%link%' => SITE_MOD.'singleproduct-nct/?id='.base64_encode(mysql_result($result, $i, 'id')),
					'%addtocart%' => base64_encode(mysql_result($result, $i, 'id')),
					'%addtowishlist%'=>base64_encode(mysql_result($result, $i, 'id')),
 				);
				$html .= get_view(DIR_TMPL . $this->module . "/showproducts-nct.tpl.php",$replace);
			
		}
		}return $html;
	}

	public function getCategory()
	{	
		$option = null;
		$conn=mysqli_connect("localhost","root","","markethub");
		$query = "SELECT * FROM tbl_menubar WHERE type='c' AND status='a'";
		$result = mysqli_query($conn,$query);
		foreach ($result as $k => $v) {
			$option .= "<option value='".$v['id']."'>".$v['menu']."</option>";
		}
		return $option;
	}
	
	public function getPageContent($query) {
		$replace = array(
			'%PRODUCTS%' => $this->getProducts($query),
			'%pagenumbers%' => $_SESSION['pagenumbers'],
			'%category%' => $this->getCategory(),
		);
		$returnvalue=get_view(DIR_TMPL . $this->module . "/" . $this->module . ".tpl.php",$replace);
		unset($_SESSION['pagenumbers']);
		return $returnvalue;
	}

	
}

?>
<style type="text/css">
.divspace
{
	height:700px;
}
@media only screen and (max-width: 768px) {
	.divspace{
		height : 0%;
	}
}
</style>