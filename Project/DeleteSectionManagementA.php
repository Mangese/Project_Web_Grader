<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    $SID = $_REQUEST["sidDelete"];
    $result = mysql_query("select source_file as file from homework h join submit su on su.h_id = h.h_id where s_id = '$SID'; ");
    while($row = mysql_fetch_assoc($result))
    {
        $F = $row["file"];
        echo " console.log('$F');";
    }
  }
?>
