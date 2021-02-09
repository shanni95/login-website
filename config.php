<?php
$hostname="localhost";
$dbusername="root";
$dbpassword="";
$dbname="formdata";

// Create connection
$conn = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);

// Check connection
if(!$conn){
	die("connection filed..." . mysqli_connect_error());
}
?>