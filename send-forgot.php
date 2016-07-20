<?php
ini_set('display_errors', 0);
session_start(); 


if(isset($_POST["forgot-submit"])){

$fname = $_POST['inputfname'];
$lname = $_POST['inputlastname'];
$tel = $_POST['inputnumber'];





}










    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "perfectressusorder@perfectress.us";
 
    $email_subject = "Forgot From Perfectress US Online Form";
  $email_from = "Forgotted Customer Details";

    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }



    $email_message .= "<strong>Forgotten Details from Order Form:</strong><br/>";
    $email_message .= "First Name: ".$fname."<br/>";
 
    $email_message .= "Last Name: ".$lname."<br/>";
 
    $email_message .= "Phone Number: ".$tel."<br/>";
 


// create email headers
$headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= "From:". $email_from . "\r\n" .
                        "Reply-To:". $email_from . "\r\n" .
                        "X-Mailer: PHP/" . phpversion();

 
 
$mail = mail($email_to, $email_subject, $email_message, $headers); 

 if($mail){
?>
<script>
alert("Your details was sent successfully. Please allow up to 3 working days to process and verify your details.")

;window.location.href = "index.php"; 
</script>

<?php
  }else{
 echo "failed."; 
  }


?>