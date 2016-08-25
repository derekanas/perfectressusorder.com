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


<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <!-- Include the jQuery library -->
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <!-- Include the jQuery Mobile library -->
  <script src="js/jquery.mobile-1.4.5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="js/index.js"></script>
  
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
                    <li class="active"><a href="order-details.php" rel="external">SELECT PRODUCT</a></li>
                    
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
        <img src="images/cart.png"><br><br>
        <img src="images/breadcrumbs3.jpg" class="img-autoscale">
        <h2 class="bold purple">Customer Details</h2>
        
        <form action="order-summary.php" method="post" rel="external" data-ajax="false">
		
            <label for="email-add"><h3>Email Address</h3></label>
            <input type="text" readonly="readonly" name="email-add" id="email-add" class="grey-border-input" value="<?php echo $_SESSION['emailadd']; ?>">
            
            <label for="first-name"><h3>First Name</h3></label>
            <input type="text" readonly="readonly" name="first-name" id="first-name" class="grey-border-input" value="<?php echo $_SESSION['firstname']; ?>">
            
            <label for="last-name"><h3>Last Name</h3></label>
            <input type="text" readonly="readonly"  name="last-name" id="last-name" class="grey-border-input" value="<?php echo $_SESSION['lastname']; ?>">
        
			<div class="ui-grid-a">
              <div class="ui-block-a in-between-spacing">
              <label for="salon-name"><h3>Salon Name</h3></label>
              <input type="text" readonly="readonly"  name="salon-name" id="salon-name" class="grey-border-input" value="<?php echo $_SESSION['salonname']; ?>">
              </div>
              
              <div class="ui-block-b">
                <label for="tel"><h3>Phone No.</h3></label>
                <input type="tel" readonly="readonly"  name="tel" id="tel" class="grey-border-input" value="<?php echo $_SESSION['phone']; ?>">
          	  </div>
			</div><!--end-grid-a-->
        
        	<label for="shipping-address"><h3>Shipping Address</h3></label>
			<textarea cols="40" rows="4" readonly="readonly" name="shipping-address" id="shipping-address"><?php echo $_SESSION['address']; ?></textarea>
        
        	<div class="ui-grid-a">
              <div class="ui-block-a in-between-spacing">
                <label for="zip-code"><h3>Zip Code</h3></label>
                <input type="text" readonly="readonly" name="zip-code" id="zip-code" class="grey-border-input" value="<?php echo $_SESSION['zipcode']; ?>">
              </div>
              
              <div class="ui-block-b">
                <label for="city"><h3>City</h3></label>
                <input type="text" readonly="readonly" name="city" id="city" class="grey-border-input" value="<?php echo $_SESSION['city']; ?>">
                </div>
             </div><!--end-grid-a-->
             
             <div class="ui-grid-a">
              <div class="ui-block-a in-between-spacing">
                <label for="state"><h3>State</h3></label>
                <input type="text" readonly="readonly" name="state" id="state" class="grey-border-input" value="<?php echo $_SESSION['state']; ?>">
              </div>
              
              <div class="ui-block-b">
                <label for="country"><h3>Country</h3></label>
                <input type="text" readonly="readonly" name="country" id="country" class="grey-border-input" value="<?php echo $_SESSION['country']; ?>">
                </div>
             </div><!--end-grid-a-->
             
             <h2 class="bold purple">Shipping Details&nbsp;<img src="images/qnmark.png"></h2>
             
             <h3>Please select your Region <span class="red">*</span></h3>
             
             <div class="ui-grid-a">
             	<div class="ui-block-a">
            	 <label for="selectregion-wc"><input type="radio" name="selectregion" id="selectregion-wc" value="West Coast Region" required>West Coast Region</label>
                </div>
              
                <div class="ui-block-b">
        	     <label for="selectregion-ne"><input type="radio" name="selectregion" id="selectregion-ne" value="North East Region">North East Region</label>
              </div>
        	  </div><!--end-grid-a-->
              
              <div class="ui-grid-a">
             	<div class="ui-block-a">
            	 <label for="selectregion-mw" ><input type="radio" name="selectregion" id="selectregion-mw" value="Mid West Region">Mid West Region</label>
                </div>
              
                <div class="ui-block-b">
				<label for="selectregion-ec" >East Coast Region</label>
        	     <input type="radio" name="selectregion" id="selectregion-ec" value="East Coast Region">
              </div>
        	  </div><!--end-grid-a-->  
              
              
                <label for="shippingpreference"><h3>Please select your shipping preference <span class="red">*</span></h3></label>
                <select name="shippingpreference" id="shippingpreference" class="form-control" onchange="document.getElementById('shipoptiontext').value=this.options[this.selectedIndex].text" required>
                    <!--<option value="1">West Coast All Kits Go Ground $15</option>
                    <option value="2">West Coast 2 Day End of Day $15</option>
                    <option value="3">West Coast 3 Day Select $25</option>
                    <option value="3">West Coast 2 Day AM $35</option>
                    <option value="3">West Coast Overnight AM $50</option>
                    <option value="3">Saturday Delivery (Call For Pricing)</option>
                	-->
				</select>
          <h5><span class="red">*</span> All shipping prices are based on 1lb. packages</h5>


      <label for="shipping-address"><h3>Your Remarks</h3></label>
      <textarea cols="40" rows="5" name="remarks" id="remarks"></textarea>



         <input type="hidden" name="shipoptiontext" id="shipoptiontext" />
        <br>
        <button type="submit" name="submitordersummary" class="ui-btn ui-corner-all btn-purple">PROCEED TO ORDER SUMMARY</button>
        <!--<a href="customer-order-summary-details.html" rel="external" class="ui-btn ui-corner-all btn-purple">PROCEED TO ORDER SUMMARY</a>
         -->
        </form>
        
        
      </div><!--end-main-->
    
      <a href="terms-conditions.php" data-role="footer" class="footer"><h6>Terms & Conditions</h6></a>
      <a href="logout.php" data-role="footer" class="footer"><h6>Logout</h6></a>
	  <!--end-footer-->

	   </div><!--end-page-->

</div><!--end-container-->
	  
<!-- here goes the script for activating the dropdown for radio button -->
 <script type="text/javascript">
    $(":radio").click(function(){
   var radioName = $(this).attr("creditcardinfo"); //Get radio name
   $(":radio[name='"+radioName+"']").attr("disabled", true); //Disable all with the same name
    });

    </script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <script type="text/javascript">
      $("form").submit(function(e) {

    var ref = $(this).find("[required]");

    $(ref).each(function(){
        if ( $(this).val() == '' )
        {
            alert("Required field should not be blank.");

            $(this).focus();

            e.preventDefault();
            return false;
        }
    });  return true;
});


  </script>


<script type="text/javascript">
document.getElementById("selectregion-wc").onclick = function(){
	var opts = [
        {name:"Please Select", val:""},
        {name:"West Coast All Kits Go Ground $15", val:"15"},
        {name:"West Coast 2 Day End of Day $15", val:"15"},
        {name:"West Coast 3 Day Select $25", val:"25"},
        {name:"West Coast 2 Day AM $35", val:"35"},
        {name:"West Coast Overnight AM $50", val:"50"},
        {name:"Saturday Delivery (Call For Pricing)", val:"0"}
    ];
	$("#shippingpreference").empty();
    
    $.each(opts, function(k,v){
        
        $("#shippingpreference").append("<option value='"+v.val+"'>"+v.name+"</option>");
        
    });
}

document.getElementById("selectregion-ne").onclick = function(){
	var opts = [
        {name:"Please Select", val:""},
        {name:"North East Coast All Kits Go Ground $10", val:"10"},
        {name:"North East Coast Overnight AM $25", val:"25"},
        {name:"Saturday Delivery (Call For Pricing)", val:"0"}
    ];
	$("#shippingpreference").empty();
    
    $.each(opts, function(k,v){
        
        $("#shippingpreference").append("<option value='"+v.val+"'>"+v.name+"</option>");
        
    });
}

document.getElementById("selectregion-mw").onclick = function(){
	var opts = [
        {name:"Please Select", val:""},
        {name:"Mid-West All Kits Go Ground $15", val:"15"},
        {name:"Mid-West 3 Day Select $25", val:"25"},
        {name:"Mid-West 2 Day End of Day $30", val:"30"},
        {name:"Mid-West 2 Day AM $35", val:"35"},
        {name:"Mid-West Overnight End of Day $45", val:"45"},
        {name:"Mid-West Overnight AM $50", val:"50"},
        {name:"Saturday Delivery (Call For Pricing)", val:"0"}
    ];
	
	$("#shippingpreference").empty();
    
    $.each(opts, function(k,v){
        
        $("#shippingpreference").append("<option value='"+v.val+"'>"+v.name+"</option>");
        
    });
}

document.getElementById("selectregion-ec").onclick = function(){
	var opts = [
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
}

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

   
</body>
</html>
