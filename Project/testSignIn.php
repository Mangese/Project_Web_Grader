
         <?php
         session_start();
if(trim($_POST["inputEmail3"]) == "")
	{
		echo"<body onload=\"window.alert('Please input Username!'); 
		return history.back();\">";
		exit();
	}

if(trim($_POST["inputPassword3"]) == "")
	{
		echo"<body onload=\"window.alert('Please input Password!'); 
		return history.back();\">";
		exit();
	}

$conn = mysql_connect("localhost","mangese","000000");
if($conn != FALSE)
{
mysql_query("use grader;");
$PW = $_POST["inputPassword3"];
$UN = $_POST["inputEmail3"];
$result = mysql_query("select count(*) as status,USER_TYPE as utp,firstname as firstname,lastname as lastname,u_id as uid from user where Username = '$UN' and password = md5('$PW');");
//$row = mysql_fetch_assoc($result);
if(mysql_num_rows($result)==1)
{
	while($row = mysql_fetch_assoc($result))
	{
		if($row['status']==1)
		{
			$_SESSION["user"] = $UN;
			$_SESSION["firstname"] = $row['firstname'];
			$_SESSION["lastname"] = $row['lastname'];
			$_SESSION["utype"] = $row['utp'];
			$_SESSION["uid"] = $row['uid'];
			if(strcmp($row['utp'],"T"))
			{
			echo "<script> window.location = 'StudentUpload1.php' </script>";
			}
			else if(!strcmp($row['utp'],"A"))
			{
			echo "<script> window.location = 'AdminPage.php' </script>";
			}
			else
			{
			echo "<script> window.location = 'TeacherUpload2.php' </script>";
			}	
		}
		else
		{
			echo"<body onload=\"window.alert('Invalid Username or Password!'); 
			return history.back();\">";
			exit();
		}
	
	}
}
}
?>
