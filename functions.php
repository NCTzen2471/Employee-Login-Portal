<?php

function check_login($con)
{

	if(isset($_SESSION['empID']))
	{

		$id = $_SESSION['empID'];
		$query = "select * from emp where empID = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}
