<?php
//Get the Database Connection
include 'db.php';
//Capture The Data
$first = $_POST['first'];
$last = $_POST['last'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
//Insert Into DB
$sql = "INSERT INTO User (first, last, username, email, password) VALUES ('$first', '$last', '$username', '$email', '$password')";
$result = $conn->query($sql);
//Redirect to Homepage
header("Location: index.php");