<?php
  $baseTarget = "Problem/";
  $FileName = "EGCO1111201711192IN.zip";
  $UnzipTarget = "UnzipInputField/";
  exec("unzip $baseTarget$FileName -d $baseTarget$UnzipTarget");
?>
