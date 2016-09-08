<?php
ini_set('display_errors', 0);
session_start(); 
  $cn_email = $_SESSION['emailadd'];
  $cn_phone = $_SESSION['phone'];
  $cn_fname = $_SESSION['firstname'];
  $cn_lname = $_SESSION['lastname'];
  $cn_shippref = $_SESSION['optiontext'];
  $cn_shipadd = $_SESSION['address'];
  $cn_shipcity = $_SESSION['city'];
  $cn_shipstate = $_SESSION['state'];
  $cn_shipcode = $_SESSION['zipcode'];
  $cn_shipcountry = $_SESSION['country'];
  $cn_ordernumber = $_SESSION['order_number'];
  $cn_remarks = $_SESSION['remarks'];
  $cn_salonname = $_SESSION['salonname'];

  // cc details
  $cn_existingcc  = $_SESSION['existingcc'];
  $cn_inputcc = $_SESSION['inputcc'];
  $cn_cardholdername = $_SESSION['inputcardholder'];
  $cn_inputccdate = $_SESSION['inputccdate'];
  $cn_inputcvc = $_SESSION['inputcvc'];

  
  //product details

  $texture = $_SESSION["texture"]; 
  $itemcolor = $_SESSION["itemcolor"];
  $hairlength = $_SESSION["hairlength"];
  $finalamount = $_SESSION['finalamount'];




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






    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "perfectressusorderform@gmail.com";
    $autoemail_subject = "AUTO REPLY: Your Order Details From Perfectress US Online Form";
    $email_subject = "PO#:".$cn_ordernumber." Order Details From Perfectress US Online Form";
	  $email_from = "orders@perfectressusorder.com";
    $finemail_from = "finance_orders@perfectressusorder.com";
    $noreply_email = "noreply-orders@perfectressusorder.com";

    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }



    $email_message .= "<strong>Customer Details:</strong><br/>";
    $email_message .= "Email: ".$cn_email."<br/>";
 
    $email_message .= "Phone Number: ".$cn_phone."<br/>";
 
    $email_message .= "First Name: ".$cn_fname."<br/>";
 
    $email_message .= "Last Name: ".$cn_lname."<br/>";

    $email_message .= "Salon Name: ".$cn_salonname."<br/><br/>";

    $email_message .= "<strong>Shipping Details:</strong><br/>";

    $email_message .= "Shipping Preferences: ".$cn_shippref."<br/>";

    $email_message .= "Shipping Address: ".$cn_shipadd."<br/>";

    $email_message .= "Shipping City: ".$cn_shipcity."<br/>";

    $email_message .= "Shipping State: ".$cn_shipstate."<br/>";

    $email_message .= "Shipping Zipcode: ".$cn_shipcode."<br/>";

    $email_message .= "Shipping Country: ".$cn_shipcountry."<br/> ";

     $email_message .= "Remarks: ".$cn_remarks."<br/><br/>";

    $email_message .= "<strong>Payment Details:</strong><br/>";

    if(!empty($cn_existingcc)){
        $email_message .= "Existing CC? : XXXX - XXXX - XXXX -".$cn_existingcc."<br/>";
    }

   else{

    $email_message .="<strong>Credit Card Information has been sent through Finance Email</strong><br/>";
   }

  
    // $email_message .= "New CC?: ".$cn_inputcc."<br/>";
    // $email_message .= "New CC Expire Date: ".$cn_inputccdate."<br/>";
    // $email_message .= "New CC CVC: ".$cn_inputcvc."<br/>";
    // $email_message .= "New CC Cardholder Name: ".$cn_cardholdername."<br/><br/>";
    // fin.perfectressusorder@gmail.com


     $email_message .= "<strong>Products Ordered:</strong> <br/>";
     $email_message .= "Order Number: ".$cn_ordernumber."<br/>";
    foreach ($_SESSION["cart_item"] as $item){
      $email_message .= "Name: ".$item["name"]. "<br/>";
      $email_message .= "Texture: ".$item['hairtexture']. "<br/>";
      $email_message .= "Item Color: ".$item['haircolour']. "<br/>";
      $email_message .= "Hair Length: ".$item['hairlength']. "<br/>";

      $email_message .= "Quantity: ".$item["quantity"]. "<br/>";

      $email_message .= "Price: ".$item["price"]. "<br/><br/>";
      $item_total += ($item["price"]*$item["quantity"]);
     }


      $finalamount = ($_SESSION['sumshippref'] + $item_total);
      $email_message .= "<strong>Total Price:</strong>".$finalamount."";
      // $email_message .= "Total Cost:".$finalamount."<br/>";

// ===================================for fin===================================

$fin_email = "fin.perfectressusorder@gmail.com";
$fin_emailsubject= "PO#:".$cn_ordernumber." Finance Order Form Details";

  $fin_message .= "<strong>Customer Details:</strong><br/>";
    $fin_message .= "Email: ".$cn_email."<br/>";
 
    $fin_message .= "Phone Number: ".$cn_phone."<br/>";
 
    $fin_message .= "First Name: ".$cn_fname."<br/>";
 
    $fin_message .= "Last Name: ".$cn_lname."<br/>";

    $fin_message .= "Salon Name: ".$cn_salonname."<br/><br/>";

    $fin_message .= "<strong>Shipping Details:</strong><br/>";

    $fin_message .= "Shipping Preferences: ".$cn_shippref."<br/>";

    $fin_message .= "Shipping Address: ".$cn_shipadd."<br/>";

    $fin_message .= "Shipping City: ".$cn_shipcity."<br/>";

    $fin_message .= "Shipping State: ".$cn_shipstate."<br/>";

    $fin_message .= "Shipping Zipcode: ".$cn_shipcode."<br/>";

    $fin_message .= "Shipping Country: ".$cn_shipcountry."<br/> ";

     $fin_message .= "Remarks: ".$cn_remarks."<br/><br/>";

    $fin_message .= "<strong>Payment Details:</strong><br/>";

    $fin_message .= "New CC?: ".$cn_inputcc."<br/>";
    $fin_message .= "New CC Expire Date: ".$cn_inputccdate."<br/>";
    $fin_message .= "New CC CVC: ".$cn_inputcvc."<br/>";
    $fin_message .= "New CC Cardholder Name: ".$cn_cardholdername."<br/><br/>";
    // fin.perfectressusorder@gmail.com

     $fin_message .= "<strong>Products Ordered:</strong> <br/>";
     $fin_message .= "Order Number: ".$cn_ordernumber."<br/>";
    foreach ($_SESSION["cart_item"] as $item){
      $fin_message .= "Name: ".$item["name"]. "<br/>";
      $fin_message .= "Texture: ".$item['hairtexture']. "<br/>";
      $fin_message .= "Item Color: ".$item['haircolour']. "<br/>";
      $fin_message .= "Hair Length: ".$item['hairlength']. "<br/>";

      $fin_message .= "Quantity: ".$item["quantity"]. "<br/>";

      $fin_message .= "Price: ".$item["price"]. "<br/><br/>";
      $item_total += ($item["price"]*$item["quantity"]);
     }
           $finalamount = ($_SESSION['sumshippref'] + $item_total);
      $fin_message .= "<strong>Total Price:</strong>".$finalamount."";




// ================================================end of it=====================================================












//=================================AUTO RESPONDER ===============================

    $auto_message .= "<strong>Thank you for ordering in our online order form. here are your details below: </strong><br/>";  
    $auto_message .= "<strong>Your Details:</strong><br/>";
    $auto_message .= "Email: ".$cn_email."<br/>";
 
    $auto_message .= "Phone Number: ".$cn_phone."<br/>";
 
    $auto_message .= "First Name: ".$cn_fname."<br/>";
 
    $auto_message .= "Last Name: ".$cn_lname."<br/>";

    $auto_message .= "Salon Name: ".$cn_salonname."<br/><br/>";

    $auto_message .= "<strong>Your Shipping Details:</strong><br/>";

    $auto_message .= "Shipping Preferences: ".$cn_shippref."<br/>";

    $auto_message .= "Shipping Address: ".$cn_shipadd."<br/>";

    $auto_message .= "Shipping City: ".$cn_shipcity."<br/>";

    $auto_message .= "Shipping State: ".$cn_shipstate."<br/>";

    $auto_message .= "Shipping Zipcode: ".$cn_shipcode."<br/>";

    $auto_message .= "Shipping Country: ".$cn_shipcountry."<br/> ";

     $auto_message .= "Remarks: ".$cn_remarks."<br/><br/>";



     $auto_message .= "<strong>Your Products Ordered:</strong> <br/>";
     $auto_message .= "Order Number: ".$cn_ordernumber."<br/>";
    foreach ($_SESSION["cart_item"] as $item){
      $auto_message .= "Name: ".$item["name"]. "<br/>";
      $auto_message .= "Texture: ".$item['hairtexture']. "<br/>";
      $auto_message .= "Item Color: ".$item['haircolour']. "<br/>";
      $auto_message .= "Hair Length: ".$item['hairlength']. "<br/>";

      $auto_message .= "Quantity: ".$item["quantity"]. "<br/>";

      $auto_message .= "Price: ".$item["price"]. "<br/><br/>";
      $item_total += ($item["price"]*$item["quantity"]);
     }
           $finalamount = ($_SESSION['sumshippref'] + $item_total);
      $auto_message .= "<strong>Your Total Price:</strong>".$finalamount."";
      // $email_message .= "Total Cost:".$finalamount."<br/>";


//=========================== END OF AUTO RESPONDER ============================


// create email headers
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From:". $email_from . "\r\n" .
        "Reply-To:". $cn_email. "\r\n" .
        "X-Mailer: PHP/" . phpversion();



$auto_headers = 'MIME-Version: 1.0' . "\r\n";
$auto_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$auto_headers .= "From:". $noreply_email . "\r\n" .
        "Reply-To:". $cn_email. "\r\n" .
        "X-Mailer: PHP/" . phpversion();



$fin_headers = 'MIME-Version: 1.0' . "\r\n";
$fin_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$fin_headers .= "From:". $finemail_from . "\r\n" .
        "Reply-To:". $cn_email. "\r\n" .
        "X-Mailer: PHP/" . phpversion();

// if (!empty($_SESSION['inputcc'])){
// }
$auto_mail = mail($cn_email, $autoemail_subject, $auto_message, $auto_headers); 

if (!empty($_SESSION['inputcc'])){
$fin_mail = mail($fin_email, $fin_emailsubject, $fin_message, $fin_headers);
}


$mail = mail($email_to, $email_subject, $email_message, $headers); 

 if(($mail) && ($auto_mail) || ($fin_mail))
 {
?>
<script>
alert("Your message was sent successfully.")

;window.location.href = "order-complete.php"; 
</script>

<?php
  }else{
 echo "failed."; 
  }


?>