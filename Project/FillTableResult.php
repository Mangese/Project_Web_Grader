<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $SID = $_REQUEST["section"];
    $UID = $_SESSION["uid"];

    $sumPb = mysql_query("select count(*) as sumPloblem from homework where s_id = '$SID';");
    $result1 = mysql_query("select concat(firstname,' ',lastname) as name,u.u_id as stdId from user u join register r on r.u_id = u.u_id where r.s_id = '$SID';");

    while($row = mysql_fetch_assoc($sumPb)){
      $sumPlob = $row['sumPloblem'];
    }

    while($row = mysql_fetch_assoc($result1)){
      $ID = $row['stdId'];
      $NAME = $row['name'];
      $sumPass = 0;
      echo "<tr style='width:100%'>";
        echo "<td style='width:100px'>";
          echo "$ID";
        echo "</td>";
        echo "<td style='width:250px'>";
          echo "$NAME";
        echo "</td>";
        $result2 = mysql_query("select (case when status is null then 'N' when (select status from submit where su.H_ID = H_id and u_id = su.u_id and status = 'P' limit 1) is null then 'F' else 'P' end) as status from homework h left join submit su on su.h_id = h.h_id where su.u_id = '$ID' or su.u_id is null and h.s_id = '$SID' group by su.u_id,su.h_id order by h.h_id");        
        while($row = mysql_fetch_assoc($result2)){
          $STATUS = $row['status'];
          echo "<td style='min-width:30px'>";
            if (strcmp($STATUS,"P")){
              $sumPass = $sumPass+1;
              echo "<i class='fa fa-check' aria-hidden='true' style='color:#2ECC71'></i>";
            }
            else {
              echo "<i class='fa fa-times' aria-hidden='true' style='color:#E74C3C'></i>";
            }
          echo "</td>";
        }
        echo "<td style='width:100px; text-align:center;'>";
          $passPerSum = $sumPass.'/'.$sumPlob;
          echo "$passPerSum";
        echo "</td>";
      echo "</tr>";
    }

  }
?>
