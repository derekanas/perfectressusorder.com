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
$cnfrmshipstate = $_SESSION['state'];
$cnfrmshipcode = $_SESSION['zipcode'];
$cnfrmshipcountry = $_SESSION['country'];
$order_number = $_SESSION['order_number'];
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
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <!-- Include the jQuery library -->
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <!-- Include the jQuery Mobile library -->
  <script src="js/jquery.mobile-1.4.5.min.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>
  
  <meta charset="UTF-8">
<title>Perfectress US Order Form</title>
</head>

<body>
<div id="container">

    <div data-role="page">
      
      <div data-role="header" class="header">
        
            <img src="https://www.perfectressusorder.com/img/logo.png" width="250" align="left" class="logo">
    
            <nav id='cssmenu'>
                <div id="head-mobile"></div>
                <div class="button"></div>
                <ul>
                    <li class='active'><a href="order-details.php" rel="external">SELECT PRODUCT</a></li>
                    
                    <li><a href='#'>CHART</a>
                      <ul>
                        <li><a href='https://www.perfectressusorder.com/pdf/perfectress-us-availability-chart-hair.pdf' target="_blank">HAIR PRODUCT AVAILABITY CHART ></a></li>
                        <li><a href='https://www.perfectressusorder.com/pdf/perfectress-us-availability-chart-tools.pdf' target="_blank">TOOLS PRODUCT AVAILABITY CHART ></a></li>
                       </ul>
                    </li>
                </ul>
            </nav>
    
      </div><!--end-header-->
      
      <div data-role="main" class="ui-content content">
        
        <p class="bold purple center"><h1><center>THANK YOU</center></h1></p>
        
        <center><img src="images/confirm.png" align="middle"></center>
        <br>

          <?php 

      // $order_number = rand(1, 9000);
      // $_SESSION['order_number'] = $order_number

       ?>
        <div class="order-number center"><h2>Order Number: <span class="purple"><?php echo "#".$order_number; ?></span></h2></div>
        <br>
        <p class="center">Your order has been successfully processed.<br>Your receipt is being mailed to the email address you provided. Please keep it for your records.</p>
        
        <br>
        
        <a href="order-details.php" rel="external" class="ui-btn ui-corner-all btn-purple">BROWSE PRODUCTS</a>
        
      </div><!--end-main-->
    
      <a href="terms-conditions.php" data-role="footer" class="footer"><h6>Terms & Conditions</h6></a>
      <a href="logout.php" data-role="footer" class="footer"><h6>Logout</h6></a>
	  <!--end-footer-->
      
    </div><!--end-page-->

</div><!--end-container-->
</body>
</html>
<?php session_destroy(); ?>
