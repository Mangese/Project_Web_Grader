<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $TSR = $_REQUEST["typeSearch"];
    $SIDSR = $_REQUEST["sidSearch"];
    $NSR = $_REQUEST["nameSearch"];
    // $message = "test alert in php";
    // echo "<script type='text/javascript'>alert('$message');</script>";
    // echo "<script type='text/javascript'>alert('$TSR');</script>";
    // echo "<script type='text/javascript'>alert('$SIDSR');</script>";
    // echo "<script type='text/javascript'>alert('$NSR');</script>";
    // $result = mysql_query(" select username as userName,student_id as Student_ID,firstname as firstName,lastname as lastName,department as department,email as Email from user  ;");
    if($SIDSR == ''){
      $result = mysql_query("select u_id as uid,user_type as u_type,username as userName,student_id as Student_ID,firstname as firstName,lastname as lastName,department as department,email as Email from user where user_type like '%$TSR%' and firstname like '%$NSR%' ; ");
    }else{
      $result = mysql_query("select u_id as uid,user_type as u_type,username as userName,student_id as Student_ID,firstname as firstName,lastname as lastName,department as department,email as Email from user where user_type like '%$TSR%' and student_id like '%$SIDSR%' and firstname like '%$NSR%' ; ");
    }
    while($row = mysql_fetch_assoc($result))
    {
      
      $UN = $row['userName'];
      $SID = $row['Student_ID'];
      $FN = $row['firstName'];
      $LN = $row['lastName'];
      $DM = $row['department'];
      $EM = $row['Email'];
      $UID = $row['uid'];
      $UT = $row['u_type'];
      echo "<tr>";
      echo "<td style='width:15%'>";
      echo "$UN";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "$SID";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "$FN";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "$LN";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "$DM";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "$EM";
      echo "</td>";
      echo "<td style='width:5%'>";
      echo "<button type='button' class='btn btn-outline-warning btn-sm' data-toggle='modal' data-target='#editAccount' onclick = 'editAccountManagementTb(this,$UID,$UN,$FN,$LN)';><i class='fa fa-edit' aria-hidden='true' ></i></button>";
      echo "</td>";
      echo "<td style='width:5%'>";
      echo "<button type='button' class='btn btn-outline-danger btn-sm'><i class='fa fa-trash' aria-hidden='true'></i></button>";
      echo "</td>";
      echo "</tr>";
    }
  }
?>
