<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    $UID = $_SESSION["uid"];
    $TXT = $_REQUEST["text"];
    $CID = $_REQUEST["class"];
    mysql_query("use grader;");
    $result = mysql_query("insert into section value('',(select concat(substring('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', rand()*62+1, 1),substring('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', rand()*62+1, 1), substring('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', rand()*62+1, 1),        substring('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', rand()*62+1, 1),    substring('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', rand()*62+1, 1),    substring('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', rand()*62+1, 1),  substring('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', rand()*62+1, 1),  substring('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', rand()*62+1, 1)   )),$CID,$UID,'$TXT');");
    $RS = mysql_error($result);
    echo "<script> alert('$RS'); </script>";
  }
    
    
