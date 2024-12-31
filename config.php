<?php

$hostname = "localhost:3306";
$user= "root";
$pass = "";
$dbname = "clothing_store";

$conn = mysqli_connect($hostname, $user, $pass ,$dbname);

if (!$conn) {
	die("<script>alert('Connection Failed.')</script>");
}

?>