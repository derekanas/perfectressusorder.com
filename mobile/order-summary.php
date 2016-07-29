<?php session_start(); 
// make sure user is logged in
if (!$_SESSION['emailadd']) {
    $loginError = "You are not logged in.";
    include("index.php");
    exit();
}

/* remarks */
$_SESSION['remarks'] = $_POST['remarks'];
$remarks = $_SESSION['remarks'];

/* end of remarks */
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
      $codeShit = $_GET['code'];
      $productByCode = $db_handle->runQuery("SELECT code, item, hairtype, hairtexture, hairlength, price, itemcode, size, haircolourname FROM tblproducthair WHERE code='$codeShit'
                                             UNION
                                             SELECT code, item, Null, Null, Null, price, itemcode, Null, Null FROM tblproductoolkit WHERE code='$codeShit'");
      $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["item"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'hairtype'=>$productByCode[0]["hairtype"], 'hairtexture'=>$productByCode[0]["hairtexture"], 'hairlength'=>$productByCode[0]["hairlength"], 'haircolour'=>$productByCode[0]["haircolour"]));
      
      if(!empty($_SESSION["cart_item"])) {
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
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <!-- Include the jQuery Mobile library -->
  <script src="js/jquery.mobile-1.4.5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="js/index.js"></script>
  
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
                    <li class="active"><a href="order-details.php" rel="external">SELECT PRODUCT</a></li>
                    
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
        <img src="images/breadcrumbs3.jpg" class="img-autoscale">
        <p><img src="images/exclamationmark.png" align="left" width="39" style="padding-right:10px;">Your order is almost complete. Please check summary before you confirm the order.</p>
        <h2 class="bold">Order Summary</h2>


    <div>
      <?php 
      $today = date("Ymd");
      $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
      $order_number = $today . $rand;
      // $order_number = rand(1, 9000);
      $_SESSION['order_number'] = $order_number;
      
       ?>
      <h3>Order Number:<span style="color:#823682;"><?php echo "#".$order_number; ?> </span></h3>
    </div>
    


        <h2 class="bold purple">Customer Details</h2>
        
        <form>
            <label for="email-add"><h3>Email Address</h3></label>
            <input type="text" name="email-add" id="email-add" readonly="readonly" class="grey-border-input" value="<?php echo $_SESSION['emailadd']; ?>">
            
            <label for="first-name"><h3>First Name</h3></label>
            <input type="text" name="first-name" id="first-name" readonly="readonly" class="grey-border-input" value="<?php echo $_SESSION['firstname']; ?>">
        
        
          <div class="ui-grid-a">
              <div class="ui-block-a in-between-spacing">
                <label for="last-name"><h3>Last Name</h3></label>
                <input type="text" name="last-name" id="last-name" readonly="readonly" class="grey-border-input" value="<?php echo $_SESSION['lastname']; ?>">
              </div>
              
              <div class="ui-block-b">
                <label for="tel"><h3>Phone No.</h3></label>
                <input type="tel" name="tel" id="tel" class="grey-border-input" readonly="readonly" value="<?php echo $_SESSION['phone']; ?>">
          	  </div>
          </div><!--end-grid-a-->
        
        	<label for="shipping-address"><h3>Shipping Address</h3></label>
			<textarea cols="40" rows="4" name="shipping-address" readonly="readonly" id="shipping-address"><?php echo $_SESSION['address']; ?></textarea>
        
        	<div class="ui-grid-a">
              <div class="ui-block-a in-between-spacing">
                <label for="zip-code"><h3>Zip Code</h3></label>
                <input type="text" name="zip-code" id="zip-code" readonly="readonly" class="grey-border-input" value="<?php echo $_SESSION['zipcode']; ?>">
              </div>
              
              <div class="ui-block-b">
                <label for="city"><h3>City</h3></label>
                <input type="text" name="city" id="city"  readonly="readonly" class="grey-border-input" value="<?php echo $_SESSION['city']; ?> ">
                </div>
             </div><!--end-grid-a-->
             
             <div class="ui-grid-a">
              <div class="ui-block-a in-between-spacing">
                <label for="state"><h3>State</h3></label>
                <input type="text" name="state" id="state" readonly="readonly" class="grey-border-input" value="<?php echo $_SESSION['state']; ?>">
              </div>
              
              <div class="ui-block-b">
                <label for="country"><h3>Country</h3></label>
                <input type="text" name="country" id="country" readonly="readonly" class="grey-border-input" value="<?php echo $_SESSION['country']; ?>">
                </div>
             </div><!--end-grid-a-->
             
             <label for="shipping-preference"><h3>Shipping Preference</h3></label>
             <input type="text" name="shipping-preference" id="shipping-preference" readonly="readonly" class="grey-border-input" value="<?php echo $_SESSION['optiontext']; ?>">

            <label for="shipping-address"><h3>Your Remarks</h3></label>
            <textarea cols="40" rows="5" name="remarks" id="remarks" readonly="readonly"><?php echo $remarks; ?></textarea>
             
        </form>
        
        	 <h2 class="bold purple">Your Order</h2>
             <div class="ui-grid-c my-order-header">
                <div class="ui-block-a"><div class="ui-body ui-body-d"><h3>Name</h3></div></div>
                <div class="ui-block-b"><div class="ui-body ui-body-d center"><h3>Qty</h3></div></div>
                <div class="ui-block-c"><div class="ui-body ui-body-d center"><h3>Price</h3></div></div>
                <div class="ui-block-d"><div class="ui-body ui-body-d center"><h3>Action</h3></div></div>
             </div><!-- /grid-c -->
            
              <?php   
        foreach ($_SESSION["cart_item"] as $item){
        ?>
         <form action="order-summary.php?action=add&code=<?php echo $item["code"]; ?>" method="post" name="shoppingcartform" id="shoppingcartform" rel="external" data-ajax="false">
             <div class="ui-grid-c my-order-content ui-responsive">
                <div class="ui-block-a"><div class="ui-body ui-body-d">
           <!--      	Transformation Connection Hair Extensions<br><br> --><span class="purple">
					<?php echo $item["name"]; echo "<br/><br/><span style='color:purple;'>"; echo $item['hairtexture']; echo "<br/>"; echo $item['haircolour']; echo"<br/>"; echo $item['hairlength']; echo "</span>"; ?>
					</span>
                	
					 <button type="submit" class="ui-btn ui-corner-all btn-purple" style="font-size:3vw;border:none;">UPDATE CART</button>
					
                </div></div>
				<?php $cart_total_price =  $item["quantity"] * $item["price"]; ?>
                <div class="ui-block-b"><div class="ui-body ui-body-d  width-short"><input type="number" name="quantity" pattern="[0-9]*" min="1" max="100" id="number-pattern" value="<?php echo $item["quantity"]; ?>" class="input-center"></div></div>
                <div class="ui-block-c"><div class="ui-body ui-body-d "><?php echo "$".$cart_total_price; ?></div></div>
                <div class="ui-block-d"><div class="ui-body ui-body-d "><a href="order-summary.php?action=remove&code=<?php echo $item["code"]; ?>" class="btn-delete purple">X remove</a></div></div>
             </div><!-- /grid-c -->
			 <?php
            $item_total += ($item["price"]*$item["quantity"]);
            $final_amount = ($_SESSION['sumshippref'] + $item_total);
            ?>
            </form>
        <?php
        }
        ?>
             <!--<div class="ui-grid-c my-order-content">
                <div class="ui-block-a"><div class="ui-body ui-body-d">
                	Transformation Connection Hair Extensions<br><br><span class="purple">Natural Body NB Jet Black #1 14”/20cm</span>
                	<a href="#" class="ui-btn ui-corner-all btn-purple" style="font-size:14px;border:none;">UPDATE CART</a>
                </div></div>
                <div class="ui-block-b"><div class="ui-body ui-body-d center width-short"><input type="number" name="number" pattern="[0-9]*" id="number-pattern" value="2" class="input-center"></div></div>
                <div class="ui-block-c"><div class="ui-body ui-body-d center">208</div></div>
                <div class="ui-block-d"><div class="ui-body ui-body-d center"><a href="" class="btn-delete purple">X</a></div></div>
             </div> /grid-c -->  
             
             <div class="ui-grid-c my-order-header">
                <h3>&nbsp;&nbsp;&nbsp;Total amount before shipping</h3>
             </div><!-- /grid-c -->
             
             <div class="ui-grid-c my-order-content">
             	<h2 style="text-align:right;padding-right:20px;"><?php echo "$".$item_total; ?></h2>
             </div><!-- /grid-c -->
             
             <div class="ui-grid-c my-order-header">
                <h3>&nbsp;&nbsp;&nbsp;Shipping Option</h3>
             </div><!-- /grid-c -->
             
             <div class="ui-grid-c my-order-content">
             	<h2 style="text-align:right;padding-right:20px;"><?php echo "$".$_SESSION['sumshippref']; ?></h2>
             </div><!-- /grid-c -->
             
             <div class="ui-grid-c my-order-header">
                <h3>&nbsp;&nbsp;&nbsp;Final Amount</h3>
             </div><!-- /grid-c -->
             
             <div class="ui-grid-c my-order-content">
             	<h2 style="text-align:right;padding-right:20px;"><?php echo "$".$final_amount; ?></h2>
             </div><!-- /grid-c -->
                 
        <br>
        
        <a href="customer-order-details.php" rel="external" class="ui-btn ui-corner-all btn-grey">< GO BACK</a>
        <a href="order-details.php" rel="external" class="ui-btn ui-corner-all btn-purple">CONTINUE SHOPPING</a>
        <a href="send-contact.php" rel="external" class="ui-btn ui-corner-all btn-purple">SUBMIT ORDER</a>
        <!--<a href="send-contactcustomer-complete-order-details.php" rel="external" class="ui-btn ui-corner-all btn-purple">SUBMIT ORDER</a>
        -->
      </div><!--end-main-->
    
      <a href="terms-conditions.php" data-role="footer" class="footer"><h6>Terms & Conditions</h6></a>
      <a href="logout.php" data-role="footer" class="footer"><h6>Logout</h6></a>
	  <!--end-footer-->
      
    </div><!--end-page-->

</div><!--end-container-->
</body>
</html>
