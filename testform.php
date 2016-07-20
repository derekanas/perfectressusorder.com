<?php

session_start();

if(!empty($_GET["action"])) {
  array_push($_SESSION['cart'], "buhok","tae");
  print_r($_SESSION['cart']);
}
?>

<form method="post" action="testform.php?action=1">

<input type="submit" value="Add to cart" class="btnAddAction" />

</form>