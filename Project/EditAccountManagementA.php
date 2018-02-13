<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
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
    
    // $tor="1111"
    // ."22222";
     
       $subquery="uPDATE user"
      ." set "
     if ($UID!=''){
      ." Firstname = '$FN' ";
     }
     $result= mysql_query(" $subquery "
     ." WHERE U_ID =$UID; ");
    // mysql_query("insert into homework (P_ID,LANGUAGE,S_ID,AssignDate,AssignTime,DeadlineDate,DeadlineTime,FullMark) values ($PID,(select Language from problem where p_id = '1'),$SID,now(),now(),'$DATE','$TIME','$FULLMARK');");
  }
?>
