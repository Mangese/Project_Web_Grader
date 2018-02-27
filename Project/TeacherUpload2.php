<!doctype html>
<html lang="en">

<head>
  <title>Teacher-Grader</title>
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

  <!-- Date Picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

  <!-- Date Picker -->
  <script src="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.8.0/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.8.0/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css"
  />


  <!--Font Awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">

  <link rel="stylesheet" href="TeacherPage.css">

  <nav class="navbar navbar-light bg-light" style="background-color: #0C3343; color:#ffffff">
    <form class="form-inline">
      <span class="h3" class="navbar-brand mb-0">Teacher</span>
      <i class="far fa-user-circle h3 ml-auto mt-1"></i>
      <label class="ml-2 mb-1" id="SessionUser"></label>
      <div class="dropdown">
        <i class="fas fa-chevron-down ml-4 mr-2" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
        <div class="dropdown-menu dropdown-menu-right">
          <button class="dropdown-item" type="button" style="width: 100%" onclick="getValueForEdit()" data-toggle="modal" data-target="#editAccount">Account</button>
          <div class="dropdown-divider"></div>
          <button class="dropdown-item" type="button" style="width: 100%" onclick="logout()">Logout</button>
        </div>
      </div>
    </form>
  </nav>
  <!-- <input id="SessionUsermoc" type=""> -->
  <!-- <input id="SessionUserEditmoc" type=""> -->

  <style>
     *, ::after, ::before {
        box-sizing: inherit;
    }
    .table-fixed:not(#getProblem) thead  {
      width: 100%;
      background-color: #20b2aa;
      color: #fff;
    }
    .table-fixed:not(#getProblem) tbody {
      height: 210px;
      overflow-y: auto;
      width: 100%;
	  }
    .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th  {
      display: block;
    }
    .table-fixed tbody tr:nth-child(odd) > td {
      background-color: rgba(0,0,0,.05);
    }
    .table-fixed tbody td, .table-fixed thead > tr> th {
      float: left;
      border-bottom-width: 0;
    }
.bootstrap-datetimepicker-widget.dropdown-menu.usetwentyfour.bottom{
	box-sizing: initial;
	width: 197%;
    }
	
    .bootstrap-datetimepicker-widget.dropdown-menu.usetwentyfour.bottom table thead tr {
      width: 150%;
	    display: inline-block;
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
  /* echo "<script> document.getElementById('SessionUsermoc').value = '".$_SESSION["firstname"]." ".$_SESSION["lastname"]."'; </script>"; */
  
  $UT = $_SESSION["utype"];
  if(strcmp($UT,"T"))
  {
	  echo "<script> alert('Invalid Page'); window.location = 'StudentUpload1.php'; </script>";
  }
  }
  
?>

  <body>
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
                <div class="col-sm-5 px-0">
                  <input type="text" class="form-control" id="editFirstname" name="editFirstname" placeholder="Firstname" disabled required
                    oninvalid="this.setCustomValidity('Firstname is empty,\nInput only (A-Z,a-z)');" oninput="setCustomValidity('')"
                    minlength=2 maxlength=50 pattern="[A-Za-z]{2,}" />
                </div>
                <div class="col-sm-1 ml-3">
                  <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem; float: right" value="" id="defaultCheckFirstname"
                    onclick="checkBoxEdit(1)">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="mt-2">Lastname</label>
                </div>
                <div class="col-sm-5 px-0">
                  <input type="text" class="form-control" id="editLastname" name="editLastname" placeholder="Lastname" disabled required oninvalid="this.setCustomValidity('Lastname is empty,\nInput only (A-Z,a-z)');"
                    oninput="setCustomValidity('')" minlength=3 maxlength=50 pattern="[A-Za-z]{3,}" />
                </div>
                <div class="col-sm-1 ml-3">
                  <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem; float: right" value="" id="defaultCheckLastname"
                    onclick="checkBoxEdit(2)">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="mt-2">Username</label>
                </div>
                <div class="col-sm-5 px-0">
                  <input type="text" class="form-control" id="editUsername" name="editUsername" placeholder="Username" disabled required oninvalid="this.setCustomValidity('Username is empty,\nInput only (A-Z,a-z,0-9)\nmin length: 6');"
                    oninput="setCustomValidity('')" minlength=6 maxlength=20 pattern="[A-Za-z,0,1,2,3,4,5,6,7,8,9]{6,}" />
                </div>
                <div class="col-sm-1 ml-3">
                  <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem; float: right" value="" id="defaultCheckUsername"
                    onclick="checkBoxEdit(3)">
                </div>
              </div>
              <div class="form-group row" hidden>
                <div class="col-sm-4">
                  <label class="mt-2">Student ID</label>
                </div>
                <div class="col-sm-5 px-0">
                  <input type="text" class="form-control" id="editStudentID" name="editStudentID" disabled placeholder="Student ID (EX. 5713XXX)"
                    required oninvalid="this.setCustomValidity('Student ID is empty,,\nInput only (0-9)');" oninput="setCustomValidity('')"
                    minlength=7 maxlength=7 pattern="[0,1,2,3,4,5,6,7,8,9]{7}" />
                </div>
                <div class="col-sm-1 ml-3">
                  <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem; float: right" value="" id="defaultCheckStdID"
                    onclick="checkBoxEdit(4)">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="mt-2">Department</label>
                </div>
                <div class="col-sm-5 px-0">
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
                <div class="col-sm-1 ml-3">
                  <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem; float: right" value="" id="defaultCheckDepart"
                    onclick="checkBoxEdit(5)">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="mt-2">Email</label>
                </div>
                <div class="col-sm-5 px-0">
                  <input type="email" class="form-control" name="editEmail" id="editEmail" placeholder="E-mail" disabled required oninvalid="this.setCustomValidity('Enter your email');"
                    oninput="setCustomValidity('')" maxlength=30/>
                </div>
                <div class="col-sm-1 ml-3">
                  <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem; float: right" value="" id="defaultCheckEmail"
                    onclick="checkBoxEdit(6)">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="mt-2">New Password</label>
                </div>
                <div class="col-sm-5 px-0">
                  <input type="password" class="form-control" id="editPassword" name="editPassword" disabled placeholder="New Password" minlength=6
                    maxlength=30 required oninvalid="this.setCustomValidity('Enter your password,\nmin length: 6');" oninput="setCustomValidity('')"
                    onkeyup='checkPassEdit();' />
                </div>
                <div class="col-sm-1 ml-3">
                  <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem; float: right" value="" id="defaultCheckPass" onclick="checkBoxEdit(7)">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="mt-2">Confirm Password</label>
                </div>
                <div class="col-sm-5 px-0">
                  <input type="password" class="form-control" id="editPassword2" name="editPassword2" disabled placeholder="Confirm New Password"
                    minlength=6 maxlength=30 required oninput="setCustomValidity('')" onkeyup='checkPassEdit();' />
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-7 px-0">
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
                    // document.getElementById('SessionUser').innerText = document.getElementById('SessionUsermoc').value
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
                    } else if (num == 4) {
                      if (document.getElementById("defaultCheckStdID").checked == true) {
                        EditsID.disabled = false;
                      } else {
                        EditsID.disabled = true;
                      }
                    } else if (num == 5) {
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
                      message.innerHTML = "*Passwords Doesn't Match *";
                      confirm_password.setCustomValidity("Passwords Doesn't Match!!");
                    }
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
                  function ResultModalHeader(x, y, z, qq, stuid, submitcount, getFullMark) {
                    // alert(x);
                    // // alert(y);
                    // // alert(submitcount);
                    // alert(qq);
                    // alert(getFullMark);
                    $("#idmoc").val(x);
                    $("#pidmoc").val(y);
                    $("#fullmarkmoc").val(getFullMark);
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
                  function markSubfunc() {
                    var uidreq = $("#idmoc").val();
                    var pidreq = $("#pidmoc").val();
                    var setMark = $("#setMark").val();
                    var fullmark = $("#fullmarkmoc").val();
                    // alert(uidreq);
                    // alert(pidreq);
                    // alert(fullmark);
                    if (isNaN(setMark) || parseInt(setMark) > parseInt(fullmark) || parseInt(setMark) < 0) {
                      alert("Invalid Mark");
                    }
                    else {
                      var xmlhttp = new XMLHttpRequest();
                      xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                          eval(this.responseText);
                          fillTableResult();
                        }
                      }
                      xmlhttp.open("POST", "FillSetMark.php?uidreq=" + uidreq + "&pidreq=" + pidreq + "&setMark=" + setMark, true);
                      xmlhttp.send();

                    }


                    // location.reload();
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
                        else if (document.getElementById(fullMarkName).value <= 0 || document.getElementById(fullMarkName).value > 100 || isNaN(document.getElementById(fullMarkName).value)) {
                          x = 2;
                          if (document.getElementById(fullMarkName).value == "") {
                            x = 3;
                          }
                        }
                      }
                    });
                    if (x == 1) {
                      alert("Please input all detail");
                    }
                    else if (x == 2) {
                      alert("Invalid Mark");
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
                          // alert(dateName);
                          // alert(timeName);
                          // alert(fullMarkName);
                          // alert(document.getElementById(dateName).value);
                          // alert(document.getElementById(timeName).value);
                          // alert(document.getElementById(fullMarkName).value);
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
                  function ExportExcel() {

                    str = $("#selSectionRs").val();
                    window.location.href = 'ExportResult.php?sid=' + str;
                  }
                  function fillTableResult() {
                    // x = document.getElementById("selSectionRs").value;
                    $('#Result thead tr').remove();
                    $('#Result tbody tr').remove();
                    str = $("#selSectionRs").val();
                    var exp = document.getElementById('exportExcel');
                    if (str != "") {
                      exp.style.display = 'block';
                    }
                    else {
                      exp.style.display = 'none';
                    }
                    uidreq = $("#idmoc").val();
                    hidreq = $("#pidmoc").val();
                    setMark = $("#setMark").val();
                    // alert("uid from fillTable " + uidreq);
                    // alert("hid from fillTable " + hidreq);
                    // alert("mark from fillTable " + setMark);
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

    <script>
      $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
      });
    </script>
    <!--End script-->
    <!-- <input id="idmoc" type="hidden"> -->
    <input id="idmoc" type="hidden">
    <input id="pidmoc" type="hidden">
    <input id="fullmarkmoc" type="hidden">

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

        <style>
          .modal-lg-custom {
            max-width: 1080px;
          }
        </style>

        <div class="tab-pane active" id="tab1" role="tabpanel">
          <!--Selection-->
          <form class="form-inline justify-content-between" style="margin-top:20px; margin-bottom:20px; align-items:unset;">
            <div class="form-group mx-sm-3">
              <select class="form-control" name="selectClass" id="selectClass" onchange="fillTable()">
                <option value="">Please Select Class</option>
              </select>
            </div>
            <i class="fa fa-info-circle mx-3" style="color:#5bc0de; font-size:1.5rem;" data-toggle="modal" data-target="#info1"></i>

            <!-- Modal -->
            <div class="modal fade" id="info1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
              <div class="modal-dialog modal-lg-custom" role="document">
                <div class="modal-content">
                  <div class="modal-header" hidden>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modelTitleId">Modal title</h4>
                  </div>
                  <div class="modal-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
                      <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      </ol>
                      <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                          <img class="d-block img-fluid" src="./images/problem.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block img-fluid" src="./images/t-modal-uploadProblem.JPG" alt="Second slide">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                  <div class="modal-footer" hidden>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>

          </form>

          <!--Table-->
          <div class="table-container" style="width:100%">
            <table class="table table-striped table-hover main table-fixed" id="DataFromAjax">
              <thead class="thead">
                <tr>
                  <th style="width:40%; border-right:1px solid #eceeef;" onclick="SortNumberTable(0,'T')">
                    Problem Name
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:20%; border-right:1px solid #eceeef;" onclick="SortNumberTable(1,'T')">
                    Upload Date
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:20%; border-right:1px solid #eceeef;" onclick="SortNumberTable(2,'T')">
                    Language
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:20%; border-right:1px solid #eceeef; text-align:center;">
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
          <!-- <script>
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
          </script> -->
          <!--End Script-->

          <!-- Sort Number Script -->
          <script type="text/javascript">
            var TableIDvalue1 = "DataFromAjax";
            var TableLastSortedColumn1 = -1;
            function SortNumberTable() {
              var sortColumn1 = parseInt(arguments[0]);
              var type1 = arguments.length > 1 ? arguments[1] : 'T';
              var dateformat1 = arguments.length > 2 ? arguments[2] : '';
              var table = document.getElementById(TableIDvalue1);
              var tbody = table.getElementsByTagName("tbody")[0];
              var rows = tbody.getElementsByTagName("tr");
              var arrayOfRows = new Array();
              type1 = type1.toUpperCase();
              dateformat1 = dateformat1.toLowerCase();
              for (var i = 0, len = rows.length; i < len; i++) {
                arrayOfRows[i] = new Object;
                arrayOfRows[i].oldIndex = i;
                var celltext = rows[i].getElementsByTagName("td")[sortColumn1].innerHTML.replace(/<[^>]*>/g, "");
                if (type1 == 'D') { arrayOfRows[i].value = GetDateSortingKey(dateformat1, celltext); }
                else {
                  var re = type1 == "N" ? /[^\.\-\+\d]/g : /[^a-zA-Z0-9]/g;
                  arrayOfRows[i].value = celltext.replace(re, "").substr(0, 25).toLowerCase();
                }
              }
              if (sortColumn1 == TableLastSortedColumn1) { arrayOfRows.reverse(); }
              else {
                TableLastSortedColumn1 = sortColumn1;
                switch (type1) {
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

                  <div class="modal-body left" style="margin-left:35px;">
                    <input type='hidden' name="ClassID" id="ClassID">
                    <label>Problem Name</label><br>
                    <input type="text" name="ProblemNameUp" id="ProblemNameUp" class="form-control mb-3" style="width:92%" placeholder="Problem Name"
                      required oninvalid="this.setCustomValidity('Problem name is empty,\nInput only (A-Z,a-z,0-9)\nmin length: 4');"
                      oninput="setCustomValidity('')" minlength=4 maxlength=20 pattern="[A-Za-z,0,1,2,3,4,5,6,7,8,9]{4,}" />
                    <label>Problem File</label><br>
                    <label class="file mb-3">
                                <input type="file" id = "PDFFile" name = "PDFFile" accept=".pdf" required />
                                <span class="file-custom" style="width:132%"></span>
                                </label><br>
                    <label>Input File</label><br>
                    <label class="file mb-3">
                                <input type="file" id = "InFile" name = "InFile" accept=".zip" required  />
                                <span class="file-custom" style="width:132%"></span>
                                </label><br>
                    <label>Output File</label><br>
                    <label class="file mb-3">
                                <input type="file" id = "OutFile" name = "OutFile" accept=".zip" required />
                                <span class="file-custom" style="width:132%"></span>
                                </label><br>
                    <label>Language</label><br>
                    <label class="radio-inline ml-2 mr-4">
                                    <input type="radio" class="mr-1" name="optradio" value="C" required>C
                                </label>
                    <label class="radio-inline mr-4">
                                    <input type="radio" class="mr-1" name="optradio"  value="Cpp">C++
                                </label>
                    <label class="radio-inline">
                                    <input type="radio" class="mr-1" name="optradio"  value="Java">Java
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
          <div class="form-inline" style="margin-top:20px;">
            <i class="fa fa-info-circle ml-auto mr-3" style="color:#5bc0de; font-size:1.5rem;" data-toggle="modal" data-target="#info2"></i>

            <!-- Modal -->
            <div class="modal fade" id="info2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
              <div class="modal-dialog modal-lg-custom" role="document">
                <div class="modal-content">
                  <div class="modal-header" hidden>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modelTitleId">Modal title</h4>
                  </div>
                  <div class="modal-body">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel" data-interval="false">
                      <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                          <img class="d-block img-fluid" src="./images/homework.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block img-fluid" src="./images/createSection.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block img-fluid" src="./images/assignHomework.jpg" alt="Third slide">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                  <div class="modal-footer" hidden>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <form class="form-inline justify-content-between" style="margin-top:16px; margin-bottom:20px;">
            <!--Head 1-->
            <div class="form-group mx-sm-3">
              <select class="form-control" name="selSectionHw" id="selSectionHw" onchange="changePassword()">
                  <option value="">
                      Please Select Section
                  </option>
              </select>
            </div>

            <!--Head 2-->
            <div class="form-group mx-sm-3">
              <label for="staticPassword" style="margin-right:12px">Password  </label>
              <input type="text" readonly class="form-control" id="sectionPassword" style="width:150px" data-toggle="tooltip" data-placement="bottom"
                title="Password for students to join Section">
            </div>

            <!--Head 3-->
            <div class="form-group mx-sm-3">
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
                      <div class="modal-body mx-3">
                        <label class="mb-2">Class</label>
                        <select class="form-control mb-3" name="createClass" id="createClass" style="width:100%;" required oninvalid="this.setCustomValidity('Please select some class');"
                          oninput="setCustomValidity('')">
                                                <option value="">Please Select Classroom</option>
                                            </select>
                        <!-- <label for="staticEmail" class="col-sm-2 col-form-label">Password</label> -->

                        <label class="mb-2">Section</label>
                        <input type="text" class="form-control mb-3" name="createSection" id="createSection" style="width:100%" placeholder="Section"
                          required oninvalid="this.setCustomValidity('Section is empty,\nInput only (A-Z,a-z,0-9)');" oninput="setCustomValidity('')"
                          minlength=1 maxlength=20 pattern="[A-Za-z,0,1,2,3,4,5,6,7,8,9]{1,}" />

                        <label class="mb-2">Semester</label>

                        <!-- <div class="dropdown"> -->
                        <select class="form-control mb-3" name="semester" id="semester" style="width: 100%;" required oninvalid="this.setCustomValidity('Please select some semester');"
                          oninput="setCustomValidity('')">
                                                <option value="">Semester</option>
                                                <script>
                                                  for (var j = 1; j < 4; j++) {
                                                    document.write('<option value="' + j + '">' + j + '</option>');
                                                  }
                                                </script>
                                            </select>
                        <!-- </div> -->

                        <label class="mb-2">Year</label>
                        <select class="form-control mb-2" name="year" id="year" style="width: 100%;" required oninvalid="this.setCustomValidity('Please select some year');"
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
          <!-- <div class="table-wrapper-problem" style="height:205px"> -->
            <table class="table table-striped table-hover main table-fixed" id="TableHw">
              <thead class="thead">
                <tr style="width:100%">
                  <th style="width:10%; border-right:1px solid #eceeef;" onclick="SortNumber(0,'N')">
                    Exam No.
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:20%; border-right:1px solid #eceeef;" onclick="SortNumber(1,'T')">
                    Exam Name
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:10%; border-right:1px solid #eceeef;" onclick="SortNumber(2,'T')">
                    Language
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:13%; border-right:1px solid #eceeef;" onclick="SortNumber(3,'N')">
                    Total Submit
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:11%; border-right:1px solid #eceeef;" onclick="SortNumber(4,'N')">
                    Total Pass
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:12%; border-right:1px solid #eceeef;" onclick="SortNumber(5,'T')">
                    Assign Date
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:14%; border-right:1px solid #eceeef;" onclick="SortNumber(6,'T')">
                    Deadline Date
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:10%; border-right:1px solid #eceeef; text-align:center;">
                    Delete
                  </th>
                </tr>
              </thead>
              <tbody style="height:170px;">
              </tbody>
            </table>
          <!-- </div> -->
          <!--End Table--> 

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

          <style>
            .modal-lg-assign {
              max-width: 900px;
            }
          </style>

          <!--Foot part-->
          <div class="foot-t left" style="margin-top:20px;">
            <button type="button" class="btn btn-secondary" id="AssignButton" data-toggle="modal" data-target="#modalAssignHomework"
              onclick="fillGetTableProblem()">Assign Homework</button>
          </div>
          <!-- modalAssignHomework -->
          <div class="modal fade" id="modalAssignHomework" role="dialog">
            <div class="modal-dialog modal-lg-assign">

              <!-- Modal content-->
              <div class="modal-content">
                <form name="from5" method="post" action="xxx.php">
                  <div class="modal-header">
                    <h4 class="modal-title">Assign Homework</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <div class="modal-body">
                    <table class="table table-striped table-hover main table-fixed" id="getProblem">
                      <thead class="thead">
                        <tr>
                          <th style="width:24%; border-right:1px solid #eceeef;" onclick="SortNumberTable2(0,'T')">
                            Exam Name
                            <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                          </th>
                          <th style="width:12%; border-right:1px solid #eceeef; text-align:center;">
                            Full Mark
                          </th>
                          <th style="width:15%; border-right:1px solid #eceeef;" onclick="SortNumberTable2(2,'T')">
                            Language
                            <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                          </th>
                          <th style="width:20%; border-right:1px solid #eceeef; text-align:center;">
                            Deadline Date
                          </th>
                          <th style="width:20%; border-right:1px solid #eceeef; text-align:center;">
                            Deadline Time
                          </th>
                          <th style="width:9%; text-align:center;">
                            Select
                          </th>
                        </tr>
                      </thead>
                      <tbody style="height:230px;">
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

                    <!-- Sort Number Script -->
                    <script type="text/javascript">
                      var TableIDvalue2 = "getProblem";
                      var TableLastSortedColumn = -1;
                      function SortNumberTable2() {
                        var sortColumn = parseInt(arguments[0]);
                        var type = arguments.length > 1 ? arguments[1] : 'T';
                        var dateformat = arguments.length > 2 ? arguments[2] : '';
                        var table = document.getElementById(TableIDvalue2);
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

                  </div>
                  <!--End modal-body-->

                  <div class="modal-footer">
                    <!--<button type="button" class="btn btn-success" data-dismiss="modal">OK</button>-->
                    <button type="button" class="btn btn-success" onclick="check();">Assign</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- End Tab 2 -->

        <div class="tab-pane" id="tab3" role="tabpanel">
          <!--Head part-->
          <form class="form-inline justify-content-between" style="margin-top:20px; margin-bottom:20px; align-items:unset;">
            <div class="form-group mx-sm-3">
              <select class="form-control" name="selSectionRs" id="selSectionRs" onchange="fillTableResult();">
                  <option value="">Please Select Section</option>
              </select>
            </div>
            <i class="fa fa-info-circle mx-3" style="color:#5bc0de; font-size:1.5rem;" data-toggle="modal" data-target="#info3"></i>

            <!-- Modal -->
            <div class="modal fade" id="info3" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
              <div class="modal-dialog modal-lg-custom" role="document">
                <div class="modal-content">
                  <div class="modal-header" hidden>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modelTitleId">Modal title</h4>
                  </div>
                  <div class="modal-body">
                    <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel" data-interval="false">
                      <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
                      </ol>
                      <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active" >
                          <img class="d-block img-fluid" src="./images/result.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block img-fluid" src="./images/csv.jpg" alt="Second slide">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                  <div class="modal-footer" hidden>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>

          </form>

          <!--Table part-->
          <div class="table-wrapper" style="height:264px">
            <table class="table table-striped table-hover main" id="Result">
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
                      document.write('<th style="min-width:73px; text-align:center;">Ex ' + i + '</th>')
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

          <!--Foot part-->
          <div class="foot-t left" style="margin-top:20px;">
            <button type="button" class="btn btn-secondary" id="exportExcel" onclick="ExportExcel()">Export Excel</button>
          </div>

          <!--Start Sort Script-->
          <script>
                    function exportExcel() {
                    //  alert("exportExcel");
                    }
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
                <div class="modal-body mx-2">
                  <div class="form-inline mx-2 mb-2 justify-content-between">
                    <h5 id='submitCount'></h5>
                    <div class="form-inline">
                      <input type="text" class="form-control mr-1 py-1" style="width:61px; text-align:right;" name="setMark" id='setMark' placeholder="Mark">
                      <h5 id='fullMark' name='fullMark'>/ Full mark</h5>
                    </div>
                  </div>
                  <table class="table table-striped table-bordered table-hover main" id="tb3LastSendFile">
                    <thead class="thead">
                      <tr>
                        <th style="width:10%; border-right:1px solid #eceeef;" onclick="sortTable3(0)">
                          No.
                          <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                        </th>
                        <th style="width:23%; border-right:1px solid #eceeef;" onclick="sortTable3(1)">
                          Submit Date
                          <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                        </th>
                        <th style="width:23%; border-right:1px solid #eceeef;" onclick="sortTable3(2)">
                          Submit Time
                          <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                        </th>
                        <th style="width:14%; border-right:1px solid #eceeef;" onclick="sortTable3(3)">
                          Status
                          <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                        </th>
                        <th style="width:15%; border-right:1px solid #eceeef;" onclick="sortTable3(4)">
                          Test Case
                          <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                        </th>
                        <th style="width:15%; border-right:1px solid #eceeef; text-align:center;">
                          Download
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>

                <div class="modal-footer">
                  <!--<button type="button" class="btn btn-success" data-dismiss="modal">OK</button>-->
                  <button type="button" id='markSubBtn' name='markSubBtn' class="btn btn-success" onclick="markSubfunc(); " data-dismiss="modal">Mark submit</button>
                </div>

                <!-- Start script -->
                <script>
                    function sortTable3(col) {
                      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                      table = document.getElementById("tb3LastSendFile");
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

              <h5 style="margin-top:10px; margin-bottom:20px;">Do you want to delete?</h5>
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
