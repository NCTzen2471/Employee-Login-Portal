<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "sqlpass@2471";
$dbname = "login_sample_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
