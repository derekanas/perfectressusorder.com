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


if(isset($_POST['tool-item'])){

$itemtool = $_POST['tool-item'];
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
        <form method="post" id="addtocartform" action="tools-product.php?action=add&code=<?php echo "TOOLS" ?>">

      <div class="row" style="margin-top:20px;">
      <div class="col-xs-5">
        <style type="text/css">
        #ecard
        {
            background:url('img/tools/big/bigtool1.png');
            width:308px;
            height:338px;
            border:1px solid #E5E3E3; 
        }


        .label_item img{
        border:1px solid #ccc;

        }
        </style>
        <h5>Select Item:</h5>
        <div id="ecard"></div>
        <!-- here goes the big image preview  -->

      </div>
      
      <div class="col-xs-7" style=" margin-left:45px;padding-top:35px;width:379px;">

    <div class="box">
    <input type="radio" class="radio_item" value="Adaptability Ring" onClick="CB(this.value);" name="tool-item" id="tool1" required>
    <label class="label_item" for="tool1"> <img src="img/tools/small/tool1.png"><p class="text-center radio-text">ADAPTABILITY RING <br/><span style="color:#803680;">USD$54</span></p> </label>  
    </div>

        <div class="box">
    <input type="radio" class="radio_item" value="Flat Bristle Brush" onClick="CB(this.value);" name="tool-item" id="tool2">
    <label class="label_item" for="tool2"> <img src="img/tools/small/tool2.png"><p class="text-center radio-text">FLAT BRISTLE BRUSH <br/><span style="color:#803680;">USD$16</span></p> </label>  
    </div>

        <div class="box">
    <input type="radio" class="radio_item" value="Mini Bristle Brush" onClick="CB(this.value);" name="tool-item" id="tool3">
    <label class="label_item" for="tool3"> <img src="img/tools/small/tool3.png"><p class="text-center radio-text">MINI BRISTLE BRUSH <br/><span style="color:#803680;">USD$12</span></p> </label>  
    </div>

        <div class="box">
    <input type="radio" class="radio_item" value="Tools Belt" onClick="CB(this.value);" name="tool-item" id="tool4">
    <label class="label_item" for="tool4"> <img src="img/tools/small/tool4.png"><p class="text-center radio-text">TOOLS BELT <br/><span style="color:#803680;">USD$34</span></p> </label>  
    </div>


    <div class="box">
    <input type="radio" class="radio_item" value="Velcro Strips" onClick="CB(this.value);" name="tool-item" id="tool5">
    <label class="label_item" for="tool5"> <img src="img/tools/small/velcro-strips-small.png"><p class="text-center radio-text">Velcro Strips<br/><span style="color:#803680;">USD$9</span></p> </label>  
    </div>
<!--  remove first
        <div class="box">
    <input type="radio" class="radio_item" value="Daily Conditioner" onClick="CB(this.value);" name="tool-item" id="tool5">
    <label class="label_item" for="tool5"> <img src="img/tools/small/conditioner-small.jpg"><p class="text-center radio-text">DAILY CONDITIONER</p> </label>  
    </div>

        <div class="box">
    <input type="radio" class="radio_item" value="Daily Shampoo" onClick="CB(this.value);" name="tool-item" id="tool6">
    <label class="label_item" for="tool6"> <img src="img/tools/small/shampoo-small.jpg"><p class="text-center radio-text">DAILY SHAMPOO</p> </label>  
    </div>
 -->


          <div class="box">
    <input type="radio" class="radio_item" value="Transformer C" onClick="CB(this.value);"  name="tool-item" id="tool7" >
    <label class="label_item" for="tool7"> <img src="img/tools/small/transformer-c-sm.jpg"><p class="text-center radio-text">TRANS<br/>FORMER C <br/><span style="color:#803680;">USD$95</span></p> </label>  
    </div>


      </div>  



      </div> <!-- end of row of tools -->

  <div class="row">
    <div class="col-xs-12" style=";margin-top:20px;">

        <div class="box">
    <input type="radio" class="radio_item" value="Reformer" onClick="CB(this.value);"  name="tool-item" id="tool8">
    <label class="label_item" for="tool8"> <img src="img/tools/small/tool6.png"><p class="text-center radio-text">REFORMER <br/><span style="color:#803680;">USD$95</span></p> </label>  
    </div>


        <div class="box">
    <input type="radio" class="radio_item" value="Connector L with 4 spare loops" onClick="CB(this.value);"  name="tool-item" id="tool9">
    <label class="label_item" for="tool9"> <img src="img/tools/small/tool7.png"><p class="text-center radio-text">CONNECTOR L WITH 4 SPARE LOOPS <br/><span style="color:#803680;">USD$40</span></p> </label>  
    </div> 
        <div class="box">
    <input type="radio" class="radio_item" value="Connector L Loops (5 pieces)" onClick="CB(this.value);"  name="tool-item" id="tool10">
    <label class="label_item" for="tool10"> <img src="img/tools/small/tool8.png"><p class="text-center radio-text">CONNECTOR L LOOPS (5 PIECES) <br/><span style="color:#803680;">USD$9</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Tape Pressing Tool" onClick="CB(this.value);"  name="tool-item" id="tool11">
    <label class="label_item" for="tool11"> <img src="img/tools/small/tool9.png"><p class="text-center radio-text">TAPE PRESSING TOOL <br/><span style="color:#803680;">USD$95</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Tape Removing Tool (2 pieces)" onClick="CB(this.value);"  name="tool-item" id="tool12">
    <label class="label_item" for="tool12"> <img src="img/tools/small/tool10.png"><p class="text-center radio-text">TAPE REMOVING TOOL (2 PIECES) <br/><span style="color:#803680;">USD$4</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Precut Adhesive Tapes (100 pre-cut)" onClick="CB(this.value);"  name="tool-item" id="tool13">
    <label class="label_item" for="tool13"> <img src="img/tools/small/tool11.png"><p class="text-center radio-text">PRECUT ADHESIVE TAPES (100 PRE-CUT) <br/><span style="color:#803680;">USD$40</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Prefab Tapes (50 pre-fab)" onClick="CB(this.value);"  name="tool-item" id="tool14">
    <label class="label_item" for="tool14"> <img src="img/tools/small/tool12.png"><p class="text-center radio-text">PREFAB TAPES (50 PRE-FAB) <br/><span style="color:#803680;">USD$40</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Tape Combo Pack (50 pre-cut & 25 pre-fab)" onClick="CB(this.value);"  name="tool-item" id="tool15">
    <label class="label_item" for="tool15"> <img src="img/tools/small/tool13.png"><p class="text-center radio-text">TAPE COMBO PACK (50 PRE-CUT & 25 PRE-FAB) <br/><span style="color:#803680;">USD$40</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Double Sided Adhesive Tape (1 Core = 2 Rolls)" onClick="CB(this.value);"  name="tool-item" id="tool16">
    <label class="label_item" for="tool16"> <img src="img/tools/small/tool14.png"><p class="text-center radio-text">Double Sided Adhesive Tape (1 Core = 2 Rolls)<br/><span style="color:#803680;">USD$40</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Removing Mat (20 pieces)" onClick="CB(this.value);"  name="tool-item" id="tool17">
    <label class="label_item" for="tool17"> <img src="img/tools/small/tool15.png"><p class="text-center radio-text">REMOVING MAT (20 PIECES) <br/><span style="color:#803680;">USD$3</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Transformer LW" onClick="CB(this.value);"  name="tool-item" id="tool18">
    <label class="label_item" for="tool18"> <img src="img/tools/small/tool16.png"><p class="text-center radio-text">TRANSFORMER LW <br/><span style="color:#803680;">USD$95</span></p> </label>  
    </div>

    <div class="box">
    <input type="radio" class="radio_item" value="Hair Pulling Loops (5 pieces)" onClick="CB(this.value);"  name="tool-item" id="tool19">
    <label class="label_item" for="tool19"> <img src="img/tools/small/hairpulling.png"><p class="text-center radio-text">HAIR PULLING LOOPS (5 PIECES) <br/><span style="color:#803680;">USD$9</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Hair Drawing Tool (2 pieces)" onClick="CB(this.value);"  name="tool-item" id="tool20">
    <label class="label_item" for="tool20"> <img src="img/tools/small/tool17.png"><p class="text-center radio-text">HAIR DRAWING TOOL (2 PIECES) <br/><span style="color:#803680;">USD$25</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Connection Points - Black  (100 pieces)" onClick="CB(this.value);"  name="tool-item" id="tool21">
    <label class="label_item" for="tool21"> <img src="img/tools/small/tool18.png"><p class="text-center radio-text">CONNECTION POINTS - BLACK (100 PIECES) <br/><span style="color:#803680;">USD$16</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Connection Points - Dark Brown  (100 pieces)" onClick="CB(this.value);"  name="tool-item" id="tool22">
    <label class="label_item" for="tool22"> <img src="img/tools/small/tool28.png"><p class="text-center radio-text">CONNECTION POINTS - DARK BROWN (100 PIECES) <br/><span style="color:#803680;">USD$16</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Connection Points - Medium Brown  (100 pieces)" onClick="CB(this.value);"  name="tool-item" id="tool23">
    <label class="label_item" for="tool23"> <img src="img/tools/small/tool29.png"><p class="text-center radio-text">CONNECTION POINTS - MEDIUM BROWN (100 PIECES) <br/><span style="color:#803680;">USD$16</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Connection Points - Light Brown  (100 pieces)" onClick="CB(this.value);"  name="tool-item" id="tool24">
    <label class="label_item" for="tool24"> <img src="img/tools/small/tool30.png"><p class="text-center radio-text">CONNECTION POINTS - LIGHT BROWN (100 PIECES) <br/><span style="color:#803680;">USD$16</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Connection Points - Blond  (100 pieces)" onClick="CB(this.value);"  name="tool-item" id="tool25">
    <label class="label_item" for="tool25"> <img src="img/tools/small/tool31.png"><p class="text-center radio-text">CONNECTION POINTS - BLONDE (100 PIECES) <br/><span style="color:#803680;">USD$16</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Perfect Clips  - Black  (5 pieces)" onClick="CB(this.value);"  name="tool-item" id="tool26">
    <label class="label_item" for="tool26"> <img src="img/tools/small/tool23.png"><p class="text-center radio-text">PERFECT CLIPS - BLACK (5 PIECES) <br/><span style="color:#803680;">USD$10</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Perfect Clips  - Dark Brown  (5 pieces)" onClick="CB(this.value);"  name="tool-item" id="tool27">
    <label class="label_item" for="tool27"> <img src="img/tools/small/tool27.png"><p class="text-center radio-text">PERFECT CLIPS - DARK BROWN (5 PIECES) <br/><span style="color:#803680;">USD$10</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Perfect Clips  - Medium Brown  (5 pieces)" onClick="CB(this.value);"  name="tool-item" id="tool28">
    <label class="label_item" for="tool28"> <img src="img/tools/small/tool25.png"><p class="text-center radio-text">PERFECT CLIPS - MEDIUM BROWN (5 PIECES) <br/><span style="color:#803680;">USD$10</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Perfect Clips  - Light Brown  (5 pieces)" onClick="CB(this.value);"  name="tool-item" id="tool29">
    <label class="label_item" for="tool29"> <img src="img/tools/small/tool26.png"><p class="text-center radio-text">PERFECT CLIPS - LIGHT BROWN (5 PIECES) <br/><span style="color:#803680;">USD$10</span></p> </label>  
    </div>
        <div class="box">
    <input type="radio" class="radio_item" value="Perfect Clips  - Blond  (5 pieces)" onClick="CB(this.value);"  name="tool-item" id="tool30">
    <label class="label_item" for="tool30"> <img src="img/tools/small/tool24.png"><p class="text-center radio-text">PERFECT CLIPS - BLONDE (5 PIECES) <br/><span style="color:#803680;">USD$10</span></p> </label>  
    </div>



    </div><!-- end of col-xs-12 -->
  </div> <!-- end of row --> 



      <div id="tool-item_validate" style="color:red;font-weight:bold;padding-top:20px;"></div>






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
    <a href="order-details.php" class="btn btn-default btn-center" role="button">BACK TO PRODUCT CATEGORY</a>
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

    if(bg=="Velcro Strips")
    {
        url="img/tools/big/velcro-strips-big.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }




    if(bg=="Daily Conditioner")
    {
        url="img/tools/big/conditioner-big.jpg";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }


    if(bg=="Daily Shampoo")
    {
        url="img/tools/big/shampoo-big.jpg";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }



    if(bg=="Transformer C")
    {
        url="img/tools/big/transformer-c.jpg";
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

    if(bg=="Connector L Loops (5 pieces)")
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
        url="img/tools/big/bigtool27.jpg";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }


    if(bg=="Double Sided Adhesive Tape (1 Core = 2 Rolls)")
    {
        url="img/tools/big/bigtool13.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Removing Mat (20 pieces)")
    {
        url="img/tools/big/bigtool14.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }


    if(bg=="Transformer LW")
    {
        url="img/tools/big/bigtool15.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Hair Pulling Loops (5 pieces)")
    {
        url="img/tools/big/hairpulling2.png";
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
        url="img/tools/big/bigtool28.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Connection Points - Medium Brown  (100 pieces)")
    {
        url="img/tools/big/bigtool29.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Connection Points - Light Brown  (100 pieces)")
    {
        url="img/tools/big/bigtool30.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }
    if(bg=="Connection Points - Blond  (100 pieces)")
    {
        url="img/tools/big/bigtool31.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }
    if(bg=="Perfect Clips  - Black  (5 pieces)")
    {
        url="img/tools/big/bigtool22.jpg";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }
    if(bg=="Perfect Clips  - Dark Brown  (5 pieces)")
    {
        url="img/tools/big/bigtool26.jpg";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Perfect Clips  - Medium Brown  (5 pieces)")
    {
        url="img/tools/big/bigtool24.jpg";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }
    if(bg=="Perfect Clips  - Light Brown  (5 pieces)")
    {
        url="img/tools/big/bigtool25.jpg";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }

    if(bg=="Perfect Clips  - Blond  (5 pieces)")
    {
        url="img/tools/big/bigtool23.jpg";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }


    if(bg=="Precut Adhesive Tapes (100 pre-cut)")
    {
        url="img/tools/big/bigtool10.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }



    if(bg=="Prefab Tapes (50 pre-fab)")
    {
        url="img/tools/big/bigtool11.png";
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
        'tool-item': "Please indicate which tools that you want *"
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
