<?php

session_start();

if(isset($_SESSION['empID']))
{
	unset($_SESSION['empID']);

}

header("Location: login.php");
die;