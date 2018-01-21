<!DOCTYPE html>
<html lang="en">

<head>
  <title>login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
      alert("test alert");
    }
    function goRegister() {
      alert("go register page");
      window.location.assign("Register.php");
    }

    function check() {
      var password = document.getElementById("txtPassword")
      var confirm_password = document.getElementById("txtPassword2");
      var message = document.getElementById('message')
      confirm_password.setCustomValidity('')
      if (password.value == confirm_password.value) {
        message.style.color = 'green';
        message.innerHTML = '*matching*';
      } else {
        message.style.color = 'red';
        message.innerHTML = "*Passwords Doesn't Match *";
        confirm_password.setCustomValidity("Passwords Doesn't Match!!");
      }
    }
  </script>
  <div class="login-container">
    <h1>STUDENT WEB GRADER</h1>
    <?php
  	session_start();
	if(isset($_SESSION["user"]) && isset($_SESSION["utype"]))
	{	if(!strcmp($_SESSION["utype"],"A"))
		{
		echo "<script> window.location = 'Admin.php' </script>";
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
          <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register</h4>
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
                      oninput="setCustomValidity('')" minlength=6 maxlength=20 pattern="[A-Za-z,0,1,2,3,4,5,6,7,8,9]{6,}" />
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
                <!-- <p>Some text in the modal.</p> -->

              </div>
              <div class="modal-footer">
                <!--<button type="button" onclick="goRegister()" class="btn btn-success" data-dismiss="modal">Create Account</button>-->
                <!--<button type="submit" class="btn btn-success" data-dismiss="modal">Create Account</button>-->
                <button type="submit" class="btn btn-success" onclick="$('#modalID').modal('hide')">Create Account</button>
              </div>
            </div>
          </div>
        </div>
      </form>
  </div>


</body>

</html>
