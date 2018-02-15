<?php
 $conn = mysql_connect("localhost","mangese","000000");
   if($conn != FALSE)
   {
    // $SID = $_REQUEST["sidreq"];
    // $SN = $_REQUEST["sectionnameEdit"];
    session_start();
    $UID = $_SESSION["uid"];
    $UT = $_SESSION["utype"];
    echo "alert('$UID');";
    echo "alert('$UT');";
    echo "alert('inphp');";
    // echo "alert('SN '+ $SN);";
  
    // mysql_query("use grader;");
    // mysql_query("update section set name=$SN where s_id =$SID;");
    if($UT == 'T'){
      echo "alert('eieieieiei');";
      
      // $result = mysql_query("select u_id as uid,user_type as u_type,username as userName,(case when student_id is null then '' else student_id end) as Student_ID,firstname as firstName,lastname as lastName,department as department,email as Email from user where user_type like '%$TSR%' and firstname like '%$NSR%' ; ");
    }else{
      echo "alert('5555555');";
      // $result = mysql_query("select u_id as uid,user_type as u_type,username as userName,(case when student_id is null then '' else student_id end) as Student_ID,firstname as firstName,lastname as lastName,department as department,email as Email from user where user_type like '%$TSR%' and student_id like '%$SIDSR%' and firstname like '%$NSR%' ; ");
    }
    // while($row = mysql_fetch_assoc($result))
    // {
      
    //   $UN = $row['userName'];
    //   $SID = $row['Student_ID'];
    //   $FN = $row['firstName'];
    //   $LN = $row['lastName'];
    //   $DM = $row['department'];
    //   $EM = $row['Email'];
    //   $UID = $row['uid'];
    //   $UT = $row['u_type'];

    //   $SID1 = '"' .$SID. '"';
    //   $UN1 = '"' .$UN. '"';
    //   $FN1 = '"' .$FN. '"';
    //   $LN1 = '"' .$LN. '"';
    //   $DM1 = '"' .$DM. '"';
    //   $EM1 = '"' .$EM. '"';
    //   $UT1 = '"' .$UT. '"';
      
    // }
     }
?>
