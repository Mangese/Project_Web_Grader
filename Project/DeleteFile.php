<?php
  $F = $_REQUEST["file"];
  $conn = mysql_connect("localhost","mangese","000000");
if($conn != FALSE)
{
  echo "alert('$F');";
  mysql_query("delete from submit where source_file = '$F';");
  exec("rm File/$F ");
}
?>
