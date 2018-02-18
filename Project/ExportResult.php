<?php
header('Content-Disposition: attachment; filename="default-filename.csv"');
 $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $SID = $_REQUEST["sid"];
    $sumPb = mysql_query("select count(*) as sumPloblem from homework h join problem p on p.p_id = h.p_id where h.s_id = '$SID' and p.deleteflag is null and h.deleteflag is null;");
    $result1 = mysql_query("select concat(firstname,' ',lastname) as name,u.u_id as u_id,student_id as std_id from user u join register r on r.u_id = u.u_id where r.s_id = '$SID';");
    $result3 = mysql_query("select h_id as hid from homework h join problem p on p.p_id = h.p_id where h.s_id = '$SID' and h.deleteflag is null and p.deleteflag is null order by h.h_id;");
    $fullMark = mysql_query("select (case when fullMark is null then '' else fullMark end) as Mark from homework h join problem p on p.p_id = h.p_id where h.s_id = '$SID' and p.deleteflag is null and h.deleteflag is null order by h.h_id;");
    
    while($row = mysql_fetch_assoc($sumPb)){
      $sumPlob = $row['sumPloblem'];
            echo "User ID,";
            echo "Name,";
          for ($i = 1; $i <= $sumPlob; $i++){
              echo "Ex$i ";
            $rowFullMark = mysql_fetch_assoc($fullMark);
            $Full = $rowFullMark['Mark'];
            if($Full != ''){
              echo "($Full)";
            }
	      echo ",";
          }
          $sortLastCol = $sumPlob+2;
            echo "Pass,";
            echo "SumPoints\n";
    }
    $CountRowForModal = 0;
    while($row = mysql_fetch_assoc($result1)){
      $ID = $row['u_id'];
      $StdID = $row['std_id'];
      $NAME = $row['name'];
      $CountRowForModal = $CountRowForModal + 1 ;
      $sumPass = 0;
          echo "$StdID ,";
          echo "$NAME ,";
//         $result2 = mysql_query("select h_id as hid,(case when (select status from submit where h_id = h.h_id and status = 'P' and u_id = '$ID' limit 1) is null then 'F' else 'P' end)  as status,(case when fullMark is null then '' else fullMark end) as fullMark from homework h join problem p on h.p_id = p.p_id  where s_id = '$SID' and h.deleteflag is null and p.deleteflag is null;");
        $result2 = mysql_query("select h_id as hid,(case when (select status from submit where h_id = h.h_id and status = 'P' and u_id = '$ID' limit 1) is null then 'F' else 'P' end)  as status,(case when fullMark is null then '' else fullMark end) as fullMark,(case when (select teachermark from submit su where su.u_id = '3' and su.h_id = h.h_id limit 1 ) is null then '' else ((select teachermark from submit su where su.u_id = '$ID' and su.h_id = h.h_id limit 1 )) end) as teachermark from homework h join problem p on h.p_id = p.p_id  where s_id = '$SID' and h.deleteflag is null and p.deleteflag is null order by h.h_id;");
       
        $numprob = 0;
        $sumFullMark = 0;
        $sumMark = 0;
        while($row = mysql_fetch_assoc($result2)){
          $STATUS = $row['status'];
          $HidModal = $row['hid'];
          $teacherMark = $row['teachermark'];
          $fullMarkModal = $row['fullMark'];
          $fullMarkModal1 = '"' .$fullMarkModal. '"';
          $numprob = $numprob + 1;
          $submitCountResult = mysql_query(" select count(*) as num from submit where u_id = '$ID' and h_id = '$HidModal';");
          while($row = mysql_fetch_assoc($submitCountResult)){
            $submitCount = $row['num'];
          }
          $sumMark = $sumMark + $teacherMark;
          $sumFullMark = $sumFullMark + $fullMarkModal;
            if (!strcmp($STATUS,"P")){
              $sumPass = $sumPass+1;
//               echo "<i class='fa fa-check' aria-hidden='true' style='color:#2ECC71'></i>";
              echo "Pass";
              if($teacherMark != ''){
                echo "$teacherMark pt.";
              }
		    echo ",";
            }
            else {
              echo "Not Pass";
              if($teacherMark != ''){
                 echo "$teacherMark pt.";
		     
              }
		     echo ",";
//               echo '<i class="fa fa-times" aria-hidden="true" style="color:#E74C3C" onclick = ResultModalHeader($ID,$HidModal,$CountRowForModal,$numprob,"' . $NAME. '"); data-toggle="modal" data-target="#modalSourceFileSend">''</i>';
              
            }
        }
          $passPerSum = $sumPass.'/'.$sumPlob;
          echo '="'.$passPerSum.'",';
          
          $passPerSum = $sumPass.'/'.$sumPlob;
          echo '="'.$sumMark;
          echo "/";
          echo "$sumFullMark".'"';
	    echo "\n";
      
    }
    
          echo "Conclusion,";
    while($row = mysql_fetch_assoc($result3)){
      $HID = $row['hid'];
      $result4 = mysql_query("select count(*) as sumbyproblem from submit su join homework h on h.h_id = su.h_id join problem p on p.p_id = h.p_id where su.status = 'P' and su.h_id = '$HID' and p.deleteflag is null and h.deleteflag is null;"); 
      while($row = mysql_fetch_assoc($result4)){
        $sumByPloblem = $row['sumbyproblem'];
          echo "$sumByPloblem";
      }
    }
  }
?>
