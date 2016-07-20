<?php 
session_start();
include('global.php');

if (isset($_POST['inputsubmit'])){

$input_email = $_POST['inputemail'];
$input_lastname = $_POST['inputlastname'];

 $sql = "SELECT * FROM ".$tbname." WHERE email='".$input_email."' AND lname='".$input_lastname."'  ";
 $rst = mysql_query($sql, $connect) or die(mysql_error());


if(mysql_num_rows($rst) > 0){
$rs = mysql_fetch_assoc($rst);
$_SESSION['customername'] = $rs['Customer'];
$_SESSION['salonname'] = $rs['salonname'];
$_SESSION['firstname'] = $rs['fname'];
$_SESSION['lastname'] = $rs['lname'];
$_SESSION['salonname'] = $rs['salonname'];
$_SESSION['address'] = $rs['address'];
$_SESSION['emailadd'] = $rs['email'];
$_SESSION['phone'] = $rs['phone'];
$_SESSION['state'] = $rs['state'];
$_SESSION['city'] = $rs['city'];
$_SESSION['zipcode'] = $rs['zipcode'];
$_SESSION['country'] = $rs['country'];
header("Location: customer-details.php");
die();
}
else{ ?>
<script>
alert("Login Failed!")

;window.location.href = "index.php"; 
</script>

<?php
}
}
?>