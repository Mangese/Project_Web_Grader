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

?>
<body>
<input type = "text" onclick = "showText()" />
<label id = "txtHint">yea</label>
  <script>
    	$(document).ready(function()
	{
	
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
 function logout()
{
window.location = "logout.php";
}
function showText()
{
	str = $("#selectClass").val();
	alert(str);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
	if(this.readyState == 4 && this.status == 200){
	document.getElementById("txtHint").innerHTML = this.responseText;
	alert("success");
	}
	}
	xmlhttp.open("GET","AjaxTest.php?q="+str,true);
	xmlhttp.send();
}
function ModalHeaderFunc(x)
{
$("#TableUploadHeader").val($(x).closest("tr").find(".use").text());
}
  </script>
  <div class="container-table">
    <div class="head-std row">
      <div class="dropdown">
        <select class="form-control" name="selmain" id = "selectClass">
          <option>Select Section</option>
          <option>EGCO111 Computer Programming (CO)</option>
          <option>EGCO111 Computer Programming (EE)</option>
          <option>EGCO112 Programming Technique</option>
        </select>
      </div>
      <button type="button" class="btn btn-secondary right" data-toggle="modal" data-target="#joinClass">Join Class</button>
      <!-- Modal -->
      <div class="modal fade" id="joinClass" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Join Class</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <!--<div class="form-group">-->
              <p>Please Enter Section Password</p>
              <input class="form-control" type="text" placeholder="Password">
              <!--</div>-->
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary" data-dismiss="modal">Join</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="tabel-wrapper">
      <div id="table-scroll">
        <table class="table table-striped table-hover main">
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
        </table>
      </div>
    </div>
  </div>

</body>

</html>
