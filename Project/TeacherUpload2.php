<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#000000">

  <link rel="manifest" href="%PUBLIC_URL%/manifest.json">
  <link rel="shortcut icon" href="%PUBLIC_URL%/favicon.ico">


  <!--bootstrap 4-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
    crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
    crossorigin="anonymous"></script>
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
<!--<?php
  session_start();

  if(!isset($_SESSION["user"]))
  {
  echo "<script> alert('Please Login First'); window.location = 'logout.php'; </script>";
  }
  else
  {
  echo "<script> document.getElementById('SessionUser').innerText = '".$_SESSION["user"]."' </script>";
  $UT = $_SESSION["utype"];
  if(strcmp($UT,"T"))
  {
	  echo "<script> alert('Invalid Page'); window.location = 'StudentUpload1.php'; </script>";
  }
  }
?>-->

<body>
  <!--Start script-->
  <script>
    $(document).ready(function () {
      fillDropDownSection();
      fillDropHw();
      fillTable();
      fillTableHw()
    });
    $('#myTab a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
    $(function () {
      $('#datetimepicker1').datetimepicker({
        format: 'DD/MM/YYYY'
      });
    });
    $(function () {
      $('#datetimepicker3').datetimepicker({
        format: 'LT'
      });
    });
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
  </script>

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
        <table class="table table-striped table-hover main" id="DataFromAjax">
          <thead class="thead">
            <tr>
              <th style="width:40%">
                ชื่อโจทย์
              </th>
              <th style="width:20%">
                วันที่อัพไฟล์
              </th>
              <th style="width:20%">
                ภาษา
              </th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>

        <!--Foot Part-->
        <div class="foot-t left">
          <button type="button" class="btn btn-secondary" id="UploadButton" data-toggle="modal" data-target="#myModal1">Upload Problem</button>
        </div>
        <!-- Modal1 -->
        <div class="modal fade" id="myModal1" role="dialog">
          <div class="modal-dialog modal-md">

            <!-- Modal content-->
            <div class="modal-content">
              <!--<form name="from1" method="post" action=""> -->
              <div class="modal-header">
                <!-- <h4 class="modal-title">Section : xxx</h4> -->
                <h4 class="modal-title">Upload</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <div class="modal-body left">
                <label>Problem Name : </label><br>
                <input type="text" class="form-control" style="width:90%" placeholder="Problem Name">
                <label>File : </label><br>
                <label class="file">
                                <input type="file">
                                <span class="file-custom" style="width:132%"></span>
                                </label><br>
                <label>Input : </label><br>
                <label class="file">
                                <input type="file">
                                <span class="file-custom" style="width:132%"></span>
                                </label><br>
                <label>Output : </label><br>
                <label class="file">
                                <input type="file">
                                <span class="file-custom" style="width:132%"></span>
                                </label><br>

                <label class="radio-inline">
                                    <input type="radio" name="optradio" var="C">C
                                </label>
                <label class="radio-inline">
                                    <input type="radio" name="optradio" var="Cpp">C++
                                </label>
                <label class="radio-inline">
                                    <input type="radio" name="optradio" var="Java">Java
                                </label>
              </div>

              <div class="modal-footer">
                <!--<button type="button" class="btn btn-success" data-dismiss="modal">Upload</button>-->
                <button type="submit" class="btn btn-success" onclick="$('#myModal1').modal('hide')">Upload</button>
              </div>
              <!-- </form> -->
            </div>
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
                      <select class="form-control" name="createClass" id="createClass" style="width:80%">
                                                <option>Please Select Classroom</option>
                                                <option value = '3'>EGCO111 Computer Programming</option>
                                                <option value = '4'>EGCO112 Programming Technique</option>
                                            </select>

                      <!-- <label for="staticEmail" class="col-sm-2 col-form-label">Password</label> -->

                      <label>Section</label>
                      <input type="text" class="form-control" name="createSection" id="createSection" style="width:80%" placeholder="Section">

                      <label>Semester</label>

                      <!-- <div class="dropdown"> -->
                      <select class="form-control" name="semester" id="semester" style="width: 80%;">
                                                <option>ภาคการศึกษา</option>
                                                <script>
                                                  for (var j = 1; j < 4; j++) {
                                                    document.write('<option value="' + j + '">' + j + '</option>');
                                                  }
                                                </script>
                                            </select>
                      <!-- </div> -->

                      <label>Year</label>
                      <select class="form-control" name="year" id="year" style="width: 80%;">
                                                <option>ปีการศึกษา</option>
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
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal3" onclick="createSec();">Create</button>
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
        <table class="table table-striped table-hover main" id="TableHw">
          <thead class="thead">
            <tr>
              <th style="width:20%">
                ชื่อโจทย์
              </th>
              <th style="width:20%">
                ภาษาที่ใช้
              </th>
              <th style="width:20%">
                จำนวนนักศึกษาที่ส่ง
              </th>
              <th style="width:20%">
                จำนวนนักศึกษาทีผ่าน
              </th>
              <th style="width:20%">
                ดูรายละเอียด
              </th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>

        <!--Foot part-->
        <div class="foot-t left" style="margin-top:20px;">
          <button type="button" class="btn btn-secondary" id="AssignButton" data-toggle="modal" data-target="#myModal2">Assign Homework</button>
        </div>
        <!-- Modal2 -->
        <div class="modal fade" id="myModal2" role="dialog">
          <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
              <form name="from5" method="post" action="xxx.php">
                <div class="modal-header">
                  <h4 class="modal-title">Assign Homework</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                  <table class="table table-striped table-hover main">
                    <thead class="thead">
                      <tr>
                        <th style="width:30%">
                          ชื่อโจทย์
                        </th>
                        <th style="width:10%">
                          ภาษาที่ใช้
                        </th>
                        <th style="width:25%">
                          กำหนดส่ง
                        </th>
                        <th style="width:25%">
                          เวลา
                        </th>
                        <th style="width:10%">
                          เลือก
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="width:30%">
                          โปรแกรมวาดรูป3เหลี่ยม
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
                          โปรแกรมทอนเงินเป็นเหรียญ
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
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--End modal-body-->

                <div class="modal-footer">
                  <!--<button type="button" class="btn btn-success" data-dismiss="modal">OK</button>-->
                  <button type="submit" class="btn btn-success" onclick="$('#myModal2').modal('hide');">OK</button>
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
            <select class="form-control" name="selSectionRs" id="selSectionRs">
                              <option value="">Please Select Section</option>
                          </select>
          </div>
        </form>

        <!--Table part-->
        <div class="table-wrapper">
          <table class="table table-bordered table-striped table-hover main" id="Result">
            <thead class="thead">
              <tr style="width:100%">
                <th style="width:100px">
                  ID
                </th>
                <th style="width:250px">
                  Name
                </th>
                <script>
                                                      var numOfProb = 10
                                                      for (var i = 1; i <= numOfProb; i++)
                                                        document.write('<th style="min-width:30px">ข้อ ' + i + '</th>')
                </script>
                <th style="width:100px">
                  Pass
                </th>
              </tr>
            </thead>
            <tbody>
              <tr style="width:100%">
                <td style="width:100px">
                  5713999
                </td>
                <td style="width:250px">
                  นายไก่กา ปากระป๋อง
                </td>
                <script>
                                                        var numOfProb = 10
                                                        for (var i = 1; i <= numOfProb; i++)
                                                          document.write('<td style="min-width:30px"><i class="fa fa-check" aria-hidden="true" style="color:#2ECC71" data-toggle="modal" data-target="#myModal0" ></i></td>')
                </script>
                <td style="width:100px">
                  10/10
                </td>
              </tr>
              <tr style="width:100%">
                <td style="width:100px">
                  5713555
                </td>
                <td style="width:250px">
                  นายไข่ กลมดิ้ก
                </td>
                <script>
                                                        var numOfProb = 10
                                                        for (var i = 1; i <= numOfProb; i++)
                                                          document.write('<td style="min-width:30px"><i class="fa fa-times" aria-hidden="true" style="color:#E74C3C"></i></td>')
                </script>
                <td style="width:100px">
                  0/10
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td style="width:100px">

                </td>
                <td style="width:250px">

                </td>
                <script>
                                                        var numOfProb = 10
                                                        var sum = ["3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "4", "2", "3", "4", "2"]
                                                        for (var i = 0; i < numOfProb; i++)
                                                          document.write('<th style="min-width:30px">' + sum[i] + '</th>')
                </script>
                <td style="width:100px">

                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <!--End Table part-->

        <!-- <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal0">Infer</button> -->

        <!-- Modal0 -->
        <div class="modal fade" id="myModal0" role="dialog">
          <div class="modal-dialog modal-md">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">ข้อx</h4>
                <button type="button" align='right' class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body left">
                <table class="table table-striped table-hover main">
                  <thead class="thead">
                    <tr>
                      <th style="width:60%">
                        ชื่อไฟล์
                      </th>
                      <th style="width:30%">
                        สถานะ
                      </th>
                      <th style="width:10%">
                        เลือก
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="width:60%">
                        exFilePass
                      </td>
                      <td style="width:30%">
                        Correct
                      </td>
                      <td style="width:10%">
                        <input type="checkbox" name="" value=""><br>
                      </td>
                    </tr>
                    <tr>
                      <td style="width:60%">
                        exFileFail
                      </td>
                      <td style="width:30%">
                        Fail
                      </td>
                      <td style="width:10%">
                        <input type="checkbox" name="" value=""><br>
                      </td>
                    </tr>
                  </tbody>
                </table>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Download</button>
                <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal3" onclick="createSec();">Create</button> -->
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

</body>

</html>
