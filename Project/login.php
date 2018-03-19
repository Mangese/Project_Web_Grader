<!DOCTYPE html>
<html lang="en">

<head>
  <title>login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <style>
    body {
      background-color: #f2f2f2;
    }

    .login-container {
      width: 80%;
      height: 500px;
      margin: 0px auto;
      margin-top: 80px;
      padding: 30px 20px;
      border-radius: 5px;
      text-align: center;
      color: #008080;
      background-color: #ffffff;
      box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);
    }

    .modal-content {
      text-align: left;
    }
  </style>
</head>

<body>
  <script>
    function testalert() {
      //alert("test alert");
    }
    function goRegister() {
    //  alert("go register page");
      window.location.assign("Register.php");
    }

    function check() {
      var password = document.getElementById("txtPassword")
      var confirm_password = document.getElementById("txtPassword2");
      var message = document.getElementById('message')
      confirm_password.setCustomValidity('')
      if (password.value == confirm_password.value) {
        if (password.value == '' || confirm_password.value == '') {
          message.innerHTML = ' ';
        }
        else {
          message.style.color = 'green';
          message.innerHTML = '*Matching*';
        }
      } else {
        message.style.color = 'red';
        message.innerHTML = "*Passwords Doesn't Match*";
        confirm_password.setCustomValidity("Passwords Doesn't Match!!");
      }
    }
  </script>
  <div class="login-container">
    <h1 class="my-4">STUDENT WEB GRADER</h1>
    <?php
  	session_start();
	if(isset($_SESSION["user"]) && isset($_SESSION["utype"]))
	{	if(!strcmp($_SESSION["utype"],"A"))
		{
		echo "<script> window.location = 'AdminPage.php' </script>";
		}
		if(!strcmp($_SESSION["utype"],"T"))
		{
		echo "<script> window.location = 'TeacherUpload2.php' </script>";
		}
		else if(!strcmp($_SESSION["utype"],"S"))
		{
		echo "<script> window.location = 'StudentUpload1.php' </script>";
		}
	}
	  
?>


      <form name="from1" method="post" action="testSignIn.php">
        <div class="form-group row">
          <label for="inputEmail" class="col-sm-4 col-form-label">
              <!-- Email -->
            </label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="inputEmail3" placeholder="Username" required oninvalid="this.setCustomValidity('Enter your username');"
              oninput="setCustomValidity('')" />
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-4 col-form-label">
              <!-- Password -->
            </label>
          <div class="col-sm-4">
            <input type="password" class="form-control" name="inputPassword3" placeholder="Password" required oninvalid="this.setCustomValidity('Enter your password');"
              oninput="setCustomValidity('')" />
          </div>
        </div>
        <div class="in-line">
          <!--<button onclick="goRegister()" class="btn btn-primary">Sign in</button>-->
          <button type="submit" class="btn btn-success" data-dismiss="modal">Sign in</button>
          <!-- Trigger the modal with a button -->
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Register</button>
        </div>
      </form>
      <form name="from2" method="post" action="Register.php">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Register</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body mx-2 mt-2 pb-0">
                <div class="form-group row">
                  <div class="col-sm-5">
                    <label class="mt-2">Firstname</label>
                  </div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="txtFirstname" name="txtFirstname" placeholder="Firstname" required oninvalid="this.setCustomValidity('Firstname is empty,\nInput only (A-Z,a-z)');"
                      oninput="setCustomValidity('')" minlength=2 maxlength=50 pattern="[A-Za-z]{2,}" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-5">
                    <label class="mt-2">Lastname</label>
                  </div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="txtLastname" placeholder="Lastname" required oninvalid="this.setCustomValidity('Lastname is empty,\nInput only (A-Z,a-z)');"
                      oninput="setCustomValidity('')" minlength=3 maxlength=50 pattern="[A-Za-z]{3,}" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-5">
                    <label class="mt-2">Username</label>
                  </div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="txtUsername" placeholder="Username" required oninvalid="this.setCustomValidity('Username is empty,\nInput only (A-Z,a-z,0-9)\nmin length: 6');"
                      oninput="setCustomValidity('')" minlength=6 maxlength=20 pattern="[A-Za-z,0,1,2,3,4,5,6,7,8,9]{6,}" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-5">
                    <label class="mt-2">Student ID</label>
                  </div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="txtStudentID" placeholder="Student ID (EX. 5713XXX)" required oninvalid="this.setCustomValidity('Student ID is empty,,\nInput only (0-9)');"
                      oninput="setCustomValidity('')" minlength=7 maxlength=7 pattern="[0,1,2,3,4,5,6,7,8,9]{7}" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-5">
                    <label class="mt-2">Department</label>
                  </div>
                  <div class="col-sm-7">
                    <select class="form-control" id="sel1" name="sel1" required oninvalid="this.setCustomValidity('Please select some department');"
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
                  <div class="col-sm-5">
                    <label class="mt-2">Email</label>
                  </div>
                  <div class="col-sm-7">
                    <input type="email" class="form-control" name="txtEmail" placeholder="E-mail" required oninvalid="this.setCustomValidity('Enter your email');"
                      oninput="setCustomValidity('')" maxlength=50/>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-5">
                    <label class="mt-2">Password</label>
                  </div>
                  <div class="col-sm-7">
                    <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Password" minlength=6 maxlength=30
                      required oninvalid="this.setCustomValidity('Enter your password,\nmin length: 6');" oninput="setCustomValidity('')"
                      onkeyup='check();' />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-5">
                    <label class="mt-2">Confirm Password</label>
                  </div>
                  <div class="col-sm-7">
                    <input type="password" class="form-control" id="txtPassword2" name="txtPassword2" placeholder="Confirm Password" minlength=6
                      maxlength=30 required oninput="setCustomValidity('')" onkeyup='check();' />
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <div class="col-sm-5">
                    
                  </div>
                  <div class="col-sm-7">
                    <p id="message" style="font-weight: 500;"></p>
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
  </div>


</body>

</html>
