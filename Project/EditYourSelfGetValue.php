<?php
 $conn = mysql_connect("localhost","mangese","000000");
   if($conn != FALSE)
   {
    // $SID = $_REQUEST["sidreq"];
    // $SN = $_REQUEST["sectionnameEdit"];
    session_start();
    $UIDS = $_SESSION["uid"];
    $UTS = $_SESSION["utype"];
    // echo "alert('$UIDS');";
    // echo "alert('$UTS');";
    // echo "alert('inphp');";
    // echo "alert('SN '+ $SN);";
  
     mysql_query("use grader;");
    
    // if($UTS == 'T'){
      // echo "alert('eieieieiei');";
        $result = mysql_query("select u_id as uid,user_type as u_type,username as userName,(case when student_id is null then '' else student_id end) as Student_ID,firstname as firstName,lastname as lastName,department as department,email as Email from user where u_id like '$UIDS' ; ");
    // }else{
      // echo "alert('5555555');";
      // $result = mysql_query("select u_id as uid,user_type as u_type,username as userName,(case when student_id is null then '' else student_id end) as Student_ID,firstname as firstName,lastname as lastName,department as department,email as Email from user where user_type like '%$TSR%' and student_id like '%$SIDSR%' and firstname like '%$NSR%' ; ");
    // }
     if($result)
     {
     while($row = mysql_fetch_assoc($result))
     {
      echo "alert('sucess');";
      
      $UN = $row['userName'];
      $SID = $row['Student_ID'];
      $FN = $row['firstName'];
      $LN = $row['lastName'];
      $DM = $row['department'];
      $EM = $row['Email'];
      $UID = $row['uid'];
      $UT = $row['u_type'];

      $UID1 = '"' .$UID. '"';
      $SID1 = '"' .$SID. '"';
      $UN1 = '"' .$UN. '"';
      $FN1 = '"' .$FN. '"';
      $LN1 = '"' .$LN. '"';
      $DM1 = '"' .$DM. '"';
      $EM1 = '"' .$EM. '"';
      $UT1 = '"' .$UT. '"';

      // echo "alert('UID1:'+$UID1);";
      // echo "alert('SID1:'+$SID1);";
      // echo "alert('UN1:'+$UN1);";
      // echo "alert('FN1:'+$FN1);";
      // echo "alert('LN1:'+$LN1);";
      // echo "alert('DM1:'+$DM1);";
      // echo "alert('EM1:'+$EM1);";
      // echo "alert('UT1:'+$UT1);";

      // echo " <script> ";
      echo " document.getElementById('editFirstname').value = $FN1; ";
      echo " document.getElementById('editLastname').value = $LN1; ";
      echo " document.getElementById('editUsername').value = $UN1; ";
      echo " document.getElementById('editStudentID').value = $SID1; ";
      echo " document.getElementById('editDepartment').value = $DM1; ";
      echo " document.getElementById('editEmail').value = $EM1; ";
      echo " document.getElementById('editPassword').value = ''; ";
      echo " document.getElementById('editPassword2').value = ''; ";

      echo " document.getElementById('defaultCheckFirstname').checked = false; ";
      echo " document.getElementById('defaultCheckLastname').checked = false; ";
      echo " document.getElementById('defaultCheckUsername').checked = false; ";
      echo " document.getElementById('defaultCheckStdID').checked = false; ";
      echo " document.getElementById('defaultCheckDepart').checked = false; ";
      echo " document.getElementById('defaultCheckEmail').checked = false; ";
      echo " document.getElementById('defaultCheckPass').checked = false; ";

      echo " document.getElementById('editFirstname').disabled = true; ";
      echo " document.getElementById('editLastname').disabled = true; ";
      echo " document.getElementById('editUsername').disabled = true; ";
      echo " document.getElementById('editStudentID').disabled = true; ";
      echo " document.getElementById('editDepartment').disabled = true; ";
      echo " document.getElementById('editEmail').disabled = true; ";
      echo " document.getElementById('editPassword').disabled = true; ";
      echo " document.getElementById('editPassword2').disabled = true; ";

      echo " document.getElementById('uidmoc').value = $UN1; ";
      echo " document.getElementById('utypemoc').value = $UT; ";
      echo " document.getElementById('message').innerHTML = ''; ";

      if ($UT1 == 'S') {
        // echo "alert('ssssssssss');";
        echo " document.getElementById('defaultCheckStdID').disabled = false; ";
      } else {
        // echo "alert('ttttttttt'); ";
        echo " document.getElementById('defaultCheckStdID').disabled = true; ";
      }
    // echo " </script> ";
      
      
     }
     }
    }
?>
