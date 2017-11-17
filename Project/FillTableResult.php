<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $SID = $_REQUEST["section"];
    $UID = $_SESSION["uid"];
    $sumProblem = mysql_query("select count(*) as sumPloblem from homework where s_id = '$SID';");
    $sumStudentInSec = mysql_query("select u_id as sumStudentInSec from register where s_id = '$SID',");  
    $RowNum = 0;

    while($row = mysql_fetch_assoc($sumProblem)){
      $sumPb = $row['sumPloblem'];
      $_SESSION["sumpb"] = $sumPb;
      echo "alert('$sumPb');";
    }

    while($row = mysql_fetch_assoc($sumStudentInSec)){
      $sumStd = $row['sumStudentInSec']
    }
  //   while($row = mysql_fetch_assoc($result))
  //   {
  //     $RowNum = $RowNum+1;
  //     $PN = $row['problemName'];
  //     $UD = $row['uploadDate'];
  //     $PQTY = $row['count1'];
  //     $SQTY = $row['count'];
  //     $LN = $row['lang']; 
  //     $FN = $row['fileName'];
  //     echo "<tr style='width:100%'>";
  //        echo "<td style='width:800px'>";
  //          echo "$PN";
  //        echo "</td>";
  //        echo "<td style='width:200px'>";
  //          echo "$LN";
  //        echo "</td>";
  //        echo "<td style='width:700px'>";
  //          echo "$SQTY";
  //        echo "</td>";
  //        echo "<td style='width:700px'>";
  //          echo "$PQTY";
  //        echo "</td>";
  //      echo "<td style='width:500px'>";
  //          echo "Assign date";
  //        echo "</td>";
  //      echo "<td style='width:500px'>";
  //          echo "Due date";
  //        echo "</td>";
  //        echo "<td style='width:200px'>";
  //          echo "<button type='button' class='btn btn-outline-secondary'>Detail</button>";
  //      echo "</tr>";
  //   }
  // }
?>
