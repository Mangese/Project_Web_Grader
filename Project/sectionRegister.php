<?php
  
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    $PW = $_REQUEST["Password"];
    $UID = $_SESSION["uid"];
    mysql_query("use grader;");
    $result = mysql_query("select count(*) as result,name as name,s_id as sid from section where password = '$PW'; ");
    while($row = mysql_fetch_assoc($result))
    {
      $temp = $row["result"];
      echo "alert('$temp');";
      if($row["result"] > 0)
      {
        $val = $row["sid"];
        $result1 = mysql_query("select count(*) as result from register where s_id <> '$val' and u_id <> '$UID'; ");
        while($row1 = mysql_fetch_assoc($result1))
        {
          $temp = $row1["result"];
        echo "alert('$temp');";
          if($row1["result"] == 0)
          {
            echo "alert('test');";
            $Text = $row["name"];
            mysql_query("insert into section values($val,$UID);");
            echo "var x = document.getElementById('selectClass');";
            echo "var option = document.createElement('option');";
            echo "option.text = '$Text';";
            echo "option.value = '$val';";
            echo "x.add(option);";
            echo "alert('$Text $val');";
          }  
          else
          {
            echo "alert('Already Registered');"; 
          }
        }
      }
      else
      {
          echo "alert('Invalid Password');";
      }
    }
  }
?>
