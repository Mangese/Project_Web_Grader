<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    $UID = $_SESSION["uid"];
    $TXT = $_REQUEST["text"];
    $CID = $_REQUEST["class"];
    mysql_query("use grader;");
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 8; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $result = mysql_query("insert into section value('','$randomString',$CID,$UID,'$TXT');");
    echo $randomString;
  }
?>
    
