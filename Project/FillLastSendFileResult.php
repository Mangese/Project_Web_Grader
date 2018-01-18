<?php
$conn = mysql_connect("localhost","mangese","000000");
if($conn != FALSE)
{
  session_start();
  mysql_query("use grader;");
  mysql_query("set NAMES UTF8;");
  $UID = $_REQUEST["uidreq"];
  $HID = $_REQUEST["hidreq"];
  // $UID = $_SESSION["uid"];
  $result = mysql_query("select su.u_id,su.h_id,p.remark,su.status,su.submit_date,su.submit_time,su.source_file from submit su join homework h on su.h_id = h.h_id join problem p on h.p_id = p.p_id join section s on h.s_id = s.s_id where su.u_id ='$UID' and su.h_id = '$HID' order by submit_date,submit_time desc limit 3;");
  $fileDownload = mysql_query("");
  $RowNum = 0;
  while($row = mysql_fetch_assoc($result))
  {
    $Target = "File/";
    $FN = $row['source_file'];
    $STA = $row['status'];
    $SD = $row['submit_date'];
    $ST = $row['submit_time'];
    $RowNum =  $RowNum + 1 ;
    echo "<tr>";
    echo "<td style='width:7%'>";
    echo "$RowNum";
    echo "</td>";
    echo "<td style='width:23%'>";
    echo "$SD";
    echo "</td>";
    echo "<td style='width:23%'>";
    echo "$ST";
    echo "</td>";
    echo "<td style='width:14%'>";
    echo "$STA";
    echo "</td>";
    echo "<td style='width:15%'>";
    echo "Test case";
    echo "</td>";
    echo "<td style='width:18%'>";
    echo "<a href='$Target$FN' download><i class='fa fa-download' aria-hidden='true'></i></a>";
    echo "</td>";
   
    echo "</tr>";
  }
  echo "<input type='text' placeholder='Mark'>";
  echo "tttttt";
}

?>
