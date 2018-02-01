<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    
    $UID = $_REQUEST["uidreq"];
     $PID = $_REQUEST["pidreq"];
     $TM = $_REQUEST["setMark"];
     echo "alert('in php');";
    echo "alert($UID);";
    echo "alert($PID);";
    echo "alert($TM);";
    
    
    
    
    // mysql_query("use grader;");
    // mysql_query("insert into homework (P_ID,LANGUAGE,S_ID,AssignDate,AssignTime,DeadlineDate,DeadlineTime,FullMark) values ($PID,(select Language from problem where p_id = '1'),$SID,now(),now(),'$DATE','$TIME','$FULLMARK');");
  }
?>
