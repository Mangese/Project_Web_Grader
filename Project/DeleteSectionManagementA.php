<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $SID = $_REQUEST["sidDelete"];
    $SID1 = "'".$SID."'";
    echo "alert('in DeleteSectionManagementA.php sid:' + $SID1);";
  }
?>
