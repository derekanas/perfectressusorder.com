<?php 
session_start(); 
if ($_SESSION['emailadd']) {
    $loginError = "You are currently logged in.";
    include("customer-details.php");
    exit();
}
?>
<!--JC-->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Perfectress US Order Form</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width,maximum-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
<link rel="stylesheet" href="css/style.css">

  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
 
  
  <script src="js/jquery.mobile-1.4.5.min.js"></script>
    <script src="js/index.js"></script>
<!--
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
 
  
  <script src="js/jquery.mobile-1.4.5.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>
  
  <meta charset="UTF-8">
<title>Perfectress US Order Form</title>
-->

</head>

<body>
  <div id="container">

    <div data-role="page" data-ajax="false">
      
      <div data-role="header" class="header">
        
            <img src="https://www.perfectressusorder.com/img/logo.png" width="250" align="left" class="logo">
    
            <nav id='cssmenu'>
                <div id="head-mobile"></div>
                <div class="button"></div>
                <ul>
                    <li class='active'><a href='#'>SELECT PRODUCT</a></li>
                    
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
        


      <div>
        <h3>TERMS & CONDITIONS
        </h3>
        <br/>
        <h4 style="font-weight:bold;">Operating Hours:</h4>  
        <p>9am-8pm EST Monday - Thursday <br>
        9am-7pm Friday. <br>
        <span style="color:red">We are closed for business on all major holidays</span></p>

        <h4 style="font-weight:bold;">Placing an Order:</h4>  
        <p>The preferred method of placing an order is to go online and order at <a href="index.php">perfectressusorder.com</a> or <br>
        email us at <a href="mailto:orders@perfectress.us">orders@perfectress.us</a> or please call Toll Free (9am-8pm EST) <a href="tel:1-888-220-8520">1-888-220-8520</a> <br> 
        Orders received by 5:00pm (EST) will be shipped the same day. <br>
        Orders received after 5:00pm (EST) will be shipped out the following business day.</p>

        <p>We <strong>ACCEPT</strong> all major Credit Cards. <br>
        We DO NOT <strong>ACCEPT</strong> cheques or cash on delivery.</p>

        <h4 style="font-weight:bold;">Please have the following information available when ordering:</h4>
        <p>Credit card number with the expiration date, 3-digit security code (on back), billing zip code, and
          the anticipated arrival date Credit Cards will be charged at the time of order.</p>


        <h4 style="font-weight:bold;">Shipping and Delivery Concerns:</h4>
        <p>While awaiting an order from Global Grind, LLC please understand that we take NO responsibility
        for carrier delays. We ship UPS and offer NO reimbursements for delayed shipments.</p>

        <h4 style="font-weight:bold;">For concerns, questions, and/or comments regarding shipping:</h4>
        <p>Please call  <a href="tel:1-888-220-8520">1-888-220-8520</a>.</p> 

        <h4 style="font-weight:bold;">When receiving orders:</h4>
        <p>Our Account Managers will verify the shipping address including suite and/or apartment numbers.
        This information is required to ensure the delivery process is seamless.
        Failure to provide accurate information may result in your package being rerouted or delayed.
        Rerouting charges are the responsibility of the customer.</p>

        <p>Note: <strong>ALL</strong> packages require a signature upon delivery. If for some reason a package is unable to be
        signed for and is returned, ALL additional shipping charges are the responsibility of the customer.</p>


        <h4 style="font-weight:bold;">Lost or Stolen Shipments:</h4>
        <p>Lost and/or stolen shipments can only be replaced at the expense of the customer. If the package
        is found by our shipping carrier, the customer’s account will be credited upon Global Grind’s
        receipt of the package.</p>

        <h4 style="font-weight:bold;">Returns/Exchanges - Human Hair Extensions:</h4>
        <ul>
          <li>Human hair products that have been chemically altered and/or modified <strong>CANNOT</strong> be returned. </li>
          <li>Human hair that has been installed or altered (washed, brushed, combed or cut) <strong>CANNOT</strong> be returned. </li>
          <li>All human hair products must be in a resalable condition, with original packaging intact. </li>
          <li>Return/exchanges must be made within 30 days of the date of the invoice. </li>
          <li>All returns/exchanges are subject to a 15% re-stocking fee. </li>
          <li>Please contact one of our friendly Account Managers at <a href="tel:1-888-220-8520">1-888-220-8520</a>, prior to returning ANY item. </li>
          <li>Returns/exchanges shipped without the approval of an Account Manager <strong>CANNOT</strong> be honored. </li>
          <li>Please note Global Grind LLC, is <strong>NOT</strong> responsible for <strong>ANY</strong> hair installation, hair removal or styling costs. </li>
          <li>Shipping costs on returned/exchanged items are the responsibility of the customer. </li>
          <li>We suggest using UPS or FedEx as a return carrier, in order to track the shipment, if necessary. </li>

        </ul>

      <h4 style="font-weight:bold;">Returns/Exchanges- Merchandise & Non-Human Hair Extensions:</h4>
      <ul>
        <li>Please inspect <strong>ALL</strong> merchandise upon receipt. </li>
        <li>All merchandise must be in a saleable condition, with original packaging intact. </li>
        <li>Return/exchanges must be made within 30 days of the date of the invoice. </li>
        <li>All returns/exchanges are subject to a 15% re-stocking fee. </li>
        <li>Items to be exchanged must be received before we can ship the replacement items. </li>
        <li>Please contact one of our friendly Account Managers at 1-888-220-8520, prior to returning any item. </li>
        <li>Returns/exchanges shipped without the approval of an Account Manager <strong>CANNOT</strong> be honored. </li>
        <li>Please note Global Grind LLC, is <strong>NOT</strong> responsible for <strong>ANY</strong> hair installation, hair removal or styling costs. </li>
        <li>Shipping costs on returned/exchanged items are the responsibility of the customer. </li>
        <li>We suggest using UPS or FedEx as a return carrier, in order to track the shipment, if necessary.</li>

      </ul>

      </div>




      </div>
       
    
        
            <a href="terms-conditions.php" data-role="footer" class="footer"><h6>Terms & Conditions</h6></a>
            <!-- not needed <a href="#"><h6 class="purple">Logout</h6></a>-->
        
    
    </div>
    
   </div>
    
  </body>
</html>
