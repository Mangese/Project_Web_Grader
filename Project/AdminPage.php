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
  if(!strcmp($UT,"S"))
  {
	  echo "<script> alert('Invalid Page'); window.location = 'StudentUpload1.php'; </script>";
  }
  else if(!strcmp($UT,"T"))
  {
	echo "<script> alert('Invalid Page'); window.location = 'TeacherUpload2.php'; </script>";
  }
  }
  ?>

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

                function editAccountManagementTb(th, uid) {
                  alert(uid);

                }

                function fillclassManagementTb() {

                  alert("in fun fillclassManagementTb");
                  $('#classManagementTb tbody tr').remove();
                  CIDSearch = $("#CIDSearch").val();
                  classNameSearch = $("#classNameSearch").val();

                  alert(CIDSearch);
                  alert(classNameSearch);


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
                <option value="S">Student</option>
                <option value="T">Lecturer</option>
            </select>
            </div>

            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addAccount">Create Account</button>

          </form>

          <form name="addAccount" method="post" action="">
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
                        <select class="form-control" id="addUserType" name="addUserType" required oninvalid="this.setCustomValidity('Please select some type');"
                          oninput="setCustomValidity('')">
                        <option value="">User type</option>
                        <option value="Lecturer">Lecturer</option>
                        <option value="Student">Student</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" id="addFirstname" name="addFirstname" placeholder="Firstname" required oninvalid="this.setCustomValidity('Firstname is empty,\nInput only (A-Z,a-z)');"
                          oninput="setCustomValidity('')" minlength=2 maxlength=50 pattern="[A-Za-z]{2,}" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="addLastname" placeholder="Lastname" required oninvalid="this.setCustomValidity('Lastname is empty,\nInput only (A-Z,a-z)');"
                          oninput="setCustomValidity('')" minlength=3 maxlength=50 pattern="[A-Za-z]{3,}" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="addUsername" placeholder="Username" required oninvalid="this.setCustomValidity('Username is empty,\nInput only (A-Z,a-z,0-9)\nmin length: 6');"
                          oninput="setCustomValidity('')" minlength=6 maxlength=20 pattern="[A-Za-z,0,1,2,3,4,5,6,7,8,9]{6,}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="addStudentID" placeholder="Student ID (EX. 5713XXX)" required oninvalid="this.setCustomValidity('Student ID is empty,,\nInput only (0-9)');"
                          oninput="setCustomValidity('')" minlength=7 maxlength=7 pattern="[0,1,2,3,4,5,6,7,8,9]{7}" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <select class="form-control" id="addDepartment" name="addDepartment" required oninvalid="this.setCustomValidity('Please select some department');"
                          oninput="setCustomValidity('')">
                        <option value="">Department</option>
                        <option value="Biomedical Engineering">Biomedical Engineering</option>
                        <option value="Civil Engineering">Civil Engineering</option>
                        <option value="Chemical Engineering">Chemical Engineering</option>
                        <option value="Computer Engineering">Computer Engineering</option>
                        <option value="Electrical Engineering">Electrical Engineering</option>
                        <option value="Industrial Engineering">Industrial Engineering</option>
                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="email" class="form-control" name="addEmail" placeholder="E-mail" required oninvalid="this.setCustomValidity('Enter your email');"
                          oninput="setCustomValidity('')" maxlength=30/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="password" class="form-control" id="addPassword" name="addPassword" placeholder="Password" minlength=6 maxlength=30
                          required oninvalid="this.setCustomValidity('Enter your password,\nmin length: 6');" oninput="setCustomValidity('')"
                          onkeyup='check();' />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="password" class="form-control" id="addPassword2" name="addPassword2" placeholder="Confirm Password" minlength=6
                          maxlength=30 required oninput="setCustomValidity('')" onkeyup='check();' />
                      </div>
                    </div>
                  </div>
                  <!--End Modal Body-->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success" onclick="">Create Account</button>
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
                  <th style="width:15%" onclick="sortTable1(0)">
                    Username
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:15%" onclick="sortTable1(1)">
                    Student ID
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:15%" onclick="sortTable1(2)">
                    Firstname
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:15%" onclick="sortTable1(3)">
                    Lastname
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:15%" onclick="sortTable1(4)">
                    Department
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:15%" onclick="sortTable1(5)">
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
                <tr>
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
                    <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#editAccount"><i class="fa fa-edit" aria-hidden="true"></i></button>
                  </td>
                  <td style="width:5%">
                    <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
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
                    <div class="form-group row mt-3">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" id="editFirstname" name="editFirstname" placeholder="Firstname" required oninvalid="this.setCustomValidity('Firstname is empty,\nInput only (A-Z,a-z)');"
                          oninput="setCustomValidity('')" minlength=2 maxlength=50 pattern="[A-Za-z]{2,}" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="editLastname" placeholder="Lastname" required oninvalid="this.setCustomValidity('Lastname is empty,\nInput only (A-Z,a-z)');"
                          oninput="setCustomValidity('')" minlength=3 maxlength=50 pattern="[A-Za-z]{3,}" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="editUsername" placeholder="Username" required oninvalid="this.setCustomValidity('Username is empty,\nInput only (A-Z,a-z,0-9)\nmin length: 6');"
                          oninput="setCustomValidity('')" minlength=6 maxlength=20 pattern="[A-Za-z,0,1,2,3,4,5,6,7,8,9]{6,}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="editStudentID" placeholder="Student ID (EX. 5713XXX)" required oninvalid="this.setCustomValidity('Student ID is empty,,\nInput only (0-9)');"
                          oninput="setCustomValidity('')" minlength=7 maxlength=7 pattern="[0,1,2,3,4,5,6,7,8,9]{7}" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <select class="form-control" id="editDepartment" name="editDepartment" required oninvalid="this.setCustomValidity('Please select some department');"
                          oninput="setCustomValidity('')">
                        <option value="">Department</option>
                        <option value="Biomedical Engineering">Biomedical Engineering</option>
                        <option value="Civil Engineering">Civil Engineering</option>
                        <option value="Chemical Engineering">Chemical Engineering</option>
                        <option value="Computer Engineering">Computer Engineering</option>
                        <option value="Electrical Engineering">Electrical Engineering</option>
                        <option value="Industrial Engineering">Industrial Engineering</option>
                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="email" class="form-control" name="editEmail" placeholder="E-mail" required oninvalid="this.setCustomValidity('Enter your email');"
                          oninput="setCustomValidity('')" maxlength=30/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="password" class="form-control" id="editPassword" name="editPassword" placeholder="New Password" minlength=6
                          maxlength=30 required oninvalid="this.setCustomValidity('Enter your password,\nmin length: 6');"
                          oninput="setCustomValidity('')" onkeyup='check();' />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="password" class="form-control" id="editPassword2" name="editPassword2" placeholder="Confirm New Password" minlength=6
                          maxlength=30 required oninput="setCustomValidity('')" onkeyup='check();' />
                      </div>
                    </div>
                  </div>
                  <!--End Modal Body-->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success" onclick="">Save</button>
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
                  <button type="submit" class="btn btn-success" onclick="">Create Class</button>
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
                <tr>
                  <td style="width:20%">
                    1
                  </td>
                  <td style="width:50%">
                    EGCO111 Computer Programming
                  </td>
                  <td style="width:15%">
                    <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#editClass"><i class="fa fa-edit" aria-hidden="true"></i></button>
                  </td>
                  <td style="width:15%">
                    <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </td>
                </tr>
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
                  <button type="submit" class="btn btn-success" onclick="">Save</button>
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
                <tr>
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
                    <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#editSection"><i class="fa fa-edit" aria-hidden="true"></i></button>
                  </td>
                  <td style="width:10%">
                    <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </td>
                </tr>
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
                  <button type="submit" class="btn btn-success" onclick="">Save</button>
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
              <label class="mr-3">Start Date :</label>
              <input id="startDate" width="200" />
              <label class="ml-3 mr-3">End Date :</label>
              <input id="endDate" width="200" />
            </div>
            <script>
                var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
                $('#startDate').datepicker({
                  uiLibrary: 'bootstrap4',
                  iconsLibrary: 'fontawesome',
                  maxDate: function () {
                    return $('#endDate').val();
                  }
                });
                $('#endDate').datepicker({
                  uiLibrary: 'bootstrap4',
                  iconsLibrary: 'fontawesome',
                  minDate: function () {
                    return $('#startDate').val();
                  }
                });
            </script>
            <button type="button" class="btn btn-secondary ml-3" onclick="">Search</button>
          </form>

          <!--Table-->
          <div class="table-wrapper-account">
            <table class="table table-striped table-hover main" id="SectionManagementTb">
              <thead class="thead">
                <tr>
                  <th style="width:10%" onclick="sortTable1(0)">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input">
                      All
                    </label>
                  </th>
                  <th style="width:65%" onclick="sortTable1(1)">
                    File Name
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                  <th style="width:35%" onclick="sortTable1(2)">
                    Submit Date
                    <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="width:10%">
                    <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                  </label>
                  </td>
                  <td style="width:65%">
                    PrintStar.c
                  </td>
                  <td style="width:35%">
                    August 2, 2013
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!--End Table-->

          <button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>

        </div>
        <!-- End Tab4 -->
      </div>
      <!-- End Tab Content -->
    </div>
  </body>

</html>
