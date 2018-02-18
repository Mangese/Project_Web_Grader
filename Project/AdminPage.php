<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin-Grader</title>

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

  <!-- Date Picker -->
  <script src="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.8.0/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.8.0/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css"
  />


  <!--Font Awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="AdminPage.css">

  <nav class="navbar navbar-light bg-light" style="background-color: #0C3343; color:#ffffff">
    <form class="form-inline">
      <span class="h3" class="navbar-brand mb-0">Admin</span>
      <label class="ml-auto " id="SessionUser"></label>
      <button class="btn btn-outline-secondary logout-btn ml-4 my-2 my-sm-0" onclick="logout()" type="button">Logout</button>
    </form>
  </nav>
</head>

<!-- <?php
  session_start();
if(!isset($_SESSION["user"]))
  {
  echo "<script> alert('Please Login First'); window.location = 'logout.php'; </script>";
  }
  else
  {
  echo "<script> document.getElementById('SessionUser').innerText = '".$_SESSION["firstname"]." ".$_SESSION["lastname"]."'; </script>";
	  $UT = $_SESSION["utype"];
  if(!strcmp($UT,"S"))
  {
	  echo "<script> alert('Invalid Page'); window.location = 'StudentUpload1.php'; </script>";
  }
  else if(!strcmp($UT,"T"))
  {
	echo "<script> alert('Invalid Page'); window.location = 'TeacherUpload2.php'; </script>";
  }
  }
  ?> -->

<body>
  <script>
    function logout() {
      window.location = "logout.php";
    }

    function selectTypeOnChange() {
      typeSearch = $("#selectType").val();
      // alert(typeSearch);
      if (typeSearch == 'T') {
        document.getElementById("stdIDSearch").disabled = true;
        document.getElementById('stdIDSearch').value = '';
      }
      else {
        document.getElementById("stdIDSearch").disabled = false;
      }
    }
    function addUserDisableTrue() {
      document.getElementById("addFirstname").disabled = true;
      document.getElementById("addLastname").disabled = true;
      document.getElementById("addUsername").disabled = true;
      document.getElementById("addStudentID").disabled = true;
      document.getElementById("addDepartment").disabled = true;
      document.getElementById("addEmail").disabled = true;
      document.getElementById("addPassword").disabled = true;
      document.getElementById("addPassword2").disabled = true;
    }
    function addUserDisableFalse() {
      document.getElementById("addFirstname").disabled = false;
      document.getElementById("addLastname").disabled = false;
      document.getElementById("addUsername").disabled = false;
      document.getElementById("addDepartment").disabled = false;
      document.getElementById("addEmail").disabled = false;
      document.getElementById("addPassword").disabled = false;
      document.getElementById("addPassword2").disabled = false;
    }

    function userType() {
      // alert("inusertype");
      typeSelect = $("#addUserType").val();
      if (typeSelect == 'T' || typeSelect == 'A') {
        // alert("addUserType =T");
        addUserDisableTrue();
        addUserDisableFalse();

      } else if (typeSelect == 'S') {
        // alert("addUserType =S");
        addUserDisableFalse();
        document.getElementById("addStudentID").disabled = false;
      }
      else {
        addUserDisableTrue();
      }
    }

    function checkPassEdit() {
      var password = document.getElementById("editPassword")
      var confirm_password = document.getElementById("editPassword2");
      var message = document.getElementById('message');
      confirm_password.setCustomValidity('');
      if (password.value == confirm_password.value) {
        message.style.color = 'green';
        message.innerHTML = '*matching*';
      } else {
        message.style.color = 'red';
        message.innerHTML = "*Passwords Doesn't Match *";
        confirm_password.setCustomValidity("Passwords Doesn't Match!!");
      }
    }

    function checkPassAdd() {
      var password = document.getElementById("addPassword")
      var confirm_password = document.getElementById("addPassword2");
      var message = document.getElementById('message1');
      confirm_password.setCustomValidity('');
      if (password.value == confirm_password.value) {
        message.style.color = 'green';
        message.innerHTML = '*matching*';
      } else {
        message.style.color = 'red';
        message.innerHTML = "*Passwords Doesn't Match *";
        confirm_password.setCustomValidity("Passwords Doesn't Match!!");
      }
    }

    function addClass() {
      var addNewClass = document.getElementById('addClassName').value;
      alert("in add class");
      alert(addNewClass);

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          alert("success");
          eval(this.responseText);
        }
      }
      xmlhttp.open("POST", "AddClassManagementA.php?addNewClass=" + addNewClass, true);
      xmlhttp.send();
      // location.reload();
    }

    function fillaccountManagementTb() {

      // alert("in fun fillaccountManagementTb");
      $('#accountManagementTb tbody tr').remove();
      typeSearch = $("#selectType").val();
      sidSearch = $("#stdIDSearch").val();
      nameSearch = $("#nameSearch").val();
      // alert(typeSearch);
      // alert(sidSearch);
      // alert(nameSearch);

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          $('#accountManagementTb').append(this.responseText);
        }
      }
      xmlhttp.open("POST", "FillAccountManagementTbA.php?typeSearch=" + typeSearch + "&sidSearch=" + sidSearch + "&nameSearch=" + nameSearch, true);
      xmlhttp.send();
    }


    function editAccountManagementTb(th, uid, sid, uname, fname, lname, depart, email, utype) {
      // alert("uid is:" + uid);
      // alert("sid is:" + sid);
      // alert("uname is:" + uname);
      // alert("fname is:" + fname);
      // alert("lname is:" + lname);
      // alert("depart is:" + depart);
      // alert("email is:" + email);
      // alert("utype is:" + utype);
      EditFN = document.getElementById("editFirstname").value = fname;
      EditLN = document.getElementById("editLastname").value = lname;
      EditUN = document.getElementById("editUsername").value = uname;
      EditsID = document.getElementById("editStudentID").value = sid;
      EditDM = document.getElementById("editDepartment").value = depart;
      EditMail = document.getElementById("editEmail").value = email;
      EditP = document.getElementById("editPassword").value = "";
      EditP2 = document.getElementById("editPassword2").value = "";

      document.getElementById("defaultCheckFirstname").checked = false;
      document.getElementById("defaultCheckLastname").checked = false;
      document.getElementById("defaultCheckUsername").checked = false;
      document.getElementById("defaultCheckStdID").checked = false;
      document.getElementById("defaultCheckDepart").checked = false;
      document.getElementById("defaultCheckEmail").checked = false;
      document.getElementById("defaultCheckPass").checked = false;

      document.getElementById("editFirstname").disabled = true;
      document.getElementById("editLastname").disabled = true;
      document.getElementById("editUsername").disabled = true;
      document.getElementById("editStudentID").disabled = true;
      document.getElementById("editDepartment").disabled = true;
      document.getElementById("editEmail").disabled = true;
      document.getElementById("editPassword").disabled = true;
      document.getElementById("editPassword2").disabled = true;

      document.getElementById("uidmoc").value = uid;
      document.getElementById("utypemoc").value = utype;
      document.getElementById('message').innerHTML = "";
      if (utype == 'S') {
        // alert("sid =" + sid);
        document.getElementById("defaultCheckStdID").disabled = false;
      } else {
        // alert("no sid");
        document.getElementById("defaultCheckStdID").disabled = true;
      }

    }

    function editAccountManagementOnClick() {
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
        xmlhttp.open("POST", "EditAccountManagementA.php?uidreq=" + uidreq + fnamesend + lnamesend + unamesend + sidsend + departsend + emailsend + passSend + "&utypereq=" + utypereq, true);
        xmlhttp.send();
        // location.reload();
      }
      else {
        document.getElementById("uidmoc").value = "";
        alert("password fail");
      }
    }

    function editClassManagementTb(th, cid) {
      // alert("cid is:" + cid);
      document.getElementById('cidmoc').value = cid;
    }

    function editClassManagementOnClick() {
      // alert("editClassManagementOnClick()");
      var cidreq = document.getElementById('cidmoc').value;
      var classnameEdit = document.getElementById('editClassName').value;
      // alert("cid : " + cidreq);
      // alert(classnameEdit);

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          alert("success");
          eval(this.responseText);
        }
      }
      xmlhttp.open("POST", "EditClassManagementA.php?cidreq=" + cidreq + "&classnameEdit=" + classnameEdit, true);
      xmlhttp.send();
      // location.reload();

    }

    function editSectionManagementTb(th, sid) {
      // alert("sid is:" + sid);
      document.getElementById('sidmoc').value = sid;
    }

    function editSectionManagementOnClick() {
      // alert("editSectionManagementOnClick()");
      var sidreq = document.getElementById('sidmoc').value;
      var sectionnameEdit = document.getElementById('editSectionName').value;
      // alert("sid : " + sidreq);
      alert(sectionnameEdit);

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          alert("success");
          eval(this.responseText);
        }
      }
      xmlhttp.open("POST", "EditSectionManagementA.php?sidreq=" + sidreq + "&sectionnameEdit=" + sectionnameEdit, true);
      xmlhttp.send();
      // location.reload();

    }

    function deleteAccountManagement(th, uid) {
      // alert("uid is:" + uid);
      document.getElementById('uidmoc').value = uid;
    }

    function ChackDeleteAM() {
      var uidDelete = document.getElementById('uidmoc').value;
      // alert(uidDelete);

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          alert("success");
          eval(this.responseText);
        }
      }
      xmlhttp.open("POST", "DeleteAccountManagementA.php?uidDelete=" + uidDelete, true);
      xmlhttp.send();

    }

    function deleteClassManagement(th, cid) {
      // alert("cid is:" + cid);
      document.getElementById('cidmoc').value = cid;
    }

    function ChackDeleteCM() {
      var cidDelete = document.getElementById('cidmoc').value;
      // alert(cidDelete);

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          alert("success");
          eval(this.responseText);
        }
      }
      xmlhttp.open("POST", "DeleteClassManagementA.php?cidDelete=" + cidDelete, true);
      xmlhttp.send();


    }

    function deleteSectionManagement(th, sid) {
      // alert("sid is:" + sid);
      document.getElementById('sidmoc').value = sid;
    }

    function ChackDeleteSM() {
      var sidDelete = document.getElementById('sidmoc').value;
      // alert(sidDelete);

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          alert("success");
          eval(this.responseText);
        }
      }
      xmlhttp.open("POST", "DeleteSectionManagementA.php?sidDelete=" + sidDelete, true);
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

    function fillclassManagementTb() {

      // alert("in fun fillclassManagementTb");
      $('#classManagementTb tbody tr').remove();
      CIDSearch = $("#CIDSearch").val();
      classNameSearch = $("#classNameSearch").val();

      // alert(CIDSearch);
      // alert(classNameSearch);


      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          $('#classManagementTb').append(this.responseText);
        }
      }
      xmlhttp.open("POST", "FillClassManagementTbA.php?CIDSearch=" + CIDSearch + "&classNameSearch=" + classNameSearch, true);
      xmlhttp.send();
    }

    function fillSectionManagementTb() {

      // alert("in fun SectionManagementTb");
      $('#SectionManagementTb tbody tr').remove();
      sectionIDSearch = $("#SectionIDSearch").val();
      sectionNameSearch = $("#sectionNameSearch").val();
      createBySearch = $("#createBySearch").val();

      // alert(sectionIDSearch);
      // alert(sectionNameSearch);
      // alert(createBySearch);


      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          $('#SectionManagementTb').append(this.responseText);
        }
      }
      xmlhttp.open("POST", "FillSectionManagementTbA.php?sectionIDSearch=" + sectionIDSearch + "&sectionNameSearch=" + sectionNameSearch + "&createBySearch=" + createBySearch, true);
      xmlhttp.send();
    }
  </script>
  <input id="uidmoc" type="hidden">
  <input id="utypemoc" type="hidden">
  <input id="cidmoc" type="hidden">
  <input id="sidmoc" type="hidden">
  <!-- <input id="" type="hidden"> -->
  <div class="container-table">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">Account Management</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">Class Management</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab3" role="tab">Section Management</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab4" role="tab">File Management</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

      <!-- Tab 1 -->
      <div class="tab-pane active" id="tab1" role="tabpanel">

        <!--Search input-->
        <form class="form-inline mx-2" style="margin-top:20px; margin-bottom:10px; justify-content: space-between;">

          <div class="form-check form-check-inline">
            <label>Select type</label>
            <select class="form-control ml-3" id="selectType" onchange="selectTypeOnChange()">
                <option value="">All type</option>
                <option value="T">Lecturer</option>
                <option value="S">Student</option>
                
            </select>
          </div>

          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addAccount">Create Account</button>

        </form>

        <form name="addAccount" method="post" action="Register.php">
          <!-- Modal -->
          <div class="modal fade" id="addAccount" role="dialog">
            <div class="modal-dialog modal-sm">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create Account</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="form-group row mt-3">
                    <div class="col-sm-12">
                      <select class="form-control" id="addUserType" name="addUserType" onchange="userType()" required oninvalid="this.setCustomValidity('Please select some type');"
                        oninput="setCustomValidity('')">
                        <option value="">User type</option>
                        <option value="A">Admin</option>
                        <option value="T">Lecturer</option>
                        <option value="S">Student</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="addFirstname" name="txtFirstname" placeholder="Firstname" disabled required oninvalid="this.setCustomValidity('Firstname is empty,\nInput only (A-Z,a-z)');"
                        oninput="setCustomValidity('')" minlength=2 maxlength=50 pattern="[A-Za-z]{2,}" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="addLastname" name="txtLastname" placeholder="Lastname" disabled required oninvalid="this.setCustomValidity('Lastname is empty,\nInput only (A-Z,a-z)');"
                        oninput="setCustomValidity('')" minlength=3 maxlength=50 pattern="[A-Za-z]{3,}" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="addUsername" name="txtUsername" placeholder="Username" disabled required oninvalid="this.setCustomValidity('Username is empty,\nInput only (A-Z,a-z,0-9)\nmin length: 6');"
                        oninput="setCustomValidity('')" minlength=6 maxlength=20 pattern="[A-Za-z,0,1,2,3,4,5,6,7,8,9]{6,}"
                      />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="addStudentID" name="txtStudentID" placeholder="Student ID (EX. 5713XXX)" disabled
                        required oninvalid="this.setCustomValidity('Student ID is empty,,\nInput only (0-9)');" oninput="setCustomValidity('')"
                        minlength=7 maxlength=7 pattern="[0,1,2,3,4,5,6,7,8,9]{7}" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <select class="form-control" id="addDepartment" name="sel1" disabled required oninvalid="this.setCustomValidity('Please select some department');"
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
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="email" class="form-control" name="txtEmail" id="addEmail" placeholder="E-mail" disabled required oninvalid="this.setCustomValidity('Enter your email');"
                        oninput="setCustomValidity('')" maxlength=30/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="password" class="form-control" id="addPassword" name="txtPassword" placeholder="Password" minlength=6 maxlength=30
                        disabled required oninvalid="this.setCustomValidity('Enter your password,\nmin length: 6');" oninput="setCustomValidity('')"
                        onkeyup='checkPassAdd();' />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="password" class="form-control" id="addPassword2" name="txtPassword2" placeholder="Confirm Password" minlength=6
                        maxlength=30 disabled required oninput="setCustomValidity('')" onkeyup='checkPassAdd();' />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <p id="message1"></p>
                    </div>
                  </div>
                </div>
                <!--End Modal Body-->
                <div class="modal-footer">
                  <!-- <button type="submit" class="btn btn-success" onclick="">Create Account</button> -->
                  <button type="submit" class="btn btn-success" onclick="$('#modalID').modal('hide')">Create Account</button>
                </div>
              </div>
            </div>
          </div>
        </form>

        <div class="form-inline mx-2 mb-3">
          <label>Search by</label>
          <input class="form-control ml-4" type="text" id="stdIDSearch" name="stdIDSearch" placeholder="Student ID">
          <input class="form-control ml-3" type="text" id="nameSearch" name="nameSearch" placeholder="Name">
          <button type="button" class="btn btn-secondary ml-3" onclick="fillaccountManagementTb()">Search</button>
        </div>

        <!--Table-->
        <div class="table-wrapper-account">
          <table class="table table-striped table-hover main" id="accountManagementTb">
            <thead class="thead">
              <tr>
                <th style="width:15%" onclick="sortTable(0)">
                  Username
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:15%" onclick="sortTable(1)">
                  Student ID
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:15%" onclick="sortTable(2)">
                  Firstname
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:15%" onclick="sortTable(3)">
                  Lastname
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:15%" onclick="sortTable(4)">
                  Department
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:15%" onclick="sortTable(5)">
                  Email
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:5%">
                  Edit
                </th>
                <th style="width:5%">
                  Delete
                </th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr>
                <td style="width:15%">
                  Student ID
                </td>
                <td style="width:15%">
                  Username
                </td>
                <td style="width:15%">
                  Firstname
                </td>
                <td style="width:15%">
                  Lastname
                </td>
                <td style="width:15%">
                  Department
                </td>
                <td style="width:15%">
                  Email
                </td>
                <td style="width:5%">
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editAccount"><i class="fa fa-edit" aria-hidden="true"></i></button>
                </td>
                <td style="width:5%">
                  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
              </tr> -->
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
        <!--End Table-->

        <form name="addAccount" method="post" action="">
          <!-- Modal -->
          <div class="modal fade" id="editAccount" role="dialog">
            <div class="modal-dialog modal-sm">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit Account</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="editFirstname" name="editFirstname" placeholder="Firstname" disabled required
                        oninvalid="this.setCustomValidity('Firstname is empty,\nInput only (A-Z,a-z)');" oninput="setCustomValidity('')"
                        minlength=2 maxlength=50 pattern="[A-Za-z]{2,}" />
                    </div>
                    <div class="col-sm-2">
                      <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem;" value="" id="defaultCheckFirstname" onclick="checkBoxEdit(1)">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="editLastname" name="editLastname" placeholder="Lastname" disabled required oninvalid="this.setCustomValidity('Lastname is empty,\nInput only (A-Z,a-z)');"
                        oninput="setCustomValidity('')" minlength=3 maxlength=50 pattern="[A-Za-z]{3,}" />
                    </div>
                    <div class="col-sm-2">
                      <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem;" value="" id="defaultCheckLastname" onclick="checkBoxEdit(2)">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="editUsername" name="editUsername" placeholder="Username" disabled required oninvalid="this.setCustomValidity('Username is empty,\nInput only (A-Z,a-z,0-9)\nmin length: 6');"
                        oninput="setCustomValidity('')" minlength=6 maxlength=20 pattern="[A-Za-z,0,1,2,3,4,5,6,7,8,9]{6,}"
                      />
                    </div>
                    <div class="col-sm-2">
                      <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem;" value="" id="defaultCheckUsername" onclick="checkBoxEdit(3)">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="editStudentID" name="editStudentID" disabled placeholder="Student ID (EX. 5713XXX)"
                        required oninvalid="this.setCustomValidity('Student ID is empty,,\nInput only (0-9)');" oninput="setCustomValidity('')"
                        minlength=7 maxlength=7 pattern="[0,1,2,3,4,5,6,7,8,9]{7}" />
                    </div>
                    <div class="col-sm-2">
                      <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem;" value="" id="defaultCheckStdID" onclick="checkBoxEdit(4)">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
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
                    <div class="col-sm-2">
                      <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem;" value="" id="defaultCheckDepart" onclick="checkBoxEdit(5)">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="editEmail" id="editEmail" placeholder="E-mail" disabled required oninvalid="this.setCustomValidity('Enter your email');"
                        oninput="setCustomValidity('')" maxlength=30/>
                    </div>
                    <div class="col-sm-2">
                      <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem;" value="" id="defaultCheckEmail" onclick="checkBoxEdit(6)">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="editPassword" name="editPassword" disabled placeholder="New Password" minlength=6
                        maxlength=30 required oninvalid="this.setCustomValidity('Enter your password,\nmin length: 6');" oninput="setCustomValidity('')"
                        onkeyup='checkPassEdit();' />
                    </div>
                    <div class="col-sm-2">
                      <input class="form-check-input" type="checkbox" style="margin-top: 0.7rem;" value="" id="defaultCheckPass" onclick="checkBoxEdit(7)">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="editPassword2" name="editPassword2" disabled placeholder="Confirm New Password"
                        minlength=6 maxlength=30 required oninput="setCustomValidity('')" onkeyup='checkPassEdit();' />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <p id="message"></p>
                    </div>
                  </div>
                </div>
                <!--End Modal Body-->
                <div class="modal-footer">
                  <!-- <button type="submit" class="btn btn-success" onclick="editAccountManagementOnClick(); $('#modalID').modal('hide')">Save</button> -->
                  <button type="button" class="btn btn-success" data-dismiss="modal" onclick="editAccountManagementOnClick();">Save</button>
                  <!-- <button type="submit" class="btn btn-success" onclick="">Save</button> -->

                </div>
              </div>
            </div>
          </div>
        </form>

      </div>
      <!-- End Tab1 -->

      <!-- Tab 2 -->
      <div class="tab-pane" id="tab2" role="tabpane2">

        <form class="form-inline mx-2 mb-3" style="margin-top:20px; justify-content: space-between;">
          <div class="form-inline">
            <label>Search by</label>
            <input class="form-control ml-3" type="text" id="CIDSearch" name="CIDSearch" placeholder="Class ID">
            <input class="form-control ml-3" type="text" id="classNameSearch" name="classNameSearch" placeholder="Class Name">
            <button type="button" class="btn btn-secondary ml-3" onclick="fillclassManagementTb()">Search</button>
          </div>

          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addClass">Create Class</button>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="addClass" role="dialog">
          <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Create Class</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body mx-2">
                <label>Class Name</label><br/>
                <input class="form-control mb-3" type="text" id="addClassName" name="addClassName" placeholder="Class Name">
              </div>
              <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-success" onclick="">Create Class</button> -->
                <button type="button" class="btn btn-success" data-dismiss="modal" onclick="addClass();">Save</button>

              </div>
            </div>
          </div>
        </div>

        <!--Table-->
        <div class="table-wrapper-account">
          <table class="table table-striped table-hover main" id="classManagementTb">
            <thead class="thead">
              <tr>
                <th style="width:20%" onclick="sortTable1(0)">
                  Class ID
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:50%" onclick="sortTable1(1)">
                  Class Name
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:15%">
                  Edit
                </th>
                <th style="width:15%">
                  Delete
                </th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr>
                <td style="width:20%">
                  1
                </td>
                <td style="width:50%">
                  EGCO111 Computer Programming
                </td>
                <td style="width:15%">
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editClass"><i class="fa fa-edit" aria-hidden="true"></i></button>
                </td>
                <td style="width:15%">
                  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
        <!--End Table-->

        <!-- Modal -->
        <div class="modal fade" id="editClass" role="dialog">
          <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Class</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body mx-2">
                <label>New Class Name</label><br/>
                <input class="form-control mb-3" type="text" id="editClassName" name="editClassName" placeholder="Class Name">
              </div>
              <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-success" onclick="">Save</button> -->
                <button type="button" class="btn btn-success" data-dismiss="modal" onclick="editClassManagementOnClick();">Save</button>

              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- End Tab2 -->

      <!-- Tab 3 -->
      <div class="tab-pane" id="tab3" role="tabpane3">

        <form class="form-inline mx-2 mb-3" style="margin-top:20px">
          <div class="form-inline">
            <label>Search by</label>
            <input class="form-control ml-3" type="text" id="SectionIDSearch" name="SectionIDSearch" placeholder="Section ID">
            <input class="form-control ml-3" type="text" id="sectionNameSearch" name="sectionNameSearch" placeholder="Section Name">
            <input class="form-control ml-3" type="text" id="createBySearch" name="createBySearch" placeholder="Lecturer Name">
            <button type="button" class="btn btn-secondary ml-3" onclick="fillSectionManagementTb()">Search</button>
          </div>
        </form>

        <!--Table-->
        <div class="table-wrapper-account">
          <table class="table table-striped table-hover main" id="SectionManagementTb">
            <thead class="thead">
              <tr>
                <th style="width:15%" onclick="sortTable1(0)">
                  Section ID
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:35%" onclick="sortTable1(1)">
                  Section Name
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:15%" onclick="sortTable1(2)">
                  Password
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:15%" onclick="sortTable1(3)">
                  Create by
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:10%">
                  Edit
                </th>
                <th style="width:10%">
                  Delete
                </th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr>
                <td style="width:15%">
                  1
                </td>
                <td style="width:35%">
                  EGCO
                </td>
                <td style="width:15%">
                  d9JR24
                </td>
                <td style="width:15%">
                  Teacher1
                </td>
                <td style="width:10%">
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editSection"><i class="fa fa-edit" aria-hidden="true"></i></button>
                </td>
                <td style="width:10%">
                  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
        <!--End Table-->

        <!-- Modal -->
        <div class="modal fade" id="editSection" role="dialog">
          <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Section</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body mx-2">
                <label>New Section Name</label><br/>
                <input class="form-control mb-3" type="text" id="editSectionName" name="editSectionName" placeholder="Section Name">
              </div>
              <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-success" onclick="">Save</button> -->
                <button type="button" class="btn btn-success" data-dismiss="modal" onclick="editSectionManagementOnClick();">Save</button>
              </div>
            </div>
          </div>
        </div>


      </div>
      <!-- End Tab3 -->

      <!-- Tab 4 -->
      <div class="tab-pane" id="tab4" role="tabpane4">

        <form class="form-inline mx-2 mb-3" style="margin-top:20px">
          <div class="form-inline">
            <input type="radio" name="typeFile" value="flag" checked> Flag &emsp;
            <input type="radio" name="typeFile" value="fileSubmit"> File Submit &emsp;
            <label class="mr-3">Start Date :</label>
            <input id="startDate" width="200" />
            <label class="ml-3 mr-3">End Date :</label>
            <input id="endDate" width="200" />
          </div>
          <input id="typeFilemoc" type="hidden">
          <script>
            var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
            $('#startDate').datepicker({
              uiLibrary: 'bootstrap4',
              iconsLibrary: 'fontawesome',
              format: 'yyyy-mm-dd',
              maxDate: function () {
                return $('#endDate').val();
              }
            });
            $('#endDate').datepicker({
              uiLibrary: 'bootstrap4',
              iconsLibrary: 'fontawesome',
              format: 'yyyy-mm-dd',
              minDate: function () {
                return $('#startDate').val();
              }
            });
          </script>
          <button type="button" class="btn btn-secondary ml-3" onclick="fillFileManagement()">Search</button>
        </form>

        <script>
            function fillFileManagement() {
              //alert("in testDate");
              var sdate = $('#startDate').datepicker().val();
              var edate = $('#endDate').datepicker().val();
              // if (document.getElementById('flag').checked) {
              //   aler("flag on");
              //   // rate_value = document.getElementById('r1').value;
              // }
              if ($('input[name=typeFile]:checked').val() == 'flag') {
                tFile = document.getElementById('typeFilemoc').value = 'flag';
                // alert(tFile);
              } else {
                tFile = document.getElementById('typeFilemoc').value = 'fileSubmit';
                // alert(tFile);
              }

              var tFilesearch = document.getElementById('typeFilemoc').value;
              //alert("start date is: " + sdate);
              //alert("end date is: " + edate);
              //alert("type file is: " + tFile);
              //alert(tFilesearch);
              $('#FileManagementTb tbody tr').remove();
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {

                  $('#FileManagementTb').append(this.responseText);
                }
              }
              xmlhttp.open("POST", "FillFileManagementTbA.php?tFilesearch=" + tFilesearch + "&dateStart=" + sdate + "&dateEnd=" + edate, true);
              xmlhttp.send();


            }
            function selectallFile(source) {
              checkboxes = document.getElementsByName('foo');
              for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
              }
            }
            function checkFileDelete() {
              checkboxes = document.getElementsByName('foo');
              for (var i = 0, n = checkboxes.length; i < n; i++) {
                if (checkboxes[i].checked) {
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                      eval(this.responseText);
                    }
                  }
                  xmlhttp.open("POST", "DeleteFile.php?file=" + checkboxes[i].value, false);
                  xmlhttp.send();
                }
              }
            }
            function toggleTableHeader(a) {
              var b = document.getElementById("fileSearchRadio");
              if (a == 'flag') {

                b.style.visibility = 'hidden';
              }
              else {
                b.style.visibility = 'visible';
              }
            }
        </script>

        <!--Table-->
        <div class="table-wrapper-account">
          <table class="table table-striped table-hover main" id="FileManagementTb">
            <thead class="thead">
              <tr id="fileSearchRadio">
                <th style="width:10%" onclick="sortTable1(0)">
                  <label class="form-check-label">
                      <input type="checkbox" onclick = "selectallFile(this);" class="form-check-input">
                      All
                    </label>
                </th>
                <th style="width:10%" onclick="sortTable1(1)">
                  User ID
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:20%" onclick="sortTable1(1)">
                  Homework ID
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:30%" onclick="sortTable1(1)">
                  File Name
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:30%" onclick="sortTable1(2)">
                  Submit Date
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
        <!--End Table-->

        <button type="button" class="btn btn-danger" onclick="checkFileDelete();"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>

      </div>
      <!-- End Tab4 -->
    </div>
    <!-- End Tab Content -->
  </div>

  <div class="modal fade" id="modalChackDeleteAM" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body " style="text-align: center; margin-bottom:20px;">
          <h5 style="margin-bottom:20px">Do you want to delete?</h5>
          <button type="button" class="btn btn-success" onclick="ChackDeleteAM();" data-dismiss="modal" style="margin-right:5px">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalChackDeleteCM" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body " style="text-align: center; margin-bottom:20px;">
          <h5 style="margin-bottom:20px">Do you want to delete?</h5>
          <button type="button" class="btn btn-success" onclick="ChackDeleteCM();" data-dismiss="modal" style="margin-right:5px">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalChackDeleteSM" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body " style="text-align: center; margin-bottom:20px;">
          <h5 style="margin-bottom:20px">Do you want to delete?</h5>
          <button type="button" class="btn btn-success" onclick="ChackDeleteSM();" data-dismiss="modal" style="margin-right:5px">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
