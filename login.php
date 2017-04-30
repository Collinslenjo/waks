<?php
session_start();
//Get the Database Connection
include 'db.php';
//Look The Data
$email = $_POST['email'];
$password = $_POST['password'];
//Insert Into DB
$sql = "SELECT * fROM User WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if(!$row = $result->fetch_assoc())
{
	echo "Your email or password is incorrect!";
} else {
	$_SESSION['id'] = $row['id'];
}
//Redirect to Homepage
header("Location: index.php");