<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    $PID = $_REQUEST["pid"];
    mysql_query("update problem set deleteflag = 'Y' where p_id = '$PID';");
  }
?>
