<?php session_start();?>
<?php

$emailfrmsession = $_SESSION['emailadd'];
$phonefrmsession = $_SESSION['phone'];
$firstnamefrmsession = $_SESSION['firstname'];
$lastnamefrmsession = $_SESSION['lastname'];

$hairsize = $_SESSION['hairsize'];
$hairlength = $_SESSION['hairlength'];
$texture = $_SESSION['texture'] ;//Silky Straight , Natural Body , Body Wave

//grey 
if($hairlength == '10'){
    echo '<style type="text/css">
#dark-grey,
#medium-grey,
#light-grey,
#lightest-grey,
#silver-grey,
#pepper-salt,
#salt-pepper{

display:block !important;


  }
        </style>';


}


else{
    echo '<style type="text/css">
#dark-grey,
#medium-grey,
#light-grey,
#lightest-grey,
#silver-grey,
#pepper-salt,
#salt-pepper{

display:none !important;


  }
        </style>';


}
//grey


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
        <h2 class="bold purple">Perfectress Tape Weft - Perfectress Remy Cuticle Hair</h2>
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<img src="https://www.perfectressusorder.com/img/mainpic/tapeweft1.jpg" width="219" class="img-autoscale" border="1" style="border-color:#E5E3E3;">
              </div>
              
              <div class="ui-block-b">
              	<img src="https://www.perfectressusorder.com/img/mainpic/tapeweft2.jpg" width="219" class="img-autoscale" border="1" style="border-color:#E5E3E3;">
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
              	<a href="jet-blk.php" rel="external"><img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor1.png" class="img-autoscale imgspace">
                <h3 class="center">JET BLACK<br>#1</h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="off-blk.php" rel="external"><img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor2.png" class="img-autoscale imgspace">
                <h3 class="center">OFF BLACK<br>#1B</h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="darkest-bwn.php" rel="external"><img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor3.png" class="img-autoscale imgspace">
                <h3 class="center">DARKEST BROWN<br>#2</h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="darkest-bwn-red-tone.php" rel="external"><img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor4.png" class="img-autoscale imgspace">
                <h3 class="center">DARKEST BROWN - RED TONE<br>#2R</h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="dark-bwn.php" rel="external"><img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor5.png" class="img-autoscale imgspace">
                <h3 class="center">DARK BROWN<br>#3 </h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="brown.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor6.png" class="img-autoscale imgspace">
                <h3 class="center">BROWN<br>#4</h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="bwn-red-tone.php" rel="external"><img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor7.png" class="img-autoscale imgspace">
                <h3 class="center">BROWN - RED TONE<br>#4R</h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="med-bwn.php" rel="external"><img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor8.png" class="img-autoscale imgspace">
                <h3 class="center">MEDIUM BROWN<br>#6</h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="med-bwn-ash-tone.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor9.png" class="img-autoscale imgspace">
                <h3 class="center">MEDIUM BROWN - ASH TONE<br>#6A</h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="med-bwn-red-tone.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor10.png" class="img-autoscale imgspace">
                <h3 class="center">MEDIUM BROWN -<br>RED TONE<br>#6R</h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="chestnut-bwn.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor11.png" class="img-autoscale imgspace">
                <h3 class="center">CHESTNUT BROWN<br>#8</h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="light-bwn.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor12.png" class="img-autoscale imgspace">
                <h3 class="center">LIGHT BROWN<br>#10</h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="golden-bwn.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor13.png" class="img-autoscale imgspace">
                <h3 class="center">GOLDEN BROWN<br>#12</h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="wheat-bwn.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor14.png" class="img-autoscale imgspace">
                <h3 class="center">WHEAT BROWN<br>#14</h3>
              </div>
              </a>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="honey-blonde.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor15.png" class="img-autoscale imgspace">
                <h3 class="center">HONEY BLONDE<br>#16</h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="ash-bwn.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor16.png" class="img-autoscale imgspace">
                <h3 class="center">ASH BROWN<br>#17A</h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="lgt-ash-bwn.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor17.png" class="img-autoscale imgspace">
                <h3 class="center">LIGHT ASH BROWN<br>#18</h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="lgtst-ash-bwn.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor18.png" class="img-autoscale imgspace">
                <h3 class="center">LIGHTEST ASH BROWN<br>#21A</h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="ash-blonde.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor19.png" class="img-autoscale imgspace">
                <h3 class="center">ASH BLONDE<br>#22</h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="golden-blonde.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor20.png" class="img-autoscale imgspace">
                <h3 class="center">GOLDEN BLONDE<br>#24</h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="blonde.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor21.png" class="img-autoscale imgspace">
                <h3 class="center">BLONDE<br>#25</h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="honey-bwn.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor22.png" class="img-autoscale imgspace">
                <h3 class="center">HONEY BROWN<br>#28</h3>
                </a>
              </div>
        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
              	<a href="aub-red-tone.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor23.png" class="img-autoscale imgspace">
                <h3 class="center">AUBURN - RED TONE<br>#30R</h3>
                </a>
              </div>
              
              <div class="ui-block-b">
              	<a href="dp-aub-red-tone.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor24.png" class="img-autoscale imgspace">
                <h3 class="center">DEEP AUBURN - RED TONE<br>#33R</h3>
                </a>
              </div>
        </div><!--end-grid-a-->




        <div class="ui-grid-a">
              <div class="ui-block-a" id="dark-grey">
                <a href="dark-grey.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/36-big.jpg" class="img-autoscale imgspace">
                <h3 class="center">DARK GREY<br>#36</h3>
                </a>
              </div>
              
              <div class="ui-block-b" id="medium-grey">
                <a href="medium-grey.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/44-big.jpg" class="img-autoscale imgspace">
                <h3 class="center">MEDIUM GREY<br>#44</h3>
                </a>
              </div>
        </div><!--end-grid-a-->




        <div class="ui-grid-a">
              <div class="ui-block-a" id="light-grey">
                <a href="light-grey.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/51-big.jpg" class="img-autoscale imgspace">
                <h3 class="center">LIGHT GREY<br>#51</h3>
                </a>
              </div>
              
              <div class="ui-block-b" id="lightest-grey">
                <a href="lightest-grey.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/56-big.jpg" class="img-autoscale imgspace">
                <h3 class="center">LIGHTEST GREY<br>#56</h3>
                </a>
              </div>
        </div><!--end-grid-a-->








        
        <div class="ui-grid-a">
              <div class="ui-block-a" id="silver-grey">
                <a href="silver-grey.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/60s-big.jpg" class="img-autoscale imgspace">
                <h3 class="center">SILVER GREY<br>#60S</h3>
                </a>
              </div>

              <div class="ui-block-b">
              	<a href="burgundy.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor25.png" class="img-autoscale imgspace">
                <h3 class="center">BURGUNDY<br>#138</h3>
                </a>
              </div>
              

        </div><!--end-grid-a-->
        <div class="ui-grid-a">
              <div class="ui-block-a" id="pepper-salt">
                <a href="pepper-salt.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/280-big.jpg" class="img-autoscale imgspace">
                <h3 class="center">PEPPER & SALT<br>#280</h3>
                </a>
              </div>



              <div class="ui-block-b" id="salt-pepper">
                <a href="salt-pepper.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/283-big.jpg" class="img-autoscale imgspace">
                <h3 class="center">SALT & PEPPER<br>#283</h3>
                </a>
              </div>



        </div><!-- end-grid-a -->



        
        <div class="ui-grid-a">

              <div class="ui-block-a">
                <a href="lgt-ash-blonde.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor26.png" class="img-autoscale imgspace">
                <h3 class="center">LIGHT ASH BLONDE<br>#612</h3>
                </a>
              </div>


              <div class="ui-block-b">
              	<a href="lgtst-blonde.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor27.png" class="img-autoscale imgspace">
                <h3 class="center">LIGHTEST BLONDE<br>#613</h3>
                </a>
              </div>
              

        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">


              <div class="ui-block-a">
                <a href="lgt-blonde.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor28.png" class="img-autoscale imgspace">
                <h3 class="center">LIGHT BLONDE<br>#613B</h3>
                </a>
              </div>



              <div class="ui-block-b">
              	<a href="bl-bwn.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor29.png" class="img-autoscale imgspace">
                <h3 class="center">BLEACHED BROWN<br>#B4</h3>
                </a>
              </div>
              

        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">

              <div class="ui-block-a">
                <a href="bl-med-bwn.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor30.png" class="img-autoscale imgspace">
                <h3 class="center">BLEACHED MEDIUM BROWN<br>#B6</h3>
                </a>
              </div>


              <div class="ui-block-b">
              	<a href="bl-lgt-bwn.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor31.png" class="img-autoscale imgspace">
                <h3 class="center">BLEACHED LIGHT BROWN<br>#B7</h3>
                </a>
              </div>
              

        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">

              <div class="ui-block-a">
                <a href="bl-blonde.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor32.png" class="img-autoscale imgspace">
                <h3 class="center">BLEACHED BLONDE<br>#B9</h3>
                </a>
              </div>
              <div class="ui-block-b">
              	<a href="bl-med-blonde.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor33.png" class="img-autoscale imgspace">
                <h3 class="center">BLEACHED MEDIUM BLONDE<br>#B11</h3>
                </a>
              </div>
              

        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">

              <div class="ui-block-a">
                <a href="bl-lgt-blonde.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor34.png" class="img-autoscale imgspace">
                <h3 class="center">BLEACHED LIGHT BLONDE<br>#B15</h3>
                </a>
              </div>

              <div class="ui-block-b">
              	<a href="off-blk-bgdy.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor35.png" class="img-autoscale imgspace">
                <h3 class="center">OFF BLACK / BURGUNDY<br>#1B/138</h3>
                </a>
              </div>
              

        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
                <a href="db-red-tone-mb.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor36.png" class="img-autoscale imgspace">
                <h3 class="center">DARKEST BROWN - RED TONE / MEDIUM BROWN<br>#2R/6</h3>
                </a>
              </div>
              <div class="ui-block-b">
              	<a href="db-cnut-bwn.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor37.png" class="img-autoscale imgspace">
                <h3 class="center">DARK BROWN / CHESTNUT BROWN<br>#3/8</h3>
                </a>
              </div>
              

        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">

              <div class="ui-block-a">
                <a href="mb-red-tone-lb.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor38.png" class="img-autoscale imgspace">
                <h3 class="center">MEDIUM BROWN - RED TONE / LIGHT BROWN<br>#6R/10</h3>
                </a>
              </div>


              <div class="ui-block-b">
              	<a href="cnut-bwn-blonde.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor39.png" class="img-autoscale imgspace">
                <h3 class="center">CHESTNUT BROWN / BLONDE<br>#8/25</h3>
                </a>
              </div>
              

        </div><!--end-grid-a-->
        



        <div class="ui-grid-a">

              <div class="ui-block-a">
                <a href="gld-bwn-gld-blonde.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor40.png" class="img-autoscale imgspace">
                <h3 class="center">GOLDEN BROWN / GOLDEN BLONDE<br>#12/24</h3>
                </a>
              </div>
              <div class="ui-block-b">
              	<a href="gld-bwn-lgtst-blonde.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor41.png" class="img-autoscale imgspace">
                <h3 class="center">GOLDEN BROWN / LIGHTEST BLONDE<br>#12/613</h3>
                </a>
              </div>
              

        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">

              <div class="ui-block-a">
                <a href="wheat-bwn-gld-bld.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor42.png" class="img-autoscale imgspace">
                <h3 class="center">WHEAT BROWN / GOLDEN BLONDE<br>#14/24</h3>
                </a>
              </div>
              <div class="ui-block-b">
              	<a href="lgt-ab-ash-blonde.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor43.png" class="img-autoscale imgspace">
                <h3 class="center">LIGHT ASH BROWN / ASH BLONDE<br>#18/22</h3>
                </a>
              </div>
              

        </div><!--end-grid-a-->
        
        <div class="ui-grid-a">
              <div class="ui-block-a">
                <a href="ash-blonde-lb.php" rel="external">
                <img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor44.png" class="img-autoscale imgspace">
                <h3 class="center">ASH BLONDE / LIGHTEST BLONDE<br>#22/613</h3>
                </a>
              </div>

              <div class="ui-block-b">
              	<a href="gb-lgtst-blonde.php" rel="external">
              	<img src="https://www.perfectressusorder.com/img/rren-transconn/color/big/bigcolor45.png" class="img-autoscale imgspace">
                <h3 class="center">GOLDEN BLONDE / LIGHTEST BLONDE<br>#24/613</h3>
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