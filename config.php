<?php

$hostname = "localhost:3307";
$user= "root";
$pass = "";
$dbname = "clothing store";

$conn = mysqli_connect($hostname, $user, $pass ,$dbname);

if (!$conn) {
	die("<script>alert('Connection Failed.')</script>");
}

?>