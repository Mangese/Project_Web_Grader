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
    /*
.shiftleft{

 float: left; 
}
.in-line{

  display: inline
}*/
  </style>
</head>

<body>

  <script>
    function testalert() {
      alert("test alert");
    }
	function LinkToUpload(){
	window.location = "/Project/StudentUpload.html";
	}

  </script>
  <div class="login-container">
    <h1>STUDENT WEB GRADER</h1>

    <form>
      <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">
              <!-- Email -->
            </label>
        <div class="col-sm-4">
          <input type="email" class="form-control" id="inputEmail3" placeholder="Email" />
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-4 col-form-label">
              <!-- Password -->
            </label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="inputPassword3" placeholder="Password" />
        </div>
      </div>


      <div class="in-line">
        <button type = "button" onclick="LinkToUpload()" class="btn btn-primary">Sign in</button>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Register</button>
      </div>
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
                  <input type="text" class="form-control" id="" placeholder="Firstname" />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="" placeholder="Lastname" />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="" placeholder="Username" />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="" placeholder="Student ID (EX. 5713XXX)" />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <select class="form-control" id="sel1">
		        <option>Department</option>
		        <option>Biomedical Engineering</option>
		        <option>Civil Engineering</option>
		        <option>Chemical Engineering</option>
		        <option>Computer Engineering</option>
		        <option>Electrical Engineering</option>
		        <option>Industrial Engineering</option>
		        <option>Mechanical Engineering</option>
		      </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <input type="email" class="form-control" id="" placeholder="E-mail" />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <input type="password" class="form-control" id="" placeholder="Password" />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <input type="password" class="form-control" id="" placeholder="Confirm Password" />
                </div>
              </div>

              <!-- <p>Some text in the modal.</p> -->

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Create Account</button>
            </div>
          </div>

        </div>
      </div>
    </form>
  </div>


</body>

</html>
