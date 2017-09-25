<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $CID = $_REQUEST["class"];
    $UID = $_SESSION["uid"];
    $result = mysql_query("select p.Remark as problemName,p.UploadDate as uploadDate,p.language as lang,(select count((select count(*) from submit where h_id = h.h_id group by u_id,h_id))) as count,(select count(*) from submit where h_id = h.h_id and status = 'P' group by u_id,h_id) as count1 from homework h join problem p on p.p_id = h.p_id join user u on u.u_id = p.u_id join class c on c.c_id = p.c_id  where p.u_id = '$UID' and p.c_id = '$CID' group by h.h_id;");
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
      echo "<tr>";
         echo "<td style='width:20%''>";
           echo "$PN";
         echo "</td>";
         echo "<td style='width:20%'>";
           echo "$LN";
         echo "</td>";
         echo "<td style='width:20%'>";
           echo "$SQTY";
         echo "</td>";
         echo "<td style='width:20%'>";
           echo "$PQTY";
         echo "</td>";
         echo "<td style='width:20%'>";
           echo "<button type='button' class='btn btn-outline-secondary'>Detail</button>";
       echo "</tr>";
    }
  }
?>
