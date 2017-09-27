<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#000000">

  <link rel="manifest" href="%PUBLIC_URL%/manifest.json">
  <link rel="shortcut icon" href="%PUBLIC_URL%/favicon.ico">

  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
    crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
    crossorigin="anonymous"></script>


  <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>

  <link rel="stylesheet" href="StudentUpload1.css">

  <nav class="navbar navbar-light bg-light" style="background-color: #0C3343; color:#ffffff">
    <form class="form-inline">
      <span class="h3" class="navbar-brand mb-0">Student</span>
      <label class="ml-auto " id = "SessionUser"></label>
      <button class="btn btn-outline-secondary logout-btn ml-4 my-2 my-sm-0" type="button" onclick = "logout()">Logout</button>
    </form>
  </nav>

</head>
<?php
  session_start();
  $UT = $_SESSION["utype"];
  if(strcmp($UT,"S"))
  {
	  echo "<script> alert('Invalid Page'); window.location = 'TeacherUploadedit.php'; </script>";
  }
  if(!isset($_SESSION["user"]))
  {
  echo "<script> alert('Please Login First'); window.location = 'logout.php'; </script>";
  }
  else
  {
  echo "<script> document.getElementById('SessionUser').innerText = '".$_SESSION["user"]."' </script>";
  }
?>
<body>
<input type = "hidden" id = "TableUploadHeader"/>
  <script>
function logout()
{
	window.location = "logout.php";
}
      $(document).ready(function()
  {
  fillDropDownSection();
  fillTable();
  });
    (function ($) {
      var doc = document,
        supportsMultipleFiles = "multiple" in doc.createElement("input");
      $(doc).on("change", ".file > input[type=file]", function () {
        var input = this,
          fileNames = [],
          label = input.nextElementSibling,
          files, len, i = -1, labelValue;
        if (supportsMultipleFiles) {
          len = (files = input.files).length;
          while (++i < len) {
            fileNames.push(files[i].name);
          }
        }
        else {
          fileNames.push(input.value.replace(/\\/g, "/").replace(/.*\//, "")); // Removes the path info ("C:\fakepath\" or sth like that)
        }
        label.textContent = labelValue = fileNames.length === 0 ? "" : fileNames.join(", ");
        label.setAttribute("title", labelValue);
      });
    })(jQuery);
function fillDropDownSection()
{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
    if(this.readyState == 4 && this.status == 200)
    {
      eval(this.responseText);
    }
  }
  xmlhttp.open("POST","testDropDown.php",true);
  xmlhttp.send();
}
function fillTable()
{
  $('#DataFromAjax tbody tr').remove();
  str = $("#selectClass").val();
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
  if(this.readyState == 4 && this.status == 200){
    $('#DataFromAjax').append(this.responseText);
  }
  }
  xmlhttp.open("POST","FillTable.php?Section="+str,true);
  xmlhttp.send();
}
function sectionRegister()
{
  str = $("#SectionPassword").val();
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
  if(this.readyState == 4 && this.status == 200){
    eval(this.responseText);
  }
  }
  xmlhttp.open("POST","sectionRegister.php?Password="+str,true);
  xmlhttp.send();
}
function ModalHeaderFunc(x,y)
{
$("#TableUploadHeader").val($(x).closest("tr").find(".use").text());
document.getElementById('modalValue').innerHTML = $('#TableUploadHeader').val();
$("#ProblemName").val(y);
$("#SectionValue").val($("#selectClass").val());
//alert($("#ProblemName").val());
//alert($("#SectionValue").val());
}
  </script>
  <div class="container-table">
    <div class="head-std row">
      <div class="dropdown">
        <select class="form-control" id = "selectClass" name="selectClass" onchange="fillTable();">
          <option value = "">Select Section</option>
        </select>
      </div>
      <button type="button" class="btn btn-secondary right" data-toggle="modal" data-target="#joinClass">Join Section</button>
      <!-- Modal -->
      <div class="modal fade" id="joinClass" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Join Section</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <!--<div class="form-group">-->
              <p>Please Enter Section Password</p>
              <input class="form-control" type="text" placeholder="Password" id = "SectionPassword">
              <!--</div>-->
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary" onclick = "sectionRegister()" >Join</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="tabel-wrapper">
      <div id="table-scroll">
        <table class="table table-striped table-hover main" id = "DataFromAjax">
          <thead class="thead">
     <tr>
              <th style="width:15%">
                ID
              </th>
              <th style="width:40%">
                ชื่อโจทย์
              </th>
              <th style="width:15%">
                จำนวนที่ส่ง(ครั้ง)
              </th>
              <th style="width:15%">
                สถานะ
              </th>
              <th style="width:15%">
                Upload
              </th>
     </tr>
          </thead>
          <div class='modal fade' id='test1' role='dialog'>
            <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h4 class='modal-title' id = 'modalValue'></h4>
                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
                </div>
                <div class='modal-body' style='margin:auto;'>
                <form class="form-horizontal" role="form" action="Core.php" method="post" enctype="multipart/form-data" />
                  <label class='file'>
                  <input type='hidden' name = "ProblemName" id = "ProblemName">
		  <input type='hidden' name = "SectionValue" id = "SectionValue">
		  <input type='file' name = "Uploaded_file" id = "Uploaded_file">
                  <span class='file-custom'></span>
                  </label>
                </div>
                <div class='modal-footer'>
                  <button type='submit' class='btn btn-secondary'>Upload</button>
                </div>
              </form>
              </div>
            </div>
          </div>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>

</html>
