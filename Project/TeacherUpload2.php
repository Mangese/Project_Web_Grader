<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#000000">

  <link rel="manifest" href="%PUBLIC_URL%/manifest.json">
  <link rel="shortcut icon" href="%PUBLIC_URL%/favicon.ico">


  <!--bootstrap 4-->
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
    - crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
    crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
  />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>


  <!--Font Awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="TeacherUpload.css">

  <nav class="navbar navbar-light bg-light" style="background-color: #0C3343; color:#ffffff">
    <form class="form-inline">
      <span class="h3" class="navbar-brand mb-0">Teacher</span>
      <label class="ml-auto " id="SessionUser"></label>
      <button class="btn btn-outline-secondary logout-btn ml-4 my-2 my-sm-0" onclick="logout()" type="button">Logout</button>
    </form>
  </nav>
</head>
<?php
  session_start();

  if(!isset($_SESSION["user"]))
  {
  echo "<script> alert('Please Login First'); window.location = 'logout.php'; </script>";
  }
  else
  {
  echo "<script> document.getElementById('SessionUser').innerText = '".$_SESSION["firstname"]." ".$_SESSION["lastname"]."'; </script>";
  $UT = $_SESSION["utype"];
  if(strcmp($UT,"T"))
  {
	  echo "<script> alert('Invalid Page'); window.location = 'StudentUpload1.php'; </script>";
  }
  }
?>

  <body>
    <!--Start script-->

    <script>
                  $(document).ready(function () {
                    fillDropDownSection();
                    fillDropHw();
                    fillTable();
                    fillTableHw();
                    fillTableResult();
                    fillDropCreateClass();
                    fillDropResult();
                    fillGetTableProblem();


                  });
                  $('#myTab a').click(function (e) {
                    e.preventDefault()
                    $(this).tab('show')
                  })
                  //                   $(function () {
                  //                     $('#datetimepicker1').datepicker({
                  //                       format: 'DD/MM/YYYY'
                  //                     });
                  //                   });
                  function DMYpicker(x) {
                    //alert(x);

                    $('#' + x).datetimepicker({
                      minDate: new Date(),
                      format: 'YYYY-MM-DD'


                    });
                  }
                  //                   $(function () {
                  //                     $('#datetimepicker3').datepicker({
                  //                       format: 'LT'
                  //                     });
                  //                   });
                  function Timepicker(y) {
                    //alert(y);
                    $('#' + y).datetimepicker({
                      format: 'HH:mm'

                    });

                  }
                  function ResultModalHeader(x, y, z, qq, stuid, submitcount, getFullMark) {
                    alert(x);
                    // alert(y);
                    // alert(submitcount);
                    alert(qq);
                    alert(getFullMark);

                    var fullMarkV = document.getElementById("fullMark");
                    var setMarkV = document.getElementById("setMark");
                    var markSubBtnV = document.getElementById("markSubBtn");
                    document.getElementById('fullMark').innerHTML = "/ " + getFullMark;
                    if (getFullMark != "") {
                      fullMarkV.style.display = "block";
                      setMarkV.style.display = "block";
                      markSubBtnV.style.display = "block";
                    } else {
                      fullMarkV.style.display = "none";
                      setMarkV.style.display = "none";
                      markSubBtnV.style.display = "none";
                    }
                    document.getElementById('modalValueResult').innerHTML = "StudentID. " + stuid + " Homework " + qq;
                    document.getElementById('submitCount').innerHTML = "Total submission : " + submitcount;
                    //submitCount
                    $('#tb3LastSendFile tbody tr').remove();
                    str = $("#selSectionHw").val();
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                      if (this.readyState == 4 && this.status == 200) {
                        $('#tb3LastSendFile').append(this.responseText);
                      }
                    }
                    xmlhttp.open("POST", "FillLastSendFileResult.php?uidreq=" + x + "&hidreq=" + y + "&countrow=" + z, true);
                    xmlhttp.send();
                  }


                  function fillDropDownSection() {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                      if (this.readyState == 4 && this.status == 200) {
                        eval(this.responseText);
                      }
                    }
                    xmlhttp.open("POST", "DropDownForT.php", true);
                    xmlhttp.send();
                  }
                  function RealDelete() {
                    y = $('#DeleteModalCheck').val();
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                      if (this.readyState == 4 && this.status == 200) {
                      }
                    }
                    xmlhttp.open("POST", "DeleteProblem.php?pid=" + y, true);
                    xmlhttp.send();
                    fillTable();
                  }
                  function DeleteProblem(x, y) {
                    $('#DeleteModalCheck').val(y);
                  }
                  function RealDeleteHw() {
                    y = $('#DeleteModalCheck').val();
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                      if (this.readyState == 4 && this.status == 200) {
                      }
                    }
                    xmlhttp.open("POST", "DeleteHw.php?hid=" + y, true);
                    xmlhttp.send();
                    fillTableHw();
                  }
                  function DeleteHw(x, y) {
                    $('#DeleteModalCheck').val(y);
                  }
                  function check() {
                    var x = 0;
                    $('table [type="checkbox"]').each(function (i, chk) {
                      if (chk.checked) {
                        num = i + 1;
                        dateName = "datetimepicker" + num.toString() + "Name";
                        timeName = "timepicker" + num.toString() + "Name";
                        fullMarkName = "fullMark" + num.toString() + "Name";
                        if (document.getElementById(dateName).value == "" || document.getElementById(timeName).value == "") {
                          x = 1;
                        }
                      }
                    });
                    if (x == 1) {
                      alert("Please input all detail");
                    }
                    else {
                      $('table [type="checkbox"]').each(function (i, chk) {
                        if (chk.checked) {
                          num = i + 1;
                          dateName = "datetimepicker" + num.toString() + "Name";
                          timeName = "timepicker" + num.toString() + "Name";
                          fullMarkName = "fullMark" + num.toString() + "Name";
                          str = $("#selSectionHw").val();
                          var xmlhttp = new XMLHttpRequest();
                          xmlhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                              eval(this.responseText);
                            }
                          }
                          xmlhttp.open("POST", "AssignHW.php?pid=" + chk.value + "&sid=" + str + "&date=" + document.getElementById(dateName).value + "&time=" + document.getElementById(timeName).value + "&fullMark=" + document.getElementById(fullMarkName).value, true);
                          xmlhttp.send();
                          location.reload();
                          alert(dateName);
                          alert(timeName);
                          alert(fullMarkName);
                          alert(document.getElementById(dateName).value);
                          alert(document.getElementById(timeName).value);
                          alert(document.getElementById(fullMarkName).value);

                        }
                      });
                    }
                  }
                  function fillTable() {
                    x = document.getElementById("selectClass").value;
                    y = document.getElementById("UploadButton");
                    if (x != "") {
                      y.style.display = 'block';
                    }
                    else {
                      y.style.display = 'none';
                    }
                    $('#DataFromAjax tbody tr').remove();
                    str = $("#selectClass").val();
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                      if (this.readyState == 4 && this.status == 200) {
                        $('#DataFromAjax').append(this.responseText);
                      }
                    }
                    xmlhttp.open("POST", "FillTableT.php?class=" + str, true);
                    xmlhttp.send();

                  }
                  function fillGetTableProblem() {
                    x = document.getElementById("selSectionHw").value;
                    y = document.getElementById("AssignButton");

                    $('#getProblem tbody tr').remove();
                    str = $("#selSectionHw").val();
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                      if (this.readyState == 4 && this.status == 200) {
                        $('#getProblem').append(this.responseText);
                      }
                    }
                    xmlhttp.open("POST", "FillGetTableProblemT.php?class=" + str, true);
                    xmlhttp.send();

                  }

                  function fillDropCreateClass() {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                      if (this.readyState == 4 && this.status == 200) {
                        eval(this.responseText);
                      }
                    }
                    xmlhttp.open("POST", "FillDropCreateClass.php", true);
                    xmlhttp.send();
                  }
                  function fillDropHw() {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                      if (this.readyState == 4 && this.status == 200) {
                        eval(this.responseText);
                      }
                    }
                    xmlhttp.open("POST", "FillDropHW.php", true);
                    xmlhttp.send();
                  }
                  function fillDropResult() {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                      if (this.readyState == 4 && this.status == 200) {
                        eval(this.responseText);
                      }
                    }
                    xmlhttp.open("POST", "FillDropResult.php", true);
                    xmlhttp.send();
                  }
                  function fillUploadCID() {
                    $("#ClassID").val($("#selectClass").val());
                  }
                  function fillTableHw() {
                    x = document.getElementById("selSectionHw").value;
                    y = document.getElementById("AssignButton");

                    if (x != "") {

                      y.style.display = 'block';
                    }
                    else {
                      y.style.display = 'none';
                    }

                    $('#TableHw tbody tr').remove();
                    str = $("#selSectionHw").val();
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                      if (this.readyState == 4 && this.status == 200) {
                        $('#TableHw').append(this.responseText);
                      }
                    }
                    xmlhttp.open("POST", "FillTableHwT.php?class=" + str, true);
                    xmlhttp.send();
                  }
                  function fillTableResult() {
                    x = document.getElementById("selSectionRs").value;
                    $('#Result thead tr').remove();
                    $('#Result tbody tr').remove();
                    str = $("#selSectionRs").val();
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                      if (this.readyState == 4 && this.status == 200) {
                        $('#Result').append(this.responseText);
                      }
                    }
                    xmlhttp.open("POST", "FillTableResult.php?section=" + str, true);
                    xmlhttp.send();


                  }
    </script>

    <input type="hidden" id="DeleteModalCheck" />
    <script>
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
    </script>
    <script>
      function logout() {
        window.location = "logout.php";
      }
      function createSec() {

        var x = document.getElementById("selSectionHw");
        var pClass = $('select[name="createClass"] option:selected').text();
        var pSection = document.getElementById("createSection").value;
        var pSemester = document.getElementById("semester").value;
        var pYear = document.getElementById("year").value;
        str = $("#createClass").val();
        var classCheck = $('select[name="createClass"] option:selected').val();
        if (!!x && !!classCheck && !!pSection && !!pSemester && !!pYear) {
          var option = document.createElement("option");
          option.text = pClass + "(" + pSection + ") - " + pSemester + "/" + pYear + " -";
          x.add(option);
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              $("#sectionPassword").val(this.responseText);
            }
          }
          xmlhttp.open("POST", "createClass.php?text=" + option.text + "&class=" + str, true);
          xmlhttp.send();
          fillDropResult();
          fillDropDownSection();
          changePassword();
          location.reload();
        }
        else {
          alert("Please input all detail");
        }

      }
    </script>
    <!--End script-->



    <div class="container-table">

      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">Problem</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">Homeworks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tab3" role="tab">Results</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">

        <div class="tab-pane active" id="tab1" role="tabpanel">
          <!--Selection-->
          <form class="form-inline" style="margin-top:20px; margin-bottom:20px;">
            <div class="form-group mx-sm-4">
              <select class="form-control" name="selectClass" id="selectClass" onchange="fillTable()">
                             <option value="">Please Select Class</option>
                        </select>
            </div>
          </form>
          <!--Table-->
          <div class="table-wrapper-problem">
            <table class="table table-striped table-hover main" id="DataFromAjax">
              <thead class="thead">
                <tr>
                  <th style="width:40%" onclick="sortTable1(0)">
                    Ploblem name
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:20%" onclick="sortTable1(1)">
                    Upload Date
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:20%" onclick="sortTable1(2)">
                    Language
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:20%">
                    Delete
                  </th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <!--End Table-->

          <!--Start Sort Script-->
          <script>
            function sortTable1(col) {
              var table, rows, switching, i, x, y, shouldSwitch;
              table = document.getElementById("DataFromAjax");
              switching = true;
              /*Make a loop that will continue until
              no switching has been done:*/
              while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.getElementsByTagName("TR");
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                  //start by saying there should be no switching:
                  shouldSwitch = false;
                  /*Get the two elements you want to compare,
                  one from current row and one from the next:*/
                  x = rows[i].getElementsByTagName("TD")[col];
                  y = rows[i + 1].getElementsByTagName("TD")[col];
                  //check if the two rows should switch place:
                  if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                  }
                }
                if (shouldSwitch) {
                  /*If a switch has been marked, make the switch
                  and mark that a switch has been done:*/
                  rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                  switching = true;
                }
              }
            }
          </script>
          <!--End Script-->

          <!--Foot Part-->
          <div class="foot-t left">
            <button type="button" class="btn btn-secondary" id="UploadButton" onclick="fillUploadCID();" data-toggle="modal" data-target="#myModal1">Upload Problem</button>
          </div>
          <!-- Modal1 -->
          <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog modal-md">

              <!-- Modal content-->
              <form accept-charset="utf-8" name="form1" method="post" action="ProblemUpload.php" enctype="multipart/form-data">

                <div class="modal-content">
                  <div class="modal-header">
                    <!-- <h4 class="modal-title">Section : xxx</h4> -->
                    <h4 class="modal-title">Upload</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <div class="modal-body left">
                    <input type='hidden' name="ClassID" id="ClassID">
                    <label>Problem name : </label><br>
                    <input type="text" name="ProblemNameUp" id="ProblemNameUp" class="form-control" style="width:90%" placeholder="Problem Name"
                      required oninvalid="this.setCustomValidity('Problem name is empty,\nInput only (A-Z,a-z,0-9)\nmin length: 4');"
                      oninput="setCustomValidity('')" minlength=4 maxlength=20 pattern="[A-Za-z,0,1,2,3,4,5,6,7,8,9]{4,}" />
                    <label>File : </label><br>
                    <label class="file">
                                <input type="file" id = "PDFFile" name = "PDFFile" accept=".pdf" required />
                                <span class="file-custom" style="width:132%"></span>
                                </label><br>
                    <label>Input : </label><br>
                    <label class="file">
                                <input type="file" id = "InFile" name = "InFile" accept=".zip" required  />
                                <span class="file-custom" style="width:132%"></span>
                                </label><br>
                    <label>Output : </label><br>
                    <label class="file">
                                <input type="file" id = "OutFile" name = "OutFile" accept=".zip" required />
                                <span class="file-custom" style="width:132%"></span>
                                </label><br>

                    <label class="radio-inline">
                                    <input type="radio" name="optradio" id = "optradio" value="C" required>C
                                </label>
                    <label class="radio-inline">
                                    <input type="radio" name="optradio" id = "optradio" value="Cpp">C++
                                </label>
                    <label class="radio-inline">
                                    <input type="radio" name="optradio" id = "optradio" value="Java">Java
                                </label>
                  </div>

                  <div class="modal-footer">
                    <!--<button type="button" class="btn btn-success" data-dismiss="modal">Upload</button>-->
                    <button type="submit" class="btn btn-success" onclick="$('#myModal1').modal('hide')">Upload</button>
                  </div>

                </div>
              </form>
            </div>
          </div>
          <!--End Modal1-->

        </div>
        <!-- End Tab 1 -->

        <div class="tab-pane" id="tab2" role="tabpanel">

          <script>
            function changePassword() {
              var x = document.getElementById("selSectionHw").value;
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  $("#sectionPassword").val(this.responseText);
                }
              }
              xmlhttp.open("POST", "FillSectionPassword.php?class=" + x, true);
              xmlhttp.send();
              fillTableHw();
            }
          </script>

          <!--Head part-->
          <form class="form-inline justify-content-between" style="margin-top:20px; margin-bottom:20px;">
            <!--Head 1-->
            <div class="form-group mx-sm-4">
              <select class="form-control" name="selSectionHw" id="selSectionHw" onchange="changePassword()">
                            <option value="">
                                Please Select Section
                            </option>
                        </select>
            </div>

            <!--Head 2-->
            <div class="form-group mx-sm-4">
              <label for="staticPassword" style="margin-right:12px">Password  </label>
              <input type="text" readonly class="form-control" id="sectionPassword" style="width:150px">
            </div>

            <!--Head 3-->
            <div class="form-group mx-sm-4">
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal3">Create Section</button>
              <!-- Modal3 -->
              <div class="modal fade" id="myModal3" role="dialog">
                <div class="modal-dialog modal-sm">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <form name="from3" method="post">
                      <div class="modal-header">
                        <h4 class="modal-title">Create Section</h4>
                        <button type="button" align='right' class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body left">
                        <label>Class</label>
                        <select class="form-control" name="createClass" id="createClass" style="width:80%" required oninvalid="this.setCustomValidity('Please select some class');"
                          oninput="setCustomValidity('')">
                                                <option value="">Please Select Classroom</option>
                                            </select>
                        <!-- <label for="staticEmail" class="col-sm-2 col-form-label">Password</label> -->

                        <label>Section</label>
                        <input type="text" class="form-control" name="createSection" id="createSection" style="width:80%" placeholder="Section" required
                          oninvalid="this.setCustomValidity('Section is empty,\nInput only (A-Z,a-z,0-9)');" oninput="setCustomValidity('')"
                          minlength=1 maxlength=20 pattern="[A-Za-z,0,1,2,3,4,5,6,7,8,9]{1,}" />

                        <label>Semester</label>

                        <!-- <div class="dropdown"> -->
                        <select class="form-control" name="semester" id="semester" style="width: 80%;" required oninvalid="this.setCustomValidity('Please select some semester');"
                          oninput="setCustomValidity('')">
                                                <option value="">Semester</option>
                                                <script>
                                                  for (var j = 1; j < 4; j++) {
                                                    document.write('<option value="' + j + '">' + j + '</option>');
                                                  }
                                                </script>
                                            </select>
                        <!-- </div> -->

                        <label>Year</label>
                        <select class="form-control" name="year" id="year" style="width: 80%;" required oninvalid="this.setCustomValidity('Please select some year');"
                          oninput="setCustomValidity('')">
                                                <option value="">Year</option>
                                                    <script>
                                                      var cyear = new Date().getFullYear();
                                                      cyear = cyear + 543;
                                                      for (var i = cyear - 2; i < cyear + 3; i++) {
                                                        document.write('<option value="' + i + '">' + i + '</option>');
                                                      }
                                                    </script>
                                            </select>

                      </div>
                      <div class="modal-footer">
                        <!--<button type="button" class="btn btn-success" data-dismiss="modal" onclick="myFunction()">Create</button>-->
                        <button type="button" class="btn btn-success" onclick="createSec()">Create</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!--End Modal-->
            </div>
            <!--End Head 3-->

          </form>
          <!--End Head part-->

          <!--Table part-->
          <div class="table-wrapper-problem">
            <table class="table table-striped table-hover main" id="TableHw">
              <thead class="thead">
                <tr style="width:100%">
                  <th style="width:10%" onclick="SortNumber(0,'N')">
                    Exam No.
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:20%" onclick="SortNumber(1,'T')">
                    Exam Name
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:10%" onclick="SortNumber(2,'T')">
                    Language
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:13%" onclick="SortNumber(3,'N')">
                    Total Submit
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:13%" onclick="SortNumber(4,'N')">
                    Total Pass
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:12%" onclick="SortNumber(5,'T')">
                    Assign Date
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:12%" onclick="SortNumber(6,'T')">
                    Due Date
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:10%">
                    Delete
                  </th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <!--End Table-->

          <!--Start Sort Script-->
          <script>
                                                      function sortTable2(col) {
                                                        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                                                        table = document.getElementById("TableHw");
                                                        switching = true;
                                                        //Set the sorting direction to ascending:
                                                        dir = "asc";
                                                        /*Make a loop that will continue until
                                                        no switching has been done:*/
                                                        while (switching) {
                                                          //start by saying: no switching is done:
                                                          switching = false;
                                                          rows = table.getElementsByTagName("TR");
                                                          /*Loop through all table rows (except the
                                                          first, which contains table headers):*/
                                                          for (i = 1; i < (rows.length - 1); i++) {
                                                            //start by saying there should be no switching:
                                                            shouldSwitch = false;
                                                            /*Get the two elements you want to compare,
                                                            one from current row and one from the next:*/
                                                            x = rows[i].getElementsByTagName("TD")[col];
                                                            y = rows[i + 1].getElementsByTagName("TD")[col];
                                                            /*check if the two rows should switch place,
                                                            based on the direction, asc or desc:*/
                                                            if (dir == "asc") {
                                                              if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                                                //if so, mark as a switch and break the loop:
                                                                shouldSwitch = true;
                                                                break;
                                                              }
                                                            } else if (dir == "desc") {
                                                              if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                                                //if so, mark as a switch and break the loop:
                                                                shouldSwitch = true;
                                                                break;
                                                              }
                                                            }
                                                          }
                                                          if (shouldSwitch) {
                                                            /*If a switch has been marked, make the switch
                                                            and mark that a switch has been done:*/
                                                            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                                                            switching = true;
                                                            //Each time a switch is done, increase this count by 1:
                                                            switchcount++;
                                                          } else {
                                                            /*If no switching has been done AND the direction is "asc",
                                                            set the direction to "desc" and run the while loop again.*/
                                                            if (switchcount == 0 && dir == "asc") {
                                                              dir = "desc";
                                                              switching = true;
                                                            }
                                                          }
                                                        }
                                                      }
          </script>
          <!--End Script-->

          <!-- Sort Number Script -->
          <script type="text/javascript">
            var TableIDvalue = "TableHw";

            var TableLastSortedColumn = -1;
            function SortNumber() {
              var sortColumn = parseInt(arguments[0]);
              var type = arguments.length > 1 ? arguments[1] : 'T';
              var dateformat = arguments.length > 2 ? arguments[2] : '';
              var table = document.getElementById(TableIDvalue);
              var tbody = table.getElementsByTagName("tbody")[0];
              var rows = tbody.getElementsByTagName("tr");
              var arrayOfRows = new Array();
              type = type.toUpperCase();
              dateformat = dateformat.toLowerCase();
              for (var i = 0, len = rows.length; i < len; i++) {
                arrayOfRows[i] = new Object;
                arrayOfRows[i].oldIndex = i;
                var celltext = rows[i].getElementsByTagName("td")[sortColumn].innerHTML.replace(/<[^>]*>/g, "");
                if (type == 'D') { arrayOfRows[i].value = GetDateSortingKey(dateformat, celltext); }
                else {
                  var re = type == "N" ? /[^\.\-\+\d]/g : /[^a-zA-Z0-9]/g;
                  arrayOfRows[i].value = celltext.replace(re, "").substr(0, 25).toLowerCase();
                }
              }
              if (sortColumn == TableLastSortedColumn) { arrayOfRows.reverse(); }
              else {
                TableLastSortedColumn = sortColumn;
                switch (type) {
                  case "N": arrayOfRows.sort(CompareRowOfNumbers); break;
                  case "D": arrayOfRows.sort(CompareRowOfNumbers); break;
                  default: arrayOfRows.sort(CompareRowOfText);
                }
              }
              var newTableBody = document.createElement("tbody");
              for (var i = 0, len = arrayOfRows.length; i < len; i++) {
                newTableBody.appendChild(rows[arrayOfRows[i].oldIndex].cloneNode(true));
              }
              table.replaceChild(newTableBody, tbody);
            } // function SortTable()

            function CompareRowOfText(a, b) {
              var aval = a.value;
              var bval = b.value;
              return (aval == bval ? 0 : (aval > bval ? 1 : -1));
            } // function CompareRowOfText()

            function CompareRowOfNumbers(a, b) {
              var aval = /\d/.test(a.value) ? parseFloat(a.value) : 0;
              var bval = /\d/.test(b.value) ? parseFloat(b.value) : 0;
              return (aval == bval ? 0 : (aval > bval ? 1 : -1));
            } // function CompareRowOfNumbers()

            function GetDateSortingKey(format, text) {
              if (format.length < 1) { return ""; }
              format = format.toLowerCase();
              text = text.toLowerCase();
              text = text.replace(/^[^a-z0-9]*/, "");
              text = text.replace(/[^a-z0-9]*$/, "");
              if (text.length < 1) { return ""; }
              text = text.replace(/[^a-z0-9]+/g, ",");
              var date = text.split(",");
              if (date.length < 3) { return ""; }
              var d = 0, m = 0, y = 0;
              for (var i = 0; i < 3; i++) {
                var ts = format.substr(i, 1);
                if (ts == "d") { d = date[i]; }
                else if (ts == "m") { m = date[i]; }
                else if (ts == "y") { y = date[i]; }
              }
              d = d.replace(/^0/, "");
              if (d < 10) { d = "0" + d; }
              if (/[a-z]/.test(m)) {
                m = m.substr(0, 3);
                switch (m) {
                  case "jan": m = String(1); break;
                  case "feb": m = String(2); break;
                  case "mar": m = String(3); break;
                  case "apr": m = String(4); break;
                  case "may": m = String(5); break;
                  case "jun": m = String(6); break;
                  case "jul": m = String(7); break;
                  case "aug": m = String(8); break;
                  case "sep": m = String(9); break;
                  case "oct": m = String(10); break;
                  case "nov": m = String(11); break;
                  case "dec": m = String(12); break;
                  default: m = String(0);
                }
              }
              m = m.replace(/^0/, "");
              if (m < 10) { m = "0" + m; }
              y = parseInt(y);
              if (y < 100) { y = parseInt(y) + 2000; }
              return "" + String(y) + "" + String(m) + "" + String(d) + "";
            } // function GetDateSortingKey()
          </script>

          <!-- End Sort Number Script -->

          <!--Foot part-->
          <div class="foot-t left" style="margin-top:20px;">
            <button type="button" class="btn btn-secondary" id="AssignButton" data-toggle="modal" data-target="#modalAssignHomework"
              onclick="fillGetTableProblem()">Assign Homework</button>
          </div>
          <!-- modalAssignHomework -->
          <div class="modal fade" id="modalAssignHomework" role="dialog">
            <div class="modal-dialog modal-lg">

              <!-- Modal content-->
              <div class="modal-content">
                <form name="from5" method="post" action="xxx.php">
                  <div class="modal-header">
                    <h4 class="modal-title">Assign Homework</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <div class="modal-body">
                    <table class="table table-striped table-hover main" id="getProblem">
                      <thead class="thead">
                        <tr>
                          <th style="width:18%">
                            Exam name
                          </th>
                          <th style="width:13%">
                            Full mark
                          </th>
                          <th style="width:10%">
                            Language
                          </th>
                          <th style="width:25%">
                            Deadline
                          </th>
                          <th style="width:25%">
                            Time
                          </th>
                          <th style="width:9%">
                            Select
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- <tr>
                          <td style="width:30%">
                            Exam1
                          </td>
                          <td style="width:10%">
                            C
                          </td>
                          <td style="width:25%">
                            <div class="form-group">
                              <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" placeholder="Date Send" />
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </td>
                          <td style="width:25%">
                            <div class="form-group">
                              <div class='input-group date' id='datetimepicker3'>
                                <input type='text' class="form-control" placeholder="Time Send" />
                                <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-time"></span>
                                </span>
                              </div>
                            </div>
                          </td>
                          <td style="width:10%">
                            <input type="checkbox" name="vehicle" value="test1C"><br>
                          </td>
                        </tr>
                        <tr>
                          <td style="width:30%">
                            Exam2
                          </td>
                          <td style="width:10%">
                            C++
                          </td>
                          <td style="width:25%">

                          </td>
                          <td style="width:25%">

                          </td>
                          <td style="width:10%">
                            <input type="checkbox" name="vehicle" value="test1C"><br>
                          </td>
                        </tr> -->
                      </tbody>
                    </table>
                  </div>
                  <!--End modal-body-->

                  <div class="modal-footer">
                    <!--<button type="button" class="btn btn-success" data-dismiss="modal">OK</button>-->
                    <button type="button" class="btn btn-success" onclick="check();">OK</button>
                  </div>
                </form>
              </div>
            </div>
          </div>


        </div>
        <!-- End Tab 2 -->

        <div class="tab-pane" id="tab3" role="tabpanel">
          <!--Head part-->
          <form class="form-inline" style="margin-top:20px; margin-bottom:20px">
            <div class="form-group mx-sm-4">
              <select class="form-control" name="selSectionRs" id="selSectionRs" onchange="fillTableResult();">
                              <option value="">Please Select Section</option>
                          </select>
            </div>
          </form>

          <!--Table part-->
          <div class="table-wrapper">
            <table class="table table-bordered table-striped table-hover main" id="Result">
              <thead class="thead">
                <tr style="width:100%">
                  <th style="width:100px" onclick="sortTable(0)">
                    ID
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:250px" onclick="sortTable(1)">
                    Name
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <script>
                    var numOfProb = 5
                    for (var i = 1; i <= numOfProb; i++)
                      document.write('<th style="min-width:30px">ex ' + i + '</th>')
                  </script>
                  <th style="width:100px" onclick="sortTable(22)">
                    Pass
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <!--End Table part-->

          <!--Start Sort Script-->
          <script>
                    function sortTable(col) {
                      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                      table = document.getElementById("Result");
                      switching = true;
                      //Set the sorting direction to ascending:
                      dir = "asc";
                      /*Make a loop that will continue until
                      no switching has been done:*/
                      while (switching) {
                        //start by saying: no switching is done:
                        switching = false;
                        rows = table.getElementsByTagName("TR");
                        /*Loop through all table rows (except the
                        first, which contains table headers):*/
                        for (i = 1; i < (rows.length - 2); i++) {
                          //start by saying there should be no switching:
                          shouldSwitch = false;
                          /*Get the two elements you want to compare,
                          one from current row and one from the next:*/
                          x = rows[i].getElementsByTagName("TD")[col];
                          y = rows[i + 1].getElementsByTagName("TD")[col];
                          /*check if the two rows should switch place,
                          based on the direction, asc or desc:*/
                          if (dir == "asc") {
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                              //if so, mark as a switch and break the loop:
                              shouldSwitch = true;
                              break;
                            }
                          } else if (dir == "desc") {
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                              //if so, mark as a switch and break the loop:
                              shouldSwitch = true;
                              break;
                            }
                          }
                        }
                        if (shouldSwitch) {
                          /*If a switch has been marked, make the switch
                          and mark that a switch has been done:*/
                          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                          switching = true;
                          //Each time a switch is done, increase this count by 1:
                          switchcount++;
                        } else {
                          /*If no switching has been done AND the direction is "asc",
                          set the direction to "desc" and run the while loop again.*/
                          if (switchcount == 0 && dir == "asc") {
                            dir = "desc";
                            switching = true;
                          }
                        }
                      }
                    }
          </script>
          <!--End Script-->

          <!-- <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal0">Infer</button> -->

          <!-- Modal0 -->
          <div class="modal fade" id="modalSourceFileSend" role="dialog">
            <div class="modal-dialog modal-lg">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id='modalValueResult'></h4>
                  <button type="button" align='right' class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body left">
                  <table class="table table-striped table-hover main" id="tb3LastSendFile">
                    <thead class="thead">
                      <tr>
                        <th style="width:7%">
                          No.
                        </th>
                        <th style="width:23%">
                          Submit date
                        </th>
                        <th style="width:23%">
                          Submit time
                        </th>
                        <th style="width:14%">
                          Status
                        </th>
                        <th style="width:15%">
                          Test case
                        </th>
                        <th style="width:18%">
                          Download
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <div class="container">

                      <div class="row">
                        <div class="col-xs-1 col-sm-1 col-md-5 col-lg-5">
                          <h5 id='submitCount'></h5>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-3 col-lg-3">
                          <input type="text" style="border:none; text-align:right;" name="setMark" id='setMark' placeholder="Mark">
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2">
                          <h5 id='fullMark' name='fullMark'>/Full mark</h5>
                        </div>
                      </div>

                    </div>
                    <br>
                  </table>
                </div>
                <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal">Download</button>
                  <!- - <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal3" onclick="createSec();">Create</button> - ->
                </div> -->
                <div class="modal-footer">
                  <!--<button type="button" class="btn btn-success" data-dismiss="modal">OK</button>-->
                  <button type="button" id='markSubBtn' name='markSubBtn' class="btn btn-success">Mark submit</button>
                </div>
              </div>
            </div>
          </div>
          <!-- End modal 0 -->

        </div>
        <!-- End Tab 3 -->

      </div>
      <!-- Tab panes -->

    </div>
    <!--container-table-->
    <div class="modal fade" id="modalChackDelete" role="dialog">
      <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
          <form name="from5" method="post">
            <!-- <div class="modal-header">
		    <h4 class="modal-title">Delete Chacking</h4>
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div> -->

            <div class="modal-body " style="text-align: center; margin-bottom:20px;">

              <h5 style="margin-bottom:20px">Do you want to delete?</h5>
              <button type="button" class="btn btn-success" onclick="RealDelete();" data-dismiss="modal" style="margin-right:5px">Yes</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>


            </div>
            <!--End modal-body-->

            <!-- <div class="modal-footer">
		    <!- -<button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
		    <button type="submit" class="btn btn-success" onclick="$('#modalChackDelete').modal('hide');">Delete</button>
		  </div> -->
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalChackDeleteHw" role="dialog">
      <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
          <form name="from5" method="post">
            <!-- <div class="modal-header">
		    <h4 class="modal-title">Delete Chacking</h4>
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div> -->

            <div class="modal-body " style="text-align: center; margin-bottom:20px;">

              <h5 style="margin-bottom:20px">Do you want to delete?</h5>
              <button type="button" class="btn btn-success" onclick="RealDeleteHw();" data-dismiss="modal" style="margin-right:5px">Yes</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>


            </div>
            <!--End modal-body-->

            <!-- <div class="modal-footer">
		    <!- -<button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
		    <button type="submit" class="btn btn-success" onclick="$('#modalChackDelete').modal('hide');">Delete</button>
		  </div> -->
          </form>
        </div>
      </div>
    </div>
  </body>

</html>
