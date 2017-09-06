<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign In</title>
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
.modal-content{
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

<script >

  function testalert() {
    alert("test alert");
}
</script>
<div class="login-container" >
<h1 >Sign In</h1>        
        <form>
         <?php
         session_start();
echo "Hello World!";
echo "<br>";
echo $_POST["txtFirstname"];
echo "<br>";
echo $_POST["inputEmail3"];
echo "<br>";
if(trim($_POST["txtFirstname"]) == " ")
	{
		
		echo"<body onload=\"window.alert('Please input Name!'); 
		return history.back();\">";
		exit();
	}
$testsend = $_SESSION['testsend'];
echo "$testsend";
?> 
  </form>
</div>


</body>
</html>
