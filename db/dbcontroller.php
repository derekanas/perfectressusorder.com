<?php
class DBController {
  private $host = "localhost";
  private $user = "root";
  private $password = "";
  private $database = "perfectr_of";
  
  function __construct() {
    $conn = $this->connectDB();
    if(!empty($conn)) {
      $this->selectDB($conn);
    }
  }
  
  function connectDB() {
    $conn = mysql_connect($this->host,$this->user,$this->password);
    return $conn;
  }
  
  function selectDB($conn) {
    mysql_select_db($this->database,$conn);
  }
  
  function runQuery($query) {
    $result = mysql_query($query);
    if (!$result){
    echo 'Database error: ' . mysql_error();
    }
    while($row=mysql_fetch_assoc($result)) {
      $resultset[] = $row;
    }   
    if(!empty($resultset))
      return $resultset;
    else{
      echo "no records found";
    }
  }
  
  function numRows($query) {
    $result  = mysql_query($query);
    $rowcount = mysql_num_rows($result);
    return $rowcount; 
  }
}
?>