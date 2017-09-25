<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#000000">

  <link rel="manifest" href="%PUBLIC_URL%/manifest.json">
  <link rel="shortcut icon" href="%PUBLIC_URL%/favicon.ico">



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
    crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
    crossorigin="anonymous"></script>

  <!--       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 -->
  <!-- <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
  />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> -->


  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script> -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>



  <link rel="stylesheet" href="TeacherUpload.css">

  <!-- <h1>Teacher</h1><br> -->

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
  echo "<script> document.getElementById('SessionUser').innerText = '".$_SESSION["user"]."' </script>";
  }
?>
  <body>
    <script>
       $(document).ready(function()
  {
  fillDropDownSection();
  fillTable();
  fillDropHw();
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
        xmlhttp.open("POST","DropDownForT.php",true);
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
        xmlhttp.open("POST","FillTableT.php?class="+str,true);
        xmlhttp.send();
      }
       function fillDropHw()
      {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
          if(this.readyState == 4 && this.status == 200)
          {
            eval(this.responseText);
          }
        }
        xmlhttp.open("POST","FillDropHw.php",true);
        xmlhttp.send();
      }
      function fillTableHw()
      {
        $('#TableHw tbody tr').remove();
        str = $("#selSectionHw").val();
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          $('#TableHw').append(this.responseText);
        }
        }
        xmlhttp.open("POST","FillTableHwT.php?class="+str,true);
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
        var pClass = document.getElementById("createClass").value;
        var pSection = document.getElementById("createSection").value;
        var pSemester = document.getElementById("semester").value;
        var pYear = document.getElementById("year").value;
        var option = document.createElement("option");
        option.text = pClass + "(" + pSection + ") - " + pSemester + "/" + pYear + " -";
        x.add(option);
      }
    </script>

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

        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="tab1" role="tabpanel">
          <br>
          <div class="head-t row" style="width:100%">
            <div class="dropdown left">
        <form>
              <select class="form-control" name="selectClass" id="selectClass" style="height: 19px;" onchange="fillTable()">
<!--           onchange table-->
          <option value="">Please Select Class</option>
          </form>
        </select>

            </div>
          </div>
          <table class="table table-striped table-hover main" id = "DataFromAjax">
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

          <div class="foot-t left">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal1">Upload</button>
          </div>
          <!-- Modal1 -->
          <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog modal-md">

              <!-- Modal content-->
              <div class="modal-content">
                <!--<form name="from1" method="post" action="xxx.php"> -->
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


        </div>
        <div class="tab-pane" id="tab2" role="tabpanel">
          <br>
          <script>
            function changePassword() {
              var x = document.getElementById("selSectionHw").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          $("#sectionPassword").val(this.responseText);
        }
        }
        xmlhttp.open("POST","FillSectionPassword.php?class="+x,true);
        xmlhttp.send();
              fillTableHw();
            }
          </script>
          <div class="head-t row" style="width:100%">
            <form name="from2" method="post" action="xxx.php">
              <div class="dropdown left">
                <select class="form-control" name="selSectionHw" id="selSectionHw" style="height: 19px;" onchange="changePassword()">
<!--       onchange table-->
            <option value="">Please Select Section</option>
          </select>

              </div>
            </form>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal3">Create Section</button>
            <!-- Modal3 -->
            <div class="modal fade" id="myModal3" role="dialog">
              <div class="modal-dialog modal-sm">

                <!-- Modal content-->
                <div class="modal-content">
                  <form name="from3" method="post" action="xxx.php">
                    <div class="modal-header">
                      <h4 class="modal-title">Create Section</h4>
                      <button type="button" align='right' class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body left">



                      <label>Class</label>
                      <select class="form-control" name="createClass" id="createClass" style="height: 19px; width:80%">
            <option>Please Select Classroom</option>
            <option>EGCO111 Computer Programming</option>
            <option>EGCO112 Programming Technique</option>
          </select>


                      <!-- <label for="staticEmail" class="col-sm-2 col-form-label">Password</label> -->

                      <label>Section</label>
                      <input type="text" class="form-control" name="createSection" id="createSection" style="width:80%" placeholder="Section">

                      <label>Semester</label>

                      <!-- <div class="dropdown"> -->
                      <select class="form-control" name="semester" id="semester" style="height: 19px; width: 80%;">
                          <option>ภาคการศึกษา</option>
                          <script>
                            for (var j = 1; j < 4; j++) {
                              document.write('<option value="' + j + '">' + j + '</option>');
                            }
                          </script>
                      </select>
                      <!-- </div> -->

                      <label>Year</label>
                      <select class="form-control" name="year" id="year" style="height: 19px; width: 80%;">
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
                      <button type="submit" class="btn btn-success" onclick="$('#myModal3').modal('hide');createFun();">Create</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--<div class="row right">-->
            <form class="row" name="from4" method="post" action="xxx.php">
              <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-1 off-set-1">
                <input type="text" readonly class="form-control" id="sectionPassword" style="width:700%">
              </div>
            </form>
            <!--</div>-->
          </div>
          <table class="table table-striped table-hover main" id = "TableHw">
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
          <div class="foot-t left" style="margin-top:20px;">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal2">Assignment Homework</button>
          </div>
          <!-- Modal2 -->
          <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog modal-lg">

              <!-- Modal content-->
              <div class="modal-content">
                <form name="from5" method="post" action="xxx.php">
                  <div class="modal-header">
                    <h4 class="modal-title">Assignment Homework</h4>
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







                    <!-- <p>Some text in the modal.</p> -->

                  </div>
                  <div class="modal-footer">
                    <!--<button type="button" class="btn btn-success" data-dismiss="modal">OK</button>-->
                    <button type="submit" class="btn btn-success" onclick="$('#myModal2').modal('hide');">OK</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>


    <!-- <script type="text/javascript">
                            var year = new Date().getFullYear();
                            document.write(year);
  </script> -->

  </body>

</html>
