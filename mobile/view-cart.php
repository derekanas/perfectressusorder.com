<?php session_start(); 

// make sure user is logged in
if (!$_SESSION['emailadd']) {
    $loginError = "You are not logged in.";
    include("index.php");
    exit();
}

$emailfrmsession = $_SESSION['emailadd'];
$phonefrmsession = $_SESSION['phone'];
$firstnamefrmsession = $_SESSION['firstname'];
$lastnamefrmsession = $_SESSION['lastname'];
$texture = $_SESSION["texture"]; 
$itemcolor = $_SESSION["itemcolor"];
$hairlength = $_SESSION["hairlength"];
$city = $_SESSION["city"]; 

require_once("db/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) { 
	switch($_GET["action"]) {
	  case "add":
		if(!empty($_POST["quantity"])) {
		  $productByCode = $db_handle->runQuery('SELECT * FROM tblproducthair WHERE code="'.$_GET["code"].'"');
		  $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["item"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'hairtype'=>$productByCode[0]["hairtype"], 'hairtexture'=>$productByCode[0]["hairtexture"], 'hairlength'=>$productByCode[0]["hairlength"], 'haircolour'=>$productByCode[0]["haircolour"]));
		  
		  if(!empty($_SESSION["cart_item"])) {
			if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
			  foreach($_SESSION["cart_item"] as $k => $v) {
				  if($productByCode[0]["code"] == $k){
					$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
				  }
			  }
			  // $_SESSION["cart_item"] = array();
			  // array_push($_SESSION["cart_item"], $itemArray);
			  // // dito ako maglalagay ng array push

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

if (isset($_POST['submitordersummary'])){

	$shippref = $_POST['shippingpreference'];
	$optiontext = $_POST['shipoptiontext'];
	$_SESSION['optiontext'] = $optiontext;
	$_SESSION['sumshippref'] = $shippref;
	$_SESSION['sumshipadd'] = $shipadd;

}

?>
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
  <script src="js/quantity.js"></script>
  
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
                    <li class="active"><a href="order-details.php">SELECT PRODUCT</a></li>
                    
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
        <img src="images/cart.png">
        <h2 class="bold purple">Items in Cart</h2>
        <?php
		if(isset($_SESSION["cart_item"])){
			$item_total = 0;
		?> 
        <div class="ui-grid-c my-order-header">
                <div class="ui-block-a"><div class="ui-body ui-body-d"><strong>Name</strong></div></div>
                <div class="ui-block-b"><div class="ui-body ui-body-d"><strong>Qty</strong></div></div>
                <div class="ui-block-c"><div class="ui-body ui-body-d"><strong>Price</strong></div></div>
                <div class="ui-block-d"><div class="ui-body ui-body-d"><strong>Action</strong></div></div>
             </div><!-- /grid-c -->
             <?php   
				foreach ($_SESSION["cart_item"] as $item){
			 ?>
             <div class="ui-grid-c my-order-content ui-responsive border-bottom">
                <div class="ui-block-a">
                <div class="ui-body ui-body-d">
                	<?php echo $item["name"]; echo "<br/><br/><span style='color:purple;'>"; echo $item['hairtexture']; echo "<br/>"; echo $item['haircolour']; echo"<br/>"; echo $item['hairlength']; if($item['hairlength']!=""){echo '"';} echo "</span>"; ?>
					<!--<br><br><span class="purple">Natural Body NB Jet Black #1 14”/20cm</span>-->
                </div></div>
                <div class="ui-block-b"><div class="ui-body ui-body-d width-short"><input type="number" readonly="readonly" name="number" pattern="[0-9]*" id="number-pattern" value="<?php echo $item["quantity"]; ?>" class="input-center"></div></div>
                <div class="ui-block-c"><div class="ui-body ui-body-d"><?php $cart_total_price =  $item["quantity"] * $item["price"]; ?><?php echo "$".$cart_total_price; ?></div></div>
                <div class="ui-block-d"><div class="ui-body ui-body-d"><a href="view-cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btn-delete purple">X remove</a></div></div>
             </div><!-- /grid-c -->
             <?php
					$item_total += ($item["price"]*$item["quantity"]);
				}
		}
			?>
            <!-- <div class="ui-grid-c my-order-content ui-responsive">
                <div class="ui-block-a"><div class="ui-body ui-body-d">
                	Transformation Connection Hair Extensions<br><br><span class="purple">Natural Body NB Jet Black #1 14”/20cm</span>
                </div></div>
                <div class="ui-block-b"><div class="ui-body ui-body-d width-short"><input type="number" name="number" pattern="[0-9]*" id="number-pattern" value="2" class="input-center"></div></div>
                <div class="ui-block-c"><div class="ui-body ui-body-d">208</div></div>
                <div class="ui-block-d"><div class="ui-body ui-body-d"><a href="" class="btn-delete purple">X</a></div></div>
             </div> /grid-c --> 
        
        <a href="order-details.php" rel="external" class="ui-btn ui-corner-all btn-purple">BACK TO PRODUCT CATEGORY</a>
        <a href="customer-order-details.php" rel="external" class="ui-btn ui-corner-all btn-purple">PROCEED TO ORDER</a>
        
      
      <a href="terms-conditions.php" data-role="footer" class="footer"><h6>Terms & Conditions</h6></a>
      <a href="logout.php" data-role="footer" class="footer"><h6>Logout</h6></a><!--end-footer-->
      
    </div><!--end-main-->
    </div><!--end-page-->

</div><!--end-container-->
</body>
</html>