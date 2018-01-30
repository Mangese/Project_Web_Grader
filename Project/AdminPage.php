<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

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
  if(strcmp($UT,"T"))
  {
    echo "<script> alert('Invalid Page'); window.location = 'StudentUpload1.php'; </script>";
  }
  }
  ?> -->

<body>
  <script>
    function selectTypeOnChange() {
      typeSearch = $("#selectType").val();
      // alert(typeSearch);
      if (typeSearch == 'T') {
        document.getElementById("SIDSearch").disabled = true;
        document.getElementById('SIDSearch').value = '';
      }
      else {
        document.getElementById("SIDSearch").disabled = false;
      }


    }

    function fillaccountManagementTb() {

      // alert("in fun fillaccountManagementTb");
      $('#accountManagementTb tbody tr').remove();
      typeSearch = $("#selectType").val();
      sidSearch = $("#SIDSearch").val();
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

      <div class="tab-pane active" id="tab1" role="tabpanel">
        <!--Search input-->
        <form class="form-inline mx-2" style="margin-top:20px; margin-bottom:5px; justify-content: space-between;">

          <div class="form-check form-check-inline">
            <!-- <input class="form-check-input" type="radio" name="Radio" id="Radio1" value="student" checked>
            <label class="form-check-label" for="Radio1">
                            Student
                        </label>
            <input class="form-check-input ml-3" type="radio" name="Radio" id="Radio2" value="teacher">
            <label class="form-check-label" for="Radio2">
                            Teacher
                        </label> -->
            <label>
                          Select type
                        </label>
            <select class="form-control ml-3" id="selectType" onchange="selectTypeOnChange()">
                            <option value="">All type</option>
                            <option value="S">Student</option>
                            <option value="T">Teacher</option>
                        </select>
          </div>

          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Create Account</button>

        </form>

        <form name="addAccountModal" method="post">
          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-md">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create Account</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="txtFirstname" name="txtFirstname" placeholder="Firstname" required oninvalid="this.setCustomValidity('Firstname is empty,\nInput only (A-Z,a-z)');"
                        oninput="setCustomValidity('')" minlength=2 maxlength=50 pattern="[A-Za-z]{2,}" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="txtLastname" placeholder="Lastname" required oninvalid="this.setCustomValidity('Lastname is empty,\nInput only (A-Z,a-z)');"
                        oninput="setCustomValidity('')" minlength=3 maxlength=50 pattern="[A-Za-z]{3,}" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="txtUsername" placeholder="Username" required oninvalid="this.setCustomValidity('Username is empty,\nInput only (A-Z,a-z,0-9)\nmin length: 6');"
                        oninput="setCustomValidity('')" minlength=6 maxlength=20 pattern="[A-Za-z,0,1,2,3,4,5,6,7,8,9]{6,}"
                      />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="txtStudentID" placeholder="Student ID (EX. 5713XXX)" required oninvalid="this.setCustomValidity('Student ID is empty,,\nInput only (0-9)');"
                        oninput="setCustomValidity('')" minlength=7 maxlength=7 pattern="[0,1,2,3,4,5,6,7,8,9]{7}" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <select class="form-control" id="sel1" name="sel1" required oninvalid="this.setCustomValidity('Please select some department');"
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
                      <input type="email" class="form-control" name="txtEmail" placeholder="E-mail" required oninvalid="this.setCustomValidity('Enter your email');"
                        oninput="setCustomValidity('')" maxlength=30/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Password" minlength=6 maxlength=30
                        required oninvalid="this.setCustomValidity('Enter your password,\nmin length: 6');" oninput="setCustomValidity('')"
                        onkeyup='check();' />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="password" class="form-control" id="txtPassword2" name="txtPassword2" placeholder="Confirm Password" minlength=6
                        maxlength=30 required oninput="setCustomValidity('')" onkeyup='check();' />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <p id="message"></p>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-success" onclick="$('#modalID').modal('hide')">Create Account</button>
                </div>
              </div>
            </div>
          </div>
        </form>

        <div class="form-inline mx-2 mb-3">
          <label>Search by</label>
          <!-- <select class="form-control ml-3" id="exampleFormControlSelect1">
                        <option value="name">Name</option>
                        <option value="SID">Student ID</option>
                    </select> -->
          <input class="form-control ml-3" type="text" id="SIDSearch" name="SIDSearch" placeholder="StudentID">
          <input class="form-control ml-3" type="text" id="nameSearch" name="nameSearch" placeholder="Name">
          <button type="button" class="btn btn-secondary ml-3" onclick="fillaccountManagementTb()">Search</button>

        </div>

        <!-- <div class="dropdown" style="width:200px">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Search by
                    </button>
                    <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Name</a>
                        <a class="dropdown-item" href="#">Student ID</a>
                    </div>
                </div>

                <script>
                    $(".dropdown-menu a").click(function(){
                    $(".btn:first-child").html($(this).text()+' <span class="caret"></span>');
                    });
                </script> -->

        <!--Table-->
        <div class="table-wrapper-account">
          <table class="table table-striped table-hover main" id="accountManagementTb">
            <thead class="thead">
              <tr>
                <th style="width:15%" onclick="sortTable1(0)">
                  Student ID
                  <i class="fa fa-sort" aria-hidden="true" style="float: right; padding-top:3px;"></i>
                </th>
                <th style="width:15%" onclick="sortTable1(1)">
                  Username
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
                <td style="width:15%" onclick="sortTable1(0)">
                  Student ID
                </td>
                <td style="width:15%" onclick="sortTable1(1)">
                  Username
                </td>
                <td style="width:15%" onclick="sortTable1(2)">
                  Firstname
                </td>
                <td style="width:15%" onclick="sortTable1(3)">
                  Lastname
                </td>
                <td style="width:15%" onclick="sortTable1(4)">
                  Department
                </td>
                <td style="width:15%" onclick="sortTable1(5)">
                  Email
                </td>
                <td style="width:5%">
                  <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#myModal2"><i class="fa fa-edit" aria-hidden="true"></i></button>
                </td>
                <td style="width:5%">
                  <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
              </tr>
            </tbody>
          </table>

          <form name="editAccountModal" method="post">
            <!-- Modal -->
            <div class="modal fade" id="myModal2" role="dialog">
              <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Account</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" id="txtFirstname2" name="txtFirstname" placeholder="Firstname" required oninvalid="this.setCustomValidity('Firstname is empty,\nInput only (A-Z,a-z)');"
                          oninput="setCustomValidity('')" minlength=2 maxlength=50 pattern="[A-Za-z]{2,}" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="txtLastname2" placeholder="Lastname" required oninvalid="this.setCustomValidity('Lastname is empty,\nInput only (A-Z,a-z)');"
                          oninput="setCustomValidity('')" minlength=3 maxlength=50 pattern="[A-Za-z]{3,}" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="txtUsername2" placeholder="Username" required oninvalid="this.setCustomValidity('Username is empty,\nInput only (A-Z,a-z,0-9)\nmin length: 6');"
                          oninput="setCustomValidity('')" minlength=6 maxlength=20 pattern="[A-Za-z,0,1,2,3,4,5,6,7,8,9]{6,}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="txtStudentID2" placeholder="Student ID (EX. 5713XXX)" required oninvalid="this.setCustomValidity('Student ID is empty,,\nInput only (0-9)');"
                          oninput="setCustomValidity('')" minlength=7 maxlength=7 pattern="[0,1,2,3,4,5,6,7,8,9]{7}" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <select class="form-control" id="sel2" name="sel2" required oninvalid="this.setCustomValidity('Please select some department');"
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
                        <input type="email" class="form-control" name="txtEmail2" placeholder="E-mail" required oninvalid="this.setCustomValidity('Enter your email');"
                          oninput="setCustomValidity('')" maxlength=30/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="password" class="form-control" id="txtNewPassword" name="txtNewPassword" placeholder="New Password" minlength=6 maxlength=30
                          required oninvalid="this.setCustomValidity('Enter your password,\nmin length: 6');" oninput="setCustomValidity('')"
                          onkeyup='check();' />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="password" class="form-control" id="txtNewPassword2" name="txtNewPassword2" placeholder="Confirm New Password" minlength=6
                          maxlength=30 required oninput="setCustomValidity('')" onkeyup='check();' />
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success" onclick="$('#modalID').modal('hide')">Save</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!--End Table-->
      </div>
      <!-- End Tab1 -->

      <div class="tab-pane" id="tab2" role="tabpane2">

        <form class="form-inline mx-2" style="margin-top:20px; margin-bottom:5px; justify-content: space-between;">
          <div class="form-inline">
            <label>Class ID</label>
            <input class="form-control ml-3 mr-4" type="text" id="CIDSearch" name="CIDSearch" placeholder="Class ID">
            <label>Class Name</label>
            <input class="form-control ml-3" type="text" id="classNameSearch" name="classNameSearch" placeholder="Class Name">
            <button type="button" class="btn btn-secondary ml-3" onclick="">Search</button>
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
              <div class="modal-body">
                <label>Class Name</label><br/>
                <input class="form-control ml-3" type="text" id="addClassName" name="addClassName" placeholder="Class Name">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" onclick="">Save</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <!-- <div class="modal fade" id="addClass" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="modelTitleId">Create Class</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <label>Class Name</label>
                <input class="form-control ml-3" type="text" id="addClassName" name="addClassName" placeholder="Class Name">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" onclick="">Create Class</button>
              </div>
            </div>
          </div>
        </div> -->

      </div>
      <!-- End Tab2 -->

      <div class="tab-pane" id="tab3" role="tabpane3">

      </div>
      <!-- End Tab3 -->

      <div class="tab-pane" id="tab4" role="tabpane4">

      </div>
      <!-- End Tab4 -->
    </div>
    <!-- End Tab Content -->
</body>

</html>
