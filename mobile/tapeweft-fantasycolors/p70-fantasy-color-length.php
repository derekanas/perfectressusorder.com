<?php session_start();?>
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

if (isset($_POST['addtocart1'])){
	$hairlength = $_POST['input-hair-length'];
	$hairsize = $_POST['input-hair-size'];
	$_SESSION['hairsize'] = $hairsize;
	$_SESSION['hairlength'] = $hairlength;
	header("Location: https://www.perfectressusorder.com/mobile/tapeweft-fantasycolors/p70-fantasy-color-textures.php");

}//end of the spost addtocart
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
        <h2 class="bold purple">Perfectress Tape Weft - Perfectress Remy Cuticle Hair P70</h2>
        
        <form method="post" id="addtocartform1" name="addtocartform1" action="p70-fantasy-color-length.php?action=add&code=<?php echo "RREN" ?>" onsubmit="return validateForm()"  rel="external" data-ajax="false">
            <div class="ui-field-contain">
                <label for="hair-length"><h3>Select Hair Length:</h3></label>
                <select name="input-hair-length" id="hair-length">
                    <option value="14">14"</option>
                    <option value="18">18"</option>
                </select>
            </div>
            
            <div class="ui-field-contain">
                <label for="hair-size"><h3>Size</h3></label>
           <!--  	<input type="text" name="input-hair-size" id="hair-size" value="Single Plus (1 pack - 8pcs)" class="grey-border-input"> -->
                <select name="input-hair-size" id="hair-size">
                    <option value="SINGLEPLUS">Single Plus (1 pack - 8pcs)</option>
                </select>
            </div>
			<button type="submit" form="addtocartform1" name="addtocart1" class="ui-btn ui-corner-all btn-purple">NEXT ></button>
            <a href="../order-details.php" rel="external" class="ui-btn ui-corner-all btn-grey">GO BACK</a>

		</form>
        
        <br>
        <!--
        <a href="p70-fantasy-color-textures.html" rel="external" class="ui-btn ui-corner-all btn-purple">NEXT ></a>
        -->
      </div><!--end-main-->
    
     <a href="../terms-conditions.php" data-role="footer" class="footer"><h6>Terms & Conditions</h6></a>
      <a href="../logout.php" data-role="footer" class="footer"><h6>Logout</h6></a><!--end-footer-->
     
      
    </div><!--end-page-->

</div><!--end-container-->
</body>
</html>
