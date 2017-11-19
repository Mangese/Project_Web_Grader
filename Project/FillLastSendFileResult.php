<?php
$conn = mysql_connect("localhost","mangese","000000");
if($conn != FALSE)
{
  session_start();
  mysql_query("use grader;");
  mysql_query("set NAMES UTF8;");
//   $CID = $_REQUEST["sectionreq"];
  $UID = $_REQUEST["uidreq"];
  $HID = $_REQUEST["hidreq"];
  // $UID = $_SESSION["uid"];
  $result = mysql_query("select su.u_id,su.h_id,p.remark,su.status,concat(su.submit_date,' ',su.submit_time) as submit,su.source_file from submit su join homework h on su.h_id = h.h_id join problem p on h.p_id = p.p_id join section s on h.s_id = s.s_id where su.u_id ='$UID' and su.h_id = '$HID' order by submit desc limit 3;");
  $RowNum = 0;
  while($row = mysql_fetch_assoc($result))
  {
    $FN = $row['source_file'];
    $STA = $row['status'];
    $ST = $row['submit'];
    echo "<tr>";
    
    echo "<td style='width:35%'>";
    echo "$FN";
    echo "</td>";
    echo "<td style='width:35%'>";
    echo "$ST";
    echo "</td>";
    echo "<td style='width:35%'>";
    echo "$STA";
    echo "</td>";
   
    echo "</tr>";
  }
}
?>
