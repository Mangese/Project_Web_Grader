<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $Section = $_REQUEST["Section"];
    $UID = $_SESSION["uid"];
    $result = mysql_query("select h.h_id as pid,p.Remark as problemName,p.Language as language,p.File_Name as fileName,concat(h.deadlinedate,' ',h.deadlinetime) as deadline,count(su.u_id) as num  ,(case when (select status from submit where su.H_ID = H_id and u_id = '$UID' and status = 'P' limit 1) is null then 'F' else 'P' end)  as status from homework h join section s on h.S_ID = s.S_ID join problem p on p.P_ID = h.P_ID left join submit su on su.H_ID = h.H_ID and su.u_id = '$UID'  where s.S_ID = '$Section' and h.deleteflag is null and p.deleteflag is null group by h.h_id order by h.h_id;");
    $RowNum = 0;
    while($row = mysql_fetch_assoc($result))
    {
      $RowNum = $RowNum+1;
      echo "<tr>";
      echo "<td style='width:6%'>";
      echo "$RowNum";
      echo "</td>";
      echo "<td style='width:27%' class = 'use'>";
      $PN = $row['problemName'];
      $LANG = $row['language'];
      $FN = $row['fileName'];
      $PID = $row['pid'];
      $QTY = $row['num'];
      $DD = $row['deadline'];
      echo "<a href = 'Problem/$FN' target = '_blank'>$PN</a>";
      echo "</td>";
echo "<td style='width:22%'>";
      echo "$DD";
      echo "</td>";
      echo "<td style='width:21%'>";
      echo "$QTY";
      echo "</td>";
      echo "<td style='width:11%'>";
      $Status = $row['status'];
      if(!strcmp($Status, "F"))
      {
        echo "Fail";
      }
      else
      {
        echo "Pass";
      }
      echo "</td>";
      echo "<td style='width:13%'>";
      if(!strcmp($Status, "F"))
      {
         echo "<button type='button' class='btn btn-outline-secondary'  onclick = 'ModalHeaderFunc(this,$PID,$QTY);' data-toggle='modal' ";
      }
      else
      {
         echo "<button type='button' class='btn btn-outline-secondary'  ";
      }
     
      echo "data-target='#test1'>Upload</button>";
      echo "</td>";
      echo "</tr>";
    }
  }
?>
