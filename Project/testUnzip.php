<?php
  $baseTarget = "Problem/";
  $FileName = "EGCO1111201711192IN.zip";
  $UnzipTarget = "UnzipInputField/";
  exec("rm $baseTarget$UnzipTarget *");
  exec("unzip $baseTarget$FileName -d $baseTarget$UnzipTarget");
?>
