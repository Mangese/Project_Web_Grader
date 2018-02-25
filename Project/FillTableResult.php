<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $SID = $_REQUEST["section"];
    $UID = $_SESSION["uid"];
    $sumPb = mysql_query("select count(*) as sumPloblem from homework h join problem p on p.p_id = h.p_id where h.s_id = '$SID' and p.deleteflag is null and h.deleteflag is null;");
    $result1 = mysql_query("select concat(firstname,' ',lastname) as name,u.u_id as u_id,student_id as std_id from user u join register r on r.u_id = u.u_id where r.s_id = '$SID';");
    $result3 = mysql_query("select h_id as hid from homework h join problem p on p.p_id = h.p_id where h.s_id = '$SID' and h.deleteflag is null and p.deleteflag is null order by h.h_id;");
    $fullMark = mysql_query("select (case when fullMark is null then '' else fullMark end) as Mark from homework h join problem p on p.p_id = h.p_id where h.s_id = '$SID' and p.deleteflag is null and h.deleteflag is null order by h.h_id;");
    
    while($row = mysql_fetch_assoc($sumPb)){
      $sumPlob = $row['sumPloblem'];
      echo "<thead class='thead'>";
        echo "<tr style='width:100%'>";
          echo "<th style='min-width:80px; border-right:1px solid #eceeef;' onclick='sortTable(0)'>";
            echo "ID";
            echo "<i class='fa fa-sort' aria-hidden='true' style='float:right; padding-top:3px;'></i>";
          echo "</th>";
          echo "<th style='min-width:205px; border-right:1px solid #eceeef;' onclick='sortTable(1)'>";
            echo "Name";
            echo "<i class='fa fa-sort' aria-hidden='true' style='float:right; padding-top:3px;'></i>";
          echo "</th>";
          for ($i = 1; $i <= $sumPlob; $i++){
            echo "<th style='min-width:86px; border-right:1px solid #eceeef;'>";
              echo "Ex$i ";
            $rowFullMark = mysql_fetch_assoc($fullMark);
            $Full = $rowFullMark['Mark'];
            if($Full != ''){
              echo "($Full)";
            }
            echo "</th>";
          }
          $sortLastCol = $sumPlob+2;
          echo "<th style='min-width:65px; border-right:1px solid #eceeef;' onclick='sortTable($sortLastCol)'>";
            echo "Pass";
            echo "<i class='fa fa-sort' aria-hidden='true' style='float:right; padding-top:3px;'></i>";
          echo "</th>";
          echo "<th style='min-width:120px; border-right:1px solid #eceeef;' onclick='sortTable($sortLastCol)'>";
            echo "Sum Points";
            echo "<i class='fa fa-sort' aria-hidden='true' style='float:right; padding-top:3px;'></i>";
          echo "</th>";
        echo "</tr>";
      echo "</thead>";
    }
    $CountRowForModal = 0;
    while($row = mysql_fetch_assoc($result1)){
      $ID = $row['u_id'];
      $StdID = $row['std_id'];
      $NAME = $row['name'];
      $CountRowForModal = $CountRowForModal + 1 ;
      $sumPass = 0;
      echo "<tr style='width:100%'>";
        echo "<td style='min-width:80px'>";
          echo "$StdID";
        echo "</td>";
        echo "<td style='min-width:205px'>";
          echo "$NAME";
        echo "</td>";
//         $result2 = mysql_query("select h_id as hid,(case when (select status from submit where h_id = h.h_id and status = 'P' and u_id = '$ID' limit 1) is null then 'F' else 'P' end)  as status,(case when fullMark is null then '' else fullMark end) as fullMark from homework h join problem p on h.p_id = p.p_id  where s_id = '$SID' and h.deleteflag is null and p.deleteflag is null;");
        $result2 = mysql_query("select h_id as hid,(case when (select status from submit where h_id = h.h_id and status = 'P' and u_id = '$ID' limit 1) is null then 'F' else 'P' end)  as status,(case when fullMark is null then '' else fullMark end) as fullMark,(case when (select teachermark from submit su where su.u_id = '$ID' and su.h_id = h.h_id limit 1 ) is null then '' else ((select teachermark from submit su where su.u_id = '$ID' and su.h_id = h.h_id limit 1 )) end) as teachermark from homework h join problem p on h.p_id = p.p_id  where s_id = '$SID' and h.deleteflag is null and p.deleteflag is null order by h.h_id;");
       

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
          echo "<td style='min-width:70px;' data-toggle='tooltip' data-placement='bottom' title='Click for view submission details'>";
          echo "<div class='form-inline '>";
            if (!strcmp($STATUS,"P")){
              $sumPass = $sumPass+1;
              echo "<i class='fa fa-check' aria-hidden='true' style='color:#2ECC71; margin-right:4px' onclick = 'ResultModalHeader($ID,$HidModal,$CountRowForModal,$numprob,$ID,$submitCount,$fullMarkModal1);' data-toggle='modal' data-target='#modalSourceFileSend'></i>";
              if($teacherMark != ''){
                echo "<p style='width:50px; text-align:right; margin-bottom:0px; color:#2ECC71';>($teacherMark pt.)</p>";
              }
            }
            else {
              echo "<i class='fa fa-times' aria-hidden='true' style='color:#E74C3C; margin-right:4px' onclick = 'ResultModalHeader($ID,$HidModal,$CountRowForModal,$numprob,$ID,$submitCount,$fullMarkModal1);' data-toggle='modal' data-target='#modalSourceFileSend'></i>";
              if($teacherMark != ''){
                 echo "<p style='width:50px; text-align:right; margin-bottom:0px; color:#E74C3C';>($teacherMark pt.)</p>";
              }
//               echo '<i class="fa fa-times" aria-hidden="true" style="color:#E74C3C" onclick = ResultModalHeader($ID,$HidModal,$CountRowForModal,$numprob,"' . $NAME. '"); data-toggle="modal" data-target="#modalSourceFileSend">''</i>';
              
            }
          echo "</div>";
          echo "</td>";
        }
        echo "<td style='min-width:60px; text-align:center;'>";
          $passPerSum = $sumPass.'/'.$sumPlob;
          echo "$passPerSum";
          
        echo "</td>";
       echo "<td style='min-width:115px; text-align:center;'>";
          $passPerSum = $sumPass.'/'.$sumPlob;
          echo "$sumMark";
          echo "/";
          echo "$sumFullMark";
        echo "</td>";
      
      echo "</tr>";
    }
    
      echo "<tr style='width:100%; background-color:#B2DBBF;'>";
        echo "<td style='width:100px'>";
        echo "</td>";
        echo "<td style='width:250px'>";
          echo "<B>Conclusion</B>";
        echo "</td>";
    while($row = mysql_fetch_assoc($result3)){
      $HID = $row['hid'];
      $result4 = mysql_query("select count(*) as sumbyproblem from submit su join homework h on h.h_id = su.h_id join problem p on p.p_id = h.p_id where su.status = 'P' and su.h_id = '$HID' and p.deleteflag is null and h.deleteflag is null;"); 
      while($row = mysql_fetch_assoc($result4)){
        $sumByPloblem = $row['sumbyproblem'];
        echo "<td style='min-width:30px; font-weight:bold';>";
          echo "<a href = 'testDiceCorre.php?hid=$HID>' target = '_blank'>$sumByPloblem</a>";
        echo "</td>";
      }
    }
    
        echo "<td style='width:100px'>";
      
        echo "</td>";
    echo "<td style='width:100px'>";
      
        echo "</td>";
      echo "</tr>";
  }
?>
