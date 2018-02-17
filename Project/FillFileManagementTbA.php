<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $TFS = $_REQUEST["tFilesearch"];
    $DS = $_REQUEST["dateStart"];
    $DE = $_REQUEST["dateEnd"];
    
    $message = "test alert in php";
   // echo "<script type='text/javascript'>alert('$message');</script>";
   // echo "<script type='text/javascript'>alert('$TFS');</script>";
   // echo "<script type='text/javascript'>alert('$DS');</script>";
  //  echo "<script type='text/javascript'>alert('$DE');</script>";
    $SQL = '';
    if($TFS == 'flag')
    {
      $SQL = $SQL."select submit_date as date,source_file as file,u_id as uid,h_id as hid from submit where 1=1 ";
    }
    else
    {
 //     echo "<script type='text/javascript'>alert('2');</script>";
    }
    
    if($DS != '')
    {
      $SQL = $SQL." and submit_date >= '$DS' ";
    }
    if($DE != '')
    {
      $SQL = $SQL." and submit_date <= '$DE' "; 
    }
    $SQL = $SQL.";";
    $result = mysql_query($SQL);
    while($row = mysql_fetch_assoc($result))
     {
      $UID = $row['uid'];
      $TI = $row['date'];
      $HID = $row['hid'];
      $F = $row['file'];
      echo "<tr>";
       echo "<td style='width:10%'>";
      echo "<label class='form-check-label'>";
       echo "<input type='checkbox' class='form-check-input'>";
      echo "</label> "
        echo "</td>";
      echo "<td style='width:10%'>";
       echo "$UID";
       echo "</td>";
      echo "<td style='width:20%'>";
       echo "$HID";
       echo "</td>";
      echo "<td style='width:30%'>";
       echo "$F";
       echo "</td>";
      echo "<td style='width:30%'>";
       echo "$TI";
       echo "</td>";
      echo "</tr>";
    }
    // $result = mysql_query(" select username as userName,student_id as Student_ID,firstname as firstName,lastname as lastName,department as department,email as Email from user  ;");
    // if($SIDSR == ''){
    //   $result = mysql_query("select u_id as uid,user_type as u_type,username as userName,(case when student_id is null then '' else student_id end) as Student_ID,firstname as firstName,lastname as lastName,department as department,email as Email from user where user_type like '%$TSR%' and firstname like '%$NSR%' ; ");
    // }else{
    //   $result = mysql_query("select u_id as uid,user_type as u_type,username as userName,(case when student_id is null then '' else student_id end) as Student_ID,firstname as firstName,lastname as lastName,department as department,email as Email from user where user_type like '%$TSR%' and student_id like '%$SIDSR%' and firstname like '%$NSR%' ; ");
    // }
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
    //   echo "<tr>";
    //   echo "<td style='width:15%'>";
    //   echo "$UN";
    //   echo "</td>";
    //   echo "<td style='width:15%'>";
    //   echo "$SID";
    //   echo "</td>";
    //   echo "<td style='width:15%'>";
    //   echo "$FN";
    //   echo "</td>";
    //   echo "<td style='width:15%'>";
    //   echo "$LN";
    //   echo "</td>";
    //   echo "<td style='width:15%'>";
    //   echo "$DM";
    //   echo "</td>";
    //   echo "<td style='width:15%'>";
    //   echo "$EM";
    //   echo "</td>";
    //   echo "<td style='width:5%'>";
    //   echo "<button type='button' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editAccount' onclick = 'editAccountManagementTb(this,$UID,$SID1,$UN1,$FN1,$LN1,$DM1,$EM1,$UT1)';><i class='fa fa-edit' aria-hidden='true' ></i></button>";
    //   echo "</td>";
    //   echo "<td style='width:5%'>";
    //   echo "<button type='button' class='btn btn-danger btn-sm' onclick = 'deleteAccountManagement(this,$UID)';><i class='fa fa-trash' aria-hidden='true'></i></button>";
    //   echo "</td>";
    //   echo "</tr>";
    // }
  }
?>
