<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $SID = $_REQUEST["section"];
    $UID = $_SESSION["uid"];

    $sumPb = mysql_query("select count(*) as sumPloblem from homework where s_id = '$SID' and deleteflag is null;");
    $result1 = mysql_query("select concat(firstname,' ',lastname) as name,u.u_id as stdId from user u join register r on r.u_id = u.u_id where r.s_id = '$SID';");
    $result3 = mysql_query("select h_id as hid from homework where s_id = '$SID' and deleteflag is null order by h_id;");
    
    while($row = mysql_fetch_assoc($sumPb)){
      $sumPlob = $row['sumPloblem'];
      echo "<thead class='thead'>";
        echo "<tr style='width:100%'>";
          echo "<th style='width:100px' onclick='sortTable(0)'>";
            echo "ID";
            echo "<i class='fa fa-sort' aria-hidden='true' style='float:right; padding-top:3px;'></i>";
          echo "</th>";
          echo "<th style='width:250px' onclick='sortTable(1)'>";
            echo "Name";
            echo "<i class='fa fa-sort' aria-hidden='true' style='float:right; padding-top:3px;'></i>";
          echo "</th>";
          for ($i = 1; $i <= $sumPlob; $i++){
            echo "<th style='min-width:30px'>";
              echo "Ex$i";
            echo "</th>";
          }
          $sortLastCol = $sumPlob+2;
          echo "<th style='width:250px' onclick='sortTable($sortLastCol)'>";
            echo "Pass";
            echo "<i class='fa fa-sort' aria-hidden='true' style='float:right; padding-top:3px;'></i>";
          echo "</th>";
        echo "</tr>";
      echo "</thead>";
    }
    $CountRowForModal = 0;
    while($row = mysql_fetch_assoc($result1)){
      $ID = $row['stdId'];
      $NAME = $row['name'];
      $CountRowForModal = $CountRowForModal + 1 ;
      $sumPass = 0;
      echo "<tr style='width:100%'>";
        echo "<td style='width:100px'>";
          echo "$ID";
        echo "</td>";
        echo "<td style='width:250px'>";
          echo "$NAME";
        echo "</td>";
        $result2 = mysql_query("select (case when status is null then 'N' when (select status from submit where su.H_ID = H_id and u_id = su.u_id and status = 'P' limit 1) is null then 'F' else 'P' end) as status,h.h_id as hid from homework h left join submit su on su.h_id = h.h_id where su.u_id = '$ID' or su.u_id is null and h.s_id = '$SID' and h.deleteflag is null group by su.u_id,su.h_id order by h.h_id;");
        
        $numprob = 0;
        while($row = mysql_fetch_assoc($result2)){
          $STATUS = $row['status'];
          $HidModal = $row['hid'];
          $numprob = $numprob + 1;
          $ProblemHeader = $NAME;
          $modalResultHeader = $numprob;
//           $modalResultHeader = 'ex '.$numprob;
          echo "<td style='min-width:30px'>";
            if (!strcmp($STATUS,"P")){
              $sumPass = $sumPass+1;
//               echo "<i class='fa fa-check' aria-hidden='true' style='color:#2ECC71'></i>";
              echo "<i class='fa fa-check' aria-hidden='true' style='color:#2ECC71' onclick = 'ResultModalHeader($ID,$HidModal,$CountRowForModal,$modalResultHeader,'.$NAME.');' data-toggle='modal' data-target='#modalSourceFileSend'></i>";
            }
            else {
              echo "<i class='fa fa-times' aria-hidden='true' style='color:#E74C3C' onclick = 'ResultModalHeader($ID,$HidModal,$CountRowForModal,$modalResultHeader,'.$NAME.');' data-toggle='modal' data-target='#modalSourceFileSend'></i>";
            }
          echo "</td>";
        }
        echo "<td style='width:100px; text-align:center;'>";
          $passPerSum = $sumPass.'/'.$sumPlob;
          echo "$passPerSum";
        echo "</td>";
      echo "</tr>";
    }

    while($row = mysql_fetch_assoc($result3)){
      $HID = $row['hid'];
      echo "<tr style='width:100%; background-color:#B2DBBF;'>";
        echo "<td style='width:100px'>";
        echo "</td>";
        echo "<td style='width:250px'>";
          echo "<B>Conclusion</B>";
        echo "</td>";
            
      $result4 = mysql_query("select count(*) as sumbyproblem from submit where status = 'P' and h_id = '$HID';"); 
      while($row = mysql_fetch_assoc($result4)){
        $sumByPloblem = $row['sumbyproblem'];
        echo "<td style='min-width:30px; font-weight:bold';>";
          echo "$sumByPloblem";
        echo "</td>";
      }
        echo "<td style='width:100px'>";
      
        echo "</td>";
      echo "</tr>";
    }

  }
?>
