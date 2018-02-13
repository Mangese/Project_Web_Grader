<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $UID = $_REQUEST["uidDelete"];
    $UID1 = "'".$UID."'";
    echo "alert('in DeleteAccountManagementA.php uid:' + $UID1);";
  }
?>
