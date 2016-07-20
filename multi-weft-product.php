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

if (isset($_POST['texture-item'])){

$texture = $_POST['texture-item'];
$_SESSION['texture'] = $texture;

}


if(isset($_POST['item-colour'])){

$itemcolor = $_POST['item-colour'];
$escitemcolor = mysql_escape_string($itemcolor); 
$hairlength = $_POST['input-hair-length'];
$hairsize = $_POST['input-hair-size'];
$_SESSION['itemcolor'] = $escitemcolor;
$_SESSION['hairlength'] = $hairlength;
}//end of the spost radio




//end of the setting of categories


require_once("db/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) { 
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productByCode = $db_handle->runQuery('SELECT * FROM tblproducthair WHERE itemcode="'.$_GET["code"].'" AND hairtexture="'.$texture.'" AND hairlength="'.$hairlength.'" AND haircolour="'.$escitemcolor.'" AND size="'.$hairsize.'"');
      $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["item"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'hairtype'=>$productByCode[0]["hairtype"], 'hairtexture'=>$productByCode[0]["hairtexture"], 'hairlength'=>$productByCode[0]["hairlength"], 'haircolour'=>$productByCode[0]["haircolour"]));
      
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
      <div class="panel-heading">Perfectress Multi Weft - Perfectress Remy Cuticle Hair 
        <div class="row main-pic-header">
        <div class="col-xs-6">
        <img src="img/mainpic/multiweft2.jpg ">
        </div>
        <div class="col-xs-6">
         <img src="img/mainpic/multiweft1.jpg "> 
        </div>


      </div> <!-- main pic header -->

       </div>
      <div class="panel-body">
        <form method="post" id="addtocartform" action="multi-weft-product.php?action=add&code=<?php echo "RREN-MTW" ?>">





      <div class="row">
      <h5 style="padding-left:15px;font-weight:bold;">Please make selection:</h5>
      <div class="col-xs-6">    
      <label for="input-hair-length">Select Hair Length: </label>
      <br/>
      <select class="form-control" name="input-hair-length" id="hair-length" style="width:60%;" required>
        <option selected="selected" value=''>Please Select</option>
        <option value='14'>14"</option>
        <option value='18'>18"</option>
        <option value='22'>22"</option>
      </select>
      </div>


      <div class="col-xs-6">    
      <label for="input-hair-size">Select Size:</label>
      <br/>
      <select class="form-control" name="input-hair-size" id="input-hair-size" style="width:70%;">
        <option value='SINGLEPLUS'>Single Plus (1 pack - 8pcs )</option>
      </select>
      </div>
    </div><!-- end of row selection options -->

      <div class="row" style="margin-top:20px;">
      <div class="col-xs-5">
        <style type="text/css">
        #ecard
        {
            background:url('img/rren-transconn/texture/big/big-texture2.png');
            width:308px;
            height:490px;
        }
        </style>
        <h5>Select Texture:</h5>
        <div id="ecard"></div>
        <!-- here goes the big image preview  -->

      </div>
      
      <div class="col-xs-7" style=" margin-left:45px;padding-top:35px;width:350px;">

    <div class="box">
    <input type="radio" class="radio_item" value="Natural Body" onClick="CB(this.value);" name="texture-item" id="texture2" checked required>
    <label class="label_item" for="texture2"> <img src="img/rren-transconn/texture/texture2.png"><p class="text-center radio-text">NATURAL BODY NB</p> </label>  
    </div>

    <!-- <p style="font-size:12px;text-align: left;padding-left: 45px; ">*example shown is based on natural dark color</p> -->

      </div>  


      </div> <!-- end of row of texture --> 



      <div class="row"  style="margin-top:20px;">
      <div class="col-xs-5">

        <style type="text/css">
        #ecard2
        {
            background:url('img/rren-transconn/color/big/bigcolor1.png');
            width:308px;
            height:245px;
        }
        </style>
        <h5>Select Color:</h5>
        <div id="ecard2"></div>
      <p style="font-size:12px;padding-top:10px;"><span style="color:red;">*</span>Color pictures are for reference only which might slightly different based on different laptop setting</p>

        <!-- here goes the big image preview  -->

      </div>
      
      <div class="col-xs-7" style="text-align:right;padding-top:35px;width:400px;">


         <!--RADIO 1-->
      <div class="box">
    <input type="radio" class="radio_item" value="# 1" onClick="CB2(this.value);" name="item-colour" id="colour1" required>
        <label class="label_item" for="colour1"> <img src="img/rren-transconn/color/color1.png"><p class="text-center radio-text">JET BLACK #1</p> </label>
     </div> 
    <!--RADIO 2-->
    <div class="box">
    <input type="radio" class="radio_item" value="# 1B" onClick="CB2(this.value);" name="item-colour" id="colour2">
    <label class="label_item" for="colour2"> <img src="img/rren-transconn/color/color2.png"><p class="text-center radio-text">OFF BLACK #1B</p> </label>  
    </div>

    <div class="box">
        <input type="radio" class="radio_item" value="# 2" onClick="CB2(this.value);" name="item-colour" id="colour3">
        <label class="label_item" for="colour3"> <img src="img/rren-transconn/color/color3.png"><p class="text-center radio-text"> DARKEST BROWN #2</p> </label>
    </div>
    <!--RADIO 2-->
    <div class="box">
        <input type="radio" class="radio_item" value="# 2R" onClick="CB2(this.value);" name="item-colour" id="colour3.5">
        <label class="label_item" for="colour3.5"> <img src="img/rren-transconn/color/color4.png"><p class="text-center radio-text"> DARKEST BROWN - RED TONE #2R</p> </label>
    </div>

    <div class="box">
    <input type="radio" class="radio_item" value="# 3" onClick="CB2(this.value);" name="item-colour" id="colour4">
    <label class="label_item" for="colour4"> <img src="img/rren-transconn/color/color5.png"><p class="text-center radio-text">DARK BROWN #3</p> </label>  
    </div>

    <div class="box">
        <input type="radio" class="radio_item" value="# 4" onClick="CB2(this.value);" name="item-colour" id="colour5">
        <label class="label_item" for="colour5"> <img src="img/rren-transconn/color/color6.png"><p class="text-center radio-text">BROWN #4</p> </label>
    </div>




    </div>
  </div>



  <div class="row">
    <div class="col-xs-12" style=";margin-top:20px;">

    <!--RADIO 2-->
    <div class="box">
    <input type="radio" class="radio_item" value="# 4R" onClick="CB2(this.value);"  name="item-colour" id="colour6">
    <label class="label_item" for="colour6"> <img src="img/rren-transconn/color/color7.png"><p class="text-center radio-text">BROWN - RED TONE #4R</p> </label>  
    </div>

      <div class="box">
        <input type="radio" class="radio_item" value="# 6" onClick="CB2(this.value);" name="item-colour" id="colour7">
        <label class="label_item" for="colour7"> <img src="img/rren-transconn/color/color8.png"><p class="text-center radio-text">MEDIUM BROWN #6</p> </label>
      </div>
    <!--RADIO 2-->

    <div class="box"> 
        <input type="radio" class="radio_item" value="# 6R" onClick="CB2(this.value);" name="item-colour" id="colour9">
        <label class="label_item" for="colour9"> <img src="img/rren-transconn/color/color10.png"><p class="text-center radio-text">MEDIUM BROWN - RED TONE #6R</p> </label>
      </div>
    <!--RADIO 2-->
    <div class="box">
    <input type="radio" class="radio_item" value="# 8" onClick="CB2(this.value);" name="item-colour" id="colour10">
    <label class="label_item" for="colour10"> <img src="img/rren-transconn/color/color11.png"><p class="text-center radio-text">CHESTNUT BROWN #8</p> </label>
    </div>  

    
    <!--RADIO 2-->
    <div class="box">
    <input type="radio" class="radio_item" value="# 12" onClick="CB2(this.value);" name="item-colour" id="colour12">
    <label class="label_item" for="colour12"> <img src="img/rren-transconn/color/color13.png"><p class="text-center radio-text">GOLDEN BROWN #12</p> </label>
    </div>  

    <!--RADIO 2-->
    <div class="box">
    <input type="radio" class="radio_item" value="# 16" onClick="CB2(this.value);" name="item-colour" id="colour14">
    <label class="label_item" for="colour14"> <img src="img/rren-transconn/color/color15.png"><p class="text-center radio-text">HONEY BLONDE #16</p> </label>
    </div> 
    
    <!--RADIO 2-->
    <div class="box">
    <input type="radio" class="radio_item" value="# 22" onClick="CB2(this.value);" name="item-colour" id="colour18">
    <label class="label_item" for="colour18"> <img src="img/rren-transconn/color/color19.png"><p class="text-center radio-text">ASH BLONDE #22</p> </label>
    </div> 
    <div class="box">
    <input type="radio" class="radio_item" value="# 24" onClick="CB2(this.value);" name="item-colour" id="colour19">
    <label class="label_item" for="colour19"> <img src="img/rren-transconn/color/color20.png"><p class="text-center radio-text">GOLDEN BLONDE<br/> #24</p> </label>
    </div>
    
    <!--RADIO 2-->
    <div class="box">
    <input type="radio" class="radio_item" value="# 25" onClick="CB2(this.value);" name="item-colour" id="colour20">
    <label class="label_item" for="colour20"> <img src="img/rren-transconn/color/color21.png"><p class="text-center radio-text">BLONDE #25</p> </label> 
    </div> 

    <div class="box">
        <input type="radio" class="radio_item" value="# 33R" onClick="CB2(this.value);" name="item-colour" id="colour23">
        <label class="label_item" for="colour23"> <img src="img/rren-transconn/color/color25.png"><p class="text-center radio-text">DEEP AUBURN - RED TONE #33R</p> </label>
    </div>
    
    <!--RADIO 2-->
    
    <!--RADIO 2-->
    <div class="box">
    <input type="radio" class="radio_item" value="# 613" onClick="CB2(this.value);" name="item-colour" id="colour26">
    <label class="label_item" for="colour26"> <img src="img/rren-transconn/color/color27.png"><p class="text-center radio-text">LIGHTEST BLONDE #613</p> </label> 
    </div> 
    <div class="box">
      <input type="radio" class="radio_item" value="# 613B" onClick="CB2(this.value);" name="item-colour" id="colour27">
      <label class="label_item" for="colour27"> <img src="img/rren-transconn/color/color28.png"><p class="text-center radio-text">LIGHT BLONDE #613B</p> </label>
    </div>
    
    <!--RADIO 2-->
    <div class="box">
    <input type="radio" class="radio_item" value="# B4" onClick="CB2(this.value);" name="item-colour" id="colour28">
    <label class="label_item" for="colour28"> <img src="img/rren-transconn/color/color29.png"><p class="text-center radio-text">BLEACHED BROWN #B4</p> </label>
    </div>  
    <div class="box">
        <input type="radio" class="radio_item" value="# B6" onClick="CB2(this.value);" name="item-colour" id="colour29">
        <label class="label_item" for="colour29"> <img src="img/rren-transconn/color/color30.png"><p class="text-center radio-text">BLEACHED MEDIUM BROWN #B6</p> </label>
    </div>
    
    <!--RADIO 2-->
    <div class="box">
    <input type="radio" class="radio_item" value="# B7" onClick="CB2(this.value);" name="item-colour" id="colour30">
    <label class="label_item" for="colour30"> <img src="img/rren-transconn/color/color31.png"><p class="text-center radio-text">BLEACHED LIGHT BROWN #B7</p> </label>
    </div>  
    <div class="box">
        <input type="radio" class="radio_item" value="# B15" onClick="CB2(this.value);" name="item-colour" id="colour33">
        <label class="label_item" for="colour33"> <img src="img/rren-transconn/color/color34.png"><p class="text-center radio-text">BLEACHED LIGHT BLONDE #B15</p> </label>
    </div>
    
    
    
    <!--RADIO 2-->
    <div class="box">
    <input type="radio" class="radio_item" value="# 8/25" onClick="CB2(this.value);" name="item-colour" id="colour38">
    <label class="label_item" for="colour38"> <img src="img/rren-transconn/color/color39.png"><p class="text-center radio-text">CHESTNUT BROWN / BLONDE #8/25</p> </label>
    </div>  
    
    <!--RADIO 2-->
    <div class="box">
    <input type="radio" class="radio_item" value="# 12/613" onClick="CB2(this.value);" name="item-colour" id="colour40">
    <label class="label_item" for="colour40"> <img src="img/rren-transconn/color/color41.png"><p class="text-center radio-text">GOLDEN BROWN / LIGHTEST BLONDE #12/613</p> </label>
  </div>
    <div class="box">
    <input type="radio" class="radio_item" value="# 14/24" onClick="CB2(this.value);" name="item-colour" id="colour41">
    <label class="label_item" for="colour41"> <img src="img/rren-transconn/color/color42.png"><p class="text-center radio-text">WHEAT BROWN / GOLDEN BLONDE #14/24</p> </label>
  </div>
    <div class="box">
    <input type="radio" class="radio_item" value="# 18/22" onClick="CB2(this.value);" name="item-colour" id="colour42">
    <label class="label_item" for="colour42"> <img src="img/rren-transconn/color/color43.png"><p class="text-center radio-text">LIGHT ASH BROWN / ASH BLONDE #18/22</p> </label>
  </div>
    <div class="box">
    <input type="radio" class="radio_item" value="# 22/613" onClick="CB2(this.value);" name="item-colour" id="colour43">
    <label class="label_item" for="colour43"> <img src="img/rren-transconn/color/color44.png"><p class="text-center radio-text">ASH BLONDE / LIGHTEST BLONDE #22/613</p> </label>
  </div>    
    <div class="box">
    <input type="radio" class="radio_item" value="# 24/613" onClick="CB2(this.value);" name="item-colour" id="colour44">
    <label class="label_item" for="colour44"> <img src="img/rren-transconn/color/color45.png"><p class="text-center radio-text">GOLDEN BLONDE/ LIGHTEST BLONDE <BR/> #24/613</p> </label>
  </div>

      </div>  


      </div> <!-- end of row of colour --> 
    <div id="input-hair-length_validate" style="color:red;font-weight:bold;padding-top:20px;"></div>   
    <div id="texture-item_validate" style="color:red;font-weight:bold;"></div>
    <div id="item-colour_validate" style="color:red;font-weight:bold;"></div>



      <div class="row" style="margin-top:30px">

    <div class="col-xs-4" style="padding-top:20px;">
        <div class="form-group">
    <label for="quantity">Quantity</label><br/>
      <input type='button' value='-' class='qtyminus btn-addtocart btn' field='quantity' form="addtocartform" />
      <input type='text' name='quantity' value='1' min='1' max='100' class='qty qty-addtocart' style="width:20%;" form="addtocartform"/>
      <input type='button' value='+' class='qtyplus btn-addtocart btn' field='quantity' form="addtocartform" />  
      </div>
    </div>    <script src="/js/jquery.validate.js"></script>


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
            <td><strong><?php echo $item["hairtype"] ." ".$item["name"]; echo "<br/><br/><span style='color:purple;'>"; echo $item['hairtexture']; echo "<br/>"; echo $item['haircolour']; echo"<br/>"; echo $item['hairlength']; echo '"'; echo "</span>"; ?></strong></td>
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

    </div><!-- end of col-xs-4  --> 
      
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
    if(bg=="Silky Straight")
    {
        url="img/rren-transconn/texture/big/big-texture1.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";
    }
    else if(bg=="Natural Body")
    {
 url="img/rren-transconn/texture/big/big-texture2.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";            
    }

    else if(bg=="Body Wave")
    {
 url="img/rren-transconn/texture/big/big-texture3.png";
    document.getElementById("ecard").style.backgroundImage = "url(" + url + ")";            
    }
        



    }//end of the function



    function CB2(bg) {
    var url;
    if(bg=="# 1")
    {
        url="img/rren-transconn/color/big/bigcolor1.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";
    }
        
    else if(bg=="# 1B")
    {
 url="img/rren-transconn/color/big/bigcolor2.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }

    else if(bg=="# 2")
    {
 url="img/rren-transconn/color/big/bigcolor3.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }

    else if(bg=="# 2R")
    {
 url="img/rren-transconn/color/big/bigcolor4.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }


    else if(bg=="# 3")
    {
 url="img/rren-transconn/color/big/bigcolor5.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }


    else if(bg=="# 4")
    {
 url="img/rren-transconn/color/big/bigcolor6.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }

    else if(bg=="# 4R")
    {
 url="img/rren-transconn/color/big/bigcolor7.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }
    else if(bg=="# 6")
    {
 url="img/rren-transconn/color/big/bigcolor8.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }

    else if(bg=="# 6R")
    {
 url="img/rren-transconn/color/big/bigcolor10.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }


    else if(bg=="# 8")
    {
 url="img/rren-transconn/color/big/bigcolor11.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }


    else if(bg=="# 12")
    {
 url="img/rren-transconn/color/big/bigcolor13.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }

    else if(bg=="# 16")
    {
 url="img/rren-transconn/color/big/bigcolor15.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }


    else if(bg=="# 22")
    {
 url="img/rren-transconn/color/big/bigcolor19.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }

    else if(bg=="# 24")
    {
 url="img/rren-transconn/color/big/bigcolor20.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }

    else if(bg=="# 25")
    {
 url="img/rren-transconn/color/big/bigcolor21.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }

    else if(bg=="# 33R")
    {
 url="img/rren-transconn/color/big/bigcolor25.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }

    else if(bg=="# 613")
    {
 url="img/rren-transconn/color/big/bigcolor27.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }


    else if(bg=="# 613B")
    {
 url="img/rren-transconn/color/big/bigcolor28.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }


    else if(bg=="# B4")
    {
 url="img/rren-transconn/color/big/bigcolor29.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }



    else if(bg=="# B6")
    {
 url="img/rren-transconn/color/big/bigcolor30.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }


    else if(bg=="# B7")
    {
 url="img/rren-transconn/color/big/bigcolor31.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }



    else if(bg=="# B15")
    {
 url="img/rren-transconn/color/big/bigcolor34.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }


    else if(bg=="# 8/25")
    {
 url="img/rren-transconn/color/big/bigcolor39.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }




    else if(bg=="# 12/613")
    {
 url="img/rren-transconn/color/big/bigcolor41.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }


    else if(bg=="# 14/24")
    {
 url="img/rren-transconn/color/big/bigcolor42.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }



    else if(bg=="# 18/22")
    {
 url="img/rren-transconn/color/big/bigcolor43.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }


    else if(bg=="# 22/613")
    {
 url="img/rren-transconn/color/big/bigcolor44.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
    }
    

    else if(bg=="# 24/613")
    {
 url="img/rren-transconn/color/big/bigcolor45.png";
    document.getElementById("ecard2").style.backgroundImage = "url(" + url + ")";            
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
        'texture-item': "Please indicate which texture that you want *",
        'item-colour': "Please indicate which color that you want *",
        'input-hair-length': "Please indicate what hair length that you want*"
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
