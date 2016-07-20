<?php session_start();?>
<?php

$emailfrmsession = $_SESSION['emailadd'];
$phonefrmsession = $_SESSION['phone'];
$firstnamefrmsession = $_SESSION['firstname'];
$lastnamefrmsession = $_SESSION['lastname'];

$hairsize = $_SESSION['hairsize'];
$hairlength = $_SESSION['hairlength'];
$texture = $_SESSION['texture'] ;//Silky Straight , Natural Body , Body Wave
// make sure user is logged in
if (!$_SESSION['emailadd']) {
    $loginError = "You are not logged in.";
    include("index.php");
    exit();
}


if (isset($_POST['addtocart'])){

$itemcolor = "# 1"; 
$escitemcolor = mysql_escape_string($itemcolor); 
$_SESSION['itemcolor'] = $escitemcolor;

//setting of the catergories
require_once("../db/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) { 
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
		$productByCode = $db_handle->runQuery('SELECT * FROM tblproducthair WHERE itemcode="'.$_GET["code"].'" AND hairtexture="'.$texture.'" AND hairlength="'.$hairlength.'" AND haircolour="'.$escitemcolor.'" AND size="'.$hairsize.'"');
		$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["item"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'hairtype'=>$productByCode[0]["hairtype"], 'hairtexture'=>$productByCode[0]["hairtexture"], 'hairlength'=>$productByCode[0]["hairlength"], 'haircolour'=>$productByCode[0]["haircolour"]));
      
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
			$( "#popupLogin" ).popup();
		}else if(!empty($productByCode)) {
			$_SESSION["cart_item"] = $itemArray;
		}else{
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
    unset($_SESSION["cart_item"]);
  break;  
} 
}

}




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
                    <li class="active"><a href="#">SELECT PRODUCT</a></li>
                    
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
        <a href="https://www.perfectressusorder.com/mobile/view-cart.php"><img src="../images/cart.png"></a><br><br>
        <img src="../images/breadcrumbs2.jpg" class="img-autoscale">
        <h2 class="bold purple">Perfectress Connections - Perfectress Remy Cuticle Hair</h2>
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<img src="https://www.perfectressusorder.com/img/mainpic/transformation-connections1.jpg" width="219" class="img-autoscale" border="1" style="border-color:#E5E3E3;">
              </div>
              
              <div class="ui-block-b">
              	<img src="https://www.perfectressusorder.com/img/mainpic/transformation-connections2.jpg" width="219" class="img-autoscale" border="1" style="border-color:#E5E3E3;">
              </div>
        </div><!--end-grid-a-->
        
        <form>
        <div class="ui-grid-a">
              <div class="ui-block-a in-between-spacing">
              	<label for="hair-length"><h3>Hair Length</h3></label>
     			<input type="text" readonly="readonly" name="hair-length" id="hair-length" value="<?php echo $hairlength; ?>" class="grey-border-input">
              </div>
              
              <div class="ui-block-b">
              	<label for="size"><h3>Size</h3></label>
     			<input type="text" readonly="readonly" name="size" id="size" value="<?php echo $hairsize; ?>" class="grey-border-input">
              </div>
        </div><!--end-grid-a-->
        
        <label for="hair-texture"><h3>Hair Texture</h3></label>
    	<input type="text" readonly="readonly" name="hair-texture" id="hair-texture" value="<?php echo $texture; ?>" class="grey-border-input"  />
        </form>
        
        <br>
        
        <center>
        <p style="font-size:12px;">Color pictures are for reference only which might slightly different based on different mobile setting</p>
        <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor1.png" width="250" height="250">
        <h3><u>JET BLACK<br>#1</u></h3>
        </center>
        
        <form method="post" id="addtocartform" name="addtocartform" action="jet-blk.php?action=add&code=<?php echo "RREN" ?>" onsubmit="return validateForm()" rel="external" data-ajax="false">
        <div class="ui-grid-a">
              <div class="ui-block-a in-between-spacing">
              	<label for="quantity"><h3>Quantity:</h3></label>
                <input type='button' value='-' class='qtyminus btn-addtocart btn' field='quantity' form="addtocartform" />
                <input type='text' name='quantity' value='1' min='1' class='qty qty-addtocart' style="width:20%;" form="addtocartform"/>
                <input type='button' value='+' class='qtyplus btn-addtocart btn' field='quantity' form="addtocartform" />  
              </div>
              
              <div class="ui-block-b">
                <label for="quantity"><h3>&nbsp;</h3></label>
     			
				<!--<a href="#popupLogin" data-rel="popup" data-position-to="window" data-transition="pop" ></a>
				-->
				<button type="submit" form="addtocartform" name="addtocart" class="ui-btn ui-corner-all btn-purple">ADD TO CART</button>
				
				

                <div data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">
                    <form rel="external" data-ajax="false">
                        <div style="padding:10px 20px;">
                            <h3><center>Item has been added to cart.</center></h3>
							<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
							<a href="../view-cart.php" rel="external" data-rel="popup" data-position-to="window" data-transition="pop" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check">View Cart</a>
                           <!-- <button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check">View Cart</button>
							-->        
						</div>
                    </form>
                </div><!--popup-->
				
				
				<!--<a href="" rel="external" class="ui-btn ui-corner-all btn-purple">ADD TO CART</a>-->
              </div>
        </div><!--end-grid-a-->
        
		
		</form>
        
        <a href="../customer-order-details.php" rel="external" class="ui-btn ui-corner-all btn-purple">PROCEED TO ORDER</a>
        <!-- <a href="../order-details.php" rel="external" class="ui-btn ui-corner-all btn-purple">CONTINUE SHOPPING</a> -->
        <a href="remy-cuticle-hair-color.html" rel="external" class="ui-btn ui-corner-all btn-grey">SELECT DIFFERENT COLOR</a>
        
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