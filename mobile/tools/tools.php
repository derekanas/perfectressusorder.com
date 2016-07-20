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
	//header("Location: https://www.perfectressusorder.com/mobile/transformation-conns/remy-cuticle-hair-textures.php");

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
        <a href="https://www.perfectressusorder.com/mobile/view-cart.php"><a href="https://www.perfectressusorder.com/mobile/view-cart.php"><img src="../images/cart.png"></a></a><br><br>
        <img src="../images/breadcrumbs2.jpg" class="img-autoscale">
        <h2 class="bold purple">Tools</h2>
        
        <h3>Select Item:</h3>
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="adaptability-ring.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool1.png" class="img-autoscale imgspace">
                <h3 class="center">ADAPTABILITY<br>RING<br><span class="purple">USD$54</span></h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="f-bristle-brush.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool2.png" class="img-autoscale imgspace">
                <h3 class="center">FLAT BRISTLE<br>BRUSH<br><span class="purple">USD$16</span></h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="m-bristle-brush.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool3.png" class="img-autoscale imgspace">
                <h3 class="center">MINI BRISTLE BRUSH<br><span class="purple">USD$12</span></h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="tool-belt.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool4.png" class="img-autoscale imgspace">
                <h3 class="center">TOOLS BELT<br><span class="purple">USD$34</span></h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="transformer-lw.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool15.png" class="img-autoscale imgspace">
                <h3 class="center">TRANSFORMER LW<br><span class="purple">USD$95</span></h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="reformer.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool5.png" class="img-autoscale imgspace">
                <h3 class="center">REFORMER<br><span class="purple">USD$95</span></h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="connector-l.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool6.png" class="img-autoscale imgspace">
                <h3 class="center">CONNECTOR L WITH 4 SPARE LOOPS<br><span class="purple">USD$40</span></h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="connector-loops.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool7.png" class="img-autoscale imgspace">
                <h3 class="center">CONNECTOR L LOOPS (5PCS)<br><span class="purple">USD$9</span></h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="tape-press.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool8.png" class="img-autoscale imgspace">
                <h3 class="center">TAPE PRESSING TOOL<br><span class="purple">USD$95</span></h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="tape-remove.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool9.png" class="img-autoscale imgspace">
                <h3 class="center">TAPE REMOVING TOOL (2PCS)<br><span class="purple">USD$4</span></h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="precut.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool10.png" class="img-autoscale imgspace">
                <h3 class="center">PRECUT ADHESIVE TAPES (100 PRE-CUT)<br><span class="purple">USD$40</span></h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="prefab.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool11.png" class="img-autoscale imgspace">
                <h3 class="center">PREFAB TAPES (50 PRE-FAB)<br><span class="purple">USD$40</span></h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="tape-combo.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool27.jpg" class="img-autoscale imgspace">
                <h3 class="center">TAPE COMBO PACK (50 PRE-CUT & 25 PRE-FAB)<br><span class="purple">USD$40</span></h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="double-sided.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool13.png" class="img-autoscale imgspace">
                <h3 class="center">DOUBLE SIDED ADHESIVE TAPE (1 CORE = 2 ROLLS)<br><span class="purple">USD$40</span></h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="removing-mat.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool14.png" class="img-autoscale imgspace">
                <h3 class="center">REMOVING MAT (20PCS)<br><span class="purple">USD$3</span></h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="transformer-c.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/transformer-c.jpg" class="img-autoscale imgspace">
                <h3 class="center">TRANSFORMER C<br><span class="purple">USD$95</span></h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="hair-pulling.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/hairpulling2.png" class="img-autoscale imgspace">
                <h3 class="center">HAIR PULLING LOOPS (5 PCS)<br><span class="purple">USD$9</span></h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="hair-drawing.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool16.png" class="img-autoscale imgspace">
                <h3 class="center">HAIR DRAWING TOOL (2 PCS)<br><span class="purple">USD$25</span></h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="conn-blk.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool17.png" class="img-autoscale imgspace">
                <h3 class="center">CONNECTION POINTS - BLACK (100 PCS)<br><span class="purple">USD$16</span></h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="conn-darkbrown.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool28.png" class="img-autoscale imgspace">
                <h3 class="center">CONNECTION POINTS - DARK BROWN (100 PCS)<br><span class="purple">USD$16</span></h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="conn-medbrown.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool29.png" class="img-autoscale imgspace">
                <h3 class="center">CONNECTION POINTS - MEDIUM BROWN (100 PCS)<br><span class="purple">USD$16</span></h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="conn-lgtbrown.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool30.png" class="img-autoscale imgspace">
                <h3 class="center">CONNECTION POINTS - LIGHT BROWN (100 PCS)<br><span class="purple">USD$16</span></h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="conn-blonde.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool31.png" class="img-autoscale imgspace">
                <h3 class="center">CONNECTION POINTS - BLONDE (100 PCS)<br><span class="purple">USD$16</span></h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="clip-blk.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool22.jpg" class="img-autoscale imgspace">
                <h3 class="center">PERFECT CLIPS - BLACK (5 PCS)<br><span class="purple">USD$10</span></h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="clip-darkbrown.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool26.jpg" class="img-autoscale imgspace">
                <h3 class="center">PERFECT CLIPS - DARK BROWN (5 PCS)<br><span class="purple">USD$10</span></h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="clip-medbrown.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool24.jpg" class="img-autoscale imgspace">
                <h3 class="center">PERFECT CLIPS - MEDIUM BROWN (5 PCS)<br><span class="purple">USD$10</span></h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="clip-lgtbrown.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool25.jpg" class="img-autoscale imgspace">
                <h3 class="center">PERFECT CLIPS - LIGHT BROWN (5 PCS)<br><span class="purple">USD$10</span></h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="clip-blonde.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/bigtool23.jpg" class="img-autoscale imgspace">
                <h3 class="center">PERFECT CLIPS - BLONDE (5 PCS)<br><span class="purple">USD$10</span></h3>
                </a>
              </div>
        </div><!--end-grid-a-->


        <div class="ui-grid-a">
              <div class="ui-block-a">
                <a href="velcro-strips.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/tools/big/velcro-strips-big.png" class="img-autoscale imgspace">
                <h3 class="center">VELCRO STRIPS<br><span class="purple">USD$9</span></h3>
                </a>
              </div>



        </div>
        
      </div><!--end-main-->
    
   <a href="../terms-conditions.php" data-role="footer" class="footer"><h6>Terms & Conditions</h6></a>
      <a href="../logout.php" data-role="footer" class="footer"><h6>Logout</h6></a><!--end-footer-->
     
      
    </div><!--end-page-->

</div><!--end-container-->
</body>
</html>
