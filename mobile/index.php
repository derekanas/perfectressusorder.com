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
        
        <p class="bold purple">Perfectress US Online Order</p>
        
        <p>Welcome to Perfectress Hair Extension & Additions Specialist online order form. Upon submitting your order, you will receive a confirmation email from us to confirm your purchase.<br><br>Please type your email address and last name to verify your registration details.</p>
        
        <p>Only Perfectress certified professionals are able to order our products. Please contact us at <a href="tel:1-888-220-8520" class="purple">1-888-220-8520</a> or email us at <a href="mailto:orders@perfectress.us" class="purple">orders@perfectress.us</a> for any enquiries.</p>
        
        <br>
               
			<form action="login.php" method="post" rel="external" data-ajax="false" >
					
			<label for="email-add"><h3>Email Address <span class="red">*</span></h3></label>
			<input type="text" class="grey-text-input" name="inputemail" id="inputemail" placeholder="Email" required>
				

				  
			<label for="last-name"><h3>Last Name <span class="red">*</span></h3></label>
			<input type="text" class="grey-text-input" name="inputlastname" id="inputlastname" placeholder="Last Name" required>
				

				 
			<button type="submit" name="inputsubmit" class="ui-btn ui-corner-all btn-purple" data-ajax="false" rel="external">PROCEED TO ORDER</button>
			<a href="forgot.php" class="ui-btn ui-corner-all btn-grey" role="button">FORGOT REGISTERED DETAILS</a>
				
                    <!--<label for="emailaddress"><h3>Email Address <span class="red">*</span></h3></label>
                    <input type="text" name="emailaddress"><br><br>
                    <label for="lastname"><h3>Last Name <span class="red">*</span></h3></label>
                    <input type="text" name="lastname"> -->
            </form>
				
				
            <br>
                <!--<a href="customer-details.html"><div class="purplebtn"><h1>PROCEED TO ORDER</h1></div></a>
                <a href="forgot-details.html"><div class="greybtn"><h3>FORGOT REGISTERED DETAILS</h3></div></a>-->
            </div>
       
    
        
            <a href="terms-conditions.php" data-role="footer" class="footer" rel="external" data-ajax="false"><h6>Terms & Conditions</h6></a>
            <!-- not needed <a href="#"><h6 class="purple">Logout</h6></a>-->
        
    
    </div>
    
   </div>
    
  </body>
</html>
