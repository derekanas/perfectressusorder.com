<?php 
ini_set('display_errors',0);
session_start();
include('global.php');
?>
<!--jc-->
<?php
$emailfrmsession = $_SESSION['emailadd'];
$phonefrmsession = $_SESSION['phone'];
$firstnamefrmsession = $_SESSION['firstname'];
$lastnamefrmsession = $_SESSION['lastname'];
// make sure user is logged in
if (!$_SESSION['emailadd']) {
    $loginError = "You are not logged in.";
    include("index.php");
    exit();
}
require_once("db/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "add":
			if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
		  
			if(!empty($_SESSION["cart_item"])) {
			if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
			  foreach($_SESSION["cart_item"] as $k => $v) {
				  if($productByCode[0]["code"] == $k)
					$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
			  }
			} else {
			  $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
			}
			} else {
			$_SESSION["cart_item"] = $itemArray;
			}
			}
			break;
		case "remove":
			if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
				  if($_GET["code"] == $k)
					unset($_SESSION["cart_item"][$k]);        
				  if(empty($_SESSION["cart_item"]))
					unset($_SESSION["cart_item"]);
				}
			}
			break;
		case "empty":
			unset($_SESSION["cart_item"]);
			break;  
	}
}
?>
<!--JC-->
<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <!-- Include the jQuery library -->
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <!-- Include the jQuery Mobile library -->
  <script src="js/jquery.mobile-1.4.5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="js/index.js"></script>
  <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
  
  <meta charset="UTF-8">
<title>Perfectress US Order Form</title>
</head>

<body>
<div id="container">

    <div data-role="page">
      
      <div data-role="header" class="header">
        
            <img src="https://www.perfectressusorder.com/img/logo.png" width="250" align="left" class="logo">
    
            <nav id="cssmenu">
                <div id="head-mobile"></div>
                <div class="button"></div>
                <ul>
                    <li class="active"><a href="#" rel="external">SELECT PRODUCT</a></li>
                    
                    <li><a href="#">CHART</a>
                      <ul>
                        <li><a href="https://www.perfectressusorder.com/pdf/perfectress-us-availability-chart-hair.pdf" target="_blank">HAIR PRODUCT AVAILABITY CHART ></a></li>
                        <li><a href="https://www.perfectressusorder.com/pdf/perfectress-us-availability-chart-tools.pdf" target="_blank">TOOLS PRODUCT AVAILABITY CHART ></a></li>
                       </ul>
                    </li>
                </ul>
            </nav>
    
      </div><!--end-header-->
      
      <div data-role="main" class="ui-content content">
        <img src="images/cart.png"><br><br>
        <img src="images/breadcrumbs2.jpg" class="img-autoscale">
        <h2 class="bold purple">Select Product Category:<br><br></h2>
        
        <div data-role="collapsible-set">
 
          <div data-role="collapsible">
            <h3>Perfectress Connections</h3>
            <ul class="accordian-mobile">
            	<li><a href="transformation-conns/remy-cuticle-hair-length.php" rel="external" style="color:#803680;">PERFECTRESS REMY CUTICLE HAIR</a></li>
                <li><a href="transformation-conns-purevirgin/pure-virgin-hair-length.php" rel="external" style="color:#803680;">PERFECTRESS PURE VIRGIN HAIR</a></li>
                <li><a href="transformation-conns-fantasycolors/p70-fantasy-color-length.php" rel="external" style="color:#803680;">PERFECTRESS REMY CUTICLE HAIR P70</a></li>
            </ul>
          </div>
         
          <div data-role="collapsible">
            <h3>Perfectress Tape Weft</h3>
            <ul class="accordian-mobile">
            	<li><a href="tapeweft-remycuticle/remy-cuticle-hair-length.php" rel="external" style="color:#803680;">PERFECTRESS REMY CUTICLE HAIR</a></li>
                <li><a href="tapeweft-purevirgin/pure-virgin-hair-length.php" rel="external" style="color:#803680;">PERFECTRESS PURE VIRGIN HAIR</a></li>
                <li><a href="tapeweft-fantasycolors/p70-fantasy-color-length.php" rel="external" style="color:#803680;">PERFECTRESS REMY CUTICLE HAIR P70</a></li>
            </ul>
          </div>
          
          <div data-role="collapsible">
            <h3>Perfectress Multi Weft</h3>
            <ul class="accordian-mobile">
            	<li><a href="multiweft-remycuticle/remy-cuticle-hair-length.php" rel="external" style="color:#803680;">PERFECTRESS REMY CUTICLE HAIR</a></li>
                <li><a href="multiweft-purevirgin/pure-virgin-hair-length.php" rel="external" style="color:#803680;">PERFECTRESS PURE VIRGIN HAIR</a></li>
            </ul>
          </div>
          
          <div data-role="collapsible">
            <h3>Perfectress Tools</h3>
            <ul class="accordian-mobile">
            	<li><a href="tools/tools.php" rel="external" style="color:#803680;">TOOLS</a></li>
                <li><a href="starter-kit/starter-kit.php" rel="external" style="color:#803680;">STARTER KIT</a></li>
            </ul>
          </div>
         
        </div><!--end-collapsible-set-->
        
      </div><!--end-main-->
    
      <a href="terms-conditions.php" data-role="footer" class="footer"><h6>Terms & Conditions</h6></a>
     <a href="logout.php" data-role="footer" class="footer"><h6>Logout</h6></a>
	 <!--end-footer-->
      
    </div><!--end-page-->

</div><!--end-container-->
</body>
</html>