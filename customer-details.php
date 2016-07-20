<?php session_start(); 
include('global.php');

$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
header('Location: http://perfectressusorder.com/mobile');


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
$_SESSION['inputccdate'] = $_POST['inputccdate'];
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
 
header("Location: https://www.perfectressusorder.com/order-details.php");
die();

}


}



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
          <a class="navbar-brand" href="index.php"><img src="img/logo.png"></a>
        </div>
         <div class="logo-right"><h3>Perfectress US Online Order</h3></div>
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
    <div class="col-xs-8">
    <img src="img/step1.jpg" style="width:750px;margin-bottom:20px;">
    <form action="" method="post">


        <div class="col-xs-12">
        <h4>Customer Details</h4>
        </div>


        <div class="col-xs-6">
        <label for="inputemail">Email Address</label>
        <input type="email" class="form-control" id="inputemail" name="inputemail" value="<?php echo $emailfrmsession; ?>" disabled >
        </div>
        <div class="col-xs-6">
        <label for="inputphone">Phone Number</label>
        <input type="text" class="form-control" id="inputphone" name="inputphone" value="<?php echo $phonefrmsession; ?>">
        </div>


        <div class="col-xs-6" style="padding-top:20px;">
        <label for="inputemail">First Name</label>
        <input type="email" class="form-control" id="inputfirstname" name="inputfirstname" value="<?php echo $firstnamefrmsession; ?>" disabled >
        </div>
        <div class="col-xs-6" style="padding-top:20px;">
        <label for="inputlastname">Last Name</label>
        <input type="text" class="form-control" id="inputlastname" name="inputlastname" value="<?php echo $lastnamefrmsession; ?>" disabled >
        </div>



        <div class="col-xs-12" style="padding-top:20px;">
        <label for="inputsalonname">Salon Name</label>
        <input type="text" class="form-control" id="inputsalonname" name="inputsalonname" value="<?php echo $salonname ?>">

        </div>

        <div class="col-xs-12" style="margin-top:20px;">
        <h4>Shipping Details</h4>
        </div>
        <div class="col-xs-12">
        <label for="inputstreet">Address (Number, street, unit Number)</label>
        <input type="text" class="form-control" id="inputstreet" name="inputstreet" value="<?php echo $address; ?>">
        </div>




        <div class="col-xs-6" style="padding-top:20px;">
        <label for="inputzipcode">Zip Code</label>
        <input type="text" class="form-control" id="inputzipcode" name="inputzipcode" value="<?php echo $zipcode; ?>" >
        </div>
        <div class="col-xs-6" style="padding-top:20px;">
        <label for="inputcity">City</label>
        <input type="text" class="form-control" id="inputcity" name="inputcity" value="<?php echo $city; ?>" >
        </div>



        <div class="col-xs-6" style="padding-top:20px;">
        <label for="inputstate">State</label>
        <input type="text" class="form-control" id="inputstate" name="inputstate" value="<?php echo $state; ?>" >
        </div>

        <div class="col-xs-6" style="padding-top:20px;">
        <label for="inputcountry">Country</label>
        <input type="text" class="form-control" id="inputcountry" name="inputcountry" value="<?php echo $country; ?>" >
        </div>



      <div class="col-xs-12">
      <h4 style="margin-top:40px;">Credit Card Details</h4>
      <div style="border:2px solid #823682">
      <p style="padding:10px; ">Please ensure that your credit card that is registered with us is valid. 
        If there are changes in your credit card details, please contact us at 1-888-220-8520 or email at orders@perfectress.
        us to revalidate your credit card to successfully complete your order.</p>

      </div>

      </div>



      <div class="col-xs-12" style="margin-top:30px;">     
      <h4>Do you have your credit card details with us?</h4>
      <div class="radio">
        <label><input type="radio" onclick="document.getElementById('existingcc').disabled = false;document.getElementById('proceed').disabled = false;" id="radiocc1" name="creditcardinfo" value="radiocc1" ><span style="color:#833682" >YES</span>, please enter the last 4 digits of your credit card number</label>
        <div class="row" style="margin-top:20px;">
        <div class="col-xs-3 col-xs-offset-1">
        <p>XXXX - XXXX - XXXX - </p>
        </div>
        <div class="col-xs-2" style="padding-left:0px;">
        <input type="text" class="form-control" id="existingcc" name="existingcc" id="existingcc" disabled style="position:relative;top:-8px;left:-8px;" required />
        </div>
        </div>
      </div>

      <div class="radio">
        <label><input type="radio" onclick="document.getElementById('othercc').disabled = false;document.getElementById('proceed').disabled = false;"  id="radiocc2" name="creditcardinfo" value="radiocc2" ><span style="color:#833682" >No, I want to use another Credit Card</span><br/>(please fill in your credit card details below)</label>
        </div>        



      <fieldset id="othercc" disabled>
      <div class="form-group">
        <div class="col-xs-6">
        <label for="inputcardholder">Cardholder Name</label>
        <input type="text" class="form-control" id="cardholdername" name="inputcardholder" >
        </div>
        <div class="col-xs-6">
        <label for="inputcc">Credit Card Number</label>
        <input type="text" class="form-control" id="cardnumber" name="inputcc" placeholder="XXXX - XXXX - XXXX - XXXX"  >
        </div>
      </div>



      <div class="form-group">
      <div class="col-xs-6" style="margin-top:20px;">
      <label for="inputccdate">Expiration Date</label>
      <input type="month" class="form-control" id="expdate" name="inputccdate" >
      </div>

      <div class="col-xs-6" style="margin-top:20px;">
      <label for="inputcvc">CVC</label> 
      <input type="number" class="form-control" id="cvc" name="inputcvc" placeholder="123" style="width:25%;" >
      </div>

      </div>
      </fieldset>



      <div style="margin-top:50px;"> 
        <h4>Please update my details.</h4>
      <div class="col-xs-12">
      <p style="font-weight:bold;">To save your details please click "<span style="color:#833682;">Save Details</span>" before proceeding to order.</p>
      <p>Note that <strong>new</strong> credit card details will not be stored automatically.</p>


      </div>
      </div>  



      <div class="form-group text-right" style="margin-top:60px; ">
      <button type="submit" name="customerdetailssubmit" class="btn btn-info btn-center" role="button" value="update" style="margin-right:5px;">SAVE DETAILS</a>
      <button type="submit" name="customerdetailssubmit" class="btn btn-default" id="proceed" value="proceed" disabled>PROCEED</button>
      </div>
    
    </div><!-- end of col-xs-12 -->


    </form>

    </div> <!-- end of col-xs-8 -->



    <div class="col-xs-4 welcome-note">

    <div class="row" style="margin-top:20px;">
    <div class="col-xs-6">
    Welcome <?php echo $firstnamefrmsession ?>
    </div>

    <div class="col-xs-5 col-xs-offset-1">
     <a href="logout.php"><img src="img/logout-btn.png"></a>
    </div>  
    </div>



    <p class="welcome-text">
    Should you need any assistance, feel free to contact us at 1-888-220-8520 or email us at orders@perfectress.us
    </p>
    </div>
      
    </div>

    <footer class="footer">
      <div class="container">
             <div class="container">
        <p class="text-muted"><a href="terms-conditions.php" style="color:#fff;">Terms & Conditions</a> <span style="padding-left:30px;">Copyright 2016 Global Grind LLC. All Rights Reserved.</span></p>
      </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->



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



    <script type="text/javascript">
      // $(document).ready(function() {
      //     $('input:radio[name=creditcardinfo]').click(function() {
      //         var checkval = $(this).val();
      //         $('#proceed').prop('disabled', !(checkval == 'radiocc1' || checkval == 'radiocc2'));
      //     });
      // }); 

      // </script>
  </body>
</html>
