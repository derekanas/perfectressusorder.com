<?php session_start();?>
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

//setting of the catergories

if (isset($_POST['addtocart'])){

	//if(isset($_POST['tool-item'])){

	$itemtool = "Hair Drawing Tool (2 pieces)";
	$escitemtool = mysql_escape_string($itemtool); 
	$_SESSION['itemtool'] = $escitemtool;

	//}//end of the spost radio

//end of the setting of categories

require_once("../db/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) { 
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productByCode = $db_handle->runQuery('SELECT * FROM tblproductoolkit WHERE itemcode="'.$_GET["code"].'" AND item="'.$itemtool.'" ');
      $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["item"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
      
      if((!empty($_SESSION["cart_item"])) && (!empty($productByCode))) {
        if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode[0]["code"] == $k)
                $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
          }
          // $_SESSION["cart_item"] = array();
          // array_push($_SESSION["cart_item"], $itemArray);
          // // dito ako maglalagay ng array push

        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
		header("Location: https://www.perfectressusorder.com/mobile/view-cart.php");
      } 
      else if(!empty($productByCode)) {
        $_SESSION["cart_item"] = $itemArray;
		header("Location: https://www.perfectressusorder.com/mobile/view-cart.php");
      }

      else{
       $message = "No records found please try again";
      echo "<script type='text/javascript'>alert('$message');</script>";
      }
    } //end of if spost quantity 
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
    unset($_SESSION["cart_item"])
;  break;  
} 
}
}//end of the spost addtocart
 ?>
<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <!-- Include the jQuery library -->
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <!-- Include the jQuery Mobile library -->
  <script src="../js/jquery.mobile-1.4.5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="../js/index.js"></script>
  <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
  <script src="../js/quantity.js"></script>
  
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
                    <li class="active"><a href="../order-details.php" rel="external">SELECT PRODUCT</a></li>
                    
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
        <a href="https://www.perfectressusorder.com/mobile/view-cart.php"><a href="https://www.perfectressusorder.com/mobile/view-cart.php"><img src="../images/cart.png"></a></a><br><br>
        <img src="../images/breadcrumbs2.jpg" class="img-autoscale">
        <h2 class="bold purple">Tools</h2>
        
   
        
        <center><img src="https://www.perfectressusorder.com/img/tools/big/bigtool16.png" width="250">
        <h3><u>HAIR DRAWING TOOL (2 PCS)</u></h3>
        </center>
        
        
        
        
        <form method="post" id="addtocartform" action="hair-drawing.php?action=add&code=<?php echo "TOOLS" ?>" rel="external" data-ajax="false">
        <div class="ui-grid-a">
              <div class="ui-block-a in-between-spacing">
              	<label for="quantity"><h3>Select Quantity:</h3></label>
                <input type='button' value='-' class='qtyminus btn-addtocart btn btn-minus' field='quantity' data-role="none" />
                <input type='text' name='quantity' value='1' min='1' max='100' class='qty qty-addtocart qty-display-box' data-role="none" />
                <input type='button' value='+' class='qtyplus btn-addtocart btn btn-plus' field='quantity' data-role="none" />  
              </div>
              
              <div class="ui-block-b">
                <label for="quantity"><h3>&nbsp;</h3></label>
				<button type="submit" form="addtocartform" name="addtocart" class="ui-btn ui-corner-all btn-purple">ADD TO CART</button>
              </div>
        </div><!--end-grid-a-->
        </form>
        
        <a href="../customer-order-details.php" rel="external" class="ui-btn ui-corner-all btn-purple">PROCEED TO ORDER</a>
        <a href="../order-details.php" rel="external" class="ui-btn ui-corner-all btn-purple">CONTINUE SHOPPING</a>
        <a href="tools.php" rel="external" class="ui-btn ui-corner-all btn-grey">SELECT DIFFERENT TOOL</a>
        
			  <!--<div data-role="controlgroup" data-type="horizontal" data-mini="false" data-theme="a" class="ui-controlgroup ui-controlgroup-horizontal ui-group-theme-a ui-corner-all">
              <div class="ui-controlgroup-controls">
              <div class="ui-btn ui-icon-minus ui-btn-icon-notext ui-first-child">
              </div>
              <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset ui-btn">
                <input type="text" data-role="spinbox" name="spin" id="spin" data-options='{"type":"horizontal"}' value="1" min="0" max="100" />
              </div>
              <div class="ui-btn ui-icon-plus ui-btn-icon-notext ui-last-child">
              </div>
              </div>
              </div>-->
              
              
        
      </div><!--end-main-->
    
      <a href="../terms-conditions.php" data-role="footer" class="footer"><h6>Terms & Conditions</h6></a>
      <a href="../logout.php" data-role="footer" class="footer"><h6>Logout</h6></a><!--end-footer-->
      
      
    </div><!--end-page-->

</div><!--end-container-->
</body>
</html>