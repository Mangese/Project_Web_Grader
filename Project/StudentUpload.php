<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#000000">

  <link rel="manifest" href="%PUBLIC_URL%/manifest.json">
  <link rel="shortcut icon" href="%PUBLIC_URL%/favicon.ico">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>

  <link rel="stylesheet" href="StudentUpload.css">

  <h1>Upload File</h1><br>
  <button type = "button" onclick = "window.location = 'logout.php';">Logout</button>
</head>

<body>
<?php
	session_start();
	if(!isset($_SESSION["user"]))
	{
	echo "<script> alert('Please Login First'); window.location = 'login.html'; </script>";
	}
	else
	{
	echo $_SESSION["user"];
	}
?>
  <div class="container-table">
    <table class="table table-striped table-hover main">
      <thead class="thead-inverse">
        <tr>
          <th style="width:15%">
            ID
          </th>
          <th style="width:40%">
            ชื่อโจทย์
          </th>
          <th style="width:15%">
            จำนวนที่ส่ง(ครั้ง)
          </th>
          <th style="width:15%">
            สถานะ
          </th>
          <th style="width:15%">
            Upload
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="width:15%">
            001
          </td>
          <td style="width:40%">
            Test 1
          </td>
          <td style="width:15%">
            0
          </td>
          <td style="width:15%">
            Fail
          </td>
          <td style="width:15%">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Upload</button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Test 1</h4>
                  </div>
                  <div class="modal-body">
                    <!--<div class="form-group">-->
                    <input type="file" class="filestyle" data-icon="false" id="filestyle-0" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);"
                    />
                    <div class="bootstrap-filestyle input-group" style="padding-left:100px">
                      <form class="form-horizontal" role="form" action="test1.php" method="post" enctype="multipart/form-data" />
                     <input type = "file" name = "Uploaded_file" id = "Uploaded_file">
		     <input type = "submit" value = Upload" name = "submit">
			<!-- <input type="text" class="form-control" placeholder disabled>
                      <span class="group-span-filestyle input-group-btn" tabindex="0">
                            <label for="filestyle-0" class="btn btn-default ">
                              <span class="buttonText">Choose file</span>
                      </label>
                      </span>
		     -->
                      </form>
                    </div>
                    <!--</div>-->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td style="width:15%">
            002
          </td>
          <td style="width:40%">
            Test 2
          </td>
          <td style="width:15%">
            0
          </td>
          <td style="width:15%">
            Fail
          </td>
          <td style="width:15%">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Upload</button>
          </td>
        </tr>
        <tr>
          <td style="width:15%">
            003
          </td>
          <td style="width:40%">
            Test 3
          </td>
          <td style="width:15%">
            0
          </td>
          <td style="width:15%">
            Fail
          </td>
          <td style="width:15%">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Upload</button>
          </td>
        </tr>
        <tr>
          <td style="width:15%">
            004
          </td>
          <td style="width:40%">
            Test 4
          </td>
          <td style="width:15%">
            0
          </td>
          <td style="width:15%">
            Fail
          </td>
          <td style="width:15%">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Upload</button>

          </td>
        </tr>
      </tbody>
    </table>
  </div>

</body>

</html>
