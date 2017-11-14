<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $CID = $_REQUEST["class"];
    $UID = $_SESSION["uid"];
    $result = mysql_query("select p.Remark as problemName,p.UploadDate as uploadDate,p.language as lang,(case when (select count(*) from (select count(*),h_id,u_id from submit group by u_id,h_id) t where h_id = h.h_id group by h_id) is null then '0' else (select count(*) from (select count(*),h_id,u_id from submit group by u_id,h_id) t where h_id = h.h_id group by h_id) end) as count ,(case when (select count(*) from (select count(*),h_id,u_id,status from submit where status ='P' group by u_id,h_id) t where status = 'P' and h_id = h.h_id group by h_id) is null then '0' else (select count(*) from (select count(*),h_id,u_id,status from submit where status ='P' group by u_id,h_id) t where status = 'P' and h_id = h.h_id group by h_id) end)as count1 from homework h join problem p on p.p_id = h.p_id join user u on u.u_id = p.u_id join class c on c.c_id = p.c_id  where p.u_id = '$UID'  and h.s_id = '$CID' group by h.h_id;");  
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
      echo "<tr style="width:100%">";
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
