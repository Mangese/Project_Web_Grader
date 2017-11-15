<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    $UID = $_SESSION["uid"];
    mysql_query("use grader;");
    $result = mysql_query("select C_ID as cid,classname as cname from class;");
    echo "var x = document.getElementById('createClass');";
    while($row = mysql_fetch_assoc($result))
    {
      $Text = $row['cname'];
      $val = $row['cid'];
      echo "var option = document.createElement('option');";
      echo "option.text = '$Text';";
      echo "option.value = '$val';";
      echo "x.add(option);";
    }
  }
?>
