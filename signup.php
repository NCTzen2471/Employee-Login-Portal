<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$empID = $_POST['empID'];
		$passwd = $_POST['passwd'];
        $empName = $_POST['empName'];
        $DoJ = $_POST['DoJ'];
        $salary = $_POST['salary'];
        $department = $_POST['department'];
        $mobileNo = $_POST['mobileNo'];
        $email = $_POST['email'];

        if(!empty($empID)&&
		!empty($passwd)&&
        !empty($empName)&&
        !empty($DoJ )&&
        !empty($salary )&&
        !empty($department)&&
        !empty($mobileNo)&&
        !empty($email))
		{
			$newpass = password_hash($passwd, PASSWORD_DEFAULT);
			$query = "insert into emp values ('$empID','$newpass','$empName','$DoJ','$salary','$department','$mobileNo','$email')";
			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup Page</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #000;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: black;
		background-color: pink;
		border: none;
		border-radius: 5px;
	}

	#box{

		background-color: lightgreen;
		margin: auto;
		width: 500px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: black;">Signup Page</div>

			<input id="text" type="text" name="empID" placeholder="Enter Employee ID"><br><br>
			<input id="text" type="password" name="passwd" placeholder="Create a password"><br><br>
			<input id="text" type="text" name="empName" placeholder="Enter your Name"><br><br>
			<a> Enter Date of Joining</a><br><br>
			<input id="text" type="date" name="DoJ" placeholder="Enter Joining Date"><br><br>
			<input id="text" type="int" name="salary" placeholder="Enter your Salary"><br><br>
			<input id="text" type="text" name="department" placeholder="Enter your Department"><br><br>
			<input id="text" type="int" name="mobileNo" placeholder="Enter your Mobile No."><br><br>
			<input id="text" type="text" name="email" placeholder="Enter your Email"><br><br>

			<input id="button" type="submit" value="Sign Up"><br><br>

			<a href="login.php">Already have an account?</a><br><br>
		</form>
	</div>
</body>
</html>