<?php session_start(); ?>
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
    	<div class="logo"><a href="index.html"><img src="https://www.perfectressusorder.com/img/logo.png" width="313"></a></div>
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
                <h1 class="purple">FORGOT REGISTERED DETAILS</h1>
                <h4>Please allow up to 3 working days to process and verify your details.<br><br>Key in your first and last name and telephone number registered with us.<br><br>
    
                Only Perfectress certified professionals are able to order our products. Please contact us at <a href="tel:1-888-220-8520" class="purple">1-888-220-8520</a> or email us at <a href="mailto:orders@perfectress.us" class="purple">orders@perfectress.us</a> for any enquiries.<br><br></h4>
                
                <form action="send-forgot.php" method="post">
                	<label for="emailaddress"><h3>First Name <span class="red">*</span></h3></label>
                    <input type="text" class="form-control" id="inputfname" name="inputfname" placeholder="First Name">
					<!--<input type="text" name="emailaddress">--><br><br>
                    
                    <label for="lastname"><h3>Last Name <span class="red">*</span></h3></label>
                    <input type="text" class="form-control" id="inputlastname" name="inputlastname" placeholder="Last Name">
					<!--<input type="text" name="lastname">--><br><br>
                    
                    <label for="telnum"><h3>Telephone Number <span class="red">*</span></h3></label>
                    <input type="number" class="form-control" id="inputnumber" name="inputnumber" placeholder="1 (123) 123-1234">
					<!--<input type="text" name="telnum">--><br><br>
					<br>          
					<a href="index.php" class="btn btn-info btn-center white" role="button"><div class="greybtn"><h3>BACK</h3></div></a>
					<button type="submit" class="btn btn-default" name="forgot-submit"><div class="purplebtn"><h1>SUBMIT DETAILS</h1></div></button>
	  
				</form>
                <!--<a href="index.php"><div class="greybtn"><h3>BACK</h3></div></a>
                <a href="#"><div class="purplebtn"><h1>SUBMIT DETAILS</h1></div></a>-->
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




