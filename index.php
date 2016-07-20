<?php 
session_start(); 
if ($_SESSION['emailadd']) {
    $loginError = "You are currently logged in.";
    include("customer-details.php");
    exit();
}

$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
header('Location: http://perfectressusorder.com/mobile');

?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Perfectress Online Us Order</title>

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
          <a class="navbar-brand" href="#"><img src="img/logo.png"></a>
        </div>
         <div class="logo-right"><h3>Perfectress US Online Order</h3></div>
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
    <div class="col-xs-8">
      <div>
        <h3>Welcome to Perfectress Hair Extension & Additions Specialist Order Form.
        Upon submitting your order, you will receive a confirmation email to confirm your purchase.
        </h3>
        <br/>
        <p style="font-weight:bold;">Please enter your email address and last name to sign in</p>
        <br/>   
      </div>
    <form action="login.php" method="post">

      <div class="form-group">
        <label for="inputemail">Email Address&nbsp;<span class="red">*</span></label>
        <input type="email" class="form-control" name="inputemail" id="inputemail" placeholder="Email" required>
      </div>

      <div class="form-group">
        <label for="inputlastname">Last Name&nbsp;<span class="red">*</span> </label>
        <input type="text" class="form-control" name="inputlastname" id="inputlastname" placeholder="Last Name" required>
      </div>

      <div class="form-group right" style='margin-top:20px;'>
      <button type="submit" name="inputsubmit" class="btn btn-default">PROCEED TO ORDER</button>
      <a href="forgot.php" class="btn btn-info btn-center" role="button">FORGOT REGISTERED DETAILS</a>
      </div>

    </form>

    </div>



   <div class="col-xs-4 order-note">
   <p class="order-text">Only Perfectress certified professionals are able to order our products.<br/> Please contact us at <span class="purple-span">1-888-220-8520</span> or email us at <a href="mailto:orders@perfectress.us">orders@perfectress.us</a> for any enquiries.</p>
   </div>

    <div class="col-xs-4" style='padding-left:0px;margin-top:20px;' >
    <span style="font-size:12px; font-weight:bold; ">This system is best optimized for use on Google Chrome browser.<br/>
    Internet Explorer (IE 9 versions and above ), Safari, Mozilla Firefox maybe supported.<br/>
    Please upgrade your browser should you have browsing issues.</span>

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

        <!-- validation for safari  -->
    <script type="text/javascript">

    $("form").submit(function(e) {

      var ref = $(this).find("[required]");

      $(ref).each(function(){
          if(( $(this).val() == '' ) && ($(this).is(":not(:disabled)")))
          {
              alert("Required field should not be blank.");

              $(this).focus();

              e.preventDefault();
              return false;
          }
      });  return true;
    });

    </script>
    <!-- end of it validation for safari -->


    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
