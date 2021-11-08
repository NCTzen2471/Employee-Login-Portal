<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$empID = $_POST['empID'];
		$passwd = $_POST['passwd'];

		if(!empty($empID) && !empty($passwd))
		{

			//read from database
			$query = "select * from emp where empID = '$empID' limit 1";
			$result = mysqli_query($con, $query);
            
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if(password_verify($passwd, $user_data['passwd']))
					{
                        
                        $_SESSION['empID'] = $user_data['empID'];
						header("Location: update.php");
						die;
					}
				}
			}
            echo "wrong username or password!";
			
		}else
		{
			echo "wrong username or password!";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login to Update</title>
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
			<div style="font-size: 20px;margin: 10px;color: Black;">Login to Update</div>

			<input id="text" type="text" name="empID" placeholder="Enter empID"><br><br>
			<input id="text" type="password" name="passwd" placeholder="Enter Password"><br><br>

			<input id="button" type="submit" value="Verify"><br><br>

			<a href="signup.php">Register Here</a><br><br>
			<a href="login.php">Don't want to Update?</a><br><br>
		</form>
	</div>
</body>
</html>