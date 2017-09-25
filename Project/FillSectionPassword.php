<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $CID = $_REQUEST["class"];
    $result = mysql_query("select password as password from section where s_id = '$UID';");
    $RowNum = 0;
    while($row = mysql_fetch_assoc($result))
    {
      $PW = $row['password'];
      echo $PW;
    }
  }
?>
