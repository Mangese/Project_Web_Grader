<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $CID = $_REQUEST["cidDelete"];
    $CID1 = "'".$CID."'";
    echo "alert('in DeleteClassManagementA.php uid:' + $CID1);";
  }
?>
