<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    
    $CID = $_REQUEST["cidreq"];
    
    $CID = "'".$CID."'";
    
    echo "alert('CID '+ $CID);";
    
    
    
    // mysql_query("use grader;");
    // mysql_query("insert into homework (P_ID,LANGUAGE,S_ID,AssignDate,AssignTime,DeadlineDate,DeadlineTime,FullMark) values ($PID,(select Language from problem where p_id = '1'),$SID,now(),now(),'$DATE','$TIME','$FULLMARK');");
  }
?>
