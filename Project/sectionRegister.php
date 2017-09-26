<?php
  
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    $PW = $_REQUEST["Section"];
    $UID = $_SESSION["uid"];
    mysql_query("use grader;");
    $result = mysql_query("select count(*) as result,name as name,s_id as sid from section where password = '$PW' and '$UID' not in (select U_ID from register); ");
    while($row = mysql_fetch_assoc($result))
    {
      if($row["result"] > 0)
      {
      $Text = $row["name"];
      $val = $row["sid"];
      echo "var x = document.getElementById('selectClass');";
      echo "var option = document.createElement('option');";
      echo "option.text = '$Text';";
      echo "option.value = '$val';";
      echo "x.add(option);";
      }
      else
      {
      echo "alert('Invalid Password');";
      }
    }
  }
?>
