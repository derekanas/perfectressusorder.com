<?php session_start();?>
<!DOCTYPE html>
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


//setting of the catergories


if (isset($_POST['addtocart'])){


if(isset($_POST['starter-kit'])){

$itemtool = $_POST['starter-kit'];
$escitemtool = mysql_escape_string($itemtool); 
$_SESSION['itemtool'] = $escitemtool;
}//end of the spost radio




//end of the setting of categories


require_once("db/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) { 
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productByCode = $db_handle->runQuery('SELECT * FROM tblproductoolkit WHERE itemcode="'.$_GET["code"].'" AND item="'.$itemtool.'" ');
      $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["item"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
      
      if((!empty($_SESSION["cart_item"])) && (!empty($productByCode))) {
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
      } 
      else if(!empty($productByCode)) {
        $_SESSION["cart_item"] = $itemArray;
      }

      else{
       $message = "Not available in this option please try again";
      echo "<script type='text/javascript'>alert('$message');</script>";
      }

 




    } //end of if spost quantity 
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
    unset($_SESSION["cart_item"])
;  break;  
} 
}

}//end of the spost addtocart
 ?>
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
    <!--  page content -->
    <div class="container">
    <div class="col-xs-8">
    <img src="img/step2.jpg" style="margin-bottom:20px;width:750px;">
    <div class="panel panel-default">
      <div class="panel-heading">Tools</div>
      <div class="panel-body">
        <form method="post" id="addtocartform" action="starter-kit-product.php?action=add&code=<?php echo "KIT" ?>">



        <div class="row">
          <div class="col-xs-3">
          <input type="radio" class="radio_item" value="Perfectress Deluxe Kit - 2 Systems Combined" onClick="CB(this.value);" name="starter-kit" id="starter1" required    <script src="/js/jquery.validate.js"></script>
          <label class="label_item" for="starter1"> <img src="img/starterkits/starter1.png"></label>
          </div>

          <div class="col-xs-9">
          <p>PERFECTRESS DELUXE KIT - 2 Systems Combined <br/><span style="color:#803680;">USD$499</span></p>

          <p>Contents: <br/>Adaptability Ring, Transformer C, Reformer, Connector L, Connector L Loops, Tape Pressing Tool, Tape Removal Tool, Removing Mats,
            Precut Adhesive Tapes, Prefab Tapes, Velcro Strips, Tools Belt, Flat Bristle Brush, Video, Tri-folds, Deluxe Aluminium Case
          </p>

          </div>

        </div>




        <div class="row">
          <div class="col-xs-3">
          <input type="radio" class="radio_item" value="Perfectress Tape Weft Starter Kit" onClick="CB(this.value);" name="starter-kit" id="starter2">
          <label class="label_item" for="starter2"> <img src="img/starterkits/starter2.png"></label>
          </div>

          <div class="col-xs-9">
          <p>PERFECTRESS TAPE WEFT STARTER KIT <br/><span style="color:#803680;">USD$195</span></p>

          <p>Contents: <br/>Adaptability Ring, Tape Pressing Tool, Tape Removing Tool,
          Precut Adhesive Tapes, Prefab Tapes, Removing Mats, Velcro Strips, Video, Trifolds, Aluminium Case.

          </p>

          </div>

        </div>



        <div class="row">
          <div class="col-xs-3">
          <input type="radio" class="radio_item" value="Perfectress Connections Starter Kit" onClick="CB(this.value);" name="starter-kit" id="starter3">
          <label class="label_item" for="starter3"> <img src="img/starterkits/starter3.png"></label>
          </div>

          <div class="col-xs-9">
          <p>PERFECTRESS CONNECTIONS STARTER KIT <br/><span style="color:#803680;">USD$299</span></p>

          <p>Contents: <br/>Adaptability Ring, Transformer C, Reformer, Connector L, Connector L Loops, Velcro Strips, Video,
            Tri-folds, Aluminium Case.
          </p>

          </div>

        </div>

<!-- 

        <div class="row">
          <div class="col-xs-3">
          <input type="radio" class="radio_item" value="Up Grade Kit (Tape Weft Start Kit to Deluxe Kit)" onClick="CB(this.value);" name="starter-kit" id="starter4">
          <label class="label_item" for="starter4"> <img src="img/starterkits/starter1.png"></label>
          </div>

          <div class="col-xs-9">
          <p>UPGRADE KIT<BR/>
            (TAPE WEFT START KIT TO DELUXE KIT) <br/><span style="color:#803680;">USD$304</span>
          </p>

          <p>Contents: <br/>Transformer C, Reformer, Connector, Connector Loops, Tool Belt,
            Deluxe Aluminum Case. 
             </p>

          </div>

        </div>



        <div class="row">
          <div class="col-xs-3">
          <input type="radio" class="radio_item" value="Up Grade Kit (Transformation Connections Start Kit to Deluxe Kit)" onClick="CB(this.value);" name="starter-kit" id="starter5">
          <label class="label_item" for="starter5"> <img src="img/starterkits/starter1.png"></label>
          </div>

          <div class="col-xs-9">
          <p>UPGRADE KIT<BR/>
            (TRANSFORMATION CONNECTIONS START KIT TO DELUXE KIT) <br/><span style="color:#803680;">USD$200</span>
          </p>
          <p>Contents: <br/>Tape Pressing Tool, Tape Removing Tool, Removing Mats, 
            Precut Adhesive Tapes, Prefabricated Adhersive Tapes, Tool Belt, Deluxe Aluminum Case.
             </p>

          </div>

        </div>



        <div class="row">
          <div class="col-xs-3">
          <input type="radio" class="radio_item" value="Multi Weft Premium Kit" onClick="CB(this.value);" name="starter-kit" id="starter6">
          <label class="label_item" for="starter6"> <img src="img/starterkits/starter1.png"></label>
          </div>

          <div class="col-xs-9">
          <p>MULTI WEFT PREMIUM KIT <br/><span style="color:#803680;">USD$299</span></p>

          <p>Contents: <br/>Adaptability Ring, Transformer V, Reformer,  Hair Pulling Loops,
            Hair Drawing Tool, Connection Points, Perfect Clips, Aluminum Case
            </p>

          </div>

        </div> -->




        <div class="row">
          <div class="col-xs-3">
          <input type="radio" class="radio_item" value="Perfectress Multi Weft Starter Kit" onClick="CB(this.value);" name="starter-kit" id="starter7">
          <label class="label_item" for="starter7"> <img src="img/starterkits/multiweft.jpg"></label>
          </div>

          <div class="col-xs-9">
          <p>PERFECTRESS MULTI WEFT STARTER KIT <br/><span style="color:#803680;">USD$299</span></p>

          <p>Contents: <br/>Adaptability Ring, Transformer LW, Reformer, Hair Pulling Loops, Hair Drawing Tool, Connection Points, Perfect Clips,
            Velcro Strips, Video, Tri-folds, Aluminium Case
          </p>

          </div>

        </div>


    <div id="starter-kit_validate" style="color:red;font-weight:bold;padding-top:20px;"></div>







      <div class="row" style="margin-top:30px">

    <div class="col-xs-4" style="padding-top:20px;">
        <div class="form-group">
    <label for="quantity">Quantity</label><br/> 
      <input type='button' value='-' class='qtyminus btn-addtocart btn' field='quantity' form="addtocartform" />
      <input type='text' name='quantity' value='1' min='1' max='100' class='qty qty-addtocart' style="width:20%;" form="addtocartform"/>
      <input type='button' value='+' class='qtyplus btn-addtocart btn' field='quantity' form="addtocartform" />  
      </div>
    </div>


    <div class="col-xs-4" style="padding-top:44px;position:relative;right:125px; ">
    <button type="submit" form="addtocartform" name="addtocart" class="btn-addtocart btn btn-default">
    Add To Cart</button>

    </div>

        </form><!-- end of form -->

      </div>




      </div><!-- panel body -->
    </div><!-- end of panel -->
    <div class="form-group right">
    <a href="order-details.php" class="btn btn-center btn-default" role="button">BACK TO PRODUCT CATEGORY</a>
<input type="button" class="btn btn-info btn-default btn-center btn-proceed" value="PROCEED TO ORDER" role="button" onclick="location.href='shipping-details.php'" style="background-color:#803680;" <?php if(!isset($_SESSION["cart_item"])){ ?> disabled <?php   } ?> >
    </div>



    </div> <!-- left side col-xs-8 -->



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
    <hr>

    <div class="row">

    <a href="pdf/perfectress-us-availability-chart-hair.pdf" target="_blank" class="btn btn-info btn-default btn-center" role="button" style="background-color:#803680;width:100%;margin:2px 0px">HAIR PRODUCTS AVAILABILITY CHART</a>
    <a href="pdf/perfectress-us-availability-chart-tools.pdf" target="_blank" class="btn btn-info btn-default btn-center"  target="_blank" role="button" style="background-color:#803680;width:100%;margin:2px 0px">TOOL PRODUCTS AVAILABILITY CHART</a>
    </div>

    <div class="row">
    <div id="shopping-cart">
    <div class="panel panel-default" style="margin-top:20px;">
    <div class="panel-heading item-cart-header">Items in Cart <!-- <a id="btnEmpty" href="transformation-product.php?action=empty">Empty Cart</a> --> </div>
    <?php
    if(isset($_SESSION["cart_item"])){
        $item_total = 0;
    ?>  
    <table class="table" size="1">
    <tbody>
    <tr>
    <th><strong>Name</strong></th>
    <th><strong>Qty</strong></th>
    <th><strong>Price</strong></th>
    </tr> 
    <?php   
        foreach ($_SESSION["cart_item"] as $item){
        ?>
            <tr>
            <td><strong><?php echo $item["name"]; ?></strong></td>
            <td align="center"><?php echo $item["quantity"]; ?></td>
            <?php $cart_total_price =  $item["quantity"] * $item["price"]; ?>
            <td align=right><?php echo "$".$cart_total_price; ?></td>
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
    <a href="order-details.php" class="btn btn-default btn-center" role="button" style="margin-bottom:5px;width:100%;">BACK TO PRODUCT CATEGORY</a><br/> 
<input type="button" class="btn btn-info btn-default btn-center btn-proceed" value="PROCEED TO ORDER" role="button" onclick="location.href='shipping-details.php'" style="background-color:#803680;width:100%;" <?php if(!isset($_SESSION["cart_item"])){ ?> disabled <?php   } ?> >
    </div>

    </div>
    </div><!-- end of col-xs-4 -->

      
    </div> <!--container -->

    <footer class="footer">
      <div class="container">
        <p class="text-muted"><a href="terms-conditions.php" style="color:#fff;">Terms & Conditions</a> <span style="padding-left:30px;">Copyright 2016 Global Grind LLC. All Rights Reserved.</span></p>

      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/js/jquery.validate.js"></script>

    <!-- script for changing image in the product -->

    <script type="text/javascript">
    function CB(bg) {
    var url;
    if(bg=="Adaptability Ring")
    {
        url="img/tools/big/bigtool1.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Flat Bristle Brush")
    {
        url="img/tools/big/bigtool2.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }


    if(bg=="Mini Bristle Brush")
    {
        url="img/tools/big/bigtool3.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }


    if(bg=="Tools Belt")
    {
        url="img/tools/big/bigtool4.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }



    if(bg=="Daily Conditioner")
    {
        url="img/tools/big/nobig.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }


    if(bg=="Daily Shampoo")
    {
        url="img/tools/big/nobig.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }



    if(bg=="Transformer C")
    {
        url="img/tools/big/nobig.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }


    if(bg=="Reformer")
    {
        url="img/tools/big/bigtool5.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Connector L with 4 spare loops")
    {
        url="img/tools/big/bigtool6.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Connector Loops (5 pieces)")
    {
        url="img/tools/big/bigtool7.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Tape Pressing Tool")
    {
        url="img/tools/big/bigtool8.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Tape Removing Tool (2 pieces)")
    {
        url="img/tools/big/bigtool9.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Tape Strips (100 pre-cut)")
    {
        url="img/tools/big/bigtool10.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }


    if(bg=="Prefabricated Tapes (50 pre-fab)")
    {
        url="img/tools/big/bigtool11.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Tape Combo Pack (50 pre-cut & 25 pre-fab)")
    {
        url="img/tools/big/bigtool12.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }


    if(bg=="Double Sided Adhesive Tape ( 1 Core )")
    {
        url="img/tools/big/bigtool13.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Removing Mat (20 pieces)")
    {
        url="img/tools/big/bigtool14.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }


    if(bg=="Transformer V")
    {
        url="img/tools/big/bigtool15.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Hair Pulling Loops (5 pieces)")
    {
        url="img/tools/big/nobig.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Hair Drawing Tool (2 pieces)")
    {
        url="img/tools/big/bigtool16.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Connection Points - Black  (100 pieces)")
    {
        url="img/tools/big/bigtool17.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Connection Points - Dark Brown  (100 pieces)")
    {
        url="img/tools/big/bigtool18.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Connection Points - Medium Brown  (100 pieces)")
    {
        url="img/tools/big/bigtool19.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Connection Points - Light Brown  (100 pieces)")
    {
        url="img/tools/big/bigtool20.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }
    if(bg=="Connection Points - Blond  (100 pieces)")
    {
        url="img/tools/big/bigtool21.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }
    if(bg=="Perfect Clips  - Black  (5 pieces)")
    {
        url="img/tools/big/bigtool22.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }
    if(bg=="Perfect Clips  - Dark Brown  (5 pieces)")
    {
        url="img/tools/big/bigtool23.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Perfect Clips  - Medium Brown  (5 pieces)")
    {
        url="img/tools/big/bigtool24.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }
    if(bg=="Perfect Clips  - Light Brown  (5 pieces)")
    {
        url="img/tools/big/bigtool25.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Perfect Clips  - Blond  (5 pieces)")
    {
        url="img/tools/big/bigtool26.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }





    }//end of the function




    </script>

<!-- end of it -->


  <!-- script for validation --> 

  <script type="text/javascript">
$(document).ready(function() {


    var rules = {

  
        ignore: [],
        // any other options and/or rules 
  
      messages: {
        'starter-kit': "Please indicate which starter kit that you want *"
      },

        errorPlacement: function (error, element) {
        var name = $(element).attr("name");
        error.appendTo($("#" + name + "_validate"));
    },

    
  };


    $('#addtocartform').validate(rules);



});

</script>





  <!-- end of script validation -->




    <!-- script for plus and minus add to cart -->

    <script type="text/javascript">

    jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
        });
    });
    </script>


    <!-- end of it -->



    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
