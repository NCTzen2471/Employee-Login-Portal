<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile Page</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<br>
	<h1>Welcome, <?php echo $user_data['empName']; ?></h1><br><br>
	<h2><u>Details</u></h2>
    <h3>Employee ID: <?php echo $user_data['empID']; ?></h3>
    <h4>Date of joining: <?php echo $user_data['DoJ']; ?></h4>
    <h4>Salary: <?php echo $user_data['salary']; ?></h4>
    <h4>Department: <?php echo $user_data['department']; ?></h4>
    <h4>Mobile Number: <?php echo $user_data['mobileNo']; ?></h4>
    <h4>Email: <?php echo $user_data['email']; ?></h4>
	<br>
	<a href="relog.php" >Click to Update details</a>
</body>
</html>