<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    $UID = $_SESSION["uid"];
    mysql_query("use grader;");
    $result = mysql_query("select s.s_id as sid,s.name as sectionName from user u join section s on u.u_id = s.u_id where u.u_id = '$UID' group by s.s_id;");
    echo "var x = document.getElementById('selSectionHw');";
    while($row = mysql_fetch_assoc($result))
    {
      $Text = $row['sectionName'];
      $val = $row['sid'];
      echo "var option = document.createElement('option');";
      echo "option.text = '$Text';";
      echo "option.value = '$val';";
      echo "x.add(option);";
    }
  }
    
    
