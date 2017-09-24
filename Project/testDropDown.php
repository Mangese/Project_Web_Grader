<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    $UID = $_SESSION["uid"];
    mysql_query("use grader;");
    $result = mysql_query("select s.name as sectionName,s.S_ID as sectionId from register r join section s on r.s_id = s.s_id join user u on u.u_id = r.u_id where u.u_id = '$UID';");
    echo "var x = document.getElementById("selectClass");";
    while($row = mysql_fetch_assoc($result))
    {
      $Text = $row['sectionName'];
      $val = $row['sectionId'];
      echo "var option = document.createElement('option');";
      echo "option.text = '$Text';";
      echo "option.value = '$val';";
      echo "x.add(option);";
    }
  }
    
    
?>
