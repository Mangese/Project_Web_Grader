<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    mysql_query("use grader;");
    $Section = $_REQUEST["Section"];
    $result = mysql_query("select p.Remark as problemName,p.File_Name as fileName from homework h join section s on h.S_ID = s.S_ID join submit su on su.H_ID = h.H_ID join problem p on p.P_ID = h.P_ID;");
    $RowNum = 0;
    while($row = mysql_fetch_assoc($result))
    {
      $RowNum = $RowNum+1;
      echo "<tr>";
      echo "<td style='width:15%'>";
      echo "$RowNum";
      echo "</td>";
      echo "<td style='width:40%' class = 'use'>";
      echo "<a href = '$row[0].pdf' target = '_blank'>$row[1]</a>";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "0";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "Fail";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "<button type='button' class='btn btn-outline-secondary'  onclick = 'ModalHeaderFunc(this);' data-toggle='modal' ";
      echo "data-target='#test1'>Upload</button>";
      echo "<div class='modal fade' id='test1' role='dialog'>";
      echo "<div class='modal-dialog'>";
      echo "<div class='modal-content'>";
      echo "<div class='modal-header'>";
      echo "<h4 class='modal-title' id = 'modalValue'></h4>";
      echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
      echo "</div>";
      echo "<div class='modal-body' style='margin:auto;'>";
      echo "<label class='file'>";
      echo "<input type='file'>";
      echo "<span class='file-custom'></span>";
      echo "</label>";
      echo "</div>";
      echo "<div class='modal-footer'>";
      echo "<button type='submit' class='btn btn-secondary' data-dismiss='modal'>Upload</button>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      echo "</td>";
      echo "</tr>";
    }
  }
?>
