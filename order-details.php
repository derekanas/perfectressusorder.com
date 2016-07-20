<?php 
ini_set('display_errors',0);
session_start();
include('global.php');



?>
<?php
$emailfrmsession = $_SESSION['emailadd'];
$phonefrmsession = $_SESSION['phone'];
$firstnamefrmsession = $_SESSION['firstname'];
$lastnamefrmsession = $_SESSION['lastname'];

// make sure user is logged in
if (!$_SESSION['emailadd']) {
    $loginError = "You are not logged in.";
    include("index.php");
    exit();
}













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




 ?>
 <!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- <meta name="viewport" content="width=device-width, initial-scale=0.3"> -->
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Perfectress US Online Order</title>

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
    <div class="col-xs-8" style="margin-bottom:20px;">
    <img src="img/step2.jpg" style="width:750px;margin-bottom:10px;">
        <h4>Please Select Product Category 
        </h4>

    <div class="row" style="margin-top:20px;">
    <div class="col-xs-12">
    <div class="panel-heading" style="background-color:#803680;color:#fff;font-size:20px; ">Perfectress Connections</div>
    </div>
    </div>

    <div class="row" style="margin-top:10px;">
    <div class="col-xs-4 col-xs-12 product-category">
    <div class="product-category-box">
    <a href="transformation-product.php">
    PERFECTRESS <br/> REMY CUTICLE HAIR
    </a> 
    </div>
   
    </div>
    <div class="col-xs-4 col-xs-12 product-category">
    <div class="product-category-box">
    <a href="virgin-transformation-connections-product.php">
    PERFECTRESS <br/> PURE VIRGIN HAIR
    </a>    
    </div>
    </div>
    <div class="col-xs-4 col-xs-12 product-category">
    <div class="product-category-box" style="width:230px;padding-top:25px;">
    <a href="p70-transformation-connections-product.php">
    PERFECTRESS<br/> REMY CUTICLE HAIR P70
    </a>
    </div>
    </div>
    </div>



    <div class="row" style="margin-top:30px;">
    <div class="col-xs-12">
    <div class="panel-heading" style="background-color:#803680;color:#fff;font-size:20px; ">Perfecress Tape Weft</div>
    </div>
    </div>

    <div class="row" style="margin-top:10px;">
    <div class="col-xs-4 col-xs-12 product-category">
    <div class="product-category-box">
    <a href="tape-weft-product.php">
    PERFECTRESS <br/>REMY CUTICLE HAIR
    </a>
    </div>    
    </div>
    <div class="col-xs-4 col-xs-12 product-category">
    <div class="product-category-box">
    <a href="virgin-tape-weft-product.php">
    PERFECTRESS <br/>PURE VIRGIN HAIR
    </a>
    </div>    
    </div>
    <div class="col-xs-4 col-xs-12 product-category">
    <div class="product-category-box" style="width:230px;padding-top:25px;">
    <a href="p70-tape-weft-product.php">
    PERFECTRESS<br/> REMY CUTICLE HAIR P70
    </a>
    </div>
    </div>
    </div>



    <div class="row" style="margin-top:30px;">
    <div class="col-xs-12">
    <div class="panel-heading" style="background-color:#803680;color:#fff;font-size:20px; ">Perfectress Multi Weft</div>
    </div>
    </div>

    <div class="row" style="margin-top:10px;">
    <div class="col-xs-4 col-xs-12 product-category">
    <div class="product-category-box">
    <a href="multi-weft-product.php">
    PERFECTRESS<br/> REMY CUTICLE HAIR
    </a>    
    </div>
    </div>
    <div class="col-xs-4 col-xs-12 product-category" >
    <div class="product-category-box">
    <a href="virgin-multi-weft-product.php">
    PERFECTRESS<br/> PURE VIRGIN HAIR
    </a>    
    </div>
    </div>
    <div class="col-xs-4 col-xs-12 product-category">
    <div class="product-category-box" style="width:230px;">
    <a href="#">
    &nbsp;
    </a>
    </div>
    </div>
    </div>





    <div class="row" style="margin-top:30px;">
    <div class="col-xs-12">
    <div class="panel-heading" style="background-color:#803680;color:#fff;font-size:20px; ">Perfectress Tools </div>
    </div>
    </div>

    <div class="row" style="margin-top:10px;">
    <div class="col-xs-4">
    <div class="product-category-box" style="padding-top:38px;">
    <a href="tools-product.php">
    TOOLS
    </a>    
    </div>
    </div>
    <div class="col-xs-4">
    <div class="product-category-box" style="padding-top:38px;">
    <a href="starter-kit-product.php">
    STARTER KIT
    </a>    
    </div>
    </div>
    <div class="col-xs-4">
    <div class="product-category-box" style="width:230px;" > 
    <a href="#">
    &nbsp;
    </a>
    </div>
    </div>
    </div>


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

    <div class="row">
    <div id="shopping-cart" style="margin-top:30px;">
    <div class="panel panel-default" style="margin-top:20px;">
    <div class="panel-heading item-cart-header">Items in Cart <!-- <a id="btnEmpty" href="transformation-product.php?action=empty">Empty Cart</a> --> </div>
    <?php
    if(isset($_SESSION["cart_item"])){
        $item_total = 0;
    ?>  
    <table class="table">
    <tbody>
    <tr>
    <th><strong>Name</strong></th>
    <th><strong>Code</strong></th>
    <th><strong>Qty</strong></th>
    <th><strong>Price</strong></th>
    <!-- <th><strong>Action</strong></th> -->
    </tr> 
    <?php   
        foreach ($_SESSION["cart_item"] as $item){
        ?>
            <tr>
            <td class="tablename"><strong><?php echo $item["hairtype"] ." ".$item["name"]; echo "<br/><br/><span style='color:purple;'>"; echo $item['hairtexture']; echo "<br/>"; echo $item['haircolour']; echo"<br/>"; echo $item['hairlength']; echo '"'; echo "</span>"; ?></strong></td>
            <td class="tablecode"><?php echo $item["code"]; ?></td>
            <td class="tablequantity"><?php echo $item["quantity"]; ?></td>
            <?php $cart_total_price =  $item["quantity"] * $item["price"]; ?>
            <td class="tableproductprice" align=right><?php echo "$".$cart_total_price; ?></td>
            <td><a href="order-details.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">X</a></td>
            </tr>
            <?php
            $item_total += ($item["price"]*$item["quantity"]);
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

    </div>

</div>




    <div class="row">

    <div class="form-group">
     <input type="button" class="btn btn-info btn-default btn-center btn-proceed" value="PROCEED TO ORDER" role="button" onclick="location.href='shipping-details.php'" style="background-color:#803680;width:100%;" <?php if(!isset($_SESSION["cart_item"])){ ?> disabled <?php   } ?> >

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
