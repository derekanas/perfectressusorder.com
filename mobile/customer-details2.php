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
<meta charset="UTF-8">
<title>Perfectress US Order Form</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width,maximum-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<header>
	<div class="container">
    	<div class="logo"><a href="index.php"><img src="https://www.perfectressusorder.com/img/logo.png" width="313"></a></div>
    </div>
    
	<div class="container">
            <nav id='cssmenu'>
                <div id="head-mobile"></div>
                <div class="button"></div>
                <ul>
                    <li class='active'><a href='#'>SELECT PRODUCT</a></li>
                    
                    <li><a href='#'>CHART</a>
                      <ul>
                        <li><a href='https://www.perfectressusorder.com/pdf/perfectress-us-availability-chart-hair.pdf' target="_blank">HAIR PRODUCT AVAILABITY CHART</a></li>
                        <li><a href='https://www.perfectressusorder.com/pdf/perfectress-us-availability-chart-tools.pdf' target="_blank">TOOLS PRODUCT AVAILABITY CHART</a></li>
                       </ul>
                    </li>
                </ul>
            </nav>
        </header>
   
     
        <section>
            <div class="col-full">
                <img src="images/cart.png"><br><br>
                <img src="images/breadcrumbs1.jpg"><br><br>
    
                <h1 class="purple">Customer Details</h1>
                
                <form action="" method="post">
                	<label for="emailaddress"><h3>Email Address</h3></label>
                    <input type="text-grey" class="form-control" id="inputemail" name="inputemail" value="<?php echo $emailfrmsession; ?>" disabled >
					<!--<input type="text-grey" name="emailaddress">--><br><br>
                    
					<label for="firstname"><h3>First Name</h3></label>
                    <input type="text-grey" class="form-control" id="inputfirstname" name="inputfirstname" value="<?php echo $firstnamefrmsession; ?>" disabled >
					<!--<input type="text-grey" name="firstname">--><br><br>
                    
                    <div class="col-1">
                    	<label for="lastname"><h3>Last Name</h3></label>
                    	<input type="text-grey2" class="form-control" id="inputlastname" name="inputlastname" value="<?php echo $lastnamefrmsession; ?>" disabled >
						<!--<input type="text-grey2" name="lastname">--><br><br>
					</div>
                    
                    <div class="col-2">
                    	<label for="number"><h3>Phone Number</h3></label>
                    	<input type="number" class="form-control" id="inputphone" name="inputphone" value="<?php echo $phonefrmsession; ?>">
						<!--<input type="number" name="number">--><br><br>
					</div>
                    
                    <label for="saloname"><h3>Salon Name</h3></label>
                    <input type="text-grey" class="form-control" id="inputsalonname" name="inputsalonname" value="<?php echo $salonname ?>">
					<!--<input type="text-grey" name="saloname">--><br><br><br>
				
                
                <h1 class="purple">Shipping Details</h1>
                
                
                	<label for="add"><h3>Address (Number, street, unit Number)</h3></label>
                    <input type="text-grey" class="form-control" id="inputstreet" name="inputstreet" value="<?php echo $address; ?>">
					<!--<input type="text-grey" name="add">--><br><br>
                    
                    <div class="col-1">
                    	<label for="number"><h3>Zip Code</h3></label>
                    	<input type="number2" class="form-control" id="inputzipcode" name="inputzipcode" value="<?php echo $zipcode; ?>" >
						<!--<input type="number2" name="number">--><br><br>
                    </div>
                    
                    <div class="col-2">
                    	<label for="city"><h3>City</h3></label>
                    	<input type="text-grey3" class="form-control" id="inputcity" name="inputcity" value="<?php echo $city; ?>" >
						<!--<input type="text-grey3" name="city">--><br><br>
                    </div>
                    
                    <div class="col-1">
                    	<label for="state"><h3>State</h3></label>
                    	<input type="text-grey2" class="form-control" id="inputstate" name="inputstate" value="<?php echo $state; ?>" >
						<!--<input type="text-grey2" name="state">--><br><br>
                    </div>
                    
                    <div class="col-2">
                    	<label for="country"><h3>Country</h3></label>
                    	<input type="text-grey3" class="form-control" id="inputcountry" name="inputcountry" value="<?php echo $country; ?>" >
						<!--<input type="text-grey3" name="country">--><br><br><br>
                    </div>
                    
                
                
                <h1 class="purple">Credit Card Details&nbsp;&nbsp;<img src="images/qnmark.png"></h1>
                
                <p class="pborder">Please ensure that your credit card that is registered with us is valid. If there are any change in your credit card details, please contact us at <a href="tel:1-888-220-8520" class="purple">1-888-220-8520</a> or email at <a href="mailto:orders@perfectress.us" class="purple">orders@perfectress.us</a> to revalidate your credit card to successfully complete your order.</p><br>
                
                <h3>Do you have your credit card details with us?</h3>
                
                
                	<input type="radio" onclick="document.getElementById('existingcc').disabled = false;document.getElementById('proceed').disabled = false;" id="radiocc1" name="creditcardinfo" value="radiocc1" >
					<!--<input type="radio" name="ccdetails" value="yes">-->&nbsp;&nbsp;<span class="purple">YES</span>, please enter the last 4 digits of your credit card number.<br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;XXXX - XXXX - XXXX - <input type="ccnum" class="form-control" id="existingcc" name="existingcc" id="existingcc" />
					<!--<input type="ccnum" name="ccnum">--><br><br><br>
                    
                    <input type="radio" onclick="document.getElementById('othercc').disabled = false;document.getElementById('proceed').disabled = false;"  id="radiocc2" name="creditcardinfo" value="radiocc2" >
					<!--<input type="radio" name="ccdetails" value="no">-->&nbsp;&nbsp;<span class="purple">No, I want to use another Credit Card</span><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(please fill in your credit card details below)<br><br>
                    <label for="cardholdername"><h3>Cardholder Name</h3></label>
                    <input type="text" class="form-control" id="cardholdername" name="inputcardholer" >
					<!--<input type="text" name="cardholdername">--><br><br>
                    
                    <label for="ccno"><h3>Credit Card Number</h3></label>
                    <input type="text" class="form-control" id="cardnumber" name="inputcc" placeholder="XXXX - XXXX - XXXX - XXXX"  >
					<!--<input type="text" name="ccno">--><br><br>
                    
                    <div class="col-1">
                    	<!--<label for="month">-->
						<label for="inputccdate"><h3>Expiration Date</h3></label>
                    	<select  class="dropdown-left" id="expdate" name="inputccdate">
                            <option value="month">Month</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
  						</select><br><br>
                    </div>
                    
                    <div class="col-2">
                    	<label for="year"><h3>&nbsp;</h3></label>
                    	<select class="dropdown-right" id="expdateyear" name="inputccdateyear">
                            <option value="year">Year</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            
  						</select><br><br>
                    </div>
					<h3>Please update my details.</h3>
					<p>To save your details, please click "<span class="purple">Save Details</span>" before proceeding to order</p>
                
					<br>
					<button type="submit" name="customerdetailssubmit" class="btn btn-info btn-center" role="button" value="update" style="margin-right:5px;">SAVE DETAILS</a>
					<button type="submit" name="customerdetailssubmit" class="btn btn-default" id="proceed" value="proceed" disabled>PROCEED</button>
				</form>
                           
                <!--<a href="#"><div class="greybtn"><h3>SAVE DETAILS</h3></div></a>
                <a href="product-category.html"><div class="purplebtn"><h1>PROCEED</h1></div></a>-->
            </div>
        </section>
    
        <footer>
            <a href="terms-conditions.php"><h6 class="purple">Terms & Conditions</h6></a>
            <a href="logout.php"><h6 class="purple">Logout</h6></a>
        </footer>
    
    </div>
    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="js/index.js"></script>
    
  </body>
</html>
