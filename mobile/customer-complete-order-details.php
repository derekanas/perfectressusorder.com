<?php session_start();

// make sure user is logged in
if (!$_SESSION['emailadd']) {
    $loginError = "You are not logged in.";
    include("index.php");
    exit();
}
$optiontext = $_SESSION['optiontext'];
$emailfrmsession = $_SESSION['emailadd'];
$phonefrmsession = $_SESSION['phone'];
$firstnamefrmsession = $_SESSION['firstname'];
$lastnamefrmsession = $_SESSION['lastname']; 
$texture = $_SESSION["texture"]; 
$itemcolor = $_SESSION["itemcolor"];
$hairlength = $_SESSION["hairlength"];
$cnfrmemail =  $_SESSION['emailadd'];
$cnfrmphone =  $_SESSION['phone'];
$cnfrmfname =  $_SESSION['firstname'];   
$cnfrmlname =  $_SESSION['lastname'];
$cnfrmshippref =  $_SESSION['optiontext'];
$cnfrmshipadd = $_SESSION['address'];
$cnfrmshipcity = $_SESSION['city'];
$cnfrmshipstate =$_SESSION['state'];
$cnfrmshipcode = $_SESSION['zipcode'];
$cnfrmshipcountry =$_SESSION['country'];
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

if (isset($_POST['submitordersummary'])){

$email = $_POST['inputemail'];
$phone = $_POST['inputphone'];
$fname = $_POST['inputfirstname'];
$lname = $_POST['inputlastname'];
$shippref = $_POST['shippingpreference'];
$shipadd  = $_POST['shippingaddress'];
$shipstadd = $_POST['shippingstreetaddress'];
$shipcity = $_POST['shippingcity'];
$shipstate = $_POST['shippingstate'];
$shipcode = $_POST['shippingzip'];
$shipcountry = $_POST['shippingcountry'];

$_SESSION['sumemail'] = $email;
$_SESSION['sumphone'] = $phone;
$_SESSION['sumfname'] = $fname;
$_SESSION['sumlname'] = $lname;
$_SESSION['sumshippref'] = $shippref;
$_SESSION['sumshipadd'] = $shipadd;
$_SESSION['sumshipcity'] = $shipstadd;
$_SESSION['sumshipstate'] = $shipstate;
$_SESSION['sumshipcode'] = $shipcode;
$_SESSION['sumshipcountry'] = $shipcountry;
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
                    <li class="active"><a href="product-category.html" rel="external">SELECT PRODUCT</a></li>
                    
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
        <p><img src="images/exclamationmark.png" align="left" width="39" style="padding-right:10px;">Please check your complete order before finalizing it below.</p>
        <?php $order_number = rand(1, 9000);
		$_SESSION['order_number'] = $order_number;

		?>
		<h2 class="bold">Order Number: <span class="purple"><?php echo "#".$order_number; ?></span></h2>
        <h2 class="bold purple">Customer Details</h2>
        
        <div class="greyborder">
        <div class="ui-grid-a ">
            <div class="ui-block-a"><b>Email Address</b></div>
            <div class="ui-block-b"><?php echo $cnfrmemail ?></div>
        </div><!-- /grid-a -->
        <br>
        <div class="ui-grid-a">
            <div class="ui-block-a"><b>Phone No.</b></div>
            <div class="ui-block-b"><?php echo $cnfrmphone ?></div>
        </div><!-- /grid-a -->
        <br>
        <div class="ui-grid-a">
            <div class="ui-block-a"><b>First Name</b></div>
            <div class="ui-block-b"><?php echo $cnfrmfname ?></div>
        </div><!-- /grid-a -->
        <br>
        <div class="ui-grid-a">
            <div class="ui-block-a"><b>Last Name</b></div>
            <div class="ui-block-b"><?php echo $cnfrmlname ?></div>
        </div><!-- /grid-a -->
        </div>
        
        <br>
        <?php
			if(isset($_SESSION["cart_item"])){
				$item_total = 0;
			?>  
        <div class="greyborder2">
        <div class="ui-grid-b"
>            <div class="ui-block-a"><div class="ui-body ui-body-d"><h3>Name</h3></div></div>
            <div class="ui-block-b"><div class="ui-body ui-body-d center"><h3>Qty</h3></div></div>
            <div class="ui-block-c"><div class="ui-body ui-body-d center"><h3>Price</h3></div></div>
        </div><!-- /grid-b -->
        </div>
        
        <br>
        <?php   
        foreach ($_SESSION["cart_item"] as $item){
        ?>
         <form action="order-summary.php?action=add&code=<?php echo $item["code"]; ?>" method="post" name="shoppingcartform" id="shoppingcartform">
         
        <div class="greyborder2">
        <div class="ui-grid-b">
            <div class="ui-block-a"><div class="ui-body ui-body-d"><p>Transformation Connection Hair Extensions<br><br><?php echo $item["name"]; echo "<br/><br/><span style='color:purple;'>"; echo $item['hairtexture']; echo "<br/>"; echo $item['haircolour']; echo"<br/>"; echo $item['hairlength']; echo "</span>"; ?></p></div></div>
			<div class="ui-block-b"><div class="ui-body ui-body-d center"><p><?php echo $item["quantity"]; ?></p></div></div>
            <?php $cart_total_price =  $item["quantity"] * $item["price"]; ?>
            <div class="ui-block-c"><div class="ui-body ui-body-d center"><p><?php echo "$".$cart_total_price; ?></p></div></div>
        </div><!-- /grid-b -->
        <?php
            $item_total += ($item["price"]*$item["quantity"]);
            $final_amount = ($_SESSION['sumshippref'] + $item_total);
            ?>
            </form>
        <?php
        }
        ?>
		 <?php
    }
    ?>
		<!--
        <div class="ui-grid-b">
            <div class="ui-block-a"><div class="ui-body ui-body-d"><p>Transformation Connection Hair Extensions<br><br>Texture: Natural Body NB Colour: Jet Black #1 Hair Length: 14”/20cm</p></div></div>
            <div class="ui-block-b"><div class="ui-body ui-body-d center"><p>2</p></div></div>
            <div class="ui-block-c"><div class="ui-body ui-body-d center"><p>USD208</p></div></div>
        </div>/grid-b -->
        </div>
        
        
        <h3 class="bold purple">Shipping Address</h3>
        <div class="greyborder">
        	<?php echo $cnfrmshipadd ;?>
        </div>
        
        <h3 class="bold purple">Shipping Preferences</h3>
        <div class="greyborder">
        	<?php echo $optiontext ;?>
        </div>
        
        <h3 class="bold">Total Amount Before Shipping</h3>
        <div class="greyborder">
        	<?php echo '$'.$item_total; ?>
        </div>
        
        <h3 class="bold">Shipping Option</h3>
        <div class="greyborder">
        	<?php echo '$'.$cnfrmshippref; ?>
        </div>
        
        <h3 class="bold">Final Amount</h3>  
        <div class="greyborder">
        	<?php echo '$'.$final_amount; ?> 
			<?php $_SESSION['finalamount'] = $final_amount; ?>
        </div> 
                 
        <br>
        
        <a href="order-summary.php" rel="external" class="ui-btn ui-corner-all btn-grey">BACK TO ORDER</a>
        <a href="order-details.php" rel="external" class="ui-btn ui-corner-all btn-purple">ORDER MORE</a>
        <a href="send-contact.php" rel="external" class="ui-btn ui-corner-all btn-purple">CONFIRM ORDER</a>
        
      </div><!--end-main-->
    
      <a href="terms-conditions.php" data-role="footer" class="footer"><h6>Terms & Conditions</h6></a>
      <a href="logout.php" data-role="footer" class="footer"><h6>Logout</h6></a>
	  <!--end-footer-->
      
    </div><!--end-page-->

</div><!--end-container-->
</body>
</html>
