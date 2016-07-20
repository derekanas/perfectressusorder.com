<?php session_start(); 
include('global.php');
$emailfrmsession = $_SESSION['emailadd'];
$phonefrmsession = $_SESSION['phone'];
$firstnamefrmsession = $_SESSION['firstname'];
$lastnamefrmsession = $_SESSION['lastname'];
$salonname = $_SESSION['salonname'];
$address = $_SESSION['address'];
$salonname = $_SESSION['salonname'];
$phone = $_SESSION['phone'];
$state = $_SESSION['state'];
$city = $_SESSION['city']; 
$zipcode = $_SESSION['zipcode'];
$country = $_SESSION['country'];

// make sure user is logged in
if (!$_SESSION['emailadd']) {
    $loginError = "You are not logged in.";
    include("index.php");
    exit();

}

if (isset($_POST['customerdetailssubmit'])){

if ($_POST['customerdetailssubmit'] == 'update') {
 
 $email = $_SESSION['emailadd'];
 $phone = $_POST['inputphone'];
 $firstname = $_SESSION['firstname'];
 $lastname = $_SESSION['lastname'];
 $address = $_POST['inputstreet'];
 $salonname = $_POST['inputsalonname'];
 $zipcode = $_POST['inputzipcode'];
 $city = $_POST['inputcity'];
 $state = $_POST['inputstate'];
 $country = $_POST['inputcountry'];

 
$_SESSION['existingcc'] = $_POST['existingcc'];
$_SESSION['inputcardholder'] = $_POST['inputcardholder']; 
$_SESSION['inputcc'] = $_POST['inputcc'];
$_SESSION['inputccdate'] = $_POST['inputccdate']. ' ' . $_POST['inputccdateyear'];
$_SESSION['inputcvc'] = $_POST['inputcvc'];

 $sql = "UPDATE ".$tbname."
 SET fname = '".$firstname."',
 lname = '".$lastname."',
  address = '".$address."',
   city = '".$city."',
    country = '".$country."',
     state = '".$state."',
      zipcode = '".$zipcode."',
       phone = '".$phone."',
        email = '".$email."',
        salonname = '".$salonname."' WHERE email='".$email."' AND lname='".$lastname."' ";
 $rst = mysql_query($sql, $connect) or die(mysql_error());

 if(!empty($rst)){

$message = "You have successfully updated your details by:";
echo "<script type='text/javascript'>alert('$message $email');</script>";
 }

 else {

$message = "Updating your details failed. Please try again";
echo "<script type='text/javascript'>alert('$message');</script>";

 }

} 

else if ($_POST['customerdetailssubmit'] == 'proceed') {

$_SESSION['phone'] = $_POST['inputphone'];
$_SESSION['address'] = $_POST['inputstreet'];
$_SESSION['state'] =  $_POST['inputstate'];
$_SESSION['zipcode'] = $_POST['inputzipcode'];
$_SESSION['city'] = $_POST['inputcity'];
$_SESSION['country'] = $_POST['inputcountry'];

$_SESSION['existingcc'] = $_POST['existingcc'];
$_SESSION['inputcardholder'] = $_POST['inputcardholder']; 
$_SESSION['inputcc'] = $_POST['inputcc'];
$_SESSION['inputccdate'] = $_POST['inputccdate'];
$_SESSION['inputcvc'] = $_POST['inputcvc'];
 
header("Location: https://www.perfectressusorder.com/mobile/order-details.php");
die();

}

}

?>
<!--JC-->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

  
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
        <img src="images/cart.png"><br><br>
        <img src="images/breadcrumbs1.jpg" class="img-autoscale">
        <h2 class="bold purple">Customer Details</h2>
        
        <form action="" method="post" rel="external" data-ajax="false" >
            <label for="email-add"><h3>Email Address</h3></label>
            <input type="text" name="inputemail" id="inputemail" class="grey-border-input" value="<?php echo $emailfrmsession; ?>">
            
            <label for="first-name"><h3>First Name</h3></label>
            <input type="text" name="inputfirstname" id="inputfirstname" class="grey-border-input" value="<?php echo $firstnamefrmsession; ?>">
        
        
          <div class="ui-grid-a">
              <div class="ui-block-a in-between-spacing">
                <label for="last-name"><h3>Last Name</h3></label>
                <input type="text" name="inputlastname" id="inputlastname" class="grey-border-input" value="<?php echo $lastnamefrmsession; ?>">
              </div>
              
              <div class="ui-block-b">
                <label for="tel"><h3>Phone No.</h3></label>
                <input type="tel" name="inputphone" id="inputphone" class="grey-border-input" value="<?php echo $phonefrmsession; ?>">
          	  </div>
          </div><!--end-grid-a-->
        
                <label for="salon-name"><h3>Salon Name</h3></label>
                <input type="text" name="inputsalonname" id="inputsalonname" class="grey-border-input" value="<?php echo $salonname ?>">
        
        	<h2 class="bold purple">Shipping Details</h2>
        
        	<label for="address"><h3>Address (Number, street, unit Number)</h3></label>
			<textarea cols="40" rows="4" name="inputstreet" id="inputstreet"> <?php echo $address; ?> </textarea>
        
        	<div class="ui-grid-a">
              <div class="ui-block-a in-between-spacing">
                <label for="zip-code"><h3>Zip Code</h3></label>
                <input type="text" name="inputzipcode" id="inputzipcode" class="grey-border-input" value="<?php echo $zipcode; ?>">
              </div>
              
              <div class="ui-block-b">
                <label for="city"><h3>City</h3></label>
                <input type="text" name="inputcity" id="inputcity" class="grey-border-input" value="<?php echo $city; ?>">
                </div>
             </div><!--end-grid-a-->
             
             <div class="ui-grid-a">
              <div class="ui-block-a in-between-spacing">
                <label for="state"><h3>State</h3></label>
                <input type="text" name="inputstate" id="inputstate" class="grey-border-input" value="<?php echo $state; ?>">
              </div>
              
              <div class="ui-block-b">
                <label for="country"><h3>Country</h3></label>
                <input type="text" name="inputcountry" id="inputcountry" class="grey-border-input" value="<?php echo $country; ?>">
                </div>
             </div><!--end-grid-a-->
             
             <h2 class="bold purple">Credit Card Details&nbsp;<img src="images/qnmark.png"></h2>
             
             <p class="purpleborder">Please ensure that your credit card that is registered with us is valid. If there is any change in credit card details, please contact us at <span class="purple">1-888-220-8520</span> or email at <span class="purple">orders@perfectress.us</span> to revalidate your credit card to successfully complete your order.</p>
             
             <label for="cc-details"><h3>Do you have your credit card details with us?</h3></label>
        	 <label for="cc-details"><input type="radio" name="creditcardinfo" onclick="document.getElementById('existingcc').disabled = false;document.getElementById('proceed').disabled = false;" id="radiocc1" name="creditcardinfo" value="radiocc1" data-role="none">&nbsp;<span class="purple">YES,</span> please enter the last 4 digits of your credit card number.</label>
		      
             
                <label for="cc-details"><h3>XXXX - XXXX - XXXX -</h3></label>
              
			<input type="number" name="existingcc" id="existingcc" value="" class="grey-text-input" >
            
        	 <label for="cc-details"><input type="radio" onclick="document.getElementById('othercc').disabled = false;document.getElementById('proceed').disabled = false;"  id="radiocc2" name="creditcardinfo" value="radiocc2" data-role="none">&nbsp;<span class="purple">No, I want to use another Credit Card</span><br>(please fill in your credit card details below)</label>
             

			 <label for="cardholder-name"><h3>Cardholder Name</h3></label>
			 <input type="text" name="cardholdername" id="cardholdername" value="" class="grey-text-input">
             
             <label for="cc-number"><h3>Credit Card Number</h3></label>
			 <input type="text" name="cardnumber" id="cardnumber" value="" class="grey-text-input">
             
             <label for="exp-date"><h3>Expiration Date</h3></label>
			 <input type="month" name="inputccdate" id="expdate" value="">
             
             <div class="ui-grid-a">
              <div class="ui-block-a">
                <label for="number-pattern"><h3>CVC&nbsp;<img src="images/qnmark.png"></h3></label>
				<input type="number" name="inputcvc" pattern="[0-9]*" id="inputcvc" value="">
              </div>
             </div><!--end-grid-a-->





        	 <!--<label for="cc-details"><input type="radio" name="radio-choice-0" id="radio-choice-3" value="choice-3" data-role="none"><span class="purple">&nbsp;No, I just want to save my details</span></label>
			-->
        <p>Please update my details.<br>To save your details please click "<span class="purple">Save Details</span>" before proceeding to order. Note that new credit card details will not be stored automatically.</p>	
			
			<button type="submit" name="customerdetailssubmit" class="ui-btn ui-corner-all btn-grey" role="button" value="update" >SAVE DETAILS</a>
			<button type="submit" name="customerdetailssubmit" class="ui-btn ui-corner-all btn-purple" id="proceed" value="proceed" disabled>PROCEED</button>
			
		
		</form>
        
        
        <!--
        <a href="#" class="ui-btn ui-corner-all btn-grey">SAVE DETAILS</a>
        <a href="product-category.html" rel="external" class="ui-btn ui-corner-all btn-purple">PROCEED</a>
        -->
      </div><!--end-main-->
    
      <a href="terms-conditions.php" data-role="footer" class="footer" rel="external" data-ajax="false"><h6>Terms & Conditions</h6></a>
      <a href="logout.php" data-role="footer" class="footer"><h6>Logout</h6></a><!--end-footer-->
      
    </div><!--end-page-->

</div><!--end-container-->
</body>

  <!-- Include the jQuery library -->
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <!-- Include the jQuery Mobile library -->
  <script src="js/jquery.mobile-1.4.5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="js/index.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {



    $("#radiocc1").click(function() {
      $("#othercc").prop("disabled", true);
    $("#existingcc").prop("disabled", false);
    


    });

    $("#radiocc2").click(function() {

      $("#othercc").prop("disabled", false);
      $("#existingcc").prop("disabled", true);


    });

    });

    </script>


</html>
