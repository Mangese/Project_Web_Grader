<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    $UID = $_SESSION["uid"];
    mysql_query("use grader;");
    $result = mysql_query("select c.c_id as cid,c.ClassName as className from user u join section s on u.u_id = s.u_id join class c on s.c_id = c.c_id where u.u_id = '$UID' group by c.c_id;");
    echo "var x = document.getElementById('selectClass');";
    while($row = mysql_fetch_assoc($result))
    {
      $Text = $row['className'];
      $val = $row['cid'];
      echo "var option = document.createElement('option');";
      echo "option.text = '$Text';";
      echo "option.value = '$val';";
      echo "x.add(option);";
    }
  }
    
    
?>
