<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    $HID = $_REQUEST["hid"];
    mysql_query("update homework set deleteflag = 'Y' where h_id = '$HID';");
  }
?>
