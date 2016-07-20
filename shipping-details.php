<?php session_start(); 

// make sure user is logged in
if (!$_SESSION['emailadd']) {
    $loginError = "You are not logged in.";
    include("index.php");
    exit();
}


$emailfrmsession = $_SESSION['emailadd'];
$phonefrmsession = $_SESSION['phone'];
$firstnamefrmsession = $_SESSION['firstname'];
$lastnamefrmsession = $_SESSION['lastname'];
$texture = $_SESSION["texture"]; 
$itemcolor = $_SESSION["itemcolor"];
$hairlength = $_SESSION["hairlength"];
$shipaddress = $_SESSION['address'];
$state = $_SESSION['state'];
$city = $_SESSION['city'];
$zipcode = $_SESSION['zipcode'];
$country = $_SESSION['country'];
require_once("db/dbcontroller.php");
$db_handle = new DBController();
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
   <img src="img/step3.jpg" style="width:750px;">
    <form action="order-summary.php" method="post">


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
      </div>


    </div>

<!--         <div class="row" style="margin-top:20px; ">
        <div class="col-xs-6">
        <label for="inputemail">Email Address</label>
        <input type="email" style="background-color:#fff; " class="form-control" id="inputemail" name="inputemail" value="<?php echo $emailfrmsession; ?>"  >
        </div>
        <div class="col-xs-6">
        <label for="inputphone">Phone Number</label>
        <input type="text" style="background-color:#fff; " class="form-control" id="inputphone" name="inputphone" value="<?php echo $phonefrmsession; ?>" >
        </div>
        </div>


        <div class="row" style="margin-top:20px; ">
        <div class="col-xs-6">
        <label for="inputemail">First Name</label>
        <input type="text" style="background-color:#fff; " class="form-control" id="inputfirstname" name="inputfirstname" value="<?php echo $firstnamefrmsession; ?>"  >
        </div>
        <div class="col-xs-6">
        <label for="inputlastname">Last Name</label>
        <input type="text" style="background-color:#fff; " class="form-control" id="inputlastname" name="inputlastname" value="<?php echo $lastnamefrmsession; ?>"  >
        </div>
        </div> -->
    <h4 style="font-weight:bold;margin-top:40px;margin-bottom:20px;">Shipping Details <img style="margin-left:10px; " src="img/question.png"></h4>
    
    <div class="form-group">
    <label for="selectregion">Please select your Region&nbsp;<span style="color:red">*</span></label><br/>
    <input type="radio" name="selectregion" id="selectregion-wc" value="West Coast Region" required />&nbsp;West Coast Region&nbsp;
    <input type="radio" name="selectregion" id="selectregion-ne" value="North East Region"/>&nbsp;North East Region&nbsp;
    <input type="radio" name="selectregion" id="selectregion-mw" value="Mid West Region"/>&nbsp;Mid West Region&nbsp;
    <input type="radio" name="selectregion" id="selectregion-ec" value="East Coast Region"/>&nbsp;East Coast Region

    </div>



    <div class="form-group" >
    <label for="shippingpreference">Please select your shipping preference&nbsp;<span style="color:red;">*</span></label>
    <select style="margin-bottom:5px;" id="shippingpreference" name="shippingpreference" class="form-control" onchange="document.getElementById('shipoptiontext').value=this.options[this.selectedIndex].text" required>
    </select>
      <span style="font-size:12px;margin-bottom:20px;">*All shipping prices are based on 1lb. packages</span>
    </div>

    <input type="hidden" name="shipoptiontext" id="shipoptiontext" />




    <div id="remarks">
      <div class="form-group">
      <label for="remarks">Your Remarks&nbsp;<span style="color:red;">*</span></label>
        <textarea class="form-control" rows="5" id="remarks" name="remarks"></textarea>
      </div>      


    </div>






<!-- 
    <div class="form-group">
    <label for="shippingaddress">Shipping Address&nbsp;<span style="color:red;">*</span></label>
    <input type="text" id="shippingaddress" name="shippingaddress" class="form-control" value="<?php echo $shipaddress;?>" required />
    </div>


    <div class="row" style="margin-top:20px; ">
    <div class="col-xs-6">
      <label for="shippingcity">City</label>
      <input type="text" id="shippingcity" name="shippingcity" class="form-control" value="<?php echo $city; ?> ">
    </div>
    
    <div class="col-xs-6">
      <label for="shippingstate">State</label>
      <input type="text" id="shippingstate" name="shippingstate" class="form-control" value="<?php echo $state; ?> ">
    </div>
    </div>  

    <div class="row" style="margin-top:20px; ">
    <div class="col-xs-6">
      <label for="shippingzip">Zip Code</label>
      <input type="text" id="shippingzip" name="shippingzip" class="form-control" value="<?php echo $zipcode; ?> ">
    </div>
    
    <div class="col-xs-6">
      <label for="shippingcountry">Country</label>
      <input type="text" id="shippingcountry" name="shippingcountry" class="form-control" value="<?php echo $country; ?> ">
    </div>
    </div>  
 -->






      <div class="form-group right" style="margin-top:50px; ">
      <button type="submit" name="submitordersummary" class="btn btn-default">PROCEED TO ORDER SUMMARY</button>
      </div>
    </form>

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
    <th><strong>Quantity</strong></th>
    <th><strong>Price</strong></th>
    </tr> 
    <?php   
        foreach ($_SESSION["cart_item"] as $item){
        ?>
            <tr>
            <td><strong><?php echo $item["name"]; echo "<br/><br/><span style='color:purple;'>"; echo $item['hairtexture']; echo "<br/>"; echo $item['haircolour']; echo"<br/>"; echo $item['hairlength']; echo '"'; echo "</span>"; ?></strong></td>
            <td align="center"><?php echo $item["quantity"]; ?></td>
            <?php $cart_total_price =  $item["quantity"] * $item["price"]; ?>
            <td align=right><?php echo "$".$cart_total_price; ?></td>
            
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


    <!-- here goes the script for activating the dropdown for radio button -->

<script type="text/javascript">

$("input[type='radio'][name='selectregion']").change(function(){
    
    var selected = $("input[type='radio'][name='selectregion']:checked").val();
    
    if(selected == "West Coast Region") var opts = [
        {name:"Please Select", val:""},
        {name:"West Coast All Kits Go Ground $15", val:"15"},
        {name:"West Coast 2 Day End of Day $15", val:"15"},
        {name:"West Coast 3 Day Select $25", val:"25"},
        {name:"West Coast 2 Day AM $35", val:"35"},
        {name:"West Coast Overnight AM $50", val:"50"},
        {name:"Saturday Delivery (Call For Pricing)", val:"0"}
    ];

    else if(selected == "North East Region") var opts = [
        {name:"Please Select", val:""},
        {name:"North East Coast All Kits Go Ground $10", val:"10"},
        {name:"North East Coast Overnight AM $25", val:"25"},
        {name:"Saturday Delivery (Call For Pricing)", val:"0"}
    ];

    else if(selected == "Mid West Region") var opts = [
        {name:"Please Select", val:""},
        {name:"Mid-West All Kits Go Ground $15", val:"15"},
        {name:"Mid-West 3 Day Select $25", val:"25"},
        {name:"Mid-West 2 Day End of Day $30", val:"30"},
        {name:"Mid-West 2 Day AM $35", val:"35"},
        {name:"Mid-West Overnight End of Day $45", val:"45"},
        {name:"Mid-West Overnight AM $50", val:"50"},
        {name:"Saturday Delivery (Call For Pricing)", val:"0"}


    ];

    else if(selected == "East Coast Region") var opts = [
        {name:"Please Select", val:""},
        {name:"East Coast All Kits Go Ground $15", val:"15"},
        {name:"East Coast 3 Day Select $25", val:"25"},
        {name:"East Coast 2 Day End of Day $30", val:"30"},
        {name:"East Coast 2 Day AM $35", val:"35"},
        {name:"East Coast Overnight End of Day $45", val:"45"},
        {name:"East Coast Overnight AM $50", val:"50"},
        {name:"Saturday Delivery (Call For Pricing)", val:"0"}


    ];
    
    
    $("#shippingpreference").empty();
    
    $.each(opts, function(k,v){
        
        $("#shippingpreference").append("<option value='"+v.val+"'>"+v.name+"</option>");
        
    });
});




</script>





<!-- end of activating the dropdown shipping -->
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
