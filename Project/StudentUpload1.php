<!doctype html>
<html lang="en">

<head>
  <title>Student-Grader</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#000000">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
    crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
    crossorigin="anonymous"></script>

  <!--Font Awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">

  <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>

  <link rel="stylesheet" href="StudentUpload1.css">

  <nav class="navbar navbar-light bg-light" style="background-color: #0C3343; color:#ffffff">
    <form class="form-inline">
      <span class="h3" class="navbar-brand mb-0">Student</span>
      <i class="far fa-user-circle h3 ml-auto mt-1"></i>
      <label class="ml-2 mb-1" id="SessionUser"></label>
      <div class="dropdown">
        <i class="fas fa-chevron-down ml-4 mr-2" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
        <div class="dropdown-menu dropdown-menu-right">
          <button class="dropdown-item" type="button" onclick="getValueForEdit()" data-toggle="modal" data-target="#editAccount">Account</button>
          <div class="dropdown-divider"></div>
          <button class="dropdown-item" type="button" onclick="logout()">Logout</button>
        </div>
      </div>
    </form>
  </nav>

  <style>
    .table-fixed thead {
      width: 100%;
      background-color: #20b2aa;
    }
    .table-fixed tbody {
      height: 230px;
      overflow-y: auto;
      width: 100%;
    }
    .table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
      display: block;
    }
    .table-fixed tbody td, .table-fixed thead > tr> th {
      float: left;
      border-bottom-width: 0;
    }
  </style>

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
  if(!strcmp($UT,"T"))
  {
	  echo "<script> alert('Invalid Page'); window.location = 'TeacherUpload2.php'; </script>";
  }
  else if(!strcmp($UT,"A"))
  {
	echo "<script> alert('Invalid Page'); window.location = 'AdminPage.php'; </script>";  
  }
  }
?>

  <body>
    <input type="hidden" id="TableUploadHeader" />
    <input type="hidden" id="TableUploadHeader1" />

    <input id="uidmoc" type="hidden">
    <input id="utypemoc" type="hidden">

    <form name="addAccount" method="post" action="">
      <!-- Modal -->
      <div class="modal fade" id="editAccount" role="dialog">
        <div class="modal-dialog modal-md">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Account</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body m-2 pb-0">
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="mt-2">Firstname</label>
                </div>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="editFirstname" name="editFirstname" placeholder="Firstname" disabled required
                    oninvalid="this.setCustomValidity('Firstname is empty,\nInput only (A-Z,a-z)');" oninput="setCustomValidity('')"
                    minlength=2 maxlength=50 pattern="[A-Za-z]{2,}" />
                </div>
                <div class="col-sm-1">
                  <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem; float: right" value="" id="defaultCheckFirstname"
                    onclick="checkBoxEdit(1)">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="mt-2">Lastname</label>
                </div>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="editLastname" name="editLastname" placeholder="Lastname" disabled required oninvalid="this.setCustomValidity('Lastname is empty,\nInput only (A-Z,a-z)');"
                    oninput="setCustomValidity('')" minlength=3 maxlength=50 pattern="[A-Za-z]{3,}" />
                </div>
                <div class="col-sm-1">
                  <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem; float: right" value="" id="defaultCheckLastname"
                    onclick="checkBoxEdit(2)">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="mt-2">Username</label>
                </div>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="editUsername" name="editUsername" placeholder="Username" disabled required oninvalid="this.setCustomValidity('Username is empty,\nInput only (A-Z,a-z,0-9)\nmin length: 6');"
                    oninput="setCustomValidity('')" minlength=6 maxlength=20 pattern="[A-Za-z,0,1,2,3,4,5,6,7,8,9]{6,}" />
                </div>
                <div class="col-sm-1">
                  <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem; float: right" value="" id="defaultCheckUsername"
                    onclick="checkBoxEdit(3)">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="mt-2">Student ID</label>
                </div>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="editStudentID" name="editStudentID" disabled placeholder="Student ID (EX. 5713XXX)"
                    required oninvalid="this.setCustomValidity('Student ID is empty,,\nInput only (0-9)');" oninput="setCustomValidity('')"
                    minlength=7 maxlength=7 pattern="[0,1,2,3,4,5,6,7,8,9]{7}" />
                </div>
                <div class="col-sm-1">
                  <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem; float: right; display: none" value="" id="defaultCheckStdID"
                    onclick="checkBoxEdit(4)">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="mt-2">Department</label>
                </div>
                <div class="col-sm-7">
                  <select class="form-control" id="editDepartment" name="editDepartment" disabled required oninvalid="this.setCustomValidity('Please select some department');"
                    oninput="setCustomValidity('')">
                    <option value="">Department</option>
                    <option value="BE">Biomedical Engineering</option>
                    <option value="CE">Civil Engineering</option>
                    <option value="CHE">Chemical Engineering</option>
                    <option value="CO">Computer Engineering</option>
                    <option value="EE">Electrical Engineering</option>
                    <option value="IE">Industrial Engineering</option>
                    <option value="ME">Mechanical Engineering</option>
                  </select>
                </div>
                <div class="col-sm-1">
                  <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem; float: right" value="" id="defaultCheckDepart"
                    onclick="checkBoxEdit(5)">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="mt-2">Email</label>
                </div>
                <div class="col-sm-7">
                  <input type="email" class="form-control" name="editEmail" id="editEmail" placeholder="E-mail" disabled required oninvalid="this.setCustomValidity('Enter your email');"
                    oninput="setCustomValidity('')" maxlength=30/>
                </div>
                <div class="col-sm-1">
                  <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem; float: right" value="" id="defaultCheckEmail"
                    onclick="checkBoxEdit(6)">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="mt-2">New Password</label>
                </div>
                <div class="col-sm-7">
                  <input type="password" class="form-control" id="editPassword" name="editPassword" disabled placeholder="New Password" minlength=6
                    maxlength=30 required oninvalid="this.setCustomValidity('Enter your password,\nmin length: 6');" oninput="setCustomValidity('')"
                    onkeyup='checkPassEdit();' />
                </div>
                <div class="col-sm-1">
                  <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem; float: right" value="" id="defaultCheckPass" onclick="checkBoxEdit(7)">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="mt-2">Confirm Password</label>
                </div>
                <div class="col-sm-7">
                  <input type="password" class="form-control" id="editPassword2" name="editPassword2" disabled placeholder="Confirm New Password"
                    minlength=6 maxlength=30 required oninput="setCustomValidity('')" onkeyup='checkPassEdit();' />
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-7">
                  <p id="message" style="font-weight: 500;"></p>
                </div>
              </div>
            </div>
            <!--End Modal Body-->
            <div class="modal-footer">
              <!-- <button type="submit" class="btn btn-success" onclick="editAccountManagementOnClick(); $('#modalID').modal('hide')">Save</button> -->
              <button type="button" class="btn btn-success" data-dismiss="modal" onclick="editAccountOnClick();">Save</button>
              <!-- <button type="submit" class="btn btn-success" onclick="">Save</button> -->

            </div>
          </div>
        </div>
      </div>
    </form>


    <script>
                function logout() {
                  window.location = "logout.php";
                }
                $(document).ready(function () {
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
                function fillDropDownSection() {
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                      eval(this.responseText);
                    }
                  }
                  xmlhttp.open("POST", "testDropDown.php", true);
                  xmlhttp.send();
                }

                function checkBoxEdit(num) {
                  EditFN = document.getElementById("editFirstname");
                  EditLN = document.getElementById("editLastname");
                  EditUN = document.getElementById("editUsername");
                  EditsID = document.getElementById("editStudentID");
                  EditDM = document.getElementById("editDepartment");
                  EditMail = document.getElementById("editEmail");
                  EditP = document.getElementById("editPassword");
                  EditP2 = document.getElementById("editPassword2");

                  if (num == 1) {
                    if (document.getElementById("defaultCheckFirstname").checked == true) {
                      EditFN.disabled = false;
                    } else {
                      EditFN.disabled = true;
                    }
                  } else if (num == 2) {
                    if (document.getElementById("defaultCheckLastname").checked == true) {
                      EditLN.disabled = false;
                    } else {
                      EditLN.disabled = true;
                    }
                  } else if (num == 3) {
                    if (document.getElementById("defaultCheckUsername").checked == true) {
                      EditUN.disabled = false;
                    } else {
                      EditUN.disabled = true;
                    }
                  }
                  else if (num == 4) {
                    if (document.getElementById("defaultCheckStdID").checked == true) {
                      EditsID.disabled = false;
                    } else {
                      EditsID.disabled = true;
                    }
                  }
                  else if (num == 5) {
                    if (document.getElementById("defaultCheckDepart").checked == true) {
                      EditDM.disabled = false;
                    } else {
                      EditDM.disabled = true;
                    }
                  } else if (num == 6) {
                    if (document.getElementById("defaultCheckEmail").checked == true) {
                      EditMail.disabled = false;
                    } else {
                      EditMail.disabled = true;
                    }
                  } else if (num == 7) {
                    if (document.getElementById("defaultCheckPass").checked == true) {
                      EditP.disabled = false;
                      EditP2.disabled = false;
                    } else {
                      EditP.disabled = true;
                      EditP2.disabled = true;
                    }
                  }
                }

                function checkPassEdit() {
                  var password = document.getElementById("editPassword")
                  var confirm_password = document.getElementById("editPassword2");
                  var message = document.getElementById('message');
                  confirm_password.setCustomValidity('');
                  if (password.value == confirm_password.value) {
                    if (password.value == '' || confirm_password.value == '') {
                      message.innerHTML = '';
                    } else {
                      message.style.color = 'green';
                      message.innerHTML = '*Matching*';
                    }
                  } else {
                    message.style.color = 'red';
                    message.innerHTML = "*Passwords Doesn't Match*";
                    confirm_password.setCustomValidity("Passwords Doesn't Match!!");
                  }
                }

                function getValueForEdit() {
                  // alert("click getValueForEdit");
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                      eval(this.responseText);
                    }
                  }
                  xmlhttp.open("POST", "EditYourSelfGetValue.php", true);
                  xmlhttp.send();
                }

                function editAccountOnClick() {
                  var check = 0;
                  // alert("save");
                  if (document.getElementById("defaultCheckPass").checked == true && document.getElementById("editPassword").value == document.getElementById("editPassword2").value && document.getElementById("editPassword").value != "") {
                    // alert("check pass");
                    check = 1;
                  } else if (document.getElementById("defaultCheckPass").checked == false) {
                    // alert("dont check pass");
                    check = 2;
                  }

                  if (check == 1 || check == 2) {
                    // alert("check is" + check);
                    var uidreq = document.getElementById("uidmoc").value;
                    var utypereq = document.getElementById("utypemoc").value;
                    // alert(utypereq);

                    // alert(uidreq);


                    var fnamesend = "";
                    var lnamesend = "";
                    var unamesend = "";
                    var sidsend = "";
                    var departsend = "";
                    var emailsend = "";
                    var passSend = "";
                    var fnameEdit = document.getElementById("editFirstname").value;
                    var lnameEdit = document.getElementById("editLastname").value;
                    // alert(fnameEdit);
                    // alert(lnameEdit);


                    if (document.getElementById("defaultCheckFirstname").checked == true) {
                      var fnamereq = document.getElementById("editFirstname").value;
                      // alert(fnamereq);
                      fnamesend = "&fnamereq=" + fnamereq;
                    }
                    // alert(fname);
                    if (document.getElementById("defaultCheckLastname").checked == true) {
                      var lnamereq = document.getElementById("editLastname").value;
                      // alert(lnamereq);
                      lnamesend = "&lnamereq=" + lnamereq;
                    }

                    if (document.getElementById("defaultCheckUsername").checked == true) {
                      var unamereq = document.getElementById("editUsername").value;
                      // alert(unamereq);
                      unamesend = "&unamereq=" + unamereq;
                    }

                    if (document.getElementById("defaultCheckStdID").checked == true) {
                      var sidreq = document.getElementById("editStudentID").value;
                      // alert(sidreq);
                      sidsend = "&sidreq=" + sidreq;
                    }

                    if (document.getElementById("defaultCheckDepart").checked == true) {
                      var departreq = document.getElementById("editDepartment").value;
                      // alert(departreq);
                      departsend = "&departreq=" + departreq;
                    }

                    if (document.getElementById("defaultCheckEmail").checked == true) {
                      var emailreq = document.getElementById("editEmail").value;
                      // alert(emailreq);
                      emailsend = "&emailreq=" + emailreq;
                    }

                    if (document.getElementById("defaultCheckPass").checked == true) {
                      var passreq = document.getElementById("editPassword").value;
                      // alert(passreq);
                      passSend = "&passreq=" + passreq;
                    }



                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                      if (this.readyState == 4 && this.status == 200) {
                        // alert("success");
                        eval(this.responseText);
                      }
                    }
                    xmlhttp.open("POST", "EditAccountManagementA.php?uidreq=" + uidreq + fnamesend + lnamesend + unamesend + sidsend + departsend + emailsend + passSend + "&utypereq=" + utypereq + "&fnameEdit=" + fnameEdit + "&lnameEdit=" + lnameEdit, true);
                    xmlhttp.send();
                    console.log(fnameEdit);
                    console.log(lnameEdit);

                    // document.getElementById('SessionUserEditmoc').value = fnamereq + ' ' + lnamereq;
                    // document.getElementById('SessionUser').innerText = document.getElementById('SessionUserEditmoc').value;


                    //alert('SU = ' + SU);
                  }
                  else {
                    document.getElementById("uidmoc").value = "";
                    alert("password fail");
                  }
                }

                function fillTable() {
                  $('#DataFromAjax tbody tr').remove();
                  str = $("#selectClass").val();
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                      $('#DataFromAjax').append(this.responseText);
                    }
                  }
                  xmlhttp.open("POST", "FillTable.php?Section=" + str, true);
                  xmlhttp.send();
                }
                function sectionRegister() {
                  str = $("#SectionPassword").val();
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                      eval(this.responseText);
                    }
                  }
                  xmlhttp.open("POST", "sectionRegister.php?Password=" + str, true);
                  xmlhttp.send();
                }
                // fun for java
                function ModalHeaderFunc(x, y, z) {
                  $("#TableUploadHeader").val($(x).closest("tr").find(".use").text());
                  document.getElementById('modalValue').innerHTML = $('#TableUploadHeader').val();
                  $("#ProblemName").val(y);
                  $("#SectionValue").val($("#selectClass").val());
                  //                     alert($("#TableUploadHeader").val());
                  //                     alert($("#ProblemName").val());
                  //                     alert($("#SectionValue").val());
                  //                     alert(z);
                }

                // fun for not hava
                function ModalHeaderFunc1(x, y, z) {
                  $("#TableUploadHeader1").val($(x).closest("tr").find(".use").text());
                  document.getElementById('modalValue1').innerHTML = $('#TableUploadHeader1').val();
                  $("#ProblemName1").val(y);
                  $("#SectionValue1").val($("#selectClass").val());
                  //                     alert($("#TableUploadHeader1").val());
                  //                     alert($("#ProblemName1").val());
                  //                     alert($("#SectionValue1").val());
                  //                     alert(z);
                }
    </script>

    <script>
                $(document).ready(function () {
                  $('[data-toggle="tooltip"]').tooltip();
                });
    </script>

    <div class="container-table">
      <div class="head-std row">
        <div class="dropdown">
          <select class="form-control" id="selectClass" name="selectClass" onchange="fillTable();">
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
              <div class="modal-body mx-2">

                <div class="form-inline">
                  <label>Please Enter Section Password</label>
                  <!-- <div data-toggle="tooltip" data-placement="bottom" title="Section Password from Lecturer">
                    <i class="fa fa-info-circle" style="color:#5bc0de; font-size:2rem;"></i>
                  </div> -->
                </div>
                <input class="form-control mt-3" type="text" placeholder="Password" id="SectionPassword">
              </div>
              <div class="modal-footer mx-2" style="justify-content:space-between">
                <p class="mb-0" style="font-weight: 500; color:#5bc0de;">
                  <i class="fa fa-info-circle mr-2"></i> Section Password from Lecturer
                </p>
                <button type="submit" class="btn btn-secondary" data-dismiss="modal" onclick="sectionRegister()">Join</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tabel-wrapper" style="height:400px;">
        <div class="table-scroll" style="height:400px; overflow-y:scroll;">
          <table class="table table-striped table-bordered table-hover table-fixed" id="DataFromAjax">
            <thead class="thead">
              <tr>
                <th style="width6%" onclick="sortTable(0)">
                  ID
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:18%" onclick="sortTable(1)">
                  <!-- ชื่อโจทย์ -->
                  Problem name
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:11%" onclick="sortTable(2)">
                  <!-- ภาษา -->
                  Language
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:22%" onclick="sortTable(3)">
                  <!-- Deadline -->
                  Deadline
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:21%" onclick="sortTable(4)">
                  <!-- จำนวนที่ส่ง(ครั้ง) -->
                  Number of submissions
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:10%" onclick="sortTable(5)">
                  <!-- สถานะ -->
                  Status
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:12%; text-align:center;">
                  Upload
                </th>
              </tr>
            </thead>

            <!-- modal java upload -->
            <div class='modal fade' id='javaUpload' role='dialog'>
              <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h4 class='modal-title' id='modalValue'></h4>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                  </div>
                  <form class="form-horizontal" role="form" action="CoreJava.php" method="post" enctype="multipart/form-data">
                    <div class='modal-body' style='margin:auto;'>

                      <label class='file'>
                  <input type='hidden' name = "ProblemName" id = "ProblemName">
		  <input type='hidden' name = "SectionValue" id = "SectionValue">
		  <input type='file' name = "Uploaded_file" id = "Uploaded_file" accept=".zip" required>
                  <span class='file-custom'></span>
                  </label>
                      <p>Name of main class : </p>
                      <input class="form-control" type='text' name="MainClass" id="MainClass" placeholder="ex. mainfile" required oninvalid="this.setCustomValidity('Please enter file name of main class,,\nex. mainfile.java');"
                        oninput="setCustomValidity('')" minlength=6 maxlength=20 pattern="[A-Za-z,0,1,2,3,4,5,6,7,8,9]{6,}$"
                      />
                    </div>
                    <div class='modal-footer'>
                      <button type='submit' class='btn btn-secondary'>Upload</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- modal notjava upload -->
            <div class='modal fade' id='notjavaUpload' role='dialog'>
              <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h4 class='modal-title' id='modalValue1'></h4>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                  </div>
                  <form class="form-horizontal" role="form" action="Core.php" method="post" enctype="multipart/form-data">
                    <div class='modal-body' style='margin:auto;'>

                      <label class='file'>
                  <input type='hidden' name = "ProblemName" id = "ProblemName1">
		  <input type='hidden' name = "SectionValue" id = "SectionValue1">
		  <input type='file' name = "Uploaded_file" id = "Uploaded_file1" accept=".c,.cpp" required>
                  <span class='file-custom'></span>
                  </label>
                      <!-- <input class="form-control" type='text' name="Main_file" id="Main_file" placeholder="File name of main class"> -->
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

          <!-- Start script -->
          <script>
            function sortTable(col) {
              var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
              table = document.getElementById("DataFromAjax");
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

        </div>
      </div>
    </div>

    <!-- <h1>Examples of CSS ToolTips!</h1> -->
    <!-- <p>Here are some examples of a <label class="tooltipp" href="#">Classic<span class="classic">This is just an example of what you can do using a CSS tooltipp, feel free to get creative and produce your own!</span></label>, <a class="tooltipp" href="#">Critical<span class="custom critical"><img src="Critical.png" alt="Error" height="48" width="48" /><em>Critical</em>This is just an example of what you can do using a CSS tooltipp, feel free to get creative and produce your own!</span></a>, <a class="tooltipp" href="#">Help<span class="custom help"><img src="Help.png" alt="Help" height="48" width="48" /><em>Help</em>This is just an example of what you can do using a CSS tooltipp, feel free to get creative and produce your own!</span></a>, <a class="tooltipp" href="#">Information<span class="custom info"><img src="Info.png" alt="Information" height="48" width="48" /><em>Information</em>This is just an example of what you can do using a CSS tooltipp, feel free to get creative and produce your own!</span></a> and <a class="tooltipp" href="#">Warning<span class="custom warning"><img src="Warning.png" alt="Warning" height="48" width="48" /><em>Warning</em>This is just an example of what you can do using a CSS tooltipp, feel free to get creative and produce your own!</span></a> CSS powered tooltipp. This is just an example of what you can do so feel free to get creative and produce your own!</p> -->

  </body>

</html>
