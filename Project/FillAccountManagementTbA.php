<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $TSR = $_REQUEST["typeSearch"];
    $SIDSR = $_REQUEST["sidSearch"];
    $NSR = $_REQUEST["nameSearch"];
    $result = mysql_query(" select username as userName,student_id as Student_ID,firstname as firstName,lastname as lastName,department as department,email as Email from user where user_type='$TSR' and student_id='$SIDSR' and firstname='$NSR' ;");
    while($row = mysql_fetch_assoc($result))
    {
      
      $UN = $row['userName'];
      $SID = $row['Student_ID'];
      $FN = $row['firstName'];
      $LN = $row['lastName'];
      $DM = $row['department'];
      $EM = $row['Email'];
      echo "<tr>";
      echo "<td style='width:15%'>";
      echo "$UN";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "$SID";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "$FN";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "$LN";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "$DM";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "$EM";
      echo "</td>";
      echo "<td style='width:5%'>";
      echo "edit";
      echo "</td>";
      echo "<td style='width:5%'>";
      echo "delete";
      echo "</td>";
      echo "</tr>";
    }
  }
?>
