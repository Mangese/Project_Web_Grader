<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $SID = $_REQUEST["section"];

    $sumPb = mysql_query("select count(*) as sumPloblem from homework where s_id = '$SID';");    

    $_SESSION["user"] = $UN;
  }
?>