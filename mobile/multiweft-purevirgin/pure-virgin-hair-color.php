<?php session_start();?>
<?php

$emailfrmsession = $_SESSION['emailadd'];
$phonefrmsession = $_SESSION['phone'];
$firstnamefrmsession = $_SESSION['firstname'];
$lastnamefrmsession = $_SESSION['lastname'];

$hairsize = $_SESSION['hairsize'];
$hairlength = $_SESSION['hairlength'];
$texture = $_SESSION['texture'] ;//Silky Straight , Natural Body , Body Wave
// make sure user is logged in
if (!$_SESSION['emailadd']) {
    $loginError = "You are not logged in.";
    include("index.php");
    exit();
}
/*
$itemcolor = $_POST['item-colour'];# 1
$escitemcolor = mysql_escape_string($itemcolor); 
$_SESSION['itemcolor'] = $escitemcolor;
*/
//setting of the catergories


?>	
<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <!-- Include the jQuery library -->
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <!-- Include the jQuery Mobile library -->
  <script src="../js/jquery.mobile-1.4.5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="../js/index.js"></script>
  <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
  
  <meta charset="UTF-8">
<title>Perfectress US Order Form</title>
</head>
<body>
<div id="container">

    <div data-role="page">
      
      <div data-role="header" class="header">
        
            <img src="https://www.perfectressusorder.com/img/logo.png" width="250" align="left" class="logo">
    
            <nav id="cssmenu">
                <div id="head-mobile"></div>
                <div class="button"></div>
                <ul>
                    <li class="active"><a href="../order-details.php" rel="external">SELECT PRODUCT</a></li>
                    
                    <li><a href="#">CHART</a>
                      <ul>
                        <li><a href="https://www.perfectressusorder.com/pdf/perfectress-us-availability-chart-hair.pdf" target="_blank">HAIR PRODUCT AVAILABITY CHART ></a></li>
                        <li><a href="https://www.perfectressusorder.com/pdf/perfectress-us-availability-chart-tools.pdf" target="_blank">TOOLS PRODUCT AVAILABITY CHART ></a></li>
                       </ul>
                    </li>
                </ul>
            </nav>
    
      </div><!--end-header-->
      
      <div data-role="main" class="ui-content content">
        <a href="https://www.perfectressusorder.com/mobile/view-cart.php"><img src="../images/cart.png"></a><br><br>
        <img src="../images/breadcrumbs2.jpg" class="img-autoscale">
        <h2 class="bold purple">Perfectress Multi Weft - Perfectress Pure Virgin Hair</h2>
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<img src="https://www.perfectressusorder.com/img/mainpic/multiweft2.jpg" width="219" class="img-autoscale" border="1" style="border-color:#E5E3E3;">
              </div>
              
              <div class="ui-block-b">
              	<img src="https://www.perfectressusorder.com/img/mainpic/multiweft1.jpg" width="219" class="img-autoscale" border="1" style="border-color:#E5E3E3;">
              </div>
        </div><!--end-grid-a-->
        
        <form>
        <div class="ui-grid-a">
              <div class="ui-block-a in-between-spacing">
              	<label for="hair-length"><h3>Hair Length</h3></label>
     			<input type="text" readonly="readonly" name="hair-length" id="hair-length" value="<?php echo $hairlength; ?>" class="grey-border-input">
              </div>
              
              <div class="ui-block-b">
              	<label for="size"><h3>Size</h3></label>
     			<input type="text" readonly="readonly" name="size" id="size" value="<?php echo $hairsize; ?>" class="grey-border-input">
              </div>
        </div><!--end-grid-a-->
        
        <label for="hair-texture"><h3>Hair Texture</h3></label>
    	<input type="text" readonly="readonly" name="hair-texture" id="hair-texture" value="<?php echo $texture; ?>" class="grey-border-input"  />
        </form>
        
        
        <h3>Select Hair Color:</h3>
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="natural-color.php" rel="external"><img src="https://www.perfectressusorder.com/img/pvh-transconn/color/color1.png" class="img-autoscale imgspace">
                <h3 class="center">NATURAL COLOR<br>#NC</h3>
                </a>
              </div>
        </div><!--end-grid-a-->
       
      </div><!--end-main-->
    
      <a href="../terms-conditions.php" data-role="footer" class="footer"><h6>Terms & Conditions</h6></a>
      <a href="../logout.php" data-role="footer" class="footer"><h6>Logout</h6></a><!--end-footer-->
      
      
    </div><!--end-page-->

</div><!--end-container-->
</body>
</html>