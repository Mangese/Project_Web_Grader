<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    
    $UID = $_REQUEST["uidreq"];
    $FN = $_REQUEST["fnamereq"];
    $LN = $_REQUEST["lnamereq"];
    $UN = $_REQUEST["unamereq"];

    $SID = $_REQUEST["sidreq"];
    $DP = $_REQUEST["departreq"];
    $EM = $_REQUEST["emailreq"];
    $PW = $_REQUEST["passreq"];

    $UID = "'".$UID."'";
    $FN = "'".$FN."'";
    $LN = "'".$LN."'";
    $UN = "'".$UN."'";
    
    $SID = "'".$SID."'";
    $DP = "'".$DP."'";
    $EM = "'".$EM."'";
    $PW = "'".$PW."'";

    // echo "alert('uid '+ $UID);";
    // echo "alert('fname '+ $FN);";
    // echo "alert('lname '+ $LN);";
    // echo "alert('uname '+ $UN);";

    // echo "alert('sid '+ $SID);";
    // echo "alert('dp '+ $DP);";
    // echo "alert('email '+ $EM);";
    // echo "alert('PW '+ $PW);";
    
    $tor="1111";
    ."22222";
    //  mysql_query("use grader;");
     if ($UID!=''){
      echo "alert($tor);";
     }
     
    // mysql_query("insert into homework (P_ID,LANGUAGE,S_ID,AssignDate,AssignTime,DeadlineDate,DeadlineTime,FullMark) values ($PID,(select Language from problem where p_id = '1'),$SID,now(),now(),'$DATE','$TIME','$FULLMARK');");
  }
?>
