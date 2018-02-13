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

    $UID1 = "'".$UID."'";
    $FN1 = "'".$FN."'";
    $LN1 = "'".$LN."'";
    $UN1 = "'".$UN."'";
    
    $SID1 = "'".$SID."'";
    $DP1 = "'".$DP."'";
    $EM1 = "'".$EM."'";
    $PW1 = "'".$PW."'";

    // echo "alert('uid '+ $UID);";
    // echo "alert('fname '+ $FN1);";
    // echo "alert('lname '+ $LN);";
    // echo "alert('uname '+ $UN);";

    // echo "alert('sid '+ $SID);";
    // echo "alert('dp '+ $DP);";
    // echo "alert('email '+ $EM);";
    // echo "alert('PW '+ $PW);";
     
    $subquery="uPDATE user" ;
    $subquery=$subquery. " set ";
    
    if ($FN1!=''){
        $subquery=$subquery. ' Firstname =  "'.$FN.'"';
      echo "alert('FN OK');";
    }
    if ($LN1!=''){
      $subquery=$subquery. ' ,Lastname =  "'.$LN.'"';
    echo "alert('LN OK');";
    }
    if ($UN1!=''){
      $subquery=$subquery. ' ,Username =  "'.$UN.'"';
    echo "alert('UN OK');";
    }
    if ($SID1!=''){
      $subquery=$subquery. ' ,Student_ID =  "'.$SID.'"';
    echo "alert('SID OK');";
    }
    if ($DP1!=''){
      $subquery=$subquery. ' ,Department =  "'.$DP.'"';
    echo "alert('DP OK');";
    }
    if ($EM1!=''){
      $subquery=$subquery. ' ,Email =  "'.$EM.'"';
    echo "alert('EM OK');";
    }
    if ($PW1!=''){
      $subquery=$subquery. ' ,Password   =  md5("'.$EM.'")';
    echo "alert('PW OK');";
    }
    

      // echo "alert('$subquery');";
      // echo "alert('$subquery WHERE U_ID =$UID;');";
    $result = mysql_query("$subquery WHERE U_ID =$UID;");
  }
?>
