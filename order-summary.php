<?php session_start(); 

// make sure user is logged in
if (!$_SESSION['emailadd']) {
    $loginError = "You are not logged in.";
    include("index.phdp");
    exit();
}


$_SESSION["remarks"] = $_POST["remarks"];
$remarks = $_SESSION["remarks"];
$emailfrmsession = $_SESSION['emailadd'];
$phonefrmsession = $_SESSION['phone'];
$firstnamefrmsession = $_SESSION['firstname'];
$lastnamefrmsession = $_SESSION['lastname'];
$texture = $_SESSION["texture"]; 
$itemcolor = $_SESSION["itemcolor"];
$hairlength = $_SESSION["hairlength"];
$city = $_SESSION["city"]; 
require_once("db/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) { 
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $codeShit = $_GET['code'];
      $productByCode = $db_handle->runQuery("SELECT code, item, hairtype, hairtexture, hairlength, price, itemcode, size, haircolourname FROM tblproducthair WHERE code='$codeShit'
                                             UNION
                                             SELECT code, item, Null, Null, Null, price, itemcode, Null, Null FROM tblproductoolkit WHERE code='$codeShit'");
      $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["item"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'hairtype'=>$productByCode[0]["hairtype"], 'hairtexture'=>$productByCode[0]["hairtexture"], 'hairlength'=>$productByCode[0]["hairlength"], 'haircolour'=>$productByCode[0]["haircolour"]));
      
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode[0]["code"] == $k)
                $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
          }
          // $_SESSION["cart_item"] = array();
          // array_push($_SESSION["cart_item"], $itemArray);
          // // dito ako maglalagay ng array push

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


$shippref = $_POST['shippingpreference'];
$optiontext = $_POST['shipoptiontext'];
$_SESSION['optiontext'] = $optiontext;
$_SESSION['sumshippref'] = $shippref;
$_SESSION['sumshipadd'] = $shipadd;





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
    <style type="text/css">
    body > .container{

      padding: 50px 15px 0 !important;
    }

    </style>

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
    <div class="row">
    <img src="img/step3.jpg" style="width:750px;">
    </div>


    <div  style="margin-top:20px;">
    <div class="col-xs-1" style="padding-left:0px;" >
    <img src="img/important.png">
    </div>

    <div class="col-xs-11">
    <p>Your order is almost complete. Please check
    summary before you confirm the order</p>
    </div>
    </div>

    <br/>

    <div class="row">
      <h3 style="padding-left:11px;">Order Summary <!-- - <span style="color:#803680;">Step 1 of 3</span> --></h3>
    </div>

    <div>
      <?php 
      $today = date("Ymd");
      $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
      $order_number = $today . $rand;
      // $order_number = rand(1, 9000);
      $_SESSION['order_number'] = $order_number;
      
       ?>
      <h3>Order Number:<span style="color:#823682;"><?php echo "#".$order_number; ?> </span></h3>
    </div>


    <div>
    <h3 style="color:#803680;">Customer Details</h3>
    </div>
    <div>
      <div class="col-xs-4" style="background-color:#EAE8E8;border:1px solid #ccc;margin-bottom:20px;">
      <p style="padding:5px;">Email Address:</p>
      <p style="padding:5px;">Phone Number:</p>
      <p style="padding:5px;">First Name:</p>
      <p style="padding:5px;">Last Name:</p>  
      <p style="padding:5px;">Shipping Address:</p>  
      <p style="padding:5px;">City:</p>  
      <p style="padding:5px;">State:</p>  
      <p style="padding:5px;">Zip Code:</p>  
      <p style="padding:5px;">Country:</p>
      <p style="padding:5px;">Shipping Preference:</p>

      </div>

      <div class="col-xs-8" style="border:1px solid #ccc;margin-bottom:20px;">
      <p style="padding:5px;"><?php echo $_SESSION['emailadd']; ?> </p>
      <p style="padding:5px;"><?php echo $_SESSION['phone']; ?> </p>
      <p style="padding:5px;"><?php echo $_SESSION['firstname']; ?> </p>
      <p style="padding:5px;"><?php echo $_SESSION['lastname']; ?> </p> 
      <p style="padding:5px;"><?php echo $_SESSION['address']; ?> </p> 
      <p style="padding:5px;"><?php echo $_SESSION['city']; ?> </p> 
      <p style="padding:5px;"><?php echo $_SESSION['state']; ?> </p> 
      <p style="padding:5px;"><?php echo $_SESSION['zipcode']; ?> </p> 
      <p style="padding:5px;"><?php echo $_SESSION['country']; ?> </p> 
      <p style="padding:5px;"><?php echo $optiontext ?> </p> 
      </div>


    </div>



    <div>
    

    <div id="shopping-cart" style="margin-top:0px;float:left;width:100%;">

    <?php
    if(isset($_SESSION["cart_item"])){
        $item_total = 0;
    ?> 
    <h3 style="color:#803680;padding-top:20px;">Your Order</h3>
    <table class="table" style="border:1px solid #EAE8E8;">
    <tbody>
    <thead>
    <tr>
    <th><strong>Name</strong></th>
    <th><strong>Code</strong></th>
    <th><strong>Quantity</strong></th>
    <th><strong>Price</strong></th>
    <th><strong>Action</strong></th>
    </tr>
  </thead>

        <?php   
        foreach ($_SESSION["cart_item"] as $item){
        ?>
         <form action="order-summary.php?action=add&code=<?php echo $item["code"]; ?>" method="post" name="shoppingcartform" id="shoppingcartform">
            <tr>
            <td><strong><?php echo $item["name"]; echo "<br/><br/><span style='color:purple;'>"; echo $item['hairtexture']; echo "<br/>"; echo $item['haircolour']; echo"<br/>"; echo $item['hairlength']; echo "</span>"; ?></strong></td>
            <td><?php echo $item["code"]; ?></td>
            <td align="center"><input type="number" name="quantity" min="1" max="100" value="<?php echo $item["quantity"]; ?>" size="1"    /></td>
            <?php $cart_total_price =  $item["quantity"] * $item["price"]; ?>
            <td align=right><?php echo "$".$cart_total_price; ?></td>
            <td><a href="order-summary.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a><br/>
              <button type="submit" class="btn btn-default" style="font-size:12px;height:30px;">UPDATE CART</button>
            </td>
            </tr>
            <?php
            $item_total += ($item["price"]*$item["quantity"]);
            $final_amount = ($_SESSION['sumshippref'] + $item_total);
            ?>
            </form>
        <?php
        }
        ?>

    <tr>
    <td colspan="5" align=right><strong style="font-size:14px;">Total:</strong> <span style="font-size:16px;"><?php echo "$".$item_total; ?></span></td>
    </tr>
    </tbody>
    </table>    
      <?php
    }
    ?>
    </div>
  

    <div id="remarks">
      <div class="form-group">
        <h3 style="color:#803680;padding-top:20px;">Your Remarks</h3>
        <textarea class="form-control" rows="5" id="remarks" name="remarks" readonly="readonly" ><?php echo $remarks; ?></textarea>
      </div>      


    </div>


      <div class="form-group right" style="margin-top:50px; ">
      <a href="shipping-details.php" class="btn btn-info btn-center" role="button">< GO BACK</a> 
      <a href="order-details.php" class="btn btn-default center-btn" role="button">CONTINUE SHOPPING</a>
      <a href="send-contact.php" class="btn btn-default center-btn" role="button">SUBMIT ORDER</a>
      </div>
    
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
    <div class="row" style="margin-top:30px;">
    <div class="panel panel-default">
  <div class="panel-heading">Total amount before shipping</div>
  <div class="panel-body">
    <p style="float:right;"><?php echo "USD $".$item_total; ?></p>
  </div>
  </div>

  <div class="panel panel-default">
  <div class="panel-heading">Shipping Option</div>
  <div class="panel-body">
    <p style="float:right;"><?php echo "USD $".$_SESSION['sumshippref']; ?></p>
  </div>
  </div>

  <div class="panel panel-default">
  <div class="panel-heading">Final Amount</div>
  <div class="panel-body">
    <p style="float:right;"><?php echo "USD $".$final_amount; ?></p>
  </div>
  </div>



    </div>
      
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
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
