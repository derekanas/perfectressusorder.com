<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="css/non-responsive.css" rel="stylesheet">
    <link href="css/non-responsive.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=0.3">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sticky Footer Navbar Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="css/non-responsive.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php"><img src="img/logo.png"></a>
        </div>
         <div class="logo-right"><h3>Perfectress US Online Order</h3></div>
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
    <div class="col-xs-8">
      <div class="welcome-text" style="padding:0px;">
        <h3 class="text-bold">FORGOT REGISTERED DETAILS</h3><br/>
        <p class="text-bold">Please allow up to 3 working days to process and verify your details.</p><br/>
        <p class="text-bold">Key in your first and last name and telephone number registered with us.</p>
      </div>
    <form action="send-forgot.php" method="post">

      <div class="form-group">
        <label for="inputfname">First Name&nbsp;<span class="red">*</span></label>
        <input type="text" class="form-control" id="inputfname" name="inputfname" placeholder="First Name">
      </div>

      <div class="form-group">
        <label for="inputlastname">Last Name&nbsp;<span class="red">*</span></label>
        <input type="text" class="form-control" id="inputlastname" name="inputlastname" placeholder="Last Name">
      </div>

      <div class="form-group">
        <label for="inputnumber">Telephone Number&nbsp;<span class="red">*</span></label>
        <input type="number" class="form-control" id="inputnumber" name="inputnumber" placeholder="1 (123) 123-1234">
      </div>

      <div class="form-group right">
            <a href="index.php" class="btn btn-info btn-center white" role="button">BACK</a>
      <button type="submit" class="btn btn-default" name="forgot-submit">SUBMIT DETAILS</button>

      </div>
    </form>

    </div>




    <div class="col-xs-4 order-note">
    <p class="order-text">Only Perfectress certified professionals are able to order our products.<br/> Please contact us at <span class="purple-span">1-888-220-8520</span> or email us at <a href="mailto:orders@perfectress.us">orders@perfectress.us</a> for any enquiries.</p>
    </div>
      
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted"><a href="terms-conditions.php" style="color:#fff;">Terms & Conditions</a> <span style="padding-left:30px;">Copyright 2016 Global Grind LLC. All Rights Reserved.</span></p>

      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>












