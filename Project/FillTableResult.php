<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $CID = $_REQUEST["class"];
    $UID = $_SESSION["uid"];
    $sum = mysql_query("select count(*) from homework where s_id = '111';");
    $result2 = mysql_query("select su.status,u.name from submit su join user u on u.u_id = su.u_id");  
    $RowNum = 0;
    while($row = mysql_fetch_assoc($result))
    {
      $RowNum = $RowNum+1;
      $PN = $row['problemName'];
      $UD = $row['uploadDate'];
      $PQTY = $row['count1'];
      $SQTY = $row['count'];
      $LN = $row['lang'];
      $FN = $row['fileName'];
      echo "<tr style='width:100%'>";
         echo "<td style='width:800px'>";
           echo "$PN";
         echo "</td>";
         echo "<td style='width:200px'>";
           echo "$LN";
         echo "</td>";
         echo "<td style='width:700px'>";
           echo "$SQTY";
         echo "</td>";
         echo "<td style='width:700px'>";
           echo "$PQTY";
         echo "</td>";
       echo "<td style='width:500px'>";
           echo "Assign date";
         echo "</td>";
       echo "<td style='width:500px'>";
           echo "Due date";
         echo "</td>";
         echo "<td style='width:200px'>";
           echo "<button type='button' class='btn btn-outline-secondary'>Detail</button>";
       echo "</tr>";
    }
  }
?>
