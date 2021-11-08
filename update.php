<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $mobileNo = $_POST['mobileNo'];
        $email = $_POST['email'];
		$cur_empID = $_SESSION['empID'];
        if(empty($mobileNo)&&!empty($email))
		{
			$query = "update emp set email='$email' where empID='$cur_empID'";
			mysqli_query($con, $query);
			header("Location: login.php");
			die;
		}elseif(!empty($mobileNo)&& empty($email))
		{
			$query = "update emp set mobileNo='$mobileNo' where empID='$cur_empID'";
			mysqli_query($con, $query);
			header("Location: login.php");
			die;
		}elseif(!empty($mobileNo)&&!empty($email))
		{
			$query = "update emp set email='$email', mobileNo='$mobileNo' where empID='$cur_empID'";
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
	<title>Update Page</title>
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

		padding: 8px;
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
			<div style="font-size: 20px;margin: 10px;color: Black;">Update Page</div>

			<input id="text" type="text" name="email" placeholder="Enter new email or leave blank if you don't want to update..."><br><br>
			<input id="text" type="text" name="mobileNo" placeholder="Enter new mobile number or leave blank if you don't want to update..."><br><br>

			<input id="button" type="submit" value="Update"><br><br>

			<a href="signup.php">Register Here</a><br><br>
			<a href="login.php">Don't want to Update?</a><br><br>
		</form>
	</div>
</body>
</html>