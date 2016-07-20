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
$remarks = $_SESSION['remarks'];
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
    <div id="main-content" class="container">
    <div class="col-xs-8">
    <div>
    <img src="img/step4.jpg" style="width:750px; ">
    </div>


    <div style="margin-top:20px;">

    <h4>Thank you for your order. Your order has been received and is now being processed. Your order details are shown below for your reference : </h4>
    </div>


    <div>
      <?php 

      $order_number = rand(1, 9000);
      $_SESSION['order_number'] = $order_number;

       ?>
      <h3>Order Number:<span style="color:#823682;"><?php echo "#".$order_number; ?> </span></h3>
    </div>



    <div style="background-color:#E5D7E5">
    <h3>Customer Details</h3>
    </div>

    <div style="background-color:#E5D7E5">
      <div class="col-xs-4" style="border:1px solid #EAE8E8;">
      <p style="padding:5px;">Email Address:</p>
      <p style="padding:5px;">Phone Number:</p>
      <p style="padding:5px;">First Name:</p>
      <p style="padding:5px;">Last Name:</p>  

      </div>

      <div class="col-xs-8" style="border:1px solid #EAE8E8;">
      <p style="padding:5px;"><?php echo $cnfrmemail ?> </p>
      <p style="padding:5px;"><?php echo $cnfrmphone ?> </p>
      <p style="padding:5px;"><?php echo $cnfrmfname ?> </p>
      <p style="padding:5px;"><?php echo $cnfrmlname ?> </p> 
      </div>


    </div>


    <div>
    

    <div id="shopping-cart" style="margin-top:30px;float:left;width:100%;">
    <?php
    if(isset($_SESSION["cart_item"])){
        $item_total = 0;
    ?>  
    <table class="table"  style="border:1px solid #EAE8E8;background-color:#e5d7e5">
    <tbody>
    <thead>
    <tr>
    <th><strong>Name</strong></th>
    <th><strong>Code</strong></th>
    <th><strong>Quantity</strong></th>
    <th><strong>Price</strong></th>
    </tr>
  </thead>
    <?php   
        foreach ($_SESSION["cart_item"] as $item){
        ?>  
        <form action="order-summary.php?action=add&code=<?php echo $item["code"]; ?>" method="post" name="shoppingcartform" id="shoppingcartform">
            <tr>
            <td><strong><?php echo $item["name"]; echo "<br/><br/><span style='color:purple;'>"; echo $item['hairtexture']; echo "<br/>"; echo $item['haircolour']; echo"<br/>"; echo $item['hairlength']; echo "</span>"; ?></strong></td>
            <td><?php echo $item["code"]; ?></td>
            <td align="center"><?php echo $item["quantity"]; ?></td>
            <?php $cart_total_price =  $item["quantity"] * $item["price"]; ?>
            <td align=right><?php echo "$".$cart_total_price; ?></td>
            
            </tr>
            <?php
            $item_total += ($item["price"]*$item["quantity"]);
            $final_amount = ($_SESSION['sumshippref'] + $item_total);
        }
        ?>

    <tr>
    <td colspan="5" align=right><strong style="font-size:14px;">Total:</strong> <span style="font-size:16px;"><?php echo "$".$item_total; ?></span></td>
    </tr>
    </tbody>
    </table>    
      <?php
    }

    else{
      echo "no items in your cart.";
    }
    ?>
    </div>

    <div class="row">

    <div class="col-xs-6">
    <h3>Shipping Address</h3>
    <div style="border:1px solid #EAE8E8;background-color:#E5D7E5;">
    <p style="padding:20px;"><?php echo $cnfrmshipadd ;?></p>
    </div>
    </div>


    <div class="col-xs-6"> 
    <h3>Shipping Preferences</h3>
    <div style="border:1px solid #EAE8E8;background-color:#E5D7E5">
    <p style="padding:20px;"><?php echo $optiontext ;?></p>
    </div>
    </div>


    </div>


    <div style="margin-top:20px;">
      <div class="col-xs-12" style="padding:20px;border:1px solid #EAE8E8;background-color:#E5D7E5;">
        <div class="row">
         <div class="col-xs-3">
         <p>Total Amout Before Shipping:</p>
         </div>

         <div class="col-xs-2 col-xs-offset-7">
          <p><?php echo $item_total; ?></p>
         </div> 
        </div>
        <div class="row">
         <div class="col-xs-3">
         <p>Shipping Option:</p>
         </div>

         <div class="col-xs-2 col-xs-offset-7">
          <p><?php echo $cnfrmshippref; ?></p>
         </div> 
        </div>
        <div class="row"> 
         <div class="col-xs-3">
         <p>Final Amount:</p>
         </div>

         <div class="col-xs-2 col-xs-offset-7">
          <p><?php echo $final_amount; ?></p>
         </div> 
        </div>
      </div>
    </div>


      <div id="remarks">
      <div class="form-group">
        <h3 style="color:#803680;padding-top:20px;">Your Remarks</h3>
        <textarea class="form-control" rows="5" id="remarks" name="remarks" readonly="readonly" style="background-color:#E5D7E5;" ><?php echo $remarks; ?></textarea>
      </div>
      </div>      


      <div class="form-group right" style="margin-top:50px; ">
      <input type="button"class="btn btn-default" value="PRINT CONFIRMATION" onclick="javascript:printDiv('main-content')">
      </div>
    </form>
  </div><!-- end of div row for form -->

    </div>



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
        <p class="text-muted"><a href="terms-conditions.php" style="color:#fff;">Terms & Conditions</a> <span style="padding-left:30px;">Copyright 2016 Global Grind LLC. All Rights Reserved.</span></p>

      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
    $(":radio").click(function(){
   var radioName = $(this).attr("creditcardinfo"); //Get radio name
   $(":radio[name='"+radioName+"']").attr("disabled", true); //Disable all with the same name
    });

    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- print -->
   <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
    </script>
    <!-- end of print function -->

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php session_destroy(); ?>
