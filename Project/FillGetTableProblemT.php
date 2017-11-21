<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $CID = $_REQUEST["class"];
    $UID = $_SESSION["uid"];
    $result = mysql_query("select p.p_id as pid,p.Remark as problemName,p.language as lang ,p.u_id as u_teacher,s.s_id as section from problem p join user u on u.u_id = p.u_id join class c on c.c_id = p.c_id join section s on s.c_id = c.c_id where s.s_id = $CID and p.u_id = $UID and p.deleteflag is null;");
    $RowNum = 0;
    $inphp = "inphp";
//echo "<script type='text/javascript'>alert('$inphp');</script>";
    while($row = mysql_fetch_assoc($result))
    {
      $www = "inwhile";
//echo "<script type='text/javascript'>alert('$www');</script>";
      $RowNum = $RowNum+1;
      $PID = $row['pid'];
      $PN = $row['problemName'];
      // $UD = $row['uploadDate'];
      $LN = $row['lang'];
      // $FN = $row['fileName'];
//       echo "<tr>";
//       echo "<td style='width:30%'>";
//       echo "<a href = 'Problem/$FN' target = '_blank'>$PN</a>";
// //       echo "Name";
//       echo "</td>";
//       echo "<td style='width:10%'>";
//       echo "$LN";
// //       echo "Lang";
//       echo "</td>";
//       echo "<td style='width:25%'>";
//       //echo "$LN";
//       echo "<div class='form-group'>";
//       echo "<div class='input-group date' id='datetimepicker1'>";
//       echo "<input type='text' class='form-control' placeholder='Date Send' />";
//       echo "<span class='input-group-addon'>";
//       echo "<span class='glyphicon glyphicon-calendar'></span>";
//       echo "</span>";
//       echo "</div>";
//       echo "</div>";
// //       echo "Date";
//       echo "</td>";
//       echo "<td style='width:25%'>";
//       // echo "<i class='fa fa-minus-circle' aria-hidden='true' style='color:#E74C3C'></i>";
//       echo "<div class='form-group'>";
//       echo "<div class='input-group date' id='datetimepicker3'>";
//       echo "<input type='text' class='form-control' placeholder='Time Send' />";
//       echo "<span class='input-group-addon'>";
//       echo "<span class='glyphicon glyphicon-time'></span>";
//       echo "</span>";
//       echo "</div>";
//       echo "</div>";
// //       echo "Time";
//       echo "</td>";
//       echo "<td style='width:10%'>";
//       echo "<input type='checkbox' name='vehicle' value=''><br>";
//       echo "</td>";
//       echo "</tr>";


      
                      echo "<tr>";
                        echo "<td style='width:30%'>";
                          echo "<a href = 'Problem/$FN' target = '_blank'>$PN</a>";
                        echo "</td>";
                        echo "<td style='width:10%'>";
                          echo "$LN";
                        echo "</td>";
                        echo "<td style='width:25%'>";
                          echo "<div class='form-group'>";
      $tempdate = 'datetimepicker'.$RowNum;
      $tempdateName = 'datetimepicker'.$RowNum.'Name';
      $temptime = 'timepicker'.$RowNum;
      $temptimeName = 'timepicker'.$RowNum.'Name';
  echo "<div class='input-group date' id='$tempdate' onclick = 'DMYpicker(this.id)' style='background: #FFFFFF color: #CCCCCC'>";
   echo "<input type='text' class='form-control' id = '$tempdateName' placeholder='Date Send' style='background: #FFFFFF color: #CCCCCC'/>";
     echo "<span class='input-group-addon' >";
      echo "<span class='glyphicon glyphicon-calendar'></span>";
     echo "</span>";
  echo "</div>";
 echo "</div>";
                        echo "</td>";
                        echo "<td style='width:25%'>";
                          echo "<div class='form-group'>";
  echo "<div class='input-group date' id='$temptime' onclick = 'Timepicker(this.id)'>";
   echo "<input type='text' class='form-control' id = '$temptimeName' placeholder='Time Send' />";
    echo "<span class='input-group-addon'>";
     echo "<span class='glyphicon glyphicon-time'></span>";
    echo "</span>";
  echo "</div>";
 echo "</div>";
                        echo "</td>";
                        echo "<td style='width:10%' >";
                          echo "<input type='checkbox' name='selectedProblemToAssign' value = '$PID' ><br>";
                        echo "</td>";
                      echo "</tr>";
    }
  }
?>
