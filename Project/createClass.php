<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    $UID = $_SESSION["uid"];
    $TXT = $_REQUEST["text"];
    $CID = $_REQUEST["class"];
    mysql_query("use grader;");
    $result = mysql_query("insert into section value('','test',$CID,$UID,'$TXT');");
    $RS = mysql_error($result);
    echo "<script> alert('$RS'); </script>"
  }
    
    
