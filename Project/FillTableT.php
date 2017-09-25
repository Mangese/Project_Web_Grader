<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $CID = $_REQUEST["class"];
    $UID = $_SESSION["uid"];
    $result = mysql_query("select p.Remark as problemName,p.UploadDate as uploadDate,p.language as lang from problem p join user u on u.u_id = p.u_id join class c on c.c_id = p.c_id where p.u_id = '$UID' and p.c_id = '$CID';");
    $RowNum = 0;
    while($row = mysql_fetch_assoc($result))
    {
      $RowNum = $RowNum+1;
      $PN = $row['problemName'];
      $UD = $row['uploadDate'];
      $LN = $row['lang'];
      echo "<tr>";
      echo "<td style='width:40%'>";
      echo "$PN";
      echo "</td>";
      echo "<td style='width:20%'>";
      echo "$UD";
      echo "</td>";
      echo "<td style='width:20%'>";
      echo "$LN";
      echo "</td>";
      echo "</tr>";
    }
  }
?>
